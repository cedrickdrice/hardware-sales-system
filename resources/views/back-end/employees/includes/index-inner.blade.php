@foreach($employees as $employee)
    <tr>
        <td>{{$employee->full_name()}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->username}}</td>
        <td class="text-capitalize">{{$employee->type}}</td>
        <td class="text-capitalize">
			@if ($employee->status == 0 ) <span class="text-grayish">Not Verified</span>
			@elseif ($employee->status == 1) <span class="text-success">Verified</span>
			@elseif($employee->status == 2) <span class="text-danger">Disabled</span>
			@else canceled @endif
		</td>
	    <td class="text-center">
			@if ($employee->status == 1)
				<a href="{{url('manager/employees/delete/'. $employee->id)}}">
					<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible" data-tooltip="Disable User" data-position="left center">
						<i class="material-icons-new outline-person_add_disabled"></i>
					</button>
			@elseif($employee->status == 2)
						<a href="{{url('manager/employees/enable/'. $employee->id)}}">
							<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible" data-tooltip="Enable User" data-position="left center">
								<i class="material-icons-new outline-person_add"></i>
							</button>

			@else
				<span></span>
			@endif
	    	</a>
	    </td>
    </tr>
@endforeach