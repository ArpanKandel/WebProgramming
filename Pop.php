<html>
	<head>
		<title>Query Pop Songs from Database</title>
		<link rel="stylesheet" type="text/css" href="Genre.css">
		<body bgcolor = "skyblue">
			<p>
				<a href = "Pop.php"><img src = "13.jpg" width = "200" height = "200"></img></a>
				<a href = "index.html"><img src = "12.jpg" width = "200" height = "200"></img></a>
			</p>
			<?php

			@$db = mysql_pconnect("localhost", "id1334907_akandel", "arpan");

			if (!$db) {
				echo "ERROR: Could not connect to database.  Please try again later.";
				exit ;
			}

			mysql_select_db("id1334907_my_music_library");

			$query1 = "SELECT * from Songs where Genre = 'Pop';";

			$result1 = mysql_query($query1);

			$num_results1 = mysql_num_rows($result1);

			echo "<p>Number of Songs found: " . $num_results1 . "</p>";
			echo "<table border = 5> <tr><th>Song ID</th><th>Song Title</th><th>Year Release</th><th>Genre</th>";
			for ($i = 0; $i < $num_results1; $i++) {
				$row1 = mysql_fetch_array($result1);
				echo "<tr><td>" . htmlspecialchars(stripslashes($row1["SongID"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row1["Song_Title"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row1["Release_Year"])) . "</td>";
				echo "<td>" . htmlspecialchars(stripslashes($row1["Genre"])) . "</td>";
			}
			echo "</table>";
			?>
		</body>
</html>