<?php
    require 'db.php';
    $logo = "SELECT * FROM logos";
    $logo_res = mysqli_query($db_connect, $logo);
    $after_assoc = mysqli_fetch_assoc($logo_res);
    
    $footer_logo = "SELECT * FROM footerlogos";
    $footer_logo_res = mysqli_query($db_connect, $footer_logo);
    $after_assoc_footer = mysqli_fetch_assoc($footer_logo_res);


    $menu = "SELECT * FROM menus";
    $menu_result = mysqli_query($db_connect, $menu);


   

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="portfolio,creative,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themeturn.com">

  <title>Ratsaan| Creative portfolio template</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="/elephant/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Themeify Icon Css -->
  <link rel="stylesheet" href="/elephant/plugins/themify/css/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="/elephant/plugins/animate-css/animate.css">
  <link rel="stylesheet" href="/elephant/plugins/aos/aos.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="/elephant/plugins/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/elephant/plugins/owl/assets/owl.theme.default.min.css" >
  <!-- Slick slider CSS -->
  <link rel="stylesheet" href="/elephant/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="/elephant/plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="/elephant/css/style.css">

</head>

<body class="portfolio" id="top">


<!-- Navigation start -->
<!-- Header Start --> 

<nav class="navbar navbar-expand-lg bg-transprent py-4 fixed-top navigation" id="navbar">
	<div class="container">
	  <a class="navbar-brand" href="index.php">
	  	<img src="/elephant/uploads/logo/<?=$after_assoc['logo']?>" width="100" alt="">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
		<span class="ti-view-list"></span>
	  </button>
  
	  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">


      <?php
          foreach($menu_result as $menu){?>
            <li class="nav-item"><a class="nav-link" href="/elephant/index.php/<?=$menu['menu_link']?>"> <?=$menu['menu_name'] ?></a></li>
       <?php   }
      ?>
      
			</ul>
	  </div>
	</div>
</nav>


<!-- Navigation End -->