@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">
                    @if($post->image_url)
                    <div class="post-item-image">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    @endif

                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{ $post->title }}</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{ url('author', $post->author->slug) }}"> {{ $post->author->name }}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            {!! $post->body_html !!}
                        </div>                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img alt="Author 1" src="/img/author.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="{{ url('author', $post->author->slug) }}">{{ $post->author->name }}</a></h4>
                        <div class="post-author-count">
                          <a href="{{ url('author', $post->author->slug) }}">
                              <i class="fa fa-clone"></i>
                              <?php $postCount = $post->author->posts->count() ?>
                              {{ $postCount }} {{ str_plural('post', $postCount) }}
                          </a>
                        </div>
                          {!! $post->author->bio_html !!}
                      </div>
                    </div>
                </article>

                <!-- comments here -->
            </div>

            @include('layouts.sidebar')
        </div>
    </div>

@endsection
