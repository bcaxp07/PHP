<?php
  // create short variable names
  $roadqty = $_POST['roadqty'];
  $mtnqty = $_POST['mtnqty'];
  $bmxqty = $_POST['bmxqty'];
  $helmqty = $_POST['helmqty'];
  $padqty = $_POST['padqty'];
  $address = $_POST['address'];
  $name = $_POST['name'];
  $city = $_POST['city'];
  $zip = $_POST['address'];
  //$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  $date = date('H:i, jS F Y');
  

?>
<html>
<head>
  <title>Bongo Bike - Your Order</title>
</head>
<body>
<h1>Bongo Bike</h1>
<h2>Order Summary</h2>
<?php

	echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";

	echo "<p>Your order is as follows: </p>";

        //Calculate total items ordered
	$totalqty = 0;
	$totalqty = $roadqty + $mtnqty + $bmxqty + $helmqty + $padqty;
	echo "Items ordered: ".$totalqty."<br />";

        //Display total items ordered. If a customer did not order at least 1
        //of an item, don't display it
	if ($totalqty == 0) {
          //If no items were ordered, display this line
	  echo "You did not order anything on the previous page!<br />";

	} else {

	  if ($roadqty > 0) {
		echo $roadqty." road bike(s)<br />";
	  }

	  if ($mtnqty > 0) {
		echo $mtnqty." mtn bike(s)<br />";
	  }

	  if ($bmxqty > 0) {
		echo $bmxqty." bmx bike(s)<br />";
	  }
          
          if ($helmqty > 0) {
              echo $helmqty." helmet(s)<br />";
          }
          
          if ($padqty > 0) {
              echo $padqty." pad(s)<br />";
          }
	}

        //Set the totalamount variable to 0.00 and create constants for
        //the prices of products
	$totalamount = 0.00;

	define('ROADPRICE', 125);
	define('MTNPRICE', 150);
	define('BMXPRICE', 100);
        define('HELMPRICE', 20);
        define('PADPRICE', 15);
        
        //Calculate order total
	$totalamount = $roadqty * ROADPRICE
				 + $mtnqty * MTNPRICE
				 + $bmxqty * BMXPRICE
                                 + $helmqty * HELMPRICE
                                 + $padqty * PADPRICE;

	$totalamount=number_format($totalamount, 2, '.', ' ');

	echo "<p>Total of order is $".$totalamount."</p>";
	echo "<p>Address to ship to is ".$address."</p>";
        
        //outputstring is what gets written to orders.txt
        //notice the order: date, the quantities of items, total, address

	$outputstring = $date."\t".$roadqty." road bikes\t".$mtnqty." mountain bikes\t".$bmxqty." bmx bikes\t".$helmqty." helmets\t".$padqty." pads\t" .$totalamount."\t". $address."\n";
					



	// open file for appending
	@$fp = fopen("orders/orders.txt", 'ab');

	flock($fp, LOCK_EX);

	if (!$fp) {
	  echo "<p><strong> Your order could not be processed at this time.
		    Please try again later.</strong></p></body></html>";
	  exit;
	}

	fwrite($fp, $outputstring, strlen($outputstring));
	flock($fp, LOCK_UN);
	fclose($fp);

	echo "<p>Order written.</p>";
        
        
?>
<p><a href = index.php>Bongo Bike Home</a></p>
</body>
</html>
