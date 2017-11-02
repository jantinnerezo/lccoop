
        <div class="col-md-9">

            <div class="admin-wrapper">

                <div class="test">
                    
                </div>

                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
                <?php endif;?>

             
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
                <?php endif;?>
               

                 <div class="row">
                            <div class="col-md-4">
                                  <?php if($loans): ?>
                    <h4 class="text-info"><span class="oi oi-bar-chart"></span> Loan Records (<?php echo count($loans);?>)</h4>
                <?php else: ?>
                    <h4 class="text-info"><span class="oi oi-bar-chart"></span> Loan Records (0)</h4>
                <?php endif;?>
                            </div>

                             <div class="col-md-4">
                                
                            </div>

                             <div class="col-md-4 text-right">
                                <div class="form-group">
                                    <a href="<?php echo base_url();?>admin/loans/print_view" class="btn btn-info"><span class="oi oi-eye"></span> Print view</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    
                    <?php if($loans):?>
                    <div class="table-responsive">
                            <table class="table"  id="table">
                                <thead>
                                    <th>Account #</th>
                                    <th>Name</th>
                                    <th class="text-right">Amount</th>
                                    <th>Loan Type</th>
                                    <th>Term</th>
                                    <th class="text-right">Per Month</th>
                                    <th>Purpose</th>
                                    <th>Date Applied</th>
                                    <th class="text-center">Options</th>
                                </thead>
                                <tbody>
                               
                                    <?php foreach($loans as $loan): ?>
                                        <tr>
                                            <td><?php echo $loan['userID'];?></td>
                                            <td><?php echo $loan['firstname'] .' '.$loan['lastname'];?></td>
                                            <td class="text-right"><?php echo '&#8369; ' . number_format($loan['total'], 2, '.', ',');?></td>
                                            <?php if($loan['loan_type'] == 1): ?>
                                                <td>Regular</td>
                                            <?php else: ?>
                                                <td>Petty Cash</td>
                                            <?php endif;?>
                                            <td><?php echo $loan['term'];?> months</td>
                                            <td class="text-right"><?php echo '&#8369; ' . number_format($loan['amount'], 2, '.', ',');?></td>
                                            <td class="purpose"><?php echo $loan['purpose'];?></td>
                                            <td><?php echo Date('M j, Y',strtotime($loan['date_applied']));?></td>
                                            <td>
                                                <a href="<?php echo base_url();?>loans/loan_records/<?php echo $loan['loan_id'];?>/<?php echo $loan['userID'];?>" class="btn btn-block btn-success">View</a>
                                            </td>
                                              
                                            </tr>
                                    <?php endforeach; ?>
                                    
                                
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                             <div class="alert alert-warning text-center">
                                No loan records found
                            </div>
                    <?php endif;?>

                       
                    </div>
                </div>
           
    </div>


</div>



<script>
    $(document).ready(function(){
       /* $('#table').DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false
        });*/

          $('.grant').click(function(){

                var loan_id  = $(this).data('loan');
                var account_no  = $(this).data('no');
                var account_name  = $(this).data('name');
                var amount  = $(this).data('amount');
                var format  = $(this).data('format');
                var purpose  = $(this).data('purpose');
                var term  = $(this).data('term');
                var applied  = $(this).data('applied');

                $(".modal-body #loan_id").val(loan_id);
                $(".modal-body #user_id").val(account_no);
                $(".modal-body #user_name").val(account_name);
                $(".modal-body #term").val(term);
                $(".modal-body #amount").val(amount);
                $(".modal-body #applied").val(applied);
                $(".modal-body #account_no").text('Account No.: ' +account_no );
                $(".modal-body #account_name").text('Name: ' +account_name );
                $(".modal-body #format").text('Amount Applied: ' +format );
                $(".modal-body #purpose").text('Purpose: ' +purpose );
                $(".modal-body #termlabel").text('Loan Term: ' +term+' months' );
   
         });


          var opts = {
                  lines: 11 // The number of lines to draw
                , length: 30 // The length of each line
                , width: 9 // The line thickness
                , radius: 47 // The radius of the inner circle
                , scale: 1 // Scales overall size of the spinner
                , corners: 1 // Corner roundness (0..1)
                , color: '#000' // #rgb or #rrggbb or array of colors
                , opacity: 0.25 // Opacity of the lines
                , rotate: 0 // The rotation offset
                , direction: 1 // 1: clockwise, -1: counterclockwise
                , speed: 1 // Rounds per second
                , trail: 60 // Afterglow percentage
                , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
                , zIndex: 2e9 // The z-index (defaults to 2000000000)
                , className: 'spinner' // The CSS class to assign to the spinner
                , top: '50%' // Top position relative to parent
                , left: '50%' // Left position relative to parent
                , shadow: false // Whether to render a shadow
                , hwaccel: false // Whether to use hardware acceleration
                , position: 'absolute' // Element positioning
                }

            var target = document.getElementById('test')
            var spinner = new Spinner(opts).spin(target);
    });
</script>


