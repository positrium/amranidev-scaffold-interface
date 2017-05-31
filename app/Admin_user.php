<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admin_user.
 *
 * @author  The scaffold-interface created at 2017-05-31 03:25:51am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Admin_user extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'admin_users';

	
}
