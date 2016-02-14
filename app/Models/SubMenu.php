<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

  
class SubMenu extends Model{
    protected $table = 'sub_menu';
	protected $fillable = array('submenu_name','menu_type');

	
}
