	var keywords = $('#search-input').val();
// $('#search-input').focus(function(){



	$.post('/', {keywords: keywords}, function(response) {

		
		var responseToString = JSON.stringify(response.items);
		var jsonOptions = JSON.parse(responseToString);
		// console.log(jsonOptions);
		// Loop over the JSON array.
    jsonOptions.forEach(function(item) {
    // Create a new <option> element.
    var option = document.createElement('option');
    // Set the value using the item in the JSON array.
    option.value = item;
    // Add the <option> element to the <datalist>.
    $('#search-results').append(option);
    });
	});
// });