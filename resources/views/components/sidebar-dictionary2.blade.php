<div class="col-md-4">
    <div class="card shadow">
        <div class="card-body ">
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
                    <img class="rounded-circle" width="40" height="40" src="/storage/person-circle.svg" alt="">
                </div>
                <div class="ml-2">
                    <div class="h5">名無しさん</div>
                    <div class="h7 text-muted">※ログインして投稿しよう！</div>
                </div>
            @endif
        </div>
    </div>
    <!--- article lists -->
    <div class="card shadow mt-3">
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>