<div class="content-wrapper">
    <div class="row">

       <!-- content here -->
       <!-- <button class="btn btn-primary" Id="notifAlert">alert here!!</button> -->
    </div>
</div>


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
   
//    $(document).ready(function() {
//     $('#notifAlert').click(function(){
//         Swal.fire({
//             title: 'Test Modal',
//             text: 'This is a test modal.',
//             icon: 'success',
//             confirmButtonText: 'OK',
//             cancelButtonText: 'Cancel',
//             showCancelButton: true,
//         });
        
//     });
//    });

   document.addEventListener('DOMContentLoaded', function() {
       Swal.fire({
           title: 'Transactions',
           text: 'Horray...! Your transaction has been success. ',
           icon: 'success',
           confirmButtonText: 'OK'
       }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to order/list
                window.location.href = '<?= base_url("order/list"); ?>';
            }
        });
   });
</script>