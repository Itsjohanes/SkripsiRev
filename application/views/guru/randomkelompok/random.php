  <?= $this->session->flashdata("message");
                            ?>
 
 <div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">List Siswa</h6>
              </div>
            </div>
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
                            <th scope="col">Pretest</th>
                            <th scope="col">Posttest</th>
                             <?php
                                for ($i = 1; $i <= $jumlahTugas; $i++) {
                                    if($pertemuan[$i] != null){
                                         echo "<th scope='col'>Tugas " . $i . "</th>";
                                     }
                                            
                                    }
                                    ?>
                            <?php
                              for ($i = 1; $i <= $jumlahTugas; $i++) {
                                    if($pertemuan[$i] != null){
                                      echo "<th scope='col'>Quiz " . $i . "</th>";
                                    }
                                            
                                    }
                              ?>                           

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Pretest</th>
                            <th scope="col">Posttest</th>    
                              <?php
                                for ($i = 1; $i <= $jumlahTugas; $i++) {
                                    if($pertemuan[$i] != null){
                                         echo "<th scope='col'>Tugas " . $i . "</th>";
                                     }
                                            
                                    }
                                    ?>
                            <?php
                              for ($i = 1; $i <= $jumlahTugas; $i++) {
                                    if($pertemuan[$i] != null){
                                      echo "<th scope='col'>Quiz " . $i . "</th>";
                                    }
                                            
                                    }
                              ?>                             

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $j = 1; ?>
                        <?php foreach ($siswa as $s) : ?>
                            <tr>
                                <th scope="row"><?= $j; ?></th>
                                <td><?= $s['nama']; ?></td>
                                <td><?= $s['email']; ?></td>
                                <!-- get nilai siswa from tb_nilai where id -->
                                <td><?= $s['pretest']; ?></td>
                                <td><?= $s['posttest']; ?></td>
                                        <?php
                                            for ($i = 1; $i <= $jumlahTugas; $i++) {
                                                if($pertemuan[$i] != null){
                                                    echo "<td>" . $s['tugas_' . $i] . "</td>";
                                                }
                                        }
                                        ?>
                                        <?php
                                            for ($i = 1; $i <= $jumlahTugas; $i++) {
                                                if($pertemuan[$i] != null){
                                                    echo "<td>" . $s['quiz_' . $i] . "</td>";
                                                }
                                        }
                                        ?>                                
                            </tr>
                            <?php $j++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form method="POST" action="<?php echo site_url('randomkelompok/runrandom'); ?>">
  <label for="jumlah_kelompok">Jumlah Kelompok:</label>
  <input type="number" name="jumlah_kelompok" id="jumlah_kelompok" min="1" required>
  <button type="submit" class = "btn btn-success">Proses</button>
</form>

    <a type="button" name="random" href="<?= base_url(); ?>randomkelompok/deleterandom" class=" btn btn-danger hapus-btn"><i class="fas fa-user-times"></i></a>

<form method="POST" action="<?php echo site_url('randomkelompok/tambahKelompok'); ?>">
    <select name="siswa" id="siswa">
        <?php
        foreach ($siswa as $namaSiswa) {
            echo "<option value=\"" . $namaSiswa['id'] . "\">" . $namaSiswa['nama'] . "</option>";
        }
        ?>
    </select>

    <br>

    <label for="jumlah_kelompok">Kelompok (1-50):</label>
    <input type="number" name="jumlah_kelompok" id="jumlah_kelompok" min="1" max="50" required>

    <br>

    <input type="submit" class = "btn btn-success" value="Tambah Kelompok">
</form>

    <?php
     
      
    


    if (empty($randoms)) {
        echo "<tr><td colspan='3'>Data tidak ditemukan</td></tr>";
    } else {
        $jumlahKelompok = $jumkel;
        $randoms = $this->db->get('tb_random')->result_array();
        for ($k = 1; $k <= $jumlahKelompok; $k++) {
         echo '<div class="container-fluid py-4">';
         echo '<div class="row">';
         echo '<div class="card my-4">';
         echo '<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">';
         echo '<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">';
         echo '<h6 class="text-white text-capitalize ps-3">'."Kelompok ".$k. '</h6>';
         echo '</div>';
         echo '</div>';
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>No.</th>";
        echo "<th scope='col'>ID</th>";
        echo "<th scope='col'>Nama Siswa</th>";
        echo "<th scope='col'>Kelompok</th>";
        echo "<th scope='col'>Aksi</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th scope='col'>No.</th>";
        echo "<th scope='col'>ID</th>";
        echo "<th scope='col'>Nama Siswa</th>";
        echo "<th scope='col'>Kelompok</th>";
        echo "<th scope='col'>Aksi</th>";
        echo "</tr>";
        echo "</tfoot>";
        echo "<tbody>";
        $i = 1;
        foreach ($randoms as $s) {
            if ($s['kelompok'] == $k) {
                echo "<tr>";
                echo "<th scope='row'>" . $i . "</th>";
                echo "<td>" . $s['id_user'] . "</td>";
                echo "<td>" . $s['nama'] . "</td>";
                echo "<td>" . $s['kelompok'] . "</td>";
                echo "<td><a type='button' name='random' href='" . base_url() . "randomkelompok/deleterandombyid/" . $s['id_random'] . "' class='btn btn-danger hapus-btn'><i class='fas fa-user-times'></i></a></td>";

                echo "</tr>";
                $i++;
            }
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
}
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
}
       
    



    ?>







    </div>