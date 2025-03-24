function inviaMessaggio() {

    var message = document.querySelector('textarea[name="message"]').value;


    $.post('/chat/send', {
        sender_id: 1,
        receiver_id: 2,
        message: message,
        _token: "{{ csrf_token() }}"
    }, function(data) {

        aggiornaChat();
    });


    document.querySelector('textarea[name="message"]').value = '';
}


function aggiornaChat() {

    $.get('/chat/1/2', function(data) {
        var messageContainer = document.getElementById('message-container');
        messageContainer.innerHTML = '';


        data.messages.forEach(function(message) {
            var messaggio = document.createElement('p');
            messaggio.innerText = message.sender.name + ': ' + message.message;
            messageContainer.appendChild(messaggio);
        });
    });
}


setInterval(aggiornaChat, 5000);


aggiornaChat();
