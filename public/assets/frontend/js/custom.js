/*--------------------- Copyright (c) 2020 -----------------------
[Master Javascript]
Project: Multifarious Services - Responsive HTML Template 
Version: 1.0.0
Assigned to: Theme Forest
-------------------------------------------------------------------*/
(function ($) {
	"use strict";
	/*-----------------------------------------------------
		Function  Start
	-----------------------------------------------------*/
		var Multifarious = {
			initialised: false,
			version: 1.0,
			mobile: false,
			init: function () {
				if (!this.initialised) {
					this.initialised = true;
				} else {
					return;
				}
				/*-----------------------------------------------------
					Function Calling
				-----------------------------------------------------*/
				this.preLoader();
				this.searchBox();
				this.cartBox();
				this.wowAnimation();
				this.navMenu();
				this.focusText();
				this.locTestimonial();
				this.TeamSlider();
				this.partner();
				this.counter();
				this.topButton();
				this.aboutTabs();
				this.gymVideo();
				this.gymClasses();
				this.calculatorTabs();
				this.niceSelectType();
				this.gymTestimonial();
				this.gymProduct();
				this.gymPartner();
				this.golBanner();
				this.serviceSlider();
				this.tabs();
				this.tiltAnimation();
				this.popupGallery();
				this.drTestimonial();
				this.popupVideo();
				this.aboutImg();
				this.paintTestimonial();
				this.goalTestimonial();
				this.wedSlider();
				this.wedingService();
				this.wedTestimonial();
				this.wedBlogSlider();
				this.thumbSlider();
				this.blogSlider();
				this.tourService();
				this.tourPackageSlider();
				this.tourTestimonial();
				this.saloonSlider();
				this.saloonTestimonial();
				this.saloonBlog();
			},

			/*-----------------------------------------------------
				Fix Preloader
			-----------------------------------------------------*/
			preLoader: function () {
				$(window).on('load', function () {
					$(".preloader_wrapper").removeClass('preloader_active');
				});
				jQuery(window).on('load', function () {
					setTimeout(function () {
						jQuery('.preloader_open').addClass('loaded');
					}, 100);
				});
			},

			/*-----------------------------------------------------
				Fix Search Bar & Cart
			-----------------------------------------------------*/
			searchBox: function () {
				$('.searchBtn').on("click", function () {
					$('.searchBox').addClass('show');
				});
				$('.closeBtn').on("click", function () {
					$('.searchBox').removeClass('show');
				});
				$('.searchBox').on("click", function () {
					$('.searchBox').removeClass('show');
				});
				$(".search_bar_inner").on('click', function () {
					event.stopPropagation();
				});
			},

			cartBox: function () {
				var cartCount = 0;
				$('.gym_cart_open').on("click", function(){
					if( cartCount == '0') {
						$('.gym_cart_open').addClass('show');
						cartCount++;
					}
					else {
						$('.gym_cart_open').removeClass('show');
						cartCount--;
					}		
				});
				$(".gym_cart_open, .gym_cart_box").on('click', function (e) {
					event.stopPropagation();
				});
				$('body').on("click", function(){
					if( cartCount == '1' ) {
						$('.gym_cart_open').removeClass('show');
						cartCount--;
					}
				});
			},

			/*-----------------------------------------------------
				Fix Animation 
			-----------------------------------------------------*/
			wowAnimation: function () {
				new WOW().init();
			},

			/*-----------------------------------------------------
				Fix Mobile Menu 
			-----------------------------------------------------*/
			navMenu: function () {
				var w = window.innerWidth;
				if (w <= 991) {
					$(".main_menu_wrapper>ul li").on('click', function () {
						$(this).find('ul.sub_menu').slideToggle();
						$(this).toggleClass("open");
					});
					$(".main_menu_wrapper>ul").on('click', function () {
						event.stopPropagation();
					});
					$(".menu_btn").on('click', function (e) {
						event.stopPropagation();
						$(".main_menu_wrapper, .menu_btn_wrap").toggleClass("open");
					});
					$("body").on('click', function () {
						$(".main_menu_wrapper, .menu_btn_wrap").removeClass("open");
					});
				}
			},

			/*-----------------------------------------------------
				Fix  On focus Placeholder
			-----------------------------------------------------*/
			focusText: function () {
				var place = '';
				$('input,textarea').focus(function () {
					place = $(this).attr('placeholder');
					$(this).attr('placeholder', '');
				}).blur(function () {
					$(this).attr('placeholder', place);
				});
			},
			/*-----------------------------------------------------
				Fix Testimonial Slider 
			-----------------------------------------------------*/
			locTestimonial: function () {
				var TestimonSwiper = new Swiper('.loc_testimonial_slider .swiper-container', {
					autoHeight: false,
					autoplay: true,
					loop: true,
					spaceBetween: 0,
					effect: 'fade',
					centeredSlides: false,
					speed: 1500,
					pagination: {
						el: '.loc_testimonial_bullets',
						clickable: true,
					},
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
				});
			},

			/*-----------------------------------------------------
				Fix Team Slider 
			-----------------------------------------------------*/
			TeamSlider: function () {
				var TeamSwiper = new Swiper('.team_slider.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 4,
					loop: true,
					speed: 3000,
					autoplay: {
						delay: 3000,
					},
					centeredSlides: false,
					navigation: {
						nextEl: '.swiper-button-next1',
						prevEl: '.swiper-button-prev1',
					},
					pagination: {
						el: '.swiperPagination',
						clickable: true,
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 0,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 10,
						},
						767: {
							slidesPerView: 2,
							spaceBetween: 20,
						},
						992: {
							slidesPerView: 3,
							spaceBetween: 20,
						},
						1200: {
							slidesPerView: 4,
							spaceBetween: 30,
						},
					},
				});
			},			

			/*-----------------------------------------------------
				Fix Partner Slider 
			-----------------------------------------------------*/
			partner: function () {
				var PartnerSwiper = new Swiper('.partner_slider.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 8,
					loop: true,
					speed: 2000,
					autoplay: {
						delay: 1000,
					},
					breakpoints: {
						0: {
							slidesPerView: 2,
							spaceBetween: 0,
						},
						575: {
							slidesPerView: 2,
							spaceBetween: 10,
						},
						767: {
							slidesPerView: 4,
							spaceBetween: 20,
						},
						992: {
							slidesPerView: 6,
							spaceBetween: 20,
						},
						1200: {
							slidesPerView: 6,
							spaceBetween: 30,
						},
					},
				});
			},

			/*-----------------------------------------------------
				Fix Counter
			-----------------------------------------------------*/
			counter: function () {
				if($('.counter_holder').length > 0){
					var a = 0;
					$(window).scroll(function() {
						var topScroll = $('.counter_holder').offset().top - window.innerHeight;
						if (a == 0 && $(window).scrollTop() > topScroll) {
						$('.count_no').each(function() {
							var $this = $(this),
							countTo = $this.attr('data-count');
							$({
							countNum: $this.text()
							}).animate({
								countNum: countTo
							},
							{
							duration: 5000,
							easing: 'swing',
							step: function() {
								$this.text(Math.floor(this.countNum));
							},
							complete: function() {
								$this.text(this.countNum);
							}
							});
						});
						a = 1;
						}
					});
				};
			},

			/*-----------------------------------------------------
				Fix GoToTopButton
			-----------------------------------------------------*/
			topButton: function () {
				var scrollTop = $("#scroll");
				$(window).on('scroll', function () {
					if ($(this).scrollTop() < 500) {
						scrollTop.removeClass("active");
					} else {
						scrollTop.addClass("active");
					}
				});
				$('#scroll').click(function () {
					$("html, body").animate({
						scrollTop: 0
					}, 2000);
					return false;
				});

				$(function() {
					$('.go_to_demo').click (function() {
						$('html, body').animate({scrollTop: $('#go_to_demo').offset().top }, 'slow');
						return false;
					});
				});
			},

			/*-----------------------------------------------------
				Fix About Page Tabs 
			-----------------------------------------------------*/
			aboutTabs: function () {
				$('.loc_tabs_nav li:first-child').addClass('active');
				$('.loc_single_tab').hide();
				$('.loc_single_tab:first').show();
				$('.loc_tabs_nav li').click(function () {
					$('.loc_tabs_nav li').removeClass('active');
					$(this).addClass('active');
					$('.loc_single_tab').hide();
					var activeTab = $(this).find('a').attr('href');
					$(activeTab).fadeIn();
					return false;
				});
			},

			/*-----------------------------------------------------
				Fix Video Popup
			-----------------------------------------------------*/
			gymVideo: function () {
				if ($('.video_popup').length > 0) {
					$('.video_popup').magnificPopup({
						type: 'iframe',
						iframe: {
							markup: '<div class="mfp-iframe-scaler">' +
								'<div class="mfp-close"></div>' +
								'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
								'<div class="mfp-title">Some caption</div>' +
								'</div>',
							patterns: {
								youtube: {
									index: 'youtube.com/',
									id: 'v=',
									src: 'https://www.youtube.com/embed/oNxCporOofo'
								}
							}
						}
					});
				}
			},

			/*-----------------------------------------------------
				Fix gymClasses Slider 
			-----------------------------------------------------*/
			gymClasses: function () {
				var gymClassesSwiper = new Swiper('.gym_class_slider .swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 6,
					loop: true,
					speed: 2000,
					centeredSlides: true,
					autoplay: {
						delay: 1000,
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 0,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 10,
						},
						767: {
							slidesPerView: 1,
							spaceBetween: 20,
						},
						768: {
							slidesPerView: 2,
							spaceBetween: 20,
						},
						992: {
							slidesPerView: 3,
							spaceBetween: 30,
						},
						1200: {
							slidesPerView: 4,
							spaceBetween: 30,
						},
						1920: {
							slidesPerView: 6,
							spaceBetween: 30,
						},
					},
				});
			},

			/*-----------------------------------------------------
				Fix Calculater Tabs 
			-----------------------------------------------------*/
			calculatorTabs: function () {
				$('.gym_tabs_nav li:first-child').addClass('active');
				$('.gym_single_tab').hide();
				$('.gym_single_tab:first').show();
				$('.gym_tabs_nav li').click(function () {
					$('.gym_tabs_nav li').removeClass('active');
					$(this).addClass('active');
					$('.gym_single_tab').hide();
					var activeTab = $(this).find('a').attr('href');
					$(activeTab).fadeIn();
					return false;
				});
			},

			/*-----------------------------------------------------
				Fix Select Field
			-----------------------------------------------------*/
			niceSelectType:function(){
				if($('select').length > 0){
					$('select').niceSelect();	
				}
			},

			/*-----------------------------------------------------
				Fix GYM Testimonial Slider 
			-----------------------------------------------------*/
			gymTestimonial: function () {
				var TestimonialSwiper = new Swiper('.swiper-container.s1', {
					autoHeight: false,
					autoplay: false,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 1500,
					autoplay: {
						delay: 1000,
					},
					navigation: {
						nextEl: '.swiperButtonNext',
						prevEl: '.swiperButtonPrev',
					},
				});
			},

			/*-----------------------------------------------------
				Fix GYM Product Slider 
			-----------------------------------------------------*/
			gymProduct: function () {
				var productSwiper = new Swiper('.featured_product_slider.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 4,
					loop: true,
					speed: 1000,
					autoplay: {
						delay: 1000,
					},
					centeredSlides: false,
					navigation: {
						nextEl: '.NextProduct',
						prevEl: '.PrevProduct',
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 0,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 10,
						},
						767: {
							slidesPerView: 2,
							spaceBetween: 20,
						},
						992: {
							slidesPerView: 3,
							spaceBetween: 20,
						},
						1200: {
							slidesPerView: 4,
							spaceBetween: 30,
						},
					},
				});
			},
			/*-----------------------------------------------------
				Fix GYM Partner Slider 
			-----------------------------------------------------*/
			gymPartner: function () {
				var partnersSwiper = new Swiper('.partners_slider.swiper-container, .saf_partner_slider.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 6,
					loop: true,
					speed: 1500,
					autoplay: {
						delay: 1000,
					},
					breakpoints: {
						0: {
							slidesPerView: 2,
							spaceBetween: 0,
						},
						575: {
							slidesPerView: 2,
							spaceBetween: 10,
						},
						767: {
							slidesPerView: 3,
							spaceBetween: 20,
						},
						992: {
							slidesPerView: 5,
							spaceBetween: 20,
						},
						1200: {
							slidesPerView: 6,
							spaceBetween: 30,
						},
					},
				});
			},
			/*-----------------------------------------------------
				Fix Testimonial Slider 
			-----------------------------------------------------*/
			drTestimonial: function () {
				var testimonialSwiper = new Swiper('.swiper-container.arrowNavTestimonials', {
					autoHeight: false,
					autoplay: false,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 1000,
					autoplay: {
						delay: 1000,
					},
					pagination: {
						el: '.pagination',
						clickable: true,
					},
					navigation: {
						nextEl: '.testTwoButtonPrev',
						prevEl: '.testTwoButtonNext',
					},
				});
			},

			paintTestimonial: function () {
				var paintSwiper = new Swiper('.swiper-container.t2', {
					autoHeight: false,
					autoplay: false,
					loop: true,
					spaceBetween: 0,
					effect: 'fade',
					centeredSlides: false,
					speed: 1500,
					autoplay: {
						delay: 1000,
					},
					navigation: {
						nextEl: '.testTwoButtonNext',
						prevEl: '.testTwoButtonPrev',
					},
				});
			},

			goalTestimonial: function () {
				var testimonialSwiper = new Swiper('.swiper-container.testimonials', {
					autoHeight: false,
					autoplay: false,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 1500,
					autoplay: {
						delay: 1000,
					},
					pagination: {
						el: '.pagination',
						clickable: true,
					},
				});
			},

			thumbSlider: function () {
				var galleryThumbs = new Swiper('.gallery-thumbs', {
					spaceBetween: 10,
					centeredSlides: true,
					slidesPerView: '3',
					touchRatio: 0.2,
					slideToClickedSlide: true,
					loop: true,
					loopedSlides: 3,
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 0,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 0,
						},
						767: {
							slidesPerView: 1,
							spaceBetween: 10,
						},
						768: {
							slidesPerView: 3,
							spaceBetween: 10,
						},
						992: {
							slidesPerView: 3,
							spaceBetween: 10,
						},
						1200: {
							slidesPerView: 3,
							spaceBetween: 10,
						},
					},
				});
				var galleryTop = new Swiper('.gallery-top', {
					spaceBetween: 0,
					navigation: {
					nextEl: '.thumbNext',
					prevEl: '.thumbPrev',
					},
					loop: true,
					loopedSlides: 3,
					thumbs: {
						swiper: galleryThumbs,
					},
				});
			},

			saloonTestimonial: function () {
				var saloonTestimonialSwiper = new Swiper('.swiper-container.saloonTestimonial', {
					autoHeight: false,
					autoplay: true,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 2000,
					autoplay: {
						delay: 1000,
					},
					pagination: {
						el: '.testimonialBullets',
						clickable: true,
					},
					navigation: {
						nextEl: '.testNextButton',
						prevEl: '.testPrevButton',
					},
				});
			},

			/*-----------------------------------------------------
				Fix Goal Banner Slider 
			-----------------------------------------------------*/
			golBanner: function () {
				var bannerSwiper = new Swiper('.swiper-container.gol_banner_slider, .swiper-container.vot_banner_slider, .swiper-container.dr_banner_slider, .swiper-container.sal_banner_slider, .swiper-container.saf_banner_slider', {
					autoHeight: false,
					autoplay: true,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 2000,
					autoplay: {
						delay: 3000,
					},
					keyboard: {
						enabled: true,
					},
					navigation: {
						nextEl: '.ButtonNext',
						prevEl: '.ButtonPrev',
					},
					pagination: {
						el: '.pagination',
						clickable: true,
					},
				});
			},

			/*-----------------------------------------------------
				Fix goal Service Slider 
			-----------------------------------------------------*/
			serviceSlider: function () {
				var serviceSlider = new Swiper('.service_slider.swiper-container', {
					autoHeight: false,
					spaceBetween: 30,
					slidesPerView: 4,
					loop: true,
					autoplay: true,
					speed: 2000,
					centeredSlides: false,
					autoplay: {
						delay: 1000,
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						767: {
							slidesPerView: 2,
							spaceBetween: 20,
						},
						768: {
							slidesPerView: 1,
							spaceBetween: 30,
						},
						992: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1200: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1920: {
							slidesPerView: 4,
							spaceBetween: 30,
						},
					},
				});
			},

			/*-----------------------------------------------------
				Fix Tabs
			-----------------------------------------------------*/
			tabs: function () {
				
				$('.tabs_nav li:first-child').addClass('active');
				$('.single_tab').hide();
				$('.single_tab:first').show();
				$('.tabs_nav li').click(function () {
					$('.tabs_nav li').removeClass('active');
					$(this).addClass('active');
					$('.single_tab').hide();
					var activeTab = $(this).find('a').attr('href');
					$(activeTab).fadeIn();
					return false;
				});
				
			},

			/*-----------------------------------------------------
				Fix Image Animation
			-----------------------------------------------------*/
			tiltAnimation: function () {
				var tiltAnimation = $('.parallax')
				if (tiltAnimation.length) {
					tiltAnimation.tilt({
						max: 12,
						speed: 1e3,
						easing: 'cubic-bezier(.03,.98,.52,.99)',
						transition: !1,
						perspective: 1e3,
						scale: 1
					})
				}
			},

			/*-----------------------------------------------------
				Fix Gallery Magnific Popup
			-----------------------------------------------------*/
			popupGallery: function () {
				jQuery(document).ready(function(){
					$('.popup_gallery, .popup_gallery1, .popup_gallery2, .popup_gallery3').magnificPopup({
						delegate: 'a',
						type: 'image',
						tLoading: 'Loading image #%curr%...',
						mainClass: 'mfp-img-mobile',
						gallery: {
							enabled: true,
							navigateByImgClick: true,
							preload: [0,1] // Will preload 0 - before current, and 1 after the current image
						},
						image: {
							tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
							titleSrc: function(item) {
								return item.el.attr('title') + '<small></small>';
							}
						}
					});
				});
			},

			/*-----------------------------------------------------
				Fix Weding Slider 
			-----------------------------------------------------*/
			wedSlider: function () {
				var wedSlider = new Swiper('.married_slider.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 4,
					loop: true,
					speed: 3000,
					centeredSlides: false,
					autoplay: {
						delay: 2000,
					},
					navigation: {
						nextEl: '.prev',
						prevEl: '.next',
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						767: {
							slidesPerView: 2,
							spaceBetween: 20,
						},
						768: {
							slidesPerView: 1,
							spaceBetween: 30,
						},
						992: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1200: {
							slidesPerView: 4,
							spaceBetween: 30,
						},
					},
				});
			},

			/*-----------------------------------------------------
			Fix Weding Service Slider 
			-----------------------------------------------------*/
			wedingService: function () {
				var wedingService = new Swiper('.swiper-container.wedingService', {
					autoHeight: false,
					autoplay: false,
					slidesPerView: 1,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 3000,
					autoplay: {
						delay: 3000,
					},
					pagination: {
						el: '.bullets',
						clickable: true,
					},
				});
			},
			/*-----------------------------------------------------
				Fix Weding Slider 
			-----------------------------------------------------*/
			wedTestimonial: function () {
				var wedTestimonial = new Swiper('.wedTestimonial.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 0,
					slidesPerView: 1,
					effect: 'fade',
					loop: true,
					speed: 1500,
					centeredSlides: false,
					autoplay: {
						delay: 2000,
					},
					navigation: {
						nextEl: '.prev',
						prevEl: '.next',
					},
				});
			},
			/*-----------------------------------------------------
				Fix Weding Blog Slider 
			-----------------------------------------------------*/
			wedBlogSlider: function () {
				var wedBlogSlider = new Swiper('.wedBlog.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 3,
					loop: true,
					speed: 2000,
					centeredSlides: false,
					autoplay: {
						delay: 1500,
					},
					pagination: {
						el: '.bullets',
						clickable: true,
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						767: {
							slidesPerView: 2,
							spaceBetween: 20,
						},
						768: {
							slidesPerView: 1,
							spaceBetween: 30,
						},
						992: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1200: {
							slidesPerView: 3,
							spaceBetween: 30,
						},
					},
				});
			},
			/*-----------------------------------------------------
				Fix Safty Blog Slider 
			-----------------------------------------------------*/
			blogSlider: function () {
				var blogSlider = new Swiper('.blogSlider', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 2,
					loop: true,
					speed: 2000,
					centeredSlides: false,
					autoplay: {
						delay: 1000,
					},
					navigation: {
						nextEl: '.blogPrev',
						prevEl: '.blogNext',
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						767: {
							slidesPerView: 1,
							spaceBetween: 20,
						},
						768: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						992: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1200: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
					},
				});
			},
			/*-----------------------------------------------------
				Fix Tour Service Slider 
			-----------------------------------------------------*/
			tourService: function () {
				var tourService = new Swiper('.tour_service.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 4,
					loop: true,
					speed: 3000,
					centeredSlides: false,
					autoplay: {
						delay: 2000,
					},
					navigation: {
						nextEl: '.next',
						prevEl: '.prev',
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						767: {
							slidesPerView: 2,
							spaceBetween: 20,
						},
						768: {
							slidesPerView: 1,
							spaceBetween: 30,
						},
						992: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1200: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1920: {
							slidesPerView: 4,
							spaceBetween: 30,
						},
					},
				});
			},

			/*-----------------------------------------------------
				Fix Tour Video Popup
			-----------------------------------------------------*/
			popupVideo: function () {
				$('.popup-youtube').magnificPopup({
					type: 'iframe'
				});
			},

			/*-----------------------------------------------------
				Fix Tour Package Slider 
			-----------------------------------------------------*/
			tourPackageSlider: function () {
				var tourPackageSlider = new Swiper('.tour_package.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 4,
					loop: true,
					speed: 3000,
					centeredSlides: false,
					autoplay: {
						delay: 2000,
					},
					pagination: {
						el: '.bullets',
						clickable: true,
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 15,
						},
						767: {
							slidesPerView: 1,
							spaceBetween: 20,
						},
						768: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						992: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1200: {
							slidesPerView: 3,
							spaceBetween: 30,
						},
						1920: {
							slidesPerView: 4,
							spaceBetween: 30,
						},
					},
				});
			},

			/*-----------------------------------------------------
				Fix Tour Testimonial Slider 
			-----------------------------------------------------*/
			tourTestimonial: function () {
				var tourTestimonial = new Swiper('.tourTestimonial.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 0,
					slidesPerView: 1,
					effect: 'fade',
					loop: true,
					speed: 1500,
					centeredSlides: false,
					autoplay: {
						delay: 1000,
					},
					navigation: {
						nextEl: '.testNext',
						prevEl: '.testPrev',
					},
				});
			},

			/*-----------------------------------------------------
				Fix Saloon About Slider 
			-----------------------------------------------------*/
			aboutImg: function () {
				var aboutImg = new Swiper('.swiper-container.aboutImg', {
					autoHeight: false,
					autoplay: true,
					slidesPerView: 1,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 2000,
					autoplay: {
						delay: 2000,
					},
					navigation: {
						nextEl: '.NextImg',
						prevEl: '.PrevImg',
					},
				});
			},
			
			/*-----------------------------------------------------
				Fix Saloon Gallery Slider 
			-----------------------------------------------------*/
			saloonSlider: function () {
				var saloonSlider = new Swiper('.swiper-container.saloonSlider', {
					autoHeight: false,
					autoplay: true,
					slidesPerView: 1,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 3000,
					autoplay: {
						delay: 2000,
					},
					pagination: {
						el: '.slideBullets',
						clickable: true,
					},
				});
			},
			
			/*-----------------------------------------------------
				Fix Saloon Blog Slider 
			-----------------------------------------------------*/
			saloonBlog: function () {
				var saloonBlogSwiper = new Swiper('.saloonBlog.swiper-container', {
					autoHeight: false,
					autoplay: true,
					spaceBetween: 30,
					slidesPerView: 3,
					loop: true,
					speed: 2000,
					autoplay: {
						delay: 1000,
					},
					navigation: {
						nextEl: '.blogNextButton',
						prevEl: '.blogPrevButton',
					},
					breakpoints: {
						0: {
							slidesPerView: 1,
							spaceBetween: 0,
						},
						575: {
							slidesPerView: 1,
							spaceBetween: 10,
						},
						767: {
							slidesPerView: 1,
							spaceBetween: 20,
						},
						992: {
							slidesPerView: 2,
							spaceBetween: 20,
						},
						1200: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
						1920: {
							slidesPerView: 3,
							spaceBetween: 30,
						},
					},
				});
			},

		};

		Multifarious.init();

})(jQuery);

/*-----------------------------------------------------
	Fix Contact Form Submission
-----------------------------------------------------*/
// Contact Form Submission
function checkRequire(formId , targetResp){
    targetResp.html('');
    var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
    var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
    var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
    var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
    var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
    var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
    var check = 0;
    $('#er_msg').remove();
    var target = (typeof formId == 'object')? $(formId):$('#'+formId);
    target.find('input , textarea , select').each(function(){
        if($(this).hasClass('require')){
            if($(this).val().trim() == ''){
                check = 1;
                $(this).focus();
                $(this).parent('div').addClass('form_error');
                targetResp.html('You missed out some fields.');
                $(this).addClass('error');
                return false;
            }else{
                $(this).removeClass('error');
                $(this).parent('div').removeClass('form_error');
            }
        }
        if($(this).val().trim() != ''){
            var valid = $(this).attr('data-valid');
            if(typeof valid != 'undefined'){
                if(!eval(valid).test($(this).val().trim())){
                    $(this).addClass('error');
                    $(this).focus();
                    check = 1;
                    targetResp.html($(this).attr('data-error'));
                    return false;
                }else{
                    $(this).removeClass('error');
                }
            }
        }
    });
    return check;
}
$(".submitForm").on('click', function() {
    var _this = $(this);
    var targetForm = _this.closest('form');
    var errroTarget = targetForm.find('.response');
    var check = checkRequire(targetForm , errroTarget);
    
    if(check == 0){
       var formDetail = new FormData(targetForm[0]);
        formDetail.append('form_type' , _this.attr('form-type'));
        $.ajax({
            method : 'post',
            url : 'ajaxmail.php',
            data:formDetail,
            cache:false,
            contentType: false,
            processData: false
        }).done(function(resp){
            console.log(resp);
            if(resp == 1){
                targetForm.find('input').val('');
                targetForm.find('textarea').val('');
                errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
            }else{
                errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
            }
        });
    }
});

/* Video Popup*/
jQuery(document).ready(function ($) {
  // Define App Namespace
  var popup = {
    // Initializer
    init: function() {
      popup.popupVideo();
    },
    popupVideo : function() {

    $('.video_model').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    gallery: {
          enabled:true
        }
  });

/* Image Popup*/ 
 $('.gallery_container').magnificPopup({
      delegate: 'a',
    type: 'image',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    gallery: {
          enabled:true
        }
  });

    }
  };
  popup.init($);
});





//////  Live Chat //////

