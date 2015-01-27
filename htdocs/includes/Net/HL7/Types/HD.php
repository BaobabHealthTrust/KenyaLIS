<?php

class Net_HL7_Types_HD
{
     private $namespaceId;
     private $universalId;
     private $universalIdType;

     public function __construct($components)
     {
         $this->namespaceId = (empty($components[0])) ? "" : $components[0];
         $this->universalId = (empty($components[1])) ? "" : $components[1];
         $this->universalIdType = (empty($components[2])) ? "" : $components[2];
     }

    /**                     
     * @return Net_HL7_Types_HD   
     */                     
     public static function template() {           
         return new Net_HL7_Types_HD(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->namespaceId;                
        $components[1] = $this->universalId;                
        $components[2] = $this->universalIdType;                
        return $components;                        
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

}                                                                  
?>
