<!-- Begin Page Content -->



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
 <div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Tambah Tugas</h6>
              </div>
            </div>
            <br>
                <?php echo form_open_multipart('KelolaTugas/tambahTugas'); ?>
                <div class="row">
                    <div class="col">
                       <div class="input-group input-group-outline">

                        <select class="form-control" required id="exampleFormControlSelect1" id="pertemuan" name="pertemuan">
                            <option selected>Pertemuan</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>

                        </select>
                    </div>
                    </div>
                    <div class="col">
                       <div class="input-group input-group-outline">

                        <input type="file" required class=" btn  form-control-file" id="exampleFormControlFile1" name="tugas" />
                    </div>
                    </div>
                    <div class="col">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
                </div>
                </form>
            </div>
        </div>





 <div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Soal Tugas</h6>
              </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Tugas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Tugas</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tugas as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['id_pertemuan']; ?></td>
                                        <td><a href="<?= base_url(); ?>assets/tugas/<?= $j['tugas']; ?>" <i class="fas fa-file-pdf"></i></a> </td>
                                        <td>
                                            <a href="<?= base_url(); ?>KelolaTugas/hapusTugas/<?= $j['id_tugas']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus tugas ini?');"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url(); ?>KelolaTugas/editTugas/<?= $j['id_tugas']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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