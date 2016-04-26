<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Usuarios entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`dependencias`")
 */
class Dependencias {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;

    /** @ORM\Column(type="string") */
    protected $NOMBREDEPENDENCIA;
    /** @ORM\Column(type="boolean") */
    protected $COBRO = 0;
    /** @ORM\Column(type="boolean", nullable=true) */
    protected $ACTIVO = 1;
 

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
     * @param mixed $ID the id 
     *
     * @return self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

  

    /**
     * Gets the value of NOMBREDEPENDENCIA.
     *
     * @return mixed
     */
    public function getNOMBREDEPENDENCIA()
    {
        return $this->NOMBREDEPENDENCIA;
    }
    
    /**
     * Sets the value of NOMBREDEPENDENCIA.
     *
     * @param mixed $NOMBREDEPENDENCIA the no mb re de pe nd en ci a 
     *
     * @return self
     */
    public function setNOMBREDEPENDENCIA($NOMBREDEPENDENCIA)
    {
        $this->NOMBREDEPENDENCIA = $NOMBREDEPENDENCIA;

        return $this;
    }

    /**
     * Gets the value of COBRO.
     *
     * @return mixed
     */
    public function getCOBRO()
    {
        return $this->COBRO;
    }

    /**
     * Sets the value of COBRO.
     *
     * @param mixed $COBRO the 
     *
     * @return self
     */
    public function setCOBRO($COBRO)
    {
        $this->COBRO = $COBRO;

        return $this;
    }

    /**
     * Gets the value of ACTIVO.
     *
     * @return mixed
     */
    public function getACTIVO()
    {
        return $this->ACTIVO;
    }

    /**
     * Sets the value of ACTIVO.
     *
     * @param mixed $ACTIVO the 
     *
     * @return self
     */
    public function setACTIVO($ACTIVO)
    {
        $this->ACTIVO = $ACTIVO;

        return $this;
    }
}