<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model{
    protected $table = 'menu';
	protected $fillable = array('menu_name','menu_type','menu_link');

	public function SubMenu(){
		return $this->hasMany('App\Models\SubMenu');
	}
}
