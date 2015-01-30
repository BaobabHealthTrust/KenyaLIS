<?php

class Net_HL7_Types_XAD
{
     private $streetAddress;
     private $otherDesignation;
     private $city;
     private $stateOrProvince;
     private $zipOrPostalCode;
     private $country;
     private $addressType;
     private $otherGeographicDesignation;
     private $countyParishCode;
     private $censusTract;
     private $addressRepresentationCode;

     public function __construct($components)
     {
         $this->streetAddress = (empty($components[0])) ? "" : $components[0];
         $this->otherDesignation = (empty($components[1])) ? "" : $components[1];
         $this->city = (empty($components[2])) ? "" : $components[2];
         $this->stateOrProvince = (empty($components[3])) ? "" : $components[3];
         $this->zipOrPostalCode = (empty($components[4])) ? "" : $components[4];
         $this->country = (empty($components[5])) ? "" : $components[5];
         $this->addressType = (empty($components[6])) ? "" : $components[6];
         $this->otherGeographicDesignation = (empty($components[7])) ? "" : $components[7];
         $this->countyParishCode = (empty($components[8])) ? "" : $components[8];
         $this->censusTract = (empty($components[9])) ? "" : $components[9];
         $this->addressRepresentationCode = (empty($components[10])) ? "" : $components[10];
     }

    /**                     
     * @return Net_HL7_Types_XAD   
     */                     
     public static function template() {           
         return new Net_HL7_Types_XAD(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->streetAddress;                
        $components[1] = $this->otherDesignation;                
        $components[2] = $this->city;                
        $components[3] = $this->stateOrProvince;                
        $components[4] = $this->zipOrPostalCode;                
        $components[5] = $this->country;                
        $components[6] = $this->addressType;                
        $components[7] = $this->otherGeographicDesignation;                
        $components[8] = $this->countyParishCode;                
        $components[9] = $this->censusTract;                
        $components[10] = $this->addressRepresentationCode;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $streetAddress string                            
     */                                                            
    public function setStreetAddress($streetAddress)     
    {                                                              
        $this->streetAddress = $streetAddress;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getStreetAddress()                        
    {                                                              
        return $this->streetAddress;                          
    }                                                              

    /**                                                            
     * @param $otherDesignation string                            
     */                                                            
    public function setOtherDesignation($otherDesignation)     
    {                                                              
        $this->otherDesignation = $otherDesignation;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getOtherDesignation()                        
    {                                                              
        return $this->otherDesignation;                          
    }                                                              

    /**                                                            
     * @param $city string                            
     */                                                            
    public function setCity($city)     
    {                                                              
        $this->city = $city;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getCity()                        
    {                                                              
        return $this->city;                          
    }                                                              

    /**                                                            
     * @param $stateOrProvince string                            
     */                                                            
    public function setStateOrProvince($stateOrProvince)     
    {                                                              
        $this->stateOrProvince = $stateOrProvince;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getStateOrProvince()                        
    {                                                              
        return $this->stateOrProvince;                          
    }                                                              

    /**                                                            
     * @param $zipOrPostalCode string                            
     */                                                            
    public function setZipOrPostalCode($zipOrPostalCode)     
    {                                                              
        $this->zipOrPostalCode = $zipOrPostalCode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getZipOrPostalCode()                        
    {                                                              
        return $this->zipOrPostalCode;                          
    }                                                              

    /**                                                            
     * @param $country string                            
     */                                                            
    public function setCountry($country)     
    {                                                              
        $this->country = $country;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getCountry()                        
    {                                                              
        return $this->country;                          
    }                                                              

    /**                                                            
     * @param $addressType string                            
     */                                                            
    public function setAddressType($addressType)     
    {                                                              
        $this->addressType = $addressType;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAddressType()                        
    {                                                              
        return $this->addressType;                          
    }                                                              

    /**                                                            
     * @param $otherGeographicDesignation string                            
     */                                                            
    public function setOtherGeographicDesignation($otherGeographicDesignation)     
    {                                                              
        $this->otherGeographicDesignation = $otherGeographicDesignation;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getOtherGeographicDesignation()                        
    {                                                              
        return $this->otherGeographicDesignation;                          
    }                                                              

    /**                                                            
     * @param $countyParishCode string                            
     */                                                            
    public function setCountyParishCode($countyParishCode)     
    {                                                              
        $this->countyParishCode = $countyParishCode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getCountyParishCode()                        
    {                                                              
        return $this->countyParishCode;                          
    }                                                              

    /**                                                            
     * @param $censusTract string                            
     */                                                            
    public function setCensusTract($censusTract)     
    {                                                              
        $this->censusTract = $censusTract;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getCensusTract()                        
    {                                                              
        return $this->censusTract;                          
    }                                                              

    /**                                                            
     * @param $addressRepresentationCode string                            
     */                                                            
    public function setAddressRepresentationCode($addressRepresentationCode)     
    {                                                              
        $this->addressRepresentationCode = $addressRepresentationCode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAddressRepresentationCode()                        
    {                                                              
        return $this->addressRepresentationCode;                          
    }                                                              

}                                                                  
?>
