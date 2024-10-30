window.onload = function(){
	jQuery('.loader_css3_overlay').animate({
    opacity: 0
  }, 500, function(){
  	jQuery(this).remove();
  });
}