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

                        <div class="card-body">
                            <form method="POST" action="{{ route('post') }}" enctype="multipart/form-data">
                                @csrf
                                <dt class="form-txt mb-3">{{ Auth::user()->name }}さん、メッセージをどうぞ</dt>
                                
                                <!-- タイトル -->
                                <div>
                                    <x-label for="title" value="タイトル" />

                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                                </div>
                                <!-- 投稿内容 -->
                                <div class="mt-4">  
                                    <x-label for="t_message" value="投稿テキスト" />
                  
                                    <x-textarea id="t_message" class="block mt-1 w-full" name="message"  value="{{ old('message') }}" placeholder="" rows="10"></x-textarea>
                                </div>
                                <!-- 写真 -->
                                <div class="mt-4">
                                    <div>
                                        <x-label for="image" value="画像" />
    
                                        <x-file-upload id="formFile" class="block mt-1 w-full" type="file" name="image" autofocus />
                                    </div>
                                </div>
                                <!-- カテゴリー -->
                                <div class="mt-4">
                                    <div>
                                        <x-label for="category" value="カテゴリー" />
    
                                        <input type="checkbox" name="category[]" value="Eloquent">#Eloquent<br>
                                        <input type="checkbox" name="category[]" value="クエリビルダ">#クエリビルダ<br>
                                        <input type="checkbox" name="category[]" value="マイグレーション">#マイグレーション<br>
                                        <input type="checkbox" name="category[]" value="シーダー">#シーダー<br>
                                    </div>
                                </div>
                    
                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-4">
                                        {{ __('投稿') }}
                                    </x-button>
                                </div>
                            </form>    
                        </div>
                    </div>
                    <!-- Post /////-->

                </div>
            </div>
        </div>

    <!-- footer -->
    <x-footer/>

</x-app-layout>