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
	
	h2 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #93B7CD;
		font-size: 16px;
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
	<?php $this->load->view($menu); ?>
	<?php $this->load->view($body); ?>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</body>
</html>
