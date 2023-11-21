      <div class="row mb-4">
        <div class="back-button mt-4">
            <a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/') . $id; ?>">Kembali</a>
        </div>
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Daftar Teman Satu Kelompok <?php if($kelompok == null){
                      echo "( Belum Ada )";
                  }else{
                    echo $kelompok['kelompok'];
                  }?>
                    </h6>
                    
                  <p class="text-sm mb-0">
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
           <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                   
                                    <?php

                                    $no = 1;
                                    foreach($siswa as $s){
                                        
                                        echo "<tr>";
                                        echo "<th scope = 'row'>".$no++."</th>";
                                        echo "<td>".$s['nama']."</td>";
                                        echo "</tr>";
                                    }

                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
        </div>
