<x-app-layout>
<x-slot name="title">
    laraCakeへようこそ｜laraCake
</x-slot>
    <!-- header -->
    <x-header/>

        <div class="container gedf-wrapper">
            <div class="row">

                <!-- side menu -->
                <x-sidebar-menu>
                    <!-- category list -->
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5>カテゴリーランキング</h5>
                            </li>
                        </ul>
                        @foreach ($tags as $tag)
                        <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav__link" href="/tags/{{ $tag->name }}">
                            <span data-feather="file-text">{{ $tag->name }}</span>
                            </a>
                        </li>
                        @endforeach
                        </ul>
                    </div>
                </x-sidebar-menu>

                <!-- Post -->
                <div class="col-md-6">
                    <div class="posts-container gedf-main">
                        @foreach ($posts as $post)
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
                            
                            <div class="post card-body">
                            <x-post-link :href="route('detail', ['user'=>$post->user_name, 'id'=>$post->id])"></x-post-link>
    
                                <h4 class="card-text">
                                    {{ $post->title }}
                                </h4>
                                   {!! $post->post !!}

                                @foreach ($post->tags as $tag)
                                    <a href="/tags/{{ $tag->name }}" class="tag">#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            
                        </div>
                        @endforeach
                        <!-- Pagination -->
                        <div class="pagination-container">
                        {{ $posts->links() }}
                        </div>
                    </div>
                </div>
                <!-- Post -->

                <!-- News -->
                <x-sidebar-news/>

            </div>
        </div>
        
    <!-- footer -->
    <x-footer/>
</x-app-layout>



