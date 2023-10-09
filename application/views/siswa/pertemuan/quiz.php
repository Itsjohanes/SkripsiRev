<div class="container mt-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-10 col-lg-10">
      <div class="border">
        <div class="question bg-white p-3 border-bottom">
          <div class="d-flex flex-row justify-content-between align-items-center mcq">
            <h4>Quiz</h4>
          </div>
        </div>

        <?php
        $no = 0;
        foreach ($soal as $data) :
          $no++
        ?>
          <form id="quiz-form" action="<?= base_url('pertemuan/simpanquiz') ?>" method="POST">
            <div class="question bg-white p-3 border-bottom">
              <input type="hidden" name="id_quiz[]" value="<?php echo $data['id_soal']; ?>">
              <input type="hidden" name="id_pertemuan" value="<?php echo $data['id_pertemuan']; ?>">
              <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
            </div>
            <div class="d-flex flex-row align-items-center question-title">
              <h6 class="mt-1 ml-2"><?php echo $no; ?>.</h6>
              <h6 class="mt-1 ml-2"><?php echo $data['soal']; ?></h6>
            </div>
            <?php
            if (!empty($data['gambar'])) {
              $nama = $data['gambar'];
              echo "<tr><td></td><td><img src='" . base_url('assets/img/quiz/' . $nama) . "' class='img-fluid' alt='Responsive image'></td></tr>";
            }
            ?>
          <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="A" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'opsi_a')">
                  <?php if (!empty($data['opsi_a'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_a'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_a']); ?>" width="200px" alt="Gambar Opsi A">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_a'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="B" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'opsi_b')">
                  <?php if (!empty($data['opsi_b'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_b'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_b']); ?>" width="200px" alt="Gambar Opsi B">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_b'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="C" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'opsi_c')">
                  <?php if (!empty($data['opsi_c'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_c'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_c']); ?>" width="200px" alt="Gambar Opsi C">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_c'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="D" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'opsi_d')">
                  <?php if (!empty($data['opsi_d'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_d'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_d']); ?>" width="200px" alt="Gambar Opsi D">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_d'])); ?>
                    <?php endif; ?>
                <?php endif; ?>            
                </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="E" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'opsi_e')">
                  <?php if (!empty($data['opsi_e'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_e'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_e']); ?>" width="200px" alt="Gambar Opsi E">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_e'])); ?>
                    <?php endif; ?>
                <?php endif; ?>              
              </label>
            </div>

        <?php
        endforeach;
        ?>

        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
          <input type="reset" class="btn btn-danger" value="Reset">
          <input type="submit" class="btn btn-success" >
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
