@extends('omega::admin.layouts.default')

@section('page-header')
    {{ __('Blog categories') }}
@endsection

@section('actions')
    <a href="{{ route('omega-plugin-blog.categories.create') }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa-plus"></i> {{ __('Create category') }}
    </a>
@endsection

@section('content')

    <x-oix-card>
        <table class="table">
            <tr>
                <th></th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Description') }}</th>
                <th></th>
            </tr>
            @forelse($categories as $category)
                <tr>
                    <td style="width:15px;">
                        @if(isset($category->icon))

                            <i class="{{ $category->icon }}"></i>

                        @endif
                    </td>
                    <td>
                        <a href="{{ route('omega-plugin-blog.categories.edit', $category) }}">
                            {{ $category->title }}
                        </a>
                    </td>
                    <td>
                        {{ $category->description ?? '-' }}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('omega-plugin-blog.categories.edit', $category) }}"><i class="fas fa-edit"></i></a>
                        &nbsp;|&nbsp;
                        {{ Form::odelete(route('omega-plugin-blog.categories.destroy', $category), ['class' => 'btn btn-link m-0 pt-0 px-0 pb-1 color-red', 'icon' => 'fas fa-trash']) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        {{ __('No categories ...') }}
                    </td>
                </tr>
            @endforelse
        </table>
    </x-oix-card>
@endsection