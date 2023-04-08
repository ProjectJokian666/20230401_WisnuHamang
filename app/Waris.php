<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Waris extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cek($a)
    {
    	if (User::where('nik',$a)->exists()) {
    		return 'ada';
    	}
    	else{
    		return 'gak';
    	}
    }
}
