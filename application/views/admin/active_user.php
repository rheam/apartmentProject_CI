            
<section id="page-content">
        
    <div class="body-content animated fadeIn">

         <div class="row">
                <div class="col-md-12">

                    <div class="panel rounded shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">Paid Boarders</h3>
                        </div>
                        <div class="panel-body">
                        
                         
                           <div class="panel-body no-padding">
                                <div>
                                  <div class="btn-group" role="group" aria-label="...">
                                          <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/all_rooms');?>">All rooms</a></button>
                                          <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/available_rooms');?>">Available rooms</a></button>
                                          <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/not_available_rooms');?>">Unavailable Rooms</a></button>
                                          <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/users_page');?>">list of all Boaders</a></button>
                                          <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/unpaid_boarder_page');?>">Blocked Boarders</a></button>           
                                    </div>
                                </div>
                            </div>
                        <br>              <!----data tables---->
                                        
                    <div class="table-responsive">
                        <table class="table table-bordered table-middle table-lilac">
                            <thead>
                            <tr>
                                
                                <th>User Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>User Type</th>
                                <th>Payment Status</th>
                                <th>Date of Registration</th>
                                <th class="text-center" style="width: 11%;">Update Payment(Unpaid)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($paid_boarder)){ ?>
                            <?php $count = 1; foreach ($paid_boarder as $key): ?>
                            <?php //var_dump($key->status);
                                if ($key->payment_status == 'paid') {
                                    $payment_status = 'Paid Boarder';
                                }else{
                                    $payment_status = 'Unpaid Boarder';
                                }
                                //var_dump($status);
                             ?>
                            <tr class="border-warning">
                              
                                <td>
                                    <?php echo $key->id; ?>
                                </td>
                                <td>
                                    <?php echo $key->firstname; ?>
                                </td>
                                <td>
                                    <?php echo $key->lastname; ?>
                                </td>
                                <td>
                                    <?php echo $key->username; ?>
                                </td>
                                <td>
                                    <?php echo $key->user_type; ?>     
                                 </td>
                                 <td>
                                     <?php echo $payment_status; ?>
                                 </td>
                                 <td>
                                    <?php echo date(" \n l jS F Y",strtotime($key->dateofreg));?>
                                 </td>
                                <td class="text-center">
                                    <a  data-target="#<?php echo $key->id; ?>" class="btn btn-danger btn-xs " data-toggle="modal"><b> <i  data-toggle="tooltip" data-placement="top" title="Deactivate Account" class="fa fa-times animated "></i> </b></a> 
                               </td>
                            </tr>
                            <?php $count++; endforeach ?>
                            <?php }else{ ?>
                            <tr rowspan="7">
                                <td>No results</td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                                                    <!--end of datatables-->                  </div>
            </div>
        </div>

    </div>
</div>

</div>

                
                <footer class="footer-content">
                    
                </footer>

        </section>
            
</section>




        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div>
                        <?php foreach ($paid_boarder as $key): ?>
                        <div class="modal fade" id="<?php echo $key->id; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">You are going to update payment status:</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4> Are you sure to <b><?php   echo ucwords($key->firstname." ".$key->lastname);?></b> is not yet payed ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <a href="javascript:;" style="background-color:red;"class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-"> No</span></a>
                                        <a href="<?php echo base_url("main/disable_user/$key->id");?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>