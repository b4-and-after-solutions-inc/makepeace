<section class="section section-lg bg-default text-md-left">
  <div class="container">
    <div class="row row-60 justify-content-center">
      <div class="col-lg-8">
        <h4 class="text-spacing-25 text-transform-none">Billing Address</h4>
        <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
          <div class="row row-20 gutters-20">
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="first_name" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="first_name">First Name*</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="last_name" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="last_name">Last Name*</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-wrap">
                <input class="form-input" id="address" type="text" name="address" data-constraints="@Required">
                <label class="form-label" for="address">Your Address*</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-wrap">
                <input class="form-input" id="email" type="email" name="email" data-constraints="@Email @Required">
                <label class="form-label" for="email">Your E-mail*</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact" type="text" name="phone" data-constraints="@Numeric" maxlength="11">
                <label class="form-label" for="contact">Your Phone*</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <select class="form-input" data-minimum-results-for-search="Infinity" data-constraints="@Required">
                  <option value="1">Mode of Payment</option>
                  <option value="2">Bank Deposit</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <label class="form-label" for="notes">Notes</label>
                <textarea class="form-input textarea-lg" id="notes" name="notes"></textarea>
              </div>
            </div>
          </div>
          <button class="button button-secondary button-winona" type="button" id="submit_order">Submit</button>
        </form>
      </div>
      <div class="col-lg-4">
        <div class="aside-contacts">
          <h4>Cart</h4>
          <div class="row row-10" <?php echo count($cart_details) >= 5 ? 'style="height: 498px; overflow-y: scroll; max-width: 100%; overflow-x:hidden;"' : " ";?>>
            <?php
              $total = 0;
              for($i = 0; $i < count($cart_details); $i++){
                $total += ($cart_details[$i]['product_details']['price'] * $cart_details[$i]['quantity']);
                echo '
                  <div class="col-sm-6 col-lg-12 aside-contacts-item">
                    <p class="aside-contacts-title">'.$cart_details[$i]['product_details']['name'].'</p>
                    <ul class="list-inline contacts-social-list list-inline-sm">
                      <li>Price: &#8369; '.$cart_details[$i]['product_details']['price'].'</li>
                      <li>Quantity: '.$cart_details[$i]['quantity'].' pcs</li>
                    </ul>
                  </div>
                ';
              }
            ?>
          </div>
            <?="<br /><h5 class='float-right'>Total: ". $total . "</h5>";?>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Modal-->
<div class="modal fade right" id="orderNotification" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Notification</h5>
      </div>
      <!--Body-->
      <div class="modal-body">
        <div class="col-12 row">
            <p><strong>Ordered Successfully.</strong></p>
            <p>Please see the email sent for further instruction regarding the placed order.</p>
        </div>
      </div>
      <!--footer-->
      <div class="modal-footer">
        <a href="<?=base_url();?>" class="btn btn-secondary btn-sm">Close</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal-->


<script>

  $(document).on('click', '#submit_order', function(){
    var order_header = {
      first_name: $('#first_name').val(),
      last_name: $('#last_name').val(),
      address: $('#address').val(),
      contact: $('#contact').val(),
      email: $('#email').val(),
      notes: $('#notes').val()
    };

    $.ajax({
      type: "POST",
      url: "<?=base_url('Bakery/order');?>",
      data:{
        order_header: order_header
      },
      success: function(data){
        if(data == "Success"){
          $('#orderNotification').modal('show');
        }
      }
    });

  });
</script>
