<!-- Begin Page Content -->
<style>
    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
    <?php if ($this->session->flashdata('category_error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
    <?php } ?>
    <div class="row no-gutters">

        <br>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Soal</h6>
                </div>
                <?php echo form_open_multipart('KelolaPosttest/tambahPostTest'); ?>
                <div class="row">
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Soal" id="soal" name="soal"></div>
                    </div>

                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi A" id="a" name="a"></div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi B" id="b" name="b"></div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi C" id="c" name="c"></div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi D" id="d" name="d"></div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Opsi E" id="e" name="e"></div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="text" required class="form-control" placeholder="Kunci" id="kunci" name="kunci"></div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-outline">
                        <input type="file" class="form-control" id="formFile" name="gambar" /></div>
                    </div>
                    <div class="col">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
                </div>
                </form>
                <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">Aktifkan Paket Soal</h6>
                </div>
                <form id="myForm" method="post" action="<?php echo base_url('KelolaPosttest/postTestHandler');?>">
                <label class="switch">
                <?php
                if($aktif['aktif'] == 1){
                    echo "<input type='checkbox' name = 'posttes' id = 'posttes' value='1' checked>";
                }else{
                    echo "<input type='checkbox' name = 'posttes' id = 'posttes' value='1'>";
                }
                ?>
                
                <span class="slider round"></span>
                </form>
                </label>
            </div>
        </div>





        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Soal Post-test</h6>
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
                                        <td><img src = "<?php echo base_url('assets/img/posttest/').$j['gambar'];?>" width = '300px' width = '150px' alt = "Tidak ada gambar"> </img></td>
                                        <td><?= $j['opsi_a']; ?></td>
                                        <td><?= $j['opsi_b']; ?></td>
                                        <td><?= $j['opsi_c']; ?></td>
                                        <td><?= $j['opsi_d']; ?></td>
                                        <td><?= $j['opsi_e']; ?></td>
                                        <td><?= $j['kunci']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>KelolaPosttest/hapusPostTest/<?= $j['id_soal']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus soal ini?');"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url(); ?>KelolaPosttest/editPostTest/<?= $j['id_soal']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>














</div>
<!-- End of Main Content -->
<!-- Page level plugins -->
<script>
  document.getElementById('posttes').addEventListener('change', function() {
    document.getElementById('myForm').submit();
  });
</script>
