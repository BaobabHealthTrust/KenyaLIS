<?php

class Net_HL7_Types_EI
{
     private $entityIdentifier;
     private $namespaceID;
     private $universalId;
     private $universalIdType;

     public function __construct($components)
     {
         $this->entityIdentifier = (empty($components[0])) ? "" : $components[0];
         $this->namespaceID = (empty($components[1])) ? "" : $components[1];
         $this->universalId = (empty($components[2])) ? "" : $components[2];
         $this->universalIdType = (empty($components[3])) ? "" : $components[3];
     }

    /**                     
     * @return Net_HL7_Types_EI   
     */                     
     public static function template() {           
         return new Net_HL7_Types_EI(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->entityIdentifier;                
        $components[1] = $this->namespaceID;                
        $components[2] = $this->universalId;                
        $components[3] = $this->universalIdType;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $entityIdentifier string                            
     */                                                            
    public function setEntityIdentifier($entityIdentifier)     
    {                                                              
        $this->entityIdentifier = $entityIdentifier;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getEntityIdentifier()                        
    {                                                              
        return $this->entityIdentifier;                          
    }                                                              

    /**                                                            
     * @param $namespaceID string                            
     */                                                            
    public function setNamespaceID($namespaceID)     
    {                                                              
        $this->namespaceID = $namespaceID;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getNamespaceID()                        
    {                                                              
        return $this->namespaceID;                          
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

}                                                                  
?>
