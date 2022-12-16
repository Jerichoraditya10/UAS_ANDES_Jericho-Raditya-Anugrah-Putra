@extends('layouts.app')
@section('content')


<div style="text-align:center"> 
<form class="subform"  method="post" action="{{ route('addProduct.store') }}" enctype="multipart/form-data">
{{ csrf_field() }} 
	<p>
		<label for="ID" class="label">Product ID</label>
		<input type="text" name="ID" id="ID">
	</p>
	<p>
		<label for="name" class="label">Title</label>
		<input type="text" name="title" id="title">
	</p>
	
	
	<p align="center">
			<select style="width:150px;text-align:center" name="category_id" id= " category_id" class="form-control">
					<option  value="">Select Category</option>
				@foreach($categories as $category)
					<option  value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select> 
	</p>
	<p>
		<label for="Quantity" class="label">Quantity</label>
		<input name="Quantity" id="Quantity" type="text" />
	</p>
	<p>
		<label for="price" class="label">Price</label>
		<input name="price" id="price" type="text" />
	</p>
	<p>
		<label for="Description" class="label">Description</label>
		<textarea name="Description" id="Description"></textarea>
	</p>
	<p>
		Select image to upload:
		<input type="file" name="product-image" id="fileToUpload">
	</p>
	<p>
		<input type="submit" name="insert" value="Insert">
	</p>
</form>
</div>
@endsection