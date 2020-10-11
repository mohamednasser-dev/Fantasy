
@extends('admin_temp')


@section('content')
    {{--Main Menu--}}

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->

                <h1>Home page</h1>
                <div class="app-content content container-fluid">
        <div class="content-wrapper">
        <h1>Matches</h1>
      <!-- For Display success and warning messages in page  -->
        @include('layouts.errors')
        @include('layouts.messages')
            <div class="content-header row">
            </div>

            <div class="content-body">


                <!-- stats -->
                <div class="row">

                    <div class="card">
                        <div class="card-header">
                            <h3>Today's matches</h3>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">

                               


                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0" id="datatabelexample">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">#</th>
                                            <th class="text-lg-center">Home Club</th>
                                            <th class="text-lg-center">Away Club</th>
                                            <th class="text-lg-center">result</th>
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
                                                <th scope="row" class="text-lg-center">{{$match->id}}</th>
                                                <td class="text-lg-center">{{$match->getHomeclub->club_name}}</td>
                                                <td class="text-lg-center">{{$match->getAwayclub->club_name}}</td>
                                                <td class="text-lg-center">{{$match->result}}</td>                                                
                                                <td class="text-lg-center">{{$match->Status}}</td>                                                
                                                <td class="text-lg-center">{{$match->getStadium->stadium_name}}</td>                                                
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


@endsection





            </div>
        </div>
    </div>

@endsection
