<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Doctrine ORM implementation of Usuarios entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`ordentipos`")
 */
class Ordentipos {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="string",nullable=true) */
    protected $NOMBRE;
    /** @ORM\Column(type="text",nullable=true) */
    protected $DATOS;


    

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
     * Gets the value of NOMBRE.
     *
     * @return mixed
     */
    public function getNOMBRE()
    {
        return $this->NOMBRE;
    }

    /**
     * Sets the value of NOMBRE.
     *
     * @param mixed $NOMBRE the 
     *
     * @return self
     */
    public function setNOMBRE($NOMBRE)
    {
        $this->NOMBRE = $NOMBRE;

        return $this;
    }

    /**
     * Gets the value of DATOS.
     *
     * @return mixed
     */
    public function getDATOS()
    {
        return $this->DATOS;
    }

    /**
     * Sets the value of DATOS.
     *
     * @param mixed $DATOS the 
     *
     * @return self
     */
    public function setDATOS($DATOS)
    {
        $this->DATOS = $DATOS;

        return $this;
    }
}