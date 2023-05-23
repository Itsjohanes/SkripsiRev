<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="border">
                <div class="question bg-white p-3 border-bottom">
                    <div class="d-flex flex-row justify-content-between align-items-center mcq">
                        <h4>Pre-Test</h4><span></span>
                    </div>
                </div>

                <?php
                $no = 0;
                foreach ($soal as $data) :
                    $no++
                ?>
                    <form action="<?= base_url('Siswa/SimpanPreTest') ?>" method="POST">

                        <div class="question bg-white p-3 border-bottom">
                            <input type="hidden" name="id_pretest[]" value="<?php echo $data['id_pretest']; ?>">
                            <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                        </div>
                        <div class="d-flex flex-row align-items-center question-title">


                            <h5 class="text-danger"><?php echo $no; ?>.</h5>
                            <h5 class="mt-1 ml-2"><?php echo $data['soal']; ?></h5>

                        </div>
                        <?php
                        if (!empty($data['gambar'])) {
                            $nama = $data['gambar'];
                            echo "<tr><td></td><td><img src='" . base_url('assets/img/pretest/' . $nama) . "' class='img-fluid' alt='Responsive image'></td></tr>";
                        }
                        ?>
                        <div class="ans ml-2">
                            <label class="radio"> <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_a"><span>&nbsp<?php echo $data['opsi_a']; ?></span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_b"><span>&nbsp<?php echo $data['opsi_b']; ?></span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"><label class="radio"> <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_c">&nbsp<span><?php echo $data['opsi_c']; ?></span>
                                </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <label class="radio"> <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_d">&nbsp<span><?php echo $data['opsi_d']; ?></span>

                                </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <label class="radio"> <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_e">&nbsp<span><?php echo $data['opsi_e']; ?></span>

                                </label>
                        </div>
                    <?php
                endforeach;
                    ?>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white"><input type="reset" class="btn btn-danger" value="Reset">
                        <input type="submit" name="submit" value="Jawab" class="btn btn-success" onclick="return confirm('Perhatian! Apakah Anda sudah yakin dengan semua jawaban Anda?')">
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>