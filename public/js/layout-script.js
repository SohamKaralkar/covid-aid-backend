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


tweetData.onclick = function(event){
   
    if(event.target.classList.contains("call-button") || event.target.classList.contains("fa-phone")){
        var numberModal = document.getElementById("number-modal");
        var length = event.path[2].childNodes[7].childNodes.length;
        numberModal.innerHTML = "";
        for(i=0; i< length ;i++){
            if(i%2 != 0){
                numberModal.innerHTML = numberModal.innerHTML + '<a href="tel:+91'+event.path[2].childNodes[7].childNodes[i].innerHTML+'" class="call">'+ event.path[2].childNodes[7].childNodes[i].innerHTML+'</a>'
            }
        }
    }

    if(event.target.classList.contains("whatsapp") || event.target.classList.contains("fa-whatsapp")){
        var numberModal = document.getElementById("number-modal");
        var length = event.path[2].childNodes[7].childNodes.length;
        numberModal.innerHTML = "";
        for(i=0; i< length ;i++){
            if(i%2 != 0){
                console.log(i);
                numberModal.innerHTML = numberModal.innerHTML + '<a href="https://api.whatsapp.com/send?phone=+91'+event.path[2].childNodes[7].childNodes[i].innerHTML+'" class="call">'+ event.path[2].childNodes[7].childNodes[i].innerHTML+'</a>'
            }
        }
    }
}

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