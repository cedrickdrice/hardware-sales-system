@foreach($addresses as $address)
<tr>
    <td class="text-capitalize">{{$address->full_name}}</td>
    <td>{{$address->address}}</td>
    <td>{{$address->post_code}}</td>
    <td>{{$address->phone_number}}</td>
    <td><button class="mdl-button mdl-js-button mdl-js-ripple-effect edit_address" id="edit_address" data-id="{{$address->id}}">edit</button></td>
</tr>
@endforeach