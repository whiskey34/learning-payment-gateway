<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Delivery Order</h3>
                </div>
                <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                    <!-- <h6>Status : Delivery</h6> -->
                    <button class="btn btn-warning" >Print</button>
                    <button class="btn btn-danger">Pdf</button>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <table class="table table-hover table-responsive-md table-bordered" id="dtOrderList">
                <thead>
                    <tr>
                        <th class="th-sm">#</th>
                        <th class="th-sm">Id</th>
                        <th class="th-sm">Order_Id</th>
                        <th class="th-sm">Date</th>
                        <th class="th-sm">Status</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($list as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->history_id; ?></td>
                        <td><?= $row->order_id; ?></td>
                        <td><?= $row->timestamp; ?></td>
                        <td><span class="badge badge-pill badge-danger"><?= $row->status; ?></span></td>
                        <td>...</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                


            </table>
        </div>
        
        
        
    </div>
           
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php $this->load->view('partials/_footer'); ?>
    
    <!-- partial -->


</div>
<!-- main-panel ends -->

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>



<script>
    $(document).ready(function () {
        new DataTable('#dtOrderList');
       
        
        // var sweetAlertData = <?//php echo json_encode($sweetAlertData); ?>;

        // Swal.fire({
        //     title: sweetAlertData.title,
        //     text: sweetAlertData.message,
        //     icon: 'success',
        //     confirmButtonText: 'OK'
            
        // });
    });

</script>

