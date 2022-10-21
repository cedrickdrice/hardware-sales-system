@foreach($returns as $return)
    <tr>
        <td><a href="#" data-id="{{ $return->id }}" class="order_number text-uppercase">#{{ $return->order_detail->order->order_number }}</a></td>
        <td>{{ $return->order_detail->order->user->full_name() }}</td>
        <td>{{ $return->product->name }}</td>
        <td>{{ date('F d,Y',strtotime($return->created_at)) }}</td>
            @if($return->order_detail->product_id == $return->product->id)
                @if($return->order_detail->status == '1') 
                <td class="text-uppercase text-info">processing</td>
                @elseif($return->order_detail->status == '2') 
                <td class="text-uppercase text-success">returned</td>
                @else 
                <td class="text-uppercase text-danger">ignored</td>@endif
            @endif
    </tr>
@endforeach