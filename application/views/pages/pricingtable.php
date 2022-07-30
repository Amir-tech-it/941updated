<!-- start pricing banner section -->





<section class="inner-banner overflow-visible no-padding position-relative float-left width-100">
	<div class="banner width-75 sm-width-100 float-right text-right">
		<img src="<?php echo base_url('assets/digital/'); ?>images/banner/gep_pricing_min2.jpg" alt="941 Digital Pricing" />
	</div>
	<div class="width-750px md-width-60 sm-width-100 bottom-0 left-0 height-350px md-height-300px sm-height-auto bg-white position-absolute wow fadeInUp" data-wow-duration="0.2s">
		<div class="banner-desc padding-40px-all sm-padding-20px-tb sm-no-padding-lr vertical-middle">
			<div class="square-title margin-30px-bottom md-margin-20px-bottom">
				<h1 class="alt-font text-uppercase text-base-color font-weight-800 no-margin wow fadeInUp" data-wow-duration="0.4s"> A Smooth Price is the secret of our success.</h1>
			</div>
			<p class="no-margin text-medium line-height-26 text-center"></p>
		</div>
	</div>
</section>
<!-- end pricing banner section -->
<div class="clearfix"></div>
<!-- start pricing table section -->
<section class="bg-vertical-thirty-half-base md-bg-vertical-thirty-half-base xs-bg-vertical-twenty-half-base padding-60px-top padding-90px-bottom xs-padding-60px-bottom">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 center-col margin-70px-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
				<h5 class="alt-font font-weight-700 text-white text-uppercase margin-15px-bottom"></h5>
				<p class="no-margin-bottom text-white wow fadeInUp"></p>
			</div>
		</div>
		
		<div class="row">

			
		<?php
  foreach($data as $row)
  {?>
			<!-- start pricing item -->
		
			<div class="col-lg-4 col-md-12 text-center sm-margin-30px-bottom wow fadeInUp">
				<div class="pricing-box border-all border-width-1 border-color-extra-light-gray bg-white">
					<div class="padding-55px-all border-bottom border-color-extra-light-gray bg-medium-light-gray sm-padding-30px-all xs-pading-40px-all">
						<!-- start pricing price -->
						
						<div class="pricing-price">
							<span class="alt-font text-base-color font-weight-600 text-uppercase"><?php echo $row->offertitle;?></span>
							<h4 class="text-extra-dark-gray alt-font font-weight-600 no-margin-bottom"></h4>
							<div class="text-extra-small text-uppercase alt-font margin-5px-top">Pricing depends on project</div>
						</div>
						<!-- end pricing price -->
					</div>
					<!-- start pricing features -->
					<div class="padding-45px-all pricing-features sm-padding-20px-all xs-padding-30px-all">
						<ul class="list-style-1">
							<li><?php echo $row->feature1;?></li>
							<li><?php echo $row->feature2;?></li>
							<li><?php echo $row->feature3;?></li>
							<li><?php echo $row->feature4;?></li>
							<li><?php echo $row->feature5;?></li>
						</ul>
						<!-- start pricing action -->


						
						<div class="pricing-action margin-35px-top sm-no-margin-top">

						<form class="adcfm" id="adcfrm">
						<input type="hidden" value="<?php echo $row->offertitle;?>"  name="pro_name">
						<input type="hidden" value="<?php echo $row->id;?>" name="pkg_id" id="pkg_id" >
						 <input type="submit" class="btn btn-small min-width-auto text-extra-small" id="cfrmadd" value="Add to Cart">	
						 </form>

						 <!--<a class="btn btn-small min-width-auto text-extra-small" href="http://941digital.com/contactus.html">$125 per hour</a> -->
						</div>

						
						<!-- end pricing action -->
					</div>
					<!-- end pricing features -->
				</div>
			</div>
			
			<!-- end pricing item -->

			
			<?php
  }
   ?>
   

		</div>

	</div>
</section>
<!-- end pricing table section -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    
    $( document ).ready(function() {
   $(document).on('submit', '#adcfrm', function (e) {
      e.preventDefault();
    var formObj = $(this);
    // $('.all_errors').empty();
    // $('.direct_access_error').hide();
    $.ajax({
      url: "<?php echo base_url("home/cartdata");?>",
      data: new FormData(this),
      type: "POST",
      dataType: "JSON",
       contentType: false,
      processData: false,
      success: function (data) {
         console.log(data);
        if (data.response == true) {
           // $('.successmsg').html(data.success);
            location.href = base_url + data.redirect_url;
           

        } 
        
      }
    });
    })
});
    


  </script>

