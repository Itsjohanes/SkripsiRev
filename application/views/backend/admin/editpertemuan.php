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
        <?php echo form_open_multipart('kelolapertemuan/runeditpertemuan'); ?>
        <div class="form-group">
            <label for="link">Pertemuan</label>
            <div class="input-group input-group-outline">
            <input type = "hidden" value = "<?php echo $materi['id_pertemuan'];?>" name = "id_pertemuan" id = "id_pertemuan">
            <div class="input-group input-group-outline">
            <input type = "text" required class="form-control" disabled id = "pertemuan" name = "pertemuan" value = "<?php echo $materi['pertemuan'];?>">
            </div>
            <label for="nilai">Video Conference Link</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" id="link" name="link" value="<?php echo $materi['videoconference'];  ?>">
            </div>
            <label for="nilai">Tujuan Pembelajaran</label>
            <div class="input-group input-group-outline">
            <textarea type="textarea" required class="form-control" id="tp" name="tp"><?php echo $materi['tp'];  ?></textarea>
            </div>
            

        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->