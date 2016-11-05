(($) ->
  jQuery(document).ready  ->
    windowWidth = $(window).width()
    windowHeight = $(window).height()
    documentWidth = $(document).width()
    documentHeight = $(document).height()

    if !$('.open-responsive-menu').is(":visible")
      $(window).on 'scroll', throttle(((event) ->
        progress()
        return
      ), 20)
    $('.bottom-header .fa').click ->
      $('html,body').animate { scrollTop: $('#header').next().offset().top }, 1000

    $(window).on 'scroll', throttle(((event) ->
      sectionFadeIn()
      return
    ), 100)

    progress = ->
      headerHeight = $('#header').height()
      scrollTop = $(window).scrollTop()
      windowH = $(document).height()
      if scrollTop < headerHeight
        percent = scrollTop / headerHeight
        $('.top-header').css 'background-color': 'rgba(33,33,33,' + percent + ')'
        $('.top-header .container').css 'animation-play-state': 'running'
      else
        $('.top-header .container').css 'animation-play-state': 'paused'
        $('.top-header').css 'background-color': 'rgba(33,33,33,1)'
      return

    sectionFadeIn = ->
      $('.home .faders').children().each (index, section) ->
        isVisible = $(section).visible(true, false, 'both');
        if isVisible == true
          $(section).addClass('faded-in')
        return
      return

    if !$('.open-responsive-menu').is(":visible")
      progress()

    sectionFadeIn()



    #scroll end
    ##############################################

    isIsIOS = ->
      $.browser.device =
        /iphone|ipad|ipod/i.test(navigator.userAgent.toLowerCase())
      if $.browser.device == true
        $('#counter').css 'background-attachment', 'scroll'
        $('#testimonials').css 'background-attachment', 'scroll'
      return

    # Smooth Scroll Anchors

    smoothScrollAnchors = ->
      $('a[rel="home"]').click (e) ->
        if($('body').hasClass('home'))
          e.preventDefault()

          $('html,body').animate { scrollTop: 0 }, 1000

      $('a[href*="#"]:not([href="#"])').on 'click', ->
        if($('.responsive-menu').hasClass('active'))
          $('.responsive-menu').removeClass('active');
        if location.pathname.replace(/^\//, '') ==  @pathname.replace(/^\//, '') and location.hostname == @hostname
          target = $(@hash)
          if target.length
            offset = $('#header .top-header').height()
            console.log target
            $('html,body').animate { scrollTop: target.offset().top - offset }, 1000
            return false
          else
            window.location = "/" + @hash
        return
      return

    # Open Responsive Menu

    openResponsiveMenu = ->
      $('.open-responsive-menu').click ->
        $('body').addClass('menu-open');
        $('.responsive-menu').toggleClass('active');
        $('.responsive-menu').toggleClass('header-responsive-menu');

      $('body').click ->
        $('body').removeClass('menu-open');

        if($('.responsive-menu').hasClass('active'))
          $('.responsive-menu').removeClass('active header-responsive-menu');

      $('.open-responsive-menu').click (e)->
        e.stopPropagation()

    # Set Color on Front Page Service

    setColorOnFrontPageService = ->
      if $('#services .section-content .service').length
        $('#services .section-content .service').each ->
          service = $(this)
          serviceIcon = $(service).children('.service-icon')
          serviceTitle = $(service).children('.service-title')
          dataServiceColor = $(service).data('service-color')
          $(serviceIcon).css 'color', dataServiceColor
          $(serviceTitle).css 'color', dataServiceColor
          return
      return

    # Set Color on Front Page Service

    setColorOnFrontPagePerson = ->
      if $('#team .section-content .person').length
        $('#team .section-content .person').each ->
          person = $(this)
          dataPersonColor = $(person).data('person-color')
          personPosition = $(person).children('.person-content').children('h5')
          personContentSocial =
            $(person).children('.person-content')
            .children('.person-content-social.clearfix')
            .children('li')
            .children('a')
          $(personPosition).css 'color', dataPersonColor
          $(personContentSocial).css 'background-color', dataPersonColor
          return
      return

    # Sub Menu

    subMenu = ->
      $('#header .top-header .header-navigation ul li.menu-item-has-children')
      .hover (->
        $(this).children('ul').css('visibility', 'visible').fadeIn()
        return
      ), ->
        $(this).children('ul').css('visibility', 'hidden').fadeOut()
        return
      return

    # Align Sub Sub Menu

    alignSubSubMenu = ->
      if $('#header .header-navigation ul li.menu-item-has-children')
      .length
        subSubMenu =
          $('#header .header-navigation ul li.menu-item-has-children ul')
        $(subSubMenu).each ->
          if windowWidth - ($(this).offset().left) < 250
            $(this).css 'left', '-250px'
          return
      return

    # WooCommerce Tabs

    woocommerceTabs = ->
      descriptionTab = $('li.description_tab')
      descriptionTabLink = $('li.description_tab a')
      reviewsTab = $('li.reviews_tab')
      reviewsTabLink = $('li.reviews_tab a')
      panelDescription = $('.panel#tab-description')
      panelReviews = $('.panel#tab-reviews')
      $(descriptionTabLink).click ->
        $(this).parent().addClass 'active'
        $(reviewsTab).removeClass 'active'
        $(panelDescription).show()
        $(panelReviews).hide()
        return
      $(reviewsTabLink).click ->
        $(this).parent().addClass 'active'
        $(descriptionTab).removeClass 'active'
        $(panelReviews).show()
        $(panelDescription).hide()
        return
      return

    $ ->
      isIsIOS()
      smoothScrollAnchors()
      openResponsiveMenu()
      setColorOnFrontPageService()
      setColorOnFrontPagePerson()
      subMenu()
      alignSubSubMenu()
      woocommerceTabs()
      return


    $('.wpcf7 input[type="submit"]').parent().append '<div class="loadingindicator"><i class="fa fa-circle-o-notch fa-2x fa-spin"></i></div>'
    $('.wpcf7 input[type="submit"]').on 'click', ->
      $('.wpcf7 .fa-circle-o-notch').css 'opacity': 1
      $('.wpcf7-form-control-wrap').css 'opacity': 0.2
      return

    $('#map_canvas').click (e) ->
      e.stopPropagation()

    $('#show_map').click (e) ->
      e.stopPropagation()
      $('.mappable, .wpcf7').toggleClass('mapped')
      $('#map_canvas').toggleClass('showmap')

    $('body').click ->
      $('.mappable, .wpcf7').removeClass('mapped')
      $('#map_canvas').removeClass('showmap')

  jQuery(document).on 'invalid.wpcf7 spam.wpcf7 mailsent.wpcf7 mailfailed.wpcf7', ->
    $('.wpcf7 .fa-circle-o-notch').removeAttr 'style'
    $('.wpcf7-form-control-wrap').css 'opacity': 1
    return

  $(window).load ->
    if !$('body').hasClass('home')
      $('.faders').children().addClass('faded-in')


  throttle = (fn, threshhold, scope) ->
    threshhold or (threshhold = 250)
    last = undefined
    deferTimer = undefined
    ->
      context = scope or this
      now = +new Date
      args = arguments
      if last and now < last + threshhold
        # hold on to it
        clearTimeout deferTimer
        deferTimer = setTimeout((->
          last = now
          fn.apply context, args
          return
        ), threshhold)
      else
        last = now
        fn.apply context, args

) jQuery
