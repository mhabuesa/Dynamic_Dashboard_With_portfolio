<?php


require 'login_check.php';
require 'db.php';

$user_id = $_SESSION['id'];
$select_user = "SELECT * FROM users WHERE id=$user_id";
$select_user_result = mysqli_query($db_connect, $select_user);
$after_assoc_user = mysqli_fetch_assoc($select_user_result);

$select_unread_message = "SELECT * FROM messages WHERE status=0";
$unread_message_result = mysqli_query($db_connect, $select_unread_message);

$count_message = "SELECT COUNT(*) as message FROM messages WHERE status=0";
$Count_result = mysqli_query($db_connect, $count_message);
$after_assoc_count_message = mysqli_fetch_assoc($Count_result)


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=$title?></title>
    <!-- Favicon icon -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="16x16" href="/elephant/dashboard_asset/images/favicon.png">
	<link rel="stylesheet" href="/elephant/dashboard_asset/vendor/chartist/css/chartist.min.css">
    <link href="/elephant/dashboard_asset/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="/elephant/dashboard_asset/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/elephant/dashboard_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <style>        
        .card{
            height: auto;
        }
        a.current{
            color: white;
        }
    </style>
      <!-- Datatable -->
      <link href="/elephant/dashboard_asset/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/elephant/dashboard.php" class="brand-logo">
                <img class="logo-abbr" src="/elephant/dashboard_asset/images/logo.png" alt="">
                <img class="logo-compact" src="/elephant/dashboard_asset/images/logo-text.png" alt="">
                <img class="brand-title" src="/elephant/dashboard_asset/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								<?=$header_title?>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                       
                        <!-- Message Start-->
                        <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#0B2A97"></path>
									</svg>

									<div class="pulse-css"><strong><?=$after_assoc_count_message['message']?></strong></div>
                                </a>
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380 ps ps--active-y">
										<ul class="timeline">

                                        <?php
                                            foreach ($unread_message_result as $message) { ?>
                                               
                                               <li>
                                                   <div class="timeline-panel">
                                                      <a href="/elephant/message/message_view.php?id=<?=$message['id']?>">
                                                   <div class="media-body">
                                                           <h6 class="mb-1"><?=$message['name']?></h6>
                                                           <small class="d-block"><?=$message['created_at']?></small>
                                                    </div>
                                                    </a>
                                                   </div>
                                               </li>
                                           <?php } ?>

                                           <?=($unread_message_result->num_rows == 0?'No Unread Message':'')?>

											
										</ul>
									<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 380px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 315px;"></div></div></div>
                                    <a class="all-notification" href="/elephant/message/message.php">See all notifications <i class="ti-arrow-right"></i></a>
                                </div>
                            </li>
							
							
							
		<!-- Message end-->
                        
                        
        <li class="nav-item dropdown header-profile">
            <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                
            <?php
                if($after_assoc_user['photo'] == null){?>
                    <img src="/elephant/dashboard_asset/images/profile/17.jpg" width="20" alt=""/>
             <?php  } else{?>
                <img src="/elephant/uploads/user/<?=$after_assoc_user['photo']?>" width="20" alt=""/>
                <?php  } ?>           

             
            
            
            
                <div class="header-info">
                    <span class="text-black"><strong> <?=$after_assoc_user['name']?></strong></span>
                    <p class="fs-12 mb-0"><?=$after_assoc_user['email']?></p>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/elephant/users/profile.php" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span class="ml-2">Profile </span>
                </a>
                
                <a href="/elephant/logout.php" class="dropdown-item ai-icon">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span class="ml-2">Logout </span>
                </a>
            </div>
        </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a  href="/elephant/dashboard.php" aria-expanded="false">
							<i class="flaticon-381-home-3"></i>
							<span class="nav-text">Dashboard </span>
						</a>
                        
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-user-9"></i>
							<span class="nav-text">Users</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="/elephant/users/add_user.php">Add User</a></li>

                            <li><a href="/elephant/users/users.php">Users List</a></li>

                            <li><a href="/elephant/users/profile_update.php">Profile Update</a></li>	
                        </ul>
                    </li>

                    

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Customize</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="/elephant/logo/logo.php">Logo</a></li>	
                            <li><a href="/elephant/menu/menu.php">Menu</a></li>		
                            <li><a href="/elephant/banner/banner.php">Banner</a></li>	
                            <li><a href="/elephant/expertise/expertise.php">Expertise</a></li>	
                            <li><a href="/elephant/services/services.php">Services</a></li>	
                            <li><a href="/elephant/portfolio/portfolio.php">Portfolio</a></li>	
                            <li><a href="/elephant/testimonial/testimonial.php">Testimonial</a></li>		
                            	
                        </ul>
                    </li>

                    <li><a href="/elephant/message/message.php"  class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Message</span>
						</a>
					</li>
                    <li><a href="/elephant/index.php" target="_blank" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">Protfolio</span>
						</a>
					</li>
                </ul>
				
				
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		