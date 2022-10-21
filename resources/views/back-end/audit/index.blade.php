@extends('back-end.includes.admin')

@section('title')
    Audit Trail | SAM
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
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($audits as $audit)
                                <tr>
                                    <td>{{$audit->user->first_name . ' ' . $audit->user->middle_name . ' ' . $audit->user->last_name}}</td>
                                    <td class="text-capitalize">{{$audit->user->type}}</td>
                                    <td>{{$audit->comment}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="9">
                                        {{$audits->links("pagination::bootstrap-4")}}
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
        $(".audSNL").addClass("SNLactive")
        $(".audSNL a").css("color","white")  
    </script>
@endsection