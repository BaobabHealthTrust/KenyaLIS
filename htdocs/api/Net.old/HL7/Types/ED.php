<?php

class Net_HL7_Types_ED
{
     private $sourceApplication;
     private $typeOfData;
     private $dataSubtype;
     private $encoding;
     private $data;

     public function __construct($components)
     {
         $this->sourceApplication = (empty($components[0])) ? "" : $components[0];
         $this->typeOfData = (empty($components[1])) ? "" : $components[1];
         $this->dataSubtype = (empty($components[2])) ? "" : $components[2];
         $this->encoding = (empty($components[3])) ? "" : $components[3];
         $this->data = (empty($components[4])) ? "" : $components[4];
     }

    /**                     
     * @return Net_HL7_Types_ED   
     */                     
     public static function template() {           
         return new Net_HL7_Types_ED(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->sourceApplication;                
        $components[1] = $this->typeOfData;                
        $components[2] = $this->dataSubtype;                
        $components[3] = $this->encoding;                
        $components[4] = $this->data;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $sourceApplication string                            
     */                                                            
    public function setSourceApplication($sourceApplication)     
    {                                                              
        $this->sourceApplication = $sourceApplication;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSourceApplication()                        
    {                                                              
        return $this->sourceApplication;                          
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
     * @param $dataSubtype string                            
     */                                                            
    public function setDataSubtype($dataSubtype)     
    {                                                              
        $this->dataSubtype = $dataSubtype;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getDataSubtype()                        
    {                                                              
        return $this->dataSubtype;                          
    }                                                              

    /**                                                            
     * @param $encoding string                            
     */                                                            
    public function setEncoding($encoding)     
    {                                                              
        $this->encoding = $encoding;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getEncoding()                        
    {                                                              
        return $this->encoding;                          
    }                                                              

    /**                                                            
     * @param $data string                            
     */                                                            
    public function setData($data)     
    {                                                              
        $this->data = $data;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getData()                        
    {                                                              
        return $this->data;                          
    }                                                              

}                                                                  
?>
