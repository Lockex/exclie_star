<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Municipios entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`municipios`")
 */
class Municipios {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\ManyToOne(targetEntity="Estados") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $ESTADO;
    /** @ORM\Column(type="string") */
    protected $NOMBRE;
    
 

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
    public function getNOMBRE()
    {
        return $this->NOMBRE;
    }
    
    /**
     * Sets the value of NOMBRE.
     *
     * @param mixed $NOMBRE the no mb re 
     *
     * @return self
     */
    public function setNOMBRE($NOMBRE)
    {
        $this->NOMBRE = $NOMBRE;

        return $this;
    }
}