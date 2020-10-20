@extends('admin_temp')


@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('stadiums')}}">{{trans('admin.nav_stadiums')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.add_new_stad')}}
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
                    <h3 class="card-title">{{trans('admin.add_new_stad')}}</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['stadiums/store'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::text('stadium_name',old('stadium_name'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.stad_name') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control','placeholder'=>trans('admin.stad_image'))) }}
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

