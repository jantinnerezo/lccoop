<div class="wrapper">
	<div class="inner-wrapper">
		
		<?php echo form_open('login'); ?>

			<div class="form-group text-center">
				<img src="<?php echo base_url();?>assets/img/logo.svg" width="120" alt="">
			</div>
			<hr>
			<div class="form-group text-center">
				<?php if($this->session->flashdata('invalid')): ?>
						<div class="alert alert-danger"> <?php echo $this->session->flashdata('invalid'); ?> </div>
				<?php endif; ?>
				<?php if($this->session->flashdata('unapproved')): ?>
						<div class="alert alert-danger"> <?php echo $this->session->flashdata('unapproved'); ?> </div>
				<?php endif; ?>
			</div>
			<div class="form-group text-center">
				<h4 class="input-label"> <span class="oi oi-account-login"></span> Login</h4>
			</div>
			
			<div class="form-group text-center">
				<input type="email" class="form-control" required name="email" placeholder="E-mail address" /> 
			</div><!-- /input-group -->

			<div class="form-group text-center">
				<input type="password" class="form-control" name="password" placeholder="Password" /> 
			</div><!-- /input-group -->
			
			<div class="form-group text-center">
				<input type="submit" value="Login" class="btn btn-block btn-primary"/>
			</div>

			

		<?php echo form_close(); ?>
	</div>
</div>

