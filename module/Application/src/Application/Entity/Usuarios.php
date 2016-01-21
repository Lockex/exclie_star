<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Doctrine ORM implementation of Usuarios entity
 * 
 * @ORM\Entity
 * @ORM\Table(name="`Usuarios`",
 *   indexes={@ORM\Index(name="search_idx", columns={"USUARIO", "NOMBRE", "EMAIL"})}
 * )
 */
class Usuarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Annotation\Exclude()
     */
    protected $ID;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=false, unique=true)
     */
    protected $USUARIO;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=120, nullable=false)
     */
    protected $NOMBRE;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, nullable=false, unique=true)
     */
    protected $EMAIL;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, nullable=false)
     */
    protected $PASSWORD;

    /**
     * @var CsnUser\Entity\Role
     * 
     * @ORM\ManyToOne(targetEntity="CsnUser\Entity\Role")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false)
     */
    protected $ROL;


    /**
     * @var CsnUser\Entity\State
     *
     * @ORM\ManyToOne(targetEntity="CsnUser\Entity\State")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false)
     */
    protected $ESTATUS;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true) 
     */
    protected $FOTO;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $FECHAREGISTRO;


    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $EMAILCONFIRMADO;




    /**
     * Gets the value of ID.
     *
     * @return integer
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Sets the value of ID.
     *
     * @param integer $ID the 
     *
     * @return self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Gets the "type":"text",
     *
     * @return string
     */
    public function getUSUARIO()
    {
        return $this->USUARIO;
    }

    /**
     * Sets the "type":"text",
     *
     * @param string $USUARIO the 
     *
     * @return self
     */
    public function setUSUARIO($USUARIO)
    {
        $this->USUARIO = $USUARIO;

        return $this;
    }

    /**
     * Gets the value of NOMBRE.
     *
     * @return string
     */
    public function getNOMBRE()
    {
        return $this->NOMBRE;
    }

    /**
     * Sets the value of NOMBRE.
     *
     * @param string $NOMBRE the 
     *
     * @return self
     */
    public function setNOMBRE($NOMBRE)
    {
        $this->NOMBRE = $NOMBRE;

        return $this;
    }

    /**
     * Gets the "type":"email",
     *
     * @return string
     */
    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    /**
     * Sets the "type":"email",
     *
     * @param string $EMAIL the 
     *
     * @return self
     */
    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;

        return $this;
    }

    /**
     * Gets the "type":"password",
     *
     * @return string
     */
    public function getPASSWORD()
    {
        return $this->PASSWORD;
    }

    /**
     * Sets the "type":"password",
     *
     * @param string $PASSWORD the 
     *
     * @return self
     */
    public function setPASSWORD($PASSWORD)
    {
        $this->PASSWORD = $PASSWORD;

        return $this;
    }

    /**
     * Gets the "required":"true",
     *
     * @return CsnUser\Entity\Role
     */
    public function getROLE()
    {
        return $this->ROL;
    }

    /**
     * Sets the "required":"true",
     *
     * @param CsnUser\Entity\Role $ROL the 
     *
     * @return self
     */
    public function setROL(CsnUser\Entity\Role $ROL)
    {
        $this->ROL = $ROL;

        return $this;
    }

    /**
     * Gets the "required":"true",
     *
     * @return CsnUser\Entity\State
     */
    public function getESTATUS()
    {
        return $this->ESTATUS;
    }

    /**
     * Sets the "required":"true",
     *
     * @param CsnUser\Entity\State $ESTATUS the 
     *
     * @return self
     */
    public function setESTATUS(CsnUser\Entity\State $ESTATUS)
    {
        $this->ESTATUS = $ESTATUS;

        return $this;
    }

    /**
     * Gets the value of FOTO.
     *
     * @return string
     */
    public function getFOTO()
    {
        return $this->FOTO;
    }

    /**
     * Sets the value of FOTO.
     *
     * @param string $FOTO the 
     *
     * @return self
     */
    public function setFOTO($FOTO)
    {
        $this->FOTO = $FOTO;

        return $this;
    }

    /**
     * Gets the value of FECHAREGISTRO.
     *
     * @return \DateTime
     */
    public function getFECHAREGISTRO()
    {
        return $this->FECHAREGISTRO;
    }

    /**
     * Sets the value of FECHAREGISTRO.
     *
     * @param \DateTime $FECHAREGISTRO the 
     *
     * @return self
     */
    public function setFECHAREGISTRO(\DateTime $FECHAREGISTRO)
    {
        $this->FECHAREGISTRO = $FECHAREGISTRO;

        return $this;
    }

    /**
     * Gets the value of EMAILCONFIRMADO.
     *
     * @return boolean
     */
    public function getEMAILCONFIRMADO()
    {
        return $this->EMAILCONFIRMADO;
    }

    /**
     * Sets the value of EMAILCONFIRMADO.
     *
     * @param boolean $EMAILCONFIRMADO the 
     *
     * @return self
     */
    public function setEMAILCONFIRMADO($EMAILCONFIRMADO)
    {
        $this->EMAILCONFIRMADO = $EMAILCONFIRMADO;

        return $this;
    }
}
