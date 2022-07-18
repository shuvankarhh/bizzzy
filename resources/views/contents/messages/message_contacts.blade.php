@extends('layouts.app')
@section('navbar')
    <x-navbar links="true" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header"><h4>Contacts</h4></div>
                <div class="card-body p-0 m-0">
                    <div class="row m-0" id="contact_div">
                        @foreach ($contacts as $idx=>$item)
                            <div data-user="{{ $item->user->id }}" class="contact_{{ $item->user->id }} col-12 contact {{ $idx == 0 ? 'active' : '' }}" role="button" disabled>
                                <div class="c-flex f-align-center f-gap-2" style="position: relative">
                                    <img class="dp-image" src="{{ asset("storage/{$item->user->photo}") }}" alt="">
                                    <div class="w-100 left-contacts">
                                        <p class="m-0" style="">{{ $item->user->name }}</p>
                                        <p id="last_interaction_{{ $item->user->id }}" class="m-0 mt-2 text-end w-100">{{ $item->last_interaction->format('h:i a') }}</p>
                                    </div>
                                    <span class="dot {{ ($item->unseen === 1) ? 'unseen' : '' }}" id="unseen_{{ $item->user->id }}"></span>
                                </div>                                
                            </div>                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                {{-- <div class="card-header">Showing message for "{{ $contacts[0]->user->name }}"</div> --}}
                <div id="message_body" class="card-body" style="min-height: 500px; max-height: 400px; overflow-y: auto;">
                    
                </div>
            </div>
            <div class="card mt-2 p-2">
                <form action="" id="message_form">
                    <input type="submit" hidden />
                    <div class="row">
                        <div class="col-10"><textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Enter your message"></textarea></div>
                        <div class="col-1 me-1 text-end"><button class="btn btn-primary mt-1 text-center w-auto">Send</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        let firstLoad = true;

        let message_body = document.getElementById('message_body');
        var message = document.getElementById('message');

        let messageNotificationDot = (unseen_messages) => {
            let message_dot = document.querySelector('.message-notification-dot');
            if(unseen_messages > 0){
                message_dot.classList.remove('no-message');
                message_dot.innerHTML = unseen_messages;
            }else{
                message_dot.classList.add('no-message');
            }
        }

        let createMessage = (data) => {
            
            let html = '';
            data.forEach((element => {
                let chatClass = '';
                let justifyContent = '';

                if(element.from == '{{ auth()->id() }}'){
                    chatClass = 'self-chat';
                    justifyContent = 'justify-content-end';
                }else{
                    chatClass = 'contact-chat';
                    justifyContent = 'justify-content-start';
                }

                /*
                Prepend messages as message are coming newest first! If we reverse the sorting we will not get the
                newest messages.
                 */
                html = `<div class="row ${justifyContent} mb-3">
                            <div class="col-7 chat ${chatClass}">
                                <p class="mt-2 mb-1">${element.message}</p>
                                <p class="text-end">${element.created_at}</p>
                            </div>
                        </div>` + html;

            }));

            message_body.innerHTML += html;

            // Always scroll to bottom after adding new message.
            message_body.scrollTop = message_body.scrollHeight;

            // Reseting the input field
            message.value = '';
        }

        // Fetch entire message of a person!
        let fetch_message = (e) => {
            console.log(firstLoad);
            let active_member = document.querySelector('.contact.active');
            message_body.innerHTML = "";
            let target = e.currentTarget;
            let from = target.dataset.user;
            if(!firstLoad){
                document.getElementById(`unseen_${from}`).classList.remove('unseen');
            }
            active_member.classList.remove('active');
            target.classList.add('active');
            axios
            .get(`${APP_URL}/message/${from}`, {
                params:{
                    firstLoad: firstLoad
                }
            })
            .then((response) => {
                messageNotificationDot(response.data.unseen_messages);
                firstLoad = false;
                createMessage(response.data.message);
                socket.send( JSON.stringify(data) );
            })
            let data = {
                action: 'switch',
                sender: from
            }
        }

        let contacts = document.querySelectorAll('.contact');
        contacts.forEach((element) => {
            element.addEventListener('click', fetch_message);
        });


        function transmitMessage() {
            socket.send( message.value );
        }

        let markMessageRead = (message) => {
            axios
            .post(`${APP_URL}/message/read/${message}`, {
                "_method" : "patch"
            })
            .then((response) => {
                console.log(response);
                messageNotificationDot(response.data.unseen_messages);
            })
        }

        let unseenMessageNotification = (sender) => {
            sender.querySelector('.dot').classList.add('unseen');
        }

        let removeUnseenMessageNotification = (sender) => {
            sender.querySelector('.dot').classList.remove('unseen');
        }

        socket.onmessage = function(e) {
            // console.log(e);
            let data = JSON.parse(e.data);
            let active_member = document.querySelector('.contact.active');
            
            if(data.unseen_messages){
                messageNotificationDot(data.unseen_messages);
                return;
            }

            // Getting message I sent. Bring the message div of the person that I sent message to top and create & append message!
            if({{auth()->id()}} == data.from){
                console.log('I am sender!');
                let sender = document.querySelector(`.contact_${data.to}`);
                let contacts = document.querySelector('.contact');
                let partent = contacts.parentNode;
                partent.insertBefore(sender, contacts);
                document.querySelector(`#last_interaction_${data.to}`).innerHTML = data.created_at;
                document.querySelector(`#unseen_${data.to}`).classList.remove('unseen');
                createMessage(Array(data));
                return;
            }

            // I got message but I am not the sender that means I received message from someone. Bring the message
            // div of the person that sent the message to top.

            console.log(`#last_interaction_${data.from}`);
            document.querySelector(`#last_interaction_${data.from}`).innerHTML = data.created_at;
            let sender = document.querySelector(`.contact_${data.from}`);
            let contacts = document.querySelector('.contact');
            let partent = contacts.parentNode;
            partent.insertBefore(sender, contacts);

            if(active_member.dataset.user == data.from){
                // I also have opened the sender's messages so append the message.
                createMessage(Array(data));
                unseenMessageNotification(sender);
                setTimeout(() => {
                    markMessageRead(data.id)
                    removeUnseenMessageNotification(sender)
                }, 1500);
            }else{
                unseenMessageNotification(sender);
            }
        }

        socket.onopen = (e) => {
            let active_member = document.querySelector('.contact.active');
            active_member.click();
        }


        let message_form = document.getElementById('message_form');
        message_form.addEventListener('submit', (e) => {
            let active_member = document.querySelector('.contact.active');
            e.preventDefault();
            let data = {
                message: message.value,
                receiver: active_member.dataset.user,
                action: 'message',
            }
            socket.send( JSON.stringify(data) );
        });
    </script>
@endpush    