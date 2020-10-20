@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('news')}}">{{trans('admin.nav_news')}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_news')}
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
                    <h3 class="card-title">{{trans('admin.update_news')}}</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($news_data, ['route' => ['news.update',$news_data->id] , 'method'=>'put' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                 
                    <div class="form-group">
          
                        <strong>{{trans('admin.title')}}</strong>
                        {{ Form::text('title',$news_data->title,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.title') ]) }}
                    </div>

                    <div class="form-group">
                    <strong>{{trans('admin.desc')}}</strong>        
                        {{ Form::textArea('description',$news_data->description,["class"=>"form-control",'placeholder'=>trans('admin.write_news_desc') ]) }}
                    </div>
                   
                    <div class="form-group">
                    <strong>{{trans('admin.key_words')}}</strong>
                                     
                        {{ Form::textArea('key_words',$news_data->key_words,["class"=>"form-control",'rows'=>'2','placeholder'=>trans('admin.write_key_words') ]) }}
                    </div>
                      <div class="form-group">
                        <strong>{{trans('admin.club_name')}}</strong>
                                {{ Form::select('club_id',App\Club::pluck('club_name','id'),$news_data->club_id
                                ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_club') ]) }}
                            </div>

                            <div class="form-group">
                        <strong>{{trans('admin.cat')}}</strong>
                                {{ Form::select('news_category_id',App\News_category::pluck('name','id'),$news_data->news_category_id
                                ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_cat') ]) }}
                            </div>

                        <div class="form-group">
                        <strong>{{trans('admin.change_news_image')}}</strong>
                                             
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                            @if(!empty($news_data->image))
                                <img src="{{ url($news_data->image) }}"
                                     style="width:250px;height:250px;"/>

                            @endif

                        </div>


                        {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

