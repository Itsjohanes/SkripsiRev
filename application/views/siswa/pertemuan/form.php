
         <div class="row">


                 <!-- Default Card Example -->

                 <div class="card mb-4">
                     <div class="card-header">
                         <?= $this->session->flashdata("message");
                            ?>
                         <h6 class="m-0 font-weight-bold text-primary">Form Pengumpulan Tugas <?php echo $pertemuan;?></h6>
                         <div class="my-2"><a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/').$pertemuan;?>">Kembali</a></div>

                         <?php
                            $timestamp = strtotime($tp['dateline_tgs']);
                            setlocale(LC_TIME, 'id_ID');
                            // Alternatif penggunaan dengan date()
                            $formattedDateAlt = date('l, j F Y H:i:s', $timestamp);
                            echo "<br>";
                            echo "Dateline: " .$formattedDateAlt;
                         ?>
                         

                     </div>

                     <?php
                        //Jika sudah ada sebelumnya
                        echo '<div class="card-body">';
                        if ($banyakHasilTugas > 0) {
                            echo "Data sudah ada sebelumnya. Silahkan isi form di bawah ini untuk mengubah data";
                            //mengubah data yang sudah ada
                            echo form_open_multipart('pertemuan/edittugas');
                            echo '<div class="form-group">';

                            echo '<input type="hidden" name="slide" value="pertemuan1">';
                            echo '<input type="hidden" name="id_hasiltugas" value="' . $hasiltugas['id_hasiltugas'] . '">';
                            echo '<input type="hidden" name="filelama" value="' . $hasiltugas['upload'] . '">';
                            echo '<label for="selectOption">Pertemuan</label>';
                            echo '<div class="input-group input-group-outline">'; 
                            echo '<input type="text" name="pertemuan" value="' . $hasiltugas['id_pertemuan'] . '" class="form-control" readonly>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Text</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea required class = "form-control" id="textArea" name="text" rows="3">' . $hasiltugas['text'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Tanggal Pengumpulan</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="1">' . $hasiltugas['created_at'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Tanggal Perubahan</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="1">' . $hasiltugas['updated_at'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';

                            echo '<div class="form-group">';
                            echo '<label for="textArea">Tanggal Penilaian</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="1">' . $hasiltugas['scored_at'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Penilaian</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="1">' . $hasiltugas['penilaian'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Nilai</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="1">' . $hasiltugas['nilai'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Penilaian Sikap</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="1">' . $hasiltugas['penilaian_sikap'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Nilai</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="1">' . $hasiltugas['nilai_sikap'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';                            
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Komentar</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="3">' . $hasiltugas['komentar'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="fileUpload">Upload File (max 2mb) (PDF)</label>';
                            echo '</br>';
                            //file pdf yang diupload
                            echo '<a href="' . base_url('assets/tugassiswa/' . $hasiltugas['upload']) . '" target="_blank">' . $hasiltugas['upload'] . '</a>';
                            echo '<input type="file" class="form-control-file" required name="upload" id="fileUpload">';

                            echo '</div>';
                            //hapus dengan konfirmasi menggunakan alert
                            echo '</br>';
                            $waktuSekarang = time(); // atau menggunakan date('Y-m-d H:i:s')
                            $waktuDeadline = strtotime($tp['dateline_tgs']);
                            if($waktuSekarang <= $waktuDeadline ){
                                echo '<a href = "' . base_url('pertemuan/hapustugas/' . $hasiltugas['id_hasiltugas']) . '" class="btn btn-danger hapus-btn">Delete</a>';
                            }
                        } else {

                            echo form_open_multipart('pertemuan/tambahtugas');
                            echo '<div class="form-group">';
                            
                            echo '<input type="hidden" name="slide" value="pertemuan1">';
                            echo '<label for="selectOption">Pertemuan</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<input type="text" name="pertemuan" value="' . $pertemuan . '" class="form-control" readonly>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Text</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea  required class="form-control" id="textArea" name="text" rows="3"></textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="fileUpload">Upload File (max 2mb) (PDF)</label>';
                            echo '</br>';
                            echo '<input type="file" required class="form-control-file" name="upload" id="fileUpload">';
                            echo '</div>';
                            echo '</br>';
                        }
                        ?>
                     <?php
                            $waktuSekarang = time(); // atau menggunakan date('Y-m-d H:i:s')
                            $waktuDeadline = strtotime($tp['dateline_tgs']);
                            if($waktuSekarang <= $waktuDeadline ){ 
                                echo '<button type="submit" class="btn btn-success">Submit</button>';
                            }else{
                                echo 'Maaf  waktu pengumpulan tugas sudah selesai';
                            }

                     ?>
                     </form>
                 </div>
             </div>


             <!-- Basic Card Example -->
            

         </div>
