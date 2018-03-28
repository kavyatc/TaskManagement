<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\ {
    ModelCreated
};
use Illuminate\Database\Eloquent\SoftDeletes;


class EmployeeTask extends Model {

	use SoftDeletes;

	use IngoingTrait;

	/**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];


    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

 	protected $dates = ['startdatetime','enddatetime'];   


 	 
    protected $fillable = [
        'task_id', 'emp_id','startdatetime','enddatetime','status_id','trasnferred_id','comments'
    ];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return request()->segment(1) === 'admin' ? 'id' : 'startdatetime';
	}
	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function status()
	{
		return $this->hasOne(Status::class,'id','status_id');				
	}
	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function employees()
	{
		return $this->hasOne(Employee::class,'id','emp_id');				
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function transfEmployees()
	{
		return $this->hasOne(Employee::class,'id','trasnferred_id');				
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function tasks()
	{
		return $this->hasOne(Task::class,'id','task_id');		
	}

	
}


