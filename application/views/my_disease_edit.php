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
				document.location = '<?php echo base_url(); ?>/index.php/my_disease';
			}
			}
		});
	<?php } ?>
});
</script>
 <div class="page-header">

<h2>Edit Disease Data</h2>
      </div>

<form action="<?php echo base_url(); ?>index.php/my_disease/edit" method="post">
<table cellpadding="1" cellspacing="1">
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td>Disease</td>
		<td>:</td>
		<td><?php echo $disease->row()->d_name; ?></td>
		<td></td>
	</tr>
	<tr>
		<td>Diagnose Date</td>
		<td>:</td>
		<td><input type="text" name="pu_diagnose_date" id="diagnose" readonly="true" value="<?php if(!$validation)
							{ echo $disease->row()->pu_diagnose_date; }
							else
							{ echo set_value('pu_diagnose_date'); } ?>"/>*</td>
		<td><font color="#D22325"><?php echo form_error('pu_diagnose_date'); ?></font></td>
	</tr>
	<tr>
		<td>Recover Date (if exist)</td>
		<td>:</td>
		<td><input type="text" name="pu_recover_date" id="recover" readonly="true" value="<?php if(!$validation)
							{ echo $disease->row()->pu_recover_date; }
							else
							{ echo set_value('pu_recover_date'); } ?>""/></td>
		<td><font color="#D22325"><?php echo form_error('pu_recover_date'); ?></font></td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="pu_id" value="<?php echo $pu_id; ?>" />
		<input class="btn btn-success"  type="submit" name="save_btn" value="Save">
		</td>
		<td></td>
	</tr>
</table>
</form>
</form>
      </div>

