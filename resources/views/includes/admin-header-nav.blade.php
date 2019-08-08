<div class="page-header">
    <div class="nav-container page-header-inner">
        <div class="page-header-flex">
            <div class="logo-branding">
                <h3>SPRED</h3>
            </div>
            <div class="header-menu ">
                <ul>
                    <li>
                        <ul class="menu-hide-on-mobile">
                            <li><a class="btn" href="{{url('/')}}">View Website</a></li>
                            <li class="btn" onclick="event.preventDefault(); document.getElementById('logout-action').submit()">Logout</li>
                            <form id="logout-action" action="{{route('logout')}}" method="POST" hidden style="display:none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    <li>
                        <div class="mobile-menu-button">
                            <div class="menu-bar bar-1"></div>
                            <div class="menu-bar bar-2"></div>
                            <div class="menu-bar bar-3"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-mobile-header-flex show-on-mobile hide">
            @include('includes.admin-sidebar-menu')
        </div>
    </div>
</div>
<div class="page-content-grid">
    <div class="page-side-nav hide-on-mobile">
        @include('includes.admin-sidebar-menu')
    </div>
