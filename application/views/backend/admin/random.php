    <h2>List Siswa</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama</th>


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $s) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $s['email']; ?></td>
                                <td><?= $s['nama']; ?></td>



                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form method="POST" action="<?php echo site_url('RandomKelompok/runRandom'); ?>">
  <label for="jumlah_kelompok">Jumlah Kelompok:</label>
  <input type="number" name="jumlah_kelompok" id="jumlah_kelompok" min="1" required>
  <button type="submit">Proses</button>
</form>

    <a type="button" name="random" href="<?= base_url(); ?>RandomKelompok/deleteRandom" class=" btn btn-danger"><i class="fas fa-user-times"></i></a>



    <?php


    if (empty($randoms)) {
        echo "<tr><td colspan='3'>Data tidak ditemukan</td></tr>";
    } else {
        $jumlahKelompok = $jumkel;
        $randoms = $this->db->get('tb_random')->result_array();

        for ($k = 1; $k <= $jumlahKelompok; $k++) {
        echo "<h3>Kelompok " . $k . "</h3>";
        echo "<div class='card shadow mb-4'>";
        echo "<div class='card-header py-3'>";
        echo "</div>";
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