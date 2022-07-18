<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use App\Models\MessageContact;
use Illuminate\Http\Request;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class WebSocketController extends Controller implements MessageComponentInterface
{
    private $connections = [];
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }
    
     /**
     * When a new connection is opened it will be passed to this method.
     * A token is passed when opening connection.
     * This token is id of users table.
     * This is id is stored the the opend connections array.
     * Afrer opening a connection user table is updated with sokcet_id to indicate that user is active or not.
     * @param  ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    function onOpen(ConnectionInterface $conn){
        var_dump($conn->httpRequest);
        $uri = $conn->httpRequest->getUri()->getQuery();
        parse_str($uri, $token);

        $this->connections[$conn->resourceId] = compact('conn') + ['user_id' => $token['token']] + ['open_user' => NULL];
        // $this->clients->attach($conn);

        User::where('id', $token['token'])->update(['socket_id' => $conn->resourceId]);

        echo "New connection! ({$conn->resourceId})\n";        

        $this->connections[$conn->resourceId]['conn']->send(json_encode(['unseen_messages' => $this->getUnseenMessageCount($token['token'])]));
    }
    
     /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param  ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(ConnectionInterface $conn){
        // $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";

        User::where('socket_id', $conn->resourceId)->update(['socket_id' => NULL]);
        $disconnectedId = $conn->resourceId;
        unset($this->connections[$disconnectedId]);
        // foreach($this->connections as &$connection)
        //     $connection['conn']->send(json_encode([
        //         'offline_user' => $disconnectedId,
        //         'from_user_id' => 'server control',
        //         'from_resource_id' => null
        //     ]));
    }
    
     /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param  ConnectionInterface $conn
     * @param  \Exception $e
     * @throws \Exception
     */
    function onError(ConnectionInterface $conn, \Exception $e){
        $userId = $this->connections[$conn->resourceId]['user_id'];
        echo "An error has occurred with user $userId: {$e->getMessage()}\n";
        unset($this->connections[$conn->resourceId]);
        $conn->close();
    }
    
     /**
     * Triggered when a client sends data through the socket
     * @param  \Ratchet\ConnectionInterface $conn The socket/connection that sent the message to your application
     * @param  string $msg The message received
     * @throws \Exception
     */
    function onMessage(ConnectionInterface $conn, $msg){


        $data = json_decode($msg);

        if($data->action == 'switch'){
            // $this->connections[$conn->resourceId]['open_user'] = $data->sender;
            return;
        }

        $message = Message::create([
            'from' => $this->connections[$conn->resourceId]['user_id'],
            'to' => $data->receiver,
            'message' => $data->message,
            'status' => 1,
        ]);

        $message = $message->toArray();
        
        // Update last interaction time. Make user contact to seen as he sent the message.
        MessageContact::where('user_id', $this->connections[$conn->resourceId]['user_id'])->where('contact_id', $data->receiver)->update(['last_interaction' => now(), 'unseen' => 2]);
        // Update last interaction time. Make reciver contact to unseen, where the message will be marker seen from a request from client side.
        MessageContact::where('contact_id', $this->connections[$conn->resourceId]['user_id'])->where('user_id', $data->receiver)->update(['last_interaction' => now(), 'unseen' => 1]);
        
        $message['unseen_messages'] = $this->getUnseenMessageCount($data->receiver);

        // Only send message to the sender and receiver!
        foreach ( $this->connections as $resourceId => &$connection ) {
            if ( $conn->resourceId == $connection['conn']->resourceId OR $data->receiver == $connection['user_id']) {
                $connection['conn']->send( json_encode($message) );
            }
        }
    }

    /**
     * Get number of unseen contacts from user!
     * @param int $user_id id of users table
     * @return int Count of unseen contact!
     */
    public function getUnseenMessageCount($user_id)
    {
        return MessageContact::where('user_id', $user_id)->where('unseen', 1)->count();
    }
}
