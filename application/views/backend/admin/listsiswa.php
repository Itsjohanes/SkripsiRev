<!-- List dari Siswa -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> List Siswa </h4>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $s) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $s['nama']; ?></td>
                                        <td><?= $s['email']; ?></td>

                                        <td>
                                            <a href="<?= base_url(); ?>KelolaListSiswa/editSiswa/<?= $s['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>KelolaListSiswa/deleteSiswa/<?= $s['id']; ?>" onclick="return confirm('Anda yakin akan menghapus Siswa ini?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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