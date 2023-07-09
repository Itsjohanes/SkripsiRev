    <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Rapot Nilai </h6>
                </div>
                </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <a href = "<?php echo base_url('Rapot/cetakPDF');?>" class = "btn btn-success">Cetak PDF</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Pre-Test</th>
                                    <th scope="col">Post-Test</th>
                                    <th scope="col">Tugas 1</th>
                                    <th scope="col">Tugas 2</th>
                                    <th scope="col">Tugas 3</th>
                                    <th scope="col">Tugas 4</th>
                                </tr>
                            </thead>
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
                                        if ($tugas1 != 0) {
                                            echo  $tugas1['nilai'];
                                        } else {
                                            echo "Belum Dinilai";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($tugas2 != 0) {
                                            echo  $tugas2['nilai'];
                                        } else {
                                            echo "Belum Dinilai";
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($tugas3 != 0) {
                                            echo  $tugas3['nilai'];
                                        } else {
                                            echo "Belum Dinilai";
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($tugas4 != 0) {
                                            echo  $tugas4['nilai'];
                                        } else {
                                            echo "Belum Dinilai";
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
