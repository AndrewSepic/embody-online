//
//  Custom JS for Naada's Clini pages
//  by Andrew@thinkupdesign.ca
//

jQuery( document ).ready(function( $ ) {

  openCloak();
  saunaScroll();
  healcodeWidgetReady();

  // Test to see when Healcode Widget is loaded
  function healcodeWidgetReady(){
      var healCodeLoadingInterval2 = setInterval(function(){
        var healCodeLoading2 = $('div.healcode form');
        // if the healcode .enrollment div is loaded and has content
        if (healCodeLoading2.length !== 0) {
         //  callback();
          swapTitle();
          AddYTIntakeLink();
          clearInterval(healCodeLoadingInterval2);
        }
      },100);
  }

  function swapTitle() {
    //$('')
    console.log('Its loaded!');
    var title = $('div.pre-filters div span');
    title.each(function(){
      var str = $(this).text().replace(/Instructor:/g, 'Therapist:');
      // if ($(this).text().length > 18){
      // //  console.log(this);
      //   var year = new Date().getFullYear();
      //   //var yearPos = this.str.search(year);
      //   str.replace(/year/g,'');
      // }
      $(this).text(str);
    })
  }

  function openCloak() {
    $('a.openAppoint').on("click", function(e){
      e.preventDefault();
      var name = $( this ).attr('data-name');
      if (name) {
        console.log('ATTR: div.bookingCloak#' + name );
        $('div.bookingCloak#' + name ).slideDown('slow');
      } else {
        console.log('div.bookingCloak only');
        $('div.bookingCloak').slideDown('slow');
      }
    });
  }

  // function openCloak() {
  //   console.log(this);
  //   $('a.openAppoint').on("click", function(e){
  //     e.preventDefault();
  //     $('div.bookingCloak').slideDown('slow');
  //   })
  // }

  function AddYTIntakeLink() {
    //$('#session_type').change(function(){
    //   if($(this).val() == 'Yoga Therapy'){ // or this.value == 'volvo'
    //$("select#session_type option[value="Yoga Therapy"]")
    $("select#session_type").change(function(){
      if($(this).val()==78){ // EDITED THIS LINE
        console.log('Yoga Therapy is selected!');
        $('div.healcode form .pre-filters').after("<div class=\"ytNotice\"><h4>You've selected a yoga therapy treatment</h4> <p>Please follow <a href=\"/therapeutics/book-appointment\" target=\"_blank\">this link</a> to fill out the new client assessment form. And return to this page to continue your booking.</p></div>");
      }
      else if($(this).val()!=78) {
        console.log('Yoga Therapy is no longer selected');
        $('div.ytNotice').empty();
      }
    })
  }

  function saunaScroll() {
    $('a.sauna').on("click", function(e){
      e.preventDefault();
      $('html, body').animate({
       scrollTop: $("h2.sauna").offsetParent().offset().top
      }, 1500);
    })
  }

});
