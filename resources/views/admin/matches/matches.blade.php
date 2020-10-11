@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item">Matches
                </li>

            </ol>
        </div>
    </div>


    <!-- /.card-header -->


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
                            <a href="{{url('matches/create')}} "
                               class="btn btn-info btn-bg">Add new match</a>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
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
                                            <th class="text-lg-center"></th>

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

                                                <td class="text-lg-center">

                                                <a class='btn btn-raised btn-success btn-sml' href=" {{url('matches/'.$match->id.'/edit')}}">
                                                <i class="icon-edit"></i>
                                                </a>
                                                    <form method="get" id='delete-form-{{ $match->id }}' action="{{url('matches/'.$match->id.'/delete')}}" style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('Are you sure to delete the match?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $match->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"
                                                            class='btn btn-raised btn-danger btn-sml' href=" "><i
                                                            class="icon-android-delete" aria-hidden='true'>
                                                        </i>


                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach
                     
                                        </tbody>
                                    </table>

                                </div>
                                
                            </div>
                        </div>


@endsection

