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
        <?php echo form_open_multipart('KelolaYoutube/runEditYoutube'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?php echo $materi['id_materi'];  ?>">
            <label for="link">Pertemuan</label>
            <div class="input-group input-group-outline">
            <select required class="form-control" id="exampleFormControlSelect1" id="pertemuan" name="pertemuan">
                <?php
                if ($materi['pertemuan'] == 1) {
                    echo '<option value="1" selected>1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                } else if ($materi['pertemuan'] == 2) {
                    echo '<option value="1">1</option>';
                    echo '<option value="2" selected>2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                } else if ($materi['pertemuan'] == 3) {
                    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3" selected>3</option>';
                    echo '<option value="4">4</option>';
                } else if ($materi['pertemuan'] == 4) {
                    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4" selected>4</option>';
                }
                ?>


            </select>
            </div>
            <label for="nilai">Link Youtube</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" id="youtube" name="youtube" value="<?php echo $materi['youtube'];  ?>">
            </div>
            <label for="nilai">Video</label>
            <br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $materi['youtube']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->