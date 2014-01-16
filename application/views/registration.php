
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>dist/Img/favico.png">

    <title>MEDIMIX</title>

    <!-- Bootstrap  CSS -->
    <link href="<?php echo base_url(); ?>dist/css/bootstrap.css" rel="stylesheet">
	
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

<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url(); ?>">Medimix</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>index.php">Home</a></li>
                 <li class="active"><a href="#about">About</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>



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
      <div class="container">

 
	<h2> Sign Up Here!</h2>
	<br/>

	<form action="<?php echo base_url(); ?>index.php/registration" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input  class="form-control" type="text" name="u_username" value="<?php echo set_value('u_username'); ?>"/></td>
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
			<td><input class="form-control" type="password" name="u_password" value=""/></td>
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
			<td><input class="form-control" class="form-control" type="password" name="retype_password" value=""/></td>
			<td><font color="#D22325"><?php echo form_error('retype_password'); ?></font></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="u_first_name" value="<?php echo set_value('u_first_name'); ?>"/></td>
			<td><font color="#D22325"> <?php echo form_error('u_first_name'); ?></font></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="u_last_name" value="<?php echo set_value('u_last_name'); ?>"/></td>
			<td><font color="#D22325"> <?php echo form_error('u_last_name'); ?></font></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td>:</td>
			<td><input class="form-control"  type="text" name="u_email" value="<?php echo set_value('u_email'); ?>"/></td>
			<td><font color="#D22325"> <?php echo form_error('u_email'); ?></font></td>
		</tr>
		<tr>
			<td>Birthdate</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="u_birthdate" id="birthdate" readonly="true" value="<?php echo set_value('u_birthdate'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_birthdate'); ?></font></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>:</td>
			<td>
				<select class="form-control" title="- Choose Gender -" name="u_gender" style='width:200px'>
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
			<td><input class="form-control" type="text" name="u_id_number" value="<?php echo set_value('u_id_number'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_id_number'); ?></font></td>
		</tr>
		<tr>
			<td>Address</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="u_address" value="<?php echo set_value('u_address'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_address'); ?></font></td>
		</tr>
		<tr>
			<td>City</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="u_city" value="<?php echo set_value('u_city'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_city'); ?></font></td>
		</tr>
		<tr>
			<td>Country</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="u_country" value="<?php echo set_value('u_country'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_country'); ?></font></td></tr>
		<tr>
			<td>Postcode</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="u_postcode" value="<?php echo set_value('u_postcode'); ?>"/></td>
			<td><font color="#D22325"><?php echo form_error('u_postcode'); ?></font></td>
		</tr>
		<tr>
			<td colspan="3">
				<input class="btn btn-success" type="submit" name="save_btn" value="Submit"/>
				<input class="btn btn-warning"type="submit" name="reset_btn" value="Reset"/>
				<input class="btn btn-danger"type="submit" name="cancel_btn" value="Cancel"/>
			</td>
			<td></td>
		</tr>
	</table>
	</form>
		      </div>


<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</body>
</html>
