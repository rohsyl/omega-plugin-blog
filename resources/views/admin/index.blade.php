@extends('omega::admin.layouts.default')

@section('page-header')
    {{ __('Blog') }}
@endsection

@section('actions')
    <a href="{{ route('omega-plugin-blog.categories.index') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-tags"></i> {{ __('Categories') }}
    </a>
    <!--<a href="{{ '' }}" class="btn btn-primary btn-sm">
        <i class="fas fa-comments"></i> {{ __('Comments') }}
    </a>-->
    <a href="{{ route('omega-plugin-blog.posts.create') }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa-plus"></i> {{ __('Create post') }}
    </a>
@endsection

@section('content')

    <x-aqf-filters>
        <div class="row gutters-tiny">
            <div class="col-sm-4">
                <x-aqf-plain />
            </div>
        </div>
        <x-aqf-buttons></x-aqf-buttons>
    </x-aqf-filters>

    <x-oix-card>
        <table class="table">
            <tr>
                <th></th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Introduction') }}</th>
                <!--<th>{{ __('Comments') }}</th>-->
                <th>{{ __('Author') }}</th>
                <th>{{ __('Published at') }}</th>
                <th></th>
            </tr>
            @forelse($posts as $post)
                <tr>
                    <td style="width:100px;">
                        @if(isset($post->featured_media))
                            <img src="{{ $post->featured_media->getThumbnail(100, 50) }}" width="100" />
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('omega-plugin-blog.posts.edit', $post) }}">{{ $post->title }}</a>
                    </td>
                    <td>
                        @if(isset($post->introduction))
                            {{ \Illuminate\Support\Str::limit($post->introduction, 50) }}
                        @else
                            -
                        @endif
                    </td>
                    <!--<td>
                        {{ $post->blog_comments_count }}
                    </td>-->
                    <td>
                        @if(isset($post->author))
                            {{ $post->author->fullname }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if(isset($post->published_at))
                            <span class="small @if($post->is_published) text-success @else text-muted @endif">
                                @if($post->is_published) <i class="fas fa-globe"></i> @else <i class="fas fa-eye-slash"></i> @endif
                                {{ $post->published_at->format(DATETIMEFORMAT) }}
                            </span>
                        @else
                            <span class="small text-muted">
                                <i class="fas fa-eye-slash"></i>
                                {{ __('Not published') }}
                            </span>
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{ route('omega-plugin-blog.posts.edit', $post) }}"><i class="fas fa-edit"></i></a>
                        &nbsp;|&nbsp;
                        {{ Form::odelete(route('omega-plugin-blog.posts.destroy', $post), ['class' => 'btn btn-link m-0 pt-0 px-0 pb-1 color-red', 'icon' => 'fas fa-trash']) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        {{ __('No posts ...') }}
                    </td>
                </tr>
            @endforelse
        </table>
        {{ $posts->links() }}
    </x-oix-card>
@endsection