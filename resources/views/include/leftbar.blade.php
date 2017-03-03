 <!-- Main Sidebar -->
 <div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="index.html" class="sidebar-brand">
            </i><span class="sidebar-nav-mini-hide"><img src="{{asset('img/logo.png')}}" width="150"></span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="page_ready_user_profile.html">
                        <img src="{{asset('vendor/img/placeholders/avatars/avatar2.jpg')}}" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name">John Doe</div>
                <div class="sidebar-user-links">
                    <a href="page_ready_user_profile.html" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                    <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                    <a href="login.html" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->

            <ul class="sidebar-nav">
                <!-- MENU SATKER ,DKIN,DSMS  -->
                <li class="sidebar-header">
                    <span class="sidebar-header-options clearfix">
                        <i class="gi gi-user"></i></span>
                        <span class="sidebar-header-title"><b>Satker</b></span>
                    </li>
                    <li class="@if(Request::is('/')) active @endif">
                        <a href="{{url('/')}}"><i class="gi gi-home sidebar-nav-icon"></i> Home</a>
                    </li>
                    <li class="@if(Request::is('nilai-self-assessment')) active @endif">
                        <a href="{{url('nilai-self-assessment')}}"><i class="gi gi-notes sidebar-nav-icon"></i> Nilai Assessment</a>
                    </li>
                    <li class="@if(Request::is('lembar-self-assessment') || Request::is('arsip/assessment')) active @endif">
                        <a href="{{url('lembar-self-assessment')}}"><i class="gi gi-sort sidebar-nav-icon"></i> Lembar Assessment</a>
                    </li>
                    <li class="@if(Request::is('inovatif') || Request::is('arsip/inovatif')) active @endif">
                        <a href="{{url('inovatif')}}"><i class="gi gi-tags sidebar-nav-icon"></i> OJK Inovatif</a>
                    </li>
                    <li class="@if(Request::is('monitoring-anggaran')) active @endif">
                        <a href="{{url('monitoring-anggaran')}}"><i class="gi gi-imac sidebar-nav-icon"></i> Monitoring Anggaran</a>
                    </li>
                    <li class="@if(Request::is('manual-pengguna-satker')) active @endif">
                        <a href="{{url('manual-pengguna-satker')}}">
                            <i class="gi gi-book sidebar-nav-icon"></i> Manual Pengguna</a>
                        </li>
                        <li class="@if(Request::is('kontak')) active @endif">
                            <a href="{{url('kontak')}}"><i class="gi gi-circle_info sidebar-nav-icon"></i> Kontak</a>
                        </li>
                        <!-- TUTUP MENU SATKER ,DKIN,DSMS  -->
                        <!-- MENU ADMIN -->
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix">
                                <i class="gi gi-user"></i></span>
                                <span class="sidebar-header-title"><b>Admin</b></span>
                            </li>
                            <li class="@if(Request::is('user')) active @endif">
                                <a href="{{url('user')}}">
                                    <i class="gi gi-user sidebar-nav-icon"></i> Semua User
                                </a>
                            </li>
                            <li class="@if(Request::is('map-report')) active @endif">
                                <a href="{{url('map-report')}}">
                                    <i class="gi gi-google_maps sidebar-nav-icon"></i> Mapping Report
                                </a>
                            </li>
                            <li class="@if(Request::is('upload')) active @endif">
                                <a href="#" class="sidebar-nav-menu">
                                    <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                    <i class="gi gi-upload sidebar-nav-icon"></i> Upload
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{url('upload/satker')}}">
                                            <i class="gi gi-group sidebar-nav-icon"></i> 
                                            Manual Pengguna Satker
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('upload/dmpb')}}">
                                            <i class="gi gi-group sidebar-nav-icon"></i> 
                                            Manual Pengguna DMPB
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="gi gi-notes sidebar-nav-icon"></i> 
                                            Catatan Dinas
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="@if(Request::is('survey')) active @endif">
                                <a href="{{url('survey')}}">
                                    <i class="gi gi-notes sidebar-nav-icon"></i> Rekap Survey
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu">
                                    <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                    <i class="gi gi-shield sidebar-nav-icon"></i>
                                    <span class="sidebar-nav-mini-hide">Parameter User</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{url('deputi-komisioner')}}">
                                            <i class="gi gi-group sidebar-nav-icon"></i> 
                                            Deputi Komisioner
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('departemen')}}">
                                            <i class="gi gi-group sidebar-nav-icon"></i> 
                                            Departemen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('direktorat')}}">
                                            <i class="gi gi-group sidebar-nav-icon"></i> 
                                            Direktorat
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="@if(Request::is('program')) active @endif">
                                <a href="{{url('admin/pengaturan')}}">
                                    <i class="gi gi-tags sidebar-nav-icon"></i> Parameter Program
                                </a>
                            </li>
                            <!-- TUTUP MENU ADMIN -->
                            <!-- MENU REVIEWER -->
                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix">
                                    <i class="gi gi-user"></i></span>
                                    <span class="sidebar-header-title"><b>Reviewer</b></span>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu">
                                        <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                        <i class="gi gi-sort sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Self Assassment</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{url('rekap-assessment')}}">
                                                <i class="gi gi-notes sidebar-nav-icon"></i> 
                                                Rekap Self Assassment
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('hasil-assessment')}}">
                                                <i class="gi gi-notes sidebar-nav-icon"></i> 
                                                Hasil Self Assassment
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('rekap-budaya')}}">
                                                <i class="gi gi-notes sidebar-nav-icon"></i> 
                                                Rekap Budaya Spesifik
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu">
                                        <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                        <i class="gi gi-imac sidebar-nav-icon"></i>
                                        <span class="sidebar-nav-mini-hide">Monitoring</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{url('rekap-monitoring')}}">
                                                <i class="gi gi-notes sidebar-nav-icon"></i> 
                                                Rekap Monitoring
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('hasil-monitoring')}}">
                                                <i class="gi gi-notes sidebar-nav-icon"></i> 
                                                Hasil Monitoring
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="@if(Request::is('')) active @endif">
                                    <a href="{{url('')}}">
                                        <i class="fa fa-line-chart sidebar-nav-icon"></i> 
                                        Grafik Budaya Satker
                                    </a>
                                </li>
                                <li class="@if(Request::is('')) active @endif">
                                    <a href="{{url('')}}">
                                        <i class="fa fa-trophy sidebar-nav-icon"></i> 
                                        Launching Budaya
                                    </a>
                                </li>
                                <li class="@if(Request::is('anggaran-budaya')) active @endif">
                                    <a href="{{url('anggaran-budaya')}}">
                                        <i class="fa fa-money sidebar-nav-icon"></i> 
                                        Anggaran Budaya
                                    </a>
                                </li>
                                <li class="@if(Request::is('manual-pengguna-reviewer')) active @endif">
                                    <a href="{{url('manual-pengguna-reviewer')}}">
                                        <i class="fa fa-book sidebar-nav-icon"></i> 
                                        Manual Pengguna
                                    </a>
                                </li>
                                <!-- TUTUP MENU REVIEWER -->
                            </ul>
                            <!-- END Sidebar Navigation -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
    <!-- END Main Sidebar -->