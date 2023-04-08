<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Chat;

class ChatController extends Controller
{
	public function chat(){
		if(auth()->user()->level != 99){
			return abort(404);
		}

		if (auth()->user()->level == 99 ){
			$data = User::leftjoin('chats','users.id','=','chats.id_pengirim')
			->where('level','1')
			->groupBy('id')
			->get();
		// dd($data);
			return view('dashboard.chat.index', compact('data'));
		}
	}

	public function uchat(){
		$id = Auth()->user()->id;
		if(auth()->user()->level != 1){
			return abort(404);
		}
		Chat::where('id_penerima',$id)->update([
			'notif' => 'y',
		]);
		if (auth()->user()->level == 1) {
			$data = [
				'chat' => Chat::
				addSelect('id_pengirim')->
				addSelect('pesan')->
				addSelect('id_penerima')->
				addSelect('chats.created_at')->
				addSelect('name')->
				leftJoin('users','users.id','=','chats.id_pengirim')
				->where('id_pengirim',$id)
				->orWhere('id_penerima',$id)
				->orderBy('chats.created_at','desc')
				->get(),
			];
			// dd($data);
			$penerima = Auth()->user()->id;
			return view('user.chat.index', compact('data','penerima'));
		}
	}

	public function dchat($id){
		if(auth()->user()->level != 99){
			return abort(404);
		}
		Chat::where('id_pengirim',$id)->update([
			'notif' => 'y',
		]);
		$data = [
			'chat' => Chat::
			addSelect('id_pengirim')->
			addSelect('pesan')->
			addSelect('id_penerima')->
			addSelect('chats.created_at')->
			addSelect('name')->
			leftJoin('users','users.id','=','chats.id_pengirim')
			->where('id_pengirim',$id)
			->orWhere('id_penerima',$id)
			->orderBy('chats.created_at','desc')
			->get(),
		];
		$penerima = $id;
		// dd($data,$id);
		return view('dashboard.chat.dchat', compact('data','penerima'));
	}

	public function pchat(Request $r,$id)
	{	
		$r->validate([
			'pesan' => ['required'],
		]);
		// dd($r,$id);
		Chat::create([
			'id_penerima' => $id,
			'pesan'	=> $r->pesan,
		]);

		return redirect('/detailchat/'.$id);
	}

	public function pchatuser(Request $r,$id)
	{	
		$r->validate([
			'pesan' => ['required'],
		]);
		// dd($r,$id);
		Chat::create([
			'id_pengirim' => Auth()->user()->id,
			'pesan'	=> $r->pesan,
		]);

		return redirect('/user_chat');
	}
}
