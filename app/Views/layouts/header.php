<!-- MOBILE MENU -->
<section>
		<div class="ed-mob-menu">
				<div class="ed-mob-menu-con">
						<div class="ed-mm-left">
								<div class="wed-logo">
										<a href="<?php echo base_url();?>"><img src="<?php echo base_url('public/assets/frontend')?>/images/logo.png" alt="" />
				</a>
								</div>
						</div>
						<div class="ed-mm-right">
								<div class="ed-mm-menu">
										<a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
										<div class="ed-mm-inn">
												<a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
												<h4>Welcome To EXMHALL</h4>
												<ul>
														<li><a href="<?php echo base_url()?>">Home</a>
														</li>
														<li><a href="https://wa.me/8801611285514">Contact us</a>
														</li>
														<li><a href="<?php echo base_url()?>/admin">Admin area</a>
														</li>
												</ul>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>



<!--HEADER SECTION-->
<section>
		<!-- TOP BAR -->
		<div class="ed-top">
				<div class="container">
						<div class="row">
								<div class="col-md-12">
										<div class="ed-com-t1-left">
												<ul>
														<li><a href="#">Contact: Lake Road, Suite 180 Farmington Hills, U.S.A.</a>
														</li>
														<li><a href="#">Phone: +101-1231-1231</a>
														</li>
												</ul>
										</div>
										<div class="ed-com-t1-right">
												<?php if(session()->get('is_logged_in')) { ?>
												<ul>
														<li><a href="<?php echo base_url('profile')?>"> Profile </a>
														</li>
														<li><a href="<?php echo base_url('logout')?>"> Logout </a>
														</li>
												</ul>
												<?php } else { ?>
												<ul>
														<li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal1">Sign In</a>
														</li>
														<li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal2">Sign Up</a>
														</li>
												</ul>
												<?php } ?>
										</div>
										<div class="ed-com-t1-social">
												<ul>
														<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
														</li>
														<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
														</li>
														<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
														</li>
												</ul>
										</div>
								</div>
						</div>
				</div>
		</div>

		<!-- LOGO AND MENU SECTION -->
		<div class="top-logo" data-spy="affix" data-offset-top="250">
				<div class="container">
						<div class="row">
								<div class="col-md-12">
										<div class="wed-logo">
												<a href="<?php echo base_url();?>"><img src="<?php echo base_url('public/assets/frontend')?>/images/logo.png" alt="" />
												</a>
										</div>
										<div class="main-menu">
												<ul>
														<li><a href="<?php echo base_url()?>">Home</a>
														</li>
														<li><a href="https://wa.me/8801611285514">Contact us</a>
														</li>
														<li><a href="<?php echo base_url()?>/admin">Admin areaa</a>
														</li>
												</ul>
										</div>
								</div>
								<div class="all-drop-down-menu">

								</div>

						</div>
				</div>
		</div>
</section>
<!--END HEADER SECTION-->