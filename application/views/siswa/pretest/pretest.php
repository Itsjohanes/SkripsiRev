
<div class="container mt-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-10 col-lg-10">
      <div class="border">
        <div class="question bg-white p-3 border-bottom">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h4>Pre-Test</h4>
            <span id="timer"></span>
        </div>
        </div>

        <?php
        $no = 0;
        foreach ($soal as $data) :
          $no++
        ?>
          <form id="opsipretest-form" action="<?= base_url('Pretest/SimpanPreTest') ?>" method="POST">
            <div class="question bg-white p-3 border-bottom">
              <input type="hidden" name="id_pretest[]" value="<?php echo $data['id_soal']; ?>">
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
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="A" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'A')">
                  <?php if (!empty($data['opsi_a'])) : ?>
                       <?php if (file_exists('assets/img/pretest/' . $data['opsi_a'])) : ?>
                       <img src="<?= base_url('assets/img/pretest/' . $data['opsi_a']); ?>" width="200px" alt="Gambar Opsi A">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_a'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="B" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'B')">
                  <?php if (!empty($data['opsi_b'])) : ?>
                       <?php if (file_exists('assets/img/pretest/' . $data['opsi_b'])) : ?>
                       <img src="<?= base_url('assets/img/pretest/' . $data['opsi_b']); ?>" width="200px" alt="Gambar Opsi B">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_b'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="C" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'C')">
                  <?php if (!empty($data['opsi_c'])) : ?>
                       <?php if (file_exists('assets/img/pretest/' . $data['opsi_c'])) : ?>
                       <img src="<?= base_url('assets/img/pretest/' . $data['opsi_c']); ?>" width="200px" alt="Gambar Opsi C">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_c'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="D" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'D')">
                  <?php if (!empty($data['opsi_d'])) : ?>
                       <?php if (file_exists('assets/img/pretest/' . $data['opsi_d'])) : ?>
                       <img src="<?= base_url('assets/img/pretest/' . $data['opsi_d']); ?>" width="200px" alt="Gambar Opsi D">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_d'])); ?>
                    <?php endif; ?>
                <?php endif; ?>            
                </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="E" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'E')">
                  <?php if (!empty($data['opsi_e'])) : ?>
                       <?php if (file_exists('assets/img/pretest/' . $data['opsi_e'])) : ?>
                       <img src="<?= base_url('assets/img/pretest/' . $data['opsi_e']); ?>" width="200px" alt="Gambar Opsi E">
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
          <input type="button" value="Jawab" class="btn btn-success" onclick="submitForm()">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Timer Countdown

  //get timeLeftPretest from database
  var timeLeftPretest = <?php echo $waktu; ?>;


        
  var timerId;

  function startTimer() {
    timerId = setInterval(countdown, 1000);
  }

  function countdown() {
    var minutes = Math.floor(timeLeftPretest / 60);
    var seconds = timeLeftPretest % 60;

    // Tampilkan waktu pada elemen dengan id 'timer'
    document.getElementById('timer').innerHTML = minutes + ' menit ' + seconds + ' detik';
    document.getElementById('timer2').innerHTML = minutes + ' menit ' + seconds + ' detik';

    if (timeLeftPretest === 0) {
      clearInterval(timerId);
      // Redirect ke method SimpanPreTest
      document.getElementById('opsipretest-form').submit();
    } else {
      timeLeftPretest--;
       localStorage.setItem('timeLeftPretest', timeLeftPretest); 
    }
  }
  // Periksa apakah ada waktu tersisa yang disimpan di localStorage
  var storedTimeLeft = localStorage.getItem('timeLeftPretest');
  if (storedTimeLeft) {
    timeLeftPretest = parseInt(storedTimeLeft);
  } else {
    timeLeftPretest = <?php echo $waktu; ?>;
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
        document.getElementById('opsipretest-form').appendChild(hiddenInput);
      });
    }
    // Submit the form
    document.getElementById('opsipretest-form').submit();
  }
</script>
