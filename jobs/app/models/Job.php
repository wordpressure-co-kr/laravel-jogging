<?php 

class Job extends Eloquent {
	protected $fillable = array( 'title', 'date_of_register', 'salary', 'company_id', 'field' );

	public function company(){
		return $this->belongsTo('Company');
	}
}

