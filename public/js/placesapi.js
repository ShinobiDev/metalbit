var autocompletanuncio;
var componentFormAnuncio = {
       
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
};

function iniciarApp() {
        
		autocompletanuncio = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('id_ad-place')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocompletanuncio.addListener('place_changed', fillInAddressAd);


       
        
}

function fillInAddressAd() {
        // Get the place details from the autocomplete object.
        var place = autocompletanuncio.getPlace();

        for (var component in componentFormAnuncio) {
           if(document.getElementById(component) != null){
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;   
           } 
          
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentFormAnuncio[addressType]) {
            var val = place.address_components[i][componentFormAnuncio[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
}

