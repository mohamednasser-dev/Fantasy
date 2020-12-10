@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_matches')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_matches')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    
                    <a href="{{url('matches/create')}} " class="btn btn-info btn-bg">{{trans('admin.add_new_match')}}</a>
                    
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                   <!-- Start home table -->
                    <table id="myTable" class="table full-color-table full-primary-table">
                        <thead>
                            <tr>
                                <th class="text-lg-center">{{trans('admin.home_club')}}</th>
                                <th class="text-lg-center">{{trans('admin.result')}}</th>
                                <th class="text-lg-center">{{trans('admin.away_club')}}</th>                                            
                                <th class="text-lg-center">{{trans('admin.status')}}</th>                                            
                                <th class="text-lg-center">{{trans('admin.stadium')}}</th>
                                <th class="text-lg-center">{{trans('admin.tour')}}</th>                                            
                                <th class="text-lg-center">{{trans('admin.gwla')}}</th>                                            
                                <th class="text-lg-center">{{trans('admin.time')}}</th>                                            
                                <th class="text-lg-center">{{trans('admin.date')}}</th>
                                <th class="text-lg-center">{{trans('admin.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($matches as $match)
                                <tr>
                                    <td class="text-lg-center">
                                        <img src="{{ url($match->getHomeclub->image) }}" style="width:75px;height:75px;"/>
                                        {{$match->getHomeclub->club_name}}
                                    </td>
                                    <td class="text-lg-center">
                                        <a href=" {{url('matches/'.$match->gwla_id.'/'.$match->home_club_id.'/'.$match->away_club_id.'/edit')}}">
                                        {{$match->home_score}} - {{$match->away_score}} 
                                        </a>
                                    </td>  
                                    <td class="text-lg-center">
                                        <img src="{{ url($match->getAwayclub->image) }}" style="width:75px;height:75px;"/>
                                        {{$match->getAwayclub->club_name}}
                                    </td>
                                    <td class="text-lg-center">
                                        @if($match->status == 'not started')
                                            <button class="btn btn-warning btn-min-width mr-1 mb-1">{{trans('admin.not_started')}}</button>
                                        @elseif($match->status == 'started')
                                            <button class="btn btn-success btn-min-width mr-1 mb-1">{{trans('admin.started')}}</button>
                                        @else
                                            <button class="btn btn-danger btn-min-width mr-1 mb-1">{{trans('admin.ended')}}</button>
                                        @endif
                                    </td> 
                                    <td class="text-lg-center">
                                        <img src="{{ url($match->getStadium->image) }}" style="width:75px;height:75px;"/>                                               
                                        {{$match->getStadium->stadium_name}}
                                    </td>     
                                    <td class="text-lg-center">{{$match->getTournament->tour_name}}</td>                                                
                                    <td class="text-lg-center">{{$match->getGwla->name}}</td>                                                
                                    <td class="text-lg-center">{{$match->time}}</td>                                                
                                    <td class="text-lg-center">{{$match->date}}</td>
                                    <td class="text-lg-center">
                                        @if(Auth::user()->type == "admin" )
                                            <a class='btn btn-success btn-circle' href=" {{url('matches/'.$match->gwla_id.'/'.$match->home_club_id.'/'.$match->away_club_id.'/edit')}}">
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <form method="get" id='delete-form-{{ $match->id }}' action="{{url('matches/'.$match->gwla_id.'/'.$match->home_club_id.'/'.$match->away_club_id.'/delete')}}" style='display: none;'>
                                            {{csrf_field()}}
                                            <!-- {{method_field('delete')}} -->
                                            </form>
                                            <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $match->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }"
                                                    class='btn btn-danger btn-circle' href=" "><i
                                                    class="fa fa-trash" aria-hidden='true'>
                                                </i>
                                            </button>
                                        @endif
                                        @if($match->status != 'ended')  
                                            @if(Auth::user()->type == "monitor" )
                                                @if(in_array($match->home_club_id,$monitor_clubArray) || in_array($match->away_club_id,$monitor_clubArray))
                                                    @if($match->status == 'not started')
                                                    <a class='btn waves-effect waves-light btn-secondary' href="{{url('match/'.$match->id.'/'.$match->home_club_id.'/'.$match->away_club_id.'/view_match_formation')}}">
                                                        {{trans('admin.match_formation')}}
                                                    </a>
                                                    @endif
                                                    @if($match->status == 'started')
                                                    <a class='btn waves-effect waves-light btn-secondary' href=" {{url('monitor_match/'.$match->id)}}">
                                                        {{trans('admin.monitor_match')}}
                                                    </a>
                                                    @endif       
                                                @endif       
                                            @endif  
                                        @endif  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $matches->links()}}                 
                </div>
            </div>
        </div>
    </div>
@endsection

