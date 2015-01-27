<?php

class Net_HL7_Types_XCN
{
     private $idNumber;
     private $familyName;
     private $lastNamePrefix;
     private $givenName;
     private $middleInitialName;
     private $suffix;
     private $prefix;
     private $degree;
     private $sourceTable;
     private $assigning;

     public function __construct($components)
     {
         $this->idNumber = (empty($components[0])) ? "" : $components[0];
         $this->familyName = (empty($components[1])) ? "" : $components[1];
         $this->lastNamePrefix = (empty($components[2])) ? "" : $components[2];
         $this->givenName = (empty($components[3])) ? "" : $components[3];
         $this->middleInitialName = (empty($components[4])) ? "" : $components[4];
         $this->suffix = (empty($components[5])) ? "" : $components[5];
         $this->prefix = (empty($components[6])) ? "" : $components[6];
         $this->degree = (empty($components[7])) ? "" : $components[7];
         $this->sourceTable = (empty($components[8])) ? "" : $components[8];
         $this->assigning = (empty($components[9])) ? "" : $components[9];
     }

    /**                     
     * @return Net_HL7_Types_XCN   
     */                     
     public static function template() {           
         return new Net_HL7_Types_XCN(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->idNumber;                
        $components[1] = $this->familyName;                
        $components[2] = $this->lastNamePrefix;                
        $components[3] = $this->givenName;                
        $components[4] = $this->middleInitialName;                
        $components[5] = $this->suffix;                
        $components[6] = $this->prefix;                
        $components[7] = $this->degree;                
        $components[8] = $this->sourceTable;                
        $components[9] = $this->assigning;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $idNumber string                            
     */                                                            
    public function setIdNumber($idNumber)     
    {                                                              
        $this->idNumber = $idNumber;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getIdNumber()                        
    {                                                              
        return $this->idNumber;                          
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
     * @param $lastNamePrefix string                            
     */                                                            
    public function setLastNamePrefix($lastNamePrefix)     
    {                                                              
        $this->lastNamePrefix = $lastNamePrefix;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getLastNamePrefix()                        
    {                                                              
        return $this->lastNamePrefix;                          
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
     * @param $middleInitialName string                            
     */                                                            
    public function setMiddleInitialName($middleInitialName)     
    {                                                              
        $this->middleInitialName = $middleInitialName;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getMiddleInitialName()                        
    {                                                              
        return $this->middleInitialName;                          
    }                                                              

    /**                                                            
     * @param $suffix string                            
     */                                                            
    public function setSuffix($suffix)     
    {                                                              
        $this->suffix = $suffix;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSuffix()                        
    {                                                              
        return $this->suffix;                          
    }                                                              

    /**                                                            
     * @param $prefix string                            
     */                                                            
    public function setPrefix($prefix)     
    {                                                              
        $this->prefix = $prefix;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getPrefix()                        
    {                                                              
        return $this->prefix;                          
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
     * @param $sourceTable string                            
     */                                                            
    public function setSourceTable($sourceTable)     
    {                                                              
        $this->sourceTable = $sourceTable;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSourceTable()                        
    {                                                              
        return $this->sourceTable;                          
    }                                                              

    /**                                                            
     * @param $assigning string                            
     */                                                            
    public function setAssigning($assigning)     
    {                                                              
        $this->assigning = $assigning;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAssigning()                        
    {                                                              
        return $this->assigning;                          
    }                                                              

}                                                                  
?>
