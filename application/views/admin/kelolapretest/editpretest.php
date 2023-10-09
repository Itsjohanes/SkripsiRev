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
        <?php echo form_open_multipart('kelolapretest/runeditpretest'); ?>
        <input type= "hidden" name = "id_pretest" value = "<?php echo $soal['id_soal'];?>">
        <div class="form-group">
            <div class="row">
                    <div class="col">
                        <label for="waktu">Soal </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Soal" id="soal" name="soal" value="<?php echo $soal['soal'];?>"">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <label for="exampleFormControlSelect1">Opsi Jawaban A</label><select class="form-control" id="exampleFormControlSelect1" name="pilihana">
                        <option>Pilih Salah Satu</option>
                        <option>Text</option>
                        <option>Gambar</option>
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <textarea required class="form-control" placeholder="Opsi A" id="opsia_tulisan" name="a"> <?php echo $soal['opsi_a'];?> </textarea>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <img src="<?= base_url('assets/img/pretest/' . $soal['opsi_a']); ?>" width="100px" id = "gambar_a" alt="Gambar Opsi A">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="file" class="form-control" id="opsia_gambar" name="a" />
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for="exampleFormControlSelect1">Opsi Jawaban B</label><select class="form-control" id="exampleFormControlSelect2" name="pilihanb">
                        <option>Pilih Salah Satu</option>
                        <option>Text</option>
                        <option>Gambar</option>
                    </select>
                    </div>
                </div>  
                <div class="row"> 
                    <div class="col">
                        <div class="input-group input-group-outline"> 
                        <textarea required class="form-control" placeholder="Opsi B" id="opsib_tulisan" name="b"> <?php echo $soal['opsi_b'];?> </textarea>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <img src="<?= base_url('assets/img/pretest/' . $soal['opsi_b']); ?>" width="100px" id = "gambar_b" alt="Gambar Opsi B">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="file" class="form-control" id="opsib_gambar" name="b" />
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for="exampleFormControlSelect1">Opsi Jawaban C</label><select class="form-control" id="exampleFormControlSelect3" name="pilihanc">
                        <option>Pilih Salah Satu</option>
                        <option>Text</option>
                        <option>Gambar</option>
                    </select>
                    </div>
                </div>  
                <div class="row"> 
                    <div class="col">
                         <div class="input-group input-group-outline">
                        <textarea  required class="form-control" placeholder="Opsi C" id="opsic_tulisan" name="c"> <?php echo $soal['opsi_c'];?> </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <img src="<?= base_url('assets/img/pretest/' . $soal['opsi_c']); ?>" width="100px" id = "gambar_c" alt="Gambar Opsi C">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="file" class="form-control" id="opsic_gambar" name="c" />
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for="exampleFormControlSelect1">Opsi Jawaban D</label><select class="form-control" id="exampleFormControlSelect4" name="pilihand">
                        <option>Pilih Salah Satu</option>
                        <option>Text</option>
                        <option>Gambar</option>
                    </select>
                    </div>
                </div>  
                <div class="row"> 
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <textarea required class="form-control" placeholder="Opsi D" id="opsid_tulisan" name="d"><?php echo $soal['opsi_d'];?></textarea>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <img src="<?= base_url('assets/img/pretest/' . $soal['opsi_d']); ?>" width="100px" id = "gambar_d" alt="Gambar Opsi D">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="file" class="form-control" id="opsid_gambar" name="d" />
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for="exampleFormControlSelect1">Opsi Jawaban E</label><select class="form-control" id="exampleFormControlSelect5" name="pilihane">
                        <option>Pilih Salah Satu</option>
                        <option>Text</option>
                        <option>Gambar</option>
                    </select>
                    </div>
                </div>  
                <div class="row"> 
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <textarea required class="form-control" placeholder="Opsi E" id="opsie_tulisan" name="e"><?php echo $soal['opsi_e'];?></textarea>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <img src="<?= base_url('assets/img/pretest/' . $soal['opsi_e']); ?>" width="100px" id = "gambar_e" alt="Gambar Opsi E">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="file" class="form-control" id="opsie_gambar" name="e" />
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="waktu">Kunci </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <select  required class="form-control"  id="kunci" name="kunci">
 <?php
                            if ($soal['kunci'] == 'A') {
                                echo '<option selected="selected">A</option>';
                            } else {
                                echo '<option>A</option>';
                            }
                            ?>
                            <?php
                            if ($soal['kunci'] == 'B') {
                                echo '<option selected="selected">B</option>';
                            } else {
                                echo '<option>B</option>';
                            }
                            ?>
                            <?php
                            if ($soal['kunci'] == 'C') {
                                echo '<option selected="selected">C</option>';
                            } else {
                                echo '<option>C</option>';
                            }
                            ?>
                            <?php
                            if ($soal['kunci'] == 'D') {
                                echo '<option selected="selected">D</option>';
                            } else {
                                echo '<option>D</option>';
                            }
                            ?>
                            <?php
                            if ($soal['kunci'] == 'E') {
                                echo '<option selected="selected">E</option>';
                            } else {
                                echo '<option>E</option>';
                            }
                            ?>

                        </select>
                    </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col">
                        <label for="waktu">Gambar </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="file"  id="formFile" name="gambar" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <img src = "<?php echo base_url('assets/img/pretest/').$soal['gambar'];?>" width = '300px' width = '150px' alt = "Tidak ada gambar"> </img>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
                    </div>
                </div>
        </form>
    </div>
</div>

</div>
<script>
    $(document).ready(function() {
        $('#opsia_tulisan').hide();
        $('#opsia_gambar').hide();
        $('#gambar_a').hide();

        $('#opsib_tulisan').hide();
        $('#opsib_gambar').hide();
        $('#gambar_b').hide();

        $('#opsic_tulisan').hide();
        $('#opsic_gambar').hide();
        $('#gambar_c').hide();

        $('#opsid_tulisan').hide();
        $('#opsid_gambar').hide();
        $('#gambar_d').hide();

        $('#opsie_tulisan').hide();
        $('#opsie_gambar').hide();
        $('#gambar_e').hide();

        $('#exampleFormControlSelect1').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsia_gambar').hide();
                $('#gambar_a').hide();
                $('#opsia_tulisan').show();
            } else if (selectedOption == 'Gambar') {
                $('#opsia_tulisan').hide();
                $('#opsia_gambar').show();
                $('#gambar_a').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsia_tulisan').hide();
                $('#opsia_gambar').hide();
                $('#gambar_a').hide();
                


            }
        });


        $('#exampleFormControlSelect2').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsib_gambar').hide();
                $('#gambar_b').hide();
                $('#opsib_tulisan').show();
            } else if (selectedOption == 'Gambar') {
                $('#opsib_tulisan').hide();
                $('#opsib_gambar').show();
                $('#gambar_b').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsib_tulisan').hide();
                $('#opsib_gambar').hide();
                $('#gambar_b').hide();


            }
        });

        $('#exampleFormControlSelect3').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsic_gambar').hide();
                $('#opsic_tulisan').show();
                $('#gambar_c').hide();
            } else if (selectedOption == 'Gambar') {
                $('#opsic_tulisan').hide();
                $('#opsic_gambar').show();
                $('#gambar_c').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsic_tulisan').hide();
                $('#opsic_gambar').hide();
                $('#gambar_c').hide();


            }
        });




        $('#exampleFormControlSelect4').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsid_gambar').hide();
                $('#opsid_tulisan').show();
                $('#gambar_d').hide();
            } else if (selectedOption == 'Gambar') {
                $('#opsid_tulisan').hide();
                $('#opsid_gambar').show();
                $('#gambar_d').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsid_tulisan').hide();
                $('#opsid_gambar').hide();
                $('#gambar_d').hide();


            }
        });
        $('#exampleFormControlSelect5').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsie_gambar').hide();
                $('#opsie_tulisan').show();
                $('#gambar_e').hide();
            } else if (selectedOption == 'Gambar') {
                $('#opse_tulisan').hide();
                $('#opsie_gambar').show();
                $('#gambar_e').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsie_tulisan').hide();
                $('#opsie_gambar').hide();
                $('#gambar_e').hide();


            }
        });




    });
</script>
