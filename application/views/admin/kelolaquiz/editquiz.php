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
        <?php echo form_open_multipart('kelolaquiz/runeditquiz'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id = "id_soal" name="id_soal" value="<?php echo $soal['id_soal'];  ?>">
            <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?php echo $soal['gambar'];  ?>">
            <label for="link">Soal</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" required id="soal" name="soal" value="<?php echo $soal['soal'];  ?>">
            </div>
            <label for="link">Pertemuan</label>
            <div class="input-group input-group-outline">
            <input type="text" class="form-control" required id="pertemuan" name="pertemuan" value="<?php echo $soal['id_pertemuan'];  ?>">
            </div>
            <label for
            <label for="nilai">Opsi A</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" required id="opsi_a" name="opsi_a" value="<?php echo $soal['opsi_a'];  ?>">
            </div>
            <label for="nilai">Opsi B</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" required id="opsi_b" name="opsi_b" value="<?php echo $soal['opsi_b'];  ?>">
            </div>
            <label for="nilai">Opsi C</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" required id="opsi_c" name="opsi_c" value="<?php echo $soal['opsi_c'];  ?>"></div>
            <label for="nilai">Opsi D</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" required id="opsi_d" name="opsi_d" value="<?php echo $soal['opsi_d'];  ?>"></div>
            <label for="nilai">Opsi E</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" required id="opsi_e" name="opsi_e" value="<?php echo $soal['opsi_e'];  ?>"></div>
            <label for="nilai">Kunci</label>
            <div class="input-group input-group-outline">
            <select required class="form-control" id="kunci" name="kunci">
                <option <?php echo ($soal['kunci'] === 'A') ? 'selected' : ''; ?>>A</option>
                <option <?php echo ($soal['kunci'] === 'B') ? 'selected' : ''; ?>>B</option>
                <option <?php echo ($soal['kunci'] === 'C') ? 'selected' : ''; ?>>C</option>
                <option <?php echo ($soal['kunci'] === 'D') ? 'selected' : ''; ?>>D</option>
                <option <?php echo ($soal['kunci'] === 'E') ? 'selected' : ''; ?>>E</option>
            </select>
            </div>
            <label for="nilai">Gambar</label>
            <div class="input-group input-group-outline">
            <?php
            if($soal['gambar'] != ''){
                echo '<img src="'.base_url('assets/img/quiz/'.$soal['gambar']).'" width="30%" height="30%"/>';
            }
            ?>
            
            <div class="input-group input-group-outline">
            <input type="file" class="form-control" id="gambar" name="gambar"></div>


        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->