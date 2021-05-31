
        <div class="col m-0 p-0 p-2" id="dashboard">
            <div class="col-md-12 m-0 p-2 pl-5 pr-5 row" id="head">
                <div class="pt-3 p-0 pr-3" id="breadcrumb">
                    Dashboard
                </div>
                <div class="col">
                    <div class="dropdown float-right" id="profil">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle" src="<?php echo base_url(); ?>assets/img/website/photo.png">
                        </a>
                    
                        <div class="dropdown-menu rounded-lg dropdown-menu-right p-1" aria-labelledby="dropdownMenuLink">
                            <div class="col-md-12 m-0 p-1"><i class="zmdi zmdi-account"></i> <?php echo $this->session->userdata['nama']; ?></div>
                            <div class="col-md-12 m-0 p-0"><a href="<?php echo base_url(); ?>logdata/login/logout" class="p-1"><i class="zmdi zmdi-long-arrow-return"></i> Sign Out</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 m-0 p-2" id="body">
                <div class="col-10 offset-1 mt-2 pt-2 pb-1 p-2">
                    <h4 class="text-center">Sistem Pendukung Keputusan</h4>
                    <h4 class="text-center">Seleksi Asisten Laboratorium Komputer</h4>
                </div>

                <div class="col-10 offset-1 mt-2 pt-2 pb-1 p-2 row" id="top">
                    <div class="col-6 p-2 pr-md-5 pl-md-5 h-100 ">
                        <div class="col-md-12 m-0 p-2 row" id="total_peserta">
                            <div><i class="zmdi zmdi-accounts-alt"></i></div>
                            <div class="col text-right">Total<br><?php echo $jumlah_peserta; ?> Peserta</div>
                        </div>
                    </div>
                    <div class="col-6 p-2 pr-md-5 pl-md-5 h-100 ">
                        <div class="col-md-12 m-0 p-2 row" id="waktu">
                            <div><i class="zmdi zmdi-calendar-close"></i></div>
                            <div class="col text-right">Pendaftaran ditutup<p id="count-time"></p></div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-stretch col-10 offset-1 mt-1 p-2 row" id="berita">
                    <div class="align-self-stretch col-4 p-2">
                        <div>
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <div class="align-self-stretch col-8 p-2">
                        <div class="col-md-12 m-0 p-3 h-100"  id="berita-body">
                            <h5>Berita Terbaru</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col">1</th>
                                        <td>Pendaftaran</td>
                                        <td>
                                            <?php
                                            $in = 1; 
                                            foreach($pendaftaran as $c)
                                            {
                                                if($in == 2)
                                                {
                                                    echo " - ";
                                                }
                                                echo date('d/m/Y', strtotime($c->tanggal));
                                                $in++;
                                            }
                                            ?>
                                        </td>
                                        <td>Pendaftaran</td>
                                    </tr>

                                <?php
                                $no = 2;
                                foreach ($berita as $b) {
                                    if($b->id == 1 || $b->id == 2)
                                    {
                                        continue;
                                    }
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $b->judul; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($b->tanggal)); ?></td>
                                        <td><?php echo $b->deskripsi; ?>
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

                <div class="col-10 offset-1 mt-1 p-2 row" id="pendaftar">
                    <h4>Peserta seleksi</h4>
                    <div class="col-12 pl-5 pr-5">
                        <div class="col-md-12" id="scroll">
                            <div>
                                <?php
                                foreach ($photo_peserta as $a) {
                                    if($a->photo != null)
                                    {
                                        $photo = $a->photo;
                                    }
                                    else {
                                        $photo = "default.png";
                                    }
                                ?>
                                <img class="rounded-circle m-1" src="<?php echo base_url(); ?>assets/img/peserta/data/<?php echo $photo; ?>">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 m-0 p-2 mt-4" id="footer">
                    <hr>
                    <span>Universitas PGRI Semarang</span><span class="float-right">2020</span>
                </div>
                
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/calendar/src/mini-event-calendar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main_admin.js"></script>
    <script>
        // Mengatur waktu akhir perhitungan mundur
        var countDownDate = new Date("<?php echo date('M d, Y', strtotime($tanggal_akhir->tanggal)); ?> 23:59:59").getTime();
        console.log(countDownDate);
        // Memperbarui hitungan mundur setiap 1 detik
        var x = setInterval(function() {

        // Untuk mendapatkan tanggal dan waktu hari ini
        var now = new Date().getTime();
            
        // Temukan jarak antara sekarang dan tanggal hitung mundur
        var distance = countDownDate - now;
            
        // Perhitungan waktu untuk hari, jam, menit dan detik
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Keluarkan hasil dalam elemen dengan id = "demo"
        document.getElementById("count-time").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
            
        // Jika hitungan mundur selesai, tulis beberapa teks 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("count-time").innerHTML = "EXPIRED";
        }
        }, 1000);
    </script>
    <script>
        var sameDaylastWeek = new Date('September 20, 2020');

        // All dates should be provided in timestamps
        var sampleEvents = [
            <?php
            foreach ($berita as $c) {
            ?>
            {
                title: "<?php echo $c->judul; ?>",
                date: "<?php echo date('F d, Y', strtotime($c->tanggal)); ?>"
            },
            <?php
            }
            ?>
        ];

        $(document).ready(function () {
            $("#calendar").MEC({
                events: sampleEvents
            });

            // Make calendar start on monday
            $("#calendar2").MEC({
                from_monday: true,
                events: sampleEvents
            });
        });
    </script>

</body>

</html>