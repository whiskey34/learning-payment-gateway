<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Choose Payment Methods</h3>
                </div>
                <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                    <h6>Status : Payment Methods</h6>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <p>token :</p>
            <p><?= $token; ?></p>
            <div>
                <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $token;?>" data-target="blank" class="btn btn-primary">Submit</a>
            </div>
        </div>
        
        
        
    </div>
           
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php $this->load->view('partials/_footer'); ?>
    
    <!-- partial -->


</div>
<!-- main-panel ends -->