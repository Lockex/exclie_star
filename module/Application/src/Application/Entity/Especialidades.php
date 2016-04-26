<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Usuarios entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`especialidades`")
 */
class Especialidades {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;

    /** @ORM\Column(type="string") */
    protected $ESPECIALIDAD;

 

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
     * Gets the value of NOMBRE.
     *
     * @return mixed
     */
    public function getESPECIALIDAD()
    {
        return $this->ESPECIALIDAD;
    }
    
    /**
     * Sets the value of NOMBRE.
     *
     * @param mixed $NOMBRE the no mb re 
     *
     * @return self
     */
    public function setESPECIALIDAD($ESPECIALIDAD)
    {
        $this->ESPECIALIDAD = $ESPECIALIDAD;

        return $this;
    }
}