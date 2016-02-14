<?php
require('header.php');
    ?>
<section class ='content'>
  <h1>Bongo Bike Product Search</h1>
  
  <p>Use the following form to search for a product.</p>
  <p>Search by either category or product name if known. For example, to search for a mountain bike, enter 'mountain' in a category search.</p>
  
  <form action="bikeresult.php" method="post">
    Choose Search Type:<br />
    <select name="searchtype">
      <option value="category">Category
      <option value="name">Name
    </select>
    <br />
    Enter Search Term:<br />
    <input name="searchterm" type="text" size="40">
    <br />
    <input type="submit" name="submit" value="Search">
  </form>
</section>
<?php
    require ('footer.php');
?>

