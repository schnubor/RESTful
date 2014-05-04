<?php
 
class Wheel extends Eloquent {
  protected $table = 'wheels';

  public function bike()
  {
      return $this->belongsTo('Bike');
  }
}

?>