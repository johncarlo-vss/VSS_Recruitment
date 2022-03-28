<form id="a" action="dummy.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="myfile">
  <button type="submit">Save</button>
</form>
<?php
echo basename($_FILES["myfile"]["name"]);
?>
