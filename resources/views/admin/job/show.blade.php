<form id="viewJob" >
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
                                <input  type="text" class="form-control" placeholder="Enter Industry"
                                    name="job_designation" value="{{ $jobdata->job_designation }}" required>
                                    <div class="error-messages" id="job_industryError"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required"> Required Experience</label>
                                <input  type="text" class="form-control" placeholder="Enter Required Experience"
                                    name="required_experience" value="{{ $jobdata->required_experience }}" required>
                                    <div class="error-messages" id="required_experienceError"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                    <input type="radio"  name="shift_type" value="full" {{  $jobdata->shift_type == 'full' ? 'checked' : '' }} >
                                    <label for="fulltime"> Full Time</label>
                                   <input type="radio"  name="shift_type" value="part" {{  $jobdata->shift_type == 'part' ? 'checked' : '' }} >
                                   <label for="parttime"> Part Time</label>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="required"> Salary</label>
                                <input value="{{ $jobdata->salary }}" type="text" class="form-control" placeholder="Enter Salary"
                                    name="salary" required >
                                    <div class="error-messages" id="salaryError"></div>
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
                                <label class="required"> Job Location</label>
                                <textarea  type="text" class="form-control" placeholder="Enter Location"
                                    name="location_address" required>
                                    {{ $jobdata->location_address }}
                                </textarea>
                                    <div class="error-messages" id="location_addressError"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                           
                            <div id="imagePreview"class="form-group">
                            <img src="{{ asset($jobdata->company_logo_image) }}"  style="max-width: 50px; " alt = "Image Preview">
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

                       
                    </div>

                </form>