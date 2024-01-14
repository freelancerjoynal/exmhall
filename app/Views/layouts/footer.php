<!-- FOOTER -->
<section class="wed-hom-footer">
		<div class="container">
				<div class="row wed-foot-link">
						<div class="col-md-4 foot-tc-mar-t-o">
								<h4>Top Courses</h4>
								<ul>
										<li><a href="course-details.html">Accounting/Finance</a></li>
										<li><a href="course-details.html">civil engineering</a></li>
										<li><a href="course-details.html">Art/Design</a></li>
										<li><a href="course-details.html">Marine Engineering</a></li>
										<li><a href="course-details.html">Business Management</a></li>
										<li><a href="course-details.html">Journalism/Writing</a></li>
										<li><a href="course-details.html">Physical Education</a></li>
										<li><a href="course-details.html">Political Science</a></li>
								</ul>
						</div>
						<div class="col-md-4">
								<h4>New Courses</h4>
								<ul>
										<li><a href="course-details.html">Sciences</a></li>
										<li><a href="course-details.html">Statistics</a></li>
										<li><a href="course-details.html">Web Design/Development</a></li>
										<li><a href="course-details.html">SEO</a></li>
										<li><a href="course-details.html">Google Business</a></li>
										<li><a href="course-details.html">Graphics Design</a></li>
										<li><a href="course-details.html">Networking Courses</a></li>
										<li><a href="course-details.html">Information technology</a></li>
								</ul>
						</div>
						<div class="col-md-4">
								<h4>HELP & SUPPORT</h4>
								<ul>
										<li><a href="#">24x7 Live help</a>
										</li>
										<li><a href="#">Contact us</a>
										</li>
										<li><a href="#">Feedback</a>
										</li>
										<li><a href="#">FAQs</a>
										</li>
										<li><a href="#">Safety Tips</a>
										</li>
								</ul>
						</div>
				</div>
				
				<!--<div class="row wed-foot-link-1">
						<div class="col-md-4 foot-tc-mar-t-o">
								<h4>Get In Touch</h4>
								<p>Address: 28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p>
								<p>Phone: <a href="#!">+101-1231-4321</a></p>
								<p>Email: <a href="#!">info@edu.com</a></p>
						</div>
						<div class="col-md-4">
								<h4>DOWNLOAD OUR FREE MOBILE APPS</h4>
								<ul>
										<li><a href="#"><span class="sprite sprite-android"></span></a>
										</li>
										<li><a href="#"><span class="sprite sprite-ios"></span></a>
										</li>
								</ul>
						</div>
						<div class="col-md-4">
								<h4>SOCIAL MEDIA</h4>
								<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
										</li>
								</ul>
						</div>
				</div>-->
		</div>
</section>

<!-- COPY RIGHTS -->
<!--<section class="wed-rights">
		<div class="container">
				<div class="row">
						<div class="copy-right">
							 <a target="_blank" href="<?php echo base_url()?>"> Exam Portal </a>
						</div>
				</div>
		</div>
</section>-->

<!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
<section>
		<!-- LOGIN SECTION -->
		<div id="modal1" class="modal fade" role="dialog">
				<div class="log-in-pop" style="width: 40%">
						<!--<div class="log-in-pop-left">
								<h1>Hello...</h1>
								<p>Don't have an account? Create your account. It's take less then a minutes</p>
								<h4>Login with social media</h4>
								<ul>
										<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
										</li>
										<li><a href="#"><i class="fa fa-google"></i> Google+</a>
										</li>
										<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
										</li>
								</ul>
						</div>-->
						<div class="log-in-pop-right" style="width: 100%">
								<a href="#" class="pop-close" data-dismiss="modal"><img src="<?php echo base_url('public/assets/frontend')?>/images/cancel.png" alt="" />
								</a>
								<h4>Login</h4>
								<p>Don't have an account? Create your account. It's take less then a minutes</p>
								<form class="s12 form-student-login">
										<div>
												<div class="input-field s12">
														<input type="text" data-ng-model="name" class="validate" name="email" required>
														<label>Email</label>
												</div>
										</div>
										<div>
												<div class="input-field s12">
														<input type="password" class="validate" name="password" required>
														<label>Password</label>
												</div>
										</div>
										<!--<div>
												<div class="s12 log-ch-bx">
														<p>
																<input type="checkbox" id="test5" />
																<label for="test5">Remember me</label>
														</p>
												</div>
										</div>-->
										<div>
												<div class="input-field s4">
														<span class="site-error login-form-err hide"></span>
														<input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
										</div>
										<div>
												<div class="input-field s12">
												<!--	<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Forgot password</a> | -->
												<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
										</div>
								</form>
						</div>
				</div>
		</div>
		
		<!-- REGISTER SECTION -->
		<div id="modal2" class="modal fade" role="dialog">
				<div class="log-in-pop" style="width: 40%">
						<!--<div class="log-in-pop-left">
								<h1>Hello...</h1>
								<p>Don't have an account? Create your account. It's take less then a minutes</p>
								<h4>Login with social media</h4>
								<ul>
										<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
										</li>
										<li><a href="#"><i class="fa fa-google"></i> Google+</a>
										</li>
										<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
										</li>
								</ul>
						</div>-->
						<div class="log-in-pop-right" style="width: 100%">
								<a href="#" class="pop-close" data-dismiss="modal"><img src="<?php echo base_url('public/assets/frontend')?>/images/cancel.png" alt="" />
								</a>
								<h4>Create an Account</h4>
								<p>Don't have an account? Create your account. It's take less then a minutes</p>
								<form class="s12 form-student-registration" method="post">
										<?= csrf_field();?>
										<div>
												<div class="input-field s12">
														<input type="text" data-ng-model="name1" class="validate" name="name" maxlength="30" required>
														<label>Name</label>
												</div>
										</div>
										<div>
												<div class="input-field s12">
														<input type="email" class="validate" name="email" maxlength="60" required>
														<label>Email</label>
												</div>
										</div>
										<div>
												<div class="input-field s12">
														<input type="text" data-ng-model="name1" class="validate" name="mobile" maxlength="10" required>
														<label>Mobile No.</label>
												</div>
										</div>
										<div>
												<div class="input-field s12">
														<input type="password" class="validate" name="password" maxlength="15" required>
														<label>Password</label>
												</div>
										</div>
										<div>
												<div class="input-field s12">
														<input type="password" class="validate" name="confirm_password" maxlength="15" required>
														<label>Confirm password</label>
												</div>
										</div>
										<div>
												<span class="site-error reg-form-err hide login-form-err"></span>
												<div class="input-field s4">
														<input type="submit" value="Register" class="waves-effect waves-light log-in-btn"> </div>
										</div>
										<div>
												<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> </div>
										</div>
								</form>
						</div>
				</div>
		</div>
		
		
		<!-- FORGOT SECTION -->
		<div id="modal3" class="modal fade" role="dialog">
				<div class="log-in-pop">
						<div class="log-in-pop-left">
								<h1>Hello... </h1>
								<p>Don't have an account? Create your account. It's take less then a minutes</p>
								<h4>Login with social media</h4>
								<ul>
										<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
										</li>
										<li><a href="#"><i class="fa fa-google"></i> Google+</a>
										</li>
										<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
										</li>
								</ul>
						</div>
						<div class="log-in-pop-right">
								<a href="#" class="pop-close" data-dismiss="modal"><img src="<?php echo base_url('public/assets/frontend')?>/images/cancel.png" alt="" />
								</a>
								<h4>Forgot password</h4>
								<p>Don't have an account? Create your account. It's take less then a minutes</p>
								<form class="s12">
										<div>
												<div class="input-field s12">
														<input type="text" data-ng-model="name3" class="validate">
														<label>User name or email id</label>
												</div>
										</div>
										<div>
												<div class="input-field s4">
														<input type="submit" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
										</div>
										<div>
												<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
										</div>
								</form>
						</div>
				</div>
		</div>
</section>

<!-- SOCIAL MEDIA SHARE -->
<!--<section>
		<div class="icon-float">
				<ul>
						<li><a href="#" class="sh">1k <br> Share</a> </li>
						<li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
						<li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
						<li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
						<li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
						<li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
						<li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
				</ul>
		</div>
</section>-->