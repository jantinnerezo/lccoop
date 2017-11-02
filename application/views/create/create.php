<div class="bg-img">
	<div class="container">
		<div class="frame">
			<div class="row">
		  		
		  		<div class="col-md-8">
					
					<div class="welcome">

						<?php if($this->session->flashdata('registered')): ?>
								<div class="alert alert-success"> <?php echo $this->session->flashdata('registered'); ?> </div>
						<?php endif; ?>
						<h2 class="greetings"> <strong> Welcome to </strong> </h2>
						<h3 class="greetings"> Lourdes College Multi-purpose Cooperative System</h3>

					</div>
			       
		  		</div>

		  		<div class="col-md-4">
							<div class="form-group text-center">
					            <h4 class="input-label"> Register Here </h4>
					            <?php if($this->session->flashdata('existed')): ?>
								<div class="alert alert-warning"> <?php echo $this->session->flashdata('existed'); ?> </div>
								<?php endif; ?>
					            <?php if(form_error('password')): ?>
									<div class="alert alert-warning"> <?php echo form_error('password'); ?> </div>
							 	<?php endif; ?>
							 		<?php if(form_error('password2')): ?>
									<div class="alert alert-warning"> <?php echo form_error('password2'); ?> </div>
							 <?php endif; ?>
					        </div><!-- /input-group -->
					      <?php echo form_open('user/create'); ?>
							<div class="form-group">
					            <input type="text" class="custom-input" required name="firstname" placeholder="First name" /> 
					        </div><!-- /input-group -->
					        <div class="form-group">
					            <input type="text" class="custom-input" required  name="lastname" placeholder="Last name" /> 
					        </div><!-- /input-group -->
					        <div class="form-group">   
						     <!-- Single button -->			
							    <div class="input-group">
							     <input type="text" required placeholder="Department" class="custom-input" id="dep"aria-label="..." >
							       <input type="hidden" class="custom-input" id="level_id" name="level_id">
							      <div class="input-group-btn">
							        <button type="button" class="custom-input dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select <span class="caret"></span></button>
							        <ul class="dropdown-menu">
							        	<?php foreach($levels as $level): ?>
							          			<li><a  class="department" data-value="<?php echo $level['id'];?>" data-formatted="<?php echo $level['description']; ?>"><?php echo $level['description']; ?></a></li>  
										<?php endforeach; ?>
							        </ul>
							      </div><!-- /btn-group -->
							     
							    </div><!-- /input-group -->
					        </div>
					        <div class="form-group">
					            <input type="email" class="custom-input" required name="email" placeholder="E-mail address" /> 
					        </div><!-- /input-group -->

					      	 <div class="form-group">
					            <input type="password" class="custom-input" name="password" placeholder="Password" /> 
					        </div><!-- /input-group -->

							<div class="form-group">
					            <input type="password" class="custom-input" name="password2" placeholder="Confirm password" /> 
					        </div><!-- /input-group -->
					
					        <div class="form-group">
					        	<input type="submit" value="Register" class="btn-flat"/>
					        </div>
			        	<?php echo form_close(); ?>
		  		</div>
		     
		  
			</div><!-- /.row -->
		</div>
	
	</div>
 </div>

 <script type="text/javascript">
 	$(document).ready(function(){

 		//var department = $('#department');
 		var dep = $('#dep');
 		var level_id = $('#level_id');

 		$('.department').on('click', function(){
 			var get_id = $(this).data('value');
 			var get_text = $(this).data('formatted');
 			dep.val(get_text);
 			level_id.val(get_id);

 			console.log(get_id);

 		});



 	});

 </script>