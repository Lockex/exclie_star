<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Fotosconsulta {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\ManyToOne(targetEntity="Consultas") @ORM\JoinColumn(referencedColumnName="ID",onDelete="CASCADE") */
    protected $ID_CONS;
    /** @ORM\ManyToOne(targetEntity="Cgineco") @ORM\JoinColumn(referencedColumnName="ID",onDelete="CASCADE") */
    protected $ID_CONSGINECO;
     /** @ORM\Column(type="string") */
    protected $IMAGEN;


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
     * Gets the value of ID_CONS.
     *
     * @return mixed
     */
    public function getIDCONS()
    {
        return $this->ID_CONS;
    }

    /**
     * Sets the value of ID_CONS.
     *
     * @param mixed $ID_CONS the 
     *
     * @return self
     */
    public function setIDCONS($ID_CONS)
    {
        $this->ID_CONS = $ID_CONS;

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
     * Gets the value of ID_CONSGINECO.
     *
     * @return mixed
     */
    public function getIDCONSGINECO()
    {
        return $this->ID_CONSGINECO;
    }

    /**
     * Sets the value of ID_CONSGINECO.
     *
     * @param mixed $ID_CONSGINECO the 
     *
     * @return self
     */
    public function setIDCONSGINECO($ID_CONSGINECO)
    {
        $this->ID_CONSGINECO = $ID_CONSGINECO;

        return $this;
    }
}