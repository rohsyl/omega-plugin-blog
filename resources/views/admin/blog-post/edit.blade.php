@extends('omega::admin.layouts.default')

@section('page-header')
    {{ __('Blog') }}
@endsection

@section('actions')

    <a class="btn btn-outline-secondary btn-sm" href="{{ route('omega-plugin-blog.index') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
@endsection

@section('content')

    {{ Form::open(['url' => route('omega-plugin-blog.posts.update', $post), 'method' => 'put']) }}

    <div class="row gutters-tiny">
        <div class="col-sm-8">
            <x-oix-card title="{{ __('Post') }}" subtitle="{{ __('Edit a post.') }}">

                {{ Form::otext('title', $post->title, ['label' => __('Title')]) }}
                {{ Form::oeditor('introduction', $post->introduction, ['label' => __('Introduction')]) }}
                {{ Form::oeditor('description', $post->description, ['label' => __('Description')]) }}


                {{ Form::oback() }}
                {{ Form::osubmit() }}
            </x-oix-card>
        </div>
        <div class="col-sm-4">
            <x-oix-card>
                <img src="{{ $post->featured_media->getThumbnail(300, 150) }}" width="300" />

            </x-oix-card>
            <x-oix-card>
                {{ Form::odatetimepicker('published_at', isset($post->published_at) ? $post->published_at->format('d.m.Y h:i') : null, ['label' => __('Published at')]) }}
                {{ Form::oselectmultiple('categories', $categories, null, ['label' => __('Categories')]) }}
            </x-oix-card>

        </div>
    </div>

    {{ Form::close() }}

@endsection