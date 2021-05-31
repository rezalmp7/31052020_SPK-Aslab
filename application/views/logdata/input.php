
        <div class="col m-0 p-0 p-2" id="berita">
            <div class="col-md-12 m-0 p-2 pl-5 pr-5 row" id="head">
                <div class="pt-3 p-0 pr-3" id="breadcrumb">
                    Data Kriteria
                </div>
                <div class="col">
                    <div class="dropdown float-right" id="profil">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle" src="../img/website/photo.png">
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
                        <h4>Input Nilai Peserta</h4>
                        <div class="col-md-12 m-0 p-4">
                            <table id="data-table" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Id Peserta</th>
                                        <th scope="col">Nilai Wawancara</th>
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
                                        <td>
                                            <?php
                                            if($a[1]['nilai'] == null)
                                            {
                                                echo "-";
                                            }
                                            else {
                                                echo $a[1]['nilai'];
                                            } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($a[3]['nilai'] == null)
                                            {
                                                echo "-";
                                            }
                                            else {
                                                echo $a[3]['nilai'];
                                            } 
                                            ?>    
                                        </td>
                                        <td>
                                            <?php
                                            if($a[1]['nilai'] == null || $a[3]['nilai'] == null)
                                            {
                                            ?>
                                            <a class="btn btn-success rounded-circle btn-aksi" href="<?php echo base_url(); ?>logdata/input/input?id=<?php echo $a[0]['id_peserta']; ?>"><i class="zmdi zmdi-plus"></i></a>
                                            <?php
                                            }
                                            else {
                                            ?>
                                            <a class="btn btn-warning rounded-circle btn-aksi" href="<?php echo base_url(); ?>logdata/input/input?id=<?php echo $a[0]['id_peserta']; ?>"><i class="zmdi zmdi-edit"></i></a>
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
