
        <div class="col-md-12 m-0 p-0 mt-5 pt-5 p-2" id="signupstep">
            <div class="col-md-6 offset-md-3 p-5 shadow">
                <h2 class="text-center mb-5">Lengkapi Data Anda</h2>
                <div class="col-md-6 offset-md-3 row" id="bar-progress">
                    <div class="garis col-md-12"></div>
                    <span class="rounded-circle circle1 active"><i class="zmdi zmdi-check"></i></span>
                    <span class="rounded-circle circle2"><i class="zmdi zmdi-check"></i></span>
                    <span class="rounded-circle circle3"></span>
                </div>
                <?php
                $attributes = ['enctype' => 'multipart/form-data', 'class' => 'pt-3'];
                echo form_open('login/tambah_data_user', $attributes);?>
                    <input type="hidden" name="id" value="<?php echo $this->session->userdata('id'); ?>">
                    <div class="col-md-12 m-0 p-0" id="form_step1">
                        <div class="form-group">
                            <input type="text" class="form-control rounded-pill" id="nama" name="nama" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control rounded-pill" id="npm" name="npm" placeholder="NPM" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control rounded-pill" id="no_hp" name="no_hp" placeholder="Nomor Telephone" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control rounded-pill" id="semester" name="semester" required>
                                <option value="">-- Semester --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control rounded-pill" id="alamat" name="alamat" placeholder="Alamat" required>
                        </div>
                        <div class="col-md-12 clearefix">
                            <a class="float-right btn btn-primary rounded-pill pl-4 pr-4" id="toStep2">Next</a>
                        </div>
                    </div>
                    <div class="col-md-12 m-0 p-0" id="form_step2">
                        <div class="form-group">
                            <input type="text" class="form-control rounded-pill" placeholder="IPK" name="ipk" required>
                            <small class="form-text text-muted text-dangers">Example: 3.5 true | 3,4 false.</small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control rounded-pill" name="mk_arorkom" placeholder="Nilai MK Arsitektur & Organisasi Komputer" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input rounded-pill" id="validatedCustomFile" name="cv" required>
                                <label class="custom-file-label" for="validatedCustomFile">Upload CV...</label>
                                <div class="invalid-feedback">Upload CV</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input rounded-pill" id="validatedCustomFile" name="photo" required>
                                <label class="custom-file-label" for="validatedCustomFile">Upload Photo Profil...</label>
                                <div class="invalid-feedback">Upload Photo</div>
                            </div>
                        </div>
                        <div class="col-md-12 clearefix">
                            <a class="float-right btn btn-primary rounded-pill pl-4 pr-4" id="toStep1">Back</a>
                        </div>
                        <div class="col-md-12 clearefix">
                            <button class="float-right btn btn-primary rounded-pill pl-4 pr-4" type="submit">Submit</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>