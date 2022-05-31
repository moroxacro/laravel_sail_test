<x-app-layout>
<x-slot name="title">
    トップページ｜laraCake
</x-slot>
    <!-- header -->
    <x-header/>

        <div class="container gedf-wrapper">
            <div class="row">

                <!-- Post -->
                <div class="col-md-9">
                    <div class="posts-container gedf-main">

                        @if ($posts->first() !== NULL) 
                            <p>「{{  $word }}」の検索結果を表示</p>
                        @else
                            <div class="mt-10">
                                <br><br><br>
                                <p>「{{  $word }}」に一致する記事は見つかりませんでした。</p>
                            </div>    
                        @endif

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



