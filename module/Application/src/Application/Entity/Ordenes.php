<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/** @ORM\Entity */
class Ordenes {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\ManyToOne(targetEntity="Ordentipos") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $TIPO;
    /** @ORM\ManyToOne(targetEntity="Consultas") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $CONSULTA;



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
     * Gets the value of TIPO.
     *
     * @return mixed
     */
    public function getTIPO()
    {
        return $this->TIPO;
    }

    /**
     * Sets the value of TIPO.
     *
     * @param mixed $TIPO the 
     *
     * @return self
     */
    public function setTIPO($TIPO)
    {
        $this->TIPO = $TIPO;

        return $this;
    }

    /**
     * Gets the value of CONSULTA.
     *
     * @return mixed
     */
    public function getCONSULTA()
    {
        return $this->CONSULTA;
    }

    /**
     * Sets the value of CONSULTA.
     *
     * @param mixed $CONSULTA the 
     *
     * @return self
     */
    public function setCONSULTA($CONSULTA)
    {
        $this->CONSULTA = $CONSULTA;

        return $this;
    }
}