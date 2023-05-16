<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MeczWidzew
 *
 * @property int $id_mw
 * @property Carbon $data_mw
 * @property string $wynik_mw
 * @property int $km_mw
 * @property int|null $link_mw
 * @property int $id_se
 * @property int $id_dr
 * @property int $id_ro
 *
 * @property Sezon $sezon
 * @property Druzyna $druzyna
 * @property Rozgrywki $rozgrywki
 *
 * @package App\Models
 */
class MeczWidzew extends Model
{
    use CrudTrait;
	protected $table = 'meczWidzew';
	protected $primaryKey = 'id_mw';
	public $timestamps = false;

	protected $casts = [
		'data_mw' => 'datetime',
		'km_mw' => 'int',
		'link_mw' => 'int',
		'id_se' => 'int',
		'id_dr' => 'int',
		'id_ro' => 'int'
	];

	protected $fillable = [
		'data_mw',
		'wynik_mw',
		'km_mw',
		'link_mw',
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
}
