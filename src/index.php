<!---
create table Entries(
   order_id INT NOT NULL AUTO_INCREMENT,
   person_name VARCHAR(100) NOT NULL,
   birthday_date DATE,
   PRIMARY KEY ( order_id )
);
--->

<HTML>

<TITLE>Scavenger Hunt</TITLE>

<BODY>

<H1>Scavenger Hunt</H1>

<?php
$servername = "localhost";
$username = "scavengeruser";
$password = "scavengerpassword";
$dbname = "scavengerhunt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "<P>Connected successfully</P>";

$sqlCreateTableIfNotExists = "create table if not exists Entries(id VARCHAR(255) PRIMARY, clue_text VARCHAR(1000) NOT NULL);";
mysqli_query($conn, $sqlCreateTableIfNotExists);

if ( isset($_REQUEST) )
{
	$clueid = $_REQUEST['clueid'];

	if( isset($clueid) )
	{
		$sqlSelect = "SELECT clue_text FROM Entries WHERE id = '$clueid';";

                if( $result = mysqli_query($conn, $sqlSelect) )
		{
			if ($row = mysqli_fetch_assoc($result)) {
			        echo "Clue: " . $row['clue_text'];
		        } else {
                          echo "No record found for ID: " . $id;
                        }
		}

	}
	{
           echo "Scavenger hunt.  If you have a clue use the site like scavengerhunt.place.com/?clue_id=Whatever  Have fun!";
        }
}
else
{
	echo "Scavenger hunt.  If you have a clue use the site like scavengerhunt.place.com/?clue_id=Whatever  Have fun!";
}

$conn->close();
?>

<form action="index.php" method="post">
<p>
                <label for="clueid">Clue ID:</label>
                <input type="text" name="clueid" id="clueid">
</p>

            <input type="submit" value="Submit">
</form>

</BODY>
</HTML>
