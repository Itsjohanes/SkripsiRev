<style>
  .border {
    border: 1px solid #dee2e6;
  }

  .form-check-label {
    margin-left: 1rem;
  }

  .form-check {
    margin-bottom: 1rem;
  }

  .form-check-input[type="radio"] {
    margin-top: 0.3rem;
  }
</style>

<div class="container mt-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-10 col-lg-10">
      <div class="border p-4 rounded">
        <div class="question bg-white p-3 border-bottom">
          <div class="d-flex flex-row justify-content-between align-items-center mcq">
            <h4 class="mb-0">Pembahasan Quiz</h4>
            <h5 class="mb-0">Nilai Anda: <?= $nilai[0]->nilai; ?></h5>
          </div>
        </div>

        <?php
        $no = 0;
        $stringJawaban = $jawaban[0]->jawaban;
        $arrayJawaban  = str_split($stringJawaban);

        foreach ($soal as $data) :
          $no++
        ?>

        <div class="question bg-white p-3 border-bottom">
          <div class="d-flex flex-row align-items-center question-title">
            <h6 class="mt-1 mr-2"><?= $no; ?>.</h6>
            <h6 class="mt-1"><?= $data['soal']; ?></h6>
          </div>
          <?php if (!empty($data['gambar'])) : ?>
            <img src="<?= base_url('assets/img/quiz/' . $data['gambar']); ?>" class="img-fluid mb-3" alt="Gambar Soal">
          <?php endif; ?>
          
          <!-- Opsi Jawaban -->
          <?php foreach (range('A', 'E') as $option) : ?>
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="pilihan[<?= $data['id_soal'] ?>]" value="<?= $option; ?>"
                <?php
                  if ($arrayJawaban[$no - 1] == $option) {
                    echo 'checked';
                  }
                ?>
                onclick="saveSelectedOption(<?= $data['id_soal'] ?>, 'opsi_<?= strtolower($option) ?>')">
              <label class="form-check-label">
                <?php if (!empty($data['opsi_' . strtolower($option)])) : ?>
                  <?php if (file_exists('assets/img/quiz/' . $data['opsi_' . strtolower($option)])) : ?>
                    <img src="<?= base_url('assets/img/quiz/' . $data['opsi_' . strtolower($option)]); ?>" width="200px" alt="Gambar Opsi <?= $option; ?>">
                  <?php else : ?>
                    <?= nl2br(htmlspecialchars($data['opsi_' . strtolower($option)])); ?>
                  <?php endif; ?>
                <?php endif; ?>
              </label>
            </div>
          <?php endforeach; ?>

          <h5 class="mt-3">Pembahasan</h5>
          <?php if ($arrayJawaban[$no - 1] == $data['kunci']) : ?>
            <p class="text-success">Jawaban Anda Benar</p>
          <?php else : ?>
            <p class="text-danger">Jawaban Anda Salah</p>
          <?php endif; ?>
          <p><?= $data['pembahasan']; ?></p>
        </div>

        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>
