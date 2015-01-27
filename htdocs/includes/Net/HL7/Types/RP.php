<?php

class Net_HL7_Types_RP
{
     private $pointer;
     private $applicationId;
     private $namespaceId;
     private $universalId;
     private $universalIdType;
     private $typeOfData;
     private $subtype;

     public function __construct($components)
     {
         $this->pointer = (empty($components[0])) ? "" : $components[0];
         $this->applicationId = (empty($components[1])) ? "" : $components[1];
         $this->namespaceId = (empty($components[2])) ? "" : $components[2];
         $this->universalId = (empty($components[3])) ? "" : $components[3];
         $this->universalIdType = (empty($components[4])) ? "" : $components[4];
         $this->typeOfData = (empty($components[5])) ? "" : $components[5];
         $this->subtype = (empty($components[6])) ? "" : $components[6];
     }

    /**                     
     * @return Net_HL7_Types_RP   
     */                     
     public static function template() {           
         return new Net_HL7_Types_RP(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->pointer;                
        $components[1] = $this->applicationId;                
        $components[2] = $this->namespaceId;                
        $components[3] = $this->universalId;                
        $components[4] = $this->universalIdType;                
        $components[5] = $this->typeOfData;                
        $components[6] = $this->subtype;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $pointer string                            
     */                                                            
    public function setPointer($pointer)     
    {                                                              
        $this->pointer = $pointer;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getPointer()                        
    {                                                              
        return $this->pointer;                          
    }                                                              

    /**                                                            
     * @param $applicationId string                            
     */                                                            
    public function setApplicationId($applicationId)     
    {                                                              
        $this->applicationId = $applicationId;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getApplicationId()                        
    {                                                              
        return $this->applicationId;                          
    }                                                              

    /**                                                            
     * @param $namespaceId string                            
     */                                                            
    public function setNamespaceId($namespaceId)     
    {                                                              
        $this->namespaceId = $namespaceId;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNamespaceId()                        
    {                                                              
        return $this->namespaceId;                          
    }                                                              

    /**                                                            
     * @param $universalId string                            
     */                                                            
    public function setUniversalId($universalId)     
    {                                                              
        $this->universalId = $universalId;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getUniversalId()                        
    {                                                              
        return $this->universalId;                          
    }                                                              

    /**                                                            
     * @param $universalIdType string                            
     */                                                            
    public function setUniversalIdType($universalIdType)     
    {                                                              
        $this->universalIdType = $universalIdType;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getUniversalIdType()                        
    {                                                              
        return $this->universalIdType;                          
    }                                                              

    /**                                                            
     * @param $typeOfData string                            
     */                                                            
    public function setTypeOfData($typeOfData)     
    {                                                              
        $this->typeOfData = $typeOfData;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getTypeOfData()                        
    {                                                              
        return $this->typeOfData;                          
    }                                                              

    /**                                                            
     * @param $subtype string                            
     */                                                            
    public function setSubtype($subtype)     
    {                                                              
        $this->subtype = $subtype;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSubtype()                        
    {                                                              
        return $this->subtype;                          
    }                                                              

}                                                                  
?>
