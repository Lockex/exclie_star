<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Doctrine ORM implementation of Ordenes entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`ordenes`")
 */
class Ordenes {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
   /** @ORM\Column(type="text",nullable=true) */
    protected $DATOSNUEVOS;
    /**
       * @var Array
       * 
       * @ORM\ManyToMany(targetEntity="Ordentipos", cascade={"persist"})
       * @ORM\JoinTable(name="Ordenfinal",
       *      joinColumns={@ORM\JoinColumn(referencedColumnName="ID")},
       *      inverseJoinColumns={@ORM\JoinColumn(name="TIPO_id", referencedColumnName="ID")}
       *      )
       */
    protected $TIPO;
    /** @ORM\ManyToOne(targetEntity="Consultas") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $CONSULTA;

    public function __construct()
    {
        $this->TIPO = new ArrayCollection();
    }
   

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
     * Gets the value of DATOSNUEVOS.
     *
     * @return mixed
     */
    public function getDATOSNUEVOS()
    {
        return $this->DATOSNUEVOS;
    }

    /**
     * Sets the value of DATOSNUEVOS.
     *
     * @param mixed $DATOSNUEVOS the 
     *
     * @return self
     */
    public function setDATOSNUEVOS($DATOSNUEVOS)
    {
        $this->DATOSNUEVOS = $DATOSNUEVOS;

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

     /**
    * Get TIPOS
    *
    * @param Collection
    *
    * @return 
    */
   public function addTIPO(Collection $TIPO)
   {
       foreach ($TIPO as $TIPOS) {
           $this->addTIPO($TIPOS);
        }

       return $this;
   }
   public function addTIPOS(\Application\Entity\Ordentipos $ORDEN)
   {
       $this->TIPO[] = $ORDEN;
       return $this;
   }
   public function removeTIPO(\Application\Entity\Ordentipos $ORDEN)
   {
       $this->TIPO->removeElement($ORDEN);
       return $this;
   }
}