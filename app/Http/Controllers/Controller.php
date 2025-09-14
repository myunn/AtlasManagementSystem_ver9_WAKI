<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


// 必要情報を入力し登録済→【ログインボタン】を押したらtopページへ遷移・未登録→ページ遷移なし
public function login(Request $request){
        if($request->isMethod('post')){

            $data=$request->only('mail','password');
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                return redirect('/top');
            }
        }
        return view("auth.login");
}

// 【新規登録ボタン】を押したら新規登録ページへ遷移
public function register(Request $request){
        if($request->isMethod('post')){

            $data=$request->only('mail','password');
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                return redirect('/top');
            }
        }
        return view("auth.login");
}
}
