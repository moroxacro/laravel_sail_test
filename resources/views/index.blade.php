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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                                    </svg>                                                
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
    
                                <h5 class="card-text">
                                    {{ $post->title }}
                                </h5>
                                   {{-- {!! $post->post !!} --}}
                                <div class="mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                                        <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                    </svg>
                                    @foreach ($post->tags as $tag)
                                        <a href="/tags/{{ $tag->name }}" class="tag">#{{ $tag->name }} </a>
                                    @endforeach
                                </div>
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



