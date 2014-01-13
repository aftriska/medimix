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
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.js"></script>
	<style type='text/css' media='all'>@import url('<?php echo base_url(); ?>css/smoothness/jquery-ui-1.9.0.custom.min.css');</style>	
	
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/TableTools.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/ZeroClipboard.js"></script>
	
	
	<style type='text/css' media='all'>@import url('<?php echo base_url(); ?>css/demo_table_jui.css');</style>
	<style type='text/css' media='all'>@import url('<?php echo base_url(); ?>css/demo_validation.css');</style>
	<style type='text/css' media='all'>@import url('<?php echo base_url(); ?>css/TableTools.css');</style>
	
	<script>
    $(function() {        
        $( "#birthdate" ).datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            //minDate: "-99Y", maxDate: "1D"
            yearRange: '-99:+1'
        });
        <?php if(isset($error_msg)){ ?>
            $("#error-message").dialog({
                width: 400,
                modal: true,
                buttons: {
                OK: function(){
                    $(this).dialog('close');
                }
                }
            });
        <?php } ?>
        <?php if(isset($success_msg)){ ?>
            $("#success-message").dialog({
                width: 400,
                modal: true,
                buttons: {
                OK: function(){
                    document.location = '<?php echo base_url(); ?>';
                }
                }
            });
        <?php } ?>
    });
	</script>
</head>
<body>
<?php if(isset($error_msg)){ ?>
    <div id="error-message" title="System Output">
    <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    <?php echo "<p>$error_msg</p>"; ?>
    </p>
    </div>
<?php } ?>
<?php if(isset($success_msg)){ ?>
    <div id="success-message" title="System Output">
    <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    <?php echo "<p>$success_msg</p>"; ?>
    </p>
    </div>
<?php } ?>
<h1>Welcome to MediMix!</h1>
<div id="body">
<p><a href="<?php echo base_url(); ?>index.php">Home</a></p>
	<p>Sign Up Here!</p>
	<br/>
	<form action="<?php echo base_url(); ?>index.php/registration" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="u_username" value="<?php echo set_value('u_username'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_username'); ?></font></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td colspan="2">minimum 6 characters, maximum 20 characters, must contain Alpha Numeric characters only</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="u_password" value=""/></td>
			<td><font color="#D22325"><?php echo form_error('u_password'); ?></font></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td colspan="2">minimum 6 characters, maximum 50 characters, must contain Alpha Numeric characters only</td>
		</tr>
		<tr>
			<td>Re-type Password</td>
			<td>:</td>
			<td><input type="password" name="retype_password" value=""/></td>
			<td><font color="#D22325"><?php echo form_error('retype_password'); ?></font></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td>:</td>
			<td><input type="text" name="u_first_name" value="<?php echo set_value('u_first_name'); ?>"/></td>
			<td><font color="#D22325"> <?php echo form_error('u_first_name'); ?></font></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td>:</td>
			<td><input type="text" name="u_last_name" value="<?php echo set_value('u_last_name'); ?>"/></td>
			<td><font color="#D22325"> <?php echo form_error('u_last_name'); ?></font></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td>:</td>
			<td><input type="text" name="u_email" value="<?php echo set_value('u_email'); ?>"/></td>
			<td><font color="#D22325"> <?php echo form_error('u_email'); ?></font></td>
		</tr>
		<tr>
			<td>Birthdate</td>
			<td>:</td>
			<td><input type="text" name="u_birthdate" id="birthdate" readonly="true" value="<?php echo set_value('u_birthdate'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_birthdate'); ?></font></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>:</td>
			<td>
				<select title="- Choose Gender -" name="u_gender" style='width:200px'>
				<option value="">- Choose -</option>
				<option value="M" <?php echo set_select('u_gender','M'); ?>>Male</option>
				<option value="F" <?php echo set_select('u_gender','F'); ?>>Female</option>
				<option value="O" <?php echo set_select('u_gender','O'); ?>>Other</option>
			</td>
			<td><font color="#D22325"><?php echo form_error('u_gender'); ?></font></td>
		</tr>
		<tr>
			<td>ID Number</td>
			<td>:</td>
			<td><input type="text" name="u_id_number" value="<?php echo set_value('u_id_number'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_id_number'); ?></font></td>
		</tr>
		<tr>
			<td>Address</td>
			<td>:</td>
			<td><input type="text" name="u_address" value="<?php echo set_value('u_address'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_address'); ?></font></td>
		</tr>
		<tr>
			<td>City</td>
			<td>:</td>
			<td><input type="text" name="u_city" value="<?php echo set_value('u_city'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_city'); ?></font></td>
		</tr>
		<tr>
			<td>Country</td>
			<td>:</td>
			<td><input type="text" name="u_country" value="<?php echo set_value('u_country'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_country'); ?></font></td></tr>
		<tr>
			<td>Postcode</td>
			<td>:</td>
			<td><input type="text" name="u_postcode" value="<?php echo set_value('u_postcode'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_postcode'); ?></font></td>
		</tr>
		<tr>
			<td colspan="3">
				<input type="submit" name="save_btn" value="Submit"/>
				<input type="submit" name="reset_btn" value="Reset"/>
				<input type="submit" name="cancel_btn" value="Cancel"/>
			</td>
			<td></td>
		</tr>
	</table>
	</form>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</body>
</html>
