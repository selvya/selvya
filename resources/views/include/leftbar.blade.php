<style>
    a:hover{
        text-decoration: none;
    }

    .social [class*="fa fa-twitter"] {
        background-color: #46c0fb; 
        color:#fff;
        border-radius: 100px;    
        display: inline-block;
        width:90px;
        height:90px;
    }
    .social [class*="fa fa-facebook"] {
        background-color: #21618c; 
        color:#fff;
        border-radius: 100%;    
        display: inline-block;
        width:90px;
        height:90px;    
    }
    .social [class*="fa fa-youtube"] {
        background-color: #e74c3c; 
        color:#fff;
        border-radius: 100px;    
        display: inline-block;
        width:90px;
        height:90px;
    }
    .social [class*="fa fa-instagram"] {
        background-color:  #895a4d ; 
        color:#fff;
        border-radius: 100px;    
        display: inline-block;
        width:90px;
        height:90px;
    }
</style>
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
            <div class="sidebar-user-name">{{Auth::user()->username}}</div>
        </div>
        <!-- END User Info -->

        <!-- Sidebar Navigation -->

        <ul class="sidebar-nav">
            <!-- MENU SATKER ,DKIN,DSMS  -->
            @if(Auth::check() AND Auth::user()->level == 'satker')
            <li class="sidebar-header">
                <span class="sidebar-header-options clearfix">
                    <i class="gi gi-user"></i></span>
                    <span class="sidebar-header-title"><b>Satker</b></span>
                </li>
                <li class="@if(Request::is('home')) active @endif">
                    <a href="{{url('home')}}"><i class="gi gi-home sidebar-nav-icon"></i> Beranda</a>
                </li>
                <li class="@if(Request::is('nilai-self-assessment')) active @endif">
                    <a href="{{url('nilai-self-assessment')}}"><i class="gi gi-notes sidebar-nav-icon"></i> Nilai Assessment</a>
                </li>
                <li class="@if(Request::is('inovatif') || Request::is('arsip/inovatif')) active @endif">
                    <a href="{{url('inovatif')}}"><i class="gi gi-tags sidebar-nav-icon"></i> OJK Inovatif</a>
                </li>
                <li class="@if(Request::is('lembar-self-assessment') || Request::is('arsip/assessment')) active @endif">
                    <a href="{{url('lembar-self-assessment')}}"><i class="gi gi-sort sidebar-nav-icon"></i> Lembar Assessment</a>
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
                    @endif
                    @if(Auth::check() AND Auth::user()->level == 'admin')
                    <!-- MENU ADMIN -->
                    <li class="sidebar-header">
                        <span class="sidebar-header-options clearfix">
                            <i class="gi gi-user"></i></span>
                            <span class="sidebar-header-title"><b>Admin</b></span>
                        </li>
                        <li class="@if(Request::is('home')) active @endif">
                            <a href="{{url('home')}}"><i class="gi gi-home sidebar-nav-icon"></i> Beranda</a>
                        </li>
                        <li class="@if(Request::is('user')) active @endif">
                            <a href="{{url('user')}}">
                                <i class="gi gi-user sidebar-nav-icon"></i> Semua User
                            </a>
                        </li>
                      <!--   <li class="@if(Request::is('map-report')) active @endif">
                            <a href="{{url('map-report')}}">
                                <i class="gi gi-google_maps sidebar-nav-icon"></i> Mapping Report
                            </a>
                        </li> -->
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
                                        Manual Pengguna Reviewer
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="">
                                        <i class="gi gi-notes sidebar-nav-icon"></i> 
                                        Catatan Dinas
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- <li class="@if(Request::is('survey')) active @endif">
                            <a href="{{url('survey')}}">
                                <i class="gi gi-notes sidebar-nav-icon"></i> Rekap Survey
                            </a>
                        </li> -->
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
                        <li class="@if(Request::is('admin/pengaturan')) active @endif">
                            <a href="{{url('admin/pengaturan')}}">
                                <i class="gi gi-tags sidebar-nav-icon"></i> Parameter Program
                            </a>
                        </li>
                        <!-- TUTUP MENU ADMIN -->
                        @endif
                        @if(Auth::check() AND Auth::user()->level == 'reviewer')
                        <!-- MENU REVIEWER -->
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix">
                                <i class="gi gi-user"></i></span>
                                <span class="sidebar-header-title"><b>Reviewer</b></span>
                            </li>
                            <li class="@if(Request::is('home-reviewer')) active @endif">
                                <a href="{{url('home-reviewer')}}">
                                    <i class="gi gi-home sidebar-nav-icon"></i> Beranda
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu">
                                    <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                    <i class="gi gi-sort sidebar-nav-icon"></i>
                                    <span class="sidebar-nav-mini-hide">Self Assessment</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{url('rekap-assessment')}}">
                                            <i class="gi gi-notes sidebar-nav-icon"></i> 
                                            Rekap Self Assessment
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('hasil-assessment')}}">
                                            <i class="gi gi-notes sidebar-nav-icon"></i> 
                                            Hasil Self Assessment
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
                                    <i class="gi gi-sort sidebar-nav-icon"></i>
                                    <span class="sidebar-nav-mini-hide">Input Tambahan</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{url('lomba-kreasi-kreatif')}}">
                                            <i class="gi gi-notes sidebar-nav-icon"></i> 
                                            Lomba Kreasi Kreatif
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('budaya-internal')}}">
                                            <i class="gi gi-notes sidebar-nav-icon"></i> 
                                            Survei Budaya Internal
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('budaya-eksternal')}}">
                                            <i class="gi gi-notes sidebar-nav-icon"></i> 
                                            Survei  Budaya Eksternal
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
                            <li class="@if(Request::is('grafik-budaya')) active @endif">
                                <a href="{{url('grafik-budaya')}}">
                                    <i class="fa fa-line-chart sidebar-nav-icon"></i> 
                                    Grafik Budaya Satker
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
                            @endif
                        </ul>
                        <!-- END Sidebar Navigation -->

                        <div style="padding:20px 10px 30px 10px;">
                      <b>SOCIAL MEDIA</b>
                  </div>
                  <div align="middle">                  
                      <div class="sidebar-section">
                          <a target="_blank" href="https://www.instagram.com/OJKWAY/">
                            <div class="alert alert-alt" style="border-color:#895a4d;">
                                <div class="social">
                                   <small>Follow our Instagram</small><br><br>
                                   <i class="fa fa-instagram fa-5x" style="padding-top:17px;"></i><br>
                                   <small>@OJKWay</small>
                               </div>
                           </div>
                       </a>
                       <br>
                       <a target="_blank" href="https://www.facebook.com/ojkway">
                        <div class="alert alert-alt" style="border-color:#21618c;">
                            <div class="social">
                             <small>Like our Facebook</small><br><br>
                             <i class="fa fa-facebook fa-5x" style="padding-top:17px;"></i><br>
                             <small>@OJKWay</small>
                         </div>
                     </div>
                 </a>
                 <br>
                 <a target="_blank" href="https://www.twitter.com/ojkway">                    
                     <div class="alert alert-alt" style="border-color:#46c0fb;">
                      <div class="social">
                        <small>Follow our Twitter</small><br><br>
                        <i class="fa fa-twitter fa-5x" style="padding-top:17px;"></i><br>
                        <small>@OJKWay</small>
                    </div>
                </div>
            </a>
            <br>
            <a target="_blank" href="https://www.youtube.com/channel/UCSHDzYCmge5nijj3bs55SAg">
                <div class="alert alert-alt" style="border-color:#e74c3c;">
                  <div class="social">
                    <small>Subscribe our Channel</small><br><br>
                    <i class="fa fa-youtube fa-5x" style="padding-top:17px;"></i><br><br>
                    <small>@OJKWay</small>
                </div>
            </div>
        </a>
        <br>
        <a href="http://ojkway.ojk.go.id">
            <img src="http://ojkway.ojk.go.id/images/ojkwayapp.png" width="100%">
        </a>
        <br>
        <br>
        <a href="https://play.google.com/store/apps/details?id=id.ojkway">
           <img src="http://ojkway.ojk.go.id/images/google_play.png" width="100%" height="auto" style="border-radius: 15px;">
       </a>
       <br><br>
       <a href="http://ojkway.appstor.io/">
          <img src="http://ojkway.ojk.go.id/images/app_store.png" width="100%" height="auto" style="border-radius: 15px;">
      </a>
  </div>
</div>

                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
    <!-- END Main Sidebar -->