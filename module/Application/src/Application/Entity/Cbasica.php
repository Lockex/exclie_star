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
    /** @ORM\Column(type="string",length=60000) */
    protected $SUBJETIVO; 
    /** @ORM\Column(type="string",length=60000) */
    protected $OBJETIVO; 
    /** @ORM\Column(type="string",length=60000) */
    protected $ANALISIS;
    /** @ORM\Column(type="string",length=60000) */
    protected $PLAN;  

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

    /**
     * Gets the value of SUBJETIVO.
     *
     * @return mixed
     */
    public function getSUBJETIVO()
    {
        return $this->SUBJETIVO;
    }

    /**
     * Sets the value of SUBJETIVO.
     *
     * @param mixed $SUBJETIVO the 
     *
     * @return self
     */
    public function setSUBJETIVO($SUBJETIVO)
    {
        $this->SUBJETIVO = $SUBJETIVO;

        return $this;
    }

    /**
     * Gets the value of OBJETIVO.
     *
     * @return mixed
     */
    public function getOBJETIVO()
    {
        return $this->OBJETIVO;
    }

    /**
     * Sets the value of OBJETIVO.
     *
     * @param mixed $OBJETIVO the 
     *
     * @return self
     */
    public function setOBJETIVO($OBJETIVO)
    {
        $this->OBJETIVO = $OBJETIVO;

        return $this;
    }

    /**
     * Gets the value of ANALISIS.
     *
     * @return mixed
     */
    public function getANALISIS()
    {
        return $this->ANALISIS;
    }

    /**
     * Sets the value of ANALISIS.
     *
     * @param mixed $ANALISIS the 
     *
     * @return self
     */
    public function setANALISIS($ANALISIS)
    {
        $this->ANALISIS = $ANALISIS;

        return $this;
    }

    /**
     * Gets the value of PLAN.
     *
     * @return mixed
     */
    public function getPLAN()
    {
        return $this->PLAN;
    }

    /**
     * Sets the value of PLAN.
     *
     * @param mixed $PLAN the 
     *
     * @return self
     */
    public function setPLAN($PLAN)
    {
        $this->PLAN = $PLAN;

        return $this;
    }
}