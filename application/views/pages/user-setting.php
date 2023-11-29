        
        <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">User List</p>
                    <div class="pull-right">
                        <a href="<?= site_url('user/add');?>" class="btn btn-primary btn-flat mb-3">
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
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Level</th>
                                <th>Opt</th>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; foreach($row->result() as $hasil => $data) { ?>
                                <tr>
                                    <td><?= $no ++; ?></td>
                                    <td><?= $data->username; ?></td>
                                    <td><?= $data->name; ?></td>
                                    <td><?= $data->email; ?></td>
                                    <td><?= $data->address; ?></td>
                                    <td><?= $data->level == 1 ? "admin" : "kasir"; ?></td>
                                    <td>
                                        <form action="<?= site_url('user/delete');?>" method="POST">
                                          <a href="<?= site_url('user/edit/'.$data->user_id);?>" class="btn btn-warning btn-xs">
                                              <i class="ti-pencil"></i>
                                              Edit
                                          </a> |
                                          <?php //echo csrf_field(); ?> <!-- for protect the form using csrf-->
                                          <input type="hidden" name="user_id" value="<?= $data->user_id;?>"> 
                                          <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                              <i class="ti-trash"></i>
                                              Delete
                                          </button>
                                        </form>
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
     



