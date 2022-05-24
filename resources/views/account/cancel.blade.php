<x-guest-layout>
    <x-slot name="title">
        退会ページ｜laraCake
    </x-slot>
    <x-auth-card>
      <x-slot name="header">
          <p class="main-text">退会する</p>
      </x-slot>
      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
  
      <form method="POST" action="{{ route('cancel') }}">
        @csrf

        <div class="mt-4">

            <x-label for="formFile" value="ユーザー名" />
            <p>{{ $user->name }}</p>

            <x-label for="formFile" value="メールアドレス" />
            <p>{{ $user->email }}</p>
            <input type="hidden" name="email" value="{{ $user->email }}">
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" value="パスワード" />
  
            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>
        <div class="container-inside">
            <div class='deactivate__text'>
                <div class='deactivate__text__heading'>必ずご確認ください</div>
                    <ul>
                        <li class='u-mb10'>
                            <p class='u-inline'>
                                {{ $user->name }}さん、本当に退会しますか？
                            </p>
                        </li>
                        <li>
                            <p class='u-inline'>アカウントを削除すると、これまでのデータはすべて削除されます。</p>
                        </li>
                    </ul>
                </div>
          </div>
                
        <div class="mt-4 d-flex justify-content-center">
          <button type="submit" class="btn btn-danger">退会する</button>
          <a href="/" class="btn btn-link">キャンセル</a>
        </div>
      </form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
    </x-auth-card>
  </x-guest-layout>