@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.nav_home')}}</a>
                </li>
                <li class="breadcrumb-item">{{trans('admin.nav_categories')}}
                </li>

            </ol>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            @include('layouts.errors')
            @include('layouts.messages')
            <div class="content-body">
                <!-- stats -->
                <div class="row">

                    <div class="card">
                        <div class="card-header">
                            <a href="{{url('categories/create')}} "
                               class="btn btn-info btn-bg">{{trans('admin.add_new_cat')}}</a>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="card-body collapse in">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-lg-center">{{trans('admin.name')}}</th>
                                                <th class="text-lg-center">{{trans('admin.actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $cat)
                                                <tr>
                                                    <td class="text-lg-center">{{$cat->name}}</td>
                                                    <td class="text-lg-center"><a class='btn btn-raised btn-success btn-sml'
                                                                                  href=" {{url('categories/'.$cat->id.'/edit')}}"><i
                                                                class="icon-edit"></i></a>

                                                        <form method="get" id='delete-form-{{ $cat->id }}'
                                                              action="{{url('categories/'.$cat->id.'/delete')}}"
                                                              style='display: none;'>
                                                            {{csrf_field()}}
                                                            <!-- {{method_field('delete')}} -->
                                                        </form>
                                                        <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $cat->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }"
                                                            class='btn btn-raised btn-danger btn-sml' href=" ">
                                                            <i class="icon-android-delete" aria-hidden='true'></i>
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

