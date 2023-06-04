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

    <a type="button" name="random" href="<?= base_url(); ?>Admin/runRandom" class=" btn btn-primary"><i class="fas fa-random"></i></a>
    <a type="button" name="random" href="<?= base_url(); ?>Admin/deleteRandom" class=" btn btn-danger"><i class="fas fa-user-times"></i></a>



    <?php
    echo "<h2>Daftar Kelompok Hasil Acak</h2>";


    if (empty($randoms)) {
        echo "<tr><td colspan='3'>Data tidak ditemukan</td></tr>";
    } else {
        echo "<h3>Kelompok 1 " . "</h3>";
        echo "<div class='card shadow mb-4'>";
        echo "<div class='card-header py-3'>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</tfoot>";
        echo "<tbody>";
        $i = 1;
        foreach ($randoms as $s) {
            //Jika ada siswa dalam kelompok yang sama tabel tidak perlu di print ulang


            if ($s['kelompok'] == 1) {
                echo "<tr>";
                echo "<th scope = 'row'>" . $i . "</th>";
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

        //Kelompok 2
        echo "<h3>Kelompok 2 " . "</h3>";
        echo "<div class='card shadow mb-4'>";
        echo "<div class='card-header py-3'>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</tfoot>";
        echo "<tbody>";
        $i = 1;
        foreach ($randoms as $s) {
            //Jika ada siswa dalam kelompok yang sama tabel tidak perlu di print ulang


            if ($s['kelompok'] == 2) {
                echo "<tr>";
                echo "<th scope = 'row'>" . $i . "</th>";
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


        //Kelompok 3
        echo "<h3>Kelompok 3 " . "</h3>";
        echo "<div class='card shadow mb-4'>";
        echo "<div class='card-header py-3'>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</tfoot>";
        echo "<tbody>";
        $i = 1;
        foreach ($randoms as $s) {
            //Jika ada siswa dalam kelompok yang sama tabel tidak perlu di print ulang


            if ($s['kelompok'] == 3) {
                echo "<tr>";
                echo "<th scope = 'row'>" . $i . "</th>";
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

        //kelompok 4
        echo "<h3>Kelompok 4 " . "</h3>";
        echo "<div class='card shadow mb-4'>";
        echo "<div class='card-header py-3'>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</tfoot>";
        echo "<tbody>";
        $i = 1;
        foreach ($randoms as $s) {
            //Jika ada siswa dalam kelompok yang sama tabel tidak perlu di print ulang


            if ($s['kelompok'] == 4) {
                echo "<tr>";
                echo "<th scope = 'row'>" . $i . "</th>";
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
        //kelompok 5
        echo "<h3>Kelompok 5 " . "</h3>";
        echo "<div class='card shadow mb-4'>";
        echo "<div class='card-header py-3'>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</tfoot>";
        echo "<tbody>";
        $i = 1;
        foreach ($randoms as $s) {
            //Jika ada siswa dalam kelompok yang sama tabel tidak perlu di print ulang


            if ($s['kelompok'] == 5) {
                echo "<tr>";
                echo "<th scope = 'row'>" . $i . "</th>";
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
        //kelompok 6
        echo "<h3>Kelompok 6 " . "</h3>";
        echo "<div class='card shadow mb-4'>";
        echo "<div class='card-header py-3'>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tfoot>";
        echo "<tr>";
        echo "<th scope = 'col'>No.</th>";
        echo "<th scope = 'col'>ID</th>";
        echo "<th scope = 'col'>Nama Siswa</th>";
        echo "<th scope = 'col'>Kelompok</th>";
        echo "</tr>";
        echo "</tfoot>";
        echo "<tbody>";
        $i = 1;
        foreach ($randoms as $s) {
            //Jika ada siswa dalam kelompok yang sama tabel tidak perlu di print ulang


            if ($s['kelompok'] == 6) {
                echo "<tr>";
                echo "<th scope = 'row'>" . $i . "</th>";
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



    ?>







    </div>