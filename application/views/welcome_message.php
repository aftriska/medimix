<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>dist/Img/favico.png">

    <title>MEDIMIX</title>

    <!-- Bootstrap  CSS -->
    <link href="<?php echo base_url(); ?>dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>dist/css/carousel.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/holder.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.js"></script>
    <style type='text/css' media='all'>@import url('<?php echo base_url(); ?>css/smoothness/jquery-ui-1.9.0.custom.min.css');</style>   
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/TableTools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/ZeroClipboard.js"></script>
    
    <style type='text/css' media='all'>@import url('<?php echo base_url(); ?>css/demo_table_jui.css');</style>
    <style type='text/css' media='all'>@import url('<?php echo base_url(); ?>css/demo_validation.css');</style>
    <style type='text/css' media='all'>@import url('<?php echo base_url(); ?>css/TableTools.css');</style>
    
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
    });
    </script>



  </head>

  <body>
<?php if(isset($error_msg)){ ?>
    <div id="error-message" title="System Output">
    <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    <?php echo "<p>$error_msg</p>"; ?>
    </p>
    </div>
<?php } ?>


    <!-- The menu-bar -->

    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="<?php echo base_url(); ?>index.php">Medimix</a>
               </div>
               <div class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url(); ?>index.php">Home</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/about">About</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/contact">Contact</a></li>
          <li class="divider"></li>

          <li class="divider"></li>

    <!-- The Login feature in the menu-bar -->

    <form class="navbar-form navbar-left" action="<?echo base_url()?>index.php/user/login" method="post">
    <div class="form-group">
    <label class="sr-only" >User name</label>
    <input type="text" class="form-control" name="u_username" value="<?php echo set_value('u_username'); ?>" placeholder="User name" />
    <td><font color="#D22325"><?php echo form_error('u_username'); ?></font></td>

  </div>
  <div class="form-group">
                        <label class="sr-only" >User password</label>
                        <input type="password" class="form-control" name="u_password" value="" placeholder="User password"/>
                        <td><font color="#D22325"><?php echo form_error('u_password'); ?></font></td>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
                <tr><td colspan="3"><input class="btn btn-default" type="submit" name="submit" value="Sign in" /></td></tr>
</form>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

        <!-- The Carousel for the two pic-->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?php echo base_url(); ?>dist/Img/bild1.jpg" alt="First slide">
          <!-- The sign up buttom in the carousel -->

          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>dist/Img/logaso.png" alt="logo">
              <h1>Welcome</h1>
               <p>This is a web based application that provide interface to access a Pharmaceutical Company database, that contains information in how to reduce side-effects. </p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>index.php/registration" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url(); ?>dist/Img/bild1.jpg" alt="Second slide">
                    <!-- The buttom to the link in the carousel -->
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>dist/Img//logaso.png" alt="logo2">
              <h1>Direct from the pharmacy .</h1>
              <p>This website works directly with personal information from the Swedish pharmaceutical center, with which we have a direct collaboration. For more information about the the Swedish pharmaceutical center.</p>
              <p><a class="btn btn-lg btn-success" href="http://www.apoteket.se/privatpersoner/Sidor/start.aspx" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
       
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>

     <!-- Other info -->


    <div class="container marketing">

      <p>As the cost of health-care system increases, the demand to simplify appointment between patients and doctors is also increasing. Especially for patients with chronic diseases who needs to meet their doctors regarding side-effects that arise because of taking a variety of medicines at the same time. Application that contains informations to help patients firstly aid themselves before they have to visit the doctors is one of the answer to fulfil this demand.</p>

    </div>
    <div class="container marketing">
      
      <h1>Our services</h1>


      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Side-effects. <span class="text-muted">Search side-effects for different medication.</span></h2>
          <p class="lead">With this feature, patients who are having side-effects, are able to search through the website, if there are others with the same illness who are facing the same side-effects, and look if there is any solution or suggestion to reduce the side-effects.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>dist/Img/doctor1.png" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>dist/Img/doctor2.png" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Report side-effects. <span class="text-muted">Save data of side-effects.</span></h2>
          <p class="lead">If there are side-effects of the medicine, patients are able to input data, and the app will link the side-effects to their medication. The medication has to be inputted before the side-effects data. These data will become the basis for further medication analysis.</p>
        </div>
      </div>

      <hr class="featurette-divider">

        <!-- The last row of the site -->

        <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 MEDIMIX, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div>
   


  </body>

 
</html>



