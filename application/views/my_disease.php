<script>
$(function() {        
	$( "#diagnose" ).datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		//minDate: "-99Y", maxDate: "1D"
		yearRange: '-50:+1'
	});
	$( "#recover" ).datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		//minDate: "-99Y", maxDate: "1D"
		yearRange: '-50:+1'
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
				document.location = '<?php echo base_url(); ?>/index.php/my_disease';
			}
			}
		});
	<?php } ?>
});
</script>
<h2>Recorded Disease(s)</h2>
<table cellpadding='7' cellspacing='0' border='1'>
	<tr><th>Disease</th><th>Diagnose Date</th><th>Recover Date</th><th>Edit</th><th>Delete</th></tr>
	<?php foreach($pds->result() as $pd): ?>
	<tr>
		<td><?php echo $pd->d_name; ?></td>
		<td><?php echo $pd->pu_diagnose_date; ?></td>
		<td><?php echo $pd->pu_recover_date; ?></td>
		<td>
		<form action="<?php echo base_url(); ?>index.php/my_disease/edit" method="post">
			<input type="hidden" name="pu_id" value="<?php echo $pd->pu_id; ?>" />
			<input type="submit" name="edit_btn" value="Go">
		</form>
		</td>
		<td>
		<form action="<?php echo base_url(); ?>index.php/my_disease/delete" method="post">
			<input type="hidden" name="pu_id" value="<?php echo $pd->pu_id; ?>" />
			<input type="submit" name="del_btn" value="Go">
		</form>
		</td>
	</tr>
	<?php endforeach; ?>
</table>


<h2>Record New Disease</h2>
<form action="<?php echo base_url(); ?>index.php/my_disease" method="post">
<table cellpadding="1" cellspacing="1">
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td>Choose Disease</td>
		<td>:</td>
		<td><select name="d_id">
				<option value="">Choose Disease</option>
				<?php foreach($ds->result() as $d): ?>
				<option value="<?php echo $d->d_id; ?>" <?php echo set_select('d_id',$d->d_id); ?>><?php echo $d->d_name; ?></option>
				<?php endforeach; ?>
				</select>*</td>
		<td><font color="#D22325"><?php echo form_error('d_id'); ?></font></td>
	</tr>
	<tr>
		<td>Diagnose Date</td>
		<td>:</td>
		<td><input type="text" name="pu_diagnose_date" id="diagnose" readonly="true" value="<?php echo set_value('pu_diagnose_date'); ?>"/>*</td>
		<td><font color="#D22325"><?php echo form_error('pu_diagnose_date'); ?></font></td>
	</tr>
	<tr>
		<td>Recover Date (if exist)</td>
		<td>:</td>
		<td><input type="text" name="pu_recover_date" id="recover" readonly="true" value="<?php echo set_value('pu_recover_date'); ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('pu_recover_date'); ?></font></td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td colspan="3"><input style="width:100px" type="submit" name="save_btn" value="Save"></td>
		<td></td>
	</tr>
</table>
</form>
