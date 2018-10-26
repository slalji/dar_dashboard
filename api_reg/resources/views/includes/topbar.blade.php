<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
        
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            
           <div>
           <ul class="profile nav navbar-nav navbar-left ml-auto">
           <li style="margin-left:180px"><h5>Selcom API Registration and Documentation</h5></li> 
           </ul>
           </div>
            <ul class="profile nav navbar-nav navbar-right ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        
                            <!--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>-->
                        @else
                       <li> <button class="btn btn-danger" style="margin-bottom:0px; border:solid white 2px; border-radius:50%">{{ Auth::user()->name[0] }}</button></li>
                        <li><a class="nav-link" href="{{ route('admin') }}">{{ __('Settings') }}</a></li>
                        <li>
                            <a href="changePassword">
                            Change Password
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                        
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                   
                        </li>
                      
                        
                        @endguest
                    </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->