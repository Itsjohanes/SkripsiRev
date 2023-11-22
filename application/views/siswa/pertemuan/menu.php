<style>
  #selectMenu {
  background-color: #f1f1f1;
  color: #333;
  font-family: Arial, sans-serif;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#selectMenu option {
  background-color: #fff;
  color: #333;
}

#selectMenu option:hover {
  background-color: #e0e0e0;
}

#selectMenu:focus {
  outline: none;
}

/* Optional: Animasi */
#selectMenu option {
  transition: background-color 0.3s ease;
}
</style>

<?= $this->session->flashdata("pesan");
                            ?>
<div class="container-fluid py-4">
<div class="form-group">
  <select id="selectMenu">
    <option value="">Filter Menu</option>
    <option value="pembukaan">Pembukaan</option>
    <option value="orientasi">Orientasi Pada Masalah</option>
    <option value="organisasi">Mengorganisasikan siswa untuk Belajar</option>
    <option value="membimbing">Membimbing Pengalaman Individual dan Kelompok</option>
    <option value="mengembangkan">Mengembangkan dan Menyajikan Hasil Karya</option>
    <option value="analisis">Menganalisis dan Mengevaluasi Proses Pemecahan Masalah</option>

    <option value="penutup">Penutup</option>

  </select>
</div>





<div id="pembukaan" class="row mt-4" >
  <div class="col-12 text-center mt-3">
        <h4>Pembukaan</h4>
    </div>
      <div class="col-lg-4 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/tujuanpembelajaran.jpg');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/tp/').$pertemuan;?>"> Tujuan Pembelajaran</a>
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="orientasi" class="row mt-4">

      <div class="col-12 text-center mt-3">
            <h4>Orientasi Pada Masalah</h4>
      </div>
         <div class="col-lg-4 mt-4 mb-2">

          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/tugas.jpg');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/orientasi/').$pertemuan;?>">Orientasi</a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/globalchat.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('globalchat');?>"> Diskusi Bersama Melalui Global Chat </a>
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
        </div>
        <div id="organisasi" class="row mt-4">
        <div class="col-12 text-center mt-3">
            <h4>Mengorganisasikan Siswa untuk Belajar</h4>
        </div>
         <div class="col-lg-4 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/group.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/kelompok/').$pertemuan;?>"> Pembentukan Kelompok </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/tugas.jpg');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/tugas/').$pertemuan;?>"> Tugas / LKPD </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/groupchat.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('groupchat');?>"> Group Chat </a>
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
        </div>

        

        <div id="membimbing" class="row mt-4">
            <div class="col-12 text-center mt-3">
            <h4>Membimbing Pengalaman Individual dan Kelompok</h4>
            </div>
                <div class="col-lg-4 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/materi.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/materipertemuan/').$pertemuan;?>"> Materi Pertemuan (PDF/Video) </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/youtub.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/video/').$pertemuan;?>"> Video </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/groupchat.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('groupchat');?>"> Group Chat </a>
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
        </div>
      </div>
        <div id="mengembangkan" class="row mt-4">
                    <div class="col-12 text-center mt-3">
            <h4>Mengembangkan dan Menyajikan Hasil Karya</h4>
            </div>
         
        <div class="col-lg-4 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/groupchat.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('groupchat');?>"> Group Chat </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/ide.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/ide/').$pertemuan;?>"> IDE </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/scratch.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/scratch/').$pertemuan;?>"> Scratch </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/flowchart.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/flowchart/').$pertemuan;?>"> Flowchart </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/form.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/form/').$pertemuan;?>"> Form </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/globalchat.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('globalchat');?>"> Diskusi Bersama Melalui Global Chat </a>
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
      </div>
      <div id="analisis" class="row mt-4">
            <div class="col-12 text-center mt-3">
            <h4>Menganalisis dan Mengevaluasi Proses Pemecahan Masalah</h4>
            </div>
         
          <div class="col-lg-4 mt-4 mb-2">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/form.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/form/').$pertemuan;?>"> Form </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/globalchat.png');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('globalchat');?>"> Diskusi Bersama Melalui Global Chat </a>
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
      </div>
       <div id="penutup" class="row mt-4">
            <div class="col-12 text-center mt-3">
            <h4>Penutup</h4>
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
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/quiz/').$pertemuan;?>"> Quiz </a>
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
                  <img id="chart-bars" class="chart-canvas" src = "<?php echo base_url('assets/img/menupertemuan/refleksi.jpg');?>" height="170"></img>
                </div>
              </div>
            </div>
            <div class="card-body">
              <a class="mb-0 " href = "<?php echo base_url('pertemuan/refleksi/').$pertemuan;?>"> Refleksi </a>
              <hr class="dark horizontal">
              <div class="d-flex ">
              
              </div>
            </div>
          </div>
      </div>

        </div>

<script>
  // Mendapatkan elemen select dan grup pembukaan serta orientasi
  var selectMenu = document.getElementById("selectMenu");
  var pembukaan = document.getElementById("pembukaan");
  var orientasi = document.getElementById("orientasi");
  var organisasi = document.getElementById("organisasi");
  var membimbing = document.getElementById("membimbing");
  var mengembangkan = document.getElementById("mengembangkan");
  var analisis = document.getElementById("analisis");
  var penutup = document.getElementById("penutup");
  // Menambahkan event listener untuk mengubah tampilan grup sesuai dengan pilihan pengguna
  selectMenu.addEventListener("change", function() {
    if (selectMenu.value === "pembukaan") {
      pembukaan.style.display = "block";
      orientasi.style.display = "none";
      membimbing.style.display = "none";
      organisasi.style.display = "none";
      mengembangkan.style.display = "none";
      analisis.style.display = "none";
      penutup.style.display = "none";
      

    } else if (selectMenu.value === "orientasi") {
      pembukaan.style.display = "none";
      orientasi.style.display = "block";
      membimbing.style.display = "none";
      organisasi.style.display = "none";
      mengembangkan.style.display = "none";
      analisis.style.display = "none";
      penutup.style.display = "none";
      
    }else if (selectMenu.value === "organisasi"){
      pembukaan.style.display = "none";
      orientasi.style.display = "none";
      membimbing.style.display = "none";
      organisasi.style.display = "block";
      mengembangkan.style.display = "none";
      analisis.style.display = "none";
      penutup.style.display = "none";

    }else if(selectMenu.value === "membimbing"){
      pembukaan.style.display = "none";
      orientasi.style.display = "none";
      organisasi.style.display = "none";
      membimbing.style.display = "block";
      mengembangkan.style.display = "none";
      analisis.style.display = "none";
      penutup.style.display = "none";
    }else if(selectMenu.value === "mengembangkan"){
      pembukaan.style.display = "none";
      orientasi.style.display = "none";
      organisasi.style.display = "none";
      membimbing.style.display = "none";
      mengembangkan.style.display = "block";
      analisis.style.display = "none";
      penutup.style.display = "none";
    }else if(selectMenu.value === "analisis"){
      pembukaan.style.display = "none";
      orientasi.style.display = "none";
      organisasi.style.display = "none";
      membimbing.style.display = "none";
      mengembangkan.style.display = "none";
      analisis.style.display = "block";
      penutup.style.display = "none";
    }else if(selectMenu.value === "penutup"){
      pembukaan.style.display = "none";
      orientasi.style.display = "none";
      organisasi.style.display = "none";
      membimbing.style.display = "none";
      mengembangkan.style.display = "none";
      analisis.style.display = "none";
      penutup.style.display = "block";
    }else{
    location.reload();

    }
  });
</script>