<!-- Page Footer-->
      <footer class="section footer-modern context-dark footer-modern-2">
        <div class="footer-modern-line">
          <div class="container">
            <div class="row row-50">
              <div class="col-md-6 col-lg-4">
                <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">What We Offer</span></h5>
                <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
                  <li><a href="#">Breads</a></li>
                  <li><a href="#">Cookies</a></li>
                  <li><a href="#">Cakes</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-3">
                <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">Information</span></h5>
                <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
                  <li><a href="about-us.html">About us</a></li>
                  <li><a href="#">Latest News</a></li>
                  <li><a href="#">Our Menu</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">Shop</a></li>
                  <li><a href="contacts.html">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-4 col-xl-5">
                <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">Newsletter</span></h5>
                <p class="wow fadeInRight">Sign up today for the latest news and updates.</p>
                <!-- RD Mailform-->
                <form class="rd-form rd-mailform rd-form-inline rd-form-inline-sm oh-desktop" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                  <div class="form-wrap wow slideInUp">
                    <input class="form-input" id="subscribe-form-2-email" type="email" name="email" data-constraints="@Email @Required"/>
                    <label class="form-label" for="subscribe-form-2-email">Enter your E-mail</label>
                  </div>
                  <div class="form-button form-button-2 wow slideInRight">
                    <button class="button button-sm button-icon-3 button-primary button-winona" type="submit"><span class="d-none d-xl-inline-block">Subscribe</span><span class="icon mdi mdi-telegram d-xl-none"></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-modern-line-2">
          <div class="container">
            <div class="row row-30 align-items-center">
              <div class="col-sm-6 col-md-7 col-lg-4 col-xl-4">
                <div class="row row-30 align-items-center text-lg-center">
                  <div class="col-md-7 col-xl-6"><a class="brand" href="index.html"><img src="<?=$footer_logo?>" alt="" width="95" height="95"/></a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-8 col-xl-8 oh-desktop">
                <div class="group-xmd group-sm-justify">
                  <div class="footer-modern-contacts wow slideInUp">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                      <div class="unit-body"><a class="phone" href="tel:#">+1 234-567-890</a></div>
                    </div>
                  </div>
                  <div class="footer-modern-contacts wow slideInDown">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                      <div class="unit-body"><a class="mail" href="mailto:#">themakepeacebread@gmail.com</a></div>
                    </div>
                  </div>
                  <div class="wow slideInRight">
                    <ul class="list-inline footer-social-list footer-social-list-2 footer-social-list-3">
                      <li><a class="icon mdi mdi-facebook" href="https://www.facebook.com/makepeacebakery/" target="__blank"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="https://www.instagram.com/themakepeacebakery/?hl=en" target="__blank"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-modern-line-3">
          <div class="container">
            <div class="row row-10 justify-content-between">
              <div class="col-md-6"><span>GK Enchanted Farm Pandi-Angat Rd, Angat, Bulacan</span></div>
              <div class="col-md-auto">
                <!-- Rights-->
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span></span><span>.&nbsp;</span><span>All Rights Reserved.</span><span> Developed&nbsp;by&nbsp;<a href="#">B4 and After Solutions Inc.</a></span></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="<?=base_url('assets/client/js/core.min.js')?>"></script>
    <script src="<?=base_url('assets/client/js/script.js')?>"></script>
    <!-- coded by Himic-->
    <script>
      var product_list = <?=json_encode($product_list);?>;
      var cart = <?=json_encode($_SESSION['cart_details']);?>;

      $(document).ready(function (){
        //initialize notification bar
        check_notification();
        //printing of cart from session
        for(var i = 0; i < cart.length; i++){
          var index = product_list.findIndex(product_list => product_list.id == cart[i]['product_details']['id']);
          print_cart(product_list, cart[i]['quantity'], index);
        }
      });
      $(document).on('click', '.close', function(){
        var id = $(this).closest('tr').attr('value'),
            check_cart = cart.findIndex(cart => cart.product_details.id == id);

        cart.splice(check_cart, 1);
        $(this).closest('tr').css('display', 'none');

        set_cart_session();
        check_notification();
      });

      function set_cart_session(){
        $.ajax({
          type: "POST",
          url: "<?=base_url('Bakery/set_cart_session')?>",
          data:{
            cart: cart
          }
        });
      }

      function print_cart(cart, quantity, index){
        var cart_item = "<tr value='"+cart[index]['id']+"'><td><button type='button' class='close'><span aria-hidden='true' style=\'color: #f72e2e\'>&times;</span></button></td><td><div class='row' style='margin-top: -25px;'><div class='def-number-input number-input safari_only' style='margin-left:auto; margin-right: auto;'><button class='plus cart-plus'></button><input type='number' id='cart-quantity' value='"+quantity+"' min='1'/><button class='minus cart-minus'></button></div></div></td><td><h6>"+cart[index]['name']+"</h6><p>&#8369;"+cart[index]['price']+"</p></td></tr>";
        $('#cart-list').append(cart_item);
      }

      function check_notification(){
        if(cart.length != 0){
          $('#checkout').prop('disabled', false);
          $('.has-badge').attr("data-count", cart.length);
        } else {
          $('#checkout').prop('disabled', true);
          $('.has-badge').removeAttr("data-count");
        }
      };

      //plus and minus button function
      $(document).on('click', '.plus', function(){
        this.parentNode.querySelector('input[type=number]').stepUp();
      });

      $(document).on('click', '.minus', function(){
        this.parentNode.querySelector('input[type=number]').stepDown();
      });

      $(document).on('change', '#cart-quantity', function(){
        update_quantity($(this));
      });

      $(document).on('click', '.cart-plus, cart-minus', function(){
        update_quantity($(this).parent().find('#cart-quantity'));
      });

      function update_quantity(cart_selector){
        var cart_quantity = cart_selector;
        var id = cart_quantity.closest('tr').attr('value'),
            quantity = cart_quantity.val(),
            check_cart = cart.findIndex(cart => cart.product_details.id == id);

        cart[check_cart]['quantity'] = quantity;
        set_cart_session();
      }
    </script>
  </body>
</html>
