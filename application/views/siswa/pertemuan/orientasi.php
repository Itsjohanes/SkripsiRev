
<style>
    .pdf-container {
        position: relative;
        width: 100%;
        padding-bottom: 100%; /* Menyesuaikan aspek rasio PDF */
    }
    
    .pdf {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Orientasi</h6>
    </div>


<div class="my-2">
    <?php 
        if($apersepsi['orientasi']  == 1 ){
            echo '<a class="btn btn-primary fs-9 py-2 px-4" role="button" href="' . base_url('pertemuan/') . $pertemuan . '">Kembali</a>';

        }else{
            echo '<a class="btn btn-primary fs-9 py-2 px-4" role="button" href="' . base_url('pertemuan/akses/') . $pertemuan . '">Lanjut</a>';
        }
    ?>
</div>
<!-- Container untuk menampilkan video YouTube -->
<div class="video-container" id="videoContainer">
    <?php foreach ($youtube as $v) : ?>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe width="1080px" height="720px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $v['youtube']; ?>" allowfullscreen></iframe>
        </div>
    <?php endforeach; ?>
</div>
</div>

