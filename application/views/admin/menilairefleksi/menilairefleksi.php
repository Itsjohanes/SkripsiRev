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
                    <h6 class="text-white text-capitalize ps-3">Hasil Refleksi</h6>
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
                                    <th scope="col">Seberapa Paham</th>
                                    <th scope="col">Seberapa Baik</th>
                                    <th scope="col">Seberapa Sulit</th>
                                    <th scope="col">Seberapa Cukup</th>
                                    <th scope="col">Penghambat</th>
                                    <th scope="col">Saran</th>
                                    <th scope="col">Komentar</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Seberapa Paham</th>
                                    <th scope="col">Seberapa Baik</th>
                                    <th scope="col">Seberapa Sulit</th>
                                    <th scope="col">Seberapa Cukup</th>
                                    <th scope="col">Penghambat</th>
                                    <th scope="col">Saran</th>
                                    <th scope="col">Komentar</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($refleksi as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama']; ?></td>
                                        <td><?= $j['seberapa_paham']; ?></td>
                                        <td><?= $j['seberapa_baik']; ?></td>
                                        <td><?= $j['seberapa_sulit']; ?></td>
                                        <td><?= $j['seberapa_cukup']; ?></td>
                                        <td><?= $j['penghambat']; ?></td>
                                        <td><?= $j['saran']; ?></td>
                                        <td><?= $j['komentar']; ?></td>  
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