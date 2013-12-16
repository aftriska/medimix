<p>This is the page for welcoming user. For premium user there will be menu for Data Management.</p>

<table>
	<tr>
		<td>
			<!-- to display disease -->
			<?php if($diseases->num_rows() === 0) { ?>
			No Record.
			<?php } else {		
			foreach($diseases->result() as $disease): ?>
			<form action="<?php echo base_url(); ?>index.php/user" method="post">
			<input type="hidden" name="disease" value="<?php echo $disease->disease; ?>"/>
			<p><input type="submit" name="get_se_btn" value="<?php echo $disease->disease; ?>"/></p>
			</form>
			<?php endforeach; } ?>
		</td>
		<td>
			<!-- to display side-effect of the selected disease -->
			<?php if($side_effects === null) { ?>
			Choose Disease.
			<?php } elseif($side_effects->num_rows() === 0) { ?>
			No Record.
			<?php } else {		
			foreach($side_effects->result() as $side_effect): ?>
			<form action="<?php echo base_url(); ?>index.php/user" method="post">
			<input type="hidden" name="disease" value="<?php echo $se_disease; ?>"/>
			<input type="hidden" name="side_effect" value="<?php echo $side_effect->side_effect; ?>"/>
			<p><input type="submit" name="get_sg_btn" value="<?php echo $side_effect->side_effect; ?>"/></p>
			</form>
			<?php endforeach; } ?>
		</td>
		<td>
			<!-- to display suggestions of the selected disease and side-effect -->
			<?php if($suggestion === null) { ?>
			Choose Side Effect.
			<?php } elseif($suggestion->num_rows() === 0) { ?>
			No Record.
			<?php } else {		
			foreach($suggestion->result() as $sg): ?>
			<p><?php echo $sg->suggestion; ?></p>
			<?php endforeach; } ?>
		</td>
	</tr>
</table>

