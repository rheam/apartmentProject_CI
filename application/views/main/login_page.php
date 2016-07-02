

        <!-- START @SIGN WRAPPER --> 
        
         <div class="body-content animated fadeIn">

                <h1 style="color:#eee !important;text-align:center;font-size: 4.2rem;line-height: 110%;margin: 2.1rem 0 1.68rem 0; font-family: monospace;">Apartment Management Tool</h1>
                    <div class="row center"style=" text-align:center;width: 100%;margin-left: auto;left: auto;right: auto;">
                            <h5 style="font-size:20px;color: rgba(246, 187, 66, 0.68); font-family: monospace;">"Stay to the place where you can feel at Home",</h5>
                    </div>
                    <div class="login-page">
                      <div class="form">
                        <?php echo validation_errors(); ?>
                        <?php if(isset($message)) echo $message; ?>
                        <form class="login-form"action="<?php echo base_url('main/login_validation');?>" method="post">
                          <input required type="text" name="username" placeholder="Username"/>
                          <input required type="password" name="password" placeholder="Password"/>
                          <button>login</button>
                          </form>
                      </div>
                    </div>
                </div>
            <footer class="footer-content" style="text-align:center;">
                    2015 - 2016<span id="copyright-year"></span> &copy; Created by Group 12
                    <span class="pull-right"></span>
            </footer>
           
       
        <!-- /#sign-wrapper -->
        
 
