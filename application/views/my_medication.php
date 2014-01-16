<div class="container">

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
				document.location = '<?php echo base_url(); ?>/index.php/my_medication';
			}
			}
		});
	<?php } ?>
});
</script>
 <div class="page-header">

<h2>Recorded Medication</h2>
      </div>

<table cellpadding='7' cellspacing='0' border='1'>
	<tr><th>Disease</th><th>Medicines</th><th>Prescribed?</th><th>Dose</th><th>Start Using</th><th>Finish Using</th><th>Edit</th><th>Delete</th></tr>
	<?php foreach($dms->result() as $dm): ?>
	<tr>
		<td><?php echo $dm->d_name; ?></td>
		<td><?php echo $dm->m_name; ?></td>
		<td><?php echo $dm->dm_prescribed; ?></td>
		<td><?php echo $dm->dm_dose; ?></td>
		<td><?php echo $dm->dm_start_using; ?></td>
		<td><?php echo $dm->dm_finish_using; ?></td>
		<td>
		<form action="<?php echo base_url(); ?>index.php/my_medication/edit" method="post">
			<input type="hidden" name="dm_id" value="<?php echo $dm->dm_id; ?>" />
			<input class="btn btn-default btn active" type="submit" name="edit_btn" value="Go">
		</form>
		</td>
		<td>
		<form action="<?php echo base_url(); ?>index.php/my_medication/delete" method="post">
			<input type="hidden" name="dm_id" value="<?php echo $dm->dm_id; ?>" />
			<input class="btn btn-default btn active" type="submit" name="del_btn" value="Go">
		</form>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<h2>Add New Medication Data</h2>
<form action="<?php echo base_url(); ?>index.php/my_medication" method="post">
<table cellpadding="1" cellspacing="1">
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td>Choose Disease</td>
		<td>:</td>
		<td><select name="d_id">
				<option value="">Choose Disease</option>
				<?php foreach($pds->result() as $pd): ?>
				<option value="<?php echo $pd->d_id; ?>" <?php echo set_select('d_id',$pd->d_id); ?>><?php echo $pd->d_name; ?></option>
				<?php endforeach; ?>
				</select>*</td>
		<td><font color="#D22325"><?php echo form_error('d_id'); ?></font></td>
	</tr>
	<tr>
		<td>Choose Medication</td>
		<td>:</td>
		<td><select name="m_id">
				<option value="">Choose Medication</option>
				<?php foreach($ms->result() as $m): ?>
				<option value="<?php echo $m->m_id; ?>" <?php echo set_select('m_id',$m->m_id); ?>><?php echo $m->m_name; ?></option>
				<?php endforeach; ?>
				</select>*</td>
		<td><font color="#D22325"><?php echo form_error('m_id'); ?></font></td>
	</tr>
	<tr>
		<td>Is this Prescribed?</td>
		<td>:</td>
		<td><select name="dm_prescribed">
				<option value="">Choose</option>
				<option value="Y" <?php echo set_select('dm_prescribed','Y'); ?>>Yes</option>
				<option value="N" <?php echo set_select('dm_prescribed','N'); ?>>No</option>
				</select>*</td>
		<td><font color="#D22325"><?php echo form_error('dm_prescribed'); ?></font></td>
	</tr>
	<tr>
		<td>Dose</td>
		<td>:</td>
		<td><input type="text" name="dm_dose" value="<?php echo set_value('dm_dose'); ?>"/>*</td>
		<td><font color="#D22325"><?php echo form_error('dm_dose'); ?></font></td>
	</tr>
	<tr>
		<td>Start Using Date</td>
		<td>:</td>
		<td><input type="text" name="dm_start_using" id="diagnose" readonly="true" value="<?php echo set_value('dm_start_using'); ?>"/>*</td>
		<td><font color="#D22325"><?php echo form_error('dm_start_using'); ?></font></td>
	</tr>
	<tr>
		<td>Finish Using Date (if exist)</td>
		<td>:</td>
		<td><input type="text" name="dm_finish_using" id="recover" readonly="true" value="<?php echo set_value('dm_finish_using'); ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('dm_finish_using'); ?></font></td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td colspan="3"><input class="btn btn-success" style="width:100px" type="submit" name="save_btn" value="Save"></td>
		<td></td>
	</tr>
</table>
</form>
</form>
