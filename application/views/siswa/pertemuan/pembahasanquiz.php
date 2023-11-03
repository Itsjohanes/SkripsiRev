<style>
  /* CSS untuk radio button yang lebih menarik */
  .radio-button {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 2px solid #4CAF50;
    border-radius: 50%;
    position: relative;
  }

  /* Sembunyikan radio button asli */
  input[type="radio"] {
    display: none;
  }

  /* Ketika radio button dipilih, ubah warna latar belakang */
  input[type="radio"]:checked+.radio-button {
    background-color: #4CAF50;
  }

  /* Tanda centang di dalam radio button (gunakan pseudo-element ::before) */
  input[type="radio"]:checked+.radio-button::before {
    content: '\2713';
    color: white;
    font-size: 16px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-10">
      <div class="border p-3">
        <div class="question-header bg-white p-3 mb-3">
          <h4 class="mb-0">Pembahasan Quiz</h4>
          <h5>Nilai Anda: <?= $nilai[0]->nilai; ?></h5>
        </div>

        <?php
        $no = 0;
        $stringJawaban = $jawaban[0]->jawaban;
        $arrayJawaban = str_split($stringJawaban);

        foreach ($soal as $data) :
          $no++;
          $jawabanUser = $arrayJawaban[$no - 1]; // Ambil jawaban yang dipilih oleh user
        ?>

          <div class="question bg-white p-3 border-bottom mb-3">
            <!-- Tampilkan soal -->
            <div class="question-text mb-3">
              <h6><?= $no; ?>. <?= $data['soal']; ?></h6>
            </div>

            <!-- Tampilkan gambar jika ada -->
            <?php if (!empty($data['gambar'])) : ?>
              <img src="<?= base_url('assets/img/quiz/' . $data['gambar']); ?>" class="img-fluid mb-2" alt="Gambar Soal">
            <?php endif; ?>

            <!-- Tampilkan opsi jawaban -->
            <div class="options">
              <?php
              $options = ['A', 'B', 'C', 'D', 'E'];
              foreach ($options as $option) :
                $optionKey = 'opsi_' . strtolower($option);
                $selectedClass = ($jawabanUser == $option) ? 'checked' : ''; // Tambahkan kelas 'checked' jika jawaban ini dipilih oleh user
              ?>

                <div class="option mb-2">
                  <input type="radio" id="<?= $data['id_soal'] . $option; ?>" name="pilihan[<?= $data['id_soal']; ?>]" value="<?= $option; ?>" disabled <?= $selectedClass; ?>>
                  <label class="radio-button <?= $selectedClass; ?>" for="<?= $data['id_soal'] . $option; ?>"></label>
                  <?php if (!empty($data[$optionKey])) : ?>
                    <?php if (file_exists('assets/img/quiz/' . $data[$optionKey])) : ?>
                      <img src="<?= base_url('assets/img/quiz/' . $data[$optionKey]); ?>" width="500px" alt="Gambar Opsi <?= $option; ?>">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data[$optionKey])); ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>

              <?php endforeach; ?>
            </div>

            <!-- Tampilkan pembahasan -->
            <h5 class="mt-3">Pembahasan</h5>
            <?php if ($jawabanUser == $data['kunci']) : ?>
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
