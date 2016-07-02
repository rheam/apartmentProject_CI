START @PAGE CONTENT -->
<section id="page-content">
    <div class="body-content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">Available Rooms</h3>
                    </div><!-- /.panel-heading -->
    <div class="panel-body">
            
            
   <div class="panel-body no-padding">
       <div>
            <div class="btn-group" role="group" aria-label="...">
                  <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/all_rooms');?>">All rooms</a></button>
                  <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/available_rooms');?>">Available rooms</a></button>
                  <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/not_available_rooms');?>">Unavailable Rooms</a></button>
                  <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/users_page');?>">list of all Boaders</a></button>
                 <!--  <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/paid_boarder_page');?>">Paid Boarders</a></button>-->
                  <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/unpaid_boarder_page');?>">Blocked Boarders</a></button>           
            </div>
        </div>
    </div>
            <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-middle table-lilac">
                        <thead>
                            <tr>
                                
                                <th>Room Number</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($available_rooms)){ ?>
                            <?php $count = 1; foreach ($available_rooms as $key): ?>
                            <?php //var_dump($key->status);
                                if ($key->rooms_status == 'available') {
                                    $rooms_status = 'Available';
                                }
                                else
                                {
                                    $rooms_status = 'Occupied';
                                    }
                                    
                            ?>
                            <tr class="border-warning">
                                
                                <td>
                                    <?php echo $key->room_number; ?>
                                </td>
                                <td>
                                    <?php echo 'Available'; ?>
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

                <?php foreach ($available_rooms as $key): ?>
                        <div class="modal fade" id="<?php echo $key->roomid; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">You are about to update Room status:</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Reserve room<b><?php   echo ($key->room_number);?></b>?</h4>
                                    </div>
                                    <div class="modal-footer">
                                         <a href="javascript:;" style="background-color:red;"class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-"> No</span></a>
                                        <a href="<?php echo base_url("main/do_reserve/$key->roomid");?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>


