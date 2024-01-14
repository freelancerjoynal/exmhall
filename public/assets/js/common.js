$(document).ready(function(){

	/* Tool-tip init */
	$('[data-toggle="tooltip"]').tooltip()
	
	/* Password show hide */
	$('.password-show-hide').click(function(){
		if($(this).hasClass('fa-eye')) {
			$(this).removeClass('fa-eye').addClass('fa-eye-slash');
			$(this).closest('div').find('[type=password]').attr('type', 'text');
		}
		else {
			$(this).removeClass('fa-eye-slash').addClass('fa-eye');
			$(this).closest('div').find('[type=text]').attr('type', 'password');
		}
	});
	
	/* ========================= START PRODUCTS PAGE ========================= */
	
	if($('.color-holder').length > 0) {
			
		/* One Time Product Primary Image Set */
		var oneTimeProductPrimaryImage = $('.color-holder').find('.swatch-color.active').attr('data-src');
		var colorId = $('.color-holder').find('.swatch-color.active').attr('data-color-id');
		if(typeof(oneTimeProductPrimaryImage) !== 'undefined' && oneTimeProductPrimaryImage != '') {
			$('.one-time-purchase-img').attr('src', oneTimeProductPrimaryImage);
			$('.one-time-product-cart-btn').attr('data-color-id', colorId);
		}
		else {
			$('.one-time-purchase-img').attr('src', noImageSrc);
		}
	}
		
		
	$(document).on('click', '.swatch-color', function(){
		$('.swatch-color').removeClass('active');
		$(this).addClass('active');
		
		var imageSrc = $(this).attr('data-src');
		var colorId = $(this).attr('data-color-id');
		imageSrc = (imageSrc !== 'undefined' && imageSrc !='') ? imageSrc : noImageSrc;
		$('.one-time-purchase-img').attr('src', imageSrc);
		$('.one-time-product-cart-btn').attr('data-color-id', colorId);
	});
	
	
	/* ========================= END PRODUCTS PAGE ========================= */

	/* ========================= START PRODUCT CART ========================= */

	$(document).on('click', '.add-to-cart', function(){
		
		var ob = $(this);
		var productID = ob.attr('data-product-id');
		var colorID = ob.attr('data-color-id');
		var productType = ob.attr('data-product-type');
		
		if(typeof(productID) !== 'undefined' && productID != '') {
			
			
			$.ajax({
				type: "post",
				url: baseURL + "add-to-cart",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {product_id: productID, color_id: colorID, product_type: productType},
				success:function(res){
					
					var data = res.split('#####');
					
					if(data[0] != 1) {
						
						toastr.error('Product is out of stock');
						
					}
					else {
						ob.removeAttr('disabled');
						ob.removeClass('add-to-cart');
						ob.html('Added to Cart <i class="fa fa-check"></i>');
						$('.product-cart span').html(data[1]);
					}
				}
				
			});
			
		}
		
	});
	
	/* ========================= END PRODUCT CART ========================= */

	/* ========================= START PRODUCT PURCHASE ========================= */

	
	$(document).on('submit', '.form-product-purchase', function(e){
		e.preventDefault();
		var ob = $(this);
		var formData = $('.form-product-purchase').serialize();

		$.ajax({
			type: "post",
			url: baseURL + "payment",
			beforeSend: function(){
				ob.attr('disabled', 'disabled');
			},
			data: formData,
			success:function(res){

				ob.removeAttr('disabled');
				window.location.href = baseURL + 'product-confirmation';
			}
			
		});

	});
	
	$(document).on('change', '.form-product-purchase [name=country]', function(){
		
		var ob = $(this);
		var countryId = $('[name=country] option:selected').attr('data-id');
		$('[name=state]').trigger('change');
		
			
			$.ajax({
				type: "post",
				url: baseURL + "get-state-list",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {country_id:countryId},
				success:function(res){
					
					ob.removeAttr('disabled');
					var data = JSON.parse(res);
					$('.form-product-purchase [name=state]').html(data);
					
				}
			});
		
		
	});
	
	$(document).on('change', '.form-product-purchase [name=state]', function(){
		
		var ob = $(this);
		var stateId = $('[name=state] option:selected').attr('data-id');
		
		
			
			$.ajax({
				type: "post",
				url: baseURL + "get-city-list",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {state_id:stateId},
				success:function(res){
					
					ob.removeAttr('disabled');
					var data = JSON.parse(res);
					$('.form-product-purchase [name=city]').html(data);
					
				}
			});
		
		
	});
	
	
	/* ========================= END PRODUCT PURCHASE ========================= */
	
	/* ========================= START CUSTOMER SHIPPING DETAILS ========================= */
	$(document).on('click', '.show-customer-shipping-details', function(){
		var ob = $(this);
		var orderId = ob.attr('data-order-id');
		var productId = ob.attr('data-product-id');
		
		if(orderId != '' && productId != '') {
			
			$.ajax({
				type: "post",
				url: baseURL + "get-customer-shipping-details",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {order_id:orderId, product_id:productId},
				success:function(res){
					
					ob.removeAttr('disabled');
					$('#customer_shipping_details .modal-body div').html(res);
					$('#customer_shipping_details').modal('show');
					
				}
			});
		}
		
	});
	/* ========================= END CUSTOMER SHIPPING DETAILS ========================= */
	
	/* ========================= START GET PRODUCTS BY ORDER ID ========================= */
	
	$(document).on('blur', '.product-warranty-claim-form [name=product_order_id]', function(){
		
		var ob = $(this);
		var orderId = ob.val();
		
		if(orderId != '') {
			
			$.ajax({
				type: "post",
				url: baseURL + "get-products-by-order-id",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {order_id:orderId},
				success:function(res){
					
					ob.removeAttr('disabled');
					var data = JSON.parse(res);
					$('.product-warranty-claim-form [name=product_id]').html(data);
					
				}
			});
		}
		
	});
	/* ========================= START GET PRODUCTS BY ORDER ID ========================= */
	
	
	/* ========================= START CLAIM WARRANTY ========================= */
	
	$(document).on('click', '.show-claim-warranty', function(){
		$('.container-claim-warranty').fadeIn();
		$('.show-claim-warranty').hide();
	});
	
	$(document).on('click', '.hide-claim-warranty', function(){
		$('.container-claim-warranty').fadeOut();
		$('.show-claim-warranty').show();
	});
	
	
	
	$(document).on('submit', '#warranty_claim_form', function(e){
		e.preventDefault();
		var ob = $(this);
		var formData = $('.product-warranty-claim-form').serialize();

		$.ajax({
			type: "post",
			url: baseURL + "claim-product-warranty",
			beforeSend: function(){
				$('#warranty_claim_form').find('[type=submit]').attr('disabled', 'disabled');
			},
			data: formData,
			success:function(res){
			
				$('#warranty_claim_form').find('[type=submit]').removeAttr('disabled');
				$('#warranty_claim_form')[0].reset();
				var data = res.split('####');
				if(data[0] == 1) {
					toastr.success(data[1]);
				}
				else {
					toastr.warning(data[1]);
				}
				
				setTimeout(function(){
					location.reload();
				}, 5000);
				
			}
			
		});

	});
	
	/* ========================= START CLAIM WARRANTY ========================= */
	
	
	
	




	if($('.custom-alert').length > 0) {
		setTimeout(function(){
			$('.custom-alert').fadeOut();
		}, 5000);
	}
	
	$(document).on('input', '.only-number', function() {
		var value = $(this).val();
		var dataLength = parseInt($(this).attr('data-length'));
		var onlyNumberValue = value.replace(/[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
		$(this).val(onlyNumberValue);

		if ($.trim($(this).val()).length >= dataLength) {
				value = value.slice(0, dataLength);
				$(this).val(value);
		}
	});

	$(document).on('input', '.only-text', function() {
		var value = $(this).val();
		var onlyTextValue = value.replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
		$(this).val(onlyTextValue);
	});
	
	/* CK editor init */
	if($('#editor').length > 0) {
		CKEDITOR.replace( 'editor' );
	}
	
	if($('.ck-editor').length > 0) {
		
		$('.ck-editor').each(function(){
			editor_id = $(this).attr('id');
			CKEDITOR.replace( editor_id );
		});
	}
	

});


function CopyToClipboard(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
		toastr.success("Text has been copied");
  }
}