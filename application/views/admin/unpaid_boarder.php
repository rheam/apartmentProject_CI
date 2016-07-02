            <!-- START @PAGE CONTENT -->
<section id="page-content">
    <!-- Start body content -->
    <div class="body-content animated fadeIn">

        <div class="row">
            <div class="col-md-12">

                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">Unpaid Boarders</h3>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        
                        <?php  //var_dump($all_user); ?>
                                     
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
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-middle table-lilac">
                                        <thead>
                                        <tr>
                                            
                                            <th>User Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Room number</th>
                                            <th>Payment Status</th>
                                            <th>Date of Register</th>
                                            <th class="text-center" style="width: 11%;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($blocked_boarder)){ ?>
                                        <?php $count = 1; foreach ($blocked_boarder as $key): ?>
                                        <?php 
                                            if ($key->payment_status == 'blocked') {
                                                $payment_status = 'Blocked Boarder';
                                            
                                            }
                                            
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
                                                <?php echo $key->room_number; ?>
                                            </td>
                                             <td>
                                                 <?php echo $payment_status; ?>
                                             </td>
                                             <td>
                                                <?php echo date(" \n l jS F Y",strtotime($key->dateofreg));?>
                                             </td>
                                             
                                            <td class="text-center">
                                                <a  data-target="#<?php echo $key->id; ?>" class="btn btn-warning" data-toggle="modal"><b> <i  data-toggle="tooltip" data-placement="top" title="Activate Account" class=" fa fa-user-times "></i> </b></a> 
                                            </td>

                                        </tr>
                                        <?php $count++; endforeach ?>
                                        <?php }else{ ?>
                                        <td col="7">No results</td>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.panel-body -->
                            
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->

                </div>
            </div>

        </div>

         <footer class="footer-content" style="text-align:center;">
                    2015 - 2016<span id="copyright-year"></span> &copy; Created by Group 12
                    <span class="pull-right"></span>
            </footer>
           
        
    </section>

            
</section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

        <!-- START @BACK TOP -->
    <div id="back-top" class="animated pulse circle">
        <i class="fa fa-angle-up"></i>
    </div><!-- /#back-top -->
        <!--/ END BACK TOP -->
    <?php foreach ($blocked_boarder as $key): ?>
        <div class="modal fade" id="<?php echo $key->id; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Update payment status.</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Options for <b><?php   echo ucwords($key->firstname)." ".ucwords($key->lastname);?></b></h4>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" data-dismiss="modal">Cancel</a>
                        <a href="<?php echo base_url("main/paid_boarder/$key->id");?>" class="btn btn-info"><span class="glyphicon glyphicon-euro"></span> Pay</a>
                        <a href="<?php echo base_url("main/delete/$key->id");?>" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span> Remove</a>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
