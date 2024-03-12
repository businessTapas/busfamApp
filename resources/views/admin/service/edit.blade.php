<form id="editJob" action="{{ route('service.update', $servicedata->id) }}" >
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Service Title </label>
                                <input  type="text" class="form-control" placeholder="Enter Service Title"
                                    name="title" value="{{ $servicedata->title }}" required>
                                    <div class="error-messages" id="titleError"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Description </label>
                                <textarea   class="form-control" placeholder="Enter Description"
                                    name="description" required>
                                    {{ $servicedata->description }}
                                </textarea>
                                    <div class="error-messages" id="descriptionError"></div>
                            </div>
                        </div>
                        
                       
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Status</label>
                                <select class="form-control" name="status" >
                                    <option value="active" {{  $servicedata->status == 'active' ? 'selected' : '' }} >Active</option>
                                    <option value="inactive" {{  $servicedata->status == 'inactive' ? 'selected' : '' }} >Inactive</option>
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