
        <div class="col-md-8 offset-md-2 pt-3 mt-md-5" id="informasi">
            <h2>Informasi</h2>
            <div class="col-md-12 m-0 p-0">
                <div class="col-md-12 m-0 p-2 clearfix">
                    <div class="bg-dark rounded-circle float-right" id="circle"></div>
                </div>
                <div class="col-md-12 m-0 p-4" id="body">
                    <?php
                    foreach ($informasi as $a) {
                    ?>
                    <a href="<?php echo base_url(); ?>informasi/detail?id=<?php echo $a->id; ?>" class="col-md-12 m-0 p-3 d-block mt-3 mb-3">
                        <h4><?php echo $a->judul; ?></h4>
                        <small><b>Tanggal Acara:</b> <?php echo date('d/m/Y', strtotime($a->tanggal)); ?></small>
                        <p class="pt-2"><?php echo $a->deskripsi; ?></p>
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>