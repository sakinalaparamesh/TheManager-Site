<form role="form" >
        <div class="form-group row">
            <label for="inputEmail3" class="col-md-2">Name<span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" required="" parsley-type="name" class="form-control input-sm" id="inputEmail3" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-md-2">Mobile<span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" required="" parsley-type="name" class="form-control input-sm" id="inputEmail3" placeholder="Company">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-md-2"> Email<span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="text" required="" parsley-type="name" class="form-control input-sm" id="inputEmail3" placeholder="IC/PassportNumber">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-md-2"> Greetings<span class="text-danger">*</span></label>
            <div class="col-md-9">
                <div class="radio">
                    <div class="radio  form-check-inline">
                    <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                    <label for="inlineRadio1"> Harirayam </label>
                </div>
                <div class="radio form-check-inline">
                    <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                    <label for="inlineRadio2"> Deepavali </label>
                </div>


                           <div class="radio  form-check-inline">
                    <input type="radio" id="inlineRadio3" value="option3" name="radioInline" checked="">
                    <label for="inlineRadio3"> Chinese New Year </label>
                </div>
                        </div>

            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-md-2"> Comments<span class="text-danger">*</span></label>
            <div class="col-md-4">
                <textarea class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">

            <label for="Department_code" class="col-md-2"> Profile Pic <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <input type="file" class="filestyle col-md-3" data-buttonname="btn-primary" id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                 <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-0" class="btn btn-primary "> <span class="buttonText">Choose file</span></label></span></div>

        </div>
        <div class="form-group row">
          <label class="col-md-2"></label>
          <div class=" col-md-4 ">
          <div class="checkbox checkbox-inverse">
                    <input id="checkbox2" type="checkbox" checked="">
                    <label for="checkbox2">
                          Billing Contact
                    </label>
                </div>
                </div> 

        </div>


        <div class="form-group row ">
            <label class="col-md-2"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-default waves-effect waves-light btn-sm" id="success-alert">
                    SUBMIT
                </button>
                <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                   CANCEL
                </button>
            </div>
        </div>
</form>