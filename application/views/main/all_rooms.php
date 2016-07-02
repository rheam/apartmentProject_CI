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
            
            
                <div class="panel-body no-padding">
            <div>
                <span>
                    <div class="col-md-2 pull-left">
                    <a class="btn-block btn btn-success btn-sm btn-drop btn-line" href="<?php echo base_url('display/all_rooms');?>">List of all Rooms</a>
                    </div>             
                    <div class="col-md-2 pull-left">
                    <a class="btn-block btn btn-success btn-sm btn-drop btn-line" href="<?php echo base_url('display/available_rooms');?>">Available Rooms</a>
                    </div>
                </span>
                    
                <br>
            </div>

                    <br>
                    <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-middle table-lilac">
                        <thead>
                            <tr>
                                <th><center>#</center></th>
                                <th>Room Number</th>
                                
                                
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
                                <td class="text-center" style="width: 7%;">
                                    <b><?php echo $count; ?></b>
                                </td>
                                <td>
                                    <?php echo $key->room_number; ?>
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
