<form id="editJob" action="{{ route('contact.info.update', $contactdata->id) }}" >
                    <div class="row">

                    <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Type</label>
                                <select class="form-control" name="type" >
                                    <option value="phone" {{  $contactdata->status == 'phone' ? 'selected' : '' }}>Phone</option>
                                    <option value="email" {{  $contactdata->status == 'email' ? 'selected' : '' }}> Email</option>
                                    <option value="address" {{  $contactdata->status == 'address' ? 'selected' : '' }}> Address</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Info </label>
                                <input  type="text" class="form-control" placeholder="Enter Info"
                                    name="info" value="{{ $contactdata->info }}" required>
                                    <div class="error-messages" id="infoError"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Status</label>
                                <select class="form-control" name="status" >
                                    <option value="active" {{  $contactdata->status == 'active' ? 'selected' : '' }} >Active</option>
                                    <option value="inactive" {{  $contactdata->status == 'inactive' ? 'selected' : '' }} >Inactive</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" >Reset</button>
                            <button type="button" class="btn btn-primary" id="jobUpdateBtn">Update</button>
                        </div>
                        <div class="error-messagess"></div>
                    </div>

                </form>

                <script>
        $(document).ready(function () {
            $('#datepicker1').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                {{-- startDate: new Date() --}}
               {{-- startDate: '{{ $startDate }}' --}}// Use dynamic date here
            });

        });
    </script>