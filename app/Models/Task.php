<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\ {
    ModelCreated
};
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model {

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

 	protected $dates = ['taskdate'];   


 	 
    protected $fillable = [
        'taskdate', 'product_id','project_id','task','priority_id','status_id','assigned','emp_id','comments'
    ];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return request()->segment(1) === 'admin' ? 'id' : 'task';
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function products()
	{
		return $this->hasOne(Product::class,'id','product_id');		
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function projects()
	{
		return $this->hasOne(Project::class,'id','project_id');				
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
	public function employee_tasks()
	{
		return $this->hasone(EmployeeTask::class,'task_id','id');		
	}
}


