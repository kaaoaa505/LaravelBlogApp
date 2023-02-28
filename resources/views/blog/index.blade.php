@extends('_layouts.app')

@section('content')
    <div class="col-md-8">
        @foreach ($posts as $post)
            <article class="post-item">

                @if (!empty($post->image))
                    <div class="post-item-image">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <img src="{{ $post->getImageUrl() }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                @endif

                <div class="post-item-body">
                    <div class="padding-10">

                        <h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>

                        <p>
                            {!! $post->excerpt_html !!}
                        </p>
                    </div>

                    <div class="post-meta padding-10 clearfix">
                        <div class="pull-left">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="#"> {{ $post->author->name }}</a></li>
                                <li><i class="fa fa-clock-o"></i><time>{{ $post->getDate() }}</time></li>
                                <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                            </ul>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('blog.show', $post->slug) }}">Continue Reading &raquo;</a>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

        {{$posts->links('pagination::bootstrap-5')}}
    </div>

    @include('_partial.sidebar')
@endsection
