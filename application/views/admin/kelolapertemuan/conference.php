    <style>
        #api-parent {
        text-align: center;
         width: 95%; /* Adjust the percentage as needed */
         height: 90vh; /* Adjust the percentage as needed */
        }
    </style>
    <a href = "https://meet.jit.si/<?php echo $pertemuan['videoconference'];?>" class="btn btn-success btn-sm">Link </a>
    <div id = "api-parent"></div>
    <script src="https://meet.jit.si/external_api.js"></script>
    <script>
        const domain = "meet.jit.si";
        const meetingName = '<?php echo $pertemuan['videoconference'];?>';
        const parentElement = document.getElementById('api-parent');
        console.warn('parentElement', parentElement);
        var options = {
            roomName: meetingName,
           
            userInfo: {
                displayName: '<?php echo $user['nama'];?>'
            },
            parentNode: parentElement,
            interfaceConfigOverwrite: {
                filmStripOnly: true
            }
        }
        var api = new JitsiMeetExternalAPI(domain, options);

    </script>
