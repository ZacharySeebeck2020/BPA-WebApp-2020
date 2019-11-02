<div class="modal fade pt-4" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModal" aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Before You Begin...</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">

                    <div class="row pt-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="row pt-3">
                        <label for="visible">Visible In Menu</label>
                        <select class="browser-default custom-select" id="visible" name="visible">
                            <option selected value="true">Yes</option>
                            <option selected value="false">No</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </form>
        </div>

    </div>

</div>
