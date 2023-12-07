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
                                        echo $pretest['score']."&nbsp"; 
                                        echo '<a href="' . base_url('rapot/pretest') . '" class="btn btn-info mb-2" style="padding: 5px 10px; font-size: 12px;"><i class="material-icons opacity-10">info</i></a>';


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
                                        echo $posttest['score']."&nbsp"; 
                                        echo '<a href="' . base_url('rapot/posttest') . '" class="btn btn-info mb-2" style="padding: 5px 10px; font-size: 12px;"><i class="material-icons opacity-10">info</i></a>';
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
                                            echo $quiz[$i]['nilai']."&nbsp"; 
                                            echo '<a href="' . base_url('rapot/quiz/') .$i. '" class="btn btn-info mb-2" style="padding: 5px 10px; font-size: 12px;"><i class="material-icons opacity-10">info</i></a>';

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
                                            echo '<a href="' . base_url('rapot/tugas/') .$i. '" class="btn btn-info mb-2" style="padding: 5px 10px; font-size: 12px;"><i class="material-icons opacity-10">info</i></a>';

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
                <h3> Perbandingan Nilai Pretest-Posttest</h3>
                <canvas id="nilaiChart" width="50" height="10"></canvas>

            </div>
        </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Ambil data dari PHP
    var dataFromPHP = <?php
       $pretest1 = $pretest['memahami_masalah'];
       $pretest2 = $pretest['merencanakan_pemecahan_masalah'];
       $pretest3 = $pretest['melaksanakan_pemecahan_masalah'];
       $pretest4 = $pretest['memeriksa_kembali'];
                            
       $posttest1 = $posttest['memahami_masalah'];
       $posttest2 = $posttest['merencanakan_pemecahan_masalah'];
       $posttest3 = $posttest['melaksanakan_pemecahan_masalah'];
       $posttest4 = $posttest['memeriksa_kembali'];
      $pretestData = [$pretest1, $pretest2, $pretest3, $pretest4];
      $posttestData = [$posttest1, $posttest2, $posttest3, $posttest4];

      // Jika data kosong, berikan nilai default
      if (empty($pretestData)) {
          $pretestData = [0, 0, 0, 0];
      }

      if (empty($posttestData)) {
          $posttestData = [0, 0, 0, 0];
      }

      // Konversi data ke format JSON
      $dataForView = [
          'labels' => ['Memahami Masalah', 'Merencanakan Pemecahan Masalah', 'Melaksanakan Pemecahan Masalah', 'Melihat Kembali'],
          'datasets' => [
              [
                  'label' => 'Pretest',
                  'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                  'borderColor' => 'rgba(75, 192, 192, 1)',
                  'borderWidth' => 1,
                  'data' => $pretestData,
              ],
              [
                  'label' => 'Posttest',
                  'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                  'borderColor' => 'rgba(255, 99, 132, 1)',
                  'borderWidth' => 1,
                  'data' => $posttestData,
              ],
          ],
      ];

      echo json_encode($dataForView);
    ?>;
    
    // Cek apakah ada data sebelum menggambar chart
    if (dataFromPHP && dataFromPHP.datasets[0].data.length > 0 && dataFromPHP.datasets[1].data.length > 0) {
      // Pengaturan chart
      var options = {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      };

      // Menggambar chart
      var ctx = document.getElementById('nilaiChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: dataFromPHP,
        options: options,
      });
    } else {
      // Tampilkan pesan atau tindakan lain jika data kosong
      console.log('Data kosong. Tidak dapat menggambar chart.');
    }
  </script>