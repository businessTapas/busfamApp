<form id="editJob" action="{{ route('service.details.update', $serviceDetaildata->id) }}" >
                    <div class="row">

                       
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">Service Details Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*"  onchange="previewImage()" required>
                            </div>
                            <div id="imagePreview"class="form-group">
                            <img src="{{ asset($serviceDetaildata->service_detail_image) }}"  style="max-width: 50px; " alt = "Image Preview">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Status</label>
                                <select class="form-control" name="status" >
                                    <option value="active" {{  $serviceDetaildata->status == 'active' ? 'selected' : '' }} >Active</option>
                                    <option value="inactive" {{  $serviceDetaildata->status == 'inactive' ? 'selected' : '' }} >Inactive</option>
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