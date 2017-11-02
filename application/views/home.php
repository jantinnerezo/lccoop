
<div class="jumbotron">
		<div class="container">
		  <?php if($this->session->userdata('logged_in')): ?>
		 	 <h1>Welcome <?php echo $this->session->userdata('username'); ?></h1>
		  <?php endif; ?>
		  <p>...</p>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>

		</div>
</div>