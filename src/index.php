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
echo "<P>Connected successfully</P>";

$sqlCreateTableIfNotExists = "create table if not exists Entries(id VARCHAR(255) PRIMARY KEY, clue_text VARCHAR(1000) NOT NULL);";
$createTable=mysqli_query($conn, $sqlCreateTableIfNotExists);
if( $createTable )
{
	echo "<P>Created Table</P>";
}
else
{
	echo "<P>No table created</P>";
}

if ( isset($_REQUEST) )
{
	$clueid = $_REQUEST['clueid'];

	if( isset($clueid) )
	{
		echo "<P>Clue: clueid is set :)<BR> " . $clueid . "</P>";
		$sqlSelect = "SELECT clue_text FROM Entries WHERE id = '" . $clueid . "';";

                if( $result = mysqli_query($conn, $sqlSelect) )
		{
			echo "<P>Query successful</P>";
			if ($row = mysqli_fetch_assoc($result)) {
				echo "<P>Fetch successful</P>";
			        echo "<P>Clue: " . $row['clue_text'] . "<P>";
		        } else {
                          echo "No record found for ID: " . $id;
                        }
		}
		else
		{
			echo "Issues with query";
		}

	}
	else
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
