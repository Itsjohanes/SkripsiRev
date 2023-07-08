    <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Laporan Semua Nilai</h6>
                </div>
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
                    <a class = "btn btn-success"  href = "<?php echo base_url('RekapNilai/cetakPDF');?>" >Cetak PDF</a>
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