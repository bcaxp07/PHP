<?php
function process_card($card_details) {
  // connect to payment gateway or
  // use gpg to encrypt and mail or
  // store in DB if you really want to

  return true;
}

/*function insert_order($order_details) {
  // extract order_details out as variables
  extract($order_details);

  // set shipping address same as address
  if((!$ship_name) && (!$ship_address) && (!$ship_city) && (!$ship_state) && (!$ship_zip) && (!$ship_country)) {
    $ship_name = $name;
    $ship_address = $address;
    $ship_city = $city;
    $ship_state = $state;
    $ship_zip = $zip;
    $ship_country = $country;
  }

  $conn = db_connect();

  // we want to insert the order as a transaction
  // start one by turning off autocommit
  $conn->autocommit(FALSE);

  // insert customer address
  $query = "select customerid from customers where
            name = '".$name."' and address = '".$address."'
            and city = '".$city."' and state = '".$state."'
            and zip = '".$zip."' and email = '".$email."'";

  $result = $conn->query($query);

  if($result->num_rows>0) {
    $customer = $result->fetch_object();
    $customerid = $customer->customerid;
  } else {
    $query = "insert into customers (name, address, city, state, zip, email) values
            ('".$name."','".$address."','".$city."','".$state."','".$zip."','".$email."')";
    $result = $conn->query($query);

    if (!$result) {
       return false;
    }
  }

  $customerid = $conn->insert_id;

  $date = date("Y-m-d"); //'".$_SESSION['total_price']."'

  $query = "insert into orders (customerid, name, address, city, ostate, zip, email, total, date)  values
            ('".$customerid."', '".$name."', '".$address."',
             '".$city."', '".$state."', '".$zip."', '".$email."',
             '".$_SESSION['total_price']."', '".$date."')";

  $result = $conn->query($query);
  if (!$result) {
    return false;
  }

  $query = "select orderid from orders where
               customerid = '".$customerid."' and
               total > (".$_SESSION['total_price']."-.001) and
               total < (".$_SESSION['total_price']."+.001) and
               date = '".$date."' and
               name = '".$name."' and
               address = '".$address."' and
               city = '".$city."' and
               state = '".$state."' and
               zip = '".$zip."' and
               email= '".$email."'";

  $result = $conn->query($query);

  if($result->num_rows>0) {
    $order = $result->fetch_object();
    $orderid = $order->orderid;
  } else {
    return false;
  }

  // insert each book
  foreach($_SESSION['cart'] as $productid => $quantity) {
    $detail = get_book_details($productid);
    $query = "delete from order_items where
              orderid = '".$orderid."' and productid = '".$productid."'";
    $result = $conn->query($query);
    $query = "insert into order_items (orderid, productid, price, quantity) values
              ('".$orderid."', '".$productid."', ".$detail['price'].", $quantity)";
    $result = $conn->query($query);
    if(!$result) {
      return false;
    }
  }

  // end transaction
  $conn->commit();
  $conn->autocommit(TRUE);

  return $orderid;
}*/

function insert_order2($order_details) {
      // extract order_details out as variables
  extract($order_details);
  
  @ $db = new mysqli('localhost', 'root', 'password', 'bikedb');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "insert into customers (name, address, city, state, zip, email) values
            ('".$name."','".$address."','".$city."','".$state."','".$zip."','".$email."')";

  $result = $db->query($query);

  if ($result) {
      //echo  $db->affected_rows."<h3> Product inserted successfully into database.</h3>";
  } else {
  	  echo "An error has occurred.  Order was not processed";
          return false;
  }
  
  $customerid = $db>insert_id;
  
  $date = date("Y-m-d"); //'".$_SESSION['total_price']."'
  

  $query2 = "insert into orders (customerid, name, address, city, state, zip, email, total, date)  values
            ('".$customerid."','".$name."', '".$address."',
             '".$city."', '".$state."', '".$zip."', '".$email."',
             '".$_SESSION['total_price']."', '".$date."')";
  
  //echo $query2;
  
  $result2 = $db->query($query2);
  
  
  if ($result2) {
      //echo  $db->affected_rows."<h3> Product inserted successfully into database.</h3>";
  } else {
  	  echo "An error has occurred.  Order was not processed.";
          return false;
  }

  
  
    
    $orderid = $db>insert_id;  
  

 foreach($_SESSION['cart'] as $productid => $quantity) {
    $detail = get_product_details($productid);
    
    $query3 = "insert into order_items (orderid, productid, price, quantity) values
              ('".$orderid."', '".$productid."', ".$detail['price'].", $quantity)";
    
    $result3 = $db->query($query3);
    //echo $query3;
    
      if ($result3) {
      //echo  $db->affected_rows."<h3> Product inserted successfully into database.</h3>";
    } else {
  	  echo "An error has occurred.  Order was not processed.";
          return false;
        }
  }
  
  $db->close();
  
  return true;
}
?>


