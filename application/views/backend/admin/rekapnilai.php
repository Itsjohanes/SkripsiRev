<!-- List dari Siswa -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Laporan Rekap Semua Nilai </h4>
            </div>
            <?php
            if ($this->session->flashdata('message')) {

                echo $this->session->flashdata('message');
            }
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Pre Test</th>
                                    <th scope="col">Tugas 1</th>
                                    <th scope="col">Tugas 2</th>
                                    <th scope="col">Tugas 3</th>
                                    <th scope="col">Tugas 4</th>
                                    <th scope="col">Post Test</th>


                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Pre Test</th>
                                    <th scope="col">Tugas 1</th>
                                    <th scope="col">Tugas 2</th>
                                    <th scope="col">Tugas 3</th>
                                    <th scope="col">Tugas 4</th>
                                    <th scope="col">Post Test</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($report as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama']; ?></td>
                                        <td><?= $j['pretest']; ?></td>
                                        <td><?= $j['tugas_1']; ?></td>
                                        <td><?= $j['tugas_2']; ?></td>
                                        <td><?= $j['tugas_3']; ?></td>
                                        <td><?= $j['tugas_4']; ?></td>
                                        <td><?= $j['posttest'];?></td>
                                       
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>