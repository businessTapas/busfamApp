<div class="modal fade" data-url="{{ route('client.add') }}" id="addjob" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add Client Details<Details></Details></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="add">
                    <div class="row">

                       
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">Client Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*"  onchange="previewImage()" required>
                            </div>
                            <div id="imagePreview"class="form-group"></div>
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
