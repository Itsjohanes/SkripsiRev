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


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $s) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $s['nama']; ?></td>
                                <td><?= $s['email']; ?></td>



                            </tr>
                            <?php $i++; ?>
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

    <a type="button" name="random" href="<?= base_url(); ?>randomkelompok/deleterandom" class=" btn btn-danger"><i class="fas fa-user-times"></i></a>



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
        echo "</tr>";
        echo "</thead>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th scope='col'>No.</th>";
        echo "<th scope='col'>ID</th>";
        echo "<th scope='col'>Nama Siswa</th>";
        echo "<th scope='col'>Kelompok</th>";
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