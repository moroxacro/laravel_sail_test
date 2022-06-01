<x-app-layout>
    <x-slot name="title">
        投稿を編集する｜laraCake
    </x-slot>
    <!-- header -->
    <x-header/>
    
        <div class="container gedf-wrapper">

            <!--- \\\\\\\Post-->
            <div class="card gedf-card shadow">

                <div class="card-body">
                    <form method="POST" action="{{ route('post.update.done') }}" enctype="multipart/form-data">
                        @csrf
                        <dt class="form-txt mb-3">{{ Auth::user()->name }}さん、メッセージをどうぞ</dt>
                        
                        <!-- タイトル -->
                        <div>
                            <x-label for="title" value="タイトル" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $post->title }}" required autofocus />
                        </div>
                        <!-- 投稿内容 -->
                        <div class="mt-4">  
                            <x-label for="my-editor" value="投稿テキスト" />
            
                            <textarea id="my-editor" class="block mt-1 w-full ckeditor" name="message" value="{{ $post->post }}" placeholder="" rows="10"></textarea>
                        </div>

                        <input type="hidden" name="post" value="{{ $post->post }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">

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

                            CKEDITOR.replace('my-editor', options);

                            $(function(){
                                const post = $('input[name="post"]').val();
                                CKEDITOR.instances['my-editor'].setData(post);
                            });
                            
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

                                <x-input id="category" class="block mt-1 w-full" type="text" name="category" value="{{ $tags }}" required autofocus />
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
                                {{ __('編集内容を反映させる') }}
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