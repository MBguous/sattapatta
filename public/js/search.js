// var keywords = $('#ajax-search').val();
var timer;
// $('#search-input').focus(function(){

// populate nav searchbar datalist
$.post('/', {}, function(response) {

	
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
  $('#search-datalist').append(option);
  });
});
// });

function up() {

	timer = setTimeout(function(){
		var keywords = $('#ajax-search').val();

		if(keywords.length > 0) {
			$.post('results', {keywords: keywords}, function(markup) {

				$('#search-results').empty().html(markup);
			});
		}
	}, 500);
}

function down() {
	clearTimeout(timer);
}