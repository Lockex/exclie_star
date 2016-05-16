<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Imagenesconsultas entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`imagenesconsultas`")
 */
class Imagenesconsultas {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
     /** @ORM\ManyToOne(targetEntity="Pacientes") @ORM\JoinColumn(referencedColumnName="ID",onDelete="CASCADE") */
    protected $PACIENTE;
    /** @ORM\Column(type="string") */
    protected $IMAGEN;
    /** @ORM\Column(type="date") */
    protected $FECHACONSULTA;

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
     * Gets the value of PACIENTE.
     *
     * @return mixed
     */
    public function getPACIENTE()
    {
        return $this->PACIENTE;
    }

    /**
     * Sets the value of PACIENTE.
     *
     * @param mixed $PACIENTE the 
     *
     * @return self
     */
    public function setPACIENTE($PACIENTE)
    {
        $this->PACIENTE = $PACIENTE;

        return $this;
    }

    /**
     * Gets the value of IMAGEN.
     *
     * @return mixed
     */
    public function getIMAGEN()
    {
        return $this->IMAGEN;
    }

    /**
     * Sets the value of IMAGEN.
     *
     * @param mixed $IMAGEN the 
     *
     * @return self
     */
    public function setIMAGEN($IMAGEN)
    {
        $this->IMAGEN = $IMAGEN;

        return $this;
    }

    /**
     * Gets the value of FECHACONSULTA.
     *
     * @return mixed
     */
    public function getFECHACONSULTA()
    {
        return $this->FECHACONSULTA;
    }

    /**
     * Sets the value of FECHACONSULTA.
     *
     * @param mixed $FECHACONSULTA the 
     *
     * @return self
     */
    public function setFECHACONSULTA($FECHACONSULTA)
    {
        $this->FECHACONSULTA = $FECHACONSULTA;

        return $this;
    }

}