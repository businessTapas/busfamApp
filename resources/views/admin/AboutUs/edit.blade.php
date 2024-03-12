<form id="editJob" action="{{ route('aboutus.update', $aboutusdata->id) }}" >
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                            <label class="required"> About US Title </label>
                                <input  type="text" class="form-control" placeholder="Enter Title"
                                    name="title" value="{{ $aboutusdata->title }}" required>
                                    <div class="error-messages" id="titleError"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                        <label class="required"> Description </label>
                                <textarea   class="form-control" placeholder="Enter Description"
                                    name="description" required>
                                    {{ $aboutusdata->title }}
                                </textarea>
                                    <div class="error-messages" id="descriptionError"></div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="required">About Us Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*"  onchange="previewImage()" required>
                            </div>
                            <div id="imagePreview"class="form-group">
                            <img src="{{ asset($aboutusdata->aboutus_image) }}"  style="max-width: 50px; " alt = "Image Preview">
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