    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

    .table-responsive td {
        word-wrap: break-word;
        white-space: normal;
    } 
</style>
    <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Raport Quiz</h6>
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
                                    <th scope="col">Melihat Kembali</th>
                                    <th scope="col">Timestamp</th>
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
                                    <th scope="col">Memahami Masalah</th>
                                    <th scope="col">Merencanakan Pemecahan Masalah</th>
                                    <th scope="col">Melaksanakan Pemecahan Masalah</th>
                                    <th scope="col">Melihat Kembali</th>
                                    <th scope="col">Timestamp</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($quiz as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama']; ?></td>
                                        <td><?= $j['jawaban']; ?></td>
                                        <td><?= $j['nilai']; ?></td>
                                        <td><?= $j['benar']; ?></td>
                                        <td><?= $j['salah']; ?></td>
                                        <td><?= $j['kosong']; ?></td>
                                        <td><?= $j['memahami_masalah']; ?></td>
                                        <td><?= $j['merencanakan_pemecahan_masalah']; ?></td>
                                        <td><?= $j['melaksanakan_pemecahan_masalah']; ?></td>
                                        <td><?= $j['memeriksa_kembali']; ?></td>
                                        <td><?= $j['timestamp'];?></td>
                                        <td>
                                            <a href="<?= base_url('menilaiquiz/delete/') . $j['id_hasilquiz']; ?>" class="btn btn-info btn-sm hapus-btn">Hapus</a>
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