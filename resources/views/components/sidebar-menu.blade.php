<div class="col-md-3">
    <div class="card shadow">
        <!-- <div class="card-body ">
            @if (Auth::check())
            <div class="mr-2">
                @if (Auth::user()->profile_image)
                    <p class="profile-img-sm">
                        <img class="rounded-circle" src="/storage/{{ Auth::user()->profile_image }}" alt="">
                    </p>
                @else
                    <p class="profile-img-sm">
                        <img class="rounded-circle" src="/storage/person-circle.svg" alt="">
                    </p>
                @endif                
            </div>
            <div class="ml-2"> 
                    <div class="h5">{{ Auth::user()->name }}</div>
                    <div class="h7 text-muted">{{ Auth::user()->email }}</div>
                </div>
            @else
                <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </div>
                <div class="ml-2">
                    <div class="h5">名無しさん</div>
                    <div class="h7 text-muted">※ログインして投稿しよう！</div>
                </div>
            @endif
        </div> -->
        {{ $slot }}
    </div>
</div>