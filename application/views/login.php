
        <div class="col-md-12 m-0 p-0 mt-5 pt-5 p-2" id="login">
            <div class="col-md-6 offset-md-3 p-5 shadow">
                <h2 class="text-center mb-5"><i class="zmdi zmdi-sign-in"></i> Sign In</h2>
                <?php
                if(isset($_GET['page']) && isset($_GET['msg']))
                {
                    if($_GET['page'] == 'signup' && $_GET['msg'] == '1')
                    {
                ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Password</strong> yang didaftarkan tidak sama
                </div>
                <?php
                    }
                    if ($_GET['page'] == 'signup' && $_GET['msg'] == '2') {
                ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Username</strong> sudah terdaftarkan
                </div>
                <?php
                    }
                    if ($_GET['page'] == 'signup' && $_GET['msg'] == '3') {
                ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Tanggal Hari ini</strong> bukan waktu pendaftaran 
                </div>
                <?php
                    }
                    if ($_GET['page'] == 'signin' && $_GET['msg'] == '2') {
                ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Username dan Password</strong> tidak terdaftarkan 
                </div>
                <?php
                    }
                }
                ?>
                <form method="POST" action="<?php echo base_url(); ?>login/login_aksi">
                    <div class="border-form p-2 m-0 mt-4 mb-4 pl-5 rounded-pill">
                        <input class="col-md-12 form-control" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="border-form p-2 m-0 mt-4 mb-4 pl-5 rounded-pill">
                        <input class="col-md-12 form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <a href="#" id="toRegister">Belum Daftar?</a>
                    <div class="col-md-12 clearefix">
                        <button class="float-right btn btn-primary rounded-pill pl-4 pr-4" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 m-0 p-0 mt-5 pt-5 p-2" id="register">
            <div class="col-md-6 offset-md-3 p-5 shadow">
                <div class="col-md-12">
                    <a href="#" id="toLogin"><i class="zmdi zmdi-arrow-left"></i></a>
                </div>
                <h2 class="text-center mb-5"><i class="zmdi zmdi-account-add"></i> Sign Up</h2>
                <form method="POST" action="<?php echo base_url(); ?>login/daftar_aksi">
                    <div class="border-form p-2 m-0 mt-4 mb-4 pl-5 rounded-pill">
                        <input class="col-md-12 form-control" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="border-form p-2 m-0 mt-4 mb-4 pl-5 rounded-pill">
                        <input class="col-md-12 form-control" type="text" name="email" placeholder="Email">
                    </div>
                    <div class="border-form p-2 m-0 mt-4 mb-4 pl-5 rounded-pill">
                        <input class="col-md-12 form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="border-form p-2 m-0 mt-4 mb-4 pl-5 rounded-pill">
                        <input class="col-md-12 form-control" type="password" name="re_password" placeholder="Repeat Password">
                    </div>
                    <div class="col-md-12 clearefix">
                        <button class="float-right btn btn-primary rounded-pill pl-4 pr-4" type="submit">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>