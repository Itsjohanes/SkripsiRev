<style>

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
                    <?php
        // Mendefinisikan array opsi
        $options = ['A', 'B', 'C', 'D', 'E'];

        // Mengacak array opsi
        shuffle($options);

        // Menampilkan opsi yang telah diacak
        foreach ($options as $option) {
            ?>
            <div class="ans ml-2">
                <label class="radio">
                    <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="<?php echo $option; ?>" onclick="saveSelectedOption(<?php echo $data['id_soal'] ?>, '<?php echo $option; ?>')">
                    <?php
                    $optionData = $data['opsi_' . strtolower($option)];
                    if (!empty($optionData)) :
                        if (file_exists('assets/img/posttest/' . $optionData)) :
                            ?>
                            <img src="<?= base_url('assets/img/posttest/' . $optionData); ?>" width="500px" alt="Gambar Opsi <?php echo $option; ?>">
                        <?php else : ?>
                            <?= nl2br(htmlspecialchars($optionData)); ?>
                        <?php endif;
                    endif; ?>
                </label>
            </div>
        <?php } ?>


        <?php
        endforeach;
        ?>

          <div class="d-flex justify-content-center mt-4">
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