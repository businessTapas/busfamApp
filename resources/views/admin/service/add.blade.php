<div class="modal fade" data-url="{{ route('service.add') }}" id="addjob" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add Banner</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="add">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Service Title </label>
                                <input  type="text" class="form-control" placeholder="Enter Banner Title"
                                    name="title" required>
                                    <div class="error-messages" id="titleError"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Description </label>
                                <textarea   class="form-control" placeholder="Enter Description"
                                    name="description" required></textarea>
                                    <div class="error-messages" id="descriptionError"></div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" >Reset</button>
                            <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
                        </div>
                        <div class="error-messagess"></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
