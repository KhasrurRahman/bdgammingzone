<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('public/assets/backend/images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href=""><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                            <i class="material-icons">input</i>Log Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>


                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">


            <li class="header">MAIN NAVIGATION</li>
            @if(Request::is('admin*'))
                <li class="{{Request::is('admin/dashbord')?'active': '' }}">
                    <a href="{{route('admin.dashbord')}}">
                        <i class="material-icons">home</i>
                        <span>Dashbord</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/match_shedule/*')?'active': ''}}{{Request::is('admin/match_shedule')?'active': ''}} {{Request::is('admin/runningMatch')?'active': ''}} {{Request::is('admin/previous')?'active': ''}}  {{Request::is('admin/result/*')?'active': ''}}">
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">schedule</i>
                        <span>Match</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="{{route('admin.match_shedule.index')}}" class=" waves-effect waves-block">match
                                Schedule
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.runningMatch')}}" class=" waves-effect waves-block">Running Match</a>
                        </li>
                        <li>
                            <a href="{{route('admin.previous')}}" class=" waves-effect waves-block ">pervious Match</a>
                        </li>
                    </ul>
                </li>


                <li class="{{Request::is('admin/old_match')?'active': ''}}">
                    <a href="{{route('admin.old_match')}}" class="waves-effect waves-bloc">
                        <i class="material-icons">fast_rewind</i>
                        <span>Old_match</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/all_user')?'active': ''}}{{Request::is('admin/block_user')?'active': ''}}">
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">face</i>
                        <span>User</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="{{route('admin.all_user.index')}}" class=" waves-effect waves-block">All User
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.block_user')}}" class=" waves-effect waves-block">Block User
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{Request::is('admin/withdraw_request')?'active': ''}}">
                    <a href="{{route('admin.withdraw_request')}}" class="waves-effect waves-bloc">
                        <i class="material-icons">assignment</i>
                        <span>withdraw request</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/deposit')?'active': ''}}">
                    <a href="{{route('admin.deposit')}}" class="waves-effect waves-bloc">
                        <i class="material-icons">assignment</i>
                        <span>Deposit request</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/contact')?'active': ''}}">
                    <a href="{{route('admin.contact')}}" class="waves-effect waves-bloc">
                        <i class="material-icons">contacts</i>
                        <span>contact</span>
                    </a>
                </li>



                </li>
             @endif



        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2019 <a href="javascript:void(0);">developed by - Md.khasrur Rahman</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
