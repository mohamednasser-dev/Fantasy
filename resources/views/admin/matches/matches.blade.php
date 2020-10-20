@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}"> {{trans('admin.nav_home')}}</a>
                </li>
                <li class="breadcrumb-item">{{trans('admin.nav_matches')}}
                </li>

            </ol>
        </div>
    </div>


    <!-- /.card-header -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
        <h1>{{trans('admin.nav_matches')}}</h1>
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
                               class="btn btn-info btn-bg">{{trans('admin.add_new_match')}}</a>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                  
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">

                               


                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.home_club')}}</th>
                                            <th class="text-lg-center">{{trans('admin.result')}}</th>
                                            <th class="text-lg-center">{{trans('admin.away_club')}}</th>                                            
                                            <th class="text-lg-center">{{trans('admin.status')}}</th>                                            
                                            <th class="text-lg-center">{{trans('admin.stadium')}}</th>
                                            <th class="text-lg-center">{{trans('admin.tour')}}</th>                                            
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
                                                {{$match->getHomeclub->club_name}}</td>

                                         
                                                <td class="text-lg-center">
                                                <a href=" {{url('matches/'.$match->id.'/edit')}}">
                                                {{$match->home_score}} - {{$match->away_score}} 
                                                </a>
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

                                                <td class="text-lg-center">

                                                <a class='btn btn-raised btn-success btn-sml' href=" {{url('matches/'.$match->id.'/edit')}}">
                                                <i class="icon-edit"></i>
                                                </a>
                                                    <form method="get" id='delete-form-{{ $match->id }}' action="{{url('matches/'.$match->id.'/delete')}}" style='display: none;'>
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
                                                            class='btn btn-raised btn-danger btn-sml' href=" "><i
                                                            class="icon-android-delete" aria-hidden='true'>
                                                        </i>


                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach
                     
                                        </tbody>
                                    </table>
                                    {{ $matches->links()}}

                                </div>
                                
                            </div>
                        </div>


@endsection

