@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('news')}}">{{trans('admin.nav_news')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_news')}}
                </li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            @include('layouts.errors')
            @include('layouts.messages')
            <!-- Headings -->
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('admin.old_target_info')}}</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                            <tr>
                                                <th>{{trans('admin.target')}}</th>
                                                <th>{{trans('admin.model')}}</th>
                                                <th>{{trans('admin.delete')}}</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($news_target as $row)
                                            <tr>
                                                <td class="text-truncate">{{$row->target_id}}</td>
                                                <td class="text-truncate">
                                                    @if($row->model=='App\Player::')
                                                        {{trans('admin.target_player')}}
                                                    @elseif($row->model=='App\Coach::')
                                                        {{trans('admin.target_coach')}}
                                                    @elseif($row->model=='App\Club::')
                                                        {{trans('admin.club')}}
                                                    @elseif($row->model=='App\Tournament::')
                                                        {{trans('admin.tour')}}
                                                    @elseif($row->model=='App\Match::')
                                                        {{trans('admin.match')}}
                                                    @endif
                                                </td>
                                                <td class="text-truncate">
                                                    <form method="get" id='delete-form-{{ $row->id }}' action="{{url('news_target/'.$row->id.'/delete')}}" style='display: none;'>
                                                                {{csrf_field()}}
                                                                <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $row->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"
                                                            class='btn btn-raised btn-outline-danger btn-sml' href=" "><i
                                                            class="icon-android-delete" aria-hidden='true'>
                                                        </i>
                                                    </button>
                                                    <!-- <button type="button" class="btn mr-1 mb-1 btn-outline-primary btn-sm"></button> -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('admin.news_data')}}</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                             <!-- This form to add new news row in database -->
                                {{ Form::open( ['route' => ['news.update',$news_data->id], 'method'=>'put' , 'files'=>'true'] ) }}
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    {{ Form::text('title',$news_data->title,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.title')]) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::textArea('description',$news_data->description,["class"=>"form-control",'placeholder'=>trans('admin.write_news_desc') ]) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::textArea('key_words',$news_data->key_words,["class"=>"form-control",'rows'=>'2','placeholder'=>trans('admin.write_key_words') ]) }}
                                </div>
                                <div class="form-group">
                                    <strong>News Category</strong>
                                    {{ Form::select('news_category_id',App\News_category::pluck('name','id'),$news_data->news_category_id
                                    ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_cat') ]) }}
                                </div>
                                <div class="form-actions center">
                                    <strong>{{trans('admin.change_news_image')}}</strong>             
                                    {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                                        @if(!empty($news_data->image))
                                            <img src="{{ url($news_data->image) }}"
                                                 style="width:250px;height:250px;"/>
                                        @endif
                                </div>
                                <div class="form-actions center">
                                    {{ Form::submit(trans('admin.public_Edit'),['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{trans('admin.choose_new_target')}}</h5>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <h3>{{trans('admin.nav_tours')}}</h3>
                                    @foreach($tours as $tour)
                                        <div class="row">
                                            <div class="col-md-1">
                                                {!! Form::checkbox('selected_tours[]',$tour->id,false,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-md-10">   
                                                {!! Form::label('tour_name',$tour->tour_name,false,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                <hr>    
                                <h3>{{trans('admin.nav_matches')}}</h3>
                                    @foreach($matches as $match)
                                        <div class="row">
                                            <div class="col-md-1">
                                                {!! Form::checkbox('selected_matches[]',$match->id,false,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-md-10">   
                                                {!! Form::label('Homeclub',$match->getHomeclub->club_name,false,['class'=>'form-control']) !!}
                                                -
                                                {!! Form::label('Awayclub',$match->getAwayclub->club_name,false,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                <hr>
                                <h3>{{trans('admin.nav_clubs')}}</h3>
                                    @foreach($clubs as $club)
                                        <div class="row">
                                            <div class="col-md-1">
                                                {!! Form::checkbox('selected_clubs[]',$club->id,false,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-md-10">   
                                                {!! Form::label('club_name',$club->club_name,false,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                <hr>
                                <h3>{{trans('admin.nav_coaches')}}</h3>
                                    @foreach($coaches as $coach)
                                        <div class="row">
                                            <div class="col-md-1">
                                                {!! Form::checkbox('selected_coaches[]',$coach->id,false,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-md-10">   
                                                {!! Form::label('coach_name',$coach->coach_name,false,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                <hr>
                                <h3>{{trans('admin.nav_players')}}</h3>
                                    @foreach($players as $player)
                                        <div class="row">
                                            <div class="col-md-1">
                                                {!! Form::checkbox('selected_players[]',$player->id,false,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-md-10">   
                                                {!! Form::label('player_name',$player->player_name,false,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                <hr>
                                {{ Form::close() }} 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
