 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-code"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Algoritma & Pemrograman</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">


     <!-- QUERY MENU -->

     <?php
        if ($title == 'Home Admin') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?> <a class="nav-link" href="<?= base_url('Admin'); ?>">
         <i class="fas fa-address-card"></i>
         <span>Dashboard Admin</span></a>
     </li>
     <hr class="sidebar-divider d-none d-md-block">


     <?php
        if ($title == 'List Siswa') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?>
     <a class="nav-link" href="<?= base_url('Admin/ListSiswa'); ?>">
         <i class="fas fa-users"></i>
         <span>ListSiswa</span></a>
     </li>


     <hr class="sidebar-divider d-none d-md-block">

     <?php
        if ($title == 'Random') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?> <a class="nav-link" href="<?= base_url('Admin/random'); ?>">
         <i class="fas fa-random"></i> <span>Random Siswa</span></a>
     </li>



     <hr class="sidebar-divider d-none d-md-block">
     <?php
        if ($title == 'Chat') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?> <a class="nav-link" href="<?= base_url('Chat/menu'); ?>">
         <i class="fas fa-comment-dots"></i> <span>Chat</span></a>
     </li>
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Nav Item - Utilities Collapse Menu -->
     <?php
        if ($title == 'Pre-Test' || $title == 'Post-Test') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?>
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
         <i class="fas fa-pencil-ruler"></i>
         <span>Test</span>
     </a>

     <!--Untuk class active pada menu-->
     <?php
        if ($title == 'Pre-Test' || $title == 'Post-Test' || $title == 'Edit Pre-Test' || $title == 'Edit Post-Test') {
            echo "<div id='collapseUtilities' class='collapse show' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>";
        } else {
            echo "<div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>";
        }
        ?>
     <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Test</h6>
         <?php
            if ($title == 'Pre-Test' || $title == 'Edit Pre-Test') {
                echo "<a class='collapse-item active' href='" . base_url('Admin/preTest') . "'>Pre-Test</a>";
            } else {
                echo "<a class='collapse-item' href='" . base_url('Admin/preTest') . "'>Pre-Test</a>";
            }
            ?>
         <?php
            if ($title == 'Post-Test' || $title == 'Edit Post-Test') {
                echo "<a class='collapse-item active' href='" . base_url('Admin/postTest') . "'>Post-Test</a>";
            } else {
                echo "<a class='collapse-item' href='" . base_url('Admin/postTest') . "'>Post-Test</a>";
            }
            ?>

     </div>
     </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <?php
        if ($title == 'Materi' || $title == 'Edit Materi') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?> <a class="nav-link" href="<?= base_url('Admin/materi'); ?>">
         <i class="fas fa-book"></i> <span>Materi</span></a>
     </li>
     <hr class="sidebar-divider d-none d-md-block">

     <?php
        if ($title == 'Tugas') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?> <a class="nav-link" href="<?= base_url('Admin/Tugas'); ?>">
         <i class="fas fa-tasks"></i> <span>Tugas</span></a>
     </li>
     <hr class="sidebar-divider d-none d-md-block">



     <?php
        if ($title == 'Hasil Pre-Test' || $title == 'Hasil Post-Test' || $title == 'Hasil Pertemuan 1' || $title == 'Hasil Pertemuan 2' || $title == 'Hasil Pertemuan 3' || $title == 'Hasil Pertemuan 4') {
            echo "<li class='nav-item active'>";
        } else {
            echo "<li class='nav-item'>";
        }
        ?>


     <!-- Nav Item - Pages Collapse Menu -->
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
         <i class="fas fa-book-open"></i>
         <span>Menilai & Report</span>
     </a>

     <?php
        if ($title == 'Hasil Pre-Test' || $title == 'Hasil Post-Test' || $title == 'Hasil Pertemuan 1' || $title == 'Hasil Pertemuan 2' || $title == 'Hasil Pertemuan 3' || $title == 'Hasil Pertemuan 4') {
            echo "<div id='collapsePages' class='collapse show' aria-labelledby='headingPages' data-parent='#accordionSidebar'>";
        } else {
            echo "<div id='collapsePages' class='collapse' aria-labelledby='headingPages' data-parent='#accordionSidebar'>";
        }
        ?>
     <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Test:</h6>
         <?php
            if ($title == 'Hasil Pre-Test') {
                echo "<a class='collapse-item active' href='" . base_url('Admin/hasilPreTest') . "'>Pre-Test</a>";
            } else {
                echo "<a class='collapse-item' href='" . base_url('Admin/hasilPreTest') . "'>Pre-Test</a>";
            }

            if ($title == 'Hasil Post-Test') {
                echo "<a class='collapse-item active' href='" . base_url('Admin/hasilPostTest') . "'>Post-Test</a>";
            } else {
                echo "<a class='collapse-item' href='" . base_url('Admin/hasilPostTest') . "'>Post-Test</a>";
            }


            ?>
         <div class="collapse-divider"></div>
         <h6 class="collapse-header">Tugas Pertemuan:</h6>
         <?php
            if ($title == 'Hasil Pertemuan 1') {
                echo "<a class='collapse-item active' href='" . base_url('Admin/hasilPertemuan1') . "'>Pertemuan 1</a>";
            } else {
                echo "<a class='collapse-item' href='" . base_url('Admin/hasilPertemuan1') . "'>Pertemuan 1</a>";
            }

            if ($title == 'Hasil Pertemuan 2') {
                echo "<a class='collapse-item active' href='" . base_url('Admin/hasilPertemuan2') . "'>Pertemuan 2</a>";
            } else {
                echo "<a class='collapse-item' href='" . base_url('Admin/hasilPertemuan2') . "'>Pertemuan 2</a>";
            }
            if ($title == 'Hasil Pertemuan 3') {
                echo "<a class='collapse-item active' href='" . base_url('Admin/hasilPertemuan3') . "'>Pertemuan 3</a>";
            } else {
                echo "<a class='collapse-item' href='" . base_url('Admin/hasilPertemuan3') . "'>Pertemuan 3</a>";
            }

            if ($title == 'Hasil Pertemuan 4') {
                echo "<a class='collapse-item active' href='" . base_url('Admin/hasilPertemuan4') . "'>Pertemuan 4</a>";
            } else {
                echo "<a class='collapse-item' href='" . base_url('Admin/hasilPertemuan4') . "'>Pertemuan 4</a>";
            }
            ?>



     </div>
     </div>
     </li>
     <hr class="sidebar-divider d-none d-md-block">


 </ul>
 <!-- End  of Sidebar -->