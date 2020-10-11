@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item">Coaches
                </li>

            </ol>
        </div>
    </div>


    <!-- /.card-header -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
        <h1>Coaches</h1>
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
                            <a href="{{url('coaches/create')}} "
                               class="btn btn-info btn-bg">Add new coach</a>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">

                               


                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0" id="datatabelexample">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">#</th>
                                            <th class="text-lg-center">coach name</th>
                                            <th class="text-lg-center">age</th>
                                            <th class="text-lg-center">club name</th>
                                            <th class="text-lg-center">desc</th>                                            
                                            <th class="text-lg-center">image</th>
                                            <th class="text-lg-center"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                       
                                        @foreach($coaches as $coach)
                                            <tr>
                                                <th scope="row" class="text-lg-center">{{$coach->id}}</th>
                                                <td class="text-lg-center">{{$coach->coach_name}}</td>
                                                <td class="text-lg-center">{{$coach->age}}</td>
                                                <td class="text-lg-center">{{$coach->getClub->club_name}}</td>
                                                <td class="text-lg-center">{{$coach->desc}}</td>
                                                <td class="text-lg-center">
                                                <img src="{{ url($coach->image) }}" style="width:75px;height:75px;"/></td>
                                                <td class="text-lg-center">

                                                <a class='btn btn-raised btn-success btn-sml' href=" {{url('coaches/'.$coach->id.'/edit')}}">
                                                <i class="icon-edit"></i>
                                                </a>
                                                    <form method="get" id='delete-form-{{ $coach->id }}' action="{{url('coaches/'.$coach->id.'/delete')}}" style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('Are you sure to delete the coach?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $coach->id }}').submit();
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

