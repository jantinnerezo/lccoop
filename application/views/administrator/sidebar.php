<div class="container-fluid admin">
    <div class="row">
        <div class="col-md-3">
			 <div class="sidebar">
			    <div class="list-group">
					  <a href="<?php echo base_url();?>admin"  class="list-group-item list-group-item-action"><span class="oi oi-people"></span> <span class="badge-list">Members </span>
					  	<?php if($unapprove): ?>
					  		<span class="badge badge-danger text-right"><?php echo count($unapprove);?></span></a>
					  	<?php endif;?>
					  </a>
					  <a href="<?php echo base_url();?>transactions" class="list-group-item list-group-item-action"><span class="oi oi-transfer"></span> Transactions</a>
					  <a href="<?php echo base_url();?>loans" class="list-group-item list-group-item-action"><span class="oi oi-bar-chart"></span> Loans</a>
					  <a href="<?php echo base_url();?>request" class="list-group-item list-group-item-action"><span class="oi oi-envelope-closed"></span> <span class="badge-list">Loan Requests</span> 
					  	<?php if($loan_request): ?>
					  		<span class="badge badge-danger text-right"><?php echo count($loan_request);?></span></a>
					  	<?php endif;?>
					  	  <a href="<?php echo base_url();?>loans/loan_transaction" class="list-group-item list-group-item-action"><span class="oi oi-transfer"></span> Loan Transactions</a>
					  <a href="<?php base_url();?>" class="list-group-item list-group-item-action"><span class="oi oi-reload"></span> Refresh </a>
				</div>

			 </div>
		</div>