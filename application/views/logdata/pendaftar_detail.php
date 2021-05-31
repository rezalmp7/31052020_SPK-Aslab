
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
                        <h4>Data Pendaftar </h4>
                        <div class="col-md-12 m-0 p-4">
                            <div class="col-12 pb-5">
                                <?php
                                if($peserta->photo != null)
                                {
                                    $photo = $peserta->photo;
                                }
                                else {
                                    $photo = "default.png";
                                }
                                ?>
                                <img class="d-block rounded-circle mx-auto" height="200px" width="200px" src="<?php echo base_url(); ?>assets/img/peserta/photo/<?php echo $photo; ?>">
                            </div>
                            <table class="table">
                                <tr>
                                    <th class="row">Nama</th>
                                    <td>: <?php echo $peserta->nama; ?></td>
                                </tr>
                                <tr>
                                    <th class="row">NPM</th>
                                    <td>: <?php echo $peserta->npm; ?></td>
                                </tr>
                                <tr>
                                    <th class="row">Username</th>
                                    <td>: <?php echo $peserta->username; ?></td>
                                </tr>
                                <tr>
                                    <th class="row">Email</th>
                                    <td>: <?php echo $peserta->email; ?></td>
                                </tr>
                                <tr>
                                    <th class="row">No HP</th>
                                    <td>: <?php echo $peserta->no_hp; ?></td>
                                </tr>
                                <tr>
                                    <th class="row">Semester</th>
                                    <td>: <?php echo $peserta->semester; ?></td>
                                </tr>
                                <tr>
                                    <th class="row">Alamat</th>
                                    <td>: <?php echo $peserta->alamat; ?></td>
                                </tr>
                                <tr>
                                    <th class="row">CV</th>
                                    <td>
                                        : Download Jika PDF tidak muncul - <a target="_blank" href="<?php echo base_url(); ?>assets/img/peserta/data/<?php echo $peserta->cv; ?>">to the PDF!</a>
                                        <object data="<?php echo base_url(); ?>assets/img/peserta/data/<?php echo $peserta->cv; ?>" type="application/pdf" width="100%" height="100%">
                                        <p>Alternative text - include a link <a href="<?php echo base_url(); ?>assets/img/peserta/data/<?php echo $peserta->cv; ?>">to the PDF!</a></p>
                                        </object>
                                    </td>
                                </tr>
                                <?php
                                foreach ($nilai as $a) {
                                ?>
                                <tr>
                                    <th class="row"><?php echo $a->nama; ?></th>
                                    <td>: <?php echo $a->nilai; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
