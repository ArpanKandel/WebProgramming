<html>
	<head>
		<title>Songs by SongID from Library</title>
		<body bgcolor = "skyblue">
			<p align = "middle">
				<a href = "index.html"><img src = "12.jpg" height = "200" width = "200"></a>
			</p>
			<h1 align ="Center"> Search By Song ID</h3>
			<form method = "POST">
				<h2>
				<p align = "middle">
					Song ID:
					<input type = "text" name = "SID">
					<button name= "Search" type = "submit" id= "Search" value="Search" >
						Search
					</button>
				</p></h2>
			</form><?php
			if (isset($_POST['Search']))
				@$db = mysql_pconnect("localhost", "id1334907_akandel", "arpan");

			if (!@$db) {
				echo " ";
				exit ;
			}

			mysql_select_db("id1334907_my_music_library");
			@$SID = $_POST['SID'];

			$query1 = "select * from Songs where SongID = $SID;";

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