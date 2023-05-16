<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MeczRuch
 *
 * @property int $id_mr
 * @property Carbon $data_mr
 * @property string $wynik_mr
 * @property int $km_mr
 * @property string|null $link_mr
 * @property int $id_se
 * @property int $id_dr
 * @property int $id_ro
 *
 * @property Sezon $sezon
 * @property Druzyna $druzyna
 * @property Rozgrywki $rozgrywki
 * @property Collection|UserMeczRuch[] $user_mecz_ruches
 *
 * @package App\Models
 */
class MeczRuch extends Model
{
    use CrudTrait;
	protected $table = 'meczRuch';
	protected $primaryKey = 'id_mr';
	public $timestamps = false;

	protected $casts = [
		'data_mr' => 'datetime',
		'km_mr' => 'int',
		'id_se' => 'int',
		'id_dr' => 'int',
		'id_ro' => 'int'
	];

	protected $fillable = [
		'data_mr',
		'wynik_mr',
		'km_mr',
		'link_mr',
		'id_se',
		'id_dr',
		'id_ro'
	];

	public function sezon()
	{
		return $this->belongsTo(Sezon::class, 'id_se');
	}

	public function druzyna()
	{
		return $this->belongsTo(Druzyna::class, 'id_dr');
	}

	public function rozgrywkiW()
	{
		return $this->belongsTo(RozgrywkiW::class, 'id_ro');
	}

	public function user_mecz_ruches()
	{
		return $this->hasMany(UserMeczRuch::class, 'id_mr');
	}
}
