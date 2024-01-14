
<!--SECTION START-->
<section>
		<div class="pro-cover">
		</div>
		<div class="pro-menu">
				<div class="container">
						<div class="col-md-10 col-md-offset-1">
								<ul>
										<li><a href="<?php echo base_url('profile')?>" class="pro-act">Profile</a></li>
										<li><a href="<?php echo base_url('exams')?>">Exams</a></li>
										<li><a href="<?php echo base_url('logout')?>">Logout</a></li>
								</ul>
						</div>
				</div>
		</div>
		<div class="stu-db">
				<div class="container pg-inn">
						
						<div class="col-md-10 col-md-offset-1">
								<div class="udb">
										
										<?php if(session()->getFlashdata('error_profile') !== NULL) : ?>
										<div class="form-group">
											<div class="alert alert-danger custom-alert">
												<strong>Warning!</strong> <?php echo session()->getFlashdata('error_profile');?>
											</div>
										</div>
										<?php elseif(session()->getFlashdata('success_profile') !== NULL) : ?>
										<div class="form-group">
											<div class="alert alert-success custom-alert">
												<strong>Success!</strong> <?php echo session()->getFlashdata('success_profile');?>
											</div>
										</div>
										<?php endif; ?>
										
										<div class="udb-sec udb-prof">
												<h4> Admin Account Details</h4>
												<div class="sdb-tabl-com sdb-pro-table" style="margin-bottom: 20px;">
														<form action="<?php echo base_url('profile-data-save')?>" method="post">
														<table class="responsive-table bordered">
																<tbody>
																		<tr>
																				<td> 
																					<?php echo isset($site_details['admin_account_details']) ? nl2br($site_details['admin_account_details']) : '';?>
																				</td>
																		</tr>
																</tbody>
														</table>
														</form>
												</div>
												
												
												<h4> My Profile</h4> 
											
												<div class="sdb-tabl-com sdb-pro-table">
														<form action="<?php echo base_url('profile-data-save')?>" method="post">
														
														<div class="form-group row">
																<div class="col-sm-3">
																	<label for="example-text-input" class="col-form-label"> Student Name: <span class="text-danger">*</span></label>
																</div>
																<div class="col-sm-9">
																	<input type="text" name="s_name" class="form-control profile-input" value="<?php echo isset($student_details['name']) ? $student_details['name'] : '';?>" required>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3 col-xs-4">
																	<label for="example-text-input" class="col-form-label"> Student Id: </label>
																</div>
																<div class="col-sm-9 col-xs-8">
																	<?php echo isset($student_details['account_key']) ? $student_details['account_key'] : '';?>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3 col-xs-4">
																	<label for="example-text-input" class="col-form-label"> Eamil: </label>
																</div>
																<div class="col-sm-9 col-xs-8">
																	<?php echo isset($student_details['email']) ? $student_details['email'] : '';?>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3">
																	<label for="example-text-input" class="col-form-label"> Phone: <span class="text-danger">*</span></label>
																</div>
																<div class="col-sm-9">
																	<input type="text" name="s_mobile" class="form-control profile-input" value="<?php echo isset($student_details['mobile']) ? $student_details['mobile'] : '';?>" required> 
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3">
																	<label for="example-text-input" class="col-form-label"> Date of birth: <span class="text-danger">*</span></label>
																</div>
																<div class="col-sm-9">
																	<input type="date" name="s_dob" class="form-control profile-input" value="<?php echo isset($student_details['dob']) ? $student_details['dob'] : '';?>" required>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3">
																	<label for="example-text-input" class="col-form-label"> School / College: <span class="text-danger">*</span> </label>
																</div>
																<div class="col-sm-9">
																	<input type="text" name="s_college" class="form-control profile-input" value="<?php echo isset($student_details['college']) ? $student_details['college'] : '';?>" maxlength="150" required>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3">
																	<label for="example-text-input" class="col-form-label"> Address: <span class="text-danger">*</span> </label>
																</div>
																<div class="col-sm-9">
																	<input type="text" name="s_address" class="form-control profile-input" value="<?php echo isset($student_details['address']) ? $student_details['address'] : '';?>" maxlength="150" required>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3">
																	<label for="example-text-input" class="col-form-label"> Password: </label>
																</div>
																<div class="col-sm-9">
																	<input type="password" name="s_password" class="form-control profile-input" value="" maxlength="20">
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3">
																	<label for="example-text-input" class="col-form-label"> Package: </label>
																</div>
																<div class="col-sm-9">
																	<select name="s_package" class=" profile-input">
																		<option value=""> Choose any package</option>
																		
																		<?php 
																			if(!empty($packages)) {
																				
																				foreach($packages as $package_details) {
																				
																				$is_selected = '';
																				if(isset($student_details['package_id']) && $student_details['package_id'] == $package_details['id']) {
																					$is_selected = 'selected';
																				}
																		?>
																		<option <?php echo $is_selected;?> value="<?php echo $package_details['id']?>"> <?php echo $package_details['package_name']?> ($<?php echo $package_details['package_amount']?>) </option>
																		<?php
																					}
																				}
																		?>
																		
																	</select>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3 col-xs-4">
																	<label for="example-text-input" class="col-form-label"> Package Duration: </label>
																</div>
																<div class="col-sm-9 col-xs-8">
																	<?php echo isset($student_details['package_duration']) ? $student_details['package_duration'] . ' Days' : 'N/A';?>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3 col-xs-4">
																	<label for="example-text-input" class="col-form-label"> Expiry Date: </label>
																</div>
																<div class="col-sm-9 col-xs-8">
																	<?php echo isset($student_details['expire_date']) && $student_details['expire_date'] ? get_formatted_date($student_details['expire_date']) : 'N/A';?>
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3 col-xs-4">
																	<label for="example-text-input" class="col-form-label"> Transaction ID: </label>
																</div>
																<div class="col-sm-9 col-xs-8">
																	<input type="text" name="s_transaction_id" class="form-control profile-input" value="<?php echo isset($student_details['transaction_id']) ? $student_details['transaction_id'] : '';?>" maxlength="80">
																</div>
														</div>
														
														<div class="form-group row">
																<div class="col-sm-3 col-xs-4">
																	<label for="example-text-input" class="col-form-label"> Status: </label>
																</div>
																<div class="col-sm-9 col-xs-8">
																	<?php 
																		if($student_details['status'] == 0) {
																			echo 'Pending';
																		} 
																		else if($student_details['status'] == 1) {
																			echo 'Approved';
																		}
																		else {
																			echo 'Blocked';
																		}
																		?>
																</div>
														</div>
														
														
														
														<table class="responsive-table bordered">
																<tbody>
																		
																	
																		
																		
																		
																		<!--<tr>
																				<td> Transaction Image </td>
																				<td>:</td>
																				<td> <input type="file" name="s_transaction_image" class="form-control profile-input" value=""> </td>
																		</tr>-->
																		
																</tbody>
														</table>
														<div class="sdb-bot-edit">
																<p> Note: If you update Package or transaction ID<!-- or transaction image data-->, your account will be in pending mode. After admin approved you can attend exam.</p>
																<button type="submit" class="btn waves-effect waves-light btn-large sdb-btn"> Update Profile </button>
														</div>
														</form>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>
<!--SECTION END-->
