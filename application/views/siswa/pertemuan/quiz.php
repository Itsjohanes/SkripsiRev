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
      <div class="border rounded p-4">

        <?php
        $no = 0;
        foreach ($soal as $data) :
          $no++
        ?>
          <form id="quiz-form" action="<?= base_url('pertemuan/simpanquiz') ?>" method="POST">
            <!-- Soal Quiz -->
            <div class="mb-3">
              <h6 class="font-weight-bold"><?= $no . '. ' . $data['soal']; ?></h6>
              <!-- Tampilkan Gambar Jika Ada -->
              <?php if (!empty($data['gambar'])) : ?>
                <img src="<?= base_url('assets/img/quiz/' . $data['gambar']); ?>" class="img-fluid mb-3" alt="Gambar Soal">
              <?php endif; ?>

              <!-- Opsi Jawaban -->
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="pilihan[<?= $data['id_soal'] ?>]" value="A">
                <label class="form-check-label"><?= $data['opsi_a']; ?></label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="pilihan[<?= $data['id_soal'] ?>]" value="B">
                <label class="form-check-label"><?= $data['opsi_b']; ?></label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="pilihan[<?= $data['id_soal'] ?>]" value="C">
                <label class="form-check-label"><?= $data['opsi_c']; ?></label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="pilihan[<?= $data['id_soal'] ?>]" value="D">
                <label class="form-check-label"><?= $data['opsi_d']; ?></label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="pilihan[<?= $data['id_soal'] ?>]" value="E">
                <label class="form-check-label"><?= $data['opsi_e']; ?></label>
              </div>
            </div>
        <?php endforeach; ?>

        <!-- Tombol Reset dan Submit -->
        <div class="d-flex justify-content-between mt-4">
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
