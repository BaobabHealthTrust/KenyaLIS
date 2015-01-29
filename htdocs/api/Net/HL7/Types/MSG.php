<?php

class Net_HL7_Types_MSG
{
     private $messageCode;
     private $triggerEvent;
     private $messageStructure;

     public function __construct($components)
     {
         $this->messageCode = (empty($components[0])) ? "" : $components[0];
         $this->triggerEvent = (empty($components[1])) ? "" : $components[1];
         $this->messageStructure = (empty($components[2])) ? "" : $components[2];
     }

    /**                     
     * @return Net_HL7_Types_MSG   
     */                     
     public static function template() {           
         return new Net_HL7_Types_MSG(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->messageCode;                
        $components[1] = $this->triggerEvent;                
        $components[2] = $this->messageStructure;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $messageCode string                            
     */                                                            
    public function setMessageCode($messageCode)     
    {                                                              
        $this->messageCode = $messageCode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getMessageCode()                        
    {                                                              
        return $this->messageCode;                          
    }                                                              

    /**                                                            
     * @param $triggerEvent string                            
     */                                                            
    public function setTriggerEvent($triggerEvent)     
    {                                                              
        $this->triggerEvent = $triggerEvent;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getTriggerEvent()                        
    {                                                              
        return $this->triggerEvent;                          
    }                                                              

    /**                                                            
     * @param $messageStructure string                            
     */                                                            
    public function setMessageStructure($messageStructure)     
    {                                                              
        $this->messageStructure = $messageStructure;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getMessageStructure()                        
    {                                                              
        return $this->messageStructure;                          
    }                                                              

}                                                                  
?>
