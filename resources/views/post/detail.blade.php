<x-app-layout>
    <x-slot name="title">
        投稿ページ｜laraCake
    </x-slot>
    <!-- header -->
    <x-header/>
    
        <div class="container gedf-wrapper">
            <div class="row">
                <!-- side menu -->
                <x-sidebar-menu/>
    
                <div class="col-md-9 gedf-main">
                    <!--- \\\\\\\Post-->
                    <div class="card gedf-card shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    @if ($post->user->profile_image)
                                        <p class="profile-img-sm">
                                            <img class="rounded-circle" src="/storage/{{ $post->user->profile_image }}" alt="{{ $post->user->profile_image }}">
                                        </p>
                                    @else
                                        <p class="profile-img-sm">
                                            <img class="rounded-circle" src="/storage/person-circle.svg" alt="">
                                        </p>
                                    @endif 
                                    <div class="ml-2">
                                        <div class="h5 m-0">{{ $post->user_name }}</div>
                                        <div class="text-muted h7"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            {{-- <h5 class="card-text">
                                {{ $post->title }}
                            </h5> --}}
                            <p class="card-text">
                                {!! $post->post !!}
                            </p>

                            @if ($post_image)
                            <img src="../storage/{{ $post_image->image }}">
                            @endif

                            @foreach ($post->tags as $tag)
                            <a href="#" class="text-muted h6">#{{ $tag->name }}</a>
                            @endforeach
                            
                            <div class="post-description">
                                @if (Auth::check() && $is_liked != null)
                                    <p class="mt-4 like">あなたはこちらの投稿を高評価しました</p>
                                @else
                                    <p class="mt-4 like off">あなたはこちらの投稿を高評価しました</p>
                                @endif
                                @if (Auth::check())
                                    <a class="btn favorite_btn btn-default stat-item">
                                        <i class="fa fa-thumbs-up icon">{{ $likes_count }}</i>
                                    </a>
                                    <a class="btn btn-default stat-item">
                                        <i class="fa fa-share icon">12</i>
                                    </a>
                                @else
                                    <a class="btn btn-default stat-item">
                                        <i class="fa fa-thumbs-up icon">{{ $likes_count }}</i>
                                    </a>
                                    <a class="btn btn-default stat-item">
                                        <i class="fa fa-share icon">12</i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="panel post">

                            @if (Auth::check())
                            <div class="post-footer">
                                <form method="POST" action="/comment">
                                    @csrf
                                    <div class="input-group"> 
                                        <input class="form-control" name="comment" type="text">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
                                        <input type="hidden" name="user_name" value="{{ Auth::user()->name }}"> 
                                        <button type="submit" class="btn btn-primary btn-sm ml-4">
                                            コメントを書く
                                        </button>
                                    </div>
                                </form>
    
                                @if ($comments)
                                    @foreach ($comments as $comment)
                                        <ul class="comments-list">
                                            <li class="comment">
                                                <a class="pull-left" href="#">
                                                    <img class="avatar rounded-circle" src="/storage/{{ $comment->user->profile_image }}" alt="{{ $comment->user->name }}">
                                                </a>
                                                <div class="comment-body">
                                                    <div class="comment-heading">
                                                        <h4 class="user">{{ $comment->user->name }}</h4>
                                                        <h5 class="time">{{ $comment->created_at }}</h5>
                                                    </div>
                                                    <p>{{ $comment->comment }}</p>
                                                </div>
                                                {{-- <ul class="comments-list">
                                                    <li class="comment">
                                                        <a class="pull-left" href="#">
                                                            <img class="avatar" src="https://bootdey.com/img/Content/user_3.jpg" alt="avatar">
                                                        </a>
                                                        <div class="comment-body">
                                                            <div class="comment-heading">
                                                                <h4 class="user">Ryan Haywood</h4>
                                                                <h5 class="time">3 minutes ago</h5>
                                                            </div>
                                                            <p>Relax my friend</p>
                                                        </div>
                                                    </li> 
                                                    <li class="comment">
                                                        <a class="pull-left" href="#">
                                                            <img class="avatar" src="https://bootdey.com/img/Content/user_2.jpg" alt="avatar">
                                                        </a>
                                                        <div class="comment-body">
                                                            <div class="comment-heading">
                                                                <h4 class="user">Gavino Free</h4>
                                                                <h5 class="time">3 minutes ago</h5>
                                                            </div>
                                                            <p>Ok, cool.</p>
                                                        </div>
                                                    </li> 
                                                </ul> --}}
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            @endif
                            </div>
                        </div>

                    </div>
                </div> 
            </div>
        </div>

    <!-- footer -->
    <x-footer/>

</x-app-layout>