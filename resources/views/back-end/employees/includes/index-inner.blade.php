@foreach($employees as $employee)
    <tr>
        <td>{{$employee->full_name()}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->username}}</td>
        <td class="text-capitalize">{{$employee->type}}</td>
	    <td class="text-center">
	    	<a href="{{url('manager/employees/delete/'. $employee->id)}}">
	    		<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible" data-tooltip="Move To Trash" data-position="left center">
	    			<i class="material-icons-new outline-delete"></i>
	    		</button>
	    	</a>
	    </td>
    </tr>
@endforeach