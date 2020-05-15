<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sach extends Model
{
    protected $table = 'sach';
    public function sach() {
        return $this->belongsToMany('App\sach', 'sach', 'id_sach');
    }
}
