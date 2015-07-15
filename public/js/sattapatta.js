// tooltip
$('[data-toggle="tooltip"]').tooltip();

// popover
$(function () {
  $('[data-toggle="popover"]').popover();
});

// profile inline-edit

$.fn.editable.defaults.mode = 'inline';
$.fn.editable.defaults.send = "always";

$('#profile-table').find('a').editable();
	// $('#username').editable('disable');

// $(function() {

  $('#gender').editable({
      value: $('#gender-value').val(),    
      source: [
            {value: 1, text: 'Male'},
            {value: 2, text: 'Female'},
            {value: 3, text: 'Other'}
         ]
  });

  $('#birthYear').editable({
      value: $('#birthYear-value').val(),
      source: [
            {value: 1990, text: '1990'},
            {value: 1991, text: '1991'},
            {value: 1992, text: '1992'},
            {value: 1993, text: '1993'},
            {value: 1994, text: '1994'},
            {value: 1995, text: '1995'},
            {value: 1996, text: '1996'},
            {value: 1997, text: '1997'},
            {value: 1998, text: '1998'}
         ]
  });

  $('#birthMonth').editable({
      value: $('#birthMonth-value').val(),
      source: [
            {value: 1, text: 'Jan'},
            {value: 2, text: 'Feb'},
            {value: 3, text: 'Mar'},
            {value: 4, text: 'Apr'},
            {value: 5, text: 'May'},
            {value: 6, text: 'Jun'},
            {value: 7, text: 'Jul'},
            {value: 8, text: 'Aug'},
            {value: 9, text: 'Sep'},
            {value: 10, text: 'Oct'},
            {value: 11, text: 'Nov'},
            {value: 12, text: 'Dec'}
         ]
  });

  $('#birthDay').editable({
      value: $('#birthDay-value').val(),
      source: [
            {value: 1, text: '1'},
            {value: 2, text: '2'},
            {value: 3, text: '3'},
            {value: 4, text: '4'},
            {value: 5, text: '5'},
            {value: 6, text: '6'},
            {value: 7, text: '7'},
            {value: 8, text: '8'},
            {value: 9, text: '9'},
            {value: 10, text: '10'},
            {value: 11, text: '11'},
            {value: 12, text: '12'},
            {value: 13, text: '13'},
            {value: 14, text: '14'},
            {value: 15, text: '15'},
            {value: 16, text: '16'},
            {value: 17, text: '17'},
            {value: 18, text: '18'},
            {value: 19, text: '19'},
            {value: 20, text: '20'},
            {value: 21, text: '21'},
            {value: 22, text: '22'},
            {value: 23, text: '23'},
            {value: 24, text: '24'},
            {value: 25, text: '25'},
            {value: 26, text: '26'},
            {value: 27, text: '27'},
            {value: 28, text: '28'},
            {value: 29, text: '29'},
            {value: 30, text: '30'},
            {value: 31, text: '31'}
         ]
  });
// });

// togglable side-menu
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});


/* Initialize your widget via javascript as follows */
$("#input-id").fileinput({
  previewFileType: "image",
  browseClass: "btn btn-success",
  browseLabel: " Pick Image",
  browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
  removeClass: "btn btn-danger",
  removeLabel: "Delete",
  removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
  uploadClass: "btn btn-info",
  uploadLabel: "Upload",
  uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
});
