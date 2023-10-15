<div class="container mt-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-10 col-lg-10">
      <div class="border">
        <div class="question bg-white p-3 border-bottom">
          <div class="d-flex flex-row justify-content-between align-items-center mcq">
            <h4>Post-Test</h4>
            <span id="timer"></span> <!-- Tampilkan timer di sini -->
          </div>
        </div>

        <?php
        $no = 0;
        foreach ($soal as $data) :
          $no++
        ?>
          <form id="posttest-form" action="<?= base_url('Posttest/SimpanPostTest') ?>" method="POST">
            <div class="question bg-white p-3 border-bottom">
              <input type="hidden" name="id_posttest[]" value="<?php echo $data['id_soal']; ?>">
              <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
            </div>
            <div class="d-flex flex-row align-items-center question-title">
              <h6 class="mt-1 ml-2"><?php echo $no; ?>.</h6>
              <h6 class="mt-1 ml-2"><?php echo $data['soal']; ?></h6>
            </div>
            <?php
            if (!empty($data['gambar'])) {
              $nama = $data['gambar'];
              echo "<tr><td></td><td><img src='" . base_url('assets/img/posttest/' . $nama) . "' class='img-fluid' alt='Responsive image'></td></tr>";
            }
            ?>
  <div class="ans ml-2">
              <label class="radio">
                <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="A" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, 'A')">
                  <?php if (!empty($data['opsi_a'])) : ?>
                       <?php if (file_exists('assets/img/posttest/' . $data['opsi_a'])) : ?>
                       <img src="<?= base_url('assets/img/posttest/' . $data['opsi_a']); ?>" width="200px" alt="Gambar Opsi A">
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
                       <?php if (file_exists('assets/img/posttest/' . $data['opsi_b'])) : ?>
                       <img src="<?= base_url('assets/img/posttest/' . $data['opsi_b']); ?>" width="200px" alt="Gambar Opsi B">
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
                       <?php if (file_exists('assets/img/posttest/' . $data['opsi_c'])) : ?>
                       <img src="<?= base_url('assets/img/posttest/' . $data['opsi_c']); ?>" width="200px" alt="Gambar Opsi C">
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
                       <?php if (file_exists('assets/img/posttest/' . $data['opsi_d'])) : ?>
                       <img src="<?= base_url('assets/img/posttest/' . $data['opsi_d']); ?>" width="200px" alt="Gambar Opsi D">
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
                       <?php if (file_exists('assets/img/posttest/' . $data['opsi_e'])) : ?>
                       <img src="<?= base_url('assets/img/posttest/' . $data['opsi_e']); ?>" width="200px" alt="Gambar Opsi E">
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
  function saveSelectedOption(id, value) {
    var options = JSON.parse(localStorage.getItem('options')) || {};
    options[id] = value;
    localStorage.setItem('options', JSON.stringify(options));
  }

  document.addEventListener("DOMContentLoaded", function() {
    var options = JSON.parse(localStorage.getItem('options'));
    if (options) {
      Object.keys(options).forEach(function(id) {
        var radio = document.querySelector('input[name="pilihan[' + id + ']"][value="' + options[id] + '"]');
        if (radio) {
          radio.checked = true;
        }
      });
    }
  });

  function submitForm() {
    var options = JSON.parse(localStorage.getItem('options'));
    if (options) {
      Object.keys(options).forEach(function(id) {
        var hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'selected_options[' + id + ']';
        hiddenInput.value = options[id];
        document.getElementById('posttest-form').appendChild(hiddenInput);
      });
    }

    // Hapus data dari local storage setelah form dikirim
    localStorage.removeItem('options');

    document.getElementById('posttest-form').submit();
  }

  // Timer Countdown
  var timeLeftPosttest = <?php echo $waktu; ?>;
  var timerId;

  function startTimer() {
    timerId = setInterval(countdown, 1000);
  }

  function countdown() {
    var minutes = Math.floor(timeLeftPosttest / 60);
    var seconds = timeLeftPosttest % 60;

    // Tampilkan waktu pada elemen dengan id 'timer'
    document.getElementById('timer').innerHTML = minutes + ' menit ' + seconds + ' detik';
    document.getElementById('timer2').innerHTML = minutes + ' menit ' + seconds + ' detik';

    if (timeLeftPosttest === 0) {
      clearInterval(timerId);
      // Redirect ke method SimpanPostTest
      document.getElementById('posttest-form').submit();
    } else {
      timeLeftPosttest--;
      localStorage.setItem('timeLeftPosttest', timeLeftPosttest);
    }
  }

  var storedTimeLeft = localStorage.getItem('timeLeftPosttest');
  if (storedTimeLeft) {
    timeLeftPosttest = parseInt(storedTimeLeft);
  } else {
    timeLeftPosttest = <?php echo $waktu; ?>;
  }

  startTimer();
</script>