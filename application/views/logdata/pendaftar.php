
        <div class="col m-0 p-0 p-2" id="berita">
            <div class="col-md-12 m-0 p-2 pl-5 pr-5 row" id="head">
                <div class="pt-3 p-0 pr-3" id="breadcrumb">
                    Pendaftar (Peserta)
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
                        <h4>Data Pendaftar</h4>
                        <div class="col-md-12 m-0 p-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">NPM</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($peserta as $a) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $a->id; ?></td>
                                        <td><?php echo $a->npm; ?></td>
                                        <td><?php echo $a->nama; ?></td>
                                        <td><?php echo $a->semester; ?></td>
                                        <td><?php echo $a->alamat; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>logdata/pendaftar/detail?id=<?php echo $a->id; ?>" class="btn btn-primary rounded-circle btn-aksi"><i class="zmdi zmdi-search-in-file"></i></a>
                                            <a href="<?php echo base_url(); ?>logdata/pendaftar/hapus?id=<?php echo $a->id; ?>" class="btn btn-danger rounded-circle btn-aksi"><i class="zmdi zmdi-delete"></i></a>
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
