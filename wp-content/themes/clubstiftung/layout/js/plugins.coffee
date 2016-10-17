jQuery(document).ready ($) ->
  # Called Functions
  # Progress Bar

  clubstiftungProgressBar = ->
    if $('#about .skill').length
      $('#about .skill').each ->
        skill = $(this)
        skillProgressBar = $(skill).children('.skill-top').children('.skill-progress-bar')
        dataSkillProgressBarWidth = $(skill).data('skill-progress-bar-width')
        dataSkillColor = $(skill).data('skill-color')
        skillBottom = $(skill).children('.skill-bottom')
        $(skillProgressBar).progressbar value: dataSkillProgressBarWidth
        $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').css 'background-color', dataSkillColor
        $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').append '<span class="ui-progressbar-value-circle" style="background-color: ' + dataSkillColor + '"></span>'
        $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').append '<span class="ui-progressbar-value-top" style="background-color: ' + dataSkillColor + '"></span>'
        $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').children('.ui-progressbar-value-top').text dataSkillProgressBarWidth + '%'
        $(this).children('.skill-top').children('.skill-progress-bar').children('.ui-progressbar-value').children('.ui-progressbar-value-top').append '<span class="ui-progressbar-value-triangle" style="border-top-color: ' + dataSkillColor + '; border-right-color: transparent; border-bottom-color: transparent; border-left-color: transparent;"></span>'
        $(this).children('.skill-bottom').css 'color', dataSkillColor
        return
    return

  # Testimonials OWL Carousel

  OwlCarousel = ->

    $(".carousel").each (index, element) ->
      if $(element).children().length > 4
        $(element).owlCarousel
          autoplay: true
          autoplayTimeout: 2000
          autoplayHoverPause: true
          loop: true
          dots: false
          nav: true
          navText: ['<i class="fa fa-arrow-left" aria-hidden="true"></i>', '<i class="fa fa-arrow-right" aria-hidden="true"></i>']
          responsive:
            0: 
              items: 1
            600: 
              items: 2
            1000: 
              items: 4

  # Counter Number

  counterNumber = ->
    if $('#counter .counter-number').length
      $('#counter .counter-number').countTo()
    return

  $ ->
    clubstiftungProgressBar()
    OwlCarousel()
    $(window).scroll ->
      counterVisible = $('#counter').visible()
      if counterVisible == true
        counterNumber()
      return
    return
  return
