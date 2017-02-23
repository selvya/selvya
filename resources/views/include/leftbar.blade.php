 <!-- Main Sidebar -->
 <div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="index.html" class="sidebar-brand">
                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>
                OJKWAY</strong></span>
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
              <li class="sidebar-header">
                <span class="sidebar-header-options clearfix">
                    <i class="gi gi-user"></i></span>
                    <span class="sidebar-header-title"><b>Satker</b></span>
                </li>
                <li>
                    <a href="{{url('home')}}"><i class="gi gi-home sidebar-nav-icon"></i> Home</a>
                </li>
                <li>
                    <a href="{{url('nilai-self-assesment')}}"><i class="gi gi-notes sidebar-nav-icon"></i> Nilai Self Assessment</a>
                </li>
                <li>
                    <a href="{{url('nilai-self-assesment')}}"><i class="gi gi-sort sidebar-nav-icon"></i> Lembar Self Assessment</a>
                </li>
                <li>
                    <a href="{{url('monitoring-anggaran')}}"><i class="gi gi-imac sidebar-nav-icon"></i> Monitoring Anggaran</a>
                </li>
                <li>
                    <a href="{{url('stakeholder')}}"><i class="gi gi-group sidebar-nav-icon"></i> Daftar Stakeholder</a>
                </li>
                <li>
                    <a href="{{url('manual-pengguna')}}"><i class="gi gi-book sidebar-nav-icon"></i> Manual Pengguna</a>
                </li>
                <li>
                    <a href="{{url('kontak')}}"><i class="gi gi-circle_info sidebar-nav-icon"></i> Kontak</a>
                </li>

            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
    <!-- END Main Sidebar -->