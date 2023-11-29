<div class="content-wrapper">
    <div class="row">
        
        <div class="col-md-6 grid-margin stretch-card">
            
            <div class="card">
                <div class="card-body">
                        <div class="mb-3">
                            <a href="<?= site_url('supplier');?>" class="btn btn-primary btn-icon-text">
                                <i class="ti-back-left btn-icon-prepend"></i>
                                Back
                            </a>
                        </div>
                        <h4 class="card-title"><?= $subtitle; ?> New Supplier</h4>
                        <p class="card-description">
                            <?= $subtitle; ?> new supplier form
                        </p>
                    <?//= validation_errors(); ?>
                    <form class="forms-sample" action="<?= site_url('supplier/process');?>" method="POST">
                        <?php //echo csrf_field(); ?> <!-- for protect the form using csrf-->
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Name *</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="supplier_id" value="<?= $row->supplier_id; ?>">
                                    <input type="text" class="form-control" name="name" value="<?= $row->name;?>" id="Name" placeholder="Full Name" required>
                                    
                                
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phoneNum" class="col-sm-3 col-form-label">Phone Number*</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="phone" value="<?= $row->phone;?>" id="phoneNum" placeholder="Phone Number" required>
                                    
                                
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="Address" class="col-sm-3 col-form-label">Address *</label>
                                <div class="col-sm-9">
                                    <!-- <textarea class="form-control" name="address" value="<?= $row->address;?>" id="Address" placeholder="Address" required></textarea> -->
                                    <textarea class="form-control" name="address" id="Address" placeholder="Address" required><?= $row->address; ?></textarea>

                                
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Desc" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" value="<?= $row->description;?>" id="Desc" placeholder="Description"></textarea>
                                    
                                
                                </div>
                            </div>
                            
                           
                            <!-- <button type="submit" name="<?//= $page;?>" class="btn btn-primary mr-2">
                                <i class="ti-save"></i>
                                Save
                            </button> -->

                            <?php if ($subtitle === 'Add'): ?>
                                <button type="submit" name="add" class="btn btn-primary mr-2">Save</button>
                            <?php elseif ($subtitle === 'Edit'): ?>
                                <button type="submit" name="edit" class="btn btn-primary mr-2">Save Changes</button>
                            <?php endif; ?>
                            <button type="reset" class="btn btn-light">Cancel</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>