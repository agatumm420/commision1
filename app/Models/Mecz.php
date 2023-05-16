<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mecz
 * 
 * @property int $id
 * @property string $dzien
 * @property string $mies
 * @property string $rok
 * @property string $rodzaj
 * @property string $przeciw
 * @property string $wynik
 * @property string $km
 * @property string $kid
 *
 * @package App\Models
 */
class Mecz extends Model
{
	protected $table = 'mecz';
	public $timestamps = false;

	protected $fillable = [
		'dzien',
		'mies',
		'rok',
		'rodzaj',
		'przeciw',
		'wynik',
		'km',
		'kid'
	];
}
