<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
       
        
       <!-- /menu profile quick info -->
        <div class="clearfix"></div>
        <br>
         
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="images/{{ env('FAVICON') }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome, <b>{{ Auth::user()->name }}</b></span>
            </div>
        </div>
        <!-- /menu profile quick info-->
        <div class="clearfix"></div>
        <br>
          
        
        <!-- sidebar menu -->
        <div  id="sidebar-menu"  class="main_menu_side xhidden-print xmain_menu">
            <div class="menu_section">
                
                <ul class="nav side-menu">
                     <li><a href="{{ url('/home') }}"><i class="fa fa-key"></i> API Keys <span class="fa fa-chevron-right"></span></a>
                       
                    </li>
                    <li><a href="{{ url('/documentation') }}"><i class="fa fa-file"></i> Documentation <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav xchild_menu">
                        @if( ! empty ($docs))
                            @foreach ($docs as $doc)
                            <li class="{{ Request::path() == '/documentation' ? 'open active' : '' }}" ><a href="{{ url('/documentation/'.$doc->title) }}">{{$doc->title}}</a></li>
                            @endforeach
                        @endif     
                            
                        </ul> 
                    </li>
                   <!-- <li><a><i class="fa fa-bar-chart-o"></i> Comparison Report <span class="fa fa-chevron-down"></span></a>                  
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=transactions">Datewise</a></li>
                      <li><a href="index.php?page=comparisons">Individual Utils</a></li>
                      <li><a href="index.php?page=comparisons_one">Combined Utils</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-university"></i> Vendors <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">                      
                      <li><a href="index.php?page=vendors">Combined Vendors</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-dollar"></i> Commissions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">                      
                      <li><a href="index.php?page=vendors">Utilities</a></li>
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