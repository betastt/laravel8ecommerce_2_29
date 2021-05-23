<div>
    <div class="container text-center" style="margin-top: 50px;">
        <h3 class="mb-5">Barcode Laravel</h3>

        @foreach($products as $product)

           <div>{!! DNS1D::getBarcodeHTML($product->SKU, 'C39') !!}</div></br>
        @endforeach


    </div>
</div>
