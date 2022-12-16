@extends('omega::admin.layouts.default')

@section('page-header')
    {{ __('Blog') }}
@endsection

@section('actions')

    <a class="btn btn-outline-secondary btn-sm" href="{{ route('omega-plugin-blog.index') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
@endsection

@section('content')

    {{ Form::open(['url' => route('omega-plugin-blog.posts.store'), 'method' => 'post']) }}

    <x-oix-card title="{{ __('Post') }}" subtitle="{{ __('Create a new post.') }}">

        {{ Form::otext('title', null, ['label' => __('Title')]) }}

        {{ Form::oback() }}
        {{ Form::osubmit() }}
    </x-oix-card>

    {{ Form::close() }}

@endsection