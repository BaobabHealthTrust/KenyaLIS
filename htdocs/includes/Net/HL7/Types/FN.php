<?php

class Net_HL7_Types_FN
{
     private $surname;
     private $ownSurnamePrefix;
     private $ownSurname;
     private $surnamePrefixFromPartnerSpouse;
     private $surnameFromPartnerSpouse;

     public function __construct($components)
     {
         $this->surname = (empty($components[0])) ? "" : $components[0];
         $this->ownSurnamePrefix = (empty($components[1])) ? "" : $components[1];
         $this->ownSurname = (empty($components[2])) ? "" : $components[2];
         $this->surnamePrefixFromPartnerSpouse = (empty($components[3])) ? "" : $components[3];
         $this->surnameFromPartnerSpouse = (empty($components[4])) ? "" : $components[4];
     }

    /**                     
     * @return Net_HL7_Types_FN   
     */                     
     public static function template() {           
         return new Net_HL7_Types_FN(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->surname;                
        $components[1] = $this->ownSurnamePrefix;                
        $components[2] = $this->ownSurname;                
        $components[3] = $this->surnamePrefixFromPartnerSpouse;                
        $components[4] = $this->surnameFromPartnerSpouse;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $surname string                            
     */                                                            
    public function setSurname($surname)     
    {                                                              
        $this->surname = $surname;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSurname()                        
    {                                                              
        return $this->surname;                          
    }                                                              

    /**                                                            
     * @param $ownSurnamePrefix string                            
     */                                                            
    public function setOwnSurnamePrefix($ownSurnamePrefix)     
    {                                                              
        $this->ownSurnamePrefix = $ownSurnamePrefix;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getOwnSurnamePrefix()                        
    {                                                              
        return $this->ownSurnamePrefix;                          
    }                                                              

    /**                                                            
     * @param $ownSurname string                            
     */                                                            
    public function setOwnSurname($ownSurname)     
    {                                                              
        $this->ownSurname = $ownSurname;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getOwnSurname()                        
    {                                                              
        return $this->ownSurname;                          
    }                                                              

    /**                                                            
     * @param $surnamePrefixFromPartnerSpouse string                            
     */                                                            
    public function setSurnamePrefixFromPartnerSpouse($surnamePrefixFromPartnerSpouse)     
    {                                                              
        $this->surnamePrefixFromPartnerSpouse = $surnamePrefixFromPartnerSpouse;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSurnamePrefixFromPartnerSpouse()                        
    {                                                              
        return $this->surnamePrefixFromPartnerSpouse;                          
    }                                                              

    /**                                                            
     * @param $surnameFromPartnerSpouse string                            
     */                                                            
    public function setSurnameFromPartnerSpouse($surnameFromPartnerSpouse)     
    {                                                              
        $this->surnameFromPartnerSpouse = $surnameFromPartnerSpouse;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getSurnameFromPartnerSpouse()                        
    {                                                              
        return $this->surnameFromPartnerSpouse;                          
    }                                                              

}                                                                  
?>
