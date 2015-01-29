<?php

class Net_HL7_Types_PT
{
     private $processingId;
     private $processingMode;

     public function __construct($components)
     {
         $this->processingId = (empty($components[0])) ? "" : $components[0];
         $this->processingMode = (empty($components[1])) ? "" : $components[1];
     }

    /**                     
     * @return Net_HL7_Types_PT   
     */                     
     public static function template() {           
         return new Net_HL7_Types_PT(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->processingId;                
        $components[1] = $this->processingMode;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $processingId string                            
     */                                                            
    public function setProcessingId($processingId)     
    {                                                              
        $this->processingId = $processingId;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getProcessingId()                        
    {                                                              
        return $this->processingId;                          
    }                                                              

    /**                                                            
     * @param $processingMode string                            
     */                                                            
    public function setProcessingMode($processingMode)     
    {                                                              
        $this->processingMode = $processingMode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getProcessingMode()                        
    {                                                              
        return $this->processingMode;                          
    }                                                              

}                                                                  
?>
