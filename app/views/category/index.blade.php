@extends('layout.main')

@section('content')

<div class="col-md-6 col-md-offset-3">
	<div class="row">
		@if(Session::has('delete'))
		<div class="alert alert-danger">
			{{Session::get('delete')}}
		</div>
		@endif
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th class="col-md-1">#</th>
					<th><?php echo _('Category Name') ?></th>
					<th class="col-md-2"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $key=>$category)
				<tr>
					<td>
						{{$index+$key}}
					</td>
					<td>
						{{$category->category_name}}
					</td>
					<td>
						@if(!($category->id == 1 || $category->id == "Uncategorized"))
						{{Form::open(array('url'=>route('category.destroy', array($category->id)), 'method'=>'delete'))}}
						<a href="{{route('category.edit', array($category->id, 'page='.$categories->getCurrentPage()))}}" class="btn btn-xs btn-success tooltip-top" title="<?php echo _('Edit Category Name');?>"><i class="fa fa-pencil"></i></a>
						<button type="submit" onclick="return confirm('<?php echo _('Are you sure you want to delete? If you delete this category, all products under this category will be moved to Uncategorized.');?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="<?php echo _('Remove Category');?>" value="{{$category->id}}"><i class="fa fa-times"></i></a>
						{{Form::close()}}
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@stop