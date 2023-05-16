<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserMeczWidzew
 * 
 * @property int $id_umw
 * @property int $id_mw
 * @property int $id_u
 *
 * @package App\Models
 */
class UserMeczWidzew extends Model
{
	protected $table = 'userMeczWidzew';
	protected $primaryKey = 'id_umw';
	public $timestamps = false;

	protected $casts = [
		'id_mw' => 'int',
		'id_u' => 'int'
	];

	protected $fillable = [
		'id_mw',
		'id_u'
	];
}
