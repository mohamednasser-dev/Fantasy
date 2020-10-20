@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.nav_home')}}</a>
                </li>
                <li class="breadcrumb-item">{{trans('admin.nav_users')}}
                </li>

            </ol>
        </div>
    </div>


    <!-- /.card-header -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
        @include('layouts.errors')
        @include('layouts.messages')
            <div class="content-header row">
            </div>

            <div class="content-body">


                <!-- stats -->
                <div class="row">

                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">{{trans('admin.nav_users')}}</h3>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                    
                                            <th class="text-lg-center">{{trans('admin.user_name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.email')}}</th>
                                            <th class="text-lg-center">{{trans('admin.actions')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="text-lg-center">{{$user->name}}</td>
                                                <td class="text-lg-center">{{$user->email}}</td>
                                                <td class="text-lg-center">
                                                    <form method="get" id='delete-form-{{ $user->id }}'
                                                          action="{{url('users/'.$user->id.'/delete')}}"
                                                          style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $user->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }

                                                        "
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

