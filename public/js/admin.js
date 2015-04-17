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
	$('#panel-heading').empty().append('Users');
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
	$('#panel-heading').empty().append('User Details');
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