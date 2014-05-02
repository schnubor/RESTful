<?php
 
class Bike extends Eloquent {
  protected $table = 'bikes';

  public function wheels(){
    return $this->hasMany('Wheel');
  }
}

?>