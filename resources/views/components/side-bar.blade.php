<nav class="bg-white sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="mb-4 text-center sidenav-header">
        </div>
        <br>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <!-- Nav items -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link {{ $curr_url=='dashboard'?'active':'' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-desktop"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['categories.all','categories.view','categories.new','categories.edit'])?'active':'' }}"
                            href="{{ route('categories.all') }}">
                            <i class="fas fa-list" aria-hidden="true"></i>
                            <span class="hide-menu">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['articles.all','articles.view','articles.new','articles.edit'])?'active':'' }}"
                            href="{{ route('articles.all') }}">
                            <i class="fas fa-newspaper" aria-hidden="true"></i>
                            <span class="hide-menu">Article Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['employees.all','employees.view','employees.new','employees.edit'])?'active':'' }}"
                            href="{{ route('employees.all') }}">
                            <i class="fas fa-user" aria-hidden="true"></i>
                            <span class="hide-menu">Employee Management</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['bookings.all','bookings.view'])?'active':'' }}"
                            href="{{ route('bookings.all') }}">
                            <i class="fas fa-bookmark" aria-hidden="true"></i>
                            <span class="hide-menu">Booking Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['donations.all','donations.view'])?'active':'' }}"
                            href="{{ route('donations.all') }}">
                            <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                            <span class="hide-menu">Donation Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['volunteers.all','volunteers.view'])?'active':'' }}"
                            href="{{ route('volunteers.all') }}">
                            <i class="fas fa-hands-helping" aria-hidden="true"></i>
                            <span class="hide-menu">Volunteer Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['settings.social','settings.contact','settings.day'])?'':'collapsed' }}"
                            href="#homesubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <i class="fa fa-cog"></i>Settings</a>
                        <ul class="collapse list-unstyled" id="homesubmenu">

                            <li class="nav-item">
                                <a class="nav-link {{ in_array($curr_url,['settings.contact'])?'active':'' }}"
                                    href="{{ route('settings.contact') }}">
                                    <i class="ml-4 fa fa-phone"></i><span class="hide-menu">Contact</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($curr_url,['settings.day'])?'active':'' }}"
                                    href="{{ route('settings.day') }}">
                                    <i class="ml-4 fa fa-clock"></i><span class="hide-menu">Open Time</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($curr_url,['settings.restaurant'])?'active':'' }}"
                                    href="{{ route('settings.restaurant') }}">
                                    <i class="ml-4 fas fa-utensils"></i><span class="hide-menu">Restaurant Open Time</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</nav>
