@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.add_new_tour')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.add_new_tour')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('tournaments')}}" >{{trans('admin.nav_tours')}}</a> </li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('admin.tour_info')}}</h4>
                    <hr>
                    {{ Form::open( ['url' => ['tournaments/store'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="example-month-input" class="col-md-2 col-form-label">
                                {{trans('admin.tour_name')}}
                            </label>
                            <div class="col-md-10">
                                {{ Form::text('tour_name',old('tour_name'),["class"=>"form-control" ,"required"]) }}
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-md-2 col-form-label">
                                {{trans('admin.classification')}}
                            </label>
                            <div class="col-md-10">
                                {{Form::select('classification',
                                ['1st' => trans('admin.1st'),
                                 '2nd' => trans('admin.2nd')
                                ],
                                null
                                ,["class"=>"custom-select col-12" ,"required",'placeholder'=>trans('admin.choose_classification') ])}}
                            </div>
                        </div>
                        <div class="center">
                            {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        </div>
                    {{ Form::c=lose() }}
                </div>
            </div>
        </div>
    </div>
@endsection

