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
				document.location = '<?php echo base_url(); ?>/index.php/my_sideeffect';
			}
			}
		});
	<?php } ?>
});
</script>
 <div class="page-header">

<h2>Delete Recorded Side Effect</h2>
      </div>

<p>Are you sure you want to delete this data?</p>
<table cellpadding="1" cellspacing="1">
	<tr>
		<td>Recorded Date</td>
		<td>:</td>
		<td><?php echo $se->row()->se_dcreate; ?></td>
	</tr>
	<tr>
		<td>Side Effect</td>
		<td>:</td>
		<td><?php echo $se->row()->se_name; ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td>:</td>
		<td><?php echo $se->row()->se_description; ?></td>
	</tr>
</table>

<form action="<?php echo base_url(); ?>index.php/my_sideeffect/delete" method="post">
<input type="hidden" name="se_id" value="<?php echo $se_id; ?>" />
<input  class="btn btn-danger" type="submit" name="delete_btn" value="Yes"/>
<input class="btn btn-default" type="submit" name="cancel_btn" value="No"/>
</form>
    </div>

