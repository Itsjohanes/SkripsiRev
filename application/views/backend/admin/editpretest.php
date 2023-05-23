<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('Admin/runEditPreTest'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_pretest" name="id_pretest" value="<?php echo $soal['id_pretest'];  ?>">
            <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?php echo $soal['gambar'];  ?>">
            <label for="link">Soal</label>
            <input type="text" required class="form-control" required id="soal" name="soal" value="<?php echo $soal['soal'];  ?>">
            <label for="nilai">Opsi A</label>
            <input type="text" required class="form-control" required id="opsi_a" name="opsi_a" value="<?php echo $soal['opsi_a'];  ?>">
            <label for="nilai">Opsi B</label>
            <input type="text" required class="form-control" required id="opsi_b" name="opsi_b" value="<?php echo $soal['opsi_b'];  ?>">
            <label for="nilai">Opsi C</label>
            <input type="text" required class="form-control" required id="opsi_c" name="opsi_c" value="<?php echo $soal['opsi_c'];  ?>">
            <label for="nilai">Opsi D</label>
            <input type="text" required class="form-control" required id="opsi_d" name="opsi_d" value="<?php echo $soal['opsi_d'];  ?>">
            <label for="nilai">Opsi E</label>
            <input type="text" required class="form-control" required id="opsi_e" name="opsi_e" value="<?php echo $soal['opsi_e'];  ?>">
            <label for="nilai">Kunci</label>
            <input type="text" required class="form-control" required id="kunci" name="kunci" value="<?php echo $soal['kunci'];  ?>">
            <label for="nilai">Gambar</label>
            <a href="<?= base_url('assets/img/pretest/') . $soal['gambar']; ?>" target="_blank">Lihat Gambar</a>
            <input type="file" class="form-control" id="gambar" name="gambar">


        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->