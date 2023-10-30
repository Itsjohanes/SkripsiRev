
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
        <h6 class="m-0 font-weight-bold text-primary">Tugas</h6>
    </div>
<select id="jenisMateri">
    <option>Pilih Salah Satu Jenis Materi</option>
    <option value="pdf">PDF</option>
    <option value="video">Video</option>
</select>

<div class="my-2">
    <a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/akses/').$pertemuan;?>" target=_blank>Menu Lainnya</a>
</div>

<!-- Container untuk menampilkan konten PDF -->
<div class="pdf-container" id="pdfContainer" style="display:none;">
    <?php foreach ($tugas as $material) : ?>
        <?php $pdf = base_url('assets/tugas/') . $material['tugas']; ?>
        <div class="text-center">
            <object data="<?php echo $pdf; ?>" type="application/pdf" width="100%" height="1000px">
                <p>Maaf, browser Anda tidak mendukung plugin PDF. Anda bisa <a href="<?php echo $pdf; ?>">klik di sini untuk mendownload PDF</a>.</p>
            </object>
        </div>
    <?php endforeach; ?>
</div>

<!-- Container untuk menampilkan video YouTube -->
<div class="video-container" id="videoContainer" style="display:none;">
    <?php foreach ($youtube as $v) : ?>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe width="1580px" height="720px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $v['youtube']; ?>" allowfullscreen></iframe>
        </div>
    <?php endforeach; ?>
</div>
</div>
<script>
    // Mengambil elemen dropdown
    var jenisMateriDropdown = document.getElementById('jenisMateri');
    // Mengambil elemen container PDF dan video
    var pdfContainer = document.getElementById('pdfContainer');
    var videoContainer = document.getElementById('videoContainer');

    // Menambahkan event listener untuk perubahan nilai dropdown
    jenisMateriDropdown.addEventListener('change', function() {
        // Memeriksa nilai dropdown
        if (jenisMateriDropdown.value === 'pdf') {
            // Jika memilih PDF, tampilkan kontainer PDF dan sembunyikan kontainer video
            pdfContainer.style.display = 'block';
            videoContainer.style.display = 'none';
        } else if (jenisMateriDropdown.value === 'video') {
            // Jika memilih video, tampilkan kontainer video dan sembunyikan kontainer PDF
            pdfContainer.style.display = 'none';
            videoContainer.style.display = 'block';
        }
    });
</script>
