<?php

class Net_HL7_Types_EIP
{
     private $placerAssignedIdentifier;
     private $fillerAssignedIdentifier;

     public function __construct($components)
     {
         $this->placerAssignedIdentifier = (empty($components[0])) ? "" : $components[0];
         $this->fillerAssignedIdentifier = (empty($components[1])) ? "" : $components[1];
     }

    /**                     
     * @return Net_HL7_Types_EIP   
     */                     
     public static function template() {           
         return new Net_HL7_Types_EIP(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->placerAssignedIdentifier;                
        $components[1] = $this->fillerAssignedIdentifier;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $placerAssignedIdentifier string                            
     */                                                            
    public function setPlacerAssignedIdentifier($placerAssignedIdentifier)     
    {                                                              
        $this->placerAssignedIdentifier = $placerAssignedIdentifier;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getPlacerAssignedIdentifier()                        
    {                                                              
        return $this->placerAssignedIdentifier;                          
    }                                                              

    /**                                                            
     * @param $fillerAssignedIdentifier string                            
     */                                                            
    public function setFillerAssignedIdentifier($fillerAssignedIdentifier)     
    {                                                              
        $this->fillerAssignedIdentifier = $fillerAssignedIdentifier;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getFillerAssignedIdentifier()                        
    {                                                              
        return $this->fillerAssignedIdentifier;                          
    }                                                              

}                                                                  
?>
