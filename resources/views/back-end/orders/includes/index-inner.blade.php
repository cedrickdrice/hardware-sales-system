<div class="table_container table-responsive mdl-shadow--8dp mb-0 mt-3">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">ORDER NUMBER</th>
                <th scope="col">CUSTOMER</th>
                <th scope="col">CONTACT NUMBER</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">TOTAL</th>
                <th scope="col">DATE OF PURCHASE</th>
                <th scope="col">TYPE OF PURCHASE</th>
                <th scope="col">STATUS</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
            <td><a href="#" data-id="{{$order->id}}" class="order_number text-uppercase">#{{$order->order_number}}</a></td>
                <td>{{$order->user->full_name()}}</td>
                <td>
                    @if ( $order->phone_number == null)
                        @if ($order->user->phone_number == null)
                            No contact number
                        @else 
                            {{$order->user->phone_number}}
                        @endif
                    @else
                        {{$order->phone_number}}
                    @endif
                </td>
                <td>
                    @if ( $order->address == null)
                        @if ($order->user->address == null)
                            no address
                        @else 
                            {{$order->user->address}}
                        @endif
                    @else
                        {{$order->address}}
                    @endif
                </td>
                <td>₱ {{Crypt::decrypt($order->amount)}}</td>
            
                <td>{{date('F d, Y', strtotime($order->created_at))}}</td>
                <td>
                    @if($order->type == 0 ) Cash on Delivery
                    @elseif($order->type == 1 ) Credit Card
                    @else Through POS @endif
                </td>
                <td class="text-uppercase @if($order->status == 0 ) text-primary @elseif($order->status == 1) text-warning @elseif($order->status == 2) text-success @else text-danger @endif">@if ($order->status == 0 ) processed @elseif ($order->status == 1) shipped @elseif($order->status == 2) delivered @else canceled @endif</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="10">
                    {{$orders->links("pagination::bootstrap-4")}}
                </td>
            </tr>
        </tfoot>
    </table>
    
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800" class="d-none">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
            </filter>
        </defs>
    </svg>

</div>