  <link rel="stylesheet" href="<?= base_url('assets/css/globalchat.css'); ?>">

    <script>
        $(document).ready(function() {
            // Refresh chat messages every 2 seconds
            setInterval(function() {
                var kelompok = $('#kelompok').val();
                $.ajax({
                    url: '<?php echo base_url("admingroupchat/fetchadmin_chat_messages"); ?>/' + kelompok,
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
                 var kelompok = $('#kelompok').val();

                $.ajax({
                    url: '<?php echo base_url("admingroupchat/saveadmin_message"); ?>',
                    type: 'post',
                    data: {
                        message: message,
                        kelompok: kelompok
                    },
                    success: function() {
                        $('#message').val('');
                    }
                });
            });
        });
    </script>
    <h1>Group Chat</h1>
    <div class="chat-container">
        <div class="chat-messages"></div>
        <div class="chat-input">
            <input type = "hidden" id = "kelompok" name = "kelompok" value=<?php echo $kelompok;?> > </input>
            <textarea id="message" rows="4" placeholder="Your Message"></textarea>
            <button id="send_message">Send</button>
            <a href= <?php echo base_url('adminfilemanager/').$kelompok;?> >File Manager</a>

        </div>
    </div>

