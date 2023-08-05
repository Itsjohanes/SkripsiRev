<div class="container py-4 py-xl-5">
  <div class="row mb-5">
    <div class="col-md-8 col-xl-6 text-center mx-auto">
      <h2>Materi</h2>
      <p>Di bawah ini adalah materi-materi yang akan dipelajari pada media pembelajaran ini</p>
    </div>
  </div>
  <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
  
   




<?php foreach ($pertemuan as $item): ?>
<div class="col">
      <div class="card">  <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="<?= base_url('assets/'); ?>pertemuan/<?= $item['gambar']; ?>">

        <div class=" card-body p-4">
          <p class="text-primary card-text mb-0">Pertemuan</p>
          <h4 class="card-title"><?php echo $item['id_pertemuan'];?></h4>
          <p class="card-text" align="justify"><?php echo $item['penjelasan'];?></p>
          <div class="d-flex">
            <div></div>
          </div>
        </div>
      </div>
    </div>
<?php endforeach; ?>
</div>



