jQuery(document).ready(function($) {

  //comment form validation
  $("#commentform").validate();
  // killing image rollover background
  $('img').parent('a').addClass('image');

  /**
   * This automatically removes the text in the default
   * seach field for the theme. Add CSS selectors to
   * target fields from other contact/form plugins.
   */
  var swapValues = [];
  $(".text, input[type='text']").each(function(i){
      swapValues[i] = $(this).val();
      $(this).focus(function(){
          if ($(this).val() === swapValues[i]) {
              $(this).val("");
          }
      }).blur(function(){
          if ($.trim(jQuery(this).val()) === "") {
              $(this).val(swapValues[i]);
          }
      });
  });

});
