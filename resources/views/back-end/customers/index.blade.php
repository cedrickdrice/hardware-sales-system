@extends('back-end.includes.manager')

@section('title')
    Customers | SAM
@endsection
@section('content')

    <div class="main-container w-100">

        <div class="main-wrapper">
            <div class="container">
                             
                <div class="py-5">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered bg-white mdl-shadow--4dp" id="iReportsTbl">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Username</th>
                                    <th>E-mail</th>
                                    <th>Shipping Address</th>
                                    <th>Orders</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->full_name()}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->address == null ? 'Does not set his/her address yet' : $user->address}}</td>
                                    <td>{{count($user->orders)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="9">
                                    <a href="{{url('/manager/customers/download')}}">
                                        <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored myButton1 px-4 py-2 d-flex align-items-center">
                                            <i class="material-icons-new outline-print icon-white mr-2"></i>Print Report
                                        </button></a>
                                    </th>
                                </tr>
                            </tfoot>
                            <tfoot>
                                <tr>
                                    <th colspan="9">
                                    {{$users->links("pagination::bootstrap-4")}}
                                    </th>
                                </tr>
                            </tfoot>
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800" class="d-none">
                                <defs>
                                    <filter id="goo">
                                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                                        <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                                    </filter>
                                </defs>
                            </svg>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection

@section('js')
    <script type="text/javascript" src="{{asset('assets/custom/js/admin.js')}}"></script>
    <script>
        $(".custSNL").addClass("SNLactive")
        $(".custSNL a").css("color","white")  
    </script>
@endsection