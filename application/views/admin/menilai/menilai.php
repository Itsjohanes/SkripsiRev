<div class="container-fluid py-4">
      

    
      <div class="row mt-4">
         
        <?php foreach ($pertemuan as $item): ?>  
          <div class="col-lg-4 col-md-6 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src="<?php echo base_url('assets/pertemuan/' . $item['gambar']); ?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('menilaipertemuan/' . $item['id_pertemuan']); ?>"> Pertemuan <?php echo $item['id_pertemuan'];?>  </a>
             
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
        </div>

        
        
        <?php endforeach; ?>

         <div class="col-lg-4 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/test.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('menilaipretest');?>"> Pre-Test </a>
           <p class="text-sm "> 

                

              </p>              
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
        </div>
         <div class="col-lg-4 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/test.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('menilaiposttest');?>"> Post-Test </a>
           <p class="text-sm "> 

               
              </p>     
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
        </div>


           <div class="col-lg-4 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/incomplete.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('rekapnilai');?>"> Rekap Nilai </a>
           <p class="text-sm "> 

               
              </p>     
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
        </div>
       
      </div>
      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Daftar Siswa</h6>
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

      </div>