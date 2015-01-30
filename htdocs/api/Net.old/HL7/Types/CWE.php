<?php

class Net_HL7_Types_CWE
{
     private $identifier;
     private $text;
     private $nameOfCodingSystem;
     private $alternateIdentifier;
     private $alternateText;
     private $nameOfAlternateCodingSystem;
     private $codingSystemVersionId;
     private $alternateCodingSystemVersionId;
     private $originalText;

     public function __construct($components)
     {
         $this->identifier = (empty($components[0])) ? "" : $components[0];
         $this->text = (empty($components[1])) ? "" : $components[1];
         $this->nameOfCodingSystem = (empty($components[2])) ? "" : $components[2];
         $this->alternateIdentifier = (empty($components[3])) ? "" : $components[3];
         $this->alternateText = (empty($components[4])) ? "" : $components[4];
         $this->nameOfAlternateCodingSystem = (empty($components[5])) ? "" : $components[5];
         $this->codingSystemVersionId = (empty($components[6])) ? "" : $components[6];
         $this->alternateCodingSystemVersionId = (empty($components[7])) ? "" : $components[7];
         $this->originalText = (empty($components[8])) ? "" : $components[8];
     }

    /**                     
     * @return Net_HL7_Types_CWE   
     */                     
     public static function template() {           
         return new Net_HL7_Types_CWE(array());     
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
        $components[4] = $this->alternateText;                
        $components[5] = $this->nameOfAlternateCodingSystem;                
        $components[6] = $this->codingSystemVersionId;                
        $components[7] = $this->alternateCodingSystemVersionId;                
        $components[8] = $this->originalText;                
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
     * @param $alternateText string                            
     */                                                            
    public function setAlternateText($alternateText)     
    {                                                              
        $this->alternateText = $alternateText;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAlternateText()                        
    {                                                              
        return $this->alternateText;                          
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

    /**                                                            
     * @param $codingSystemVersionId string                            
     */                                                            
    public function setCodingSystemVersionId($codingSystemVersionId)     
    {                                                              
        $this->codingSystemVersionId = $codingSystemVersionId;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getCodingSystemVersionId()                        
    {                                                              
        return $this->codingSystemVersionId;                          
    }                                                              

    /**                                                            
     * @param $alternateCodingSystemVersionId string                            
     */                                                            
    public function setAlternateCodingSystemVersionId($alternateCodingSystemVersionId)     
    {                                                              
        $this->alternateCodingSystemVersionId = $alternateCodingSystemVersionId;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAlternateCodingSystemVersionId()                        
    {                                                              
        return $this->alternateCodingSystemVersionId;                          
    }                                                              

    /**                                                            
     * @param $originalText string                            
     */                                                            
    public function setOriginalText($originalText)     
    {                                                              
        $this->originalText = $originalText;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getOriginalText()                        
    {                                                              
        return $this->originalText;                          
    }                                                              

}                                                                  
?>
