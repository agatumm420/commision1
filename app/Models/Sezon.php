<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sezon
 * 
 * @property int $id_se
 * @property string $sezon_se
 * @property int|null $id_se_old
 * 
 * @property Collection|MeczRuch[] $mecz_ruches
 * @property Collection|MeczWidzew[] $mecz_widzews
 *
 * @package App\Models
 */
class Sezon extends Model
{
    use CrudTrait;
	protected $table = 'sezon';
	protected $primaryKey = 'id_se';
	public $timestamps = false;

	protected $casts = [
		'id_se_old' => 'int'
	];

	protected $fillable = [
		'sezon_se',
		'id_se_old'
	];

	public function mecz_ruches()
	{
		return $this->hasMany(MeczRuch::class, 'id_se');
	}

	public function mecz_widzews()
	{
		return $this->hasMany(MeczWidzew::class, 'id_se');
	}
}
