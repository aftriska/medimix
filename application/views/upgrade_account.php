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
                    document.location = '<?php echo base_url(); ?>index.php/user';
                }
                }
            });
        <?php } ?>
    });
</script>

<p>Upgrade Your Account to Premium User!</p>
<p>You will be able to record your data. Your data is confidential and will not be opened for third parties.</p>
<form action="<?php echo base_url(); ?>index.php/user/upgrade_account" method="post">
	<input type="submit" name="save_btn" value="Upgrade My Account"/>
</form>

