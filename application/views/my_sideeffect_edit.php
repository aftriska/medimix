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
				document.location = '<?php echo base_url(); ?>/index.php/my_sideeffect';
			}
			}
		});
	<?php } ?>
});
</script>

<h2>Edit Side Effect</h2>
<form action="<?php echo base_url(); ?>index.php/my_sideeffect/edit" method="post">
<table cellpadding="1" cellspacing="1">
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td>Reported Date</td>
		<td>:</td>
		<td><?php echo $se->row()->se_dcreate; ?></td>
		<td></td>
	</tr>
	<tr>
		<td>Side Effect</td>
		<td>:</td>
		<td><?php echo $se->row()->se_name; ?></td>
		<td></td>
	</tr>
	<tr>
		<td>Description</td>
		<td>:</td>
		<td><textarea name="se_description" rows="10" cols="50" style="width:250px"><?php if(!$validation)
							{ echo $se->row()->se_description; }
							else
							{ echo set_value('se_description'); } ?></textarea>*</td>
		<td><font color="#D22325"><?php echo form_error('se_description'); ?></font></td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td colspan="3">
			<input type="hidden" name="se_id" value="<?php echo $se_id; ?>" />
			<input style="width:100px" type="submit" name="save_btn" value="Save">
		</td>
		<td></td>
	</tr>
</table>
</form>