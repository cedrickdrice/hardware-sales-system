<div class="table_container table-responsive mdl-shadow--8dp mb-0 mt-3">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">
                    <i class="material-icons">image</i>
                </th>
                <th scope="col">NAME</th>
                <th scope="col">STOCK</th>
                <th scope="col">PRICE</th>
                <th scope="col">DELIVERY PRICE</th>
                <th scope="col">CATEGORIES</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td class="text-center">
                    <img src="{{asset('storage/products/' . $product->image)}}" height="60px">
                </td>
                <td>{{$product->name}}</td>
                
                
                <td>{{$product->totalStocks() . ' || ' }}<span class="{{$product->totalStocks() !== 0 ? 'text-success' : 'text-danger'}}">{{$product->totalStocks() !== 0 ? 'In Stock' : 'Out of Stock'}}</span></td>
                <td>₱ {{$product->price}}</td>
                <td>₱ {{$product->delivery_price}}</td>
                <td class="text-capitalize">{{$product->category->name}}</td>
                <td>{{date('F d, Y', strtotime($product->created_at))}}</td>
                <td>
                    <div class="d-flex">

                        <!-- bagong button for edit info -->
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible btnUpdate d-flex justify-content-center align-items-center" data-id="{{$product->id}}" data-inverted="" data-position="top center" data-tooltip="Edit Information" id="openUpdateModal" >
                            <i class="material-icons-new outline-info icon-action"></i>
                        </button>
                        <!-- // -->

                        <!-- edit for price/stock -->
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible btnPriceStock d-flex justify-content-center align-items-center" data-id="{{$product->id}}" data-inverted="" data-position="top center" data-tooltip="Edit Price" id="openUpdateModal" >
                            <i class="material-icons-new outline-edit icon-action"></i>
                        </button>
                        <!-- // -->
                        
                        <!-- this will be remove stock not specific item (binago ko rin class from btnDelete to btnRemove just to remind you) -->
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon overflow-visible btnRemove d-flex justify-content-center align-items-center" data-id="{{$product->id}}" data-inverted="" data-position="top center" data-tooltip="Remove">
                            <i class="material-icons-new outline-delete icon-action"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @empty 
            <tr><td colspan="8">NO ITEM</td></tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="10">
                    {{$products->links("pagination::bootstrap-4")}}
                    <!-- <div class="pagination-navigation">
                        <div class="pagination-current"></div>
                        <div class="pagination-dots">
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                        
                            <button class="pagination-dot {{ $products->currentPage() === $i ? 'paginate_active' : '' }}">
                                <a href="{{URL('icp/products/'. '?page='. $i )}}"><span class="pagination-number">{{$i}}</span></a>
                            </button>
                        @endfor
                        </div>
                    </div> -->
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