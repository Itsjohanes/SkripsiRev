<style>
.card {
    border: none;
    border-radius: 10px;
    margin-bottom: 20px;
}

.card-header {
    background-color: #f8f9fc;
    border-bottom: 1px solid #d1d3e2;
}

.card-body {
    padding: 20px;
}

.video-container {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%; /* Untuk menjaga rasio aspek video 16:9 */
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Video</h6>
    </div>
    <div class="card-body">
        <?php foreach ($materi as $v) : ?>
            <div class="video-container">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $v['youtube']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card-footer">
        <a class="btn btn-primary fs-9 py-2 px-4" href="<?php echo base_url('pertemuan/') . $pertemuan; ?>">Kembali</a>
    </div>
</div>
