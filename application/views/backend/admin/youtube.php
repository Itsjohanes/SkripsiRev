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
                <h6 class="text-white text-capitalize ps-3">Tambah Video</h6>
              </div>
            </div>
                <br>
                <?php echo form_open_multipart('kelolayoutube/tambahyoutube'); ?>
                <div class="row">
                    <div class="col">
                    <div class="input-group input-group-outline">
                        &nbsp
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
                    

                    <div class="col">
                    <div class="input-group input-group-outline">
                        <input type="text" class="form-control" placeholder="Link" id="link" name="link">
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
                <h6 class="text-white text-capitalize ps-3">Youtube</h6>
              </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($materi as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['id_pertemuan']; ?></td>
<td>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $j['youtube']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</td>

                                        <td>
                                            <a href="<?= base_url(); ?>kelolayoutube/hapusyoutube/<?= $j['id_materi']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus video ini?');"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url(); ?>Kelolayoutube/edityoutube/<?= $j['id_materi']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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
</div>