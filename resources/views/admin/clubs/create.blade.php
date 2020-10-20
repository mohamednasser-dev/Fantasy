@extends('admin_temp')


@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('clubs')}}">{{trans('admin.nav_clubs')}} </a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.add_new_club')}}
                </li>

            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            @include('layouts.errors')
            @include('layouts.messages')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.add_new_club')}}</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['clubs/store'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}

                        <div class="form-group">
                        {{Form::select('classification',
                            ['1st' => '1st',
                             '2nd' => '2nd'
                             ],
                             null
                             ,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.choose_classification') ])}}
                                                </div>

                        <div class="form-group">
                            {{ Form::text('club_name',old('club_name'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.club_name')]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::textArea('tournaments',old('tournaments'),["class"=>"form-control","required",'placeholder'=>trans('admin.tours') ]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::textArea('desc',old('desc'),["class"=>"form-control",'placeholder'=>trans('admin.write_club_desc') ]) }}
                        </div>
                        <div class="form-group">
                        <strong>{{trans('admin.date_created')}}</strong>

                            {{ Form::date('date_created',\Carbon\Carbon::now()->format('Y-MM-ddd'),["class"=>"form-control" ,"required" ]) }}
                        </div>

                        <div class="form-group">
                        <strong>{{trans('admin.club_image')}}</strong>
                        
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                        </div>

                        <div class="center">
                            {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

