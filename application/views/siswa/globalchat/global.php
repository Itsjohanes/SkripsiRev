  <link rel="stylesheet" href="<?= base_url('assets/css/globalchat.css'); ?>">

    <script>
        $(document).ready(function() {
            // Refresh chat messages every 2 seconds
            setInterval(function() {
                $.ajax({
                    url: '<?php echo base_url("globalchat/fetch_chat_messages"); ?>',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('.chat-messages').html('');
                        $.each(response, function(index, data) {
                            var chatMessage = '<div class="chat-message"><strong>' + data.nama + ': </strong>' + data.message + '</div>';
                            $('.chat-messages').append(chatMessage);
                        });
                    }
                });
            }, 2000);

            // Send chat message
            $('#send_message').on('click', function() {
                var message = $('#message').val();

                $.ajax({
                    url: '<?php echo base_url("globalchat/save_message"); ?>',
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

<body>
    <h1>Global Chat</h1>
    <div class="chat-container">
        <div class="chat-messages"></div>
        <div class="chat-input">
            <textarea id="message" rows="4" placeholder="Your Message"></textarea>
            <button id="send_message">Send</button>
        </div>
    </div>
</body>

