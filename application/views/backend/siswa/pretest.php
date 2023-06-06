<div class="container mt-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-10 col-lg-10">
      <div class="border">
        <div class="question bg-white p-3 border-bottom">
          <div class="d-flex flex-row justify-content-between align-items-center mcq">
            <h4>Pre-Test</h4>
            <span id="timer"></span> <!-- Tampilkan timer di sini -->
          </div>
        </div>

        <?php
        $no = 0;
        foreach ($soal as $data) :
          $no++
        ?>
          <form id="pretest-form" action="<?= base_url('Siswa/SimpanPreTest') ?>" method="POST">
            <div class="question bg-white p-3 border-bottom">
              <input type="hidden" name="id_pretest[]" value="<?php echo $data['id_pretest']; ?>">
              <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
            </div>
            <div class="d-flex flex-row align-items-center question-title">
              <h6 class="mt-1 ml-2"><?php echo $no; ?>.</h6>
              <h6 class="mt-1 ml-2"><?php echo $data['soal']; ?></h6>
            </div>
            <?php
            if (!empty($data['gambar'])) {
              $nama = $data['gambar'];
              echo "<tr><td></td><td><img src='" . base_url('assets/img/pretest/' . $nama) . "' class='img-fluid' alt='Responsive image'></td></tr>";
            }
            ?>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_a" onclick="saveSelectedOption(<?php echo $data['id_pretest'] ?>, 'opsi_a')">
                <span>&nbsp<?php echo $data['opsi_a']; ?></span>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_b" onclick="saveSelectedOption(<?php echo $data['id_pretest'] ?>, 'opsi_b')">
                <span>&nbsp<?php echo $data['opsi_b']; ?></span>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_c" onclick="saveSelectedOption(<?php echo $data['id_pretest'] ?>, 'opsi_c')">
                <span>&nbsp<?php echo $data['opsi_c']; ?></span>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_d" onclick="saveSelectedOption(<?php echo $data['id_pretest'] ?>, 'opsi_d')">
                <span>&nbsp<?php echo $data['opsi_d']; ?></span>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_pretest'] ?>]" type="radio" value="opsi_e" onclick="saveSelectedOption(<?php echo $data['id_pretest'] ?>, 'opsi_e')">
                <span>&nbsp<?php echo $data['opsi_e']; ?></span>
              </label>
            </div>

        <?php
        endforeach;
        ?>

        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
          <input type="reset" class="btn btn-danger" value="Reset">
          <input type="button" value="Jawab" class="btn btn-success" onclick="submitForm()">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Timer Countdown
  var timeLeft = 10; // Waktu dalam detik (10 detik sebagai contoh)
  var timerId;

  function startTimer() {
    timerId = setInterval(countdown, 1000);
  }

  function countdown() {
    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;

    // Tampilkan waktu pada elemen dengan id 'timer'
    document.getElementById('timer').innerHTML = minutes + ' menit ' + seconds + ' detik';

    if (timeLeft === 0) {
      clearInterval(timerId);
      // Redirect ke method SimpanPreTest
      document.getElementById('pretest-form').submit();
    } else {
      timeLeft--;
    }
  }

  // Jalankan timer saat halaman dimuat
  startTimer();

  // Simpan opsi yang dipilih pada session storage
  function saveSelectedOption(id, value) {
    var options = JSON.parse(sessionStorage.getItem('options')) || [];
    var option = {
      id: id,
      value: value
    };
    options.push(option);
    sessionStorage.setItem('options', JSON.stringify(options));
  }

  // Tampilkan opsi yang dipilih saat halaman dimuat
  document.addEventListener("DOMContentLoaded", function() {
    var options = sessionStorage.getItem('options');
    if (options) {
      options = JSON.parse(options);
      options.forEach(function(option) {
        var radio = document.querySelector('input[name="pilihan[' + option.id + ']"][value="' + option.value + '"]');
        if (radio) {
          radio.checked = true;
        }
      });
    }
  });

  // Submit form
  function submitForm() {
    // Assign the selected options to hidden input fields in the form
    var options = sessionStorage.getItem('options');
    if (options) {
      options = JSON.parse(options);
      options.forEach(function(option) {
        var hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'selected_options[' + option.id + ']';
        hiddenInput.value = option.value;
        document.getElementById('pretest-form').appendChild(hiddenInput);
      });
    }
    // Submit the form
    document.getElementById('pretest-form').submit();
  }
</script>
