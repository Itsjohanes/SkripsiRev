

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

        




<div class="container-fluid py-4">

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Pertemuan</h6>
              </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Tujuan Pembelajaran</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Tujuan Pembelajaran</th>
                                    <th scope="col">Aksi</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pertemuan as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['pertemuan']; ?></td>
                                        <td><?= $j['tp'];?></td>
                                        <td>
                                            <?php 
                                            if($j['aktif'] == '1'){
                                                echo '<a href="'.base_url('KelolaPertemuan/matikanPertemuan/'.$j['id_pertemuan']).'" class="btn btn-danger btn-sm">Nonaktifkan</a>';
                                            }else{
                                                echo '<a href="'.base_url('KelolaPertemuan/aktifkanPertemuan/'.$j['id_pertemuan']).'" class="btn btn-success btn-sm">Aktifkan</a>';
                                            }
                                            ?>
                                            <?php
                                                echo '<a href="'.base_url('KelolaPertemuan/editTp/'.$j['id_pertemuan']).'" class="btn btn-success btn-sm">Edit TP</a>';


                                            ?>
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
  document.getElementById('pretes').addEventListener('change', function() {
    document.getElementById('myForm').submit();
  });
</script>

