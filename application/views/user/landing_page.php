            <!-- START @PAGE CONTENT -->
            <section id="page-content">
                <!-- Start body content -->
                <div class="body-content animated fadeIn">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel rounded shadow">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Home</h3>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body">
                                  <!--   <div class="col-md-2 pull-right">
                        <a  data-target="#regi-modal" class="btn-block btn btn-success btn-sm btn-drop btn-line" data-toggle="modal"><i class="glyphicon glyphicon-plus "></i>Choose Room</a>
                            </div> -->
                            <h1>Welcome<?php foreach ($account as $key): ?>
                            <?php   echo ucwords($key->firstname)." ".ucwords($key->lastname);?> !!</hi>
                            <?php endforeach ?>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Start footer content -->
                <footer class="footer-content">
                    2015 - <span id="copyright-year"></span> &copy; G12. Created by Group 12
                    <span class="pull-right"></span>
                </footer>

        </section>

            
</section>
        
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div><!-- /#back-top -->
        <!--/ END BACK TOP -->
<!-- <div class="modal fade" id="regi-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Room</h4>
            </div>

            <form action="<?php echo base_url('main/savemyroom');?>" method="post">
                <div id="form-input"class="modal-body">
                    <div class="form-group">
                        <label for="roomid" class="control-label">Room number - Price</label>
                        <select name="roomid" class="form-control">
                          <?php foreach ($roomlist as $key) :?>
                            <option value="<?php echo $key->roomid;?>">Room <?php echo $key->room_number;?> Price: Php<?php echo $key->price;?></option>
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
 -->
