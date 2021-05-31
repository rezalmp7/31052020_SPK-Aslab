
        <div class="col m-0 p-0 p-2" id="berita">
            <div class="col-md-12 m-0 p-2 pl-5 pr-5 row" id="head">
                <div class="pt-3 p-0 pr-3" id="breadcrumb">
                    <a href="<?php echo base_url(); ?>logdata/berita">Berita</a> / Edit
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
                        <h4>Tambah Data Pendaftar</h4>
                        <div class="col-md-12 m-0 p-4">
                            <form method="POST" action="<?php echo base_url(); ?>logdata/berita/edit_aksi">
                            <input type="hidden" name="id" value="<?php echo $berita->id; ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul</label>
                                    <input type="text" class="form-control" name="judul" value="<?php echo $berita->judul; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" rows="3" required><?php echo $berita->deskripsi; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" value="<?php echo $berita->tanggal; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
