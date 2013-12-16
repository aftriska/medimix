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

<h2>Change Password</h2>
<form action="<?php echo base_url(); ?>index.php/user/change_password" method="post">
<table cellpadding="1" cellspacing="1">
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td><label for="oldpass"/>Current Password</td>
		<td>:</td>
		<td><input type="password" name="cur_password" value=""/></td>
		<td><font color="#D22325"><?php echo form_error('cur_password'); ?></font></td>
	</tr>
	<tr>
		<td><label for="password"/>New Password</td>
		<td>:</td>
		<td><input type="password" name="new_password" value=""/></td>
		<td><font color="#D22325"><?php echo form_error('new_password'); ?></font></td>
	</tr>
	<tr>
		<td><label for="password"/>Re-type New Password</td>
		<td>:</td>
		<td><input type="password" name="retype_password" value=""/></td>
		<td><font color="#D22325"><?php echo form_error('retype_password'); ?></font></td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td colspan="3"><input style="width:100px" type="submit" name="save_btn" value="Save"></td>
		<td></td>
	</tr>
</table>
</form>
