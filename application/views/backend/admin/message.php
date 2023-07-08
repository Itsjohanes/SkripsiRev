<div class="container-fluid py-4">

<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Pesan</h6>
              </div>
            </div>
            <?php
            if ($this->session->flashdata('message')) {

                echo $this->session->flashdata('message');
            }
            ?>
            <div class="card-body px-0 pb-2">

                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pesan</th>
                                  

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pesan</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pesan as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama_pengirim']; ?></td>
                                        <td><?= $j['email_pengirim']; ?></td>                                        
                                        <td><?= $j['pesan_pengirim']; ?></td>
                                       
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

