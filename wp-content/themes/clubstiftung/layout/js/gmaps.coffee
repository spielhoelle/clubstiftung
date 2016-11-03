(($) ->
  jQuery(document).ready  ->
    if $('#map_canvas').length
      address = $('#map_canvas').attr('data')
      initialize = ->
        geocoder = new (google.maps.Geocoder)
        latlng = new (google.maps.LatLng)(-34.397, 150.644)
        myOptions =
          zoom: 12
          center: latlng
          mapTypeControlOptions: style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
          mapTypeId: google.maps.MapTypeId.ROADMAP
          disableDefaultUI: true

        map = new (google.maps.Map)(document.getElementById('map_canvas'), myOptions)
        window.map =  map
        map.setOptions styles:[
          {
            'featureType': 'administrative'
            'elementType': 'labels'
            'stylers': [
              { 'visibility': 'simplified' }
              { 'color': '#555555' }
            ]
          }
          {
            'featureType': 'landscape'
            'elementType': 'all'
            'stylers': [
              { 'color': '#111111' }
              { 'visibility': 'simplified' }
            ]
          }
          {
            'featureType': 'poi'
            'elementType': 'all'
            'stylers': [
              { 'visibility': 'on' }
              { 'color': '#333333' }
            ]
          }
          {
            'featureType': 'poi'
            'elementType': 'labels.text.stroke'
            'stylers': [
              { 'color': '#444444' }
              { 'visibility': 'on' }
            ]
          }
          {
            'featureType': 'poi'
            'elementType': 'labels.icon'
            'stylers': [
              { 'visibility': 'off' }
              { 'hue': '#ff0000' }
            ]
          }
          {
            'featureType': 'poi.park'
            'elementType': 'all'
            'stylers': [
              { 'visibility': 'off' }
              { 'hue': '#ff0000' }
            ]
          }
          {
            'featureType': 'road'
            'elementType': 'all'
            'stylers': [ { 'color': '#222222' } ]
          }
          {
            'featureType': 'road'
            'elementType': 'labels.text.fill'
            'stylers': [ { 'color': '#555555' } ]
          }
          {
            'featureType': 'transit'
            'elementType': 'all'
            'stylers': [
              { 'color': '#111111' }
              { 'visibility': 'on' }
            ]
          }
          {
            'featureType': 'transit'
            'elementType': 'labels.text.fill'
            'stylers': [
              { 'color': '#222222' }
              { 'visibility': 'off' }
            ]
          }
          {
            'featureType': 'water'
            'elementType': 'all'
            'stylers': [ { 'color': '#171717' } ]
          }
        ]

        if geocoder
          geocoder.geocode { 'address': address }, (results, status) ->
            if status == google.maps.GeocoderStatus.OK
              if status != google.maps.GeocoderStatus.ZERO_RESULTS

                scale = 2 ** map.getZoom()
                worldCoordinateCenter = map.getProjection().fromLatLngToPoint(results[0].geometry.location)
                pixelOffset = new (google.maps.Point)(0 / scale or 0, 80 / scale or 0)
                worldCoordinateNewCenter = new (google.maps.Point)(worldCoordinateCenter.x - (pixelOffset.x), worldCoordinateCenter.y + pixelOffset.y)
                newCenter = map.getProjection().fromPointToLatLng(worldCoordinateNewCenter)
                map.setCenter newCenter

                infowindow = new (google.maps.InfoWindow)(
                  content: '<b>' + address + '</b>'
                  size: new (google.maps.Size)(120, 50))
                marker = new (google.maps.Marker)(
                  position: results[0].geometry.location
                  map: map
                  title: address)
                google.maps.event.addListener marker, 'click', ->
                  infowindow.open map, marker
                  return
              else
                alert 'No results found'
            else
              alert 'Geocode was not successful for the following reason: ' + status
            return
        return
      google.maps.event.addDomListener window, 'load', initialize
      $("#map_canvas a[target=_blank]").hide()

) jQuery
