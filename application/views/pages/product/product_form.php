<div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                                <a href="<?= site_url('supplier');?>" class="btn btn-primary btn-icon-text">
                                    <i class="ti-back-left btn-icon-prepend"></i>
                                    Back
                                </a>
                        </div>

                        <h4 class="card-title"><?= $page; ?> Product Form</h4>
                        <p class="card-description">
                            <?= $page; ?> product form
                        </p>
                        <form class="forms-sample" action="<?= site_url('product/process');?>" method="POST" enctype="Multipart/Form-Data">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="hidden" name="product_id" value="<?= $row->product_id;?>">
                                <input type="text" class="form-control" name="name" value="<?= $row->name;?>" id="name" placeholder="Name" required>
                            </div>
                           
                            <div class="form-group">
                                <label>Images upload (Max 5MB)</label>
                                <input type="file" name="img" class="file-upload-default" id="fileInput">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" name="img" accept="image/*" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button" onclick="document.getElementById('fileInput').click()">Browse</button>
                                    </span>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" name="stock" class="form-control" id="stock" value="<?= $row->stock;?>" placeholder="Stock" required>
                            </div>

                            <div class="form-group">
                                <label  for="supplier">Supplier</label>
                                <select class="js-example-basic-single w-100 form-control" name="supplier" id="supplier">
                                    <?php foreach ($suppliers as $supplier) : ?>
                                        <option value="<?= $supplier->supplier_id; ?>"><?= $supplier->name; ?></option>
                                        
                                    <?php endforeach; ?>
                                <!-- <option value="AL">Alabama</option> -->
                               
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description
                                ">Description</label>
                                <textarea class="form-control" name="description" value="<?= $row->description;?>" id="description" rows="4"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" name="harga" value="<?= $row->harga;?>" aria-label="Amount (to the nearest rupiah)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>

                            <?php if ($subtitle === 'Add'): ?>
                                <button type="submit" name="add" class="btn btn-primary mr-2">Save</button>
                            <?php elseif ($subtitle === 'Edit'): ?>
                                <button type="submit" name="edit" class="btn btn-primary mr-2">Save Changes</button>
                            <?php endif; ?> 
                            <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button> -->
                            <button class="btn btn-light" type="reset">Cancel</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    
</div>