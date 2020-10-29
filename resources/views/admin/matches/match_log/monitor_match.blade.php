@extends('admin_temp')
@section('styles')
<link href="{{ asset('/css/pages/chat-app-page.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.monitor_match')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.monitor_match')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('matches')}}" >{{trans('admin.nav_matches')}}</a> </li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <div class="row">
                    <div class="col-12">
                        <div class="card m-b-0">
                            <!-- .chat-row -->
                            <div class="chat-main-box">
                                <!-- .chat-left-panel -->
                                <div class="chat-left-aside">
                                    <div class="open-panel"><i class="ti-angle-right"></i></div>
                                    <div class="chat-left-inner">
                                        <div class="form-material" style="background: skyblue;">
                                            <h4 class="form-control p-20" style="color: white;">Home Players</h4>
                                            
                                        </div>
                                    

                                        <ul class="chatonline style-none ">
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/1.jpg') }}" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="active"><img src="{{ asset('/assets/images/users/2.jpg') }}" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/3.jpg') }}" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/4.jpg') }}" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/5.jpg') }}" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/6.jpg') }}" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/7.jpg') }}" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/8.jpg') }}" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                            </li>
                                            <li class="p-20"></li>
                                        </ul>
                                    </div>

                                    <div class="chat-left-inner">
                                    

                                        <div class="form-material" style="background: skyblue;">

                                            <h4 class="form-control p-20" style="color: white;">Away Players</h4>
                                     

                                        </div>

                                        <ul class="chatonline style-none ">
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/1.jpg') }}" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="active"><img src="{{ asset('/assets/images/users/2.jpg') }}" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/3.jpg') }}" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/4.jpg') }}" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/5.jpg') }}" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/6.jpg') }}" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/7.jpg') }}" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><img src="{{ asset('/assets/images/users/8.jpg') }}" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                            </li>
                                            <li class="p-20"></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- .chat-left-panel -->
                                <!-- .chat-right-panel -->
                                <div class="chat-right-aside">
                                    <div class="chat-main-header">
                                        <div class="p-20 b-b">
                    
                                                <a href="javascript:void(0)">
                                                    <img src="{{ asset('/assets/images/users/8.jpg') }}" style="width: 70px;" alt="user-img" class="img-circle"> 
                                                    <span>Away Club</span>
                                                </a>
                                                <small class="text-success" style="font-size: 200%;">0</small>
                                                <small class="text-success">-</small>
                                                <small class="text-success" style="font-size: 200%;">0</small>
                                                <a href="javascript:void(0)">
                                                    <span>Home Club</span>
                                                    <img src="{{ asset('/assets/images/users/8.jpg') }}" style="width: 70px;" alt="user-img" class="img-circle"> 
                                                </a>
          
                                        </div>
                                    </div>
                                    <div class="chat-rbox" style="height: 450px;">
                                        <ul class="chat-list p-20">
                                            <!--chat Row -->
                                            <li>
                                                <div class="chat-img"><img src="{{ asset('/assets/images/users/1.jpg') }}" alt="user" /></div>
                                                <div class="chat-content">
                                                    <h5>James Anderson</h5>
                                                    <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing & type setting industry.</div>
                                                </div>
                                                <div class="chat-time">10:56 am</div>
                                            </li>
                                            <!--chat Row -->
                                            <li>
                                                <div class="chat-img"><img src="{{ asset('/assets/images/users/2.jpg') }}" alt="user" /></div>
                                                <div class="chat-content">
                                                    <h5>Bianca Doe</h5>
                                                    <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-time">10:57 am</div>
                                            </li>
                                            <!--chat Row -->
                                            <li class="reverse">
                                                <div class="chat-content">
                                                    <h5>Steave Doe</h5>
                                                    <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-img"><img src="{{ asset('/assets/images/users/5.jpg') }}" alt="user" /></div>
                                                <div class="chat-time">10:57 am</div>
                                            </li>
                                            <!--chat Row -->
                                            <li class="reverse">
                                                <div class="chat-content">
                                                    <h5>Steave Doe</h5>
                                                    <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-img"><img src="{{ asset('/assets/images/users/5.jpg') }}" alt="user" /></div>
                                                <div class="chat-time">10:57 am</div>
                                            </li>
                                            <!--chat Row -->
                                            <li>
                                                <div class="chat-img"><img src="{{ asset('/assets/images/users/3.jpg') }}" alt="user" /></div>
                                                <div class="chat-content">
                                                    <h5>Angelina Rhodes</h5>
                                                    <div class="box bg-light-info">Well we have good budget for the project</div>
                                                </div>
                                                <div class="chat-time">11:00 am</div>
                                            </li>
                                            <!--chat Row -->
                                        </ul>
                                    </div>
                                    <div class="card-body b-t" style="height: 50px;">
                                        <div class="row">
                                            <div class="col-10">
                                                 <a href="javascript:void(0)">
                                                    <img src="{{ asset('/assets/images/users/8.jpg') }}" style="width: 70px;" alt="user-img" class="img-circle"> 
                                                    <span>Player name</span>
                                           
                                                </a>
                                              <select class="my-select col-6" id="inlineFormCustomSelect">
                                                <option selected="">Choose...</option>
                                                <option value="1">rule 1</option>
                                                <option value="2">rule 2</option>
                                                <option value="3">rule 3</option>
                                            </select>
                                            </div>
                                            

                                            <div class="col-2 text-right">

                                                <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-paper-plane-o"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .chat-right-panel -->
                            </div>
                            <!-- /.chat-row -->
                        </div>
                    </div>
                </div>         
        
@endsection
@section('scripts')
    <script src="{{ asset('/js/chat.js') }}"></script>
@endsection

