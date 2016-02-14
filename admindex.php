<?php
  $name = $_POST['name'];
  $password = $_POST['password'];

  if ((!isset($name)) || (!isset($password))) {
  //Visitor needs to enter a name and password
?>
    <h1>Please Log In</h1>
    <p>This page is secret.</p>
    <form method="post" action="admindex.php">
    <p>Username: <input type="text" name="name"></p>
    <p>Password: <input type="password" name="password"></p>
    <p><input type="submit" name="submit" value="Log In"></p>
    </form>

<?php
  } else {
    // connect to mysql
    $mysql = mysqli_connect("localhost", "root", "password", "bikedb");
    if(!$mysql) {
      echo "Cannot connect to database.";
      exit;
    }
    // select the appropriate database
    $selected = mysqli_select_db($mysql, "bikedb");
    if(!$selected) {
      echo "Cannot select database.";
      exit;
    }

    // query the database to see if there is a record which matches
    $query = "select count(*) from admin where
              username = '".$name."' and
              password ='".$password."'";

    $result = mysqli_query($mysql, $query);
    if(!$result) {
      echo "Cannot run query.";
      exit;
    }
    $row = mysqli_fetch_row($result);
    $count = $row[0];

    if ($count > 0) {
      // visitor's name and password combination are correct
        ?>
    
      <?php
    require('adminheader.php');
?>
<section class = "content">
	<h1>Bongo Bike</h1>
	<p>
	Bongo Bike strives to be a leading vendor of quality bikes and accessories. Get on the road today!
	</p>
  <p>
  <p>
  <p>
  <h1>Bike Types</h1>
  <p>Our bike types offered: Road, Mountain and BMX</p>
    <p><img src="images/road.jpg" alt="road" width="125" height="125" class="imgpad">
    <img src="images/mountain.jpg" alt="mountain" width="125" height="125" class="imgpad">
    <img src="images/bmx.jpg" alt="bmx" width="125" height="125" class="imgpad"></p>
  <p>
  <p>
  <p>
  <h1>Accessories</h1>
  <p>We offer great accessories like helmets and pads too</p>
  <p><img src="images/helmet.jpg" alt="helmet" width="126" height="126" class="imgpad">
  <img src="images/pads.jpg" alt="pads" width="125" height="125" class="imgpad">  
</section>
<?php
    require ('footer.php');
?>
     
    <?php
    
    }
    else {
        
      // visitor's name and password combination are not correct
      echo "<h1>Go Away!</h1>
            <p>You are not authorized to use this resource.</p>";
    }
    
  }
?>