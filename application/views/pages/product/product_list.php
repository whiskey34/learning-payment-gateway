        
        <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Product List</p>
                    <div class="pull-right">
                        <a href="<?= site_url('product/add');?>" class="btn btn-primary btn-flat mb-3">
                            <i class="ti-plus"></i>
                            Create
                        </a>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                            
                          <table id="userTable" class="table table-hover" style="width:100%">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Images</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Harga</th>
                                <th>supplier_id</th>
                                <th>Actions</th>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; foreach($row->result() as $hasil => $data) { ?>
                                <tr>
                                    <td><?= $no ++; ?></td>
                                    <td><?= $data->name; ?></td>
                                    <td><img style="width: 150px; height: 150px;" src="<?= base_url($data->images); ?>" alt="img"></td>
                                    <td><?= $data->stock; ?></td>
                                    <td><?= $data->description; ?></td>
                                    <td><?= $data->harga; ?></td>
                                    <td><?= $data->supplier_id; ?></td>
                                    <td>
                                        
                                          <a href="<?= site_url('product/edit/'.$data->product_id);?>" class="btn btn-warning btn-xs">
                                              <i class="ti-pencil"></i>
                                              Edit
                                          </a> |
                                          <a href="<?= site_url('product/delete/'.$data->product_id);?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure ?')">
                                              <i class="ti-trash"></i>
                                              Delete
                                          </a> 
                                          
                                        
                                    </td>
                                    <td></td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php $this->load->view('partials/_footer'); ?>
          
          <!-- partial -->


        </div>
        <!-- main-panel ends -->
     



