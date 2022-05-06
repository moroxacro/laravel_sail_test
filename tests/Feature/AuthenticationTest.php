<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use App\Models\EloquentUser;
use App\Models\User;
use Tests\TestCase;
use Auth;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test 
    */
    public function loginにGETメソッドでアクセスできる()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
    * @test 
    */
    public function DBテスト()
    {
        EloquentUser::;

        $response->assertStatus(200);
    }

    /**
     * ログイン認証テスト
     */
    // public function testLogin(): void
    // {
    //     // テストユーザ作成
    //     $user = User::factory()->create();

    //     $response = $this->post('/login', [
    //         'email' => $user->email,
    //         'password' => 'password',
    //     ]);

    //     // 認証されていることを確認
    //     $this->assertTrue(Auth::check());



    //     // ログイン後にホームページにリダイレクトされるのを確認
    //     $response->assertRedirect('login');
    // }

    /**
     * ログアウトテスト
     */
    // public function testLogout(): void
    // {
    //     // actingAsヘルパで現在認証済みのユーザーを指定する
    //     $response = $this->actingAs($this->user);

    //     // ログアウトページへリクエストを送信
    //     $response->json('POST', route('logout'));

    //     // ログアウト後のレスポンスで、HTTPステータスコードが正常であることを確認
    //     $response->assertStatus(200);

    //     // ユーザーが認証されていないことを確認
    //     $this->assertGuest();
    // }

    

}
