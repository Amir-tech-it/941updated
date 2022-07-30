<div class="content-wrapper" style="min-height: 1302.4px;">
<section>

<h2 class="text-center pt-5">Add New Package</h2>
<form method="post" enctype="multipart/form-data" id="sbmt-frm" >

<div class="card-body row">
<div class="successmsg"></div>

<div class="form-group col-md-6">
  <label for="offertitle">Offer Title:</label>
  <input type="text" id="offertitle" class="form-control" value="" name="offertitle" >
  <div class="offertitle_error all_errors"></div>
  </div>

<div class="form-group col-md-6">
<label for="feature1">Feature 1:</label>
  <input type="text" id="feature1" class="form-control" value="" name="feature1" >
  <div class="feature1_error all_errors"></div>
  </div>

<div class="form-group col-md-6">
<label for="feature2">Feature 2:</label>
  <input type="text" id="feature2" class="form-control" value="" name="feature2" >
  <div class="feature2_error all_errors"></div>
  </div>

<div class="form-group col-md-6">
<label for="feature3">Feature 3:</label>
  <input type="text" id="feature3" class="form-control" value="" name="feature3" >
  <div class="Feature 2_error all_errors"></div>
  </div>

<div class="form-group col-md-6">
<label for="feature4">Feature 4:</label>
  <input type="text" id="feature4" class="form-control" value="" name="feature4" >
  <div class="feature4_error all_errors"></div>
  </div>

<div class="form-group col-md-6">
<label for="feature5">Feature 5:</label><br>
  <input type="text" id="feature5" class="form-control" value="" name="feature5" ><br>
  <div class="feature5_error all_errors"></div>
  </div>
  <div class="form-group col-md-4 center">
  <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

  <!-- <input type="submit" value="Submit"> -->
</div>
</form> 
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
	$(function () {
		// Summernote
		$('#summernote').summernote();
	})
</script>
<script type="text/javascript">
 
  $(document).ready(function () {

  $(document).on('submit', '#sbmt-frm', function (e) {
// alert(123);
    
    e.preventDefault();

    var formObj = $(this);
    
    // $('.all_errors').empty();
    // $('.direct_access_error').hide();
    $.ajax({
      url: "<?php echo base_url("admin/offers/register");?>",
      data: new FormData(this),
      type: "POST",
      dataType: "JSON",
       contentType: false,
      processData: false,
      success: function (data) {
         console.log(data);
        if (data.response == true) {
           $('.successmsg').html(data.success);
           
           
           
           location.href = base_url + data.redirect_url;
        } else {
        //   if(data.image_errors){
        //     $('.userfile_error').html(data.image_errors);
        //   }
          if(data.form_errors){
            errors(data.form_errors);
          }
        }
        // else if (data.response == false){
        //             $('.name_error').html(data.form_errors.name);
        //             $('.email_error').html(data.form_errors.email);     
        //   $('.image_error').html(data.image_errors);
        // }
      }
    });
  });


  function errors(errors = '') {
    $.each(errors, function (key, value) {
      $('.' + key + '_error').html(value);
    });
    return false;
  }
});
</script>
</section>
</div>
