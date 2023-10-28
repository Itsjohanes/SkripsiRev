<style>
.card {
    border: none;
    border-radius: 10px;
}

.card-header {
    background-color: #f8f9fc;
    border-bottom: 1px solid #d1d3e2;
}

.section-title {
    color: #5f5f5f;
    font-weight: bold;
}

.tp-section, .kktp-section {
    margin-bottom: 20px;
}

.kktp-list {
    padding-left: 20px;
}

.back-button {
    text-align: center;
}
</style>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tujuan Pembelajaran dapat dibaca disini:</h6>
    </div>
    <div class="card-body">
        <div class="tp-section">
            <h6 class="section-title">Tujuan Pembelajaran</h6>
              <ol class="kktp-list">
                <?php
                $tpItems = explode(',', $tp['tp']);
                foreach ($tpItems as $item) {
                    echo '<li>' . htmlspecialchars($item) . '</li>';
                }
                ?>
            </ol>
        </div>
        <div class="back-button mt-4">
            <a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/') . $id; ?>">Kembali</a>
        </div>
    </div>
</div>
