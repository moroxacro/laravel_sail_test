<header>
<nav x-data="{ open: false }" class="border-b border-white-100">

    <div class="navbar navbar-dark shadow-sm">
    <div class="container mb-3">
        <!-- Logo -->
        <a href="/" class="navbar-brand d-flex align-items-center">
        <div class="shrink-0 flex items-center">
            <!-- <x-application-logo class="block h-10 w-auto fill-current text-white-600" /> -->
            <!-- <img src="/storage/icons8-xacro-30.png" alt=""> -->
        </div>    
        <p class="logo-text"><strong>Xacro</strong></p> 
        </a>

        <!-- Search form -->
        <form class="col-5" method="POST" action="{{ route('search') }}">
            @csrf
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
                <input type="text" class="form-control" name="search" placeholder="キーワードを入力" aria-label="Input group example" aria-describedby="basic-addon1">
            </div>       
        </form>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
            <button class="flex items-center text-xl font-medium text-white-700 hover:text-white-700 hover:border-white-300 focus:outline-none focus:text-white-700 focus:border-white-300 transition duration-150 ease-in-out">
                @if (Auth::check())
                    @if (Auth::user()->profile_image)
                        <p class="profile-img-sm">
                            <img class="rounded-circle" src="/storage/{{ Auth::user()->profile_image }}" alt="{{ Auth::user()->name }}">
                        </p>
                    @else
                        <p class="profile-img-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg> 
                        </p>
                    @endif 
                @else
                    <p class="profile-img-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg> 
                    </p>               
                 @endif
                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
            </x-slot>

            <x-slot name="content">
            @if (Auth::check())
            <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link class="nav__link__md" :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('ログアウト') }}
                    </x-dropdown-link>
                </form>
                <x-dropdown-link class="nav__link__md" :href="route('edit')">
                    {{ __('プロフィールを編集する') }}
                </x-dropdown-link>
                <x-dropdown-link class="nav__link__md" :href="route('post.edit')">
                    {{ __('投稿を管理する') }}
                </x-dropdown-link>
                <x-dropdown-link class="nav__link__md"  :href="route('cancel')">
                    {{ __('退会する') }}
                </x-dropdown-link>
            @else
                <x-dropdown-link class="nav__link__md" :href="route('register')">
                    {{ __('新規登録') }}
                </x-dropdown-link>
                <x-dropdown-link class="nav__link__md" :href="route('login')">
                    {{ __('ログイン') }}
                </x-dropdown-link>
            @endif
            </x-slot>
        </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white-400 hover:text-white-500 hover:bg-white-100 focus:outline-none focus:bg-white-100 focus:text-white-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        </div>

    </div>
    <div class="header-nav-link">
        <!-- Navigation Links -->
        <x-nav-link class="space-x-8 sm:-my-px sm:ml-10" :href="route('index')" :active="request()->routeIs('index')">
            {{ __('ホーム') }}
        </x-nav-link>

        @if (Auth::check())
        <x-nav-link class="space-x-8 sm:-my-px sm:ml-10" :href="route('post')" :active="request()->routeIs('post')">
            {{ __('投稿する') }}
        </x-nav-link>
        @endif

        {{-- <x-nav-link class="space-x-8 sm:-my-px sm:ml-10" :href="route('index')" :active="request()->routeIs('')">
            {{ __('質問箱') }}
        </x-nav-link> --}}

        {{-- <x-nav-link class="space-x-8 sm:-my-px sm:ml-10" :href="route('dictionary', 1)" :active="request()->routeIs('dictionary')">
            {{ __('辞書') }}
        </x-nav-link> --}}
        
        <x-nav-link class="space-x-8 sm:-my-px sm:ml-10" :href="route('dictionary2')" :active="request()->routeIs('dictionary2')">
            {{ __('辞書') }}
        </x-nav-link>

        <x-nav-link class="space-x-8 sm:-my-px sm:ml-10" :href="route('mail')" :active="request()->routeIs('mail')">
            {{ __('お問い合わせ') }}
        </x-nav-link>
    </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1">
            <div class="px-4">
                @if (Auth::check())
                <div class="font-medium text-base text-white-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white-500">{{ Auth::user()->email }}</div>
                @else
                <div class="font-medium text-base text-white-800">名無しさん</div>
                <div class="font-medium text-sm text-white-500">※ログインしていません</div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                @if (Auth::check())
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('edit')">
                        {{ __('プロフィールを編集する') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('post.edit')">
                        {{ __('投稿を管理する') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('cancel')">
                        {{ __('退会する') }}
                    </x-responsive-nav-link>
                </form>
                @else
                <x-responsive-nav-link :href="route('register')">
                    {{ __('新規会員登録') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('login')">
                    {{ __('ログイン') }}
                </x-responsive-nav-link>

                @endif
            </div>
        </div>
    </div>
    </div>
</nav>
</header>