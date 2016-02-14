<?php
    require ('header.php');
?>
<section class ='content'>
<h1>Search Results</h1>
<?php
  // create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  @ $db = new mysqli('localhost', 'root', 'password', 'bikedb');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select * from products where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of products found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p>".($i+1).". ProductID: ";
     echo stripslashes($row['productid']);
     echo "<br /><strong>Category: ";
     echo stripslashes($row['category']);
     $imgpointer = $row['category'];
     echo "<br />Name: ";
     echo stripslashes($row['name']);
     echo "</strong><br />Price: ";
     echo stripslashes($row['price']);
     echo "<br />Description: ";
     echo stripslashes($row['description']);
     echo "</p>";
  }

  $result->free();
  $db->close();
  
  switch($imgpointer) {
      case 'Road Bike':
          echo "<p><img src = images/road.jpg alt = road width = 250 height = 250 class = imgpad></p>";
          break;
      case 'Mountain Bike':
          echo "<p><img src = images/mountain.jpg alt = road width = 250 height = 250 class = imgpad></p>";
          break;
      case 'BMX Bike':
          echo "<p><img src = images/bmx.jpg alt = road width = 250 height = 250 class = imgpad></p>";
          break;
      case 'Helmet':
          echo "<p><img src = images/helmet.jpg alt = road width = 250 height = 250 class = imgpad></p>";
          break;
      case 'Pads':
          echo "<p><img src = images/pads.jpg alt = road width = 250 height = 250 class = imgpad></p>";
          break;
      default:
          break;
  }
?>
</section>
<?php
    require ('footer.php');
?>

