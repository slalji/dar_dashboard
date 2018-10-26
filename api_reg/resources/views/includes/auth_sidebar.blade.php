<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0; background:#fff">
              <a href="index.php" class="site_title" ><img src="images/{{ env('LOGO') }}" alt="Selcom"> <!--<span style="color:#2A3F54">Selcom</span>--></a>
            </div>

            <div class="clearfix"></div>
       
         
        
        <!-- menu profile quick info -->
        <div class="profile">
        
            <div class="profile_pic">
            
                <img src="images/{{ env('FAVICON') }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Selcom API</span>
            </div>
        </div>
        <!-- /menu profile quick info-->
        <div class="clearfix"></div>
        <br>
          
        
        <!-- sidebar menu -->
        <div  id="sidebar-menu"  class="main_menu_side xhidden-print xmain_menu">
            
           <!-- <div class="menu_section">
                <h3>Utilities</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Builder <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="index.php?page=bundlebuilder"><i class="fa fa-wrench"></i> Bundle Menu <span class="fa fa-chevron-right"></span></a>
                </ul>
                    </li>
                   
                 
                    <!--<li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-laptop"></i>
                            One link
                            <span class="label label-success pull-right">Flag</span>
                        </a>
                    </li>
                    -->
                </ul>
            </div>
            <!--<div class="menu_section">
                <h3>Group 2</h3>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="#">Level One</a>
                                <li>
                                    <a>Level One<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu">
                                            <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                            <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                            <a href="#">Level Two</a>
                                        </li>
                                    </ul>
                                </li>
                            <li>
                                <a href="#">Level One</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>-->
        
        </div>
        <!-- /sidebar menu -->
        
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href='auth/logout'">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>