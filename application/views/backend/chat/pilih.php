<div class="container-fluid">
     <h1 class="h3 mb-4 text-gray-800">Pilih Grup</h1>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <form method="post" action="<?php echo base_url('groupchat/choosegroup'); ?>">
                            <h2 class="text-center mb-4 ">Choose Group</h2><input type="number" name = "kelompok">
                                <div class="mb-3"></div>
                                <div class="mb-3"></div>
                                <div><button class="btn btn-primary d-block w-100" type="submit">Send </button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

