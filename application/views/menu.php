<p><a href="<?php echo base_url(); ?>index.php/user">Home</a> | <a href="<?php echo base_url(); ?>index.php/user/change_password">Change Password</a> | <a href="<?php echo base_url(); ?>index.php/user/edit_profile">Edit Profile</a> | 
	<?php if($utype->row()->u_type === '1') { ?>
	Premium User
	<?php } else { ?>
	<a href="<?php echo base_url(); ?>index.php/user/upgrade_account">Upgrade Account</a> 
	<?php } ?>
	| <a href="<?php echo base_url(); ?>index.php/user/logout">Log Out</a></p>
<p>
<?php if($utype->row()->u_type === '1') { ?>
<a href="<?php echo base_url(); ?>index.php/my_disease">My Disease</a>  | <a href="<?php echo base_url(); ?>index.php/my_medication">My Medication</a> | <a href="<?php echo base_url(); ?>index.php/my_sideeffect">Report Side Effect</a>
<?php }?>
</p>