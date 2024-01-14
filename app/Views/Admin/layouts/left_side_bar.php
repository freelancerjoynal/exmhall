<div class="vertical-menu">

		<div data-simplebar class="h-100">

				<!--- Sidemenu -->
				<div id="sidebar-menu">
						<!-- Left Menu Start -->
						<ul class="metismenu list-unstyled" id="side-menu">
								<li class="menu-title"> <!--Main--> </li>

								<li>
										<a href="<?php echo base_url('admin/dashboard');?>" class="waves-effect">
												<i class="ti-home"></i><!--<span class="badge badge-pill badge-primary float-right">2</span>-->
												<span>Dashboard</span>
										</a>
								</li>
								
								<!---------------------------------------------------------------
									ADMIN
								------------------------------------------------------------------>
								
								
								<li>
										<a href="javascript: void(0);" class="has-arrow waves-effect">
												<i class="ti-view-grid"></i>
												<span>Classes</span>
										</a>
										<ul class="sub-menu" aria-expanded="false">
												<li><a href="<?php echo base_url('admin/masters/class-add');?>">Add</a></li>
												<li><a href="<?php echo base_url('admin/masters/classes');?>">List</a></li>
										</ul>
								</li>
								
								<li>
										<a href="javascript: void(0);" class="has-arrow waves-effect">
												<i class="ti-view-grid"></i>
												<span>Subjects</span>
										</a>
										<ul class="sub-menu" aria-expanded="false">
												<li><a href="<?php echo base_url('admin/masters/subject-add');?>">Add</a></li>
												<li><a href="<?php echo base_url('admin/masters/subjects');?>">List</a></li>
										</ul>
								</li>
								
								<li>
										<a href="javascript: void(0);" class="has-arrow waves-effect">
												<i class="ti-view-grid"></i>
												<span>Topics</span>
										</a>
										<ul class="sub-menu" aria-expanded="false">
												<li><a href="<?php echo base_url('admin/masters/topic-add');?>">Add</a></li>
												<li><a href="<?php echo base_url('admin/masters/topics');?>">List</a></li>
										</ul>
								</li>
								
								<li>
										<a href="javascript: void(0);" class="has-arrow waves-effect">
												<i class="ti-view-grid"></i>
												<span>Exams</span>
										</a>
										<ul class="sub-menu" aria-expanded="false">
												<li><a href="<?php echo base_url('admin/exams/exam-add');?>">Add</a></li>
												<li><a href="<?php echo base_url('admin/exams');?>">List</a></li>
										</ul>
								</li>
								
								<li>
										<a href="javascript: void(0);" class="has-arrow waves-effect">
												<i class="ti-view-grid"></i>
												<span>Exams Questions</span>
										</a>
										<ul class="sub-menu" aria-expanded="false">
												<li><a href="<?php echo base_url('admin/exam-question-add');?>">Add</a></li>
												<li><a href="<?php echo base_url('admin/exam-questions');?>">List</a></li>
										</ul>
								</li>
								
								<li>
										<a href="javascript: void(0);" class="has-arrow waves-effect">
												<i class="ti-view-grid"></i>
												<span>Students</span>
										</a>
										<ul class="sub-menu" aria-expanded="false">
												<li><a href="<?php echo base_url('admin/students');?>">List</a></li>
										</ul>
								</li>
								
								<li>
										<a href="javascript: void(0);" class="has-arrow waves-effect">
												<i class="ti-view-grid"></i>
												<span>Settings</span>
										</a>
										<ul class="sub-menu" aria-expanded="false"> 
												<li><a href="<?php echo base_url('admin/site-settings');?>">Site Settings</a></li>
										</ul>
								</li>
								
								<li>
										<a href="<?php echo base_url('admin/logout');?>" class="waves-effect">
												<i class="fas fa-sign-out-alt"></i><!--<span class="badge badge-pill badge-primary float-right">2</span>-->
												<span>Logout</span>
										</a>
								</li>

						</ul>
				</div>
				<!-- Sidebar -->
		</div>
</div>