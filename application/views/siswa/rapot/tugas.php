<style>
    .smaller-button {
    padding: 5px 10px;
    font-size: 12px;
}

</style>
<a href="<?php echo base_url('rapot'); ?>" class="btn btn-success mb-3 smaller-button">Kembali</a>

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Rapot Tugas </h6>
                </div>
            </div>

            <div class="container mt-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3"></div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Penilaian</th>
                                <td>
                                    <?php
                                    if ($tugas != null) {
                                        echo $tugas['penilaian'];
                                    } else{
                                        echo "Belum Mengerjakan Tugas";
                                    }
                                    ?>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    
</div>

