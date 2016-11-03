(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
(function() {
  (function($) {
    return jQuery(document).ready(function() {
      var address, initialize;
      if ($('#map_canvas').length) {
        address = $('#map_canvas').attr('data');
        initialize = function() {
          var geocoder, latlng, map, myOptions;
          geocoder = new google.maps.Geocoder;
          latlng = new google.maps.LatLng(-34.397, 150.644);
          myOptions = {
            zoom: 12,
            center: latlng,
            mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
          };
          map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
          window.map = map;
          map.setOptions({
            styles: [
              {
                'featureType': 'administrative',
                'elementType': 'labels',
                'stylers': [
                  {
                    'visibility': 'simplified'
                  }, {
                    'color': '#555555'
                  }
                ]
              }, {
                'featureType': 'landscape',
                'elementType': 'all',
                'stylers': [
                  {
                    'color': '#111111'
                  }, {
                    'visibility': 'simplified'
                  }
                ]
              }, {
                'featureType': 'poi',
                'elementType': 'all',
                'stylers': [
                  {
                    'visibility': 'on'
                  }, {
                    'color': '#333333'
                  }
                ]
              }, {
                'featureType': 'poi',
                'elementType': 'labels.text.stroke',
                'stylers': [
                  {
                    'color': '#444444'
                  }, {
                    'visibility': 'on'
                  }
                ]
              }, {
                'featureType': 'poi',
                'elementType': 'labels.icon',
                'stylers': [
                  {
                    'visibility': 'off'
                  }, {
                    'hue': '#ff0000'
                  }
                ]
              }, {
                'featureType': 'poi.park',
                'elementType': 'all',
                'stylers': [
                  {
                    'visibility': 'off'
                  }, {
                    'hue': '#ff0000'
                  }
                ]
              }, {
                'featureType': 'road',
                'elementType': 'all',
                'stylers': [
                  {
                    'color': '#222222'
                  }
                ]
              }, {
                'featureType': 'road',
                'elementType': 'labels.text.fill',
                'stylers': [
                  {
                    'color': '#555555'
                  }
                ]
              }, {
                'featureType': 'transit',
                'elementType': 'all',
                'stylers': [
                  {
                    'color': '#111111'
                  }, {
                    'visibility': 'on'
                  }
                ]
              }, {
                'featureType': 'transit',
                'elementType': 'labels.text.fill',
                'stylers': [
                  {
                    'color': '#222222'
                  }, {
                    'visibility': 'off'
                  }
                ]
              }, {
                'featureType': 'water',
                'elementType': 'all',
                'stylers': [
                  {
                    'color': '#171717'
                  }
                ]
              }
            ]
          });
          if (geocoder) {
            geocoder.geocode({
              'address': address
            }, function(results, status) {
              var infowindow, marker, newCenter, pixelOffset, scale, worldCoordinateCenter, worldCoordinateNewCenter;
              if (status === google.maps.GeocoderStatus.OK) {
                if (status !== google.maps.GeocoderStatus.ZERO_RESULTS) {
                  scale = Math.pow(2, map.getZoom());
                  worldCoordinateCenter = map.getProjection().fromLatLngToPoint(results[0].geometry.location);
                  pixelOffset = new google.maps.Point(0 / scale || 0, 80 / scale || 0);
                  worldCoordinateNewCenter = new google.maps.Point(worldCoordinateCenter.x - pixelOffset.x, worldCoordinateCenter.y + pixelOffset.y);
                  newCenter = map.getProjection().fromPointToLatLng(worldCoordinateNewCenter);
                  map.setCenter(newCenter);
                  infowindow = new google.maps.InfoWindow({
                    content: '<b>' + address + '</b>',
                    size: new google.maps.Size(120, 50)
                  });
                  marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map,
                    title: address
                  });
                  google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                  });
                } else {
                  alert('No results found');
                }
              } else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });
          }
        };
        google.maps.event.addDomListener(window, 'load', initialize);
        return $("#map_canvas a[target=_blank]").hide();
      }
    });
  })(jQuery);

}).call(this);

(function() {
  jQuery(document).ready(function($) {
    var OwlCarousel, clubstiftungProgressBar, counterNumber;
    clubstiftungProgressBar = function() {
      if ($('#about .skill').length) {
        $('#about .skill').each(function() {
          var dataSkillColor, dataSkillProgressBarWidth, skill, skillBottom, skillProgressBar;
          skill = $(this);
          skillProgressBar = $(skill).children('.skill-top').children('.skill-progress-bar');
          dataSkillProgressBarWidth = $(skill).data('skill-progress-bar-width');
          dataSkillColor = $(skill).data('skill-color');
          skillBottom = $(skill).children('.skill-bottom');
          $(skillProgressBar).progressbar({
            value: dataSkillProgressBarWidth
          });
          $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').css('background-color', dataSkillColor);
          $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').append('<span class="ui-progressbar-value-circle" style="background-color: ' + dataSkillColor + '"></span>');
          $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').append('<span class="ui-progressbar-value-top" style="background-color: ' + dataSkillColor + '"></span>');
          $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').children('.ui-progressbar-value-top').text(dataSkillProgressBarWidth + '%');
          $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').children('.ui-progressbar-value-top').append('<span class="ui-progressbar-value-triangle" style="border-top-color: ' + dataSkillColor + '; border-right-color: transparent; border-bottom-color: transparent; border-left-color: transparent;"></span>');
          $(this).children('.skill-bottom').css('color', dataSkillColor);
        });
      }
    };
    OwlCarousel = function() {
      return $(".carousel").each(function(index, element) {
        if ($(element).children().length > 4) {
          return $(element).owlCarousel({
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            loop: true,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-arrow-left" aria-hidden="true"></i>', '<i class="fa fa-arrow-right" aria-hidden="true"></i>'],
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 2
              },
              1000: {
                items: 4
              }
            }
          });
        }
      });
    };
    counterNumber = function() {
      if ($('#counter .counter-number').length) {
        $('#counter .counter-number').countTo();
      }
    };
    $(function() {
      clubstiftungProgressBar();
      OwlCarousel();
      $(window).scroll(function() {
        var counterVisible;
        counterVisible = $('#counter').visible();
        if (counterVisible === true) {
          counterNumber();
        }
      });
    });
  });

}).call(this);

(function() {
  (function($) {
    var throttle;
    jQuery(document).ready(function() {
      var alignSubSubMenu, documentHeight, documentWidth, isIsIOS, openResponsiveMenu, progress, sectionFadeIn, setColorOnFrontPagePerson, setColorOnFrontPageService, smoothScrollAnchors, subMenu, windowHeight, windowWidth, woocommerceTabs;
      windowWidth = $(window).width();
      windowHeight = $(window).height();
      documentWidth = $(document).width();
      documentHeight = $(document).height();
      if (!$('.open-responsive-menu').is(":visible")) {
        $(window).on('scroll', throttle((function(event) {
          progress();
        }), 20));
      }
      $('.bottom-header .fa').click(function() {
        return $('html,body').animate({
          scrollTop: $('#header').next().offset().top
        }, 1000);
      });
      $(window).on('scroll', throttle((function(event) {
        sectionFadeIn();
      }), 100));
      progress = function() {
        var headerHeight, percent, scrollTop, windowH;
        headerHeight = $('#header').height();
        scrollTop = $(window).scrollTop();
        windowH = $(document).height();
        if (scrollTop < headerHeight) {
          percent = scrollTop / headerHeight;
          $('.top-header').css({
            'background-color': 'rgba(33,33,33,' + percent + ')'
          });
          $('.top-header .container').css({
            'animation-play-state': 'running'
          });
        } else {
          $('.top-header .container').css({
            'animation-play-state': 'paused'
          });
          $('.top-header').css({
            'background-color': 'rgba(33,33,33,1)'
          });
        }
      };
      sectionFadeIn = function() {
        $('.home .faders').children().each(function(index, section) {
          var isVisible;
          isVisible = $(section).visible();
          if (isVisible) {
            $(section).addClass('faded-in');
          }
        });
      };
      if (!$('.open-responsive-menu').is(":visible")) {
        progress();
      }
      sectionFadeIn();
      isIsIOS = function() {
        $.browser.device = /iphone|ipad|ipod/i.test(navigator.userAgent.toLowerCase());
        if ($.browser.device === true) {
          $('#counter').css('background-attachment', 'scroll');
          $('#testimonials').css('background-attachment', 'scroll');
        }
      };
      smoothScrollAnchors = function() {
        $('a[rel="home"]').click(function(e) {
          if ($('body').hasClass('home')) {
            e.preventDefault();
            return $('html,body').animate({
              scrollTop: 0
            }, 1000);
          }
        });
        $('a[href*="#"]:not([href="#"])').on('click', function() {
          var target;
          if ($('.responsive-menu').hasClass('active')) {
            $('.responsive-menu').removeClass('active');
          }
          if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            target = $(this.hash);
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            } else {
              window.location = "/" + this.hash;
            }
          }
        });
      };
      openResponsiveMenu = function() {
        $('.open-responsive-menu').click(function() {
          $('.responsive-menu').toggleClass('active');
          return $('.responsive-menu').toggleClass('header-responsive-menu');
        });
        $('body').click(function() {
          if ($('.responsive-menu').hasClass('active')) {
            return $('.responsive-menu').removeClass('active header-responsive-menu');
          }
        });
        return $('.open-responsive-menu').click(function(e) {
          return e.stopPropagation();
        });
      };
      setColorOnFrontPageService = function() {
        if ($('#services .section-content .service').length) {
          $('#services .section-content .service').each(function() {
            var dataServiceColor, service, serviceIcon, serviceTitle;
            service = $(this);
            serviceIcon = $(service).children('.service-icon');
            serviceTitle = $(service).children('.service-title');
            dataServiceColor = $(service).data('service-color');
            $(serviceIcon).css('color', dataServiceColor);
            $(serviceTitle).css('color', dataServiceColor);
          });
        }
      };
      setColorOnFrontPagePerson = function() {
        if ($('#team .section-content .person').length) {
          $('#team .section-content .person').each(function() {
            var dataPersonColor, person, personContentSocial, personPosition;
            person = $(this);
            dataPersonColor = $(person).data('person-color');
            personPosition = $(person).children('.person-content').children('h5');
            personContentSocial = $(person).children('.person-content').children('.person-content-social.clearfix').children('li').children('a');
            $(personPosition).css('color', dataPersonColor);
            $(personContentSocial).css('background-color', dataPersonColor);
          });
        }
      };
      subMenu = function() {
        $('#header .top-header .header-navigation ul li.menu-item-has-children').hover((function() {
          $(this).children('ul').css('visibility', 'visible').fadeIn();
        }), function() {
          $(this).children('ul').css('visibility', 'hidden').fadeOut();
        });
      };
      alignSubSubMenu = function() {
        var subSubMenu;
        if ($('#header .header-navigation ul li.menu-item-has-children').length) {
          subSubMenu = $('#header .header-navigation ul li.menu-item-has-children ul');
          $(subSubMenu).each(function() {
            if (windowWidth - ($(this).offset().left) < 250) {
              $(this).css('left', '-250px');
            }
          });
        }
      };
      woocommerceTabs = function() {
        var descriptionTab, descriptionTabLink, panelDescription, panelReviews, reviewsTab, reviewsTabLink;
        descriptionTab = $('li.description_tab');
        descriptionTabLink = $('li.description_tab a');
        reviewsTab = $('li.reviews_tab');
        reviewsTabLink = $('li.reviews_tab a');
        panelDescription = $('.panel#tab-description');
        panelReviews = $('.panel#tab-reviews');
        $(descriptionTabLink).click(function() {
          $(this).parent().addClass('active');
          $(reviewsTab).removeClass('active');
          $(panelDescription).show();
          $(panelReviews).hide();
        });
        $(reviewsTabLink).click(function() {
          $(this).parent().addClass('active');
          $(descriptionTab).removeClass('active');
          $(panelReviews).show();
          $(panelDescription).hide();
        });
      };
      $(function() {
        isIsIOS();
        smoothScrollAnchors();
        openResponsiveMenu();
        setColorOnFrontPageService();
        setColorOnFrontPagePerson();
        subMenu();
        alignSubSubMenu();
        woocommerceTabs();
      });
      $('.wpcf7 input[type="submit"]').parent().append('<div class="loadingindicator"><i class="fa fa-circle-o-notch fa-2x fa-spin"></i></div>');
      $('.wpcf7 input[type="submit"]').on('click', function() {
        $('.wpcf7 .fa-circle-o-notch').css({
          'opacity': 1
        });
        $('.wpcf7-form-control-wrap').css({
          'opacity': 0.2
        });
      });
      $('#map_canvas').click(function(e) {
        return e.stopPropagation();
      });
      $('#show_map').click(function(e) {
        e.stopPropagation();
        $('.mappable, .wpcf7').toggleClass('mapped');
        return $('#map_canvas').toggleClass('showmap');
      });
      return $('body').click(function() {
        $('.mappable, .wpcf7').removeClass('mapped');
        return $('#map_canvas').removeClass('showmap');
      });
    });
    jQuery(document).on('invalid.wpcf7 spam.wpcf7 mailsent.wpcf7 mailfailed.wpcf7', function() {
      $('.wpcf7 .fa-circle-o-notch').removeAttr('style');
      $('.wpcf7-form-control-wrap').css({
        'opacity': 1
      });
    });
    $(window).load(function() {
      return $('.faders').children().addClass('faded-in');
    });
    return throttle = function(fn, threshhold, scope) {
      var deferTimer, last;
      threshhold || (threshhold = 250);
      last = void 0;
      deferTimer = void 0;
      return function() {
        var args, context, now;
        context = scope || this;
        now = +(new Date);
        args = arguments;
        if (last && now < last + threshhold) {
          clearTimeout(deferTimer);
          return deferTimer = setTimeout((function() {
            last = now;
            fn.apply(context, args);
          }), threshhold);
        } else {
          last = now;
          return fn.apply(context, args);
        }
      };
    };
  })(jQuery);

}).call(this);

},{}]},{},[1])