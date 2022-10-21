<div class="d-flex justify-content-center">
    <div class="selection-highlights1 position-absolute d-flex flex-wrap justify-content-center">
        <!-- TO BE LOOPED ALSO AS THE SELECTION ITEM LOOPED -->
        @php $counter = 0; @endphp
        @foreach (Storage::disk('products')->files('products') as $filename)
            <input class="selection-checkbox" type="checkbox" id="selection-check-{{ $counter++ }}">
            <div class="selection-highlight"></div>
        
        @endforeach 
        <!-- END TO BE LOOPED -->
    </div>
</div>
@php $counter = 0; @endphp
<div class="selection-content d-flex flex-wrap justify-content-center">
@foreach (Storage::disk('products')->files('products') as $filename)
    <label class="selection-item" for="selection-check-{{ $counter++ }}" data-checked="false">
        <span class="selection-item-container">
            <div class="d-flex justify-content-center h-100 position-relative">
                <div class="mediaLib_imgHolder d-flex justify-content-center position-relative align-self-center w-100">
                    <div class="align-self-center">
                        <img src="{{ asset('storage/' . $filename) }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </span>
    </label>
@endforeach