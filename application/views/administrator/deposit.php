

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <?php include('sidebar.php'); ?>
        </div>

        <div class="col-md-9">
        <div class="wrapper">
        <div class="inner-wrapper2">
            <div class="card">
            
                <?php foreach($account as $user): ?>
                   
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">
                            <h5><span class="oi oi-person"></span> Account name: <?php echo $user['firstname'] .' '.$user['lastname'];?></h5>
                        </li>
                        <li class="list-group-item text-center">
                            <h5> Balance: <?php echo '&#8369; ' . number_format($user['balance'], 2, '.', ',');?></h5>
                        </li>   
    
                    </ul>
                    <div class="card-body">
                         <h4 class="card-title text-center text-info">Deposit</h4>

                         <?php echo form_open('deposit'); ?>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Amount to deposit " name="amount">
                            </div>  
                            <div class="form-group">
                                <input type="hidden" name="user_name" value="<?php echo $user['firstname'] .' '.$user['lastname'];?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="<?php echo $user['userID']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="balance" value="<?php echo $user['balance']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-success" value="Deposit">
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                   
                <?php endforeach; ?>
            </div>
           
        </div>
    </div>
    
        </div>
    </div>
</div>



<script>
    $('document').ready(function(){
       
    });
</script>