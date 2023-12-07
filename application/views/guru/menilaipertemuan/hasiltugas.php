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
                    <h6 class="text-white text-capitalize ps-3">Raport Pertemuan  <?php echo $pertemuan;?> </h6>
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
                                    <th scope="col">Text</th>
                                    <th scope="col">Upload</th>
                                    <th scope="col">Nilai</th>
									<th scope="col">Penilaian</th>
                                    <th scope="col">Memahami Masalah</th>
                                    <th scope="col">Merencanakan Penyelesaian Masalah</th>
                                    <th scope="col">Melaksanakan Penyelesaian Masalah</th>
                                    <th scope="col">Memeriksa Kembali</th>
                                    <th scope="col">Nilai Sikap</th>
                                    <th scope="col">Penilaian Sikap</th>
                                    <th scope="col">Dikumpulkan Tanggal</th>
                                    <th scope="col">Diperbaiki Tanggal</th>
                                    <th scope="col">Dinilai Tanggal</th>
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
                                    <th scope="col">Penilaian</th>
                                     <th scope="col">Memahami Masalah</th>
                                    <th scope="col">Merencanakan Penyelesaian Masalah</th>
                                    <th scope="col">Melaksanakan Penyelesaian Masalah</th>
                                    <th scope="col">Memeriksa Kembali</th>                                   
                                    <th scope="col">Nilai Sikap</th>
                                    <th scope="col">Penilaian Sikap</th>
                                    <th scope="col">Dikumpulkan Tanggal</th>
                                    <th scope="col">Diperbaiki Tanggal</th>
                                    <th scope="col">Dinilai Tanggal</th>
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
                                        <td><?= $j['penilaian']; ?></td>
                                        <td><?= $j['memahami_masalah']; ?></td>
                                        <td><?= $j['merencanakan_pemecahan_masalah']; ?></td>
                                        <td><?= $j['melaksanakan_pemecahan_masalah']; ?></td>
                                        <td><?= $j['memeriksa_kembali']; ?></td>
                                        <td><?= $j['nilai_sikap']; ?></td>
                                        <td><?= $j['penilaian_sikap']; ?></td>
                                        <td><?= $j['created_at']; ?></td>
                                        <td><?= $j['updated_at']; ?></td>
                                        <td><?= $j['scored_at']; ?></td>
                                        <td><?= $j['komentar']; ?></td>
                                        <td>
                                            <a href="<?= base_url('menilaipertemuan/menilaibyid/') . $j['id_hasiltugas']; ?>" class="btn btn-warning" > <i class="fas fa-edit"> </i>    Edit</a>
                                            <?php
                                            if ($j['nilai'] != null || $j['komentar'] != null) {
                                                echo '<a href="' . base_url('menilaipertemuan/deletemenilai/') . $j['id_hasiltugas'] . '" class="btn btn-danger hapus-btn">Hapus</a>';

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