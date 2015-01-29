<?php

class Net_HL7_Types_VID
{
     private $versionId;
     private $internationalizationCode;
     private $internationalVersionId;

     public function __construct($components)
     {
         $this->versionId = (empty($components[0])) ? "" : $components[0];
         $this->internationalizationCode = (empty($components[1])) ? "" : $components[1];
         $this->internationalVersionId = (empty($components[2])) ? "" : $components[2];
     }

    /**                     
     * @return Net_HL7_Types_VID   
     */                     
     public static function template() {           
         return new Net_HL7_Types_VID(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->versionId;                
        $components[1] = $this->internationalizationCode;                
        $components[2] = $this->internationalVersionId;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $versionId string                            
     */                                                            
    public function setVersionId($versionId)     
    {                                                              
        $this->versionId = $versionId;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getVersionId()                        
    {                                                              
        return $this->versionId;                          
    }                                                              

    /**                                                            
     * @param $internationalizationCode string                            
     */                                                            
    public function setInternationalizationCode($internationalizationCode)     
    {                                                              
        $this->internationalizationCode = $internationalizationCode;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getInternationalizationCode()                        
    {                                                              
        return $this->internationalizationCode;                          
    }                                                              

    /**                                                            
     * @param $internationalVersionId string                            
     */                                                            
    public function setInternationalVersionId($internationalVersionId)     
    {                                                              
        $this->internationalVersionId = $internationalVersionId;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getInternationalVersionId()                        
    {                                                              
        return $this->internationalVersionId;                          
    }                                                              

}                                                                  
?>
