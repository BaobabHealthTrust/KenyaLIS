<?php

class Net_HL7_Types_SAD
{
     private $streetOrMailingAddress;
     private $streetName;
     private $dwellingNumber;

     public function __construct($components)
     {
         $this->streetOrMailingAddress = (empty($components[0])) ? "" : $components[0];
         $this->streetName = (empty($components[1])) ? "" : $components[1];
         $this->dwellingNumber = (empty($components[2])) ? "" : $components[2];
     }

    /**                     
     * @return Net_HL7_Types_SAD   
     */                     
     public static function template() {           
         return new Net_HL7_Types_SAD(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->streetOrMailingAddress;                
        $components[1] = $this->streetName;                
        $components[2] = $this->dwellingNumber;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $streetOrMailingAddress string                            
     */                                                            
    public function setStreetOrMailingAddress($streetOrMailingAddress)     
    {                                                              
        $this->streetOrMailingAddress = $streetOrMailingAddress;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getStreetOrMailingAddress()                        
    {                                                              
        return $this->streetOrMailingAddress;                          
    }                                                              

    /**                                                            
     * @param $streetName string                            
     */                                                            
    public function setStreetName($streetName)     
    {                                                              
        $this->streetName = $streetName;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getStreetName()                        
    {                                                              
        return $this->streetName;                          
    }                                                              

    /**                                                            
     * @param $dwellingNumber string                            
     */                                                            
    public function setDwellingNumber($dwellingNumber)     
    {                                                              
        $this->dwellingNumber = $dwellingNumber;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getDwellingNumber()                        
    {                                                              
        return $this->dwellingNumber;                          
    }                                                              

}                                                                  
?>
