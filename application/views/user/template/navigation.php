

            <header id="header">                        
                <ul id="cbp-tm-menu" class="cbp-tm-menu">
                    <?php foreach ($account as $key): ?>

                    <li style="float:left;line-height: 4em;padding: 0 0.3em;font-size: 1.2em;display: block;color: #fff;text-decoration: none;">
                        <ul style="text-decoration: none;">
                            <a href="<?php echo base_url('display/landing_page');?>" style="text-decoration: none;">
                                <img src="<?php echo base_url('assets/img/house.png');?>"></a>   
                                <h10>Welcome!</h10> 
                                <t><?php   echo ucwords($key->firstname)." ".ucwords($key->lastname);?></t> 
                                 <a href="<?php echo base_url('main/logout');?>"> sign-out</a></ul></li>
                                    <?php endforeach ?>                    
                                    <li>
                        <a href="#">Menu</a>
                        <ul class="cbp-tm-submenu">
                            <li><a href="<?php echo base_url('display/profile_page');?>">My Profile</a></li>
                            <li><a href="<?php echo base_url('main/logout');?>">Logout</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </header>
