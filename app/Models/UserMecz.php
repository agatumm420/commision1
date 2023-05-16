<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserMecz
 * 
 * @property int $id
 * @property int $mid
 * @property int $uid
 * @property int $kid
 *
 * @package App\Models
 */
class UserMecz extends Model
{
	protected $table = 'user_mecz';
	public $timestamps = false;

	protected $casts = [
		'mid' => 'int',
		'uid' => 'int',
		'kid' => 'int'
	];

	protected $fillable = [
		'mid',
		'uid',
		'kid'
	];
}
