<x-app-layout>
    <x-slot name="title">
        投稿ページ｜laraCake
    </x-slot>
    <!-- header -->
    <x-header/>
    
        <div class="container gedf-wrapper">

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
                            <x-label for="my-editor" value="投稿テキスト" />
            
                            <textarea id="my-editor" class="block mt-1 w-full ckeditor" name="message"  value="{{ old('message') }}" placeholder="" rows="10"></textarea>
                        </div>

                        <script>
                            var options = {
                                // エディタの高さを指定します
                                height: 400, 
                                // スペルチェック機能OFF
                                scayt_autoStartup: false,
                                // webからコピペした際でもプレーンテキストを貼り付けるようにする
                                forcePasteAsPlainText: true,
                                filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token() ])}}',
                                filebrowserUploadMethod: 'form',
                                customConfig: '{{ asset('js/config.js') }}'
                            };
                        </script>
                        <script>
                            CKEDITOR.replace('my-editor', options);
                        </script>
                        {{-- <script>
                            ClassicEditor.create( document.querySelector( '#my-editor' ), {
                                ckfinder: {
                                    uploadUrl: 'ckeditor/upload'
                                }
                            } )
                            .then( editor => {
                                window.editor = editor;
                            } )
                            .catch( error => {
                                console.error( 'There was a problem initializing the editor.', error );
                            } );
                        </script> --}}

                        
                        <!-- カテゴリー -->
                        <div class="mt-4">
                            <div>
                                <x-label for="caregory" value="カテゴリータグを入力する" />

                                <x-input id="category" class="block mt-1 w-full" type="text" name="category" placeholder="知識に関連するタグをカンマ区切りで5つまで入力（例: Laravel,マイグレーション）" required autofocus />
                            </div>
                            {{-- <div>
                                <x-label for="category" value="カテゴリー" />

                                <input type="checkbox" name="category[]" value="Eloquent">#Eloquent<br>
                                <input type="checkbox" name="category[]" value="クエリビルダ">#クエリビルダ<br>
                                <input type="checkbox" name="category[]" value="マイグレーション">#マイグレーション<br>
                                <input type="checkbox" name="category[]" value="シーダー">#シーダー<br>
                            </div> --}}
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

    <!-- footer -->
    <x-footer/>

</x-app-layout>