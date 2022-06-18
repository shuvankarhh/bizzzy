<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
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
     * When a new connection is opened it will be passed to this method
     * @param  ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    function onOpen(ConnectionInterface $conn){
        $uri = $conn->httpRequest->getUri()->getQuery();
        parse_str($uri, $token);

        $this->connections[$conn->resourceId] = compact('conn') + ['user_id' => $token['token']] + ['open_user' => NULL];
        $this->clients->attach($conn);

        User::where('id', $token['token'])->update(['socket_id' => $conn->resourceId]);

        echo "New connection! ({$conn->resourceId})\n";
    }
    
     /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param  ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";

        User::where('socket_id', $conn->resourceId)->update(['socket_id' => NULL]);
        // $disconnectedId = $conn->resourceId;
        // unset($this->connections[$disconnectedId]);
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

        echo("-------- START (".date("Y-m-d H:i:s").") --------\n");

        $data = json_decode($msg);

        if($data->action == 'switch'){
            $this->connections[$conn->resourceId]['open_user'] = $data->sender;
            echo "Connection {$this->connections[$conn->resourceId]['user_id']} has opened {$this->connections[$conn->resourceId]['open_user']}\n";
            echo("-------- END --------\n");
            return;
        }

        $message = Message::create([
            'from' => $this->connections[$conn->resourceId]['user_id'],
            'to' => $data->receiver,
            'message' => $data->message,
            'status' => 1,
        ]);
        foreach ( $this->connections as $resourceId => &$connection ) {

            if ( $conn->resourceId == $connection['conn']->resourceId ) {
                $connection['conn']->send( $message->toJson() );
            }else if($data->receiver == $connection['user_id']){
                if($this->connections[$conn->resourceId]['user_id'] == $connection['open_user']){
                    echo "{$this->connections[$conn->resourceId]['user_id']} this is sender id\n{$data->receiver} id receiver id\n{$connection['open_user']} open user id of receiver\n{$connection['user_id']} connected user id\n";
                    $message->status = 2;
                    $message->save();
                }
                $connection['conn']->send( $message->toJson() );
            }

        }
        // if(is_null($this->connections[$conn->resourceId]['user_id'])){
        //     $this->connections[$conn->resourceId]['user_id'] = $msg;
        //     $onlineUsers = [];
        //     foreach($this->connections as $resourceId => &$connection){
        //         $connection['conn']->send(json_encode([$conn->resourceId => $msg]));
        //         if($conn->resourceId != $resourceId)
        //             $onlineUsers[$resourceId] = $connection['user_id'];
        //     }
        //     $conn->send(json_encode(['online_users' => $onlineUsers]));
        // } else{
        //     $fromUserId = $this->connections[$conn->resourceId]['user_id'];
        //     $msg = json_decode($msg, true);
        //     $this->connections[$msg['to']]['conn']->send(json_encode([
        //         'msg' => $msg['content'],
        //         'from_user_id' => $fromUserId,
        //         'from_resource_id' => $conn->resourceId
        //     ]));
        // }
        echo("-------- END --------\n");
    }
}
