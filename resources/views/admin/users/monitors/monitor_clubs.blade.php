@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.monitor_clubs')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.monitor_clubs')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('editors')}}" >{{trans('admin.nav_editors')}}</a> </li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
     <div class="row">
        <div class="col-lg-12 col-xlg-9">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('monitor_Clubs/'.$user_id.'/create')}} "
                       class="btn btn-info btn-bg">{{trans('admin.add_new_clubs')}}</a>
                </div>
                <div class="card-body">
                       <!-- Start home table -->
                    <table id="myTable" class="table full-color-table full-primary-table">
                        <thead>
                            <tr>
                                <th class="text-lg-center">{{trans('admin.team_name')}}</th>
                                <th class="text-lg-center">{{trans('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clubs as $club)
                                <tr>
                                    <td class="text-lg-center">{{$club->getClub->club_name}}</td>
                                    <td class="text-lg-center">
                                        <form method="get" id='delete-form-{{ $club->club_id }}'
                                              action="{{url('monitor_clubs/'.$club->club_id.'/delete')}}"
                                              style='display: none;'>
                                        {{csrf_field()}}
                                        <!-- {{method_field('delete')}} -->
                                        </form>
                                        <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                            {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $club->club_id }}').submit();
                                            }else {
                                            event.preventDefault();
                                            }"
                                            class='btn btn-danger btn-circle' href="">
                                            <i class="fa fa-trash" aria-hidden='true'></i>
                                        </button>
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

