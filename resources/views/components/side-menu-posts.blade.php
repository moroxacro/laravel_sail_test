<div class="col-md-3">
    <div class="card shadow">
        <div class="card-body ">
            @if (Auth::check())  
                <div class="mr-2">
                    <img class="rounded-circle" width="40" height="40" src="/storage/{{ Auth::user()->profile_image }}" alt="">
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
        @if (Auth::check())
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="/edit" class="nav__link nav-link-faded has-icon active">アカウント情報</a>
                </li>
            </ul>
        @else
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="/register" class="nav__link nav-link-faded has-icon active">新規登録</a>
                </li>
                <li class="list-group-item">
                    <a href="/login" class="nav__link nav-link-faded has-icon">ログイン</a>
                </li>
            </ul>
        @endif

        <!-- category list -->
        <x-category-list/>
        
    </div>
</div>