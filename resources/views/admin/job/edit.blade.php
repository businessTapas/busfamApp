<form id="editJob" action="{{ route('job.update', $jobdata->id) }}" >
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required"> Job Title</label>
                                <input  type="text" class="form-control" placeholder="Enter Job Title"
                                    name="job_title" value="{{ $jobdata->job_title }}" required>
                                    <div class="error-messages" id="job_titleError"></div>
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required">Job Designation</label>
                                <input  type="text" class="form-control" placeholder="Enter Designation"
                                    name="job_designation" value="{{ $jobdata->job_designation }}" required>
                                    <div class="error-messages" id="job_designationError"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required"> Required Experience</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input  type="number" min="1" class="form-control" placeholder="From"
                                            name="experience_from" value="{{ $jobdata->experience_from }}" required>
                                            <div class="error-messages" id="experience_fromError"></div>
                                    </div>
                                    <div class="col-sm-1" style="text-align: center; padding-top: 10px;">-</div>
                                    <div class="col-sm-4">
                                        <input  type="number" min="1" class="form-control" placeholder="To"
                                            name="experience_to" value="{{ $jobdata->experience_to }}" required>
                                            <div class="error-messages" id="experience_toError"></div>
                                    </div>
                                    <div class="col-sm-3" style="text-align: left; padding-top: 10px;"> years </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="required"> Shift Type</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                    <input type="radio"  name="shift_type" value="full" {{  $jobdata->shift_type == 'full' ? 'checked' : '' }}  >
                                    </div>
                                    <div class="col-sm-4" style="text-align: left;">
                                    <label for="fulltime"> Full Time</label>
                                    </div>
                                    <div class="col-sm-1">
                                    <input type="radio"  name="shift_type" value="part" {{  $jobdata->shift_type == 'part' ? 'checked' : '' }} >
                                    </div>
                                    <div class="col-sm-6" style="text-align: left;">
                                    <label for="parttime"> Part Time</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required"> Salary</label>
                                <div class="row">
                                    <div class="col-sm-1" style="padding-top: 10px;">$</div>
                                    <div class="col-sm-3">
                                        <input  type="text" class="form-control" placeholder="From"
                                            name="salary_from" value="{{ $jobdata->salary_from }}" required>
                                            <div class="error-messages" id="salary_fromError"></div>
                                    </div>
                                    <div class="col-sm-1" style="text-align: center; padding-top: 10px;">-</div>
                                    <div class="col-sm-3">
                                        <input  type="text"  class="form-control" placeholder="To"
                                            name="salary_to" value="{{ $jobdata->salary_to }}"  required>
                                            <div class="error-messages" id="salary_toError"></div>
                                    </div>
                                    <div class="col-sm-3" style="text-align: left; padding-top: 10px;"> /months </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required"> Job Posted Date</label>
                                <input  type="text" class="form-control" placeholder="Job Post Date"
                                    name="job_posted_date" id="datepicker1" value="{{ $jobdata->job_posted_date }}" required>
                                    <div class="error-messages" id="job_posted_dateError"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Job Location</label>
                                <textarea  type="text" class="form-control" placeholder="Enter Location"
                                    name="location_address" required>
                                    {{ $jobdata->location_address }}
                                </textarea>
                                    <div class="error-messages" id="location_addressError"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required">Company Logo Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*"  onchange="previewImage()" required>
                            </div>
                            <div id="imagePreview"class="form-group">
                            <img src="{{ asset($jobdata->company_logo_image) }}"  style="max-width: 50px; " alt = "Image Preview">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required"> Company Name</label>
                                <input  type="text" class="form-control" placeholder="Enter Company Name"
                                    name="company_name" value="{{ $jobdata->company_name }}" required>
                                    <div class="error-messages" id="company_nameError"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required"> Status</label>
                                <select class="form-control" name="status" >
                                    <option value="active" {{  $jobdata->status == 'active' ? 'selected' : '' }} >Active</option>
                                    <option value="inactive" {{  $jobdata->status == 'inactive' ? 'selected' : '' }} >Inactive</option>
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