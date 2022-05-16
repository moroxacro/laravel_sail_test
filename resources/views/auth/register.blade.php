<x-guest-layout>
    <x-slot name="title">
        新規登録｜laraCake
    </x-slot>
    <x-auth-card>
        <x-slot name="header">
            <p class="main-text">LaraCakeへようこそ!</p>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="名前" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" value="メールアドレス" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="パスワード" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="パスワードの確認" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
            <x-label for="formFile" value="プロフィール画像" />

            <input class="form-control mb-3" type="file" id="formFile"  name="image"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('登録済ですか？') }}
                </a>

                <x-button class="ml-4">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
