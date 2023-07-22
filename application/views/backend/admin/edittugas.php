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
        <?php echo form_open_multipart('kelolatugas/runedittugas'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_tugas" name="id_tugas" value="<?php echo $tugas['id_tugas'];  ?>">
            <input type="hidden" name="file_lama" id="file_lama" value="<?php echo $tugas['tugas'];  ?>">
    
            <label for="link">Pertemuan</label>
             <div class="input-group input-group-outline">
            <input type="text" class="form-control"  required id="pertemuan" name="pertemuan" value="<?php echo $tugas['id_pertemuan'];  ?>">
            </div>
            <label for="nilai">File Tugas</label>
            <div class="input-group input-group-outline">

            <a href="<?= base_url('assets/tugas/') . $tugas['tugas']; ?>" target="_blank">Lihat Tugas</a>
            </div>
            <div class="input-group input-group-outline">

            <input type="file" required class="form-control" id="tugas" name="tugas">
            </div>

        </div>
        <br>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->