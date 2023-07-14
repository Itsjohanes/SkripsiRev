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
                <h6 class="text-white text-capitalize ps-3">Tambah Materi</h6>
              </div>
            </div>
            <br>
            <div class="card-body">
                <?php echo form_open_multipart('kelolamateri/tambahmateri'); ?>
                <div class="row">
                    <div class="col">
                    <label for = "pertemuan">Pertemuan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                       <div class="input-group input-group-outline">

                        <select class="form-control" required id="exampleFormControlSelect1" id="pertemuan" name="pertemuan">
                        <option selected>Pertemuan</option>
                        <?php foreach ($pertemuan as $pertemuan) : ?>
                            <option value="<?php echo $pertemuan['id_pertemuan']; ?>">
                                <?php echo $pertemuan['pertemuan']; ?>
                            </option>
                        <?php endforeach; ?>
                        </select>

                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <label for = "materi">Materi (PDF)</label>
                    </div>
                </div>
                    <div class="row">
                    <div class="col">
                       <div class="input-group input-group-outline">

                        <input type="file" required  id="exampleFormControlFile1" name="materi" />
                    </div>
                    </div>
                    </div>
                    </br>
                    <div class="row">
                    <div class="col">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
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
                <h6 class="text-white text-capitalize ps-3">Materi</h6>
              </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Materi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Materi</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($materi as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['id_pertemuan']; ?></td>
                                        <td><a href="<?= base_url(); ?>assets/materi/<?= $j['materi']; ?>" <i class="fas fa-file-pdf"></i></a> </td>
                                        <td>
                                            <a href="<?= base_url(); ?>kelolamateri/hapusmateri/<?= $j['id_materi']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin akan menghapus Materi ini?');"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url(); ?>kelolamateri/editmateri/<?= $j['id_materi']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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