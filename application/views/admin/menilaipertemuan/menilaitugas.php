<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata("message");
    ?>
</div>
<!-- /.container-fluid -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('menilaipertemuan/runmenilai'); ?>
        <div class="form-group">

            <input type="hidden" class="form-control" id="id_hasiltugas" name="id_hasiltugas" value="<?php echo $pertemuan['id_hasiltugas'];  ?>">
            <input type="hidden" class="form-control" id="pertemuan" name="pertemuan" value="<?php echo $pertemuan['id_pertemuan'];  ?>">
            <label for="text">Hasil Tugas</label>
            </br>
            <textarea id="textArea" class="form-control" disabled name="text" rows="3"><?php echo $pertemuan['text']; ?></textarea>
            </br>
            <label for="text">File</label><br>
            <a href="<?= base_url(); ?>assets/tugassiswa/<?= $pertemuan['upload']; ?>" <i class="fas fa-file-pdf"></i></a>
            <br>
            <label for="text">Tanggal Pengumpulan</label><br>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="tgl_pengumpulan" disabled name="tgl_pengumpulan" value="<?php echo $pertemuan['created_at'];  ?>">
            </div>
            <label for="text">Tanggal Perbaikan</label><br>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="tgl_perbaikan" disabled name="tgl_perbaikan" value="<?php echo $pertemuan['updated_at'];  ?>">
            </div>
            <label for="text">Tanggal Penilaian</label><br>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="tgl_penilaian" disabled name="tgl_penilaian" value="<?php echo $pertemuan['scored_at'];  ?>">
            </div>
            <label for="link">Nilai</label>
                <label for="inputNumber">Masukkan Angka:</label>
                <input type="number" id="inputNumber" min="1" oninput="generateInputs()" name="inputNumber">

                <div id="inputContainer"></div>
            <div class="input-group input-group-outline">
                <input type="hidden" class="form-control" id="nilai" name="nilai" value="<?php echo $pertemuan['nilai'];  ?>">
                <input type="hidden" class="form-control" id="penilaian" name="penilaian" value="<?php echo $pertemuan['penilaian'];  ?>">

            </div>


            <label for="nilai">Komentar</label>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="komentar" name="komentar" value="<?php echo $pertemuan['komentar'];  ?>">
            </div>



        </div>

        <button onclick="calculateTotal()" type="submit" class="btn btn-primary">Menilai</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->



<script>
          function generateInputs() {
            var inputNumber = document.getElementById("inputNumber").value;
            var container = document.getElementById("inputContainer");

            container.innerHTML = '';

            for (var i = 1; i <= inputNumber; i++) {
                var label = document.createElement("label");
                label.innerHTML = "Skala " + i + ": ";

                // Buat textbox
                var textBox = document.createElement("input");
                textBox.type = "text";
                textBox.name = "input" + i + "_textbox";
                textBox.placeholder = "Keterangan untuk Skala " + i;

                var radioContainer = document.createElement("div");

                for (var j = 1; j <= 10; j++) {
                    var radio = document.createElement("input");
                    radio.type = "radio";
                    radio.name = "input" + i + "_scale";
                    radio.value = j;
                    radio.id = "input" + i + "_scale" + j;

                    var radioLabel = document.createElement("label");
                    radioLabel.innerHTML = j;
                    radioLabel.setAttribute("for", "input" + i + "_scale" + j);

                    radioContainer.appendChild(radio);
                    radioContainer.appendChild(radioLabel);
                }

                var lineBreak = document.createElement("br");

                container.appendChild(label);
                container.appendChild(textBox);  // Tambahkan textbox sebelum radio button
                container.appendChild(radioContainer);
                container.appendChild(lineBreak);
            }
        }

         function calculateTotal() {
            var inputNumber = document.getElementById("inputNumber").value;
            var totalScore = 0;
			var penilaian = " ";

            for (var i = 1; i <= inputNumber; i++) {
                var selectedScale = document.querySelector('input[name="input' + i + '_scale"]:checked');
                var textBoxValue = document.querySelector('input[name="input' + i + '_textbox"]').value;

                if (selectedScale && textBoxValue !== "") {
                    // Tambahkan nilai skala ke totalScore
                    totalScore += parseInt(selectedScale.value);
					penilaian += (textBoxValue  + ": " + totalScore + " ");
                } else {
                    // Jika skala tidak dipilih atau textbox kosong, mungkin ingin memberikan pesan kesalahan atau melakukan tindakan lainnya
                    alert("Harap isi keterangan dan pilih skala untuk setiap elemen");
                    return false;
                }
            }

            // Hitung total nilai sesuai dengan rumus yang diinginkan
            totalScore = (totalScore / (inputNumber * 10)) * 100;

            // Masukkan nilai total ke dalam textbox dengan id "nilai"
            document.getElementById("nilai").value = totalScore;
			document.getElementById("penilaian").value = penilaian;
            // Agar form tidak mengirimkan permintaan ke server
            return false;
        }
    
        
</script>