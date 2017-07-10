<html>
	<head>
		<title>Query All Songs from Database</title>
		<link rel="stylesheet" type="text/css" href="Genre.css">

		<body bgcolor = "skyblue">
			<p>
				<a href = "index.html"><img src = "12.jpg"height = "200" width = "200"></img></a>
			</p>

			<?php

			@$db = mysql_pconnect("localhost", "id1334907_akandel", "arpan");

			if (!$db) {
				echo "ERROR: Could not connect to database.  Please try again later.";
				exit ;
			}

			mysql_select_db("id1334907_my_music_library");

			$query1 = "select * from Songs;";
			$query2 = "select * from Singer;";

			$result1 = mysql_query($query1);
			$result2 = mysql_query($query2);

			$num_results1 = mysql_num_rows($result1);
			$num_results2 = mysql_num_rows($result2);

			echo "<p>Number of Songs/Singers found: " . $num_results1 . "</p>";
			echo "<p>Number of Songs/Singers found: " . $num_results2 . "</p>";

			echo "<table border = 5> <tr><th>Song ID</th><th>Song Title</th><th>Singer ID</th><th>Year Release</th><th>Genre</th><th>Singer's First Name</th><th>Singer's Middle Name</th><th>Singer's Last Name</th><th>Singer's Gender</th><th>Singer's Date Of Birth</th>";
			for ($i = 0; $i < $num_results1; $i++) {
				$row1 = mysql_fetch_array($result1);
				$row2 = mysql_fetch_array($result2);
				echo "<tr><td>" . htmlspecialchars(stripslashes($row1["SongID"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row1["Song_Title"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row2["SingerID"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row1["Release_Year"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row1["Genre"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row2["Singer_FirstName"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row2["Singer_MiddleName"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row2["Singer_LastName"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row2["Gender"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row2["Date_of_Birth"])) . "</td></tr>";
			}
			echo "</table>";
			?>
		</body>
</html>