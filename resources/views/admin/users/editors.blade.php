@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_editors')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_editors')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
     <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('editors/create')}} "
                       class="btn btn-info btn-bg">{{trans('admin.add_new_editor')}}</a>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                       <!-- Start home table -->
                    <table id="myTable" class="table full-color-table full-primary-table">
                        <thead>
                            <tr>
                                <th class="text-lg-center">{{trans('admin.user_name')}}</th>
                                <th class="text-lg-center">{{trans('admin.email')}}</th>
                                <th class="text-lg-center">{{trans('admin.type')}}</th>
                                <th class="text-lg-center">{{trans('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-lg-center">{{$user->name}}</td>
                                    <td class="text-lg-center">{{$user->email}}</td>
                                    <td class="text-lg-center">
                                        @if($user->type == 'editor')
                                        {{trans('admin.editor')}}
                                        @elseif($user->type == 'monitor')
                                        {{trans('admin.monitor')}}
                                        @endif
                                    </td>
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
                                            }"
                                                class='btn btn-danger btn-circle' href=" "><i
                                                class="fa fa-trash" aria-hidden='true'>
                                            </i>
                                        </button>
                                        @if($user->type == 'monitor')
                                            <a class='btn waves-effect waves-light btn-secondary' href=" {{url('monitor_Clubs/'.$user->id)}}">
                                                        {{trans('admin.monitor_clubs')}}
                                            </a>   
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection





