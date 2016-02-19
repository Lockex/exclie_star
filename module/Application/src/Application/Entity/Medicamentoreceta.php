<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Medicamentoreceta {
	/** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="string",nullable=true) */
    protected $FRECUENCIA;
    /** @ORM\Column(type="string",nullable=true) */
    protected $MEDICAMENTO;
    /** @ORM\ManyToOne(targetEntity="Recetas") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $RECETA;

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
     * Gets the value of FRECUENCIA.
     *
     * @return mixed
     */
    public function getFRECUENCIA()
    {
        return $this->FRECUENCIA;
    }

    /**
     * Sets the value of FRECUENCIA.
     *
     * @param mixed $FRECUENCIA the 
     *
     * @return self
     */
    public function setFRECUENCIA($FRECUENCIA)
    {
        $this->FRECUENCIA = $FRECUENCIA;

        return $this;
    }

    /**
     * Gets the value of MEDICAMENTO.
     *
     * @return mixed
     */
    public function getMEDICAMENTO()
    {
        return $this->MEDICAMENTO;
    }

    /**
     * Sets the value of MEDICAMENTO.
     *
     * @param mixed $MEDICAMENTO the 
     *
     * @return self
     */
    public function setMEDICAMENTO($MEDICAMENTO)
    {
        $this->MEDICAMENTO = $MEDICAMENTO;

        return $this;
    }

    /**
     * Gets the value of RECETA.
     *
     * @return mixed
     */
    public function getRECETA()
    {
        return $this->RECETA;
    }

    /**
     * Sets the value of RECETA.
     *
     * @param mixed $RECETA the 
     *
     * @return self
     */
    public function setRECETA($RECETA)
    {
        $this->RECETA = $RECETA;

        return $this;
    }
}
