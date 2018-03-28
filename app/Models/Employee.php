<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model {

	use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

 	protected $dates = ['birthdate' 
    ];   

    protected $fillable = [
        'emp_code', 'empname','birthdate','address','city_id','position_id'
    ];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return request()->segment(1) === 'admin' ? 'id' : 'empname';
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function cities()
	{
		return $this->hasOne(City::class,'id','city_id');		
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function positions()
	{
		return $this->hasOne(Position::class,'id','position_id');				
	}
}


