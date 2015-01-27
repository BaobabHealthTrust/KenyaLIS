<?php

class Net_HL7_Types_CQ
{
     private $quantity;
     private $units;

     public function __construct($components)
     {
         $this->quantity = (empty($components[0])) ? "" : $components[0];
         $this->units = (empty($components[1])) ? "" : $components[1];
     }

    /**                     
     * @return Net_HL7_Types_CQ   
     */                     
     public static function template() {           
         return new Net_HL7_Types_CQ(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->quantity;                
        $components[1] = $this->units;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $quantity string                            
     */                                                            
    public function setQuantity($quantity)     
    {                                                              
        $this->quantity = $quantity;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getQuantity()                        
    {                                                              
        return $this->quantity;                          
    }                                                              

    /**                                                            
     * @param $units string                            
     */                                                            
    public function setUnits($units)     
    {                                                              
        $this->units = $units;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getUnits()                        
    {                                                              
        return $this->units;                          
    }                                                              

}                                                                  
?>
