<html>
<?php
    require('adminheader.php');
?>
<section class = "content">
  <h1>Bongo Bike - Product Entry</h1>

  <p>Note: CategoryID must be an integer between 1 and 5</p>
  
  <form action="product_add.php" method="post">
    <table border="0">
      <tr>
        <td>ProductID</td>
         <td><input type="text" name="productid" maxlength="13" size="13"></td>
      </tr>
      <tr>
        <td>CategoryID</td>
        <td> <input type="text" name="catid" maxlength="5" size="2"></td>
      </tr>
      <tr>
        <td>Name</td>
        <td> <input type="text" name="name" maxlength="60" size="30"></td>
      </tr>
      <tr>
        <td>Price $</td>
        <td><input type="text" name="price" maxlength="7" size="7"></td>
      </tr>
      <tr>
        <td>Description</td>
         <td><input type="text" name="description" maxlength="100" size="50"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Register"></td>
      </tr>
    </table>
  </form>
</section>
    <?php
        require('footer.php');
    ?>
