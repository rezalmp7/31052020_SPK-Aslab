
        <div class="col-md-8 offset-md-2 pt-3 mt-md-5" id="pengumuman">
            <h2>Pengumuman</h2>
            <div class="col-md-12 m-0 p-0">
                <div class="col-md-12 m-0 p-2 clearfix">
                    <div class="bg-dark rounded-circle float-right" id="circle"></div>
                </div>
                <div class="col-md-12 m-0 p-2" id="body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if($pengumuman->value == 'true')
                            {
                                foreach ($hasil as $a) {
                                    if($no > $max_diterima->value)
                                    {
                                        break;
                                    }
                            ?>
                            <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td><?php echo $a; ?></td>
                                <td><span style='color: green;'>Diterima</span></td>
                            </tr>
                            <?php
                            $no++;
                                }
                            }
                            else {
                            ?>
                            <tr>
                                <td class="text-center" colspan="3"><b><?php echo $hasil; ?></b></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>