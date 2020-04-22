<?php
class Plant
{
//public $temp;
public $size
public $species;
public $id;
public function __construct($i,$s,$type)
  {
    $this->id = $i;
    $this->$size = $s;
    $this->$species = $type;

  }

  public function getSize()
  {
    return $this->$size;
  }
  public function getPlantSpecies()
  {
    return $this->$species;
  }
  public function getId()
  {
    return $this->$id;
  }

}

?>
