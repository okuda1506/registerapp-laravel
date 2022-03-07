<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Mail;

class RegisterController extends Controller
{
    public function index(Request $request){
        return view('register.index');
    }

    public function insertAndMail(RegisterRequest $request){ //フォームリクエストでバリデーション
        //peopleテーブルにinsert
        $param = [
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'firstName' => $request->firstName,
            'mail' => $request->mail,
        ];
        DB::table('people')->insert($param);
        //sendMail
        $customerName = $request->lastName . $request->firstName;
        $toAddress = $request->mail;
    	Mail::send('emails.mailText', ['customerName' => $customerName], function($message) use ($toAddress, $customerName){
            $message->to($toAddress)->subject('登録完了通知');
    	});
        return redirect('register/people');
    }

    public function people(Request $request){
        $items = DB::table('people')->orderBy('id', 'desc')->get();
        return view('register.people',['items' => $items]);
    }
}
