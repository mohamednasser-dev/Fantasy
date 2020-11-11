@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('categories')}}">{{trans('admin.nav_categories')}} </a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_cat')}} 
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
                    <h3 class="card-title">{{trans('admin.update_cat')}} </h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        <div class="col-md-6 offset-md-3">
                            {!! Form::model($cat_data, ['route' => ['categories.update',$cat_data->id] , 'method'=>'put' ,'files'=> true]) !!}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    {{ Form::text('name',$cat_data->name,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.name')]) }}
                                </div>
                                <div class="form-actions center">
                                    {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

