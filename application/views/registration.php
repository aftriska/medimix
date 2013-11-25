<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MediMix</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<h1>Welcome to MediMix!</h1>
<div id="body">
	<p><a href="<? echo base_url(); ?>">Home</a></p>
	<p>Sign Up Here!</p>
	<br/>
	<form>
	<table>
		<tr><td>Username</td><td>:</td><td><input type="text" name="u_username"/></td></tr>
		<tr><td></td><td></td><td>maximum character: 50</td></tr>
		<tr><td>Password</td><td>:</td><td><input type="password" name="u_password"/></td></tr>
		<tr><td></td><td></td><td>maximum character: 20, must contain alphabet and number, must not contain special character</td></tr>
		<tr><td>Re-type Password</td><td>:</td><td><input type="password" name="u_password"/></td></tr>
		<tr><td>E-mail</td><td>:</td><td><input type="text" name="u_email"/></td></tr>
		<tr><td>Birthdate</td><td>:</td><td><input type="text" name="u_birthdate"/></td></tr>
		<tr><td>ID Number</td><td>:</td><td><input type="text" name="u_id_number"/></td></tr>
		<tr><td>Address</td><td>:</td><td><input type="text" name="u_address"/></td></tr>
		<tr><td>City</td><td>:</td><td><input type="text" name="u_city"/></td></tr>
		<tr><td>Country</td><td>:</td><td><input type="text" name="u_country"/></td></tr>
		<tr><td>Postcode</td><td>:</td><td><input type="text" name="u_postcode"/></td></tr>
		<tr><td colspan="3">
			<input type="submit" name="cancel" value="Submit"/>
			<input type="submit" name="submit" value="Reset"/>
			<input type="submit" name="submit" value="Cancel"/></td></tr>
	</table>
	</form>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</body>
</html>
