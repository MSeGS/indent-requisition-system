@extends('layout.main')

@section('contentTop')
<div class="row">
	{{Form::open(array('url'=>route('damage.index'),'method'=>'get','class'=>'form-vertical', 'id'=>'search'))}}
		<div class="col-md-2">
			<div class="form-group">
				{{Form::select('category', $categorySelect, Input::get('category'), array('class' =>'dropdown input-sm form-control', 'id'=>'category_search'))}}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<div class="input-group">
					{{Form::text('prodsearch',Input::get('prodsearch'), array('class'=>'input-sm form-control','placeholder'=>_('Search Product')))}}
	  				<span class="input-group-btn">
	    				<button class="btn-sm btn btn-default" name="search" value="Search" type=submit> <i class="glyphicon glyphicon-search"></i> </button>
	  				</span>
	    		</div>
			</div>
		</div>
	{{Form::close()}}
</div>
@stop
@section('content')
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th class="col-md-1">#</th>
					<th><?php echo _("Product Name") ?></th>
					<th class="col-md-2"><?php echo _("Category") ?></th>
					<th class="col-md-1"><?php echo _("Quantity") ?></th>
					<th class="col-md-2"><?php echo _("Report Date") ?></th>
					<th class="col-md-2"><?php echo _("Status") ?></th>
					<th class="col-md-1"></th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0; ?>
				@foreach($damages as $damage)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$damage->product->name}}
						<br>
						<span class="text-muted"><small>{{$damage->note}}</small></span>
					</td>
					<td>{{$damage->product->category->category_name}}</td>
					<td>{{$damage->quantity}}</td>
					<td>{{date('dS F, Y h:iA', strtotime($damage->reported_at))}}</td>
					<td>{{ucfirst($damage->status)}}</td>
					<td>
						{{Form::open(array('url'=>route('damage.destroy', array($damage->id)),'method'=>'delete'))}}

						@if($current_user->hasAccess('damage.edit'))
						<button href="{{route('damage.edit', array($damage->id))}}" class="btn btn-xs btn-success tooltip-top" title="<?php echo _('Edit Damage') ?>"><i class="fa fa-pencil"></i></button>
						@endif
						<button type="submit" onclick="return confirm <?php echo _('Are you sure') ?>);" name="id" class="btn btn-xs btn-danger tooltip-top" title="<?php echo _('Remove Damage') ?>" value="{{$damage->id}}"><i class="fa fa-times"></i></button>
						{{Form::close()}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$damages->appends(array('category'=>$cat, 'prodsearch'=>$prodsearch))->links()}}
	</div>
</div>
@stop

@section('scripts')
	<script type="text/javascript">
		$(function(){
			$('#category_search').on('change', function(){
				$('#search').submit();
			});
		});
	</script>
@stop