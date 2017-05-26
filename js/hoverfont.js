var typefacehover = function() {
 $(".typeface-js")
   .each(
     function() {
      // Get all the classes for an element.
      var elementStyles = $(this).attr('class');
      elementStyles = elementStyles.split(' ');
      // Run through them and check for a :hover color
      // property.
      var hoverColor = '#fff';
      for ( var i in elementStyles) {
       var temp = getCSSColor("." + elementStyles[i]
         + ':hover');
       if (temp) {
        hoverColor = temp;
       }
      }
      if (hoverColor) {
       var element = $(this).html();
       // Duplicate the element, create a new hover version
       // of the element (hidden) and add a container to
       // each one so that we can distinguish between the
       // two.
       var hoverElement = '<div class="typeface-js-hover" style="color:'
         + hoverColor
         + ';display:none">'
         + element
         + '</div>';
       element = '<div class="typeface-js-nohover">'
         + element + '</div>';
       var newElement = element + hoverElement;
       $(this).html(newElement);

       // Add the event listener. You could do fade
       // transitions here if you wanted to be fancy.
       var me = this;
       $(this).hover(function() {
        $(me).find(".typeface-js-nohover").hide();
        $(me).find(".typeface-js-hover").show();
       }, function() {
        $(me).find(".typeface-js-hover").hide();
        $(me).find(".typeface-js-nohover").show();
       });
      }
     });
};

var getCSSColor = function(selector) {
 var re = new RegExp('(^|,)\\s*' + selector.toLowerCase() + '\\s*(,|$)');
 var color;
 $.each($.makeArray(document.styleSheets), function() {
  $.each(this.cssRules || this.rules, function() {
   if (re.test(this.selectorText)) {
    color = this.style.color;
   }
  });
 });
 return color;
};