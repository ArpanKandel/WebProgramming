<html>
	<head>
		<title>Delete Songs from Database</title>
		<body bgcolor = "skyblue">
			<p align = "middle">
				<a href = "index.html"><img src = "12.jpg"height = "200" width = "200"></img></a>
			</p>

			<form method = "POST">
				<h2>
				<p align = "middle">
					Please Enter the Song ID to Delete from Library:
					<input type = "text" name = "SID">
					<button name= "Delete" type = "submit" id= "Delete" value="Delete">
						Delete
					</button>
				</p></h2>
			</form>
			<?php
			if (isset($_POST['delete']))
				$db_host = 'localhost';
			$db_user = 'id1334907_akandel';
			$db_password = 'arpan';
			@$co = mysql_connect($db_host, $db_user, $db_password);

			if (!$co) {
				die('Could not connect: ' . mysql_error());
			}

			@$SID = $_POST['SID'];

			$query1 = "DELETE FROM Songs WHERE SongID = $SID;";

			mysql_select_db('id1334907_my_music_library');
			$retval = mysql_query($query1, $co);
			?>
		</body>
</html>