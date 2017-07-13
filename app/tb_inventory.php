<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_inventory extends Model
{
    protected $table = 'tb_inventory';
     // protected $fillable = array('id','name','brand','type','date','created_at','updated_at');

    protected $guarded = ['id'];
 
    public function user(){
    	return $this->belongsTo('App\Models\Access\User\User');
    }
}
