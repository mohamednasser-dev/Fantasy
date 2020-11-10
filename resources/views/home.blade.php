
@extends('admin_temp')
@section('content')
    {{--Main Menu--}}
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_home')}}</h3>
        </div>
    </div>
    <div class="row">     
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h4 class="card-title"><span class="lstick"></span>{{trans('admin.today_matches')}}</h4>
                    </div>
                    <!-- Start home table -->
                    <table id="myTable" class="table full-color-table full-primary-table">
                        <thead>
                            <tr>
                                <th  class="text-lg-center">{{trans('admin.home_club')}}</th>
                                <th class="text-lg-center">{{trans('admin.result')}}</th>
                                <th  class="text-lg-center">{{trans('admin.away_club')}}</th>                                          
                                <th  class="text-lg-center">{{trans('admin.status')}}</th>                                            
                                <th  class="text-lg-center">{{trans('admin.stadium')}}</th>
                                <th  class="text-lg-center">{{trans('admin.tour')}}</th>                                            
                                <th  class="text-lg-center">{{trans('admin.gwla')}}</th>                                            
                                <th  class="text-lg-center">{{trans('admin.time')}}</th>                                            
                                <th  class="text-lg-center">{{trans('admin.date')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matches as $match)
                                <tr>
                                    <td class="text-lg-center">
                                    <img src="{{ url($match->getHomeclub->image) }}" style="width:75px;height:75px;"/>
                                    {{$match->getHomeclub->club_name}}</td>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
