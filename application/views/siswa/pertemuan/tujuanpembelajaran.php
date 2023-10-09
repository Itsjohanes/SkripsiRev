   <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Kriteria Ketercapaian Tujuan Pembelajaran (KKTP) dapat dibaca disini: </h6>
                     <div class="dropdown no-arrow">

                     </div>
                 </div>
                 <!-- Card Body -->

                 <div class="card-body">
                    <ul>
                   <?php
                   echo $tp['tp'];
                   ?>


                    </ul>
                 </div>
                 <div class="my-2"><a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/').$id;?>">Kembali</a></div>

             </div>