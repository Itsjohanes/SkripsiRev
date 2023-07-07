<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata("message");
    ?>
    <div class="row">

    </div>
    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang, <?= $user['nama']; ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Jumlah Siswa -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $siswa; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Soal Pre-Test</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pretest; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pen"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Soal Post-Test</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $posttest; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pencil-ruler"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nilai Tertinggi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nilaiTertinggi['nama']. 
                              "(". $nilaiTertinggi['total_nilai'] . ")"; ?></div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-lg-6 mb-4">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jumlah Siswa</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Mengerjakan Pre-Test (<span class="float-right"><?php echo $persentasepretest;  ?>%)</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $persentasepretest ?>%" aria-valuenow="<?php echo $persentasepretest ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Mengerjakan Tugas 1 (<span class="float-right"><?php echo $persentasetugas1;  ?>%)</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $persentasetugas1 ?>%" aria-valuenow="<?php echo $persentasetugas1 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Mengerjakan Tugas 2 (<span class="float-right"><?php echo $persentasetugas2;  ?>%)</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $persentasetugas2 ?>%" aria-valuenow="<?php echo $persentasetugas2 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Mengerjakan Tugas 3 (<span class="float-right"><?php echo $persentasetugas3;  ?>%)</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $persentasetugas3 ?>%" aria-valuenow="<?php echo $persentasetugas3 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Mengerjakan Tugas 4 (<span class="float-right"><?php echo $persentasetugas4;  ?>%)</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $persentasetugas4 ?>%" aria-valuenow="<?php echo $persentasetugas4 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Mengerjakan Post-Test (<span class="float-right"><?php echo $persentaseposttest;  ?>%)</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $persentaseposttest; ?>%" aria-valuenow="<?php echo $persentaseposttest; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->
    </div>
</div>
</div>
<!-- End of Main Content -->