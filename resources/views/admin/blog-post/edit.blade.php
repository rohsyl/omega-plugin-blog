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
                <x-oix-input-text name="title" :value="$post->title" :label="__('Title')" helper="The title of your post." />
                <x-oix-input-richtext name="introduction" :value="$post->introduction" :label="__('Introduction')" helper="The introduction is a resume of the post displayed in the overview page." />
                <x-oix-input-richtext name="description" :value="$post->description" :label="__('Description')" helper="The description is the body of your post." />
            </x-oix-card>
        </div>
        <div class="col-sm-4">
            <x-oix-card>
                <x-oix-input-mediachooser
                    name="featured_media_id"
                    :multiple="false" :preview="true"
                    :type="[\rohsyl\OmegaCore\Models\Media::MT_PICTURE]"
                    :value="$post->featured_media?->id"
                />
            </x-oix-card>
            <x-oix-card>
                {{ Form::odatetimepicker('published_at', isset($post->published_at) ? $post->published_at->format('d.m.Y h:i') : null, ['label' => __('Published at')]) }}
                {{ Form::oselectmultiple('categories', $categories, $post->blog_categories, ['label' => __('Categories')]) }}
                <hr />
                {{ Form::oback() }}
                {{ Form::osubmit() }}
            </x-oix-card>

        </div>
    </div>

    {{ Form::close() }}

@endsection