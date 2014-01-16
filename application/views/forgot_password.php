
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
                    document.location = '<?php echo base_url(); ?>index.php/user';
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
<div id="body">
	<div>
        <form action="<?php echo base_url(); ?>index.php/user/forgot_password" method="post">
            <!-- as you can see, the action refers to the same page -->
            <table cellpadding="1" cellspacing="1">
				<tr><td colspan="4">&nbsp;</td></tr>
				<tr>
					<td style="width:80px;"><label for="u_email">e-Mail</label></td>
					<td style="width:10px">:</td>
					<td style="width:300px; text-align:left"><input class="form-control" type="text" style="width:270px" name="u_email" value="<?php echo set_value('u_email'); ?>"/></td>
					<td style="text-align:left"><font color="#D22325"><?php echo form_error('u_email'); ?></font></td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr><td colspan="3" style="text-align:center;"><input  class="btn btn-primary" style="width:150px" type="submit" name="save" value="Reset Password"></td></tr>
            </table>
        </form>
    </div>
</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>

</body>
</html>
