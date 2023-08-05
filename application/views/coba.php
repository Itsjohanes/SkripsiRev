<!DOCTYPE html>
<html>
<head>
    <title>Jitsi Meet Custom</title>
</head>
<body>
    <div id="jitsi-container"></div>
    <script src="https://meet.jit.si/external_api.js"></script>
    <script>
        const domain = 'meet.jit.si';
        const options = {
            roomName: 'OffensiveHurricanesOccurHalf',
            width: 800,
            height: 600,
            userInfo: {
                displayName: 'Johannes'
            }
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    </script>
</body>
</html>
