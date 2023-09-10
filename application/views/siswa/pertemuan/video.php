 <div class="card shadow mb-4">

                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Video</h6>
                 </div>
                     <div class="my-2"><a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/').$pertemuan;?>">Kembali</a></div>

                 <div class="card-body">
                     <?php
                        foreach ($materi as $v) {
                            $iframe = '<iframe width="500" height="315" src="https://www.youtube.com/embed/' . $v['youtube'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            echo $iframe;
                        }
                        ?>

                 </div>
 </div>