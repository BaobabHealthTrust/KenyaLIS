<?php

class Net_HL7_Types_SN
{
     private $comparator;
     private $num1;
     private $separatorSuffix;
     private $num2;

     public function __construct($components)
     {
         $this->comparator = (empty($components[0])) ? "" : $components[0];
         $this->num1 = (empty($components[1])) ? "" : $components[1];
         $this->separatorSuffix = (empty($components[2])) ? "" : $components[2];
         $this->num2 = (empty($components[3])) ? "" : $components[3];
     }

    /**                     
     * @return Net_HL7_Types_SN   
     */                     
     public static function template() {           
         return new Net_HL7_Types_SN(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->comparator;                
        $components[1] = $this->num1;                
        $components[2] = $this->separatorSuffix;                
        $components[3] = $this->num2;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $comparator string                            
     */                                                            
    public function setComparator($comparator)     
    {                                                              
        $this->comparator = $comparator;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getComparator()                        
    {                                                              
        return $this->comparator;                          
    }                                                              

    /**                                                            
     * @param $num1 string                            
     */                                                            
    public function setNum1($num1)     
    {                                                              
        $this->num1 = $num1;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNum1()                        
    {                                                              
        return $this->num1;                          
    }                                                              

    /**                                                            
     * @param $separatorSuffix string                            
     */                                                            
    public function setSeparatorSuffix($separatorSuffix)     
    {                                                              
        $this->separatorSuffix = $separatorSuffix;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSeparatorSuffix()                        
    {                                                              
        return $this->separatorSuffix;                          
    }                                                              

    /**                                                            
     * @param $num2 string                            
     */                                                            
    public function setNum2($num2)     
    {                                                              
        $this->num2 = $num2;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNum2()                        
    {                                                              
        return $this->num2;                          
    }                                                              

}                                                                  
?>
