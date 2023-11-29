<div class="content-wrapper">
    <div class="row">
        
        <div class="col-md-6 grid-margin stretch-card">
            
            <div class="card">
                <div class="card-body">
                        <div class="mb-3">
                            <a href="<?= site_url('user');?>" class="btn btn-primary btn-icon-text">
                                <i class="ti-file btn-icon-prepend"></i>
                                Back
                            </a>
                        </div>
                        <h4 class="card-title">Edit User</h4>
                        <p class="card-description">
                            Edit user data form
                        </p>
                    <?//= validation_errors(); ?>
                    <form class="forms-sample" action="" method="POST" id="editUserForm">
                        <?php //echo csrf_field(); ?> <!-- for protect the form using csrf-->
                            <div class="form-group row <?= form_error('username') ? 'has-error': null ?>">
                                <label for="Username" class="col-sm-3 col-form-label">Username *</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="user_id" value="<?= $row->user_id?>">
                                    <input type="text" class="form-control" name="username" value="<?= $this->input->post('username') ?? $row->username;?>" id="Username" placeholder="Username">
                                    <span class="help-block"><?= form_error('username'); ?></span>
                                
                                </div>
                            </div>
                            <div class="form-group row <?= form_error('email') ? 'has-error': null ?>">
                                <label for="Email" class="col-sm-3 col-form-label">Email*</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" value="<?= $this->input->post('email') ?? $row->email;?>" id="Email" placeholder="Email">
                                    <?= form_error('email'); ?>
                                
                                </div>
                            </div>
                            <div class="form-group row <?= form_error('name') ? 'has-error': null ?>">
                                <label for="Name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="<?= $this->input->post('name') ?? $row->name;?>" id="Name" placeholder="Full Name">
                                    <?= form_error('name'); ?>
                                
                                </div>
                            </div>
                            <div class="form-group row <?= form_error('address') ? 'has-error': null ?>">
                                <label for="Address" class="col-sm-3 col-form-label">Address*</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="address" value="<?= $this->input->post('address') ?? $row->address;?>" id="Address" placeholder="Address"></textarea>
                                    <?= form_error('address'); ?>
                                
                                </div>
                            </div>
                            <div class="form-group row <?= form_error('level') ? 'has-error': null ?>">
                                <label for="Level" class="col-sm-3 col-form-label">Level</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="level" id="Level">
                                        <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level;?>
                                        <option value="1">Admin</option>
                                        <option value="2" <?= $level == 2 ? 'selected' : null; ?>>Kasir</option>
                                    </select>
                                    <?= form_error('level'); ?>

                                </div>
                            </div>
                            <div class="form-group row <?= form_error('password') ? 'has-error': null ?>">
                                <label for="Password" class="col-sm-3 col-form-label">Password </label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" value="<?= $this->input->post('password');?>" name="password" id="Password" placeholder="Password">
                                    <?= form_error('password'); ?>
                                    
                                </div>
                            </div>
                            <div class="form-group row <?= form_error('passconf') ? 'has-error': null ?>">
                            
                                <label for="PasswordConf" class="col-sm-3 col-form-label">Re Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="passconf" value="<?= $this->input->post('passconf');?>" id="passwordConf" placeholder="Password Confirmation">
                                    <?= form_error('passconf'); ?>
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-primary mr-2">
                                <!-- <i class="mdi mdi-content-save"></i> -->
                                Save Changes
                            </button>
                            <button type="reset" class="btn btn-light" onclick="cancelForm()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- for js script for this page -->

<script>
    function cancelForm() {
        // Reset the form
        document.getElementById("editUserForm").reset();

        // Redirect to the recent page
        window.location.href = '<?= site_url('user/index') ?>';
    }
</script>
