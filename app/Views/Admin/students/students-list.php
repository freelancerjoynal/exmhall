
<div class="page-content">
		<div class="container-fluid">

				<!-- start page title -->
				<div class="row align-items-center">
						<div class="col-sm-6">
								<div class="page-title-box">
										<h4 class="font-size-18"> Students </h4>
										<ol class="breadcrumb mb-0">
												<li class="breadcrumb-item"><a href="<?php echo base_url('control/dashboard');?>">Home</a></li>
												<li class="breadcrumb-item"><a href="javascript:void(0);">Students</a></li>
												<li class="breadcrumb-item active"> List </li>
										</ol>
								</div>
						</div>
				</div>     
				<!-- end page title -->


			 

				<div class="row">
						<div class="col-12">
						    
						    <input type="text" class="searchBox" id="searchBox"> </input>
                            <input type="submit" value="Search" class="btnInput" id="btnInput"> </input>
                            <br><br>
						    
								<div class="card">
										<div class="card-body">
												<?php if(session()->getFlashdata('error') !== NULL) : ?>
												<div class="form-group">
													<div class="alert alert-danger custom-alert">
														<strong>Warning!</strong> <?php echo session()->getFlashdata('error');?>
													</div>
												</div>
												<?php elseif(session()->getFlashdata('success') !== NULL) : ?>
												<div class="form-group">
													<div class="alert alert-success custom-alert">
														<strong>Success!</strong> <?php echo session()->getFlashdata('success');?>
													</div>
												</div>
												<?php endif; ?>
											
												<table id="admin_login_customers_table" class="table table-striped table-bordered table-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 12px;">
													<thead>
													<tr>
															<th>Account ID</th>
															<th>Name</th>
															<th>Email</th>
															<th>Mobile</th>
															<th>College</th>
															<th>Address</th>
															<th>Package Name</th>
															<th>Package Duration</th>
															<th>Expiry Date</th>
															<th>Transaction id</th>
															<th>Status</th>
															<th>Last update</th>
															
													</tr>
													</thead>
													<tbody>
														<?php 
															if(!empty($students)) {
																
																$count = 1;
																foreach($students as $student_details) {
														?>
														<tr>
															<td><?php echo $student_details['account_key'];?> </td>
															<td> <?php echo $student_details['name'];?>  </td>
															<td> <?php echo $student_details['email'];?>  </td>
															<td> <?php echo $student_details['mobile'];?>  </td>
															<td> <?php echo $student_details['college'];?>  </td>
															<td> <?php echo $student_details['address'];?>  </td>
															<td> 
																<?php 
																	if($student_details['package_name']) {
																		echo $student_details['package_name'];
																		echo ' ($' . $student_details['package_amount'] . ')';
																	}
																?> 
															</td>
															<td> 
																<?php 
																	echo isset($student_details['package_duration']) && $student_details['package_duration'] ? $student_details['package_duration'] . ' Days' : '';
																?> 
															</td>
															<td> <?php echo isset($student_details['expire_date']) && $student_details['expire_date'] ? get_formatted_date($student_details['expire_date']) : '';?> </td>
															<td> <?php echo $student_details['transaction_id'];?> </td>
															<td> 
															<?php 
															if($student_details['status'] == 1)
															{ 
																echo 'Approved'; 
															}
														  elseif($student_details['status'] == 2)
															{ 
																echo 'Blocked'; 
															}
															else
															{
															?>
																<a href="<?php echo base_url('/admin/students/status-edit/' . $student_details['id'] )?>"><button type=submit>Pending</button></a>
															<?php 
															}
														    ?>  
														    </td>
															<td style="min-width: 115px;"><?php echo get_formatted_date($student_details['last_update'], true);?> </td>
						
														</tr>
														<?php
																$count++;
																}
															}
														?>
													</tbody>
											</table>
										</div>
								</div>
						</div> <!-- end col -->
				</div> <!-- end row -->

				

		</div> <!-- container-fluid -->
</div>
