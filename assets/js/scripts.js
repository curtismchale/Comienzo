// sitewide javascript assests
// auto removes the values in text field if they have value of text
jQuery(document).ready(function(){
	swapValues = [];
	    jQuery(".text").each(function(i){
	        swapValues[i] = jQuery(this).val();
	        jQuery(this).focus(function(){
	            if (jQuery(this).val() == swapValues[i]) {
	                jQuery(this).val("");
	            }
	        }).blur(function(){
	            if (jQuery.trim(jQuery(this).val()) == "") {
	                jQuery(this).val(swapValues[i]);
	            }
	        });
	    });
});

jQuery(document).ready(function() {
	//comment form validation
	jQuery("#commentform").validate();
});