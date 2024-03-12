<form id="viewJob" >
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
                            
                            <div id="imagePreview"class="form-group">
                            <img src="{{ asset($aboutusdata->aboutus_image) }}"  style="max-width: 50px; " alt = "Image Preview">
                            </div>
                        </div>
                       


<div class="error-messagess"></div>
</div>

                </form>