<!--	HOME PAGE START	-->
<!-- SLIDER -->
<section>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
						<div class="item slider1 active">
								<img src="<?php echo base_url('public/assets/frontend')?>/images/slider/1.jpg" alt="">
								<div class="carousel-caption slider-con">
										<h2>Welcome  To  <span>Exmhall</span></h2>
                                            <p>এটি একটি শিক্ষাভিত্তিক প্লাটফর্ম যেখানে শিক্ষার্থীরা ঘরে বসেই অনলাইনের মাধ্যমে তাদের একাডেমিক  ও প্রতিযোগিতামূলক সকল পরীক্ষার জন্য নিজেকে প্রস্তুুত করতে পারবে</p>			<a href="#" class="bann-btn-1">All Courses</a><a href="#" class="bann-btn-2">Read More</a>
								</div>
						</div>
						<div class="item">
								<img src="<?php echo base_url('public/assets/frontend')?>/images/slider/2.jpg" alt="">
								<div class="carousel-caption slider-con">
										<h2>Scholarship Opportunity  <span></span></h2>
										<p>HSC  শিক্ষার্থীদের প্রতি ৩ মাস পর পর ২০% থেকে ১০০% বৃত্তির সুযোগ</p>
										<a href="#" class="bann-btn-1">Admission</a><a href="#" class="bann-btn-2">Read More</a>
								</div>
						</div>
						<div class="item">
								<img src="<?php echo base_url('public/assets/frontend')?>/images/slider/3.jpg" alt="">
								<div class="carousel-caption slider-con">
										<h2>Free   <span>Tuition</span></h2>
										<p>Exmhall এর সাথে সকল শিক্ষার্থীদের জন্য Online ফ্রী টিউশন</p>
										<a href="#" class="bann-btn-1">All Courses</a><a href="#" class="bann-btn-2">Read More</a>
								</div>
						</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<i class="fa fa-chevron-left slider-arr"></i>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<i class="fa fa-chevron-right slider-arr"></i>
				</a>
		</div>
</section>

<!-- QUICK LINKS -->
<section>
		<div class="container">
				<div class="row">
						<div class="wed-hom-ser">
								<ul>
										<li>
												<a href="awards.html" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="<?php echo base_url('public/assets/frontend')?>/images/icon/h-ic1.png" alt=""> Academy</a>
										</li>
										<li>
												<a href="admission.html" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="<?php echo base_url('public/assets/frontend')?>/images/icon/h-ic2.png" alt=""> Admission</a>
										</li>
										<li>
												<a href="all-courses.html" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="<?php echo base_url('public/assets/frontend')?>/images/icon/h-ic4.png" alt=""> Courses</a>
										</li>
										<li>
												<a href="seminar.html" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="<?php echo base_url('public/assets/frontend')?>/images/icon/h-ic3.png" alt=""> Seminar</a>
										</li>
								</ul>
						</div>
				</div>
		</div>
</section>

<!-- DISCOVER MORE -->
<section>
		<div class="container com-sp pad-bot-70">
				<div class="row">
						<div class="con-title">
								<h2>Be Ready For   <span>Success</span></h2>
								<p>প্রস্তুতি নেবো ঘরে বসেই, স্বপ্ন এবার পূরণ হবেই<br>
							যে সকল বিশ্ববিদ্যালয়ের মেধাবী শিক্ষার্থীরা ক্লাস পরিচালনা ও সাপোর্ট করবে..</p>
						</div>
				</div>
				<div class="row">
				<div class="col-sm-4">
					
						<div class="ho-ev-latest ho-ev-latest-bg-3">
								<div class="ho-lat-ev">
										<h4>Register & Login</h4>
										<p>Registration is compulsory to join us.The registration format has been given below....</p>
								</div>
						</div>
						<div class="ho-st-login">
								<ul class="tabs tabs-hom-reg">
										<li class="tab col s6"><a href="#hom-vijay">Register</a>
										</li>
										<li class="tab col s6"><a href="#hom_log">Login</a>  
										</li>
								</ul>
								<div id="hom-vijay" class="col s12">
										<form class="col s12 form-student-registration"> 
												<div class="row">
														<div class="input-field col s12"> 
																<input type="text" data-ng-model="name1" class="validate" name="name" maxlength="30" required>
																<label>Name</label> 
														</div>
												</div>
												<div class="row">
														<div class="input-field col s12">
																<input type="email" class="validate" name="email" maxlength="60" required>
																<label>Email</label>
														</div>
												</div>
												<div class="row">
														<div class="input-field col s12">
																<input type="text" data-ng-model="name1" class="validate" name="mobile" maxlength="10" required>
																<label>Mobile No.</label>
														</div>
												</div>
												<div class="row">
														<div class="input-field col s12">
																<input type="password" class="validate" name="password" maxlength="15" required>
																<label>Password</label>
														</div>
												</div>
												<div class="row">
														<div class="input-field col s12">
																<input type="password" class="validate" name="confirm_password" maxlength="15" required>
																<label>Confirm password</label>
														</div>
												</div>
												<div class="row">
														<span class="site-error reg-form-err hide login-form-err"></span>
														<div class="input-field col s12">
																<input type="submit" value="Register" class="waves-effect waves-light light-btn">
														</div>
												</div>
										</form>
								</div>
								<div id="hom_log" class="col s12"> 
										<form class="col s12 form-student-login"> 
												<div class="row">
														<div class="input-field col s12">
																<input type="text" class="validate" name="email" required>
																<label>Email</label>
														</div>
												</div>
												<div class="row">
														<div class="input-field col s12">
																<input type="password" class="validate" name="password" required>
																<label>Password</label> 
														</div>
												</div>
												<div class="row">
														<div class="input-field col s12">
														<span class="site-error login-form-err hide"></span>
																<input type="submit" value="Login" class="waves-effect waves-light light-btn">
														</div>
												</div>
										</form>
								</div>
						</div>
					
				</div>	
				<div class="col-sm-8">
						<div class="ed-course">
								<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="ed-course-in">
												<a class="course-overlay" href="javascript:void(0);">
														<img src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/3.jpg" alt="">
														<span>DU</span>
												</a>
										</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="ed-course-in">
												<a class="course-overlay" href="javascript:void(0);">
														<img src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/7.jpg" alt="">
														<span>DMC</span>
												</a>
										</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="ed-course-in">
												<a class="course-overlay" href="javascript:void(0);">
														<img src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/2.jpg" alt="">
														<span>BUET</span>
												</a>
										</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="ed-course-in">
												<a class="course-overlay" href="javascript:void(0);">
														<img src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/5.jpg" alt="">
														<span>JU</span>
												</a>
										</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="ed-course-in">
												<a class="course-overlay" href="javascript:void(0);">
														<img src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/4.jpg" alt="">
														<span>RU</span>
												</a>
										</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="ed-course-in">
												<a class="course-overlay" href="javascript:void(0);">
														<img src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/8.jpg" alt="">
														<span>BRUR</span>
												</a>
										</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="ed-course-in">
												<a class="course-overlay" href="javascript:void(0);">
														<img src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/1.jpg" alt="">
														<span>BUTEX</span>
												</a>
										</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
										<div class="ed-course-in">
												<a class="course-overlay" href="javascript:void(0);">
														<img src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/6.jpg" alt="">
														<span>CU</span>
												</a>
										</div>
								</div>
						</div>
				</div>
				
				</div>  <!--	row	-->
		</div>
</section>


<!-- UPCOMING EVENTS -->   <!--	No need now hidden	-->
<section>
		<div class="container com-sp pad-bot-0 hidden">
				<div class="row">
						<div class="col-md-4">
								<!--<div class="ho-ex-title">
					<h4>Upcoming Event</h4>
				</div>-->
								<div class="ho-ev-latest ho-ev-latest-bg-1">
										<div class="ho-lat-ev">
												<h4>Upcoming Event</h4>
												<p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
										</div>
								</div>
								<div class="ho-event ho-event-mob-bot-sp">
										<ul>
												<li>
														<div class="ho-ev-date"><span>07</span><span>jan,2018</span>
														</div>
														<div class="ho-ev-link">
																<a href="events.html">
																		<h4>Latinoo College Expo 2018</h4>
																</a>
																<p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
																<span>9:15 am – 5:00 pm</span>
														</div>
												</li>
												<li>
														<div class="ho-ev-date"><span>12</span><span>jan,2018</span>
														</div>
														<div class="ho-ev-link">
																<a href="events.html">
																		<h4>Training at Team Fabio Clemente</h4>
																</a>
																<p>Nulla at velit convallis venenatis.</p>
																<span>9:15 am – 5:00 pm</span>
														</div>
												</li>
												<li>
														<div class="ho-ev-date"><span>26</span><span>jan,2018</span>
														</div>
														<div class="ho-ev-link">
																<a href="events.html">
																		<h4>Nulla at velit convallis</h4>
																</a>
																<p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
																<span>9:15 am – 5:00 pm</span>
														</div>
												</li>
												<li>
														<div class="ho-ev-date"><span>18</span><span>jan,2018</span>
														</div>
														<div class="ho-ev-link">
																<a href="events.html">
																		<h4>Admissions Information Session and Tour</h4>
																</a>
																<p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
																<span>9:15 am – 5:00 pm</span>
														</div>
												</li>
										</ul>
								</div>
						</div>
						<div class="col-md-4">
								<!--<div class="ho-ex-title">
					<h4>Upcoming Event</h4>
				</div>-->
								<div class="ho-ev-latest ho-ev-latest-bg-2">
										<div class="ho-lat-ev">
												<h4>Job Vacants</h4>
												<p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
										</div>
								</div>
								<div class="ho-event ho-event-mob-bot-sp">
										<ul>
												<li>
														<div class="ho-ev-img"><img src="<?php echo base_url('public/assets/frontend')?>/images/event/1.jpg" alt="">
														</div>
														<div class="ho-ev-link">
																<a href="#">
																		<h4>Almost before we knew it, we had left the ground</h4>
																</a>
																<p>Etiam ornare lacus nec lectus vestibulum aliquam.</p>
																<span>Location: New York</span>
														</div>
												</li>
												<li>
														<div class="ho-ev-img"><img src="<?php echo base_url('public/assets/frontend')?>/images/event/2.jpg" alt="">
														</div>
														<div class="ho-ev-link">
																<a href="#">
																		<h4>Then came the night of the first falling star.</h4>
																</a>
																<p>Vestibulum sollicitudin sem arcu</p>
																<span>Location: Los Angeles</span>
														</div>
												</li>
												<li>
														<div class="ho-ev-img"><img src="<?php echo base_url('public/assets/frontend')?>/images/event/3.jpg" alt="">
														</div>
														<div class="ho-ev-link">
																<a href="#">
																		<h4>Educate to Empower NYE Party</h4>
																</a>
																<p>Vestibulum sollicitudin sem arcu, eget ullamcorper purus hendrerit</p>
																<span>Location: Chennai</span>
														</div>
												</li>
												<li>
														<div class="ho-ev-img"><img src="<?php echo base_url('public/assets/frontend')?>/images/event/4.jpg" alt=""></div>
														<div class="ho-ev-link">
																<a href="#">
																		<h4>Then came the night of the first falling star.</h4>
																</a>
																<p>Venenatis lacus lectus.</p>
																<span>Location: Chicago</span>
														</div>
												</li>
										</ul>
								</div>
						</div>
						<div class="col-md-4">
								<!--<div class="ho-ex-title">
					<h4>Upcoming Event</h4>
				</div>-->
								<div class="ho-ev-latest ho-ev-latest-bg-3">
										<div class="ho-lat-ev">
												<h4>Register & Login</h4>
												<p>Student area velit convallis venenatis lacus quis, efficitur lectus.</p>
										</div>
								</div>
								<div class="ho-st-login">
										<ul class="tabs tabs-hom-reg">
												<li class="tab col s6"><a href="#hom-vijay">Register</a>
												</li>
												<li class="tab col s6"><a href="#hom_log">Login</a>
												</li>
										</ul>
										<div id="hom-vijay" class="col s12">
												<form class="col s12">
														<div class="row">
																<div class="input-field col s12">
																		<input type="text" class="validate">
																		<label>User name</label>
																</div>
														</div>
														<div class="row">
																<div class="input-field col s12">
																		<input type="text" class="validate">
																		<label>Email id</label>
																</div>
														</div>
														<div class="row">
																<div class="input-field col s12">
																		<input type="password" class="validate">
																		<label>Password</label>
																</div>
														</div>
														<div class="row">
																<div class="input-field col s12">
																		<input type="password" class="validate">
																		<label>Confirm password</label>
																</div>
														</div>
														<div class="row">
																<div class="input-field col s12">
																		<input type="submit" value="Register" class="waves-effect waves-light light-btn">
																</div>
														</div>
												</form>
										</div>
										<div id="hom_log" class="col s12">
												<form class="col s12">
														<div class="row">
																<div class="input-field col s12">
																		<input type="text" class="validate">
																		<label>Student user name</label>
																</div>
														</div>
														<div class="row">
																<div class="input-field col s12">
																		<input type="text" class="validate">
																		<label>Password</label>
																</div>
														</div>
														<div class="row">
																<div class="input-field col s12">
																		<input type="submit" value="Login" class="waves-effect waves-light light-btn">
																</div>
														</div>
												</form>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>




<!-- POPULAR COURSES -->
<section class="pop-cour">
		<div class="container com-sp pad-bot-70">
				<div class="row">
						<div class="con-title">
								<h2>Popular <span>Courses</span></h2>
								<p>For better support & guideline, student can choose the course below</p>
						</div>
				</div>
				<div class="row">
						<div class="col-md-6">
								<div>
										<!--POPULAR COURSES-->
										<div class="home-top-cour">
												<!--POPULAR COURSES IMAGE-->
												<div class="col-md-3"> <img src="<?php echo base_url('public/assets/frontend')?>/images/course/c3.jpg" alt=""> </div>
												<!--POPULAR COURSES: CONTENT-->
												<div class="col-md-9 home-top-cour-desc">
														<a href="course-details.html">
																<h3>HSC Special</h3>
														</a>
														<h4>Science/Arts/Commerce</h4>
														<p>Coming soon...</p> <span class="home-top-cour-rat">Most Popular</span>
														<div class="hom-list-share">
																<!--<ul>
																		<li><a href="course-details.html"><i class="fa fa-bar-chart" aria-hidden="true"></i> Book Now</a> </li>
																		<li><a href="course-details.html"><i class="fa fa-eye" aria-hidden="true"></i>10 Aavailable</a> </li>
																		<li><a href="course-details.html"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a> </li>
																</ul>-->
														</div>
												</div>
										</div>
									<!--POPULAR COURSES-->
										<div class="home-top-cour">
												<!--POPULAR COURSES IMAGE-->
												<div class="col-md-3"> <img src="<?php echo base_url('public/assets/frontend')?>/images/course/c2.jpg" alt=""> </div>
												<!--POPULAR COURSES: CONTENT-->
												<div class="col-md-9 home-top-cour-desc">
														<a href="course-details.html">
																<h3>SSC Academic</h3>
														</a>
														<h4>Science/Arts/Commerce</h4>
														<p>Coming soon...</p> <span class="home-top-cour-rat">Most Popular</span>
														<div class="hom-list-share">
																
														</div>
												</div>
										</div>
								</div>
						</div>
						<div class="col-md-6">
								<div>
										<!--POPULAR COURSES-->
										<div class="home-top-cour">
												<!--POPULAR COURSES IMAGE-->
												<div class="col-md-3"> <img src="<?php echo base_url('public/assets/frontend')?>/images/course/c1.jpg" alt=""> </div>
												<!--POPULAR COURSES: CONTENT-->
												<div class="col-md-9 home-top-cour-desc">
														<a href="course-details.html">
																<h3>Job Preparation</h3>
														</a>
														<h4>Science/Arts/Commerce</h4>
														<p>Coming soon...</p> <span class="home-top-cour-rat">Most Popular</span>
														<div class="hom-list-share">
																
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>






<!-- NEWS AND EVENTS -->
<section>
		<div class="container com-sp">
				<div class="row">
						<div class="con-title">
								<h2>News and <span>Events</span></h2>
								<p>Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.</p>
						</div>
				</div>
				<div class="row">
						<div class="col-md-4">
								<div class="bot-gal h-gal ho-event-mob-bot-sp home-footer-gallery">
										<h4>Photo Gallery</h4>
										<ul>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/1.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/2.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/3.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/4.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/5.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/6.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/7.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/8.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/2.jpg" alt="">
												</li>
												<!--<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/3.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/4.jpg" alt="">
												</li>
												<li><img class="materialboxed" data-caption="Education master image captions" src="<?php echo base_url('public/assets/frontend')?>/images/home-gallery/1.jpg" alt="">-->
												</li>
										</ul>
								</div>
						</div>
						<div class="col-md-4">
								<div class="bot-gal h-vid ho-event-mob-bot-sp">
										<h4>Video Gallery</h4>
										<iframe src="https://www.youtube.com/embed/2WqFtiR4-F4?autoplay=0&amp;showinfo=0&amp;controls=0" allowfullscreen></iframe>
										<h5>Maecenas sollicitudin lacinia</h5>
										<p>Maecenas finibus neque a tellus auctor mattis. Aliquam tempor varius ornare. Maecenas dignissim leo leo, nec posuere purus finibus vitae.</p>
										<p>Quisque vitae neque at tellus malesuada convallis. Phasellus in lectus vitae ex euismod interdum non a lorem. Nulla bibendum. Curabitur mi odio, tempus quis risus cursus.</p>
								</div>
						</div>
						<div class="col-md-4">
								<div class="bot-gal h-blog ho-event">
										<h4>News & Event</h4>
										<div class="ho-event">
												<ul>
														<li>
																<div class="ho-ev-date"><span>07</span><span>jan,2018</span>
																</div>
																<div class="ho-ev-link">
																		<a href="events.html">
																				<h4>Latinoo College Expo 2018</h4>
																		</a>
																		<p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
																		<span>9:15 am – 5:00 pm</span>
																</div>
														</li>
														<li>
																<div class="ho-ev-date"><span>12</span><span>jan,2018</span>
																</div>
																<div class="ho-ev-link">
																		<a href="events.html">
																				<h4>Training at Team Fabio Clemente</h4>
																		</a>
																		<p>Nulla at velit convallis venenatis.</p>
																		<span>9:15 am – 5:00 pm</span>
																</div>
														</li>
														<li>
																<div class="ho-ev-date"><span>26</span><span>jan,2018</span>
																</div>
																<div class="ho-ev-link">
																		<a href="events.html">
																				<h4>Nulla at velit convallis</h4>
																		</a>
																		<p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
																		<span>9:15 am – 5:00 pm</span>
																</div>
														</li>
														<li>
																<div class="ho-ev-date"><span>18</span><span>jan,2018</span>
																</div>
																<div class="ho-ev-link">
																		<a href="events.html">
																				<h4>Admissions Information Session and Tour</h4>
																		</a>
																		<p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
																		<span>9:15 am – 5:00 pm</span>
																</div>
														</li>
												</ul>
										</div>
								</div>
						</div>
		</div>
</section>

<!-- FOOTER COURSE BOOKING -->
<section>
		<div class="full-bot-book">
				<div class="container">
						<div class="row">
								<div class="bot-book">
										<div class="col-md-2 bb-img">
												<img src="<?php echo base_url('public/assets/frontend')?>/images/3.png" alt="">
										</div>
										<div class="col-md-7 bb-text">
												<h4>therefore always free from repetition</h4>
												<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
										</div>
										<div class="col-md-3 bb-link">
												<a href="course-details.html">Book This Course</a>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>