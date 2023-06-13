<?php

    require '../header.php';

$id = $_GET['id'];

$select_portfolio = "SELECT * FROM portfolios WHERE id=$id";
$portfolio_result = mysqli_query($db_connect, $select_portfolio);
$after_assoc_portfolio = mysqli_fetch_assoc($portfolio_result);

?>









<!-- Portfolio start -->
<section class="section py-7" id="portfolio" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus"></i>works</span>
					<h2 class="title">Portfolio</h2>
				</div>
				<div class="text-uppercase letter-spacing text-sm">
					<h4><?=$after_assoc_portfolio['title']?></h4>
				</div>
				<div class="p-3 m-3 border border-light ">
                    <p><?=$after_assoc_portfolio['long_desp']?></p>
				</div>
                <div class=" letter-spacing text-sm">
                    <strong>Project</strong>
                </div>
                <div class="">
                  <a class="btn btn-info" href="<?=$after_assoc_portfolio['demo_link']?>"> <?=$after_assoc_portfolio['demo']?></a>
                  
                </div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 text-center">
				<!-- <img width="350" src="/elephant/uploads/portfolio/<?=$after_assoc_portfolio['photo']?>" alt=""> -->
			</div>
		</div>
	</div>

</section>
<!-- Portfolio End -->









<?php
    require '../footer.php';
?>