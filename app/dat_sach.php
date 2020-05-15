<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dat_sach extends Model
{
    protected $table = 'dat_sach';

    public  function dat_sach() {
        return $this->belongsToMany('App\dat_sach', 'dat_sach', 'id_sach');
    }
}
