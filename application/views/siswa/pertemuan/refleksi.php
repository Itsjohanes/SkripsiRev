<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Refleksi</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('pertemuan/submitRefleksi'); ?>" method="post">
                <input type = "hidden" name = "id_pertemuan" value = "<?php echo $pertemuan['id_pertemuan'];?>">
                <div class="form-group">
                    <label for="pemahaman">1. Seberapa pahamkah anda dengan topik ini?</label>
                    <select class="form-control" name="pemahaman" id="pemahaman">
                        <option value="sangat_paham">Sangat Paham</option>
                        <option value="paham_sebagian">Paham</option>
                        <option value="netral">Netral</option>
                        <option value="tidak_paham">Tidak Paham</option>
                        <option value="sangat_tidak_paham">Sangat Tidak Paham</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kesulitan">2.Seberapa baikkah bahan ajar yang disajikan pada topik ini?</label>
                    <select class="form-control" name="baik" id="baik">
                        <option value="sangat_baik">Sangat Baik</option>
                        <option value="baik">Baik</option>
                        <option value="netral">Netral</option>
                        <option value="tidak_baik">Tidak Baik</option>
                        <option value="sangat_tidak_baik">Sangat Tidak Baik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kesulitan">3.Seberapa sulitkah tugas yang diberikan pada topik ini?</label>
                    <select class="form-control" name="kesulitan" id="kesulitan">
                        <option value="sangat_sulit">Sangat Sulit</option>
                        <option value="sulit">Sulit</option>
                        <option value="netral">Netral</option>
                        <option value="tidak_sulit">Tidak Sulit</option>
                        <option value="sangat_tidak_sulit">Sangat Tidak Sulit</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu">4.Seberapa cukupkah waktu yang disediakan pada topik ini?</label>
                    <select class="form-control" name="waktu" id="waktu">
                        <option value="sangat_cukup">Sangat Cukup</option>
                        <option value="cukup">Cukup</option>
                        <option value="netral">Netral</option>
                        <option value="tidak_cukup">Tidak Cukup</option>
                        <option value="sangat_tidak_cukup">Sangat Tidak Cukup</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu">5.Apa saja yang menghambat anda untuk memahami topik ini?</label>
                    <input type = "text" name="penghambat">
                </div>
                <div class="form-group">
                    <label for="waktu">6.Apa saran anda untuk guru terkait topik ini?</label>
                    <input type = "text" name="saran">
                </div>
                <div class="form-group">
                    <label for="waktu">7.Ada komentar lain terkait topik ini secara keseluruhan?</label>
                    <input type ="text" name="komentar">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
