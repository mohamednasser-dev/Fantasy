@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.nav_home')}}</a>
                </li>
                <li class="breadcrumb-item">{{trans('admin.nav_tours')}}
                </li>

            </ol>
        </div>
    </div>


    <!-- /.card-header -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
        <h1>{{trans('admin.nav_tours')}}</h1>
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
                            <a href="{{url('tournaments/create')}} "
                               class="btn btn-info btn-bg">{{trans('admin.add_new_tour')}}</a>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                          
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">

                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0" id="datatabelexample">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.tour_name')}}</th>                                         
                                            <th class="text-lg-center">{{trans('admin.classification')}}</th>                                         
                                            <th class="text-lg-center">{{trans('admin.actions')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                       
                                        @foreach($tournaments as $tour)
                                            <tr>
                                                <td class="text-lg-center">{{$tour->tour_name}}</td>
                                                <td class="text-lg-center">{{$tour->classification}}</td>
                                                
                                                <td class="text-lg-center">

                                                <a class='btn btn-raised btn-success btn-sml' href=" {{url('tournaments/'.$tour->id.'/edit')}}">
                                                <i class="icon-edit"></i>
                                                </a>
                                                    <form method="get" id='delete-form-{{ $tour->id }}' action="{{url('tournaments/'.$tour->id.'/delete')}}" style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $tour->id }}').submit();
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
                                
                            </div>
                        </div>


@endsection

