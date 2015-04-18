function showSpinner()
{
	$('#panel-body').css('display', 'block');
	$('#panel-after-body').empty();
}

function renderMarkup(markup)
{
	$('#panel-body').css('display', 'none');
	$('#panel-after-body').empty().html(markup);
}

// load users
$('#link-users').click(function(e)
{
	e.preventDefault();
	$('#panel-heading').empty().append('<i class="icon icon-Users"></i>&nbsp; Users');
	// $('#panel-body').empty().append('');
	showSpinner();
	$.get('test', {}, function(markup)
		{
			renderMarkup(markup);
		});
});


// load paginated users
$(document).on('click', '.pagination a', function(e)
{
	e.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	showSpinner();
	$.get('test?page='+page, {}, function(markup)
		{
			renderMarkup(markup);
		});
});

// View user
function viewUser(id)
{
	$('#panel-heading').empty().append('<i class="icon icon-Rolodex" style="font-size:large"></i>&nbsp; User Details');
	showSpinner();
	$.get('view-user', {id:id}, function(markup)
	{
		renderMarkup(markup);
	});
}

// Edit user
function editUser(id)
{
	$('#panel-heading').empty().append('Edit User');
	showSpinner();
	$.get('edit-user', {id:id}, function(markup)
		{
			renderMarkup(markup);
		});
}

// Ban user
function changeStatus(id)
{
	showSpinner();
	$.post('change-status', {id:id}, function(markup)
		{
			renderMarkup(markup);
		});
}

$('#profile-table1').editable(
	{
		selector: 'a',
		url: 'profile/edit',
		pk: 1
	});



// user profile edit
// $(document).ready(function() {
  // $('#profile-table1').find('a').editable();
  // $('#username').editable();
	// console.log('test');
	// console.log($('#username').val());
// });

// function makeEditable()
// {
// 	alert('makeEditable function called');
// 	console.log('makeEditable function called');
// }
// $(document).on('load', '#panel-admin', function(e)
// {
// 	console.log('test');
// });
// $(window).load(function(e)
// 	{
// 		e.preventDefault();
// 		alert('test2');
// 		console.log('test2');
// 	});
// function test()
//   		{
//   			alert('username clicked');
//   		}