<?php
include "../user/connection.php";
$id=$_GET["id"];
mysqli_query($link,"delete from category where id=$id");
?>
<script type="text/javascript">
	window.location="add_category.php";
</script>