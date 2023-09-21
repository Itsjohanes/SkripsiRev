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
                                    <th scope="col">Timestamp</th>
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
                                    <th scope="col">Timestamp</th>
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
                                        <td><?= $j['timestamp'];?></td>
  
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