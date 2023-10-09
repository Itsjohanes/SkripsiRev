<div class="container mt-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-10 col-lg-10">
      <div class="border">
        <div class="question bg-white p-3 border-bottom">
          <div class="d-flex flex-row justify-content-between align-items-center mcq">
            <h4>Pembahasan Quiz</h4>
              <?php  echo '<h5>Nilai Anda:'. $nilai[0]->nilai;?> 
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
                    if ($arrayJawaban[$no-1] == 'A') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="A" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_a\')">';

                     
                    }else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']"  type="radio" value="A" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_a\')">';
                    }
                ?>

                <?php if (!empty($data['opsi_a'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_a'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_a']); ?>" width="200px" alt="Gambar Opsi A">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_a'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
                
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <?php
                    if ($arrayJawaban[$no-1] == 'B') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="B" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_b\')">';

                    }else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="B" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_b\')">';
                    }
                ?>   
                <?php if (!empty($data['opsi_b'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_b'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_b']); ?>" width="200px" alt="Gambar Opsi B">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_b'])); ?>
                    <?php endif; ?>
                <?php endif; ?>            
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <?php
                    if ($arrayJawaban[$no-1] == 'C') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="C" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_c\')">';
                    }else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="C" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_c\')">';
                    }
                ?>                   
                  <?php if (!empty($data['opsi_c'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_c'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_c']); ?>" width="200px" alt="Gambar Opsi C">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_c'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <?php
                    if ($arrayJawaban[$no-1] == 'D') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="D" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_d\')">';
                    }else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="D" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_d\')">';
                    }
                    
                ?>         
               <?php if (!empty($data['opsi_d'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_d'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_d']); ?>" width="200px" alt="Gambar Opsi D">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_d'])); ?>
                    <?php endif; ?>
                <?php endif; ?>   
              </label>
            </div>
            <div class="ans ml-2">
              <label class="radio">
                <?php
                    if ($arrayJawaban[$no-1] == 'E') {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" checked type="radio" value="E" onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_e\')">';

                    } else {
                        echo '<input name="pilihan[' . $data['id_soal'] . ']" type="radio" value="E" disabled onclick="saveSelectedOption(' . $data['id_soal'] . ', \'opsi_e\')">';
                    }
                ?>      
                  <?php if (!empty($data['opsi_e'])) : ?>
                       <?php if (file_exists('assets/img/quiz/' . $data['opsi_e'])) : ?>
                       <img src="<?= base_url('assets/img/quiz/' . $data['opsi_e']); ?>" width="200px" alt="Gambar Opsi E">
                    <?php else : ?>
                      <?= nl2br(htmlspecialchars($data['opsi_e'])); ?>
                    <?php endif; ?>
                <?php endif; ?> 
             </label>
            </div>
            <h5>Pembahasan</h5>
            <?php
                if($arrayJawaban[$no-1] == $data['kunci']){
                    echo '<p class="text-success">Jawaban Anda Benar</p>';
                }else{
                    echo '<p class="text-danger">Jawaban Anda Salah</p>';
                }
            ?>
            <p><?php echo $data['pembahasan'];?></p>

        <?php
        endforeach;
        ?>

      </div>
    </div>
  </div>
</div>
