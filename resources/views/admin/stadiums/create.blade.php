@extends('admin_temp')


@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('stadiums')}}">Stadiums</a>
                </li>
                <li class="breadcrumb-item"> Add new stadium
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
                    <h3 class="card-title">Add new stadium</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['stadiums/store'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::text('stadium_name',old('stadium_name'),["class"=>"form-control round" ,"required",'placeholder'=>'stadium name' ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round','placeholder'=>'stadium image')) }}
                        </div>

                        <div class="center">
                            {{ Form::submit( 'Add' ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

