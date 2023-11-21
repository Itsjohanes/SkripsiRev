<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/globalchat.css'); ?>">
    <title>Global Chat</title>
</head>
<body>
    <h1>Global Chat</h1>
    <div class="chat-container">
        <div class="chat-messages"></div>
        <div class="chat-input">
            <textarea id="message" rows="4" placeholder="Your Message"></textarea>
            <button id="send_message">Send</button>
            <a href= <?php echo base_url('adminfileglobal');?> >File Manager</a>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Refresh chat messages every 2 seconds
            setInterval(function() {
                $.ajax({
                    url: '<?php echo base_url("adminglobalchat/fetch_chat_messages"); ?>',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('.chat-messages').html('');
                        $.each(response, function(index, data) {
                            // Mengecualikan tag HTML <stdio.h> dan <iostream>
                            var message = data.message.replace(/<stdio\.h>|<iostream>|<string>/g, function(match) {
                                return match.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                            });
                            // Mengganti karakter baris baru (\n) dengan tag HTML <br>
                            message = message.replace(/\n/g, '<br>');
                            var chatMessage = '<div class="chat-message"><strong>' + data.nama + ': </strong>' + message + '</div>';
                            $('.chat-messages').append(chatMessage);
                        });
                    }
                });
            }, 2000);

            // Send chat message
            $('#send_message').on('click', function() {
                var message = $('#message').val();

                // Mengganti karakter baris baru (\n) dengan tag HTML <br> sebelum mengirim ke server
                message = message.replace(/\n/g, '<br>');

                $.ajax({
                    url: '<?php echo base_url("adminglobalchat/save_message"); ?>',
                    type: 'post',
                    data: {
                        message: message
                    },
                    success: function() {
                        $('#message').val('');
                    }
                });
            });
        });
    </script>
</body>
</html>
