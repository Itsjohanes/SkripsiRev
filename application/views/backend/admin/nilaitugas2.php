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
        <?php echo form_open_multipart('Admin/runMenilaiPertemuan2'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_hasiltugas" name="id_hasiltugas" value="<?php echo $pertemuan2['id_hasiltugas'];  ?>">
            <label for="text">Hasil Tugas</label>
            </br>
            <textarea id="text" disabled name="text" rows="3"><?php echo $pertemuan2['text']; ?></textarea>
            </br>
            <label for="text">File</label><br>
            <a href="<?= base_url(); ?>assets/tugassiswa/<?= $pertemuan2['upload']; ?>" <i class="fas fa-file-pdf"></i></a>
            <br>
            <label for="link">Nilai</label>
            <div class="input-group input-group-outline">
            <input type="text" class="form-control" id="nilai" name="nilai" value="<?php echo $pertemuan2['nilai'];  ?>"></div>
            <label for="nilai">Komentar</label>
            <div class="input-group input-group-outline">
            <input type="text" class="form-control" id="komentar" name="komentar" value="<?php echo $pertemuan2['komentar'];  ?>"></div>




        </div>

        <button type="submit" class="btn btn-primary">Menilai</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->