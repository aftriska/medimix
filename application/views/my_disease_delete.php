<div class="container">

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
				document.location = '<?php echo base_url(); ?>/index.php/my_disease';
			}
			}
		});
	<?php } ?>
});
</script>
 <div class="page-header">

<h2>Delete Recorded Disease</h2>
      </div>

<p>Are you sure you want to delete this data?</p>
<table cellpadding="1" cellspacing="1">
	<tr>
		<td>Recorded Date</td>
		<td>:</td>
		<td><?php echo $disease->row()->pu_dcreate; ?></td>
	</tr>
	<tr>
		<td>Disease</td>
		<td>:</td>
		<td><?php echo $disease->row()->d_name; ?></td>
	</tr>
	<tr>
		<td>Diagnose Date</td>
		<td>:</td>
		<td><?php echo $disease->row()->pu_diagnose_date; ?></td>
	</tr>
	<tr>
		<td>Recover Date (if exist)</td>
		<td>:</td>
		<td><?php echo $disease->row()->pu_recover_date; ?></td>
	</tr>
</table>

<form action="<?php echo base_url(); ?>index.php/my_disease/delete" method="post">
<input type="hidden" name="pu_id" value="<?php echo $pu_id; ?>" />
<input class="btn btn-danger" type="submit" name="delete_btn" value="Yes"/>
<input class="btn btn-default" type="submit" name="cancel_btn" value="No"/>
</form>
</form>
    </div>


