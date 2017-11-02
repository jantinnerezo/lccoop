

  <div class="container">

            <div class="admin-wrapper">

                        <!-- Withdraw -->
                        <?php if($this->session->flashdata('insufficient')): ?>
                            <div class="alert alert-warning"><?php echo $this->session->flashdata('insufficient');?></div>
                        <?php endif;?>
                        <?php if($this->session->flashdata('withdrawed')): ?>
                            <div class="alert alert-success"><?php echo $this->session->flashdata('withdrawed');?></div>
                        <?php endif;?>
                        <?php if($this->session->flashdata('over')): ?>
                            <div class="alert alert-warning"><?php echo $this->session->flashdata('over');?></div>
                        <?php endif;?>

                        <!-- Deposit -->
                        <?php if($this->session->flashdata('deposited')): ?>
                            <div class="alert alert-success"><?php echo $this->session->flashdata('deposited');?></div>
                        <?php endif;?>

                       
                        <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
                        <?php endif;?>

                     
                        <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
                        <?php endif;?>

                     
                        <div class="form-group">
                             <a class="btn btn-info" href="<?php echo base_url();?>admin"><span class="oi oi-arrow-thick-left"></span> Back</a>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                   <?php if($members): ?>
                                 <h4 class="text-info"><span class="oi oi-people"></span> Members (<?php echo count($members); ?>)</h4> 
                                 <?php else: ?>
                                         <h4 class="text-info"><span class="oi oi-people"></span> Members (0)</h4>
                                <?php endif;?>
                            </div>

                             <div class="col-md-4">
                                
                            </div>

                             <div class="col-md-4 text-right">
                                <div class="form-group">
                                    <button id="print" class="btn btn-info"><span class="oi oi-print"></span> Print</button>
                                </div>
                            </div>
                        </div>

                       <hr>
                    <?php if($members):?>
                    <div class="table-responsive">
                            <table class="table"  id="table">
                                <thead>
                                    <th><span class="oi oi-key"></span> Account #</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Department</th>
                                    <th class="text-right">Balance</th>
                                    <th class="text-center">Status</th>
                            
                                </thead>
                                <tbody>
                                
                                    <?php foreach($members as $member): ?>
                                        <tr>
                                        <td><?php echo $member['userID'];?></td>
                                        <td><?php echo $member['firstname'];?> <?php echo $member['lastname'];?></td>
                                        <td><?php echo $member['email'];?></td>
                                        <td><?php echo $member['description'];?></td>
                                        <?php $birth = Date('M d, Y',strtotime($member['birth_date']));?>
                                        <?php $balance = '&#8369; ' . number_format($member['balance'], 2, '.', ','); ?>
                                        <td class="text-right"><?php echo $balance;?></td>
                                            <?php if($member['approved'] == 1): ?>
                                                <td class="bg-success text-light text-center">Approved</td>
                                            <?php else: ?>
                                                <td class="bg-danger text-light text-center">Unapproved</td>
                                            <?php endif; ?>

                                          
                                   
                                       
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                            <div class="alert alert-warning">
                                No data found
                            </div>
                    <?php endif;?>

                    <h5>Printed by: <?php echo $this->session->userdata('name');?></h5>
                    </div>
                </div>
           
    </div>


    <!-- Deposit modal -->
    <div class="modal fade" id="depositDialog" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-account-login"></span> Transaction: Deposit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
                <?php echo form_open('deposit'); ?>
                  <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="balance" id="balance">
                    <input type="hidden" name="user_name" id="user_name">
                        <div class="form-group">
                            <label id="account_no"></label>
                        </div>
                         <div class="form-group">
                            <label id="account_name"></label>
                        </div>
                         <div class="form-group">
                            <label id="current"></label>
                        </div>
                        <div class="form-group">
                            <label>Deposit amount:</label>
                            <input type="number" name="amount" class="form-control" required placeholder="Enter an amount to deposit">
                        </div>

                         <div class="form-group">
                            <label>Admin password:</label>
                            <input type="password" name="password" class="form-control" required placeholder="Enter your valid password (For security)">
                        </div>
                   </div>

                  <div class="modal-footer">
                      <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><span class="oi oi-account-login"></span> Deposit</button>
                  </div>
                <?php echo form_close();?>
             
        </div>
      </div>
    </div>



     <!-- Withdrawal modal -->
    <div class="modal fade" id="withdrawDialog" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-account-login"></span> Transaction: Withdrawal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
                <?php echo form_open('withdrawal'); ?>
                  <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="balance" id="balance">
                    <input type="hidden" name="user_name" id="user_name">
                        <div class="form-group">
                            <label id="account_no"></label>
                        </div>
                         <div class="form-group">
                            <label id="account_name"></label>
                        </div>
                         <div class="form-group">
                            <label id="current"></label>
                        </div>
                        <div class="form-group">
                            <label>Withdraw amount:</label>
                            <input type="number" name="amount" class="form-control" placeholder="Enter an amount to withdraw">
                        </div>
                        <div class="form-group">
                            <label>Admin password:</label>
                            <input type="password" name="password" class="form-control" required placeholder="Enter your valid password (For security)">
                        </div>
                   </div>

                  <div class="modal-footer">
                      <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><span class="oi oi-account-logout"></span> Withdraw</button>
                  </div>
                <?php echo form_close();?>
             
        </div>
      </div>
    </div>



      <!-- Account modal -->
    <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-person"></span> Account Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
               
                  <div class="modal-body">

                     <div class="list-group">
                          <li class="list-group-item" id="account_no"></li>
                          <li class="list-group-item" id="lastname"></li>
                          <li class="list-group-item" id="firstname"></li>
                          <li class="list-group-item" id="middlename"></li>
                          <li class="list-group-item" id="age"></li>
                          <li class="list-group-item" id="gender"></li>
                          <li class="list-group-item" id="birth"></li>
                          <li class="list-group-item" id="marital"></li>
                          <li class="list-group-item" id="citizenship"></li>
                          <li class="list-group-item" id="address"></li>
                          <li class="list-group-item" id="city"></li>
                          <li class="list-group-item" id="zipcode"></li>
                     </div>
            
             
                   </div>

                  <div class="modal-footer">
                      <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
             
        </div>
      </div>
    </div>


      <!-- Notify modal -->
    <div class="modal fade" id="messageDialog" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span class="oi oi-envelope-closed"></span> Send Notification</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
                <?php echo form_open('send_notifications'); ?>
                  <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="balance" id="balance">
                    <input type="hidden" name="user_name" id="user_name">
                        <div class="form-group">
                            <label id="account_no"></label>
                        </div>
                         <div class="form-group">
                            <label id="account_name"></label>
                        </div>
                        <div class="form-group" >
                            <label>Message:</label>
                            <textarea rows="5"  name="notification" class="form-control"></textarea>
                        </div>  
                   </div>

                  <div class="modal-footer">
                      <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><span class="oi oi-account-logout"></span> Send</button>
                  </div>
             <?php echo form_close();?>
             
        </div>
      </div>
    </div>


 
</div> <!-- End parent -->


<script>
    $(document).ready(function(){

        /*$('#table').DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false
        });*/


         $('.deposit').click(function(){

                var account_no  = $(this).data('no');
                var account_name  = $(this).data('name');
                var balance  = $(this).data('balance');
                var bal  = $(this).data('bal');
                $(".modal-body #user_id").val(account_no);
                $(".modal-body #balance").val(bal);
                $(".modal-body #user_name").val(account_name);
                $(".modal-body #account_no").text('Account No.: ' +account_no );
                $(".modal-body #account_name").text('Name: ' +account_name );
                $(".modal-body #current").text('Current balance: '+balance);
         });


          $('.withdraw').click(function(){

                var account_no  = $(this).data('no');
                var account_name  = $(this).data('name');
                var balance  = $(this).data('balance');
                var bal  = $(this).data('bal');
                $(".modal-body #user_id").val(account_no);
                $(".modal-body #balance").val(bal);
                $(".modal-body #user_name").val(account_name);
                $(".modal-body #account_no").text('Account No.: ' +account_no );
                $(".modal-body #account_name").text('Name: ' +account_name );
                $(".modal-body #current").text('Current balance: '+balance);
         });


           $('.account').click(function(){

                var account_no  = $(this).data('no');
                var lastname  = $(this).data('lastname');
                var firstname  = $(this).data('firstname');
                var middlename  = $(this).data('middlename');
                var gender  = $(this).data('gender');
                var age  = $(this).data('age');
                var birth  = $(this).data('birth');
                var marital  = $(this).data('marital');
                var citizenship  = $(this).data('citizenship');
                var address  = $(this).data('address');
                var city  = $(this).data('city');
                var zipcode  = $(this).data('zipcode');
                
                $(".modal-body #account_no").text('Account No.: ' +account_no );
                $(".modal-body #lastname").text('Last Name: ' +lastname );
                $(".modal-body #firstname").text('First Name: ' +firstname );
                $(".modal-body #middlename").text('Middle Name: '+middlename);
                $(".modal-body #gender").text('Gender: '+gender);
                $(".modal-body #age").text('Age: '+age);
                $(".modal-body #birth").text('Birth date: '+birth);
                $(".modal-body #marital").text('Marital Status: '+marital);
                $(".modal-body #citizenship").text('Citizenship: '+citizenship);
                $(".modal-body #address").text('Home Address: '+address);
                $(".modal-body #city").text('City: '+city);
                $(".modal-body #zipcode").text('Zipcode: '+zipcode);
         });


            $('.notify').click(function(){

                var account_no  = $(this).data('no');
                var account_name  = $(this).data('name');

                $(".modal-body #user_id").val(account_no);
                $(".modal-body #user_name").val(account_name);
                $(".modal-body #account_no").text('Account No.: ' +account_no );
                $(".modal-body #account_name").text('Name: ' +account_name );
         });

             $('#print').click(function(){
        window.print();
    });

        

        
    });
</script>