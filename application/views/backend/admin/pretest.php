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
                        <label for="waktu">Opsi A </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi A" id="a" name="a">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="waktu">Opsi B </label>
                    </div>
                </div>   
                <div class="row"> 
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi B" id="b" name="b">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="waktu">Opsi C </label>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col">
                         <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi C" id="c" name="c">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="waktu">Opsi D </label>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi D" id="d" name="d">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="waktu">Opsi E </label>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi E" id="e" name="e">
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
                                        <td><?= $j['opsi_a']; ?></td>
                                        <td><?= $j['opsi_b']; ?></td>
                                        <td><?= $j['opsi_c']; ?></td>
                                        <td><?= $j['opsi_d']; ?></td>
                                        <td><?= $j['opsi_e']; ?></td>
                                        <td><?= $j['kunci']; ?></td>
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

