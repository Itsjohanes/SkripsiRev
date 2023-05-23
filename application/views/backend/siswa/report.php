<!-- List dari Siswa -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Report Nilai </h4>
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
                                    <th scope="col">Pretest</th>
                                    <th scope="col">Posttest</th>
                                    <th scope="col">Tugas 1</th>
                                    <th scope="col">Tugas 2</th>
                                    <th scope="col">Tugas 3</th>
                                    <th scope="col">Tugas 4</th>


                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Pretest</th>
                                    <th scope="col">Posttest</th>
                                    <th scope="col">Tugas 1</th>
                                    <th scope="col">Tugas 2</th>
                                    <th scope="col">Tugas 3</th>
                                    <th scope="col">Tugas 4</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <?php
                                        if ($pretest != null) {
                                            echo  $pretest['score'];
                                        } else {
                                            echo "Belum Mengikuti Pretest";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($posttest != null) {
                                            echo  $posttest['score'];
                                        } else {
                                            echo "Belum Mengikuti Posttest";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($tugas1 != null) {
                                            echo  $tugas1['nilai'];
                                        } else {
                                            echo "Belum Mengikuti Tugas 1";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($tugas2 != null) {
                                            echo  $tugas2['nilai'];
                                        } else {
                                            echo "Belum Mengikuti Tugas 2";
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($tugas3 != null) {
                                            echo  $tugas3['nilai'];
                                        } else {
                                            echo "Belum Mengikuti Tugas 3";
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($tugas4 != null) {
                                            echo  $tugas4['nilai'];
                                        } else {
                                            echo "Belum Mengikuti Tugas 4";
                                        }
                                        ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>