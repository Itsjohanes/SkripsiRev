
<style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        .chat-container {
            width: 500px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .chat-messages {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .chat-message {
            margin-bottom: 10px;
        }

        .chat-message strong {
            font-weight: bold;
        }

        .chat-input {
            margin-top: 10px;
        }

        .chat-input input,
        .chat-input textarea {
            width: 100%;
            padding: 5px;
        }

        .chat-input button {
            margin-top: 5px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Refresh chat messages every 2 seconds
            setInterval(function() {
                var kelompok = $('#kelompok').val();
                $.ajax({
                    url: '<?php echo base_url("groupchat/fetchadmin_chat_messages"); ?>/' + kelompok,
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
                 var kelompok = $('#kelompok').val();

                $.ajax({
                    url: '<?php echo base_url("groupchat/saveadmin_message"); ?>',
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
</head>
<body>
    <h1>Group Chat</h1>
    <div class="chat-container">
        <div class="chat-messages"></div>
        <div class="chat-input">
            <input type = "hidden" id = "kelompok" name = "kelompok" value=<?php echo $kelompok;?> > </input>
            <textarea id="message" rows="4" placeholder="Your Message"></textarea>
            <button id="send_message">Send</button>
        </div>
    </div>
</body>

