@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_sponsers')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_sponsers')}}</li>
                 <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <!-- /.Begain page content-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('sponsers/create')}} "
                       class="btn btn-info btn-bg">{{trans('admin.add_new_sponser')}}</a>
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
                                <th class="text-lg-center">{{trans('admin.sponser_image')}}</th>
                                <th class="text-lg-center">{{trans('admin.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sponsers as $sponser)
                                <tr>
                                    <td class="text-lg-center">
                                        <img src="{{ url($sponser->image) }}" style="width:75px;height:75px;"/>
                                    </td>
                                    <td class="text-lg-center">
                                        <form method="get" id='delete-form-{{ $sponser->id }}' action="{{url('sponsers/'.$sponser->id.'/delete')}}" style='display: none;'>
                                        {{csrf_field()}}
                                        <!-- {{method_field('delete')}} -->
                                        </form>
                                        <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                            {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $sponser->id }}').submit();
                                            }else {
                                            event.preventDefault();
                                            }"
                                                class='btn btn-danger btn-circle' href=" "><i
                                                class="fa fa-trash" aria-hidden='true'>
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
   </div>
@endsection

