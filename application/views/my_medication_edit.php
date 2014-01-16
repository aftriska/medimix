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


<h2>Edit Medication Data</h2>
      </div>

<form action="<?php echo base_url(); ?>index.php/my_medication/edit" method="post">
<table cellpadding="1" cellspacing="1">
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td>Disease</td>
		<td>:</td>
		<td><?php echo $dm->row()->d_name; ?></td>
		<td></td>
	</tr>
	<tr>
		<td>Medication</td>
		<td>:</td>
		<td><?php echo $dm->row()->m_name; ?></td>
		<td></td>
	</tr>
	<tr>
		<td>Is this Prescribed?</td>
		<td>:</td>
		<td><select name="dm_prescribed">
				<option value="">Choose</option>
				<option value="Y" <?php if($dm->row()->dm_prescribed === 'Y')  { ?> selected <?php } ?> <?php echo set_select('dm_prescribed','Y'); ?>>Yes</option>
				<option value="N" <?php if($dm->row()->dm_prescribed !== 'Y')  { ?> selected <?php } ?><?php echo set_select('dm_prescribed','N'); ?>>No</option>
				</select>*</td>
		<td><font color="#D22325"><?php echo form_error('dm_prescribed'); ?></font></td>
	</tr>
	<tr>
		<td>Dose</td>
		<td>:</td>
		<td><input type="text" name="dm_dose" value="<?php if(!$validation)
							{ echo $dm->row()->dm_dose; }
							else
							{ echo set_value('dm_dose'); } ?>"/>*</td>
		<td><font color="#D22325"><?php echo form_error('dm_dose'); ?></font></td>
	</tr>
	<tr>
		<td>Start Using Date</td>
		<td>:</td>
		<td><input type="text" name="dm_start_using" id="diagnose" readonly="true" value="<?php if(!$validation)
							{ echo $dm->row()->dm_start_using; }
							else
							{ echo set_value('dm_start_using'); } ?>"/>*</td>
		<td><font color="#D22325"><?php echo form_error('dm_start_using'); ?></font></td>
	</tr>
	<tr>
		<td>Finish Using Date (if exist)</td>
		<td>:</td>
		<td><input type="text" name="dm_finish_using" id="recover" readonly="true" value="<?php if(!$validation)
							{ echo $dm->row()->dm_finish_using; }
							else
							{ echo set_value('dm_finish_using'); } ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('dm_finish_using'); ?></font></td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td colspan="3">
			<input type="hidden" name="dm_id" value="<?php echo $dm_id; ?>" />
			<input class="btn btn-success" style="width:100px" type="submit" name="save_btn" value="Save">
		</td>
		<td></td>
	</tr>
</table>
</form>
    </div>

