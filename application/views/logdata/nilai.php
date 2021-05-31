
        <div class="col m-0 p-0 p-2" id="berita">
            <div class="col-md-12 m-0 p-2 pl-5 pr-5 row" id="head">
                <div class="pt-3 p-0 pr-3" id="breadcrumb">
                    Nilai Peserta
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
                        <h4>Data Nilai Peserta</h4><br>
                        <div class="col-md-12 m-0 p-4 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Id Peserta</th>
                                        <th scope="col">IPK</th>
                                        <th scope="col">Nilai Wawancara</th>
                                        <th scope="col">Nilai MK Arsitektur & Organisasi Komputer</th>
                                        <th scope="col">Nilai Kedisiplinan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($peserta_array as $key => $a) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $a[0]['nama']; ?></td>
                                        <td><?php echo $a[0]['nilai']; ?></td>
                                        <td><?php echo $a[1]['nilai']; ?></td>
                                        <td><?php echo $a[2]['nilai']; ?></td>
                                        <td><?php echo $a[3]['nilai']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>logdata/nilai/edit?id=<?php echo $a[0]['id_peserta']; ?>" class="btn btn-warning rounded-circle btn-aksi"><i
                                                    class="zmdi zmdi-edit"></i></a>
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
