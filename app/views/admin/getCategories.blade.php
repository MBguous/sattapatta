<!-- // {{ Form::open() }}

// 	<div class="form-group">
// 	  {{ Form::label('category-name', 'Category name') }}
// 	  <div>
// 	    {{ Form::text('category-name') }}
// 	    <div class="text-danger" id="category-name-error">{{ $errors->first('category-name', ':message') }}</div>
// 	  </div>
// 	</div>

// 	<div class="form-group">
//   {{ Form::label('category-desc', 'Category description') }}
// 	  <div class="col-md-8">
// 	    {{ Form::text('category-desc') }}
// 	    <div class="text-danger" id="category-desc-error">{{ $errors->first('category-desc', ':message') }}</div>
// 	  </div>
// 	</div>

// 	<div>
//     <button type="reset" class="btn btn-default">Clear</button>
//     <button type="submit" class="btn btn-primary">Add Category</button>
//   </div>

// {{ Form::close() }} -->

<table class="table table-striped table-hover table-condensed">
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Description</th>
		<th>Action</th>
	</tr>
	<tr>
		<td></td>
		<td>{{ Form::text('cat-name', null, ['class'=>'form-control', 'id'=>'cat-name', 'placeholder'=>'Enter category name']) }}</td>
		<td>{{ Form::text('cat-desc', null, ['class'=>'form-control', 'id'=>'cat-desc', 'placeholder'=>'Enter category description']) }}</td>
		<td><button class="btn btn-primary btn-xs" id="cat-save">Save Category</button></td>
	</tr>
	@forelse ($categories as $category)
	<tr>
		<td>{{ $category->id }}</td>
		<td>{{ $category->name }}</td>
		<td>{{ $category->description }}</td>
		<td>
			<a href="#" onclick="editCategory({{ $category->id }})" >
				<i class="icon icon-Pencil" style="font-size:large" title="Edit Category" data-toggle="tooltip" data-placement="bottom"></i>
			</a>
			<a href="#" onclick="removeCategory({{ $category->id }})">
				<i class="icon icon-Delete" style="font-size:large" title="Remove Category" data-toggle="tooltip" data-placement="bottom"></i>
			</a>
		</td>
	</tr>
	@empty
		<tr>
			<td colspan = 2><p class="text-muted">No category</p></td>
		</tr>
	@endforelse
</table>

<script>
	// tooltip
	$('[data-toggle="tooltip"]').tooltip();
</script>