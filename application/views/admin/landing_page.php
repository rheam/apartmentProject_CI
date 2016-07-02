<!-- START @PAGE CONTENT -->
<section id="page-content">
<!-- Start body content -->
<div class="body-content animated fadeIn">

    <div class="row">
        <div class="col-md-12">

            <div class="panel rounded shadow">
            <div class="panel-heading">
                <h3 class="panel-title">Dashboard</h3>
            </div>

            <!-- /.panel-heading -->
                <div class="panel-body">

                <div class="col-md-2 pull-right">
                        <a data-target="#regi-modal"class="btn-block btn btn-success btn-sm btn-drop btn-line" data-toggle="modal"><i class="glyphicon glyphicon-plus "></i>  Add Boarder</a>
                </div>

                 

                    <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/all_rooms');?>">All rooms</a></button>
                              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/available_rooms');?>">Available rooms</a></button>
                              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/not_available_rooms');?>">Unavailable Rooms</a></button>
                              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/users_page');?>">list of all Boaders</a></button>
                             <!--  <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/paid_boarder_page');?>">Paid Boarders</a></button>--> 
                              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/unpaid_boarder_page');?>">Blocked Boarders</a></button>          
                        </div>
                    </div>
                    
                </div><!-- /.panel-body -->
                <br>
            </div><!-- /.panel -->
        </div>
    </div>     






                <footer class="footer-content">
                    2015 - <span id="copyright-year"></span> &copy;  Created by Group 12
                    <span class="pull-right"></span>
                </footer>

            </section
            
</section>
<!-- START @BACK TOP -->
<div id="back-top" class="animated pulse circle">
    <i class="fa fa-angle-up"></i>
</div>



<!--/register modal -->


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
                                    <td><b><font style="color:red;"><input  id="firstname" class="form-control" required type="text" value="<?php echo set_value('firstname');?>" name="firstname" aria-describedby="name-format" aria-required=”true” pattern="[A-Za-z-0-9]+"  title="firstname" /></font></b></td>
                              
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
                                <td><b><font style="color:red;"><input min="9" max="9" id="contact" class="form-control" required type="number" value="<?php echo set_value('contact');?>" name="contact" /></font></b></td>
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
<button type="submit" class="btn btn-sm btn-success">Register</button>
</div>

    



