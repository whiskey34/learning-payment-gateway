
  <div class="content-wrapper">
  
    <form class="form-sample" action="" method="POST" enctype="multipart/form-data">

      <div class="row">
        <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
                    <h4 class="card-title">Order via kasir</h4>
                      <p class="card-description">
                        manual payment via cashier
                      </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date Order</label>
                            <div class="col-sm-9">
                              <input type="hidden" name="id" value="untuk order id" >
                              <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cashier</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="cashierUser" required>
                                <option>-- cashier username --</option>

                                <?php foreach ($cashiers as $row) : ?>
                                <option value="<?= $row->user_id?>"><?= $row->username; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- for customer data when order -->
                      <p class="card-description">
                        Customer Data
                      </p>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="firstName" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="lastName" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                    
                      <p class="card-description">
                        Address
                      </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address </label>
                            <div class="col-sm-9">
                              <!-- <input type="text" class="form-control" /> -->
                              <textarea class="form-control" id="address" name="address" required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="city" id="city" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="zipCode" id="zipCode"/>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                  </div>
          </div>
        </div>

        
                
              
      </div>

      <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Order Products</p>
              <div class="table-responsive">
                <button class="btn btn-behance" id="addRowBtn"><i class="ti-plus"></i></button>
                <table class="table table-striped table-borderless" id="prodTable">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Action</th>
                      
                    </tr>  
                  </thead>
                  <tbody>
                    <!-- looping column -->
                  
                    <tr>
                      <td>
                        <select class="js-example-basic-single w-100 form-control select_prod" name="prod" id="prod" required>
                            <?php ?>
                                <option> -- Choose product -- </option>
                                
                                <?php  foreach ($product as $row):?>
                                  <option value="<?= $row->product_id?>" data-price="<?= $row->harga?>"><?= $row->name; ?></option>
                                <?php  endforeach; ?>
                                <!-- <option value="AL">Alabama</option> -->
                            <?php ?>
                        
                        </select>
                      </td>
                      <td>
                        <input type="number" name="qty" id="qty" min="1" max="25" step="1" value="1" required/>
                      </td>
                      <td class="font-weight-bold">
                        <!-- Rp.90.000 -->
                        <p id="prodPrice"> Rp.0</p>
                      </td> 
                      <td>
                        <a href="#" class="btn btn-danger" id="removeRow"><i class="ti-trash font-xs"></i></a>
                      </td>
                      
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Totals Order:</p>
              <div class="table-responsive">
                <table class="table table-borderless" id="totalTable">
                  <thead>
                    <tr>
                      <th class="pl-0  pb-2 border-bottom">Total</th>
                      <th class="border-bottom pb-2">Prices</th>
                      <!-- <th class="border-bottom pb-2">Users</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <!-- looping column -->
                    <tr>
                      <td class="pl-0">Total Prices :</td>
                      <td><p class="mb-0" name="totalPrice" id="totalPrice"><span class="font-weight-bold mr-2">Rp.0</span></p></td>
                      <!-- <td class="text-muted">65</td> -->
                    </tr>
                    <tr>
                      <td class="pl-0">Discount % :</td>
                      <td><p class="mb-0"><span class="font-weight-bold mr-2" name="discount" id="discount">0%</span></p></td>
                      <!-- <td class="text-muted">65</td> -->
                    </tr>
                    <tr class="border-bottom">
                      <td class="pl-0">Shipping Cost :</td>
                      <td><p class="mb-0" name="shipCost" id="shipCost" value="Rp. 2,000"><span class="font-weight-bold mr-2">Rp. 2,000</span></p></td>
                      <!-- <td class="text-muted">65</td> -->
                    </tr>
                    
                    <tr>
                      <td class="pl-0">Total :</td>
                      <td><p class="mb-0" name="allTotal" id="allTotal"><span class="font-weight-bold mr-2">Rp. 0</span></p></td>
                      <!-- <td class="text-muted">65</td> -->
                    </tr>
                  
                    
                  </tbody>
                </table>
                <div class="checkout-button">
                  <button class="btn btn-primary" id="checkoutBtn">Checkout</button>
                  <!-- <a href="" class="btn btn-primary" id="checkoutBtn" data-target="blank">Checkout</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </form>

  

          
    
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <?php $this->load->view('partials/_footer'); ?>
  
  <!-- partial -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-oiKxuIaEuQvDEopC"></script>

<script>

$(document).ready(function () {

    // for button adding new row at product table
    $('#addRowBtn').click(function() {
      event.preventDefault();

      // Get the last row in the table
      var lastRow = $('#prodTable tbody tr:last');

      // Create a new row
      var newRow = $('<tr>' +
          '<td>' +
          '<select class="js-example-basic-single w-100 form-control select_prod" name="prod" id="prod" required>' +
          '<option> -- Choose product -- </option>' +
          '<?php foreach ($product as $row): ?>' +
          '<option value="<?= $row->product_id ?>" data-price="<?= $row->harga ?>"><?= $row->name; ?></option>' +
          '<?php endforeach; ?>' +
          '</select>' +
          '</td>' +
          '<td>' +
          '<input type="number" name="qty" id="qty" min="1" max="25" step="1" value="1" required/>' +
          '</td>' +
          '<td class="font-weight-bold">' +
          '<p id="prodPrice">Rp.0</p>' +
          '</td>' +
          '<td>' +
          '<a href="#" class="btn btn-danger removeRow"><i class="ti-trash font-xs"></i></a>' +
          '</td>' +
          '</tr>');

      // Append the new row to the table
      $('#prodTable tbody').append(newRow);

      // Initialize the select2 plugin for the new row
      newRow.find('.select_prod').select2();

      // Initialize the removeRow event for the new row
      newRow.find('.removeRow').click(function() {
          $(this).closest('tr').remove();
      });
    });

    // Change event for the product dropdown
    $('#prodTable tbody').on('change', 'select[name="prod"]', function () {
        var selectedProductId = $(this).val();

        // Get the closest row of the changed select element
        var closestRow = $(this).closest('tr');

        // Check if a product is selected
        if (selectedProductId) {
            // Fetch the product price using AJAX
            $.ajax({
                url: './get_product_price',
                type: 'POST',
                data: { product_id: selectedProductId },
                dataType: 'json',
                success: function(response) {
                    // Check if the response contains the expected 'price' property
                    if ('harga' in response) {
                        // Update the DOM element with the fetched price
                        closestRow.find('p#prodPrice').text('Rp.' + response.harga.toLocaleString());
                    } else {
                        console.error('Unexpected response format:', response);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error('Error fetching product price:', textStatus, errorThrown);
                }
            });

        } else {
            // Handle the case where no product is selected
            console.error('No product selected.');
            closestRow.find('p#prodPrice').html('Rp.0');
        }
    });


    // for update the price after select product into total price section
    // Initialize total price
    var totalPrice = 0;

    // Change event for the product dropdown
    $('#prodTable').on('change', '.select_prod', function () {
        updateTotalPrice();
    });

    // Change event for the quantity input
    $('#prodTable').on('input', 'input[name="qty"]', function () {
        updateTotalPrice();
    });

    function updateTotalPrice() {
      totalPrice = 0;
      shipCost = 2000;

      // Loop through each row in the table
      $('#prodTable tbody tr').each(function () {
          var selectedProductId = $(this).find('.select_prod').val();
          var quantity = $(this).find('input[name="qty"]').val();
          var productPrice = parseFloat($(this).closest('tr').find('p#prodPrice').text().replace('Rp.', '').replace(',', ''));


          // Fetch the product price using AJAX (similar to your previous code)

          // Calculate total for each row based on price and quantity
          var rowTotal = productPrice * quantity;

          // Update total price
          totalPrice += rowTotal;
      });

      // Update the DOM element with the total price
      $('p#totalPrice').text('Rp. ' + totalPrice.toLocaleString());
      
      
      // Total all price & shipping cost
      // var shipCost = parseFloat($(this).closest('tr').find('p#shipCost').text().replace('Rp.', '').replace(',', ''));
      var numericShippingCost = parseFloat(shipCost) || 0;

      var allTotal = totalPrice + numericShippingCost;

      // $('#allTotal').text('Rp.' + allTotal.toLocaleString());
      $('#allTotal').html('<span class="font-weight-bold mr-2">Rp. ' + allTotal.toLocaleString() + '</span>');

    }


    // to pass to controller via js jquery 

    $('#checkoutBtn').click(function(event) {

        event.preventDefault();
        // Gather data
        var orderData = {
          date_order: $('input[name="date"]').val(),
          // cashier_id: $(this).find('select[name="cashierUser"]').val(),
          cashier_id: $('select[name="cashierUser"]').val(),
          first_name: $('input[name="firstName"').val(),
          last_name: $('input[name="lastName"]').val(),
          address: $('#address').val(),
          zip_code: $('#zipCode').val(),
          city: $('#city').val(),
          total: $('p#totalPrice').text(),
          shipCost: $('p#shipCost').text(),
          
          totals: [],

          // Gather product data
          products: []
            
        };

        $('#prodTable tbody tr').each(function() {
            var productRow = {
                product_id: $(this).find('select[name="prod"]').val(),
                quantity: $(this).find('input[name="qty"]').val(),
                price: $(this).find('p#prodPrice').text()
                
            };

            orderData.products.push(productRow);
        });

        var overallTotal = 0; // Initialize overall total outside the loop

        $('#totalTable tbody tr').each(function(index) {
            var row = $(this);

            // Extract values
            var rowTotalPriceText = row.find('p#totalPrice').text();
            var rowShippingCostText = row.find('p#shipCost').text();

            // console.log('index: ' + index + ' Total Price Text: ' + rowTotalPriceText);
            // console.log('index: ' + index + ' Shipping Cost Text: ' + rowShippingCostText);

            var rowTotalPrice = parseFloat(rowTotalPriceText.replace('Rp.', '').replace(',', '').trim()) || 0;
            var rowShippingCost = parseFloat(rowShippingCostText.replace('Rp.', '').replace(',', '').trim()) || 0;

            // console.log('index: ' + index + ' Total Price: ' + rowTotalPrice);
            // console.log('index: ' + index + ' Shipping Cost: ' + rowShippingCost);

            // Calculate the row total
            var rowTotal = rowTotalPrice + rowShippingCost;

            // Log the row total for debugging
            // console.log('index: ' + index + ' Row Total: ' + rowTotal.toLocaleString());

            // Add the row total to the overall total
            overallTotal += rowTotal;

            // orderData.total.push(overallTotal.toLocaleString());
        });

        // Log the overall total for debugging
        // console.log('Overall Total: ' + overallTotal.toLocaleString());
        orderData.totals.push(overallTotal.toLocaleString());
        

        // Debug: Log the data to the console
        console.log('Order Data:', orderData);
        

        // Send data to backend
        $.ajax({
            url: './process_order', 
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(orderData),
            success: function(response) {
                
              console.log(response);
              window.location.href = './confirm_order';
                
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });

        console.log(JSON.stringify(orderData));
    });



    


    


});


</script>
