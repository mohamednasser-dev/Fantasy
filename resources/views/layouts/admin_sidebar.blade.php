<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">

    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

            <li class=" nav-item">
                <a href="{{url('home')}}"><i class="icon-home3"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_home')}}</span></a>
            </li>

            @if(Auth::user()->type == "admin")
            
                <li class=" nav-item">
                    <a href="{{url('clubs')}}"><i class="icon-cube"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_clubs')}}</span></a>

                </li>

                <li class=" nav-item">
                    <a href="{{url('coaches')}}"><i class="icon-head"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_coaches')}}</span></a>

                </li>


                <li class=" nav-item">
                    <a href="{{url('players')}}"><i class="icon-users"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_players')}}</span></a>

                </li>
				
				 <li class=" nav-item">
                    <a href="{{url('stadiums')}}"><i class="icon-archive3"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_stadiums')}}</span></a>

                </li>
				
				 <li class=" nav-item">
                    <a href="{{url('tournaments')}}"><i class="icon-flag4"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_tours')}}</span></a>
                              
                </li>
				
				<li class=" nav-item">
                    <a href="{{url('matches')}}"><i class="icon-help2"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_matches')}}</span></a>

                </li>

                <li class=" nav-item">
                    <a href="{{url('users')}}"><i class="icon-help2"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_users')}}</span></a>

                </li>

                <li class=" navigation-header"><span data-i18n="nav.category.support">{{trans('admin.nav_news')}}</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
          </li>

          <li class=" nav-item">
                    <a href="{{url('categories')}}"><i class="icon-grid2"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_categories')}}</span></a>

                </li>
                <li class=" nav-item">
                    <a href="{{url('news')}}"><i class="icon-whatshot"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_create_new_news')}}</span></a>

                </li>


                @endif

                @if(Auth::user()->type == "user")
                <li class=" nav-item">
                    <a><i class="icon-whatshot"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_create_team')}}</span></a>

                </li>

                <li class=" nav-item">
                    <a><i class="icon-whatshot"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_my_points')}}</span></a>

                </li>


                <li class=" nav-item">
                    <a><i class="icon-whatshot"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_my_account')}} </span></a>

                </li>

                @endif

        </ul>

    </div>
    <!-- /main menu content-->

</div>
<!-- / main menu-->
