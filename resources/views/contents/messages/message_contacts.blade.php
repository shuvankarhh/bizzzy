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
                    <div class="row m-0">
                        @foreach ($contacts as $idx=>$item)
                            <div data-from="{{ $item->user->id }}" class="col-12 contact {{ $idx == 0 ? 'active' : '' }}" role="button" disabled>
                                <div class="c-flex f-align-center f-gap-2" style="position: relative">
                                    <img class="dp-image" src="{{ asset("storage/{$item->user->photo}") }}" alt="">
                                    <p>{{ $item->user->name }}</p>
                                    <span class="dot" id="unseen_{{ $item->user->id }}"></span>
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
        // Create a new WebSocket.
        var socket  = new WebSocket('ws://localhost:8090?token={{ auth()->id() }}');        

        let message_body = document.getElementById('message_body');
        var message = document.getElementById('message');

        let createMessage = (data) => {
            let html = '';
            data.forEach((element => {

                console.log(`fetching message from: ${element.from} AND to: ${element.to}!`);
                let from_div = document.getElementById(`unseen_${element.from}`)
                if(element.status == '1' && from_div){
                    from_div.classList.add('unseen');
                    return;
                }

                let chatClass = '';
                let justifyContent = '';

                if(element.from == '{{ auth()->id() }}'){
                    chatClass = 'self-chat';
                    justifyContent = 'justify-content-end';
                }else{
                    chatClass = 'contact-chat';
                    justifyContent = 'justify-content-start';
                }

                html = `<div class="row ${justifyContent} mb-3">
                    <div class="col-7 chat ${chatClass}">
                        <p class="mt-2 mb-1">${element.message}</p>
                        <p class="text-end">${element.created_at}</p>
                    </div>
                </div>` + html;

            }));



            message_body.innerHTML += html;
            message_body.scrollTop = message_body.scrollHeight;
            message.value = '';
        }
        let fetch_message = (e) => {
            let active_member = document.querySelector('.contact.active');
            message_body.innerHTML = "";
            let target = e.currentTarget;
            let from = target.dataset.from;
            document.getElementById(`unseen_${from}`).classList.remove('unseen');
            active_member.classList.remove('active');
            target.classList.add('active');
            axios
            .get(`${APP_URL}/message/${from}`)
            .then((response) => {
                createMessage(response.data);
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

        socket.onmessage = function(e) {
            let data = JSON.parse(e.data);
            createMessage(Array(data));
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
                receiver: active_member.dataset.from,
                action: 'message',
            }
            socket.send( JSON.stringify(data) );
        });
    </script>
@endpush    