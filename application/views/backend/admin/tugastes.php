<div class="container-fluid py-4">
      

    <!-- Kirim Alert jika Pre-test sudah dikerjakan -->
    <?php if ($this->session->flashdata('pesan')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/pertemuan1.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('menilaipertemuan/1');?>"> Pertemuan 1  </a>
              <p class="text-sm ">
              </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-2">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/pertemuan2.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('menilaipertemuan/2');?>"> Pertemuan 2 </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/pertemuan3.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('menilaipertemuan/3');?>"> Pertemuan 3 </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/pertemuan4.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('menilaipertemuan/4');?>"> Pertemuan 4 </a>

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
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Daftar Teman Sekelas</h6>
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
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Materi yang Ada pada Media Ini</h6>
              <p class="text-sm">
              </p>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">filter_1</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Flowchart Diagram</h6>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">filter_2</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Pseudocode</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">filter_3</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Variable</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                  </div>
                </div>
                 <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">filter_4</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Tipe Data</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                  </div>
                </div>
                 <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">filter_5</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Input Output</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                  </div>
                </div>
                 <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">filter_6</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Operator</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                  </div>
                </div>
                 <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">filter_7</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Percabangan</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                  </div>
                </div>
                 <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">filter_8</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Perulangan</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>