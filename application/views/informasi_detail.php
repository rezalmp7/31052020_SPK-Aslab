
        <div class="col-md-8 offset-md-2 pt-3 mt-md-5" id="informasi">
            <h2>Detail Informasi</h2>
            <div class="col-md-12 m-0 p-0">
                <div class="col-md-12 m-0 p-2 clearfix">
                    <div class="bg-dark rounded-circle float-right" id="circle"></div>
                </div>
                <div class="col-md-12 m-0 p-4" id="body">
                    <h4 class="text-center"><?php echo $informasi->judul; ?></h4>
                    <small class="col-12 d-block text-center"><b>Tanggal Acara:</b> <?php echo date('d/m/Y', strtotime($informasi->tanggal)); ?></small>
                    <p class="pt-2" style="text-indent: 50px;"><?php echo $informasi->deskripsi; ?></p>
                </div>
            </div>
        </div>
    </div>