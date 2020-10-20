@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.nav_home')}}</a>
                </li>
                <li class="breadcrumb-item">{{trans('admin.nav_news')}}
                </li>

            </ol>
        </div>
    </div>


    <!-- /.card-header -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
        <h1>{{trans('admin.nav_news')}}</h1>
        <!-- For Display success and warning messages in page  -->
        @include('layouts.errors')
       @include('layouts.messages')
            <div class="content-header row">
            </div>

            <div class="content-body">


                <!-- stats -->
                <div class="row">

      
                <div class="card">
                <div class="card-header">
                    <a href="{{url('news/create')}} "
                       class="btn btn-info btn-bg">{{trans('admin.add_new_news')}}</a>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    <div class="card-body collapse in">

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered mb-0" id="datatabelexample">
                                <thead>
                                <tr>
                                    <th class="text-lg-center">{{trans('admin.title')}}</th>
                                    <th class="text-lg-center">{{trans('admin.cat')}}</th>                                            
                                    <th class="text-lg-center">{{trans('admin.image')}}</th>
                                    <th class="text-lg-center">{{trans('admin.action')}}</th>

                                </tr>
                                </thead>
                                <tbody>
               
                                @foreach($news as $row)
                                    <tr>
                                      
                                        <td class="text-lg-center">{{$row->title}}</td>
                                        <td class="text-lg-center">{{$row->getCategory->name}}</td>
                                        <td class="text-lg-center">
                                        <img src="{{ url($row->image) }}" style="width:75px;height:75px;"/></td>
                                        <td class="text-lg-center">

                                        <a class='btn btn-raised btn-success btn-sml' href=" {{url('news/'.$row->id.'/edit')}}">
                                        <i class="icon-edit"></i>
                                        </a>
                                            <form method="get" id='delete-form-{{ $row->id }}' action="{{url('news/'.$row->id.'/delete')}}" style='display: none;'>
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
                                                    class='btn btn-raised btn-danger btn-sml' href=" "><i
                                                    class="icon-android-delete" aria-hidden='true'>
                                                </i>


                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
             
                                </tbody>
                            </table>

                        </div>
                        {{$news->links()}}

                    </div>
                </div>
@endsection

