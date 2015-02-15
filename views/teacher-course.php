<style>
.course-type-wrapper{
	padding: 20px;
}

.course-type{
	
	border: 5px dashed #eee;	
	margin: 0 20px;
	width: calc(50% - 40px);
	padding: 20px;
	cursor: pointer;
}	

.course-type:hover{
	border-color: #6D5CAE;
}
</style>

<!-- Modal -->
<div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
        <div class="modal-content">                                        
           
                <div class="row course-type-wrapper">
	                <div class="col-xs-12">
		                <h2 class="text-left m-t-0">Add course form</h2>
	                </div>
	                <div class="col-xs-6 course-type">		                
		                <a href="<?= $router->generate('course_new') ?>">
				            <h3 class="text-center"><i class="fa fa-cog"></i> Customise</h3>								                
		                </a>
	                </div>
	                <div class="col-xs-6 course-type">
		                <a href="<?= $router->generate('questionbank') ?>">
			                <h3 class="text-center"><i class="fa fa-university"></i> Question Bank</h3>
		                </a>
	                </div>
                </div>
            
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal-dialog -->


<!-- START PAGE CONTENT WRAPPER -->
<div class="page-content-wrapper">
    <!-- START PAGE CONTENT -->
    <div class="content">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                <div class="inner">
                    <!-- START BREADCRUMB -->
                    <ul class="breadcrumb">
                        <li>
                            <p><a href="<?= $router->generate('course') ?>" class="active">Courses</a></p>
                        </li>                      
                    </ul>
                    <!-- END BREADCRUMB -->
                </div>
            </div>
        </div>
        <!-- END JUMBOTRON -->  
		<!-- START CONTAINER FLUID -->
		<div class="container-fluid container-fixed-lg">
		<!-- BEGIN PlACE PAGE CONTENT HERE -->
		
			<div class="row m-b-20">
				<div class="col-md-9">
					<h1>Course Hub</h1>									
				</div>				
				<div class="col-md-3">
					<a data-toggle="modal" data-target="#modalSlideUp" class="btn btn-light pull-right m-t-15">New Course</a>
				</div>
			</div>
		
			<div class="row">
			
				<?php
				foreach($courseAPI->courseList() as $course ):	
				?>
				<div class="col-md-4 sm-no-padding">
					<div class="panel panel-transparent">
						<div class="panel-body no-padding">
							<a href="<?= $router->generate('course_detail', array('course_id' => $course['course_id']) ) ?>" style="color: inherit">
								<div id="portlet-advance" class="panel panel-default">
									
									<div class="panel-heading separator">
										<div class="panel-title"><?= $course['course_code'] ?>
										</div>
									</div>			
													
									<div class="panel-body">
										<h3>
											<span class="semi-bold"></span> <?= $course['name'] ?>
										</h3>
										<p style="height: 60px;">
											<?= limit_words($course['description'], 20) ?>
										</p>
										<div>
											<!--
											<div class="profile-img-wrapper m-t-5 inline">
												<img width="35" height="35" alt="" src="<?= user::avatar($course['teacher_id']) ?>">
												<div class="chat-status available">
												</div>
											</div>
											
											<div class="inline m-l-10">
												<p class="small hint-text m-t-5"><?= $course['teacher_name'] ?>
													<br>from <?= $course['teacher_school'] ?>
												</p>
											</div>
											-->
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>	                 
				</div>
				<?php
				endforeach;	
				?>
				
			</div>
		
		
		<!-- END PLACE PAGE CONTENT HERE -->
		</div>
		<!-- END CONTAINER FLUID -->
    </div>
   </div>
    <!-- END PAGE CONTENT -->