<div class="modal fade" data-url="{{ route('contact.info.add') }}" id="addjob" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add Contact Info</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="add">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Type</label>
                                <select class="form-control" name="type" >
                                    <option value="" >Select Type</option>
                                    <option value="phone" >Phone</option>
                                    <option value="email"> Email</option>
                                    <option value="address"> Address</option>
                                </select>
                                <div class="error-messages" id="typeError"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Info </label>
                                <input  type="text" class="form-control" placeholder="Enter Info"
                                    name="info" required>
                                    <div class="error-messages" id="infoError"></div>
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
