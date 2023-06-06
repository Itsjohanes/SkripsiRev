<!DOCTYPE html>
<html>
<head>
    <title>Timer Test</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Timer Test</h2>
    <button id="start_timer">Mulai Timer</button>
    <button id="check_timer">Cek Timer</button>

    <div id="timer_display"></div>

    <script>
        $(document).ready(function() {
            $("#start_timer").click(function() {
                $.ajax({
                    url: "<?php echo site_url('timer/start_timer'); ?>",
                    type: "GET",
                    success: function(response) {
                        console.log("Timer dimulai");
                    }
                });
            });

            $("#check_timer").click(function() {
                $.ajax({
                    url: "<?php echo site_url('timer/check_timer'); ?>",
                    type: "GET",
                    success: function(response) {
                        $("#timer_display").html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
