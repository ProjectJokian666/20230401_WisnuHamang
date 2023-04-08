<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengirim', 'pesan', 'id_penerima',
    ];

    public function tgltime($a){
        if (isset($a)) {
        	$b = explode(' ', $a);
        	$c = explode('-', $b['0']);
            if ($c['1']=='01') {
                $c['1']='Januari';
            }
            if ($c['1']=='02') {
                $c['1']='Februari';
            }
            if ($c['1']=='03') {
                $c['1']='Maret';
            }
            if ($c['1']=='04') {
                $c['1']='April';
            }
            if ($c['1']=='05') {
                $c['1']='Mei';
            }
            if ($c['1']=='06') {
                $c['1']='Juni';
            }
            if ($c['1']=='07') {
                $c['1']='Juli';
            }
            if ($c['1']=='08') {
                $c['1']='Agustus';
            }
            if ($c['1']=='09') {
                $c['1']='September';
            }
            if ($c['1']=='10') {
                $c['1']='Oktober';
            }
            if ($c['1']=='11') {
                $c['1']='November';
            }
            if ($c['1']=='12') {
                $c['1']='Desember';
            }

            return $c['2'].' '.$c['1'].' '.$c['0'].'<br>'.$b['1'];
        }
        else{
            return '00-00-0000 00:00';
        }
    }
}
