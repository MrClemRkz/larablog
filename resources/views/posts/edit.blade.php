@extends('main')

@section('title', '| Create New Post')

@section('content')

	<div class="row">
	{!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class'=>'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug:', ['class'=>'form-spacing-top']) }}
			{{ Form::text('slug', null, ['class'=>'form-control']) }}

			{{ Form::label('body', 'Post body:', ['class'=>'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class'=>'form-control']) }}
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>URL:</dt>
					<dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Created at:</dt>
					<dd>{{ date('d M Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last updated:</dt>
					<dd>{{ date('d M Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{{ Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) }}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block')) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div><!-- end of .row -->

@endsection
