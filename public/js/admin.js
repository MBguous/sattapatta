// load users
$('#link-users').click(function(e)
{
	e.preventDefault();
	$('#panel-heading').empty().append('Users');
	$('#panel-body').empty().append('<i class="fa fa-spinner fa-pulse fa-lg"></i> Loading...');
	$.get('test', {}, function(markup)
		{
			$('#panel-body').css('display', 'none');
			$('#panel-after-body').empty().html(markup);
		});
});


// load paginated users
$(document).on('click', '.pagination a', function(e)
{
	e.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	$('#panel-body').css('display', 'block');
	$('#panel-after-body').empty();
	$.get('test?page='+page, {}, function(markup)
		{
			$('#panel-body').css('display', 'none');
			$('#panel-after-body').html(markup);
		});
});

// View user
$(document).on('click', '#view-user', function(e)
{
	console.log('view user');
	
});