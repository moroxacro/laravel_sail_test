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

                            <p class="text-muted h6">{{ $post->category }}</p>

                        </div>
                    </div>
                </div> 

            </div>
        </div>
    <!-- footer -->
    <x-footer/>
</x-app-layout>