<?php
include "functions.php";

$ID = $_GET['ID'];


if(isStaff()) {
	$updateQuery = "UPDATE `Books` SET `deleted` = 1 WHERE `ID` = :id";
		$stmt = $db->prepare($updateQuery);
		$stmt->bindParam(':id', $ID);
		$stmt->execute();
		?>
		<script type="text/javascript">
		window.location = "read.php?id=<?php echo($ID) ?>&a=20"
	</script>
		<?php

}
else { ?>
	<script type="text/javascript">
		window.location = "read.php?id=<?php echo($ID) ?>&a=21"
	</script>
<?php }
	
	
?>