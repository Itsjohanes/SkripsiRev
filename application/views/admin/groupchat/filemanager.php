
    <div class="container mt-5">
        <h2 class="mb-4">File Manager</h2>
        <?php
         $base_url_upload = 'adminfilemanager/upload/'.$kelompok;
         $base_url_delete = 'adminfilemanager/delete/'.$kelompok.'/';
        ?>
        <form action="<?= base_url($base_url_upload) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Pilih File (JSON/ZIP (Scratch)):</label>
                 <div class="input-group input-group-outline">
                <input type="file" class="form-control" name="file" accept=".json,.zip" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <hr>

        <h3>Daftar File:</h3>
        <ul>
            <?php foreach($files as $file): ?>
                <li><?= $file ?> <a href="<?= base_url($base_url_delete) . $file?>" class="btn btn-danger btn-sm">Hapus</a><a href="<?= base_url('adminfilemanager/download/'.$kelompok.'/'.$file) ?>" class="btn btn-success btn-sm">Unduh</a></li>


            <?php endforeach; ?>
        </ul>
    </div>
