<?php
 
class Wheel extends Eloquent {
  protected $table = 'wheels';

  public function post()
  {
      return $this->belongsTo('Bike');
  }
}

?>