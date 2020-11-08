@extends('admin_temp')
@section('content')

 <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">{{trans('admin.nav_players')}}</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{trans('admin.nav_players')}}</li>
                    <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
                </ol>
            </div>
     </div>

    <!-- /.card-header -->
   <div class="row">
               
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                            <a href="{{url('players/create')}} "
                               class="btn btn-info btn-bg">{{trans('admin.add_new_player')}}</a>
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
                                            <th class="text-lg-center">{{trans('admin.player_name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.age')}}</th>
                                            <th class="text-lg-center">{{trans('admin.club_name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.center_name')}}</th>                                            
                                            <th class="text-lg-center">{{trans('admin.image')}}</th>
                                            <th class="text-lg-center">{{trans('admin.actions')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                       
                                        @foreach($players as $player)
                                            <tr>
                                                <td class="text-lg-center">{{$player->player_name}}</td>
                                                <td class="text-lg-center">{{$player->age}}</td>
                                                <td class="text-lg-center">{{$player->getClub->club_name}}</td>
                                                <td class="text-lg-center">{{$player->center_name}}</td>                                                
                                                <td class="text-lg-center">
                                                <img src="{{ url($player->image) }}" style="width:75px;height:75px;"/></td>
                                                <td class="text-lg-center">

                                                <a class='btn btn-success btn-circle' href=" {{url('players/'.$player->id.'/edit')}}">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                                    <form method="get" id='delete-form-{{ $player->id }}' action="{{url('players/'.$player->id.'/delete')}}" style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('{{trans('admin.deleteConfirmation')}}'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $player->id }}').submit();
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

