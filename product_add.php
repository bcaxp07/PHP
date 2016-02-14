<?php
    require('adminheader.php');
    ?>
<section class ="content">
<?php
//create short variable names
  $productid=$_POST['productid'];
  $catid=$_POST['catid'];
  $name=$_POST['name'];
  $price=$_POST['price'];
  $description=$_POST['description'];

  if (!$productid|| !$catid || !$name || !$price || !$description) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $productid = addslashes($productid);
    $category = addslashes($category);
    $name = addslashes($name);
    $price = doubleval($price);
    $description = addslashes($description);
    
  }

  @ $db = new mysqli("localhost", "root", "password", "bikedb");

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "insert into products (productid, name, price, description, catid) values
            ('".$productid."','".$name."', '".$price."', '".$description."', '".$catid."')";

  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows."<h3> Product inserted successfully into database.</h3>"
              . "<p><a href = product_form.php>Back to add form</a></p>";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }

  $db->close();
?>
</section>
<?php
    require('footer.php');
    ?>
