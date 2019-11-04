<div class="modal fade pt-4" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModal" aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
            <form action="{{ route('admin.catalog.products.create') }}">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Before You Begin...</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="row pt-1">
                        <label for="productType">Product Type</label>
                        <select class="browser-default custom-select" id="productType" name="productType" disabled>
                            <option selected disabled>Simple</option>
                        </select>
                    </div>

                    <div class="row pt-3">
                        <label for="category">Category</label>
                        <select class="browser-default custom-select" id="category" name="category" required>
                            <option selected disabled>Select a category.</option>
                            @foreach($categories as $category)
                                <option>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row pt-3">
                        <label for="sku">SKU</label>
                        <input type="text" id="sku" name="sku" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Continue</button>
                </div>
            </form>
        </div>

    </div>

</div>
