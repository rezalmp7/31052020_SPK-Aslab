
        <div class="col m-0 p-0 p-2" id="perhitungan">
            <div class="col-md-12 m-0 p-2 pl-5 pr-5 row" id="head">
                <div class="pt-3 p-0 pr-3" id="breadcrumb">
                    Hasil Perhitungan
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tahap1-tab" data-toggle="tab" href="#tahap1" role="tab" aria-controls="tahap1"
                                aria-selected="true">Matriks (F)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tahap7-tab" data-toggle="tab" href="#tahap7" role="tab" aria-controls="tahap7"
                                aria-selected="false">Hasil Perhitungan (N)</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tahap1" role="tabpanel" aria-labelledby="tahap1-tab">
                            <div class="col-md-12 m-0 p-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">IPK</th>
                                            <th scope="col">Nilai Wawancara</th>
                                            <th scope="col">Nilai MK Arsitektur & Organisasi Komputer</th>
                                            <th scope="col">Kedisiplinan</th>
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
                                        </tr>
                                        <?php
                                        $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tahap7" role="tabpanel" aria-labelledby="tahap7-tab">
                            <div class="col-12 pl-5 pr-5 p-1">
                                <form class="form-inline col-md-6" method="post" action="<?php echo base_url(); ?>logdata/perhitungan/edit_diterima">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inlineFormCustomSelectPref" class="p-1">Max Diterima</label>
                                        <input type="number" name="value" value="<?php echo $max_diterima->value; ?>" class="form-control" id="inlineFormCustomSelectPref" placeholder="Max Diterima">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                                </form>
                            </div>
                            <div class="col-md-12 m-0 p-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Keterimaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if($jumlah_nilai > 1)
                                        {
                                            foreach ($hasil as $a) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $no; ?></th>
                                            <td><?php echo $a; ?></td>
                                            <td><?php if($no<=$max_diterima->value) { echo "<span style='color: green;'>Diterima</span>"; } else { echo "<span style='color: red;'>Tidak Diterima</span>"; } ?></td>
                                        </tr>
                                        <?php
                                        $no++;
                                            }
                                        }
                                        else {
                                        ?>
                                        <tr>
                                            <td class="text-center" colspan="3"><b>Data Harus Lebih Dari 1</b></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                if($status_pengumuman->value == 'false')
                                {
                                ?>
                                <div class="col-12 m-0 p-0">
                                    <a href="<?php echo base_url(); ?>logdata/perhitungan/umumkan" class="btn btn-success mt-4 mx-auto">Umumkan yang diterima</a>
                                </div>
                                <?php
                                }
                                elseif ($status_pengumuman->value == 'true') {
                                ?>                                
                                <div class="col-12 m-0 p-0">
                                    <a href="<?php echo base_url(); ?>logdata/perhitungan/batalkan" class="btn btn-success mt-4 mx-auto">Batalkan Pengumuman</a>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
