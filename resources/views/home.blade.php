
@extends('admin_temp')


@section('content')
    {{--Main Menu--}}

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->

                <h1>Home page</h1>
               

 <!-- stats -->
                <div class="row">

                    <div class="card">
                        <div class="card-header">
                          <h3>Today`s matches</h3>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">

                               


                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0" id="datatabelexample">
                                        <thead>
                                        <tr>
                                        <th class="text-lg-center">Home Club</th>
                                        <th class="text-lg-center">result</th>
                                        <th class="text-lg-center">Away Club</th>                                            
                                        <th class="text-lg-center">Status</th>                                            
                                        <th class="text-lg-center">Stadium</th>
                                        <th class="text-lg-center">Tournament</th>                                            
                                        <th class="text-lg-center">Time</th>                                            
                                        <th class="text-lg-center">Date</th>
                           
                                        </tr>
                                        </thead>
                                        <tbody>
                       
                                        @foreach($matches as $match)
                                            <tr>
                                            <td class="text-lg-center">
                                            <img src="{{ url($match->getHomeclub->image) }}" style="width:75px;height:75px;"/>
                                            {{$match->getHomeclub->club_name}}</td>

                                     
                                            <td class="text-lg-center">
                                     
                                            {{$match->home_score}} - {{$match->away_score}} 
                                         
                                            </td>  

                                                   <td class="text-lg-center">
                                            <img src="{{ url($match->getAwayclub->image) }}" style="width:75px;height:75px;"/>
                                            {{$match->getAwayclub->club_name}}</td>

                                            <td class="text-lg-center">
                                            @if($match->status == 'not started')
                                            <button class="btn btn-warning btn-min-width mr-1 mb-1">{{$match->status}}</button>
                                            @elseif($match->status == 'started')
                                            <button class="btn btn-success btn-min-width mr-1 mb-1">{{$match->status}}</button>                                                
                                            @else
                                            <button class="btn btn-danger btn-min-width mr-1 mb-1">{{$match->status}}</button>                                                
                                         @endif
                                           </td> 

                                            <td class="text-lg-center">
                                            <img src="{{ url($match->getStadium->image) }}" style="width:75px;height:75px;"/>                                                
                                            {{$match->getStadium->stadium_name}}</td>     

                                            <td class="text-lg-center">{{$match->getTournament->tour_name}}</td>                                                
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
        </div>
    </div>

@endsection
