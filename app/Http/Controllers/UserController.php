<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Alert;
use Illuminate\Support\Facades\Crypt;
use Hash;
use App\Reminder;
use Mail;

class UserController extends Controller
{

	public function account(){
		$data_account = User::all();
		return view('admin.master',compact('data_account'));
	}	

	public function hapus($id){
		$data_account = User::find($id);
		$data_account->delete();
		alert()->info('Akses Di Berhasil Di Hapus', 'Delete');
		return redirect('/account');
	}

	public function login(){
		return view ('admin.page-login');
	}

	public function register(){
		return view ('admin.page-register');
	}

	public function postlogin(Request $request){
		if (Auth::attempt($request->only('nim','password'))) {
			alert()->success('Welcome To Sistem','Success');
			return redirect('/ormawa-ftik');
		}else{
			alert()->error('Periksa Kembali Username dan Password Anda', 'GAGAL');
		}
		return redirect ('/login');
	}

	public function postregister(Request $request){
		$data_register = new User;
		$data_register->role_login = $request->role_login;
		$data_register->nama_lengkap = $request->nama_lengkap;
		$data_register->ormawa = $request->ormawa;
		$data_register->nim = $request->nim;
		$data_register->password = bcrypt($request->password);
		$data_register->save();
		alert()->success('Akses Di Berhasil Di Hapus', 'Success');
		return redirect('/account');
	}

	public function edit_user($id){
		$data_register = User::where('id', $id)->first();
		return view ('admin.edit-account',compact('data_register'));
	}

	public function update_user(Request $request, $id){
		$data_register = User::find($id);
		$data_register->nama_lengkap = $request->nama_lengkap;
		$data_register->ormawa = $request->ormawa;
		$data_register->nim = $request->nim;
		$data_register->password = bcrypt($request->password);
		alert()->info('Akses Di Berhasil Di Update', 'Updated');
		$data_register->save();
		return redirect ('/account');
	}

	public function logout(){
		Auth::logout();
    	alert()->success('You have been logged out.', 'Good bye!');
		return redirect ('/login');
	}


// Reset Password
	public function reset(){
		return view ('reset');
	}

	public function forgot(Request $request){
		// dd($request->all());
		$user = User::whereEmail($request->email)->first();

		if ($user == null) {
			return redirect()->back()->with(['error' => 'Email Not Exist']);
		}

		$user = User::find($user->id);
		$reminder = Reminder::exists($user) ? : Reminder::create($user);
		$this->sendEmail($user, $reminder);

		return redirect()->back()->with(['success' => 'Reset code sent to your email.']);
		// return view ('reset-password');
	}

	public function sendEmail ($user, $code){
		Mail::send('email', ['user' => $user, 'code' => $code],
			function($message) use  ($user){
				$message->to($user->email);
				$message->subject("$user->nama_lengkap, Reset Your password");
			}
		);
	}


}

