    <aside class="left-sidebar">
            <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> 
                        <a class="waves-effect waves-dark" href="{{url('home')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">{{trans('admin.nav_home')}}</span></a>
                    </li>
                    @if(Auth::user()->type == "admin")
                        <li> 
                            <a class="waves-effect waves-dark" href="{{url('users')}}" aria-expanded="false"><i class="mdi mdi-account-location"></i><span class="hide-menu">{{trans('admin.nav_users')}}</span></a>        
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="{{url('editors')}}" aria-expanded="false"><i class="mdi mdi-access-point"></i><span class="hide-menu">{{trans('admin.nav_editors')}}</span></a>        
                        </li>
                    @endif
                    @if(Auth::user()->type == "admin" ||Auth::user()->type == "editor")
                        <li> 
                            <a class="has-arrow waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">{{trans('admin.nav_clubs')}}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('clubs')}}">{{trans('admin.view_clubs')}}</a></li>
                                <li><a href="{{url('clubs/create')}} ">{{trans('admin.add_new_club')}}</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">{{trans('admin.nav_coaches')}}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('coaches')}}">{{trans('admin.view_coaches')}}</a></li>
                                <li><a href="{{url('coaches/create')}} ">{{trans('admin.add_new_coach')}}</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">{{trans('admin.nav_players')}}</span></a>        
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('players')}}">{{trans('admin.view_players')}}</a></li>
                                <li><a href="{{url('players/create')}} ">{{trans('admin.add_new_player')}}</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">{{trans('admin.nav_stadiums')}}</span></a>        
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('stadiums')}}">{{trans('admin.view_stadiums')}}</a></li>
                                <li><a href="{{url('stadiums/create')}} ">{{trans('admin.add_new_stad')}}</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-airplay"></i><span class="hide-menu">{{trans('admin.nav_tours')}}</span></a>        
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('tournaments')}}">{{trans('admin.view_tours')}}</a></li>
                                <li><a href="{{url('tournaments/create')}} ">{{trans('admin.add_new_tour')}}</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark"  aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">{{trans('admin.nav_sponsers')}}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('sponsers')}}">{{trans('admin.view_sponsers')}}</a></li>
                                <li><a href="{{url('sponsers/create')}} ">{{trans('admin.add_new_sponser')}}</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->type != "user" )
                        <li>
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-alarm"></i><span class="hide-menu">{{trans('admin.nav_matches')}}</span></a>        
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('matches')}}">{{trans('admin.view_matches')}}</a></li>
                                @if(Auth::user()->type == "admin" )
                                <li><a href="{{url('matches/create')}} ">{{trans('admin.add_new_match')}}</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif  
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <div class="page-wrapper">
        @include('layouts.errors')
        @include('layouts.messages')
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">