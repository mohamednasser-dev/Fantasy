@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_tours')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_tours')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <!-- /.card-header -->
     <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('tournaments/create')}} " class="btn btn-info btn-bg">
                       {{trans('admin.add_new_tour')}}
                    </a>
                    <a class="heading-elements-toggle">
                        <i class="icon-ellipsis font-medium-3"></i>
                    </a>
                </div>
                <div class="card-body">
                    <!-- Start home table -->
                    <table id="myTable" class="table full-color-table full-primary-table">
                        <thead>
                            <tr>
                                <th class="text-lg-center">{{trans('admin.tour_name')}}</th>
                                <th class="text-lg-center">{{trans('admin.classification')}}</th>
                                <th class="text-lg-center">{{trans('admin.status')}}</th> 
                                <th class="text-lg-center">{{trans('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tournaments as $tour)
                                <tr>
                                    <td class="text-lg-center">{{$tour->tour_name}}</td>
                                    <td class="text-lg-center">
                                        @if($tour->classification =='1st')
                                            {{trans('admin.1st')}}
                                        @elseif($tour->classification =='2nd')
                                            {{trans('admin.2nd')}}
                                        @endif
                                    </td>
                                    <td class="text-lg-center">
                                        @if($tour->status == 'started')
                                            <a class='btn btn-danger' href=" {{url('tournaments/'.$tour->status.'/'.$tour->id.'/'.$tour->classification.'/change_tour_status')}}">
                                                {{trans('admin.end_tour')}}
                                            </a>
                                        @elseif($tour->status == 'inprogres')
                                            <a class='btn btn-success' href=" {{url('tournaments/'.$tour->status.'/'.$tour->id.'/'.$tour->classification.'/change_tour_status')}}">
                                                {{trans('admin.tour_begin')}}
                                            </a>
                                        @elseif($tour->status == 'ended')
                                            {{trans('admin.tour_ended')}}
                                        @endif

                                    </td>
                                    <td class="text-lg-center">
                                        <a class='btn waves-effect waves-light btn-secondary' href=" {{url('gwalat/'.$tour->id)}}">
                                            {{trans('admin.gwalat')}}
                                        </a>
                                        <a class='btn btn-success btn-circle' href=" {{url('tournaments/'.$tour->id.'/edit')}}">
                                            <i class="fa fa-edit"></i>
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
                                            class='btn btn-danger btn-circle' href=" ">
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

