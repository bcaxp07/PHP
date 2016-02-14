<?php
    require('header.php');
?>
<h1>Bongo Bike Shop</h1>
<h2>Order Form</h2>
<form action="dborder.php" method="post">
<table border="0">
<tr bgcolor="#cccccc">
  <td width="150">Item</td>
  <td width="15">Quantity</td>
</tr>
<tr>
  <td>Road Bikes</td>
  <td align="left"><input type="text" name="roadqty" size="3" maxlength="3"/></td>
</tr>
<tr>
  <td>Mountain Bikes</td>
  <td align="left"><input type="text" name="mtnqty" size="3" maxlength="3"/></td>
</tr>
<tr>
  <td>BMX Bikes</td>
  <td align="left"><input type="text" name="bmxqty" size="3" maxlength="3"/></td>
</tr>
<tr>
  <td>Helmets</td>
  <td align="left"><input type="text" name="helmqty" size="3" maxlength="3"/></td>
</tr>
<tr>
  <td>Pads</td>
  <td align="left"><input type="text" name="padqty" size="3" maxlength="3"/></td>
</tr>
<tr>
  <td>Name</td>
  <td align="center"><input type="text" name="name" size="40" maxlength="40"/></td>
</tr>
<tr>
  <td>Shipping Address</td>
  <td align="center"><input type="text" name="address" size="40" maxlength="40"/></td>
</tr>
<tr>
  <td>City</td>
  <td align="center"><input type="text" name="city" size="40" maxlength="40"/></td>
</tr>
<tr>
  <td>State</td>
  <td align="center"><input type="text" name="state" size="40" maxlength="40"/></td>
</tr>
<tr>
  <td>Zip Code</td>
  <td align="center"><input type="text" name="zip" size="40" maxlength="40"/></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value="Submit Order"/></td>
</tr>
</table>
</form>
<?php
    require ('footer.php');
?>