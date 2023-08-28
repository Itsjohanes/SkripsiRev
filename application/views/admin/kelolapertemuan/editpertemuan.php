<!-- Begin Page Content -->

 <script>
    angular.module('myApp',['angularjs-datetime-picker']);
    angular.module('myApp').run(function($rootScope) {
      $rootScope.gmtDate = new Date('2015-01-01 00:00:00 -00:00');
    });
  </script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('kelolapertemuan/runeditpertemuan'); ?>
        <div class="form-group">
            <input type = "hidden" name = "gambar_lama" value = "<?php echo $materi['gambar'];?>">
            <label for="link">Pertemuan</label>
            <div class="input-group input-group-outline">
            <input type = "hidden" value = "<?php echo $materi['id_pertemuan'];?>" name = "id_pertemuan" id = "id_pertemuan">
            <div class="input-group input-group-outline">
            <input type = "text" required class="form-control" disabled id = "pertemuan" name = "pertemuan" value = "<?php echo $materi['pertemuan'];?>">
            </div>
            <label for="nilai">Penjelasan</label>
            <div class="input-group input-group-outline">
            <textarea type="textarea" required class="form-control" id="penjelasan" name="penjelasan"><?php echo $materi['penjelasan'];  ?></textarea>
            </div>
            <label for="nilai">Video Conference Link</label>
            <div class="input-group input-group-outline">
            <input type="text" required class="form-control" id="link" name="link" value="<?php echo $materi['videoconference'];  ?>">
            </div>
            <label for="nilai">Tujuan Pembelajaran</label>
            <div class="input-group input-group-outline">
            <textarea type="textarea" required class="form-control" id="tp" name="tp"><?php echo $materi['tp'];  ?></textarea>
            </div>
            <label for="nilai">Gambar</label>
            <img src="<?= base_url('assets/pertemuan/' . $materi['gambar']) ?>" width = "150px" height = "100px" alt="Gambar"></img>
            <div class="input-group input-group-outline">
            <input type="file" required class="form-control" id="gambar" name="gambar">
            </div>
            <label for="date">Dateline Tugas:</label>
            <div class="input-group input-group-outline">
            <h6>Sebelumnya: <?php echo $materi['dateline_tgs'];?></h6>
            </div>
            <div class="row" ng-app="myApp">
                <input ng-model="date3" ng-init="date3='<?php echo $materi['dateline_tgs'];?>';" name="dateline-tgs" datetime-picker date-format="yyyy-MM-dd HH:mm:ss"  size="100"  /> <br/> <br/>
            </div>
            
            

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>

</div>
<!-- End of Main Content -->