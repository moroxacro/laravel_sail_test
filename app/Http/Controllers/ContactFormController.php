<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendTestMail;      //Mailableクラス
use Mail;


class ContactFormController extends Controller
{
    /**
     * Display the contact view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('mail.index');
    }

    /**
     * 
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ];

        $messages = [
            'name.required' => '名前を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'message.required' => 'メッセージを入力してください。'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect('mail.index')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validate();

        Mail::to('admin@hoge.co.jp')->send(new SendTestMail($data));

        $request->session()->flash('success', '投稿が完了しました');
        return redirect('/mail');
    }
}
