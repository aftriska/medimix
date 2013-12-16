<script>
    $(function() {        
        $( "#birthdate" ).datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            //minDate: "-99Y", maxDate: "1D"
            yearRange: '-99:+1'
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
                    document.location = '<?php echo base_url(); ?>index.php/user/edit_profile';
                }
                }
            });
        <?php } ?>
    });
</script>
	
<h2>Edit Profile</h2>
<form action="<?php echo base_url(); ?>index.php/user/edit_profile" method="post">
<table>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><strong><?php echo $user; ?></strong></td>
		<td></td>
	</tr>
	<tr>
		<td>First Name</td>
		<td>:</td>
		<td><input type="text" name="u_first_name" value="<?php if(!$validation)
							{ echo $user_data->row()->u_first_name; }
							else
							{ echo set_value('u_first_name'); } ?>"/></td>
		<td><font color="#D22325"> <?php echo form_error('u_first_name'); ?></font></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td>:</td>
		<td><input type="text" name="u_last_name" value="<?php if(!$validation)
							{ echo $user_data->row()->u_last_name; }
							else
							{ echo set_value('u_last_name'); } ?>"/></td>
		<td><font color="#D22325"> <?php echo form_error('u_last_name'); ?></font></td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td>:</td>
		<td><input type="text" name="u_email" value="<?php if(!$validation)
							{ echo $user_data->row()->u_email; }
							else
							{ echo set_value('u_email'); } ?>"/></td>
		<td><font color="#D22325"> <?php echo form_error('u_email'); ?></font></td>
	</tr>
	<tr>
		<td>Birthdate</td>
		<td>:</td>
		<td><input type="text" name="u_birthdate" id="birthdate" readonly="true" value="<?php if(!$validation)
							{ echo $user_data->row()->u_birthdate; }
							else
							{ echo set_value('u_birthdate'); } ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('u_birthdate'); ?></font></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td>:</td>
		<td>
			<select title="- Choose Gender -" name="u_gender" style='width:200px'>
			<option value="">- Choose -</option>
			<?php if($user_data->row()->u_gender === 'M')  { ?>
			<option value="M" selected <?php echo set_select('u_gender','M'); ?>>Male</option>
			<option value="F" <?php echo set_select('u_gender','F'); ?>>Female</option>
			<option value="O" <?php echo set_select('u_gender','O'); ?>>Other</option>
			<?php } elseif($user_data->row()->u_gender === 'F') { ?>
			<option value="M" <?php echo set_select('u_gender','M'); ?>>Male</option>
			<option value="F" selected <?php echo set_select('u_gender','F'); ?>>Female</option>
			<option value="O" <?php echo set_select('u_gender','O'); ?>>Other</option>
			<?php } elseif($user_data->row()->u_gender === 'O') { ?>
			<option value="M" <?php echo set_select('u_gender','M'); ?>>Male</option>
			<option value="F" <?php echo set_select('u_gender','F'); ?>>Female</option>
			<option value="O" selected <?php echo set_select('u_gender','O'); ?>>Other</option>
			<?php } ?>
		</td>
		<td><font color="#D22325"><?php echo form_error('u_gender'); ?></font></td>
	</tr>
	<tr>
		<td>ID Number</td>
		<td>:</td>
		<td><input type="text" name="u_id_number" value="<?php if(!$validation)
							{ echo $user_data->row()->u_id_number; }
							else
							{ echo set_value('u_id_number'); } ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('u_id_number'); ?></font></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><input type="text" name="u_address" value="<?php if(!$validation)
							{ echo $user_data->row()->u_address; }
							else
							{ echo set_value('u_address'); } ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('u_address'); ?></font></td>
	</tr>
	<tr>
		<td>City</td>
		<td>:</td>
		<td><input type="text" name="u_city" value="<?php if(!$validation)
							{ echo $user_data->row()->u_city; }
							else
							{ echo set_value('u_city'); } ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('u_city'); ?></font></td>
	</tr>
	<tr>
		<td>Country</td>
		<td>:</td>
		<td><input type="text" name="u_country" value="<?php if(!$validation)
							{ echo $user_data->row()->u_country; }
							else
							{ echo set_value('u_country'); } ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('u_country'); ?></font></td></tr>
	<tr>
		<td>Postcode</td>
		<td>:</td>
		<td><input type="text" name="u_postcode" value="<?php if(!$validation)
							{ echo $user_data->row()->u_postcode; }
							else
							{ echo set_value('u_postcode'); } ?>"/></td>
		<td><font color="#D22325"><?php echo form_error('u_postcode'); ?></font></td>
	</tr>
	<tr>
		<td colspan="3">
			<input type="submit" name="save_btn" value="Submit"/>
			<input type="submit" name="cancel_btn" value="Cancel"/>
		</td>
		<td></td>
	</tr>
</table>
</form>