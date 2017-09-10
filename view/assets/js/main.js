// open close sidebar menu
// var devWidth = $(window).width();


// open big img
$(document).on('click', '.image-small', function() {
  var srcImg = $(this).attr('data-image');
  addEllement(srcImg);
});

function addEllement(srcImg){
  var forImgBg = '<div class="_bg-for-img"><img src=' + srcImg + '></div>';
  var curentOpenImg = '.image-middle';
  $('body').append(forImgBg);
  $('._bg-for-img').click(function() {
    $('._bg-for-img').remove();
  });
}


function openSidebar (){

  var devWidth = $(window).width();

  if (devWidth > 1400) {
    $('.wrapper').removeClass('menu-open');
    $('.sidebar-toggle').click(function (){
      $('.wrapper').toggleClass('menu-close');
    })
  }
  if (devWidth < 1400){
    $('body').css({
      'overflow-x': 'hidden',
    });
    $('.wrapper').removeClass('menu-close');
    $('.sidebar-toggle').click(function (){
      $('.wrapper').toggleClass('menu-open');
    })
  }

}

$(window).on('load resize', openSidebar);


$('.ui-jqgrid-htable').addClass('table table-striped');