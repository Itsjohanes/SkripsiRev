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
input[type="radio"]:checked + .radio-button {
  background-color: #4CAF50;
}

/* Tanda centang di dalam radio button (gunakan pseudo-element ::before) */
input[type="radio"]:checked + .radio-button::before {
  content: '\2713';
  color: white;
  font-size: 16px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Style untuk tombol submit */
.btn-success {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-success:hover {
  background-color: #45a049;
}

</style>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-10">
      <div class="border p-3">
        <div class="question-header bg-white p-3 mb-3">
          <h4 class="mb-0">Quiz</h4>
        </div>

        <form id="quiz-form" action="<?= base_url('pertemuan/simpanquiz') ?>" method="POST">

          <?php
          $no = 0;
          foreach ($soal as $data) :
            $no++
          ?>

            <div class="question bg-white p-3 border-bottom mb-3">
              <input type="hidden" name="id_quiz[]" value="<?= $data['id_soal']; ?>">
              <input type="hidden" name="id_pertemuan" value="<?= $data['id_pertemuan']; ?>">
              <input type="hidden" name="jumlah" value="<?= $jumlah; ?>">

              <div class="question-text mb-3">
                <h6><?= $no; ?>. <?= $data['soal']; ?></h6>
              </div>

              <?php if (!empty($data['gambar'])) : ?>
                <img src="<?= base_url('assets/img/quiz/' . $data['gambar']); ?>" class="img-fluid mb-2" alt="Gambar Soal">
              <?php endif; ?>

              <div class="options">
                <?php
                $options = ['A', 'B', 'C', 'D', 'E'];
                foreach ($options as $option) :
                  $optionKey = 'opsi_' . strtolower($option);
                ?>

                  <div class="option mb-2">
                    <input type="radio" id="<?= $data['id_soal'] . $option; ?>" name="pilihan[<?= $data['id_soal']; ?>]" value="<?= $option; ?>" onclick="saveSelectedOption(<?= $data['id_soal'] ?>, 'opsi_<?= strtolower($option) ?>')">
                    <label class="radio-button" for="<?= $data['id_soal'] . $option; ?>"></label>
                    <?php if (!empty($data[$optionKey])) : ?>
                      <?php if (file_exists('assets/img/quiz/' . $data[$optionKey])) : ?>
                        <img src="<?= base_url('assets/img/quiz/' . $data[$optionKey]); ?>" width="150px" alt="Gambar Opsi <?= $option; ?>">
                      <?php else : ?>
                        <?= nl2br(htmlspecialchars($data[$optionKey])); ?>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>

                <?php endforeach; ?>
              </div>
            </div>

          <?php endforeach; ?>

          <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
