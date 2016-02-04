<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Recetas {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FECHA_INICIO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $INDICACIONES_ADICIONALES;
      /** @ORM\ManyToOne(targetEntity="Cgineco") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $CONSULTAS;

    /**
     * Gets the value of ID_RECETA.
     *
     * @return mixed
     */
    public function getID_RECETA()
    {
        return $this->ID_RECETA;
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
     * @param mixed $MEDICAMENTO the me di ca me nt o 
     *
     * @return self
     */
    public function setMEDICAMENTO($MEDICAMENTO)
    {
        $this->MEDICAMENTO = $MEDICAMENTO;

        return $this;
    }

    /**
     * Gets the value of UNIDAD_MEDIDA.
     *
     * @return mixed
     */
    public function getUNIDAD_MEDIDA()
    {
        return $this->UNIDAD_MEDIDA;
    }
    
    /**
     * Sets the value of UNIDAD_MEDIDA.
     *
     * @param mixed $UNIDAD_MEDIDA the un id ad  me di da 
     *
     * @return self
     */
    public function setUNIDAD_MEDIDA($UNIDAD_MEDIDA)
    {
        $this->UNIDAD_MEDIDA = $UNIDAD_MEDIDA;

        return $this;
    }

    /**
     * Gets the value of VIA_ADMINISTRACION.
     *
     * @return mixed
     */
    public function getVIA_ADMINISTRACION()
    {
        return $this->VIA_ADMINISTRACION;
    }
    
    /**
     * Sets the value of VIA_ADMINISTRACION.
     *
     * @param mixed $VIA_ADMINISTRACION the vi a  ad mi ni st ra ci on 
     *
     * @return self
     */
    public function setVIA_ADMINISTRACION($VIA_ADMINISTRACION)
    {
        $this->VIA_ADMINISTRACION = $VIA_ADMINISTRACION;

        return $this;
    }

    /**
     * Gets the value of DOSIS.
     *
     * @return mixed
     */
    public function getDOSIS()
    {
        return $this->DOSIS;
    }
    
    /**
     * Sets the value of DOSIS.
     *
     * @param mixed $DOSIS the do si s 
     *
     * @return self
     */
    public function setDOSIS($DOSIS)
    {
        $this->DOSIS = $DOSIS;

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
     * @param mixed $FRECUENCIA the fr ec ue nc ia 
     *
     * @return self
     */
    public function setFRECUENCIA($FRECUENCIA)
    {
        $this->FRECUENCIA = $FRECUENCIA;

        return $this;
    }

    /**
     * Gets the value of FECHA_INICIO.
     *
     * @return mixed
     */
    public function getFECHA_INICIO()
    {
        return $this->FECHA_INICIO;
    }
    
    /**
     * Sets the value of FECHA_INICIO.
     *
     * @param mixed $FECHA_INICIO the fe ch a  in ic io 
     *
     * @return self
     */
    public function setFECHA_INICIO($FECHA_INICIO)
    {
        $this->FECHA_INICIO = $FECHA_INICIO;

        return $this;
    }

    /**
     * Gets the value of FECHA_FIN.
     *
     * @return mixed
     */
    public function getFECHA_FIN()
    {
        return $this->FECHA_FIN;
    }
    
    /**
     * Sets the value of FECHA_FIN.
     *
     * @param mixed $FECHA_FIN the fe ch a  fi n 
     *
     * @return self
     */
    public function setFECHA_FIN($FECHA_FIN)
    {
        $this->FECHA_FIN = $FECHA_FIN;

        return $this;
    }

    /**
     * Gets the value of INDICACIONES_ADICIONALES.
     *
     * @return mixed
     */
    public function getINDICACIONES_ADICIONALES()
    {
        return $this->INDICACIONES_ADICIONALES;
    }
    
    /**
     * Sets the value of INDICACIONES_ADICIONALES.
     *
     * @param mixed $INDICACIONES_ADICIONALES the in di ca ci on es  ad ic io na le s 
     *
     * @return self
     */
    public function setINDICACIONES_ADICIONALES($INDICACIONES_ADICIONALES)
    {
        $this->INDICACIONES_ADICIONALES = $INDICACIONES_ADICIONALES;

        return $this;
    }

    /**
     * Gets the value of CONSULTAS.
     *
     * @return mixed
     */
    public function getCONSULTAS()
    {
        return $this->CONSULTAS;
    }

    /**
     * Sets the value of CONSULTAS.
     *
     * @param mixed $CONSULTAS the 
     *
     * @return self
     */
    public function setCONSULTAS($CONSULTAS)
    {
        $this->CONSULTAS = $CONSULTAS;

        return $this;
    }

   
}