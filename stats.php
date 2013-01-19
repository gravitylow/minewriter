<?php
require("functions.php"); 
require("../private/config.php");

function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
	} catch(PDOException $ex) {
		return $ex;
	}
	
}


$db = connectDB($dbUser, $dbPass, $dbName);
if ($db instanceof PDOException) {
	die ($db->getMessage());
}
$query = "SELECT * FROM `Stats` WHERE 1";
$stmt = $db->prepare($query);
$stmt->execute();
$row = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MineWriter Metrics</title>
	<?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">   
    <div class="content">
    	<table class="table">  
        <thead>  
          <tr>  
            <th>Statistic</th>  
            <th>Value</th>  
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td>Total Book Count</td>  
            <td><?php echo($row['BookCount']);?></td>  
          </tr>  
          <tr>  
            <td>Total Characters in all books</td>  
            <td><?php echo($row['TotalChars']);?></td>  
          </tr>  
          <tr>  
            <td>Average Characters per book</td>  
            <td><?php echo($row['AverageChars']);?></td>  
          </tr>  
          <tr>  
            <td>Most common word</td>  
            <td><?php echo($row['MostUsedWord']);?></td>  
          </tr>
          <tr>  
            <td>Longest book</td>  
            <td><?php echo($row['LongestBook']);?></td>  
          </tr> 
          <tr>  
            <td>Longest book length</td>  
            <td><?php echo($row['LongestBookLength']);?></td>  
          </tr> 
          <tr>  
            <td>Most common license</td>  
            <td><?php echo($row['FavLicense']);?></td>  
          </tr> 
        </tbody>  
      </table>  
        <?php divider(); ?>        
    </div>
    <p>These stats are generated every 10 minutes using the query service.</p>
    </div>
       <?php footer(); ?>    
    </div>
  </body>
</html>