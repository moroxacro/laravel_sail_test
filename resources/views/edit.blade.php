<x-guest-layout>
  <x-slot name="title">
      マイページ｜laraCake
  </x-slot>
  <x-auth-card>
    <x-slot name="header">
        <p class="main-text">プロフィールを編集</p>
    </x-slot>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('edit') }}">
      @csrf

      <!-- Name -->
      <div>
          <x-label for="name" value="現在のユーザー名" />

          <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" autofocus />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
          <x-label for="email" value="メールアドレス" />

          <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" />
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
      {{-- <div class="mt-4">
          <x-label for="formFile" value="プロフィール画像" />
          @if ($user->profile_image)
          <img src="" alt="プロフィール画像" width=150px height=150px class="rounded-circle">
          <input class="form-control mb-3" type="file" id="formFile"  name="image" />
          @else
          <div class="mt-4 rounded-circle bg-primary d-flex justify-content-center align-items-center text-white" style="width:150px; height:150px;"><p>画像なし</p></div>
          <input class="form-control mb-3" type="file" id="formFile"  name="image" />
          @endif
      </div> --}}
              
      {{-- <p clsaa="error">*写真などは「.gif」「.png」「.jpg」の画像を指定してください</p>
      <p class="error">* 恐れ入りますが、画像を改めて指定してください</p> --}}
      <div class="mt-4 d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-primary">変更する</button>
        <a href="/" class="btn btn-outline-danger ml-2">キャンセル</a>
      </div>
    </form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
  </x-auth-card>
</x-guest-layout>