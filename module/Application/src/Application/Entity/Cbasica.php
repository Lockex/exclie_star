<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Cbasica {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="date") */
    protected $FECHA_CONS;
    /** @ORM\Column(type="string") */
    protected $MOTIVO_CONS; 

    /**
     * Gets the value of ID.
     *
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Sets the value of ID.
     *
     * @param mixed $ID the 
     *
     * @return self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Gets the value of FECHA_CONS.
     *
     * @return mixed
     */
    public function getFECHACONS()
    {
        return $this->FECHA_CONS;
    }

    /**
     * Sets the value of FECHA_CONS.
     *
     * @param mixed $FECHA_CONS the 
     *
     * @return self
     */
    public function setFECHACONS($FECHA_CONS)
    {
        $this->FECHA_CONS = $FECHA_CONS;

        return $this;
    }

    /**
     * Gets the value of MOTIVO_CONS.
     *
     * @return mixed
     */
    public function getMOTIVOCONS()
    {
        return $this->MOTIVO_CONS;
    }

    /**
     * Sets the value of MOTIVO_CONS.
     *
     * @param mixed $MOTIVO_CONS the 
     *
     * @return self
     */
    public function setMOTIVOCONS($MOTIVO_CONS)
    {
        $this->MOTIVO_CONS = $MOTIVO_CONS;

        return $this;
    }
}