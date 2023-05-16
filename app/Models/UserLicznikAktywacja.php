<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserLicznikAktywacja
 *
 * @property int $id_ula
 * @property string $link_ula
 * @property Carbon $data_ula
 * @property int $id_u
 *
 * @property UserLicznik $user_licznik
 *
 * @package App\Models
 */
class UserLicznikAktywacja extends Model
{
	protected $table = 'userLicznikAktywacja';
	protected $primaryKey = 'id_ula';
	public $timestamps = false;

	protected $casts = [
		'data_ula' => 'datetime',
		'id_u' => 'int'
	];

	protected $fillable = [
		'link_ula',
		'data_ula',
		'id_u'
	];

	public function user_licznik()
	{
		return $this->belongsTo(User2::class, 'id_u');
	}

}
