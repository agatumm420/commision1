<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Druzyna
 * 
 * @property int $id_dr
 * @property string $nazwa_dr
 * 
 * @property Collection|MeczRuch[] $mecz_ruches
 * @property Collection|MeczWidzew[] $mecz_widzews
 *
 * @package App\Models
 */
class Druzyna extends Model
{
    use CrudTrait;
	protected $table = 'druzyna';
	protected $primaryKey = 'id_dr';
	public $timestamps = false;

	protected $fillable = [
		'nazwa_dr'
	];

	public function mecz_ruches()
	{
		return $this->hasMany(MeczRuch::class, 'id_dr');
	}

	public function mecz_widzews()
	{
		return $this->hasMany(MeczWidzew::class, 'id_dr');
	}
}
