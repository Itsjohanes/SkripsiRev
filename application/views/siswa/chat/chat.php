
    <link rel="stylesheet" href="<?= base_url('assets/css/chat.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="container-fluid h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-md-4 col-xl-3 chat">
                        <div class="card card-warna mb-sm-3 mb-md-0 contacts_card">
                            <div class="card-header">
                                <div class="input-group">
                                    <!-- Tambahkan elemen input untuk fitur pencarian kontak -->
                                </div>
                            </div>
                            <div class="card-body contacts_body">
                                <ul class="contacts" id="yangAktif">
                                    <!-- Daftar kontak aktif akan dimuat di sini -->
                                </ul>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xl-6 chat">
                        <div class="card card-warna">
                            <div class="card-header  msg_head">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <!-- Gantilah dengan gambar profil pengguna -->
                                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span><?= $data->nama ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body msg_card_body" id="letakpesan">
                                <!-- Pesan akan dimuat di sini -->
                            </div>
                            <div class="card-footer">
                                <div class="input-group">
                                    <textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                    <div class="input-group-append">
                                        <span class="input-group-text send_btn" onclick="sendMessage()"><i class="fas fa-location-arrow"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sisipkan skrip Swal untuk notifikasi -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Fungsi untuk memuat daftar kontak yang aktif
        function loadActiveContacts() {
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>chat/getallorang",
                data: {
                    id: '<?= $id ?>'
                },
                dataType: "json",
                success: function(response) {
                    var html = "";
                    var d = response.data;
                    id = '<?= $id ?>';
                    d.forEach(d => {
                        html += `
                            <li class="active coba" data-id=${d.id}>
                                <div class="d-flex bd-highlight ">
                                    <div class="img_cont ">
                                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info ">
                                        <span class="">${d.nama}</span>
                                    </div>
                                </div>
                            </li>`;
                    });
                    $('#yangAktif').html(html);
                }
            });
        }

        // Fungsi untuk mengirim pesan
        function sendMessage() {
            var pesan = $('.type_msg').val();
            var id = '<?= $id ?>';
            var id_lawan = '<?= $data->id ?>';

            // Mengganti karakter baris baru (\n) dengan tag HTML <br> sebelum mengirim ke server
            pesan = pesan.replace(/\n/g, '<br>');

            if (pesan != "") {
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>/chat/kirimpesan",
                    data: {
                        id,
                        id_lawan,
                        pesan
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status) {
                            $('.search_btn').trigger('click');
                            $('.type_msg').val('');
                            scrollToBottom();
                        }
                    }
                });
            }
        }

        // Mengganti perilaku tombol "Enter" dalam textarea
        $('.type_msg').keydown(function(e) {
            if (e.keyCode === 13 && !e.shiftKey) { // 13 adalah kode tombol Enter
                e.preventDefault(); // Mencegah perilaku default tombol Enter (menambahkan baris baru)
                sendMessage(); // Memanggil fungsi sendMessage untuk mengirim pesan
            }
        });

        // Fungsi untuk menggulirkan ke bawah tampilan pesan
        function scrollToBottom() {
            $("#letakpesan").animate({
                scrollTop: 200000000000000000000000000000000
            }, "slow");
        }

        // Fungsi untuk memuat pesan
        function loadMessages() {
            var id_lawan = '<?= $data->id ?>';
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>chat/loadchat",
                data: {
                    id_pengirim: '<?= $id ?>',
                    id_lawan: id_lawan
                },
                dataType: "json",
                success: function(response) {
                    var messages = [];
                    var d = response.data;
                    id = '<?= $id ?>';
                    var today = new Date();

                    d.forEach(d => {
                        var times = new Date(d.waktu);
                        var time = times.toLocaleTimeString();
                        var tanggal = String(times.getDate()).padStart(2, '0');
                        var bulan = String(times.getMonth() + 1).padStart(2, '0');
                        var tahun = times.getFullYear();
                        var lengkapDB = tanggal + '-' + bulan + '-' + tahun;
                        var kapan = "Today";
                        var tanggal_bulan = tanggal + "-" + bulan;

                        if (lengkapDB !== today.toLocaleDateString()) {
                            kapan = tanggal_bulan;
                        }

                        var message = {
                            id: d.id_pengirim,
                            pesan: d.pesan,
                            waktu: times,
                            kapan: kapan,
                            time: time
                        };

                        messages.push(message);
                    });

                    messages.sort(function(a, b) {
                        return a.waktu - b.waktu;
                    });

                    var html = "";
                    messages.forEach(message => {
						var escapedMessage = message.pesan.replace(/<(stdio\.h|iostream)>/ig, function(match) {
							return match; // Pertahankan tag HTML ini tanpa perubahan
						}).replace(/<br>/g, "\n").replace(/</g, "&lt;").replace(/>/g, "&gt;");

                        // Mengganti karakter baris baru (\n) dengan tag HTML <br>
                        //message.pesan = message.pesan.replace(/\n/g, '<br>');

                        if (parseInt(message.id) === parseInt(id)) {
                            html += `<div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            ${escapedMessage}
                                            <span class="msg_time">${message.kapan}, ${message.time}</span>
                                        </div>
                                    </div>`;
                        } else {
                            html += `<div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                        </div>
                                        <div class="msg_cotainer">
                                            ${escapedMessage}                                
                                            <span class="msg_time">${message.kapan}, ${message.time}</span>
                                        </div>
                                    </div>`;
                        }
                    });

                    $('#letakpesan').html(html);
                    scrollToBottom();
                }
            });
        }

        // Memuat pesan secara berkala
        setInterval(loadMessages, 1000);

        // Fungsi untuk menampilkan pesan saat halaman dimuat
        $(document).ready(function() {
            loadActiveContacts();
            loadMessages();
        });

        // Fungsi untuk mengubah halaman saat mengklik kontak
        $('body').on('click', '.coba', function() {
            var id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>chat/" + id);
        });

        // Fungsi untuk keluar dari sesi chat
        $('.keluar').click(function(e) {
            Swal.fire({
                title: 'Anda Akan Keluar?',
                text: "Apakah Anda Yakin Akan keluar ? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url() ?>chat/logout",
                        dataType: "json",
                        success: function(response) {
                            if (response) {
                                Swal.fire(
                                    'Success!',
                                    response.pesan,
                                    'success'
                                );
                                setTimeout(() => {
                                    location.href = '<?= base_url() ?>/auth/login';
                                }, 1000);
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.pesan,
                                    'error'
                                );
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
