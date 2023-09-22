<div class="container mt-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-10 col-lg-10">
      <div class="border">
        <div class="question bg-white p-3 border-bottom">
          <div class="d-flex flex-row justify-content-between align-items-center mcq">
            <h4>Kunci Jawaban Quiz</h4>
          </div>
        </div>

        <?php
        $no = 0;
        foreach ($soal as $data) :
          $no++
        ?>

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
                <?php
                    if ($data['kunci'] == 'A') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="A" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_a\')">';

                    } else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="A" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_a\')">';
                    }
                ?>

                <span>&nbsp<?php echo $data['opsi_a']; ?></span>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <?php
                    if ($data['kunci'] == 'B') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="B" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_b\')">';

                    } else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="B" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_b\')">';
                    }
                ?>               
                <span>&nbsp<?php echo $data['opsi_b']; ?></span>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <?php
                    if ($data['kunci'] == 'C') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="C" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_c\')">';

                    } else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="C" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_c\')">';
                    }
                ?>                   
                <span>&nbsp<?php echo $data['opsi_c']; ?></span>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <?php
                    if ($data['kunci'] == 'D') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="D" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_d\')">';

                    } else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="D" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_d\')">';
                    }
                ?>         
                <span>&nbsp<?php echo $data['opsi_d']; ?></span>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <?php
                    if ($data['kunci'] == 'E') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="E" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_e\')">';

                    } else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="E" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_e\')">';
                    }
                ?>      
                <span>&nbsp<?php echo $data['opsi_e']; ?></span>
              </label>
            </div>

        <?php
        endforeach;
        ?>

      </div>
    </div>
  </div>
</div>
