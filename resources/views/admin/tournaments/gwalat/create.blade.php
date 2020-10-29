@extends('admin_temp')

@section('content')
  
    <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">{{trans('admin.add_new_gawla')}}</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                             <li class="breadcrumb-item">{{trans('admin.add_new_gawla')}}</li>
                            <li class="breadcrumb-item"><a href=" {{url('gwalat/'.$id)}}">{{trans('admin.gwalat')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{url('tournaments')}}">{{trans('admin.nav_tours')}}</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
                        </ol>
                    </div>
                   
    </div>

<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            
                                <h4 class="card-title">{{trans('admin.gwla_info')}}</h4>
                               
                               <hr>
                   {{ Form::open( ['url' => ['gwalat/store'],'method'=>'post'] ) }}
                        {{ csrf_field() }}


                                    <div class="form-group row">
                                         <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.gwla_name')}}</label>

                                          <div class="col-md-10">
                                   
                                       {{ Form::text('name',old('name'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.name') ]) }}
                                     </div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::hidden('tour_id',$id,["class"=>"form-control" ]) }}
                                    </div>

                                
                                      <div class="center">
                             {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
</div>


    
@endsection

