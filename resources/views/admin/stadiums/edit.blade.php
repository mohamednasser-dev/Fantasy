@extends('admin_temp')

@section('content')

    <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">{{trans('admin.update_stad')}}</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{trans('admin.update_stad')}}</li>
                    <li class="breadcrumb-item active"><a href="{{url('stadiums')}}" >{{trans('admin.nav_stadiums')}}</a> </li>

                    <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
                </ol>
            </div>
     </div>

<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            
                                <h4 class="card-title">{{trans('admin.stad_info')}}</h4>
                               
                               <hr>
                       
                         {!! Form::model($stadium_data, ['url' => ['stadiums/'.$stadium_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}


                                     <div class="form-group row">
                                         <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.stad_name')}}</label>

                                          <div class="col-md-10">
                                   
                                           {{ Form::text('stadium_name',$stadium_data->name,["class"=>"form-control" ,"required"]) }}
                                     </div>
                                                </div>

                                
                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-md-2 col-form-label">{{trans('admin.stad_image')}}</label>
                                        <div class="col-md-10">
                                                               
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                            @if(!empty($stadium_data->image))
                                <img src="{{ url($stadium_data->image) }}"
                                     style="width:250px;height:250px;"/>

                            @endif

                                        </div>
                                    </div>
                                   

                                      <div class="form-actions center">
                         {{ Form::submit( trans('admin.public_Edit'),['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
</div>

@endsection

