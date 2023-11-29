<div class="content-wrapper">

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h5>Confirmation Order :</h5>
                    <!-- foreach to show order data from kasir -->
                    <table>
                            
                            <tr>
                                <td>Date Order : <?= $date; ?></td>
                            </tr>
                            <tr>
                                <td>Name : <?= $name; ?> </td>
                            </tr>
                            <tr>
                                <td>Adress : <?= $address; ?> </td>
                            </tr>

                            <!-- <tr>
                                <td><//?= $product_name; ?> x<//?= $qty; ?> = </td>
                            </tr> -->
                            
                            <tr>
                                <td>Shipping cost : <?= $shipCost; ?> </td>
                            </tr>
                            
                            <tr>
                                <td>Total : <?= $total; ?> </td>
                            </tr>
                            
                    </table>
                    <!-- end foreach -->
                   
                    <input type="hidden" name="tokenMid" id="tokenMid" value="<?= $token;?>">
                    <div>
                        <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $token;?>" data-target="blank" class="btn btn-primary">Bayar</a>
                    </div>
                    </div>
                </div>
                
            </div> 
            
        </div>
    </form>
           
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php $this->load->view('partials/_footer'); ?>
    
    <!-- partial -->


</div>