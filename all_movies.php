<html>
	<head>
		<title>Query All Movies from Database</title>
		<body>

			<?php

			@$db = mysql_pconnect("localhost", "id1334907_arpankandel", "akandel0308");

			if (!$db) {
				echo "ERROR: Could not connect to database.  Please try again later.";
				exit ;
			}

			mysql_select_db("id1334907_akandel");

			$query = "select * from movie";

			$result = mysql_query($query);
			$num_results = mysql_num_rows($result);

			echo "<p>Number of movies found: " . $num_results . "</p>";

			for ($i = 0; $i < $num_results; $i++) {
				$row = mysql_fetch_array($result);
				echo "<p>";
				echo htmlspecialchars(stripslashes($row["movieid"]));
				echo "<br>";
				echo htmlspecialchars(stripslashes($row["title"]));
				echo "<br>";
				echo htmlspecialchars(stripslashes($row["directorid"]));
				echo "<br>";
				echo htmlspecialchars(stripslashes($row["year"]));
				echo "<br>";
				echo htmlspecialchars(stripslashes($row["genre"]));
				echo "<br>";
				echo htmlspecialchars(stripslashes($row["runtime"]));
				echo "<br>";
				echo htmlspecialchars(stripslashes($row["plotdescription"]));
				echo "<br>";
				echo htmlspecialchars(stripslashes($row["comments"]));
				echo "<br>";
				echo "</p>";

			}
		?>
		</body>
</html>