<x-app-layout>
    <x-slot name="title">
        お問い合わせ｜laraCake
    </x-slot>
    <!-- header -->
    <x-header/>
    <x-auth-card>
        <x-slot name="header">
            <p class="main-text">お問い合わせ</p>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('mail') }}">
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

            <!-- お問い合わせ内容 -->
            <div class="mt-4">
                <x-label for="message" value="お問い合わせ内容" />

                <x-textarea id="t_message" class="block mt-1 w-full" name="message"  value="{{ old('message') }}" placeholder="こちらにお問い合わせ内容を入力してください。" rows="5"></x-textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('送信') }}
                </x-button>
            </div>
        </form>
        @if (session('success'))
            <div>
                <p class="bg-warning text-center">{{ session('success') }}</p>
            </div>
        @endif
    </x-auth-card>
    <!-- footer -->
    <x-footer/>
</x-app-layout>
