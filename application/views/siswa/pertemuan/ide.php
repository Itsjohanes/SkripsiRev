<div class="container-fluid">

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Online IDE</h6>
            <div class="dropdown no-arrow"></div>
            <div class="text-center my-2">
                <a class="btn btn-primary fs-9 py-2 px-4" role="button" href="<?php echo base_url('pertemuan/').$pertemuan['id_pertemuan']; ?>">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            
        <div data-pym-src="https://www.jdoodle.com/plugin" data-language="cpp"  data-version-index="4" >
            Optional default code goes here
        </div>
    
        </div>

    </div>
</div>
<script src="https://www.jdoodle.com/assets/jdoodle-pym.min.js" type="text/javascript"></script>
