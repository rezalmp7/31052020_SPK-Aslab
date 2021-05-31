
        <div class="col m-0 p-0 p-2" id="berita">
            <div class="col-md-12 m-0 p-2 pl-5 pr-5 row" id="head">
                <div class="pt-3 p-0 pr-3" id="breadcrumb">
                    Berita
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
                    <div class="col-md-12 m-0 p-0" id="tambah">
                        <a href="<?php echo base_url(); ?>logdata/berita/tambah" class="btn btn-success rounded-pill btn-sm">
                            <i class="zmdi zmdi-plus-circle"></i> Tambah Data
                        </a>
                    </div>
                    <div class="col-md-12 m-0 mt-4 p-4" id="table">
                        <h4>Berita</h4>
                        <div class="col-md-12 m-0 p-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID Info</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">tanggal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td> 1 & 2 </td>
                                        <td>Pendaftaran</td>
                                        <td>
                                            <?php
                                            $in = 1;
                                            foreach ($pendaftaran as $b) {
                                                if($in==2)
                                                {
                                                    echo " - ";
                                                }
                                                echo date('d/m/Y', strtotime($b->tanggal));
                                                $in++;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>logdata/berita/info_pendaftaran" class="btn btn-primary rounded-circle btn-aksi"><i class="zmdi zmdi-search-in-file"></i></a>
                                            <a href="<?php echo base_url(); ?>logdata/berita/edit_pendaftaran" class="btn btn-warning rounded-circle btn-aksi"><i class="zmdi zmdi-edit"></i></a>
                                        </td>
                                    <?php
                                    $no = 2;
                                    foreach ($berita as $a) {
                                        if($a->id == 1 || $a->id == 2)
                                        {
                                            continue;
                                        }
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $a->id; ?></td>
                                        <td><?php echo $a->judul; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($a->tanggal)); ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>logdata/berita/info?id=<?php echo $a->id; ?>" class="btn btn-primary rounded-circle btn-aksi"><i class="zmdi zmdi-search-in-file"></i></a>
                                            <a href="<?php echo base_url(); ?>logdata/berita/edit?id=<?php echo $a->id; ?>" class="btn btn-warning rounded-circle btn-aksi"><i class="zmdi zmdi-edit"></i></a>
                                            <?php
                                            if($a->id!=1 && $a->id!=2)
                                            {
                                            ?>
                                            <a href="<?php echo base_url(); ?>logdata/berita/hapus?id=<?php echo $a->id; ?>" class="btn btn-danger rounded-circle btn-aksi"><i class="zmdi zmdi-delete"></i></a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;  
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>