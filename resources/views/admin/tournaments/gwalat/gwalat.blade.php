@extends('admin_temp')
@section('content')
 <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">{{trans('admin.gwalat')}}</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                             <li class="breadcrumb-item">{{trans('admin.gwalat')}}</li>
                            <li class="breadcrumb-item"><a href="{{url('tournaments')}}">{{trans('admin.nav_tours')}}</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
                        </ol>
                    </div>
                   
                </div>


 <div class="row">
               
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                            <a href="{{url('gwalat/'.$tour_id.'/create')}} "
                               class="btn btn-info btn-bg">{{trans('admin.add_new_gawla')}}</a>
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
                                            <th class="text-lg-center">{{trans('admin.name')}}</th>                                         
                                            <th class="text-lg-center">{{trans('admin.start')}}</th> 
                                            <th class="text-lg-center">{{trans('admin.end')}}</th> 
                                            <th class="text-lg-center">{{trans('admin.actions')}}</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                       
                                        @foreach($gwalat_data as $gwala)
                                            <tr>
                                                <td class="text-lg-center">{{$gwala->name}}</td>
                                                <td class="text-lg-center">{{$gwala->start}}</td>
                                                <td class="text-lg-center">{{$gwala->end}}</td>
                                                
                                                <td class="text-lg-center">
                                                <a class='btn waves-effect waves-light btn-secondary' href=" {{url('gwla_matches/'.$gwala->id)}}">
                                                {{trans('admin.gwla_matches')}}
                                                </a>
                                                    <form method="get" id='delete-form-{{ $gwala->id }}' action="{{url('gwalat/'.$gwala->id.'/delete')}}" style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $gwala->id }}').submit();
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

