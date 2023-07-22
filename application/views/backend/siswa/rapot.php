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
                    <a href = "<?php echo base_url('rapot/cetakpdf');?>" class = "btn btn-success">Cetak PDF</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Pre-Test</th>
                                    <th scope="col">Post-Test</th>
                                    <?php
                                        for ($i = 1; $i <= $maxpertemuan; $i++) {
                                            if($pertemuan[$i] != null){
                                                echo "<th scope='col'>Tugas " . $i . "</th>";
                                            }
                                            
                                        }
                                        ?>

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
                                         <?php
                                        for ($i = 1; $i <= $maxpertemuan; $i++) {
                                            if($pertemuan[$i] != null){
                                            echo "<td>";
                                            if ($tugas[$i] != null) {
                                                if($tugas[$i]['nilai'] == null){
                                                    echo "Belum Dinilai";
                                                }else{
                                                    echo $tugas[$i]['nilai'];

                                                }
                                                
                                            } else {
                                                echo "Belum Dikerjakan";
                                            }
                                            echo "</td>";
                                        }
                                    }
                                        ?>   
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
