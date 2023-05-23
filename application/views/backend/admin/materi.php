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
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Materi</h6>
                </div>
                <?php echo form_open_multipart('Admin/tambahMateri'); ?>
                <div class="row">
                    <div class="col">
                        <select class="form-control" id="exampleFormControlSelect1" id="pertemuan" name="pertemuan">
                            <option selected>Pertemuan</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>

                        </select>
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Link" id="link" name="link">
                    </div>

                    <div class="col">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
                </div>
                </form>
            </div>
        </div>





        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Materi</h6>
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
                                        <td><?= $j['pertemuan']; ?></td>
                                        <td><?= $j['youtube']; ?></td>

                                        <td>
                                            <a href="<?= base_url(); ?>Admin/hapusMateri/<?= $j['id_materi']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?');"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url(); ?>Admin/editMateri/<?= $j['id_materi']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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