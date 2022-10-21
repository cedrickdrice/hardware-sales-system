@foreach($supplier as $supply)
<tr>
	<td>{{$supply->name}}</td>
	<td>{{$supply->email}}</td>
	<td>{{$supply->phone_number}}</td>
	<td>{{$supply->address}}</td>
	<td class="text-center">

		<button data-id="{{$supply->id}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible edit" data-tooltip="Update Info" data-position="left center">
			<i class="material-icons-new outline-edit"></i>
		</button>
	</td>
</tr>      
@endforeach           