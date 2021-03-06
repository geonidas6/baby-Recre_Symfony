<?php

namespace Proxies\__CG__\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class EnfantHoraire extends \AppBundle\Entity\EnfantHoraire implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'id', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'enfant', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'lundidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'lundifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'mardidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'mardifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'mercrdidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'mercredifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'jeudidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'jeudifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'vendredidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'vendredifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'samedidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'samedifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'dimanchedebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'dimachefin'];
        }

        return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'id', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'enfant', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'lundidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'lundifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'mardidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'mardifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'mercrdidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'mercredifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'jeudidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'jeudifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'vendredidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'vendredifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'samedidebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'samedifin', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'dimanchedebut', '' . "\0" . 'AppBundle\\Entity\\EnfantHoraire' . "\0" . 'dimachefin'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (EnfantHoraire $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnfant($enfant)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnfant', [$enfant]);

        return parent::setEnfant($enfant);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnfant()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnfant', []);

        return parent::getEnfant();
    }

    /**
     * {@inheritDoc}
     */
    public function setLundidebut($lundidebut)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLundidebut', [$lundidebut]);

        return parent::setLundidebut($lundidebut);
    }

    /**
     * {@inheritDoc}
     */
    public function getLundidebut()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLundidebut', []);

        return parent::getLundidebut();
    }

    /**
     * {@inheritDoc}
     */
    public function setLundifin($lundifin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLundifin', [$lundifin]);

        return parent::setLundifin($lundifin);
    }

    /**
     * {@inheritDoc}
     */
    public function getLundifin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLundifin', []);

        return parent::getLundifin();
    }

    /**
     * {@inheritDoc}
     */
    public function setMardidebut($mardidebut)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMardidebut', [$mardidebut]);

        return parent::setMardidebut($mardidebut);
    }

    /**
     * {@inheritDoc}
     */
    public function getMardidebut()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMardidebut', []);

        return parent::getMardidebut();
    }

    /**
     * {@inheritDoc}
     */
    public function setMardifin($mardifin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMardifin', [$mardifin]);

        return parent::setMardifin($mardifin);
    }

    /**
     * {@inheritDoc}
     */
    public function getMardifin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMardifin', []);

        return parent::getMardifin();
    }

    /**
     * {@inheritDoc}
     */
    public function setMercrdidebut($mercrdidebut)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMercrdidebut', [$mercrdidebut]);

        return parent::setMercrdidebut($mercrdidebut);
    }

    /**
     * {@inheritDoc}
     */
    public function getMercrdidebut()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMercrdidebut', []);

        return parent::getMercrdidebut();
    }

    /**
     * {@inheritDoc}
     */
    public function setMercredifin($mercredifin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMercredifin', [$mercredifin]);

        return parent::setMercredifin($mercredifin);
    }

    /**
     * {@inheritDoc}
     */
    public function getMercredifin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMercredifin', []);

        return parent::getMercredifin();
    }

    /**
     * {@inheritDoc}
     */
    public function setJeudidebut($jeudidebut)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJeudidebut', [$jeudidebut]);

        return parent::setJeudidebut($jeudidebut);
    }

    /**
     * {@inheritDoc}
     */
    public function getJeudidebut()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJeudidebut', []);

        return parent::getJeudidebut();
    }

    /**
     * {@inheritDoc}
     */
    public function setJeudifin($jeudifin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJeudifin', [$jeudifin]);

        return parent::setJeudifin($jeudifin);
    }

    /**
     * {@inheritDoc}
     */
    public function getJeudifin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJeudifin', []);

        return parent::getJeudifin();
    }

    /**
     * {@inheritDoc}
     */
    public function setVendredidebut($vendredidebut)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVendredidebut', [$vendredidebut]);

        return parent::setVendredidebut($vendredidebut);
    }

    /**
     * {@inheritDoc}
     */
    public function getVendredidebut()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVendredidebut', []);

        return parent::getVendredidebut();
    }

    /**
     * {@inheritDoc}
     */
    public function setVendredifin($vendredifin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVendredifin', [$vendredifin]);

        return parent::setVendredifin($vendredifin);
    }

    /**
     * {@inheritDoc}
     */
    public function getVendredifin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVendredifin', []);

        return parent::getVendredifin();
    }

    /**
     * {@inheritDoc}
     */
    public function setSamedidebut($samedidebut)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSamedidebut', [$samedidebut]);

        return parent::setSamedidebut($samedidebut);
    }

    /**
     * {@inheritDoc}
     */
    public function getSamedidebut()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSamedidebut', []);

        return parent::getSamedidebut();
    }

    /**
     * {@inheritDoc}
     */
    public function setSamedifin($samedifin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSamedifin', [$samedifin]);

        return parent::setSamedifin($samedifin);
    }

    /**
     * {@inheritDoc}
     */
    public function getSamedifin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSamedifin', []);

        return parent::getSamedifin();
    }

    /**
     * {@inheritDoc}
     */
    public function setDimanchedebut($dimanchedebut)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDimanchedebut', [$dimanchedebut]);

        return parent::setDimanchedebut($dimanchedebut);
    }

    /**
     * {@inheritDoc}
     */
    public function getDimanchedebut()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDimanchedebut', []);

        return parent::getDimanchedebut();
    }

    /**
     * {@inheritDoc}
     */
    public function setDimachefin($dimachefin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDimachefin', [$dimachefin]);

        return parent::setDimachefin($dimachefin);
    }

    /**
     * {@inheritDoc}
     */
    public function getDimachefin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDimachefin', []);

        return parent::getDimachefin();
    }

}
