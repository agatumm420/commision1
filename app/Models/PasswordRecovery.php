<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PasswordRecovery
 * 
 * @property int $id_pr
 * @property string $sha1Link
 * @property Carbon $data_pr
 * @property int $id_u
 * 
 * @property UserLicznik $user_licznik
 *
 * @package App\Models
 */
class PasswordRecovery extends Model
{
	protected $table = 'passwordRecovery';
	protected $primaryKey = 'id_pr';
	public $timestamps = false;

	protected $casts = [
		'data_pr' => 'datetime',
		'id_u' => 'int'
	];

	protected $fillable = [
		'sha1Link',
		'data_pr',
		'id_u'
	];

	public function user_licznik()
	{
		return $this->belongsTo(UserLicznik::class, 'id_u');
	}
}
