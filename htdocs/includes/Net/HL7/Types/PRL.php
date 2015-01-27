<?php

class Net_HL7_Types_PRL
{
     private $parentObservationIdentifier;
     private $parentObservationSubIdentifier;
     private $parentObservationValueDescriptor;

     public function __construct($components)
     {
         $this->parentObservationIdentifier = (empty($components[0])) ? "" : $components[0];
         $this->parentObservationSubIdentifier = (empty($components[1])) ? "" : $components[1];
         $this->parentObservationValueDescriptor = (empty($components[2])) ? "" : $components[2];
     }

    /**                     
     * @return Net_HL7_Types_PRL   
     */                     
     public static function template() {           
         return new Net_HL7_Types_PRL(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->parentObservationIdentifier;                
        $components[1] = $this->parentObservationSubIdentifier;                
        $components[2] = $this->parentObservationValueDescriptor;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $parentObservationIdentifier string                            
     */                                                            
    public function setParentObservationIdentifier($parentObservationIdentifier)     
    {                                                              
        $this->parentObservationIdentifier = $parentObservationIdentifier;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getParentObservationIdentifier()                        
    {                                                              
        return $this->parentObservationIdentifier;                          
    }                                                              

    /**                                                            
     * @param $parentObservationSubIdentifier string                            
     */                                                            
    public function setParentObservationSubIdentifier($parentObservationSubIdentifier)     
    {                                                              
        $this->parentObservationSubIdentifier = $parentObservationSubIdentifier;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getParentObservationSubIdentifier()                        
    {                                                              
        return $this->parentObservationSubIdentifier;                          
    }                                                              

    /**                                                            
     * @param $parentObservationValueDescriptor string                            
     */                                                            
    public function setParentObservationValueDescriptor($parentObservationValueDescriptor)     
    {                                                              
        $this->parentObservationValueDescriptor = $parentObservationValueDescriptor;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getParentObservationValueDescriptor()                        
    {                                                              
        return $this->parentObservationValueDescriptor;                          
    }                                                              

}                                                                  
?>
