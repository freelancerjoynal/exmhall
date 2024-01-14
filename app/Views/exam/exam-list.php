
<!--SECTION START-->
<section>
		<div class="pro-cover">
		</div>
		<div class="pro-menu">
				<div class="container">
						<div class="col-md-10 col-md-offset-1">
								<ul>
										<li><a href="<?php echo base_url('profile')?>">Profile</a></li>
										<li><a href="<?php echo base_url('exams')?>" class="pro-act">Exams</a></li>
										<li><a href="<?php echo base_url('logout')?>">Logout</a></li>
								</ul>
						</div>
				</div>
		</div>
		<div class="stu-db">
				<div class="container pg-inn">
						 
						<div class="col-md-10 col-md-offset-1">
								<div class="udb">
									<div class="udb-sec udb-time">
											<!--<h4> Exam Details</h4>-->
											
											<div class="row">
											<form class="form-exam-advance-filter" method="post">
												<div class="col-md-3">
													<select class="form-control" name="class_id" required="">
															<option value=""> Select your class </option>
															<?php if(!empty($all_classes)) { ?>
															<?php foreach($all_classes as $class_data) { ?>
															
																<option value="<?php echo $class_data["id"]?>"> <?php echo $class_data["class_name"]?> </option>
															<?php } ?>
															<?php } ?>																						  
												   </select>
												</div>
												
												<div class="col-md-3">
													<select class="form-control" name="subject_id" required="">
														<option value=""> Select your subject </option>																					  
												   </select>
												</div>
												
												<div class="col-md-3">
													<select class="form-control" name="topic_id" required="">
															<option value=""> Select your topic </option>																			  
												   </select>
												</div>
												
												<div class="col-md-3">
													<button type="button" class="btn waves-effect waves-light sdb-btn exam__result-filter"> Filter </button> &nbsp;
													<button type="button" class="btn waves-effect waves-light sdb-btn exam__result-clear"> Clear </button>
												</div>
											</form>
											</div>
											
											<hr>
											
											<p> **Please do not refresh the page. Once you start the exam.</p>
											<div class="tour_head1 udb-time-line days exam-filter-dynamic-content">
													
													<?php echo $exams_list; ?> 
													
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
</section>
<!--SECTION END-->
