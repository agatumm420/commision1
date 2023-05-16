<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FanClub
 * 
 * @property int $id_fc
 * @property string $nazwa_fc
 * @property string $symbol_fc
 *
 * @package App\Models
 */
class FanClub extends Model
{
	protected $table = 'fanClub';
	protected $primaryKey = 'id_fc';
	public $timestamps = false;

	protected $fillable = [
		'nazwa_fc',
		'symbol_fc'
	];
}
