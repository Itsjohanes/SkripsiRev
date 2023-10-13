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
        <h6 class="m-0 font-weight-bold text-primary">Materi Pertemuan</h6>
    </div>
    <div class="custom-select">
        <label for="jenisMateri">Pilih Jenis Materi:</label>
        <select id="jenisMateri" name="jenisMateri">
            <option value="" disabled selected>Pilih Salah Satu Jenis Materi</option>
            <option value="pdf">PDF</option>
            <option value="video">Video</option>
        </select>
    </div>


<div class="my-2">
    <a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/').$pertemuan;?>">Kembali</a>
</div>

<!-- Container untuk menampilkan konten PDF -->
<div class="pdf-container" id="pdfContainer" style="display:none;">
    <?php foreach ($materi as $material) : ?>
        <?php $pdf = base_url('assets/materi/') . $material['materi']; ?>
        <div class="pdf">
            <object data="<?php echo $pdf; ?>" type="application/pdf" width="100%" height="1000px">
                <p>Your web browser doesn't have a PDF Plugin. Instead you can <a href="<?php echo $pdf; ?>">click here to download the PDF</a>.</p>
            </object>
        </div>
    <?php endforeach; ?>
</div>

<!-- Container untuk menampilkan video YouTube -->
<div class="video-container" id="videoContainer" style="display:none;">
    <?php foreach ($youtube as $v) : ?>
        <iframe width="1580px" height="720px" src="https://www.youtube.com/embed/<?php echo $v['youtube']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
