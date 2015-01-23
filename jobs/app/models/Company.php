<?php

class Company extends Eloquent {
	public $timestamps = false;
	public function jobs(){
		return $this->hasMany('Job');
	}
}
