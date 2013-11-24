<!DOCTYPE html>
<html lang="en">
<head>	
 <?php include 'includes/head.php'; ?>			
</head>

<body>
		
	
	<!-- start: Header Menu -->
		<?php include 'includes/headerbar.php'; ?>
<!-- end: Header Menu -->
	
	
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
            <?php include 'includes/Main_menu.php'; ?>
			<!-- end: Main Menu -->
			
			
			<div id="content" class="span10">
			<!-- start: Content -->
			
			<div>
				<hr>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url(); ?>main_panel">Home</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url(); ?>users_details">Upload Image</a>
					</li>
                    
					
				</ul>
				
			</div>
			  <hr>
                       <!-- start: Quick button Menu -->
            <?php include 'includes/quick_buttons.php'; ?>
			<!-- end: Quick button Menu -->
                        <hr>
                        
                        
                             <?php
				 $attributes = array('id' => 'add_img_form');
				  echo form_open_multipart('add_img/do_upload', $attributes);?>
    	<!--<form method="post" id="add_location_form" action="<?php echo base_url();?>add_location/add_new_location" >-->
        	<div>
            	<label for="image_name">Image Name </label>
                <input id="image_name" name="image_name" type="text" />
                
             </div>
             
             <div>
            	<label for="img_category">Image Category </label>
                <input id="img_category" name="img_category" type="text" />
                
             </div>
             
              <div>
            	<label for="img_description">Description </label>
                <textarea name="img_description" id="img_description" cols="45" rows="5" tabindex="1"></textarea>
               
             </div>
             
             <div>
             <label for="imageUpload">Select an Image </label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>img/no+image.gif" /></div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
     
            <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
           
           
            <input type="file" name="userfile" id="image" /></span>
           
          <a href="#" class="btn btn-file fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
            </div>
             </div>            
                        
             
             <input type="submit" id="upload_image" class="btn btn-success" value="Upload Image" />
           <!--  <a id="save_location" href="#" role="button" class="btn btn-primary"><i class="icon-share icon-white"></i><span class="break"></span> Save Location</a>-->
          
             </form>
             
			
            <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" style="margin-bottom:5px;" data-original-title>
       
               
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Image File</th>
								  <th>Description</th>
								  <th>Category</th>
								  <!--<th>Package</th>-->
								 <th>Actions</th>
								 <!--  <th>Register Status</th>
								  <th>Actions</th>-->
							  </tr>
						  </thead>   
						  <tbody>
							
								
								
								<td>LED Bulb</td>
								<td class="center"> led_bulb.jpg</td>
								<td class="center"> Sub Device</td>
								
								<td class="center">
									 <div class="btn-group">
                                	<a href="#" class="btn btn-info"><i class="icon-edit icon-white"></i></a>
                                     <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></a>
                                     <ul style="min-width:88px;" class="dropdown-menu">
                                     	<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                        <li><a href=""><i class="icon-ban-circle"></i> Enable</a></li>
                                        <li class="divider"></li>
                                        <li><a class="" href=""><i class="icon-trash"></i> Delete</a></li>
                                        </ul>
                                        </div>
								</td>
							</tr>
							
                            </tbody>
                        </table>
                           
                        
					</div>
				</div><!--/span-->
			
			</div>
			<hr>
			
		
		
		<div class="clearfix"></div>
		
		<!-- start: footer-->
		<?php include 'includes/footer.php'; ?>
		<!-- end: footer-->
		</div>		
	</div><!--/.fluid-container-->

	<!-- Modals Start -->
		<div id="delete_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Confirm Delete User</h3>
		</div>
		<div class="modal-body">
		<p>Do you want to delete this user?</p>
		</div>
		<div class="modal-footer">
			<a href="#" role="button" class="btn btn-danger" id="model_btn_deluser"><i class="icon-trash icon-white"></i> Delete</a>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		
		</div>
		</div>
	<!-- Modals End -->
	
	<!-- Modals Start -->
		<div id="change_status_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel" class="cs_user_header"></h3>
		</div>
		<div class="modal-body cs_user_body">
			<p></p>
		</div>
		<div class="modal-footer">
			<a href="#" role="button" class="btn btn-danger" id="model_btn_csuser"></a>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		
		</div>
		</div>
	<!-- Modals End -->



		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				
				$(".deluser_s").click(function(){
					
					$("#model_btn_deluser").attr('href',"<?php echo base_url();?>users_details/delete_user/" + $(this).attr('user_id'));
				
				});
				
				$(".changestatus_s").click(function(){
					
					var enable_temp_val = "1";
					
					if($(this).attr('admin_s') == 1)
					{
						$('#model_btn_csuser').removeClass("btn btn-success").addClass("btn btn-danger");
						$(".cs_user_header").text("Disable User");
						$(".cs_user_body p").text("Do you want to disable this user?");
						$("#model_btn_csuser").html("<i class=\"icon-user icon-white\"></i> Disable");
						enable_temp_val = "0";
					}
					else
					{
						if($(this).attr('admin_s') == 0)
						{
							$('#model_btn_csuser').removeClass("btn btn-danger").addClass("btn btn-success");
							$(".cs_user_header").text("Enable User");
							$(".cs_user_body p").text("Do you want to enable this user?");
							$("#model_btn_csuser").html("<i class=\"icon-user icon-white\"></i> Enable");
						}
					}

					$("#model_btn_csuser").attr('href',"<?php echo base_url();?>users_details/change_state_user/" + $(this).attr('user_id') + "/" + enable_temp_val);
				
				});

				
			});
			
		</script>

	
	
	
</body>
</html>
