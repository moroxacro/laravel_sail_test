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

    <form method="POST" action="{{ route('edit') }}" enctype="multipart/form-data">
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

        <div class="mt-4">
            <x-label for="formFile" value="プロフィール画像" />
            @if ($user->profile_image)
                <div class="mt-4 d-flex justify-content-center align-items-center">
                    <!-- 選択した画像を出力 -->
                    <p class="profile-img-lg">
                        <img src="storage/{{ $user->profile_image }}" id="preview" alt="プロフィール画像" class="rounded-circle">                
                    </p>
                </div>
                <input class="form-control mt-4 mb-3" type="file" name="image" id="myImage">
                <script>
                    $('#myImage').on('change', function (e) {var reader = new FileReader();reader.onload = function (e) {$("#preview").attr('src', e.target.result);}; reader.readAsDataURL(e.target.files[0]);});
                </script>
            @else
                <div class="mt-4 d-flex justify-content-center align-items-center">
                    <p class="profile-img-lg">
                        <img src="storage/person-circle.svg" id="preview" alt="プロフィール画像" class="rounded-circle">                
                    </p>
                </div>            
                <input class="form-control mt-4 mb-3" type="file" name="image" id="myImage">
                <script>
                    $('#myImage').on('change', function (e) {var reader = new FileReader();reader.onload = function (e) {$("#preview").attr('src', e.target.result);}; reader.readAsDataURL(e.target.files[0]);});
                </script>
            @endif
        </div>

                

        <div class="mt-4 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">変更する</button>
        <a href="/" class="btn btn-danger ml-3">キャンセル</a>
        </div>
    </form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
    </x-auth-card>
</x-guest-layout>