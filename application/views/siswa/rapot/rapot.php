<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Rapot Nilai </h6>
                </div>
            </div>
            <div class="container mt-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3"></div>
                    <div class="card-body">
                        <a href="<?php echo base_url('rapot/cetakpdf'); ?>" class="btn btn-success mb-3">Cetak PDF</a>
                        <table class="table">
                            <tr>
                                <th>Pre-Test</th>
                                <td>
                                    <?php
                                    if ($pretest != null) {
                                        echo $pretest['score'];
                                    } else {
                                        echo "Belum Mengikuti Pretest";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Post-Test</th>
                                <td>
                                    <?php
                                    if ($posttest != null) {
                                        echo $posttest['score'];
                                    } else {
                                        echo "Belum Mengikuti Posttest";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            for ($i = 1; $i <= $maxpertemuan; $i++) {
                                if ($pertemuan[$i] != null) {
                                    echo "<tr>";
                                    echo "<th>Quiz " . $i . "</th>";
                                    echo "<td>";
                                    if ($quiz[$i] != null) {
                                        if ($quiz[$i]['nilai'] == null) {
                                            echo "Belum Dinilai";
                                        } else {
                                            echo $quiz[$i]['nilai'];
                                        }
                                    } else {
                                        echo "Belum Dikerjakan";
                                    }
                                    echo "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th>Tugas " . $i . "</th>";
                                    echo "<td>";
                                    if ($tugas[$i] != null) {
                                        if ($tugas[$i]['nilai'] == null) {
                                            echo "Belum Dinilai";
                                        } else {
                                            echo $tugas[$i]['nilai'];
                                        }
                                    } else {
                                        echo "Belum Dikerjakan";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
