                    <header class="navbar navbar-default">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->                        
                            
                            <!-- END Template Options -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{asset('vendor/img/placeholders/avatars/avatar2.jpg')}}" alt="avatar"> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                  <li>
                                            <a href="{{url('setting')}}"><i class="fa fa-cog fa-fw pull-right"></i> Pengaturan</a>
                                    </li>  <li>
                                            <a href="{{url('logout')}}" id="logout"><i class="fa fa-sign-out fa-fw pull-right"></i> Logout</a>
                                            {{-- <button type="submit"><i class="fa fa-ban fa-fw pull-right"></i> Logout</button> --}}
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;">
                        {{csrf_field()}}
                    </form>

                    <!-- END Header -->