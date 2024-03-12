<form id="viewJob" >
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


<div class="error-messagess"></div>
</div>

                </form>