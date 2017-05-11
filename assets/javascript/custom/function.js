/*Roll-hover immagini*/

$(document).ready(function() {
  $('.thumb-video').hover(
    function(){

      $(this).find('.caption').fadeIn(350);
    },
    function(){
      $(this).find('.caption').fadeOut(200);
    }
  );
});
