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
<h2>Reported Side Effect</h2>
<table cellpadding='7' cellspacing='0' border='1'>
	<tr><th>Reported Date/Time</th><th>Side Effect</th><th>Description</th><th>Edit</th><th>Delete</th></tr>
	<?php foreach($ses->result() as $se): ?>
	<tr>
		<td><?php echo $se->se_dcreate; ?></td>
		<td><?php echo $se->se_name; ?></td>
		<td><?php echo $se->se_description; ?></td>
		<td>
		<form action="<?php echo base_url(); ?>index.php/my_sideeffect/edit" method="post">
			<input type="hidden" name="se_id" value="<?php echo $se->se_id; ?>" />
			<input type="submit" name="edit_btn" value="Go">
		</form>
		</td>
		<td>
		<form action="<?php echo base_url(); ?>index.php/my_sideeffect/delete" method="post">
			<input type="hidden" name="se_id" value="<?php echo $se->se_id; ?>" />
			<input type="submit" name="del_btn" value="Go">
		</form>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<h2>Report New Side Effect</h2>
<form action="<?php echo base_url(); ?>index.php/my_sideeffect" method="post">
<table cellpadding="1" cellspacing="1">
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td>Side Effect</td>
		<td>:</td>
		<td><input type="text" name="se_name" value="<?php echo set_value('se_name'); ?>"/>*</td>
		<td><font color="#D22325"><?php echo form_error('se_name'); ?></font></td>
	</tr>
	<tr>
		<td>Description</td>
		<td>:</td>
		<td><textarea name="se_description" rows="10" cols="50" style="width:250px"><?php echo set_value('se_description'); ?></textarea>*</td>
		<td><font color="#D22325"><?php echo form_error('se_description'); ?></font></td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td colspan="3"><input style="width:100px" type="submit" name="save_btn" value="Save"></td>
		<td></td>
	</tr>
</table>
</form>