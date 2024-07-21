//
//  Custom JS for Naada's NYTT Landing Pages
//  by Andrew@thinkupdesign.ca
//

jQuery( document ).ready(function( $ ) {


  function openSchedule() {
    var delay = 1000; // 2second
    setTimeout(function(){
      $('.r-tabs-panel').each(function(){
        $(this).find('a.showSchedule').on("click", function(e){
          e.preventDefault();
          console.log('clicked');
          $(this).next().slideToggle('slow');
        });
      })
    }, delay);
  }

  $('#nyttTabs').responsiveTabs({
      startCollapsed: 'accordion'
  });

  $('#nyttTabs2').responsiveTabs({
      startCollapsed: 'accordion'
  });

  function accordionInit() {
    var icons = {
        header: "down-default",
        activeHeader: "up-green"
      };

    $( ".nytt-accordion" ).accordion({
      heightStyle: "content",
      icons: icons,
      collapsible: true
    });

    $( "#toggle" ).button().on( "click", function() {
        if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
          $( "#accordion" ).accordion( "option", "icons", null );
        } else {
          $( "#accordion" ).accordion( "option", "icons", icons );
        }
      });
    }

    accordionInit();

    //Only run OpenSchedule is above breakpoint for responsive tabs
    if(window.screen.width > 768) {
      openSchedule();
    }
    else {
      // silence is golden
    }

});
