//jQuery to collapse the navbar on scroll
// $(window).scroll(function() {
//     if ($(".navbar").offset().top > 50) {
//         $(".navbar-fixed-top").addClass("top-nav-collapse");
//     } else {
//         $(".navbar-fixed-top").removeClass("top-nav-collapse");
//     }
// });

//jQuery for page scrolling feature - requires jQuery Easing plugin
// $(function() {
//     $('a.page-scroll').bind('click', function(event) {
//         var $anchor = $(this);
//         $('html, body').stop().animate({
//             scrollTop: $($anchor.attr('href')).offset().top
//         }, 1500, 'easeInOutExpo');
//         event.preventDefault();
//     });
// });

$(function() {
    $('a.page-scroll').on('click',function(event){
        $(".page-active").children("li").removeClass("active");
        $(this).parent("li").addClass("active");
    });
});
$(function() {
    var popoverTemplate = ['<div class="timePickerWrapper popover">',
        '<div class="arrow"></div>',
        '<div class="popover-content">',
        '</div>',
        '</div>'].join('');

    var content = ['<div class="timePickerCanvas">asfaf asfsadf</div>',
        '<div class="timePickerClock timePickerHours">asdf asdfasf</div>',
        '<div class="timePickerClock timePickerMinutes"> asfa </div>', ].join('');

     $('[data-toggle="popover"]').popover({
        selector: '[rel=popover]',
        trigger: 'click',
        content: content,
        template: popoverTemplate,
        placement: "bottom",
        html: true,
        container:'body'
     });
         
       
});