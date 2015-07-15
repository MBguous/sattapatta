

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
	$('#panel-heading').empty().append('<i class="icon icon-Users" style="font-size:large"></i>&nbsp; Users');
	showSpinner();
	$.get('users', {}, function(markup)
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
	$.get('users?page='+page, {}, function(markup)
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

// Categories
$('#link-categories').click(function(e)
	{
		e.preventDefault();
		$('#panel-heading').empty().append('<i class="icon icon-Layers" style="font-size:large"></i>&nbsp; Categories');
		showSpinner();
		$.get('get-categories', {}, function(markup)
			{
				renderMarkup(markup);
			});
	});

// Save category
$(document).on('click', '#cat-save', function(e)
	{
		e.preventDefault();
		var catName = $('#cat-name').val();
		var catDesc = $('#cat-desc').val();
		showSpinner();
		$.post('save-categories', {catName:catName, catDesc:catDesc}, function(markup)
			{
				renderMarkup(markup);
			});
	});