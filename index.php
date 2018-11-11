<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		h3 {
			margin-top: 70px;
		}
	</style>
</head>
<body>

	<center>
		<h3>Send email with PHPMailer</h3>
		<form action="proses.php" method="post">
			<table>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="go" value="Register"></td>
				</tr>
			</table>
		</form>
	</center>

</body>
</html>