<html>
	<head>
		<title>Insert Songs</title>
		<body>
			<?php

			// get the data from the form and assign the data to variables

			$songtitle = $_POST['songtitle'];
			$singerfn = $_POST['singerfn'];
			$singermn = $_POST['singermn'];
			$singerln = $_POST['singerln'];
			$singergndr = $_POST['singergndr'];
			$singerdob = $_POST['singerdob'];
			$ryear = $_POST['ryear'];
			$genre = $_POST['genre'];

			// check to see if all the data is there

			if (!$songtitle || !$singerfn || !$singerln || !$singergndr || !$singerdob || !$ryear || !$genre) {
				echo "You have not entered all the required details.<br>" . "Please go back and try again.";
				exit ;
			}

			// add slashes and prepare the data for inserting into the db

			$songtitle = addslashes($songtitle);
			$singerfn = addslashes($singerfn);
			$singermn = addslashes($singermn);
			$singerln = addslashes($singerln);
			$singergndr = addslashes($singergndr);
			$singerdob = date($singerdob);
			$ryear = intval($ryear);
			$genre = addslashes($genre);

			// connect to the db

			@$db = mysql_pconnect("localhost", "id1334907_akandel", "arpan");

			if (!$db) {
				echo "ERROR: Could not connect to database.  Please try again later.";
				exit ;
			}

			// select the db
			mysql_select_db("id1334907_my_music_library");

			// prepare the query

			$query = "insert into Singer values
	('" . NULL . "',
    '" . $singerfn . "',
    '" . $singermn . "',
    '" . $singerln . "',
    '" . $singergndr . "',
    '" . $singerdob . "')";

			// run the query

			$result = mysql_query($query);

			if ($result)
				echo mysql_affected_rows() . " Singer added to Database.<br>";

			$query = "insert into Songs values
	('" . NULL . "','" . $songtitle . "','" . '"last_insert_id()"' . "','" . $ryear . "','" . $genre . "')";

			$result = mysql_query($query);

			if ($result)
				echo mysql_affected_rows() . " Song added to Database.<br>";
			?>
		</body>
</html>