<!-- List dari Siswa -->
<div class="row">
    <div class="col-md-13">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Report Nilai Pertemuan 4 </h4>
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
                                    <th scope="col">Text</th>
                                    <th scope="col">Upload</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Komentar</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Text</th>
                                    <th scope="col">Upload</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Komentar</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($hasiltugas as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama']; ?></td>
                                        <td><?= $j['text']; ?></td>
                                        <td> <a href="<?= base_url(); ?>assets/tugassiswa/<?= $j['upload']; ?>" <i class="fas fa-file-pdf"></i></a> </td>
                                        
                                        <td><?= $j['nilai']; ?></td>
                                        <td><?= $j['komentar']; ?></td>
                                        <td>
                                            <a href="<?= base_url('MenilaiPertemuan4/menilaiById/') . $j['id_hasiltugas']; ?>" >Edit</a>
                                            <?php
                                            if ($j['nilai'] != null || $j['komentar'] != null) {
                                                echo '<a href="' . base_url('MenilaiPertemuan4/deleteMenilai/') . $j['id_hasiltugas'] . '"  onclick="return confirm(\'Yakin nilai akan dihapus permanen?\');">Hapus</a>';
                                            }
                                            ?>
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