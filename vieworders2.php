<?php
    include('adminheader.php');
?>
<section class ="content">
    
<h1>Bongo Bike</h1>
<h2>Orders Submitted</h2>
<?php

  // $result = new mysqli('localhost', 'root', 'password', 'bikedb');

// Create connection
$conn = new mysqli('localhost', 'root', 'password', 'bikedb');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select * from orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border = 1px solid black><tr><th>Order ID</th><th>Customer ID</th><th>Name</th><th>Address</th>
    <th>City</th><th>State</th><th>Zip</th><th>Email</th><th>Total</th>
    <th>Date</th><th>Timestamp</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["orderid"]."</td><td>".$row["customerid"]."</td>
                <td>".$row["name"]."</td><td>".$row["address"]."</td>
                <td>".$row["city"]."</td><td>".$row["state"]."</td>
                <td>".$row["zip"]."</td><td>".$row["email"]."</td>
                <td>".$row["total"]."</td><td>".$row["date"]."</td>
                <td>".$row["datetime"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>

</section>

<?php
    include('footer.php');
?>
