<?php
require("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">
  <title>Image Upload</title>
</head>
<body>
   <div>
		<h1>Upload a File</h1>

		<form action="uploadProcess.php" method="post" enctype="multipart/form-data">
			<input type="file" name="image"/>
			<input type="submit" name="submit" id="button"/>
		</form>

		<p>
			<?php
				echo $_SESSION["msg"];
				$_SESSION["msg"] = '';
			?>
		</p>
    </div>

</body>
</html>
