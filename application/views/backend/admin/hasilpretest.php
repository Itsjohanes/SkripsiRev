<!-- List dari Siswa -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Report Nilai Pre-Test </h4>
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
                                    <th scope="col">Jawaban</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Benar</th>
                                    <th scope="col">Salah</th>
                                    <th scope="col">Kosong</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Jawaban</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Benar</th>
                                    <th scope="col">Salah</th>
                                    <th scope="col">Kosong</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pretest as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama']; ?></td>
                                        <td><?= $j['jawaban']; ?></td>
                                        <td><?= $j['score']; ?></td>
                                        <td><?= $j['benar']; ?></td>
                                        <td><?= $j['salah']; ?></td>
                                        <td><?= $j['kosong']; ?></td>
                                        <td>
                                            <a class="btn btn-danger" href="<?= base_url('MenilaiPretest/hapusHasilPretest/') . $j['id_hasiltest']; ?>" onclick="return confirm('Anda yakin menghapus hasil test ini?');"><i class="fas fa-trash-alt"></i></a>
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