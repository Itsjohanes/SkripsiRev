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
        <?php echo form_open_multipart('KelolaTugas/runEditTugas'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_tugas" name="id_tugas" value="<?php echo $tugas['id_tugas'];  ?>">
            <input type="hidden" name="file_lama" id="file_lama" value="<?php echo $tugas['tugas'];  ?>">
    
            <label for="link">Pertemuan</label>
             <div class="input-group input-group-outline">

            <select class="form-control" required id="exampleFormControlSelect1" id="pertemuan" name="pertemuan">
                <?php
                if ($tugas['pertemuan'] == 1) {
                    echo '<option value="1" selected>1</option>';
                } else {
                    echo '<option value="1" >1</option>';
                }
                if ($tugas['pertemuan'] == 2) {
                    echo '<option value="2" selected>2</option>';
                } else {
                    echo '<option value="2" >2</option>';
                }
                if ($tugas['pertemuan'] == 3) {
                    echo '<option value="3" selected>3</option>';
                } else {
                    echo '<option value="3" >3</option>';
                }
                if ($tugas['pertemuan'] == 4) {
                    echo '<option value="4" selected>4</option>';
                } else {
                    echo '<option value="4" >4</option>';
                }

                ?>


            </select>
            </div>
            <label for="nilai">File Tugas</label>
            <div class="input-group input-group-outline">

            <a href="<?= base_url('assets/tugas/') . $tugas['tugas']; ?>" target="_blank">Lihat Tugas</a>
            </div>
                        <div class="input-group input-group-outline">

            <input type="file" class="form-control" id="tugas" name="tugas">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->