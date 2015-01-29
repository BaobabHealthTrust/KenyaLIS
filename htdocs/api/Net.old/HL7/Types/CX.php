<?php

class Net_HL7_Types_CX
{
     private $idNumber;
     private $checkDigit;
     private $checkDigitScheme;
     private $assigningAuthority;
     private $identifierTypeCode;
     private $assigningFacility;
     private $effectiveDate;

     public function __construct($components)
     {
         $this->idNumber = (empty($components[0])) ? "" : $components[0];
         $this->checkDigit = (empty($components[1])) ? "" : $components[1];
         $this->checkDigitScheme = (empty($components[2])) ? "" : $components[2];
         $this->assigningAuthority = (empty($components[3])) ? "" : $components[3];
         $this->identifierTypeCode = (empty($components[4])) ? "" : $components[4];
         $this->assigningFacility = (empty($components[5])) ? "" : $components[5];
         $this->effectiveDate = (empty($components[6])) ? "" : $components[6];
     }

    /**                     
     * @return Net_HL7_Types_CX   
     */                     
     public static function template() {           
         return new Net_HL7_Types_CX(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->idNumber;                
        $components[1] = $this->checkDigit;                
        $components[2] = $this->checkDigitScheme;                
        $components[3] = $this->assigningAuthority;                
        $components[4] = $this->identifierTypeCode;                
        $components[5] = $this->assigningFacility;                
        $components[6] = $this->effectiveDate;                
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
     * @param $checkDigit string                            
     */                                                            
    public function setCheckDigit($checkDigit)     
    {                                                              
        $this->checkDigit = $checkDigit;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getCheckDigit()                        
    {                                                              
        return $this->checkDigit;                          
    }                                                              

    /**                                                            
     * @param $checkDigitScheme string                            
     */                                                            
    public function setCheckDigitScheme($checkDigitScheme)     
    {                                                              
        $this->checkDigitScheme = $checkDigitScheme;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getCheckDigitScheme()                        
    {                                                              
        return $this->checkDigitScheme;                          
    }                                                              

    /**                                                            
     * @param $assigningAuthority string                            
     */                                                            
    public function setAssigningAuthority($assigningAuthority)     
    {                                                              
        $this->assigningAuthority = $assigningAuthority;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAssigningAuthority()                        
    {                                                              
        return $this->assigningAuthority;                          
    }                                                              

    /**                                                            
     * @param $identifierTypeCode string                            
     */                                                            
    public function setIdentifierTypeCode($identifierTypeCode)     
    {                                                              
        $this->identifierTypeCode = $identifierTypeCode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getIdentifierTypeCode()                        
    {                                                              
        return $this->identifierTypeCode;                          
    }                                                              

    /**                                                            
     * @param $assigningFacility string                            
     */                                                            
    public function setAssigningFacility($assigningFacility)     
    {                                                              
        $this->assigningFacility = $assigningFacility;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAssigningFacility()                        
    {                                                              
        return $this->assigningFacility;                          
    }                                                              

    /**                                                            
     * @param $effectiveDate string                            
     */                                                            
    public function setEffectiveDate($effectiveDate)     
    {                                                              
        $this->effectiveDate = $effectiveDate;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getEffectiveDate()                        
    {                                                              
        return $this->effectiveDate;                          
    }                                                              

}                                                                  
?>
