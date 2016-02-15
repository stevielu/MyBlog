<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

  
class SubMenu extends Model{
    protected $table = 'submenu';
	protected $fillable = array('submenu_name','submenu_link');	
}
