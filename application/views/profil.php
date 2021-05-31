<?php
if(isset($_GET['msg']))
{
    if($_GET['msg'] == 1)
    {
?>
<script type="text/javascript">
    alert("Photo harus berformat PNG/JPG/JPEG dan CV harus berformat PDF!!");
</script>
<?php
    }
    elseif ($_GET['msg'] == 2) {
?>
<script type="text/javascript">
    alert("Password Lama Salah!!");
</script>
<?php
    }
}
?>
        <div class="col-md-8 offset-md-2 pt-3 mt-md-5" id="informasi">
            <h2>Profil</h2>
            <div class="col-md-12 m-0 p-0">
                <div class="col-md-12 m-0 p-2 clearfix">
                    <div class="bg-dark rounded-circle float-right" id="circle"></div>
                </div>
                <div class="col-md-12 m-0 p-4" id="body">
                    <?php
                    if($user->photo == null)
                    {
                        $photo = "default.png";
                    }
                    else {
                        $photo = $user->photo;
                    }
                    ?>
                    <div class="col-md-12 m-0 p-0"><img class="mx-auto d-block rounded-circle" src="<?php echo base_url(); ?>assets/img/peserta/data/<?php echo $photo; ?>" height="200px" width="200px"></div>
                    
                    <?php
                    $attributes = ['enctype' => 'multipart/form-data', 'class' => 'pt-3'];
                    echo form_open('profil/edit', $attributes);?>
                        <input type="hidden" name="password_lama" value="<?php echo $user->password; ?>">
                        <input type="hidden" name="id" value="<?php echo $this->session->userdata('id'); ?>">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama <span style="color: red;">*</span> :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="<?php echo $user->nama; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NPM <span style="color: red;">*</span> :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="npm" value="<?php echo $user->npm; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username <span style="color: red;">*</span> :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ganti Password :</label>
                            <div class="col-sm-10 p-0 m-0 row">
                                <div class=" col">
                                    <input type="password" class="form-control" name="password" placeholder="password_lama">
                                </div>
                                <div class=" col">
                                    <input type="password" class="form-control" name="password_baru" placeholder="password_baru">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email <span style="color: red;">*</span> :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="<?php echo $user->email; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No HP <span style="color: red;">*</span> :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_hp" value="<?php echo $user->no_hp; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No HP <span style="color: red;">*</span> :</label>
                            <div class="col-sm-10">    
                                <select class="custom-select" name="semester">
                                    <option value="">-- Select Semester --</option>
                                    <option value="1" <?php if($user->semester == 1) echo 'selected'; ?>>1</option>
                                    <option value="2" <?php if($user->semester == 2) echo 'selected'; ?>>2</option>
                                    <option value="3" <?php if($user->semester == 3) echo 'selected'; ?>>3</option>
                                    <option value="4" <?php if($user->semester == 4) echo 'selected'; ?>>4</option>
                                    <option value="5" <?php if($user->semester == 5) echo 'selected'; ?>>5</option>
                                    <option value="6" <?php if($user->semester == 6) echo 'selected'; ?>>6</option>
                                    <option value="7" <?php if($user->semester == 7) echo 'selected'; ?>>7</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat <span style="color: red;">*</span> :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" value="<?php echo $user->alamat; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Photo :</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="photo_lama" value="<?php echo $user->photo; ?>">
                                <input type="file" class="form-control-file" name="photo">
                                <small style="color: red;">Photo berformat JPG/PNG/JPEG</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">CV :</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="cv_lama" value="<?php echo $user->cv; ?>">
                                <input type="file" class="form-control-file" name="cv">
                                <small style="color: red;">CV berformat PDF</small><br>
                                <small><a href="<?php echo base_url(); ?>assets/img/peserta/data/<?php echo $user->cv; ?>"><i class="zmdi zmdi-download"></i> Download File CV Sekarang</a></small>
                            </div>
                        </div>
                        <?php
                        foreach ($nilai as $a) {
                        ?>
                        <div class="form-group row">
                            <input type="hidden" name="id_nilai[]" value="<?php echo $a->id; ?>">
                            <label class="col-sm-2 col-form-label"><?php echo $a->nama; ?>  <span style="color: red;">*</span> :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nilai_nilai[]" value="<?php echo $a->nilai; ?>" required>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="col-12 m-0 p-3 clearfix">
                            <button type="submit" class="btn btn-sm btn-success float-right"><i class="zmdi zmdi-edit"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>