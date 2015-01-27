<?php

class Net_HL7_Types_XPN
{
     private $familyName;
     private $givenName;
     private $middleInitialOrName;
     private $Suffix;
     private $Prefix;
     private $degree;
     private $nameTypeCode;
     private $nameRepresentationCode;
     private $nameContext;

     public function __construct($components)
     {
         $this->familyName = (empty($components[0])) ? "" : $components[0];
         $this->givenName = (empty($components[1])) ? "" : $components[1];
         $this->middleInitialOrName = (empty($components[2])) ? "" : $components[2];
         $this->Suffix = (empty($components[3])) ? "" : $components[3];
         $this->Prefix = (empty($components[4])) ? "" : $components[4];
         $this->degree = (empty($components[5])) ? "" : $components[5];
         $this->nameTypeCode = (empty($components[6])) ? "" : $components[6];
         $this->nameRepresentationCode = (empty($components[7])) ? "" : $components[7];
         $this->nameContext = (empty($components[8])) ? "" : $components[8];
     }

    /**                     
     * @return Net_HL7_Types_XPN   
     */                     
     public static function template() {           
         return new Net_HL7_Types_XPN(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->familyName;                
        $components[1] = $this->givenName;                
        $components[2] = $this->middleInitialOrName;                
        $components[3] = $this->Suffix;                
        $components[4] = $this->Prefix;                
        $components[5] = $this->degree;                
        $components[6] = $this->nameTypeCode;                
        $components[7] = $this->nameRepresentationCode;                
        $components[8] = $this->nameContext;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $familyName string                            
     */                                                            
    public function setFamilyName($familyName)     
    {                                                              
        $this->familyName = $familyName;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getFamilyName()                        
    {                                                              
        return $this->familyName;                          
    }                                                              

    /**                                                            
     * @param $givenName string                            
     */                                                            
    public function setGivenName($givenName)     
    {                                                              
        $this->givenName = $givenName;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getGivenName()                        
    {                                                              
        return $this->givenName;                          
    }                                                              

    /**                                                            
     * @param $middleInitialOrName string                            
     */                                                            
    public function setMiddleInitialOrName($middleInitialOrName)     
    {                                                              
        $this->middleInitialOrName = $middleInitialOrName;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getMiddleInitialOrName()                        
    {                                                              
        return $this->middleInitialOrName;                          
    }                                                              

    /**                                                            
     * @param $Suffix string                            
     */                                                            
    public function setSuffix($Suffix)     
    {                                                              
        $this->Suffix = $Suffix;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSuffix()                        
    {                                                              
        return $this->Suffix;                          
    }                                                              

    /**                                                            
     * @param $Prefix string                            
     */                                                            
    public function setPrefix($Prefix)     
    {                                                              
        $this->Prefix = $Prefix;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getPrefix()                        
    {                                                              
        return $this->Prefix;                          
    }                                                              

    /**                                                            
     * @param $degree string                            
     */                                                            
    public function setDegree($degree)     
    {                                                              
        $this->degree = $degree;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getDegree()                        
    {                                                              
        return $this->degree;                          
    }                                                              

    /**                                                            
     * @param $nameTypeCode string                            
     */                                                            
    public function setNameTypeCode($nameTypeCode)     
    {                                                              
        $this->nameTypeCode = $nameTypeCode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNameTypeCode()                        
    {                                                              
        return $this->nameTypeCode;                          
    }                                                              

    /**                                                            
     * @param $nameRepresentationCode string                            
     */                                                            
    public function setNameRepresentationCode($nameRepresentationCode)     
    {                                                              
        $this->nameRepresentationCode = $nameRepresentationCode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNameRepresentationCode()                        
    {                                                              
        return $this->nameRepresentationCode;                          
    }                                                              

    /**                                                            
     * @param $nameContext string                            
     */                                                            
    public function setNameContext($nameContext)     
    {                                                              
        $this->nameContext = $nameContext;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNameContext()                        
    {                                                              
        return $this->nameContext;                          
    }                                                              

}                                                                  
?>
