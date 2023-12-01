<body class="g-sidenav-show bg-gray-200">
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="">
        <span class="ms-1 font-weight-bold text-white">Algoritma dan Pemrograman</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php
          if ($title == 'Home Guru') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('guru') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('guru') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Home Admin</span>
          </a>
        </li>


        <li class="nav-item">
          <?php
          if ($title == 'List Siswa') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('kelolalistsiswa') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('kelolalistsiswa') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">school</i>
          </div>
          <span class="nav-link-text ms-1">List Siswa</span>
          </a>
        </li>
        <?php
        if ($title == 'Atur Pertemuan') {
          echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('kelolapertemuan') . '">';
        } else {
          echo '<a class="nav-link text-white " href="' . base_url('kelolapertemuan') . '">';
        }
        ?>
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">settings</i>
        </div>
        <span class="nav-link-text ms-1">Atur Pertemuan</span>
        </a>
        </li>
        <li class="nav-item">
          <?php
          if ($title == 'Materi') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('kelolamateri') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('kelolamateri') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">book</i>
          </div>
          <span class="nav-link-text ms-1">Materi</span>
          </a>
        </li>
        <li class="nav-item">


        <li class="nav-item">
          <?php
          if ($title == 'Youtube') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('kelolayoutube') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('kelolayoutube') . '">';
          }
          ?> <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">movie</i>
          </div>
          <span class="nav-link-text ms-1">Youtube</span>
          </a>
        </li>

        <li class="nav-item">

          <?php
          if ($title == 'Tugas') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('kelolatugas') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('kelolatugas') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">task</i>
          </div>
          <span class="nav-link-text ms-1">Tugas</span>
          </a>
        </li>
        <li class="nav-item">

          <?php
          if ($title == 'Pre-Test') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('kelolapretest') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('kelolapretest') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">quiz</i>
          </div>
          <span class="nav-link-text ms-1">Pre-Test</span>
          </a>
        </li>
        <li class="nav-item">

          <?php
          if ($title == 'Quiz') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('kelolaquiz') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('kelolaquiz') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">quiz</i>
          </div>
          <span class="nav-link-text ms-1">Quiz</span>
          </a>
        </li>
        <li class="nav-item">

          <?php
          if ($title == 'Post-Test') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('kelolaposttest') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('kelolaposttest') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">quiz</i>
          </div>
          <span class="nav-link-text ms-1">Post-Test</span>
          </a>
        </li>
        <li class="nav-item">

          <?php
          if ($title == 'Random') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('randomkelompok') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('randomkelompok') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">group</i>
          </div>
          <span class="nav-link-text ms-1">Random Kelompok</span>
          </a>
        </li>

        <li class="nav-item">

          <?php
          if ($title == 'Menilai') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('menilai') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('menilai') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">score</i>
          </div>
          <span class="nav-link-text ms-1">Menilai</span>
          </a>
        </li>



        <li class="nav-item">

          <?php
          if ($title == 'Komentar') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('komentar') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('komentar') . '">';
          }
          ?>
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">comment</i>
          </div>
          <span class="nav-link-text ms-1">Komentar dan Diskusi</span>
          </a>
        </li>
        <li class="nav-item">
          <?php
          if ($title == 'Chat') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('guruchat/menu') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('guruchat/menu') . '">';
          }
          ?> <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">chat</i>
          </div>
          <span class="nav-link-text ms-1">Chat</span>
          </a>
        </li>
        <li class="nav-item">
          <?php
          if ($title == 'Group Chat') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('gurugroupchat') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('gurugroupchat') . '">';
          }
          ?> <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">group</i>
          </div>
          <span class="nav-link-text ms-1">Group Chat</span>
          </a>
        </li>

        <li class="nav-item">
          <?php
          if ($title == 'Global Chat') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('guruglobalchat') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('guruglobalchat') . '">';
          }
          ?> <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">public</i>
          </div>
          <span class="nav-link-text ms-1">Global Chat</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <?php
          if ($title == 'Profile') {
            echo '<a class="nav-link active text-white bg-gradient-primary" href="' . base_url('guruprofile') . '">';
          } else {
            echo '<a class="nav-link text-white " href="' . base_url('guruprofile') . '">';
          }
          ?> <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="<?php echo base_url('auth/logout'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-y-auto">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo $title; ?></li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><?php echo $title; ?> </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="#" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope cursor-pointer"></i>
                    <span id="notification-count"><?php echo count($notifchat); ?></span>
                </a>
                <ul id="notification-list" class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                    <!-- Konten notifikasi chat akan diperbarui di sini menggunakan AJAX -->
                </ul>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>

            <li class="nav-item d-flex align-items-center">
              <a href="<?php echo base_url('guruprofile'); ?>" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?php echo $user['nama']; ?> </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

<script type="text/javascript">
$(document).ready(function(){
    function refreshChatData() {
        $.ajax({
            url: '<?php echo base_url("Notif/getChatNotifications"); ?>', // Ganti dengan URL ke metode controller Anda yang mengambil data notifikasi chat
            type: 'GET',
            dataType: 'json',
success: function(data) {
                // Update jumlah notifikasi
                $('#notification-count').text(data.count);

                // Bersihkan dan perbarui daftar notifikasi chat
                $('#notification-list').empty();
                if (data.notifications.length > 0) {
                    $.each(data.notifications, function(index, notification) {
                        var notificationHtml = '<li class="mb-2">';
                        notificationHtml += '<a class="dropdown-item border-radius-md" href="javascript:;" onclick="redirectToChat(' + notification.id_pengirim + ')">';
                        notificationHtml += '<div class="d-flex py-1">';
                        notificationHtml += '<div class="d-flex flex-column justify-content-center">';
                        notificationHtml += '<h6 class="text-sm font-weight-normal mb-1">';
                        notificationHtml += '<span class="font-weight-bold">Pesan baru dari ' + notification.nama + '</span>';
                        notificationHtml += '</h6>';
                        notificationHtml += '<p class="text-xs text-secondary mb-0">';
                        notificationHtml += '<i class="fa fa-clock me-1"></i>' + notification.waktu;
                        notificationHtml += '</p>';
                        notificationHtml += '</div>';
                        notificationHtml += '</div>';
                        notificationHtml += '</a>';
                        notificationHtml += '</li>';
                        $('#notification-list').append(notificationHtml);
                    });
                } else {
                    // Tampilkan pesan jika tidak ada notifikasi
                    $('#notification-list').append('<li class="mb-2"><a class="dropdown-item border-radius-md" href="javascript:;">Belum ada pesan</a></li>');
                }
            },
            complete: function() {
                // Setelah permintaan selesai, atur waktu tunggu sebelum melakukan pemanggilan berikutnya
                setTimeout(refreshChatData, 5000); // Pemanggilan setiap 5 detik (5000 milidetik)
            }
        });
    }

    // Fungsi untuk mengarahkan pengguna ke halaman obrolan dengan pengirim pesan tertentu
    function redirectToChat(id_pengirim) {
        window.location.href = '<?php echo base_url("guruchat/"); ?>' + id_pengirim;
    }

    // Panggil fungsi pertama kali saat halaman dimuat
    refreshChatData();
});
</script>
