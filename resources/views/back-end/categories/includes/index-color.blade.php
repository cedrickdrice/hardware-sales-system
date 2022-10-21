@foreach($colors as $color)
    <tr>
        <td>{{$color->name}}</td>
        <td>{{$color->type}}</td>
        <td>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible updateModal" data-id="{{$color->id}}" data-inverted="" data-position="top center" data-tooltip="Edit" id="updateModal_color" >
                <i class="material-icons-new outline-edit icon-action"></i>
            </button>
        </td>
    </tr>
@endforeach