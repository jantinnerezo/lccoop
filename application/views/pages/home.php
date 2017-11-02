
	
<div class="container">
	<div id="home">
		<div class="row">
			<div class="col-md-4">
				<ul class="list-group">
					<?php foreach($user_data as $user): ?>
						<?php echo $user['lastname']; ?>
					<?php endforeach; ?>
					<li class="list-group-item text-center" id="list-header"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Account details </li>
					<li class="list-group-item"> First name: </li>
					<li class="list-group-item"> Last name: </li>
					<li class="list-group-item"> E-mail address: </li>
					<li class="list-group-item"> Department: </li>
				</ul>
			</div>

			<div class="col-md-4">
				<ul class="list-group">
					<li class="list-group-item text-center" id="list-header"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Balance </li>
					<li class="list-group-item"> First name: </li>
					<li class="list-group-item"> Last name: </li>
					<li class="list-group-item"> E-mail address: </li>
					<li class="list-group-item"> Department: </li>
					
				</ul>
			</div>

			<div class="col-md-4">
			</div>
		</div>
	</div>
</div>

 <script>
     $(document).ready(function(){

         $(".navbar-default").addClass("home");
             
        
    });
   </script>
