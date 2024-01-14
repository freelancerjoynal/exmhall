
<div class="page-content">
		<div class="container-fluid">

				<!-- start page title -->
				<div class="row align-items-center">
						<div class="col-sm-6">
								<div class="page-title-box">
										<h4 class="font-size-18"> Exams </h4>
										<ol class="breadcrumb mb-0">
												<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
												<li class="breadcrumb-item"><a href="javascript:void(0);">Exams</a></li>
												<li class="breadcrumb-item active"> List </li>
										</ol>
								</div>
						</div>
				</div>     
				<!-- end page title -->

			 

				<div class="row">
						<div class="col-12">
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
											
												<table id="admin_login_customers_table" class="table table-striped table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 12px;">
													<thead>
													<tr>
															<th>Class</th>
															<th>Subject</th>
															<th>Topic</th>
															<th>Exam Name</th>
															<th>Total Questions</th>
															<th>Exam Duration</th>
															<th>Last update</th>
															<th>Action</th>
															
													</tr>
													</thead>
													<tbody>
														<?php 
															if(!empty($exam_list)) {
																
																$count = 1;
																foreach($exam_list as $exam_details) {
														?>
														<tr>
															<td><?php echo $exam_details['class_name'];?> </td>
															<td> <?php echo $exam_details['subject_name'];?>  </td>
															<td> <?php echo $exam_details['topic_name'];?>  </td>
															<td> <?php echo $exam_details['quiz_name'];?>  </td>
															<td> <?php echo $exam_details['questions_count'];?>  </td>
															<td> <?php echo hoursandmins($exam_details['time_limit'], '%02d Hours, %02d Minutes');?>  </td>
															<td><?php echo get_formatted_date($exam_details['last_update'], true);?> </td>
															<td> 
																<a href="<?php echo base_url('/admin/exams/exam-edit/' . $exam_details['quiz_id'])?>">Edit </a>
																&nbsp / &nbsp 
																<a href="<?php echo base_url('/admin/exams/exam-delete/' . $exam_details['quiz_id'])?>">Delete</a> 
															</td>
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
