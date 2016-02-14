<?php

  include ('product_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();

  do_html_header("Checkout");

  // create short variable names
  $name = $_POST['name'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $email = $_POST['email'];

  // if filled out
  if (($_SESSION['cart']) && ($name) && ($address) && ($city) && ($state) && ($zip) && ($email)) {
    if(insert_order2($_POST) == true) {
      //display cart, not allowing changes and without pictures
      display_cart($_SESSION['cart'], false, 0);

      display_shipping(calculate_shipping_cost());

      //get credit card details
      //display_card_form($name);
      
      echo "<p><h3>Order Processed! Thanks for shopping at Bongo Bike!<h3></p>";
      
      session_destroy();
      
      display_button("show_cart.php", "continue-shopping", "Continue Shopping");
    } else {
      echo "<p>Could not store data, please try again.</p>";
      display_button('checkout.php', 'back', 'Back');
    }
  } else {
    echo "<p>You did not fill in all the fields, please try again.</p><hr />";
    display_button('checkout.php', 'back', 'Back');
  }

  do_html_footer();
?>
