@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_clubs')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_clubs')}}</li>
                 <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <!-- /.Begain page content-->
    <div class="row">    
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('clubs/create')}} "
                       class="btn btn-info btn-bg">{{trans('admin.add_new_club')}}</a>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                </div>
                <div class="card-body">
                    <!-- Start home table -->
                    <div class="table-responsive">
                        <table id="myTable" class="table full-color-table full-primary-table">
                            <thead>
                                <tr>
                                    <th class="text-lg-center">{{trans('admin.club_name')}}</th>
                                    <th class="text-lg-center">{{trans('admin.date_created')}}</th>
                                    <th class="text-lg-center">{{trans('admin.classification')}}</th>
                                    <th class="text-lg-center">{{trans('admin.image')}}</th>
                                    <th class="text-lg-center">{{trans('admin.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clubs as $club)
                                    <tr>
                                        <td class="text-lg-center">{{$club->club_name}}</td>
                                        <td class="text-lg-center">{{$club->date_created}}</td>
                                        <td class="text-lg-center">
                                            @if($club->classification =='1st')
                                                {{trans('admin.1st')}}
                                            @elseif($club->classification =='2nd')
                                                {{trans('admin.2nd')}}
                                            @endif
                                        </td>
                                        <td class="text-lg-center"><img src="{{ url($club->image) }}" style="width:75px;height:75px;"/></td>
                                        <td class="text-lg-center">
                                            <a  class="btn btn-success btn-circle" href=" {{url('clubs/'.$club->id.'/edit')}}"><i class="fa fa-edit"></i> </a>
                                            <form method="get" id='delete-form-{{ $club->id }}' action="{{url('clubs/'.$club->id.'/delete')}}" style='display: none;'>
                                            {{csrf_field()}}
                                            <!-- {{method_field('delete')}} -->
                                            </form>
                                            <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $club->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }"
                                                class='btn btn-danger btn-circle' href=" "><i class="fa fa-trash" aria-hidden='true'></i>
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
    </div>
@endsection

