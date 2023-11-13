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
                        if (file_exists('assets/img/pretest/' . $optionData)) :
                            ?>
                            <img src="<?= base_url('assets/img/pretest/' . $optionData); ?>"  width="500px" alt="Gambar Opsi <?php echo $option; ?>">
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
