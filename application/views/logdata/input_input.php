
        <div class="col m-0 p-0 p-2" id="berita">
            <div class="col-md-12 m-0 p-2 pl-5 pr-5 row" id="head">
                <div class="pt-3 p-0 pr-3" id="breadcrumb">
                    <a href="<?php echo base_url(); ?>logdata/nilai">Nilai Peserta</a> / Edit
                </div>
                <div class="col">
                    <div class="dropdown float-right" id="profil">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle" src="<?php echo base_url(); ?>assets/img/website/photo.png">
                        </a>

                        <div class="dropdown-menu rounded-lg dropdown-menu-right p-1" aria-labelledby="dropdownMenuLink">
                            <div class="col-md-12 m-0 p-1"><i class="zmdi zmdi-account"></i> <?php echo $this->session->userdata['nama']; ?></div>
                            <div class="col-md-12 m-0 p-0"><a href="<?php echo base_url(); ?>logdata/login/logout" class="p-1"><i class="zmdi zmdi-long-arrow-return"></i> Sign Out</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 m-0 p-2 pl-5 pr-5" id="body">

                <div class="col-md-12 m-0 p-2 pl-5 pr-5">
                    <div class="col-md-12 m-0 mt-4 p-4" id="table">
                        <h4>Edit Data Nilai Peserta</h4>
                        <div class="col-md-12 m-0 p-4">
                            <form method="POST" action="<?php echo base_url(); ?>logdata/input/input_aksi">
                            <input type="hidden" name="id" value="<?php echo $data_peserta->id; ?>">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $data_peserta->nama; ?>" required readonly>
                                </div>
                                <?php
                                foreach ($nilai as $a) {
                                    if($a->id_kriteria != 1 && $a->id_kriteria != 3)
                                    {
                                ?>
                                <div class="form-group row">
                                    <input type="hidden" name="id_nilai[]" value="<?php echo $a->id; ?>">
                                    <label class="col-sm-2 col-form-label"><?php echo $a->nama; ?>  <span style="color: red;">*</span> :</label>
                                    <div class="col-sm-10">
                                        <input <?php if($a->id_kriteria == 3 ) { echo "type='text'"; } else { echo "type='number'"; } ?> class="form-control" name="nilai_nilai[]" value="<?php echo $a->nilai; ?>" <?php if($a->id_kriteria!=1 || $a->id_kriteria!=3) { echo "min='0.0' max='4.0' step='0.1'"; } if($a->id_kriteria==1 || $a->id_kriteria==3) { echo "readonly "; }?> required>
                                    </div>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>