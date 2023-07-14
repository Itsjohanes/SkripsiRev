<div class="container-fluid py-4">
      

    <!-- Kirim Alert jika Pre-test sudah dikerjakan -->
    <?php if ($this->session->flashdata('pesan')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    
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
              <a class="mb-0 " href = "<?php echo base_url('komentar/halamankomentar/' . $item['id_pertemuan']); ?>"> Pertemuan <?php echo $item['id_pertemuan'];?>  </a>
             
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
        </div>

        
        
        <?php endforeach; ?>

               
              
              </div>
            </div>
          </div>
        </div>
         
      