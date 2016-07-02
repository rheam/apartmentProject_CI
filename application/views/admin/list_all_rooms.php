<!-- START @PAGE CONTENT -->
<section id="page-content">
    <div class="body-content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel rounded shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Rooms</h3>
                    </div><!-- /.panel-heading -->
    <div class="panel-body">

        <div class="col-md-2 pull-right">
                <a  data-target="#room-modal" class="btn-block btn btn-success btn-sm btn-drop btn-line" data-toggle="modal"><i class="glyphicon glyphicon-plus "></i>  Add Rooms</a>
        </div>

    
           
<div class="panel-body no-padding">
    <div>
          <div class="btn-group" role="group" aria-label="...">
              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/all_rooms');?>">All rooms</a></button>
              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/available_rooms');?>">Available rooms</a></button>
              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/not_available_rooms');?>">Unavailable rooms</a></button>
              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/users_page');?>">list of all Boaders</a></button><!-- 
              <button type="button" class="btn btn-default"><a style="text-decoration:none;" href="<?php echo base_url('display/paid_boarder_page');?>">Paid Boarders</a></button>--> 
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
                                <th>Price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($all_rooms)){ ?>
                            <?php $count = 1; foreach ($all_rooms as $key): ?>
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
                                    <?php echo $key->price; ?>
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

<div class="modal fade" id="room-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form  method="POST" action="<?php echo base_url();?>main/addroom" name="form">
                    <div class="table-responsive">
                        <?php if(isset($message)) echo $message; ?>
                            <table id="data-table" class="table table-striped">
                    
                       <tbody>
                           <tr>
                               <td>
                                <h4>Additional room</h4>
                                 </td>
                            <td></td>
                            </tr>
                            <tr>
                                <td>Room number:</td>
                                    <td><b><font style="color:red;"><input id="room_number" class="form-control" required type="text" value="<?php echo set_value('room_number');?>" name="room_number" /></font></b></td>
                             
                            </tr>
                            <tr>
                            <td>Price:</td>
                            <td><b><font style="color:red;"><input id="price" class="form-control" required type="text" value="<?php echo set_value('price');?>" name="price" /></font></b></td>
                             
                            </tr>
                                                         
                        
                        </tr>                               
                    </tbody>
                </table>
            </div>
        </div>
    <div class="modal-footer">
<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
<button type="submit" class="btn btn-sm btn-success">Add</button>
</div>

