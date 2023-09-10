
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

<?php
// Assuming $materi is an array of materials with 'materi' key containing the file name
$materials = $tugas; // Replace this with your actual array of materials

foreach ($materials as $material) {
    $link = $material['tugas'];
    $pdf = base_url('assets/tugas/') . $link;
?>
<div class="my-2"><a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/').$pertemuan;?>">Kembali</a></div>

<div class="pdf-container">
    <object class="pdf" data="<?php echo $pdf;?>" type="application/pdf">
        <p>
            Your web browser doesn't have a PDF Plugin. Instead you can
            <a href="<?php echo $pdf;?>">Click here to download the PDF</a>
        </p>
    </object>
</div>

<?php
}
?>
