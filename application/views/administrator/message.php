<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <?php include('sidebar.php'); ?>
        </div>

        <div class="col-md-9">
        <div class="wrapper">
        <div class="inner-wrapper3">
            <div class="card">

                <?php if($account):?>
            
                        <?php foreach($account as $user): ?>
                           
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-center">
                                    <h5><span class="oi oi-person"></span> Account name: <?php echo $user['firstname'] .' '.$user['lastname'];?></h5>
                                </li>
                            
                            </ul>
                            <div class="card-body">
                                 <h4 class="card-title text-center text-info"><span class="oi oi-envelope-closed"></span> Send notifications</h4>

                                 <?php echo form_open('send_notifications'); ?>
                                    <div class="form-group" >
                                        <textarea rows="5"  name="notification" class="form-control"></textarea>
                                    </div>  
                                    <div class="form-group">
                                        <input type="hidden" name="user_name" value="<?php echo $user['firstname'] .' '.$user['lastname'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="<?php echo $user['userID']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-block btn-success" value="Send">
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                           
                        <?php endforeach; ?>

                <?php endif; ?>
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