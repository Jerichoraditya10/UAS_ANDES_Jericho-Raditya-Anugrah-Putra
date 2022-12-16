@extends('layouts.app')
@section('content')


<div style="text-align:center"> 
<form class="subform"  method="post" action="{{ route('update.product') }}" enctype="multipart/form-data">
{{ csrf_field() }} 
@foreach($products as $product)
{{$product->name}}

	<p>
		<label for="ID" class="label">Product ID</label>
		<input type="text" name="ID" id="ID" value="{{$product->id}}" readonly>
	</p>
	<p>
		<label for="name" class="label">Title</label>
		<input type="text" name="title" id="title" value="{{$product->name}}"> 
	</p>
	
	
	<p align="center">
			<select style="width:150px;text-align:center" name="category_id" id= " category_id" class="form-control">
					<option  value="">Select Category</option>
				@foreach($categories as $category)
					<option  value="{{ $category->id }}"
                    @if($product->categoryID==$category->id)
                    selected                    
                    @endif
                    >{{ $category->name }}</option>
				@endforeach
			</select> 
	</p>
	<p>
		<label for="Quantity" class="label">Quantity</label>
		<input name="Quantity" id="Quantity" type="text" value="{{$product->quantity}}" />
	</p>
	<p>
		<label for="price" class="label">Price</label>
		<input name="price" id="price" type="text" value="{{$product->price}}" />
	</p>
	<p>
		<label for="Description" class="label">Description</label>
		<textarea name="Description" id="Description">{{$product->description}}</textarea>
	</p>
	<p>
		Select image to upload:
		<input type="file" name="product-image" id="fileToUpload">
	</p>
	<p>
		<input type="submit" name="edit" value="Edit">
	</p>
    @endforeach
</form>
</div>
@endsection