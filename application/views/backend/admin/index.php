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
    <div class="row">
    <div class="col-lg-6 mb-4">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Presentase Tugas/Test</h6>
            </div>
            <div class="card-body">
                <label>Mengerjakan Pre-Test (<span class="float-right"><?php echo $persentasepretest;  ?>%)</span></label>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $persentasepretest ?>%" aria-valuenow="<?php echo $persentasepretest ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <?php
                    for ($i = 1; $i <= $jumlahpertemuan; $i++) {
                        if($pertemuan[$i-1] != null){
                            $persentaseTugas = ${"persentasetugas" . $i};
                            echo '<label>Mengerjakan Tugas ' . $i . ' (<span class="float-right">' . $persentaseTugas . '%</span>)</label>';
                            echo '<div class="progress mb-4">';
                            echo '<div class="progress-bar bg-success" role="progressbar" style="width: ' . $persentaseTugas . '%" aria-valuenow="' . $persentaseTugas . '" aria-valuemin="0" aria-valuemax="100"></div>';
                            echo '</div>';

                        }
                        
                    }

                ?>
                <label>Mengerjakan Post-Test (<span class="float-right"><?php echo $persentaseposttest;  ?>%)</span></label>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $persentaseposttest; ?>%" aria-valuenow="<?php echo $persentaseposttest; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>


        </div>
        
        <!-- /.container-fluid -->
    </div>


       <div class="col-lg-6 mb-4">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ranking Siswa</h6>
            </div>
            <div class="card-body">
                                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Total Perolehan Score</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                   
                                    <?php

                                    $no = 1;
                                    foreach($ranking as $s){
                                        
                                        echo "<tr>";
                                        echo "<th scope = 'row'>".$s['ranking']."</th>";
                                        echo "<td>".$s['nama']."</td>";
                                        echo "<td>".$s['total_nilai']."</td>";
                                        echo "</tr>";
                                    }

                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        
        <!-- /.container-fluid -->
    </div>
    </div>

</div>
</div>
<!-- End of Main Content -->