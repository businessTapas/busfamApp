<form id="editJob" action="{{ route('company.update', $companydata->id) }}" >
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Company Name </label>
                                <input  type="text" class="form-control" placeholder="Enter Company Name"
                                    name="company_name" value="{{ $companydata->company_name }}" required>
                                    <div class="error-messages" id="company_nameError"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Map Address </label>
                                <input  type="text" class="form-control" placeholder="Enter Map Address"
                                    name="map_address"  value="{{ $companydata->map_address }}" required>
                                    <div class="error-messages" id="map_addressError"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">Company Logo Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*"  onchange="previewImage()" required>
                            </div>
                            <div id="imagePreview"class="form-group">
                            <img src="{{ asset($companydata->company_logo_image) }}"  style="max-width: 50px; " alt = "Image Preview">
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