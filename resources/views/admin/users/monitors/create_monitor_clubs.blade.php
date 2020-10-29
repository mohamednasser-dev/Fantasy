@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.add_new_monitor_club')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                 <li class="breadcrumb-item">{{trans('admin.add_new_monitor_club')}}</li>
                <li class="breadcrumb-item"><a href="{{url('monitor_Clubs/'.$user_id)}}">{{trans('admin.monitor_clubs')}}</a></li>
                <li class="breadcrumb-item"><a href="{{url('editors')}}">{{trans('admin.nav_editors')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>                 
    </div>
    <div class="center">
                    {{ Form::open( ['url' => ['monitor_Clubs/store'],'method'=>'post' , 'class'=>'form'] ) }}
                    {{ csrf_field() }}
                    {{ Form::hidden('user_id',$user_id,["class"=>"form-control" ]) }}
                    {{ Form::submit( trans('admin.public_Save') ,['class'=>'btn btn-info','style'=>'margin:10px']) }}
    </div>
     <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('admin.1st')}}</h4>
                    <h6 class="card-subtitle">{{trans('admin.first_class_hint')}}</h6>
                    <div class="table-responsive">
                        <table class="table color-table primary-table">
                            <thead>
                                <tr>
                                    <th class="text-lg-center">#</th>
                                    <th class="text-lg-center">{{trans('admin.club_name')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($first_clubs as $club1)
                                    <tr>
                                         <td class="text-lg-center">{!! Form::checkbox('selectedClubs[]',$club1->id,false,['class'=>'form-control'])!!}</td>  
                                         <td class="text-lg-center">{{$club1->club_name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('admin.2nd')}}</h4>
                    <h6 class="card-subtitle">{{trans('admin.second_class_hint')}}</h6>
                    <div class="table-responsive">
                        <table class="table color-table success-table">
                            <thead>
                                <tr>
                                    <th class="text-lg-center">#</th>
                                    <th class="text-lg-center">{{trans('admin.club_name')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($second_clubs as $club2)
                                    <tr>
                                    <td class="text-lg-center">{!! Form::checkbox('selectedClubs[]',$club2->id,false,['class'=>'form-control'])!!}</td>
                                    <td class="text-lg-center">{{$club2->club_name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                               
                {{ Form::close() }}     
@endsection

