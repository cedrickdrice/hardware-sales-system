@foreach($categories as $category)
    <tr>
        <td>{{$category->name}}</td>
        <td>{{$category->type}}</td>
        <td>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible updateModal" data-id="{{$category->id}}" data-inverted="" data-position="top center" data-tooltip="Edit"
                    data-id="{{$category->id}}"
                    id="updateModal_categ" >
                <i class="material-icons-new outline-edit icon-action"></i>
            </button>
        </td>
    </tr>
@endforeach