<!-- Begin Page Content -->

<link rel="stylesheet" href="<?= base_url('assets/css/slider.css'); ?>">
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <?= $this->session->flashdata("message");
                            ?>
    <div class="row no-gutters">

        <br>
 <div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Atur Pre-Test</h6>
              </div>
            </div>
            
            <br>
            <div class="card-body">

                    <form id="myForm" method="post" action="<?php echo base_url('kelolapretest/pretesthandler');?>">
                    <div class="row">
                    <div class="col">
                        <label for="waktu">Aktifkan Pre-test </label>
                    </div>
                    </div>
                    <label class="switch">
                    <?php
                    if($aktif['aktif'] == 1){
                        echo "<input type='checkbox' name = 'pretes' id = 'pretes' value='1' checked>";
                    }else{
                        echo "<input type='checkbox' name = 'pretes' id = 'pretes' value='1'>";
                    }
                    ?>
                <span class="slider round"></span>
                </form>
                    
                </label>
                <br>
                <form method="post" action="<?php echo base_url('kelolapretest/aturwaktu');?>">
                    <div class="row">
                    <div class="col">
                        <label for="waktu">Waktu dalam menit </label>
                    </div>
                    </div>

                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="number" required class="form-control" placeholder="Waktu Pre-Test" id="waktu" name="waktu" value="<?php echo $aktif['waktu'];?>">
                        </div>
                    </div>
                    <div class="col">
                    <input type = "submit" class = "btn btn-success">
                    </div>
                </form>

         </div>
         </div>
        </div>
    </div>
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Tambah Pre-Test</h6>
                </div>
                </div>
                <br>
                <div class="card-body">
                <?php echo form_open_multipart('kelolapretest/tambahpretest'); ?>
                <div class="row">
                    <div class="col">
                        <label for="waktu">Soal </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Soal" id="soal" name="soal">
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
                        <textarea required class="form-control" placeholder="Opsi A" id="opsia_tulisan" name="a"> </textarea>
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
                        <textarea required class="form-control" placeholder="Opsi B" id="opsib_tulisan" name="b"> </textarea>
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
                        <textarea  required class="form-control" placeholder="Opsi C" id="opsic_tulisan" name="c"> </textarea>
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
                        <textarea required class="form-control" placeholder="Opsi D" id="opsid_tulisan" name="d"> </textarea>
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
                        <textarea required class="form-control" placeholder="Opsi E" id="opsie_tulisan" name="e"> </textarea>
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
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
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
                <br>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
                    </div>
                </div>
                </div>

                </div>
            </div>
        </div>






            <!-- Page Heading -->

            <!-- DataTales Example -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Soal Pre-Test</h6>
                </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Soal</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Opsi A</th>
                                    <th scope="col">Opsi B</th>
                                    <th scope="col">Opsi C</th>
                                    <th scope="col">Opsi D</th>
                                    <th scope="col">Opsi E</th>
                                    <th scope="col">Kunci</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Soal</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Opsi A</th>
                                    <th scope="col">Opsi B</th>
                                    <th scope="col">Opsi C</th>
                                    <th scope="col">Opsi D</th>
                                    <th scope="col">Opsi E</th>
                                    <th scope="col">Kunci</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($soal as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['soal']; ?></td>
                                        <td><img src = "<?php echo base_url('assets/img/pretest/').$j['gambar'];?>" width = '300px' width = '150px' alt = "Tidak ada gambar"> </img></td>
                                        <td>
                                        <?php if (!empty($j['opsi_a'])) : ?>
                                            <?php if (file_exists('assets/img/opsipretest/' . $j['opsi_a'])) : ?>
                                                <img src="<?= base_url('assets/img/opsipretest/' . $j['opsi_a']); ?>" width="100px" alt="Gambar Opsi A">
                                            <?php else : ?>
                                                <?= nl2br(htmlspecialchars($j['opsi_a'])); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if (!empty($j['opsi_b'])) : ?>
                                            <?php if (file_exists('assets/img/opsipretest/' . $j['opsi_b'])) : ?>
                                                <img src="<?= base_url('assets/img/opsipretest/' . $j['opsi_b']); ?>" width="100px" alt="Gambar Opsi B">
                                            <?php else : ?>
                                                <?= nl2br(htmlspecialchars($j['opsi_b'])); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if (!empty($j['opsi_c'])) : ?>
                                            <?php if (file_exists('assets/img/opsipretest/' . $j['opsi_c'])) : ?>
                                                <img src="<?= base_url('assets/img/opsipretest/' . $j['opsi_c']); ?>" width="100px" alt="Gambar Opsi C">
                                            <?php else : ?>
                                                <?= nl2br(htmlspecialchars($j['opsi_c'])); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if (!empty($j['opsi_d'])) : ?>
                                            <?php if (file_exists('assets/img/opsipretest/' . $j['opsi_d'])) : ?>
                                                <img src="<?= base_url('assets/img/opsipretest/' . $j['opsi_d']); ?>" width="100px" alt="Gambar Opsi D">
                                            <?php else : ?>
                                                <?= nl2br(htmlspecialchars($j['opsi_d'])); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if (!empty($j['opsi_e'])) : ?>
                                            <?php if (file_exists('assets/img/opsipretest/' . $j['opsi_e'])) : ?>
                                                <img src="<?= base_url('assets/img/opsipretest/' . $j['opsi_e']); ?>" width="100px" alt="Gambar Opsi E">
                                            <?php else : ?>
                                                <?= nl2br(htmlspecialchars($j['opsi_e'])); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </td>
                                        <td><?= nl2br(htmlspecialchars($j['kunci'])); ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>kelolapretest/hapuspretest/<?= $j['id_soal']; ?>" class="btn btn-danger hapus-btn"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url(); ?>Kelolapretest/editpretest/<?= $j['id_soal']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <!-- /.container-fluid -->

    </div>











</div>
<!-- End of Main Content -->
<!-- Page level plugins -->

 <script>
  document.getElementById('pretes').addEventListener('change', function() {
    document.getElementById('myForm').submit();
  });
</script>


<script>
    $(document).ready(function() {
        $('#opsia_tulisan').hide();
        $('#opsia_gambar').hide();


        $('#opsib_tulisan').hide();
        $('#opsib_gambar').hide();

        $('#opsic_tulisan').hide();
        $('#opsic_gambar').hide();

        $('#opsid_tulisan').hide();
        $('#opsid_gambar').hide();

        $('#opsie_tulisan').hide();
        $('#opsie_gambar').hide();
        $('#exampleFormControlSelect1').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsia_gambar').hide();
                $('#opsia_tulisan').show();
            } else if (selectedOption == 'Gambar') {
                $('#opsia_tulisan').hide();
                $('#opsia_gambar').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsia_tulisan').hide();
                $('#opsia_gambar').hide();


            }
        });


        $('#exampleFormControlSelect2').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsib_gambar').hide();
                $('#opsib_tulisan').show();
            } else if (selectedOption == 'Gambar') {
                $('#opsib_tulisan').hide();
                $('#opsib_gambar').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsib_tulisan').hide();
                $('#opsib_gambar').hide();


            }
        });

        $('#exampleFormControlSelect3').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsic_gambar').hide();
                $('#opsic_tulisan').show();
            } else if (selectedOption == 'Gambar') {
                $('#opsic_tulisan').hide();
                $('#opsic_gambar').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsic_tulisan').hide();
                $('#opsic_gambar').hide();


            }
        });




        $('#exampleFormControlSelect4').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsid_gambar').hide();
                $('#opsid_tulisan').show();
            } else if (selectedOption == 'Gambar') {
                $('#opsid_tulisan').hide();
                $('#opsid_gambar').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsid_tulisan').hide();
                $('#opsid_gambar').hide();


            }
        });
        $('#exampleFormControlSelect5').on('change', function() {

            var selectedOption = $(this).val(); // get the selected option value

            if (selectedOption == 'Text') {
                $('#opsie_gambar').hide();
                $('#opsie_tulisan').show();
            } else if (selectedOption == 'Gambar') {
                $('#opse_tulisan').hide();
                $('#opsie_gambar').show();
            } else if (selectedOption = "Pilih Salah Satu") {
                $('#opsie_tulisan').hide();
                $('#opsie_gambar').hide();


            }
        });




    });
</script>
