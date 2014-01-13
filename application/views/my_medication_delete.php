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
				document.location = '<?php echo base_url(); ?>/index.php/my_medication';
			}
			}
		});
	<?php } ?>
});
</script>
<h2>Delete Recorded Medication</h2>
<p>Are you sure you want to delete this data?</p>
<table cellpadding="1" cellspacing="1">
	<tr>
		<td>Recorded Date</td>
		<td>:</td>
		<td><?php echo $dm->row()->dm_dcreate; ?></td>
	</tr>
	<tr>
		<td>Disease</td>
		<td>:</td>
		<td><?php echo $dm->row()->d_name; ?></td>
	</tr>
	<tr>
		<td>Medicine</td>
		<td>:</td>
		<td><?php echo $dm->row()->m_name; ?></td>
	</tr>
	<tr>
		<td>Prescribed?</td>
		<td>:</td>
		<td><?php echo $dm->row()->dm_prescribed; ?></td>
	</tr>
	<tr>
		<td>Dose</td>
		<td>:</td>
		<td><?php echo $dm->row()->dm_dose; ?></td>
	</tr>
	<tr>
		<td>Start Using Date</td>
		<td>:</td>
		<td><?php echo $dm->row()->dm_start_using; ?></td>
	</tr>
	<tr>
		<td>Finish Using Date</td>
		<td>:</td>
		<td><?php echo $dm->row()->dm_finish_using; ?></td>
	</tr>
</table>

<form action="<?php echo base_url(); ?>index.php/my_medication/delete" method="post">
<input type="hidden" name="dm_id" value="<?php echo $dm_id; ?>" />
<input type="submit" name="delete_btn" value="Yes"/>
<input type="submit" name="cancel_btn" value="No"/>
</form>
