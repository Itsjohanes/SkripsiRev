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
        <?php echo form_open_multipart('kelolapertemuan/runedittp'); ?>
        <div class="form-group">
            <label for="link">Pertemuan</label>
            <div class="input-group input-group-outline">
            <input type = "hidden" value = "<?php echo $materi['id_pertemuan'];?>" name = "id_pertemuan" id = "id_pertemuan">
            <select required class="form-control" disabled id="exampleFormControlSelect1" id="pertemuan" name="pertemuan">
                <?php
                if ($materi['id_pertemuan'] == 1) {
                    echo '<option value="1" selected>1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                } else if ($materi['id_pertemuan'] == 2) {
                    echo '<option value="1">1</option>';
                    echo '<option value="2" selected>2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                } else if ($materi['id_pertemuan'] == 3) {
                    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3" selected>3</option>';
                    echo '<option value="4">4</option>';
                } else if ($materi['id_pertemuan'] == 4) {
                    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4" selected>4</option>';
                }
                ?>


            </select>
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