<?php

class Net_HL7_Types_CE
{
     private $identifier;
     private $text;
     private $nameOfCodingSystem;
     private $alternateIdentifier;
     private $alternateTest;
     private $nameOfAlternateCodingSystem;

     public function __construct($components)
     {
         $this->identifier = (empty($components[0])) ? "" : $components[0];
         $this->text = (empty($components[1])) ? "" : $components[1];
         $this->nameOfCodingSystem = (empty($components[2])) ? "" : $components[2];
         $this->alternateIdentifier = (empty($components[3])) ? "" : $components[3];
         $this->alternateTest = (empty($components[4])) ? "" : $components[4];
         $this->nameOfAlternateCodingSystem = (empty($components[5])) ? "" : $components[5];
     }

    /**                     
     * @return Net_HL7_Types_CE   
     */                     
     public static function template() {           
         return new Net_HL7_Types_CE(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->identifier;                
        $components[1] = $this->text;                
        $components[2] = $this->nameOfCodingSystem;                
        $components[3] = $this->alternateIdentifier;                
        $components[4] = $this->alternateTest;                
        $components[5] = $this->nameOfAlternateCodingSystem;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $identifier string                            
     */                                                            
    public function setIdentifier($identifier)     
    {                                                              
        $this->identifier = $identifier;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getIdentifier()                        
    {                                                              
        return $this->identifier;                          
    }                                                              

    /**                                                            
     * @param $text string                            
     */                                                            
    public function setText($text)     
    {                                                              
        $this->text = $text;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getText()                        
    {                                                              
        return $this->text;                          
    }                                                              

    /**                                                            
     * @param $nameOfCodingSystem string                            
     */                                                            
    public function setNameOfCodingSystem($nameOfCodingSystem)     
    {                                                              
        $this->nameOfCodingSystem = $nameOfCodingSystem;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNameOfCodingSystem()                        
    {                                                              
        return $this->nameOfCodingSystem;                          
    }                                                              

    /**                                                            
     * @param $alternateIdentifier string                            
     */                                                            
    public function setAlternateIdentifier($alternateIdentifier)     
    {                                                              
        $this->alternateIdentifier = $alternateIdentifier;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAlternateIdentifier()                        
    {                                                              
        return $this->alternateIdentifier;                          
    }                                                              

    /**                                                            
     * @param $alternateTest string                            
     */                                                            
    public function setAlternateTest($alternateTest)     
    {                                                              
        $this->alternateTest = $alternateTest;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAlternateTest()                        
    {                                                              
        return $this->alternateTest;                          
    }                                                              

    /**                                                            
     * @param $nameOfAlternateCodingSystem string                            
     */                                                            
    public function setNameOfAlternateCodingSystem($nameOfAlternateCodingSystem)     
    {                                                              
        $this->nameOfAlternateCodingSystem = $nameOfAlternateCodingSystem;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNameOfAlternateCodingSystem()                        
    {                                                              
        return $this->nameOfAlternateCodingSystem;                          
    }                                                              

}                                                                  
?>
