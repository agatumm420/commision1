<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserMeczRuch
 * 
 * @property int $id_umr
 * @property int $id_mr
 * @property int $id_u
 * @property bool $new
 * 
 * @property UserLicznik $user_licznik
 * @property MeczRuch $mecz_ruch
 *
 * @package App\Models
 */
class UserMeczRuch extends Model
{
	protected $table = 'userMeczRuch';
	protected $primaryKey = 'id_umr';
	public $timestamps = false;

	protected $casts = [
		'id_mr' => 'int',
		'id_u' => 'int',
		'new' => 'bool'
	];

	protected $fillable = [
		'id_mr',
		'id_u',
		'new'
	];

	public function user_licznik()
	{
		return $this->belongsTo(UserLicznik::class, 'id_u');
	}

	public function mecz_ruch()
	{
		return $this->belongsTo(MeczRuch::class, 'id_mr');
	}
}
