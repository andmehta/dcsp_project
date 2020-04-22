

<?php
class Fish
{
//public $temp;
public $color;
public $species;
public $id;
public function __construct($i,$c,$s)
  {
    $this->$id = $i;
    $this->$color = $c;
    $this->$species = $s;

  }

  public function getColor()
  {
    return $this->$color;
  }
  public function getSpecies()
  {
    return $this->$color;
  }
  public function getId()
  {
    return $this->id;
  }

}
?>
