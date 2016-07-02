<!-- START @PAGE CONTENT -->
<section id="page-content">
    <div class="body-content animated fadeIn">
        <div class="row">
             <div class="col-md-12"> 
                <div class="panel rounded shadow">
                    
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Boarders </h3>
                    </div><!-- /.panel-heading -->
                     <div class="panel-body">
                        <div class="col-md-2 pull-right">
                        <a  data-target="#transac-modal" class="btn-block btn btn-warning btn-sm btn-drop btn-line" data-toggle="modal"><i class="glyphicon glyphicon-home "></i>  Room Selection</a>
                        </div>
                    <div class="col-md-2 pull-right">
                        <a data-target="#regi-modal"class="btn-block btn btn-warning btn-sm btn-drop btn-line" data-toggle="modal"><i class="glyphicon glyphicon-user "></i>  Add Boarder</a>
                    </div>


            <div class="panel-body no-padding">
                <div>
                    <div class="btn-group" role="group" aria-label="...">
                      <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/all_rooms');?>">All rooms</a></button>
                      <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/available_rooms');?>">Available rooms</a></button>
                      <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/not_available_rooms');?>">Unavailable rooms</a></button>
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
                                <th>Username</th>
                                <th>Contact info</th>
                                <th>Room number</th>
                                <th>Price</th>
                                <th>Date of Registration</th>
                                <th>Payment Status</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($all_user)){ ?>
                            <?php $format = 'DATE_RFC850';
                            ?>

                            <?php $count = 1; foreach ($all_user as $key): ?>
                            <?php 
                                if ($key->payment_status == 'paid') {
                                    $payment_status = 'Paid Boarder';
                                    }
                                else{
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
                                    <?php echo $key->contact; ?>
                                </td>
                                <td>
                                    <?php echo $key->room_number; ?>
                                </td>
                                <td>
                                    <?php echo "Php: $key->price.00"; ?>
                                </td>
                                <td>
                                    <?php echo date(" \n l jS F Y",strtotime($key->dateofreg));?>
                                </td>
                                <td>
                                    <?php echo $payment_status; ?>
                                </td>

                            <td class="text-center">
                                <a  data-target="#<?php echo $key->id; ?>" class="btn btn-default " data-toggle="modal"><b> <i  data-toggle="tooltip" data-placement="top" title="Activate Account" class="fa fa-money "></i> </b></a> 
                            </td>
                                </tr>
                                    <?php $count++; endforeach ?>
                                    <?php }else{ ?>
                                        <td col="7">No results</td>
                                    <?php } ?>
                        </tbody>
                    </table> 
                </div>
                 <footer class="footer-content" style="text-align:center;">
                    2015 - 2016<span id="copyright-year"></span> &copy; Created by Group 12
                    <span class="pull-right"></span>
            </footer>
           
        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

        <!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
    </div><!-- /#back-top -->
        <!--/ END BACK TOP -->
<div class="modal fade" id="transac-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Room</h4>
            </div>

            <form action="<?php echo base_url('main/savemyroom');?>" method="post">
                <div id="form-input"class="modal-body">
                    <div class="form-group">
                        <label for="roomid" class="control-label">Room number - Price</label>
                        <select required name="roomid" class="form-control">
                            <option value="">--- Select :Room Number | Price ---</option>
                          <?php foreach ($roomlist as $key) :?>
                                <option value="<?php echo $key->roomid;?>">Room <?php echo $key->room_number;?> Price: Php<?php echo $key->price;?></option>
                          <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id" class="control-label">Boarder </label>
                        <select required name="id" class="form-control">
                            <option value="">--- Select :New Users --- </option>
                          <?php foreach ($boarders_list as $key) :?>
                            <option value="<?php echo $key->id;?>"><?php   echo ucwords($key->firstname)." ".ucwords($key->lastname);?></option>
                          <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="message-container"></div>
                    <button type="button" class="btn btn-md btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button name="submit" id="" class="btn btn-md btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


 <?php foreach ($all_user as $key): ?>
        <div class="modal fade" id="<?php echo $key->id; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Update Payment status</h4>
                    </div>
                    <div class="modal-body">
                        <h4>You are about to update the Payment status of <b><?php   echo ucwords($key->firstname)." ".ucwords($key->lastname);?></b>.</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" data-dismiss="modal"> Cancel</a>
                        <a href="<?php echo base_url("main/block_boarder/$key->id");?>" class="btn btn-danger"><span class="glyphicon glyphicon-flag"></span> Block</a>
                        <a href="<?php echo base_url("main/paid_boarder/$key->id");?>" class="btn btn-info"><span class="glyphicon glyphicon-eur"></span> Payed</a>
                        <a href="<?php echo base_url("main/disable_user/$key->id");?>" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Unpaid</a>
 
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <div class="modal fade" id="regi-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form  method="POST" action="<?php echo base_url();?>main/do_reg" name="myform">
                    <div class="table-responsive">
                        <?php if(isset($message)) echo $message; ?>
                        
                            <table id="data-table" class="table table-striped">
                    
                       <tbody>
                           <tr>
                               <td>
                                <h4>Personal Information</h4>
                                 </td>
                            <td></td>
                            </tr>
                            <tr>
                                <td>Firstname:</td>
                                <small><font color='red'><?php echo form_error('firstname'); ?></font></small>
                                    <td><b><font style="color:red;"><input  id="firstname" class="form-control" required type="text" value="<?php echo set_value('firstname');?>" name="firstname" /></font></b></td>
                              
                            </tr>
                            <tr>
                            <td>Last name:</td>
                            <small><font color='red'><?php echo form_error('lastname'); ?></font></small>
                            <td><b><font style="color:red;"><input id="lastname" class="form-control" required type="text" value="<?php echo set_value('lastname');?>" name="lastname" /></font></b></td>
                              
                            </tr>
                            <tr>
                            <td>Username:</td>
                            <small><font color='red'><?php echo form_error('username'); ?></font></small>
                                <td><b><font style="color:red;"><input id="username" class="form-control" required type="text" value="<?php echo set_value('username');?>" name="username" /></font></b></td>
                            
                            </tr>
                            <tr>
                             <td>Gender:</td>
                                  <td><b><label>
                                            <input type="radio" id="gender" name="gender" value="Male" checked="checked">Male
                                        </label>
                                        <label>
                                            <input type="radio" id="gender" name="gender" value="Female">Female
                                        </b></label>
                                    </td>
                                    <tr>   
                                        <td>Contact:</td>
                                <td><b><font style="color:red;"><input id="contact" class="form-control" required type="text" value="<?php echo set_value('contact');?>" name="contact" /></font></b></td>
                                </tr>

                                </td>                                
                            </td>
                        </tr>                               
                    </tbody>
                </table>
            </div>
        </div>
    <div class="modal-footer">
<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
<button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Register</button>
</div>