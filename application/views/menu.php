<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MediaMix</a>
        </div>
 
 <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

	<li><a href="<?php echo base_url(); ?>index.php/user">HOME</a></li>
	 <li><a href="<?php echo base_url(); ?>index.php/user/change_password">CHANGE PASSWORD</a></li>
	  <li><a href="<?php echo base_url(); ?>index.php/user/edit_profile">EDIT PROFILE</a></li>
	</ul>
	 <ul class="nav navbar-nav navbar-right">
	<?php if($utype->row()->u_type === '1') { ?>
	PREMIUM USER
	<?php } else { ?>
	<li><a href="<?php echo base_url(); ?>index.php/user/upgrade_account">UPGRADE ACCOUNT</a></li>
	<?php } ?>
	
	 

	<li><a href="<?php echo base_url(); ?>index.php/user/logout">LOG OUT</a></li>

<?php if($utype->row()->u_type === '1') { ?>
<li><a href="<?php echo base_url(); ?>index.php/my_disease">MY DISEASE</a></li>
<li><a href="<?php echo base_url(); ?>index.php/my_medication">MY MEDICATION</a></li>
<li><a href="<?php echo base_url(); ?>index.php/my_sideeffect">RERPORT SIDE EFFECT</a></li></li>
<?php }?>

      </ul>


 </div>
  </div>
   </div>