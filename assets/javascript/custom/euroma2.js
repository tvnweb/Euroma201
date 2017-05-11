/* MENU */
function strstr(haystack, needle, bool) {
    // Finds first occurrence of a string within another
    //
    // version: 1103.1210
    // discuss at: http://phpjs.org/functions/strstr    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: strstr(‘Kevin van Zonneveld’, ‘van’);
    // *     returns 1: ‘van Zonneveld’    // *     example 2: strstr(‘Kevin van Zonneveld’, ‘van’, true);
    // *     returns 2: ‘Kevin ‘
    // *     example 3: strstr(‘name@example.com’, ‘@’);
    // *     returns 3: ‘@example.com’
    // *     example 4: strstr(‘name@example.com’, ‘@’, true);    // *     returns 4: ‘name’
    var pos = 0;

    haystack += "";
    pos = haystack.indexOf(needle); if (pos == -1) {
        return false;
    } else {
        if (bool) {
            return haystack.substr(0, pos);
        } else {
            return haystack.slice(pos);
        }
    }
}

$("#menu-menuhp > .menu-item").hover(function() {
  $("#menu-menuhp > .menu-item > a").addClass('sfocato');
  $(this).find("a").removeClass('sfocato');
  //$("menu-menuhp").css("z-index", "50");
  //console.log("OVER "+$(this).find("a").html());

  /* visualizzazione submenu */
  $(this).find(".is-dropdown-submenu").css("opacity", 1);
  //$(this).removeClass('sfocato');
});

$("#menu-menuhp > .menu-item").mouseout(function() {
  $("#menu-menuhp > .menu-item > a").removeClass('sfocato');
  //$(".submenu").css("top", "5px");
});

$("#menu-menuhp").find(".menu-item").click(function() {
  $("#menu-menuhp").find(".active").removeClass('active');
  $(this).addClass("active");
  var sect_id = strstr($(this).find("a").eq(0).attr("href"), "#");
  console.log(sect_id);
  if(sect_id != "#") {
    goto_section($(sect_id));
  }
});

$('#mobile-menu a').on('click', function() {
    $(".container section").css("opacity",1);
    $('#mobile-menu').foundation('close');
});

function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}



$(window).scroll(function() {

  /* animazione top menu */
  if($(this).scrollTop()>50){
      //$(".is-stuck").removeClass("bigger");
      //$(".is-stuck").addClass("smaller");
      $("#backtotop").css("opacity"," 1");
  } else {
    //$(".is-stuck").removeClass("smaller");
    //$(".is-stuck").addClass("bigger");
    $("#backtotop").css("opacity", "0");
  }

  /* fade in sezioni */
  var ST = $("#backtotop").offset().top;
  var idx = 0;
  $(".container section").each( function() {
    var sect_ST = parseInt($(".container section").eq(idx).offset().top);
    var IDS = $(this).attr("id");
    if(IDS != "slider") {
      if(ST>sect_ST) {
        //console.log("fade in "+$(this).attr("id"));
        //console.log("Page "+ST+" section "+sect_ST);
        $(this).css("opacity",1);
      }
    }
    idx++;
   });

  });

  function goto_section(sect) {

    $('html, body').animate({
      scrollTop: sect.offset().top -50
    },2000);
  }

  function goto_top() {

    $('html, body').animate({
      scrollTop: 0
    },1500);
  }

  /* SLIDER */

  $(document).ready( function() {

    $(".claim img").animate({
      opacity: 1
    },200);
    var $animation = $(".claim img").data("animation");

    MotionUI.animateIn($(".claim img"), "slide-in-right");

    $(".submenu").removeClass("vertical");
    //$(".submenu").css("top", "5px");

    /* Site js settings */
    $(".submenu").removeClass("vertical");
    //$(".submenu").css("top", "5px");
    var winwidth = parseInt($(window).width());
    if ( winwidth < 973 ) {
      $(".container section").css("opacity",1);
    } else {
      $(".container section").each( function() {
        if(isScrolledIntoView(this)) {
          $(this).css("opacity",1);
        }
      });
    }

   });

   /* BACK TO TOP */
   $("#backtotop a").click( function() {
     //console.log("back to top");
     goto_top();
   });


   $(document).ready(function(){

     $(".view").css ("display", "none");
     $( ".griglia-0" ).click(function() {
         $(".tit-cat").eq(0).css("font-weight" , "bold");
       $( ".view" ).eq(0).toggle("slow"  , function() {
         $( ".view" ).eq(1).hide("slow");
         $( ".view" ).eq(2).hide("slow");
         $( ".view" ).eq(3).hide("slow");
         $(".tit-cat").eq(1).css("font-weight" , "normal");
         $(".tit-cat").eq(2).css("font-weight" , "normal");
         $(".tit-cat").eq(3).css("font-weight" , "normal");
     });

   });
   $( ".griglia-1" ).click(function() {
     $(".tit-cat").eq(1).css("font-weight" , "bold");
     $( ".view" ).eq(1).toggle("slow"  , function() {
       $( ".view" ).eq(0).hide("slow");
       $( ".view" ).eq(2).hide("slow");
       $( ".view" ).eq(3).hide("slow");
       $(".tit-cat").eq(0).css("font-weight" , "normal");
       $(".tit-cat").eq(2).css("font-weight" , "normal");
       $(".tit-cat").eq(3).css("font-weight" , "normal");
   });
   });
   $( ".griglia-2" ).click(function() {
     $(".tit-cat").eq(2).css("font-weight" , "bold");
     $( ".view" ).eq(2).toggle("slow"  , function() {
       $( ".view" ).eq(0).css("display" , "none");
       $( ".view" ).eq(1).css("display" , "none");
       $( ".view" ).eq(3).css("display" , "none");
       $(".tit-cat").eq(0).css("font-weight" , "normal");
       $(".tit-cat").eq(1).css("font-weight" , "normal");
       $(".tit-cat").eq(3).css("font-weight" , "normal");
   });
   });
   $( ".griglia-3" ).click(function() {
     $(".tit-cat").eq(3).css("font-weight" , "bold");
     $( ".view" ).eq(3).toggle("slow"  , function() {
       $( ".view" ).eq(1).hide("slow");
       $( ".view" ).eq(2).hide("slow");
       $( ".view" ).eq(0).hide("slow");
       $(".tit-cat").eq(1).css("font-weight" , "normal");
       $(".tit-cat").eq(2).css("font-weight" , "normal");
       $(".tit-cat").eq(0).css("font-weight" , "normal");
   });


   });
   });


/*Roll-hover immagini HP*/
$(document).ready(function() {
  $('.hp-button').hover(
    function(){

      $(this).find('.caption').fadeIn(350);
    },
    function(){
      $(this).find('.caption').fadeOut(200);
    }
  );
});

/*Roll-hover immagini winner*/

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

/* TOGGLE COME PARTECIPARE */
$(document).ready(function() {
  $("#boxes > .box").click( function() {
      $(".case-history").css("display", "none");
      var idx = $(".box").index($(this));
      $(".case-history").eq(idx).toggle(300);
  });
});
