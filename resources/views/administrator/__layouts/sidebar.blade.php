<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('adm.mid.dashboard') }}" class="site_title">
                <i class="fa fa-key"></i> <span>Administrator Area</span>
            </a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <a href="{{ route('adm.mid.account.me') }}">
                    <img src="{{ asset('asset/picture-default/users.png') }}" alt="..." class="img-circle profile_img">
                </a>
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::guard('administrator')->user()->name }}</h2>
            </div>
        </div>
        <!-- menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li class="{{ Route::is('adm.mid.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('adm.mid.dashboard') }}">
                            <i class="fa fa-desktop"></i> Dashboard
                        </a>
                    </li>
                    <li class="{{ Route::is('adm.mid.account*') ? 'active' : '' }}">
                        <a><i class="fa fa-users"></i> Account<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('adm.mid.account.me') }}">Me</a></li>
                            <li><a href="{{ route('adm.mid.account.list') }}">Accounts</a></li>
                            <li><a href="{{ route('adm.mid.account.logs') }}">Logs Accounts</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::is('adm.mid.content*') ? 'active' : '' }}">
                        <a><i class="fa fa-globe"></i> Content<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('adm.mid.content', ['index'=>'banner']) }}">Banner</a></li>
                            <li><a href="{{ route('adm.mid.content', ['index'=>'news']) }}">News</a></li>
                            <li><a href="{{ route('adm.mid.content', ['index'=>'partner']) }}">Partner</a></li>
                            <!-- <li><a href="{{ route('adm.mid.content', ['index'=>'project']) }}">Project</a></li> -->
                        </ul>
                    </li>
                    <li class="{{ Route::is('adm.mid.product*') ? 'active' : '' }}">
                        <a>
                            <i class="fa fa-cubes"></i> Products<span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('adm.mid.product.list', ['model'=>'industry']) }}">Industry</a></li>
                            <li><a href="{{ route('adm.mid.product.list', ['model'=>'category']) }}">Category</a></li>
                            <!-- <li><a href="{{ route('adm.mid.product.list', ['model'=>'product']) }}">Product</a></li> -->
                        </ul>
                    </li>
                    <li class="{{ Route::is('adm.mid.inbox') ? 'active' : '' }}">
                        <a href="{{ route('adm.mid.inbox') }}">
                            <i class="fa fa-inbox"></i> Inbox
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- sidebar menu -->
    </div>
</div>