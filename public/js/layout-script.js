// Wrap every letter in a span
$(window).on('load', function () {
    $('.loader').delay(150).fadeOut('slow');
});

var textWrapper = document.querySelector('.ml6 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});    
}

$(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 500) {
        $('.scroll-to-top').fadeIn();
    } else {
        $('.scroll-to-top').fadeOut();
    }
});

$(".upvote").on("click", function(e){

    tweet_id = $(this).attr("data-id");
    if($(this).hasClass("fa-thumbs-o-up")) {
        $(this).removeClass("fa-thumbs-o-up");
        $(this).addClass("fa-thumbs-up");
        $(this).addClass("text-success");
        $(this).next().removeClass("d-none");
        $(this).next().addClass("d-block");
        var saveData = $.ajax({
            type: "POST",
            url: window.location.origin+"/api/tweets/upvote",
            data: {"id": tweet_id},
            dataType: "text",
            success: function(resultData){
                $(".worked-number-"+tweet_id).html(parseInt($(".worked-number-"+tweet_id).html())+1);
                console.log("success");
                showAlert(tweet_id);
            }

        });
    }

});

anime.timeline({loop: true})
  .add({
    targets: '.ml6 .letter',
    translateY: ["1.1em", 0],
    translateZ: 0,
    duration: 750,
    delay: (el, i) => 50 * i
  }).add({
    targets: '.ml6',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
var btnWorked = document.getElementsByClassName("btn-worked");
var workedButtons = document.getElementsByClassName("workedbuttons");
var tweetData = document.getElementById("tweet-data");
var sliders = document.getElementsByClassName("slider");


$(".contact-button").on("click", function(e){
    console.log(e);
    $("#number-modal").html("");
    $id = $(this).attr("data-id");
    $phone_numbers = $(".phone-numbers-"+$id).children();
    if($(this).hasClass("whatsapp")){
        for(var i = 0 ; i < $phone_numbers.length ; i++)
        {
            $("#number-modal").append("<a target='_blank' href='https://api.whatsapp.com/send?phone=+91"+$phone_numbers[i].innerText+"' class='call'>"+$phone_numbers[i].innerText+"</a>");
        }
        
    }else if($(this).hasClass("call-button")) {
        for(var i = 0 ; i < $phone_numbers.length ; i++)
        {
            $("#number-modal").append("<a href='tel:+91"+$phone_numbers[i].innerText+"' class='call'>"+$phone_numbers[i].innerText+"</a>");
        }
    }
});

for(i=0; i<sliders.length;i++){
    id = "#"+sliders[i].childNodes[1].id;
    console.log(id);
        $(id).owlCarousel({
            items: 1,
            margin: 20,
            autoplay: true,
            smartSpeed: 700,
            loop: true,
            autoplayHoverPause: true,
            dots: false,
            nav :true,
            navText: ['<','>'],
        });
}

// SELECT2 INITIALIZATION
$(document).ready(function() {
    $('.cities').select2();
});
$(document).ready(function() {
    $('.needs').select2();
});


//ALERT DISPOSAL
function showAlert(tweet_id){
    window.setTimeout(function() {
        $(".upvote-alert-"+tweet_id).fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
}
//MAGNIFIC POPUP
$('.gallery-item').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled:true
        }
    });
});