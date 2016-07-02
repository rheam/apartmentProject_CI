<!-- START @PAGE CONTENT -->
<section id="page-content">
    <!-- Start body content -->
    <div class="body-content animated fadeIn">

        <div class="row">
            <div class="col-md-12">

                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profile</h3>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">

                        <div class="">
                            <?php foreach ($account as $key): ?>
                            <h2><?php   echo ucwords($key->firstname)." ".ucwords($key->lastname);?></h2>
                            <?php endforeach ?><p>The Administrator</p>
                        </div>
                        <?php if(isset($message)){ echo $message; } ?>
                        <?php foreach ($account as $key){ 
                          $firstname = $key->firstname;
                          $lastname = $key->lastname;
                          $username = $key->username;
                          $id = $key->id;
                          $user_type = $key->user_type;
                          
                        if($this->session->userdata('id') == $id){?>
                             <div class="col-md-1">
                                <a  data-target="#<?php echo $key->id; ?>" class="btn-block btn btn-success btn-sm btn-drop btn-line" data-toggle="modal"><i class="fa fa-edit m-r-5"></i>Update</a>
                            </div>      
                            <?php } ?>
                    <?php ;  ?>

         <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel rounded shadow">
                <div class="panel-body">
                    <div class="inner-all">
            
                    </div>
                </div>
            </div><!-- /.panel -->
        </div>

        <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="profile-cover">
            <div class="cover rounded shadow no-overflow">
                <div class="inner-cover">
                    <!-- Start offcanvas btn group menu: This menu will take position at the top of profile cover (mobile only). -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                            <tr class="success">
                                <td>Firstname</td>
                                <td><?php echo $firstname; ?></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><?php echo $lastname; ?></td>
                            </tr>
                            <tr class="success">
                                <td>Username</td>
                                <td><?php echo $username; ?></td>
                            </tr>
                            <tr>
                                <td>User Type</td>
                                <td><?php echo $user_type; ?></td>
                            </tr>
                            <tr><?php foreach ($income as $incomes): ?>
                                <td>  Income:  </td>
                                <td><?php echo "Php: $incomes->total_income.00"; ?></td>
                                <?php endforeach ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.cover -->
        </div><!-- /.profile-cover -->
        </div>
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->

            </div>
        </div>
            <?php  } ?> <!-- end sa foreach -->
    </div><!-- /.body-content -->
    <!--/ End body content -->

    <!-- Start footer content -->
    <footer class="footer-content">
        2015 - <span id="copyright-year"></span> &copy; Group 12
        <span class="pull-right"></span>
    </footer><!-- /.footer-content -->
    <!--/ End footer content -->

</section><!-- /#page-content -->
<!--/ END PAGE CONTENT -->


</section><!-- /#wrapper -->
<!--/ END WRAPPER -->

<!-- START @BACK TOP -->
<div id="back-top" class="animated pulse circle">
<i class="fa fa-angle-up"></i>
</div><!-- /#back-top -->



<!--/ END BACK TOP -->
<?php foreach ($account as $key): ?>
<div class="modal fade" id="<?php echo $key->id; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Update Account</h4>
</div>
<div class="modal-body">
    <form  method="POST" action="<?php echo base_url();?>main/update_profile" name="form">
        <div class="table-responsive">
            <table id="data-table" class="table table-striped">
                <?php //var_dump($user); ?>
                <tbody>
                    <tr>
                        <td>
                            <h4>Personal Information</h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><b><font style="color:red;"><input id="username" class="form-control" required type="text" value="<?php echo $key->username; ?>" name="username" /></font></b></td>
                    </tr>
                    <tr>
                        <td>First name:</td>
                        <td><b><font style="color:red;"><input id="firstname" class="form-control" required type="text" value="<?php echo ($key->firstname); ?>" name="firstname" /></font></b></td>
                    </tr>
                    <tr>
                        <td>Last name:</td>
                        <td><b><font style="color:red;"><input id="lastname" class="form-control" required type="text" value="<?php echo ($key->lastname); ?>" name="lastname" /></font></b></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><b><font style="color:red;"><input id="password" class="form-control" required type="password" name="password" /></font></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<div class="modal-footer">
<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
<button type="submit" class="btn btn-sm btn-success">Update</button>
</div>
</form>
</div>
</div>
</div>

<?php endforeach ?>
