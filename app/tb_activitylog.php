<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_activitylog extends Model
{
    protected $table = 'tb_activitylog';
     

    protected $guarded = ['id'];
 
    public function user(){
    	return $this->belongsTo('App\Models\Access\User\User');
    }
}
