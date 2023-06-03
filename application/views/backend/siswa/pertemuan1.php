         <div class="row">

             <div class="col-lg-6">

                 <!-- Default Card Example -->




                 <div class="card mb-4">
                     <div class="card-header">
                         <?= $this->session->flashdata("message");
                            ?>
                         <h6 class="m-0 font-weight-bold text-primary">Form Pengumpulan Tugas 1</h6>
                     </div>

                     <?php
                        //Jika sudah ada sebelumnya
                        echo '<div class="card-body">';
                        if ($banyakHasilTugas > 0) {
                            echo "Data sudah ada sebelumnya. Silahkan isi form dibawah ini untuk mengubah data";
                            //mengubah data yang sudah ada
                            echo form_open_multipart('siswa/editTugas');
                            echo '<div class="form-group">';

                            echo '<input type="hidden" name="slide" value="pertemuan1">';
                            echo '<input type="hidden" name="id_hasiltugas" value="' . $hasiltugas['id_hasiltugas'] . '">';
                            echo '<input type="hidden" name="filelama" value="' . $hasiltugas['upload'] . '">';
                            echo '<label for="selectOption">Pertemuan</label>';
                            echo '<div class="input-group input-group-outline">'; 
                            echo '<input type = "text" name = "pertemuan" value = "1" class = "form-control" readonly>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Text</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" name="text" rows="3">' . $hasiltugas['text'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Nilai</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="1">' . $hasiltugas['nilai'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Komentar</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class = "form-control" id="textArea" disabled name="text" rows="3">' . $hasiltugas['komentar'] . '</textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="fileUpload">Upload File (PDF)</label>';
                            //file pdf yang diupload
                            echo '<a href="' . base_url('assets/tugassiswa/' . $hasiltugas['upload']) . '" target="_blank">' . $hasiltugas['upload'] . '</a>';
                            echo '<input type="file" class="form-control-file" name="upload" id="fileUpload">';

                            echo '</div>';
                            //hapus dengan konfirmasi menggunakan alert

                            echo '<a href = "' . base_url('Siswa/hapusTugas/' . $hasiltugas['id_hasiltugas']) . '" class="btn btn-danger" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')">Delete</a>';



                            //delete data by Id button aja
                        } else {

                            echo form_open_multipart('siswa/tambahTugas');
                            echo '<div class="form-group">';
                            
                            echo '<input type="hidden" name="slide" value="pertemuan1">';
                            echo '<label for="selectOption">Pertemuan</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<input type = "text" name = "pertemuan" value = "1" class = "form-control" readonly>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="textArea">Text</label>';
                            echo '<div class="input-group input-group-outline">';
                            echo '<textarea class="form-control" id="textArea" name="text" rows="3"></textarea>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="fileUpload">Upload File (PDF)</label>';
                            echo '<input type="file" class="form-control-file" name="upload" id="fileUpload">';
                            echo '</div>';
                        }
                        ?>
                     <button type="submit" class="btn btn-success">Submit</button>
                     </form>
                 </div>
             </div>


             <!-- Basic Card Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Video</h6>
                 </div>
                 <div class="card-body">
                     <?php
                        foreach ($materi as $v) {
                            $iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $v['youtube'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            echo $iframe;
                        }
                        ?>

                 </div>
             </div>

         </div>

         <div class="col-lg-6">

             <!-- Dropdown Card Example -->
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Baca Materi dan Tugas Lengkap disini:</h6>
                     <div class="dropdown no-arrow">

                     </div>
                 </div>
                 <!-- Card Body -->

                 <div class="card-body">
                     <a href='<?= base_url('materi/pertemuan1/'); ?>'><i class="fas fa-book"> Materi</i></a>
                     &nbsp
                     <a href='<?= base_url('assets/tugas/') . $tugas['tugas']; ?>' target='_blank'><i class="fas fa-tasks"> Tugas</i></a>
                     &nbsp
                     <a href='<?= base_url('Comments1'); ?>' ><i class="fas fa-comment"> Komentar</i></a>
                 </div>
             </div>

             <!-- Collapsable Card Example -->

         </div>

         </div>

         </div>
         <!-- /.container-fluid -->