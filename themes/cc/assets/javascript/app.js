// var header = document.getElementById("steps");

// if(header){
// window.onscroll = function() {myFunction()};

// var sticky = header.offsetTop;

// function myFunction() {
//   if (window.pageYOffset > sticky) {
//     header.classList.add("sticky");
//   } else {
//     header.classList.remove("sticky");
//   }
// }
// }

jQuery(document).ready(function($){
  $('body').on('click','.chatTrigger',function(e){
      Tawk_API.toggle();
      //console.log('testing');
      $('#chat-box').hide();
      $('#chat-box').removeClass('expand');
      e.preventDefault();
  });
  loadYTThumbs();
  Tawk_API.onChatHidden  = function(){
    console.log('testchat');
    $('#chat-box').show();
  };
});

$('#where').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        event.preventDefault();  
    }
});

$(".map-hover").click(function() {
  let side = $(this).data('side');
  let search = '';
  
  if(side == 'west') {
    search = 'Western US';
  }
  if(side == 'east') {
    search = 'Eastern US';
  }
  if(side == 'middle') {
    search = 'Middle US';
  }

  jQuery('#where').val('');
  $('#choose_area').val(search);

  getAreasFromArea(search,this);
});

$("body").on('click','.story__tab',function(){
  $('.story-row').removeClass('active');
  $(this).closest('.story-row').addClass('active');
});

jQuery('#where').on("input change paste keyup", function() {
  console.log(jQuery(this).val());
    if(jQuery(this).val() == ''){
      console.log('test');
      let country = jQuery('#choose_area option:selected').attr('value');
      console.log(country);
      getAreasFromArea(country,this);
    }
    else{
      getCountriesFromName($(this).val(),this);
    //jQuery('#choose_area option:selected').val('');
    }
});

jQuery('#choose_area').on('change',function(){
    getAreasFromArea($(this).val(),this);
    //let country = jQuery('#choose_country').attr('value');

    jQuery('#where').val('');

    //getCountriesFromArea(country,jQuery('#choose_country'));
    //console.log($(this).val());
    if($(this).val() == 'Western US'){
      $('.west').addClass('active-side').siblings().removeClass('active-side');
      $('#choose_country').find('option').hide();
      $('#choose_country').find('option[data-area="' + $(this).val() + '"]').show();
      $('#choose_country').prop("selectedIndex", 0);
    }
    else if($(this).val() == 'Eastern US'){
      $('.east').addClass('active-side').siblings().removeClass('active-side');
      $('#choose_country').find('option').hide();
      $('#choose_country').find('option[data-area="' + $(this).val() + '"]').show();
      $('#choose_country').prop("selectedIndex", 0);
    }
    else if($(this).val() == 'Middle US'){
      $('.middle').addClass('active-side').siblings().removeClass('active-side');
      $('#choose_country').find('option').hide();
      $('#choose_country').find('option[data-area="' + $(this).val() + '"]').show();
      $('#choose_country').prop("selectedIndex", 0);
    }
    else{
      $('.map-wrapper').removeClass('active-side');
      $('#choose_country').find('option').show();
      $('#choose_country').prop("selectedIndex", 0);
    }

});

jQuery('#choose_country').on('change',function(){
    getCountriesFromArea($(this).val(),this);
});

$( document ).ready(function () {
  $("#loadMoreAbout").hide();
  $(".gallery-img").slice(0, 6).show();
    if ($(".gallery-img:hidden").length != 0) {
      $("#loadMoreAbout").show();
    }   
    $("#loadMoreAbout").on('click', function (e) {
      e.preventDefault();
      $(".gallery-img:hidden").slice(0, 6).slideDown();
      if ($(".gallery-img:hidden").length == 0) {
        $("#loadMoreAbout").fadeOut('slow');
      }
    });   
});

$('body').on('submit','#chat-form',function(e){
  var phone = $('#input-phone').val();
  if(phone.length > 0){
    var chat_reset = $('.chat-box__inner').html();
    $(this).request('onCallMeNow', {
        data: {
          phone:phone
        },
        success: function(response){
          if(response){
            $('.chat-box__inner').html('<p>Thank you, you will be called soon.</p>');
            setTimeout(function(){
              $('.chat-box').removeClass('expand');
              $('.chat-box__inner').html(chat_reset);
            },2000);
          }
        }
    });
  }
  else{
    alert('Please enter phone number.');
  }
  e.preventDefault();
});

$('body').on('click',"#loadMoreReviews", function (e) {
  e.preventDefault();
  let page = $(this).data('page');
  $this = $(this);
  $('.filterReviews').request('onFilterReviews', {
      data: {
        page:page
      },
      update:{
        'testimonials/list':'.itemList',
      },
    success: function(response){
      //console.log(response.last);
      
      
      
      ////console.log(page);
      $('.filterReviews').attr('data-last',response.last);
   


      page++;
      //console.log(page);
      $('#loadMoreReviews').attr('data-page',page);

      if(response.last <= 1 || page >= response.last) $('#loadMoreReviews').hide();
      else $('#loadMoreReviews').show();

      $('.filterReviews').find('.itemList').append(response['testimonials/list']);

    }, 
  });
}); 

$('body').on('click',"#loadMoreVideos", function (e) {
  e.preventDefault();
  let page = $(this).data('page');
  $this = $(this);
  $('.filterVideos').request('onFilterVideos', {
      data: {
        page:page
      },
      update:{
        'testimonials/videos':'.itemList',
      },
    success: function(response){
      //console.log(response);
      //console.log(response.last); 
      
      
      //console.log(page);
      
      ////console.log(page);
      $('.filterVideos').attr('data-last',response.last);

      page++;
      $('#loadMoreVideos').attr('data-page',page);
      if(response.last <= 1 || page >= response.last) $('#loadMoreVideos').hide();
      else $('#loadMoreVideos').show();
      
      $('.filterVideos').find('.itemList').append(response['testimonials/videos']);
      loadYTThumbs();
    }, 
  });
}); 


function getCountriesFromName(name,$this){
    let selected_area = $('#choose_area option:selected').attr('value');
    //console.log(selected_area);
    $($this).request('onSearchArea',{
      data: {
        name:name,
        selected_area:selected_area
      },
      update:{
        'areas/list':'.itemList'
      },
      dataType:'json',
      success: function(response){
        console.log(response);
        $.each(response,function(i,v){
          console.log(v);
          if(i == 'areas/list') $('.itemList').html(v);
        });
      },
    });
}

function getCountriesFromArea(name,$this){
    $($this).request('onSelectCountry',{
      data: {
        name:name
      },
      update:{
        'areas/list':'.itemList'
      },
      dataType:'json',
      success: function(response){
        
        $.each(response,function(i,v){
          if(i == 'areas/list') $('.itemList').html(v);
        });
      },
    });
}

function getAreasFromArea(name,$this){

    let where = jQuery('#where').attr('value');

    $($this).request('onSelectArea',{
      data: {
        name:name
      },
      update:{
        'areas/list':'.itemList'
      },
      dataType:'json',
      success: function(response){
        
        $.each(response,function(i,v){
          if(i == 'areas/list') $('.itemList').html(v);
        });
      },
    });
}
 
function loadYTThumbs(){
   var videoIframe = $('.no-thumb,.video-item').find('iframe');
    
    videoIframe.each(function(index, item){
        var iframe           = $(item);
        //console.log(item);
        var iframe_src       = iframe.attr('src');
        var youtube_video_id = iframe_src.match(/youtube\.com.*(\?v=|\/embed\/)(.{11})/).pop();
         if (youtube_video_id.length == 11) {

            
            var video_thumbnail = $('<img src="//img.youtube.com/vi/'+ youtube_video_id +'/0.jpg">');
            iframe.closest('.media-box').find('.iframe-thumb').append(video_thumbnail);
            ////console.log(nameImg);
           
        }
    });
}