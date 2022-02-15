<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                


                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-calendar">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/campaigns" class="waves-effect">
                        <i class="bx bx-hive"></i>
                        <span key="t-chat">Campaign Tracker</span>
                    </a>
                </li>

                @if(session()->get('user_role') == "1")
                <li>
                    <a href="/activity-overview" class="waves-effect">
                        <i class="bx bx-hive"></i>
                        <span key="t-chat">Activity Overview</span>
                    </a>
                </li>
                @endif

                @if(session()->get('user_role') == "1")
                <li>
                    <a href="/clients" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-chat">Clients</span>
                    </a>
                </li>
                @endif

                @if(session()->get('user_role') == "1")
                <li>
                    <a href="/users" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span key="t-chat">Users</span>
                    </a>
                </li>
                @endif

                

                

                
               

               
               
               

              
              

               

               
               

               
               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->