$(document).ready(function(){

	var isMobile= /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
	if( isMobile ) {
		$("#callus").attr("href", "https://api.whatsapp.com/send?phone=918304978787");
	}
	else{
		$("#callus").removeAttr("href");
	}

	$('.banner-slider').owlCarousel({
		loop:true,
		margin:10,
		autoplay:false,
		autoplayTimeout:1000,
		items:1,
		dots:false,
		animateOut: 'fadeOut'

	});
	$('.leaders-slider').owlCarousel({
		items:1,
		loop:true,
		margin:10,
		autoplay:true,
		autoplayTimeout:1000,
		dots:false,
		animateOut: 'fadeOut'

	});
	$('.careers-slider').owlCarousel({
		items:1,
		loop:true,
		margin:10,
		autoplay:true,
		autoplayTimeout:1000,
		dots:false,
		animateOut: 'fadeOut'

	});

	$(".video-section").mouseenter(function(){
		$(".overlay").hide();
		$(".play-button img").css("opacity", "0.8");
	});
	$(".video-section").mouseleave(function(){
		$(".overlay").show();
		$(".play-button img").css("opacity", "1");
	});
	$(".play-button").click(function(){
		$(".play-button").css("display", "none");
		$(".play-button img").hide();
		$("video").attr("controls", "controls");
		$(".overlay").css("opacity", "0");
	});
	$("#myVideo").click(function(){
		pauseVid();
	});

	$(".sell-button").click(function(){
		$(".contact-modal").addClass("open");
		$("body").addClass("overflow-hidden");
	});
	$(".sell-close").click(function(){
		$(".contact-modal").removeClass("open");
		$("body").removeClass("overflow-hidden");

	});


	[].forEach.call(document.querySelectorAll('img[data-src]'),    function(img) {
		img.setAttribute('src', img.getAttribute('data-src'));
		img.onload = function() {
			img.removeAttribute('data-src');
		};
	});

	$("#call-link").click(function(){
		
	});

});

var vid = document.getElementById("myVideo"); 

function playVid() { 
	vid.play(); 
} 

function pauseVid() { 
	vid.pause(); 
} 
