    <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Raport Post-Test</h6>
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
                  <a href = "<?php echo base_url('menilaiposttest/cetakexcel');?>" class = "btn btn-success">Cetak Excel</a>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Jawaban</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Benar</th>
                                    <th scope="col">Salah</th>
                                    <th scope="col">Kosong</th>
                                    <th scope="col">Memahami Masalah</th>
                                    <th scope="col">Merencanakan Pemecahan Masalah</th>
                                    <th scope="col">Melaksanakan Pemecahan Masalah</th>
                                    <th scope="col">Memeriksa Kembali</th>
                                    <th scope="col">Timestamp</th>
                                    <th scope="col">Action</th>



                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($posttest as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama']; ?></td>
                                        <td><?= $j['jawaban']; ?></td>
                                        <td><?= $j['score']; ?></td>
                                        <td><?= $j['benar']; ?></td>
                                        <td><?= $j['salah']; ?></td>
                                        <td><?= $j['kosong']; ?></td>
                                        <td><?= $j['memahami_masalah']; ?></td>
                                        <td><?= $j['merencanakan_pemecahan_masalah']; ?></td>
                                        <td><?= $j['melaksanakan_pemecahan_masalah']; ?></td>
                                        <td><?= $j['memeriksa_kembali']; ?></td>
                                        <td><?= $j['created_at'];?></td>
                                        <td>
                                            <a class="btn btn-danger hapus-btn" href="<?= base_url('menilaiposttest/hapushasilposttest/') . $j['id_hasiltest']; ?>" ><i class="fas fa-trash-alt"> </i></a>
                                        </td>
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