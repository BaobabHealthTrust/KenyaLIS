<?php

class Net_HL7_Types_PL
{
     private $pointOfCare;
     private $room;
     private $bed;
     private $facility;
     private $locationStatus;
     private $personLocationType;
     private $building;
     private $floor;
     private $locationDescription;
     private $comprehensiveLocationIdentifier;
     private $assigningAuthorityForLocation;

     public function __construct($components)
     {
         $this->pointOfCare = (empty($components[0])) ? "" : $components[0];
         $this->room = (empty($components[1])) ? "" : $components[1];
         $this->bed = (empty($components[2])) ? "" : $components[2];
         $this->facility = (empty($components[3])) ? "" : $components[3];
         $this->locationStatus = (empty($components[4])) ? "" : $components[4];
         $this->personLocationType = (empty($components[5])) ? "" : $components[5];
         $this->building = (empty($components[6])) ? "" : $components[6];
         $this->floor = (empty($components[7])) ? "" : $components[7];
         $this->locationDescription = (empty($components[8])) ? "" : $components[8];
         $this->comprehensiveLocationIdentifier = (empty($components[9])) ? "" : $components[9];
         $this->assigningAuthorityForLocation = (empty($components[10])) ? "" : $components[10];
     }

    /**                     
     * @return Net_HL7_Types_PL   
     */                     
     public static function template() {           
         return new Net_HL7_Types_PL(array());     
     }                                             

    /**                                           
     * @return array                              
     */                                           
    public function toArray() {                   
        $components = array();                    
        $components[0] = $this->pointOfCare;                
        $components[1] = $this->room;                
        $components[2] = $this->bed;                
        $components[3] = $this->facility;                
        $components[4] = $this->locationStatus;                
        $components[5] = $this->personLocationType;                
        $components[6] = $this->building;                
        $components[7] = $this->floor;                
        $components[8] = $this->locationDescription;                
        $components[9] = $this->comprehensiveLocationIdentifier;                
        $components[10] = $this->assigningAuthorityForLocation;                
        return $components;                        
    }                                               

    /**                                                            
     * @param $pointOfCare string                            
     */                                                            
    public function setPointOfCare($pointOfCare)     
    {                                                              
        $this->pointOfCare = $pointOfCare;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getPointOfCare()                        
    {                                                              
        return $this->pointOfCare;                          
    }                                                              

    /**                                                            
     * @param $room string                            
     */                                                            
    public function setRoom($room)     
    {                                                              
        $this->room = $room;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getRoom()                        
    {                                                              
        return $this->room;                          
    }                                                              

    /**                                                            
     * @param $bed string                            
     */                                                            
    public function setBed($bed)     
    {                                                              
        $this->bed = $bed;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getBed()                        
    {                                                              
        return $this->bed;                          
    }                                                              

    /**                                                            
     * @param $facility string                            
     */                                                            
    public function setFacility($facility)     
    {                                                              
        $this->facility = $facility;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getFacility()                        
    {                                                              
        return $this->facility;                          
    }                                                              

    /**                                                            
     * @param $locationStatus string                            
     */                                                            
    public function setLocationStatus($locationStatus)     
    {                                                              
        $this->locationStatus = $locationStatus;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getLocationStatus()                        
    {                                                              
        return $this->locationStatus;                          
    }                                                              

    /**                                                            
     * @param $personLocationType string                            
     */                                                            
    public function setPersonLocationType($personLocationType)     
    {                                                              
        $this->personLocationType = $personLocationType;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getPersonLocationType()                        
    {                                                              
        return $this->personLocationType;                          
    }                                                              

    /**                                                            
     * @param $building string                            
     */                                                            
    public function setBuilding($building)     
    {                                                              
        $this->building = $building;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getBuilding()                        
    {                                                              
        return $this->building;                          
    }                                                              

    /**                                                            
     * @param $floor string                            
     */                                                            
    public function setFloor($floor)     
    {                                                              
        $this->floor = $floor;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getFloor()                        
    {                                                              
        return $this->floor;                          
    }                                                              

    /**                                                            
     * @param $locationDescription string                            
     */                                                            
    public function setLocationDescription($locationDescription)     
    {                                                              
        $this->locationDescription = $locationDescription;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getLocationDescription()                        
    {                                                              
        return $this->locationDescription;                          
    }                                                              

    /**                                                            
     * @param $comprehensiveLocationIdentifier string                            
     */                                                            
    public function setComprehensiveLocationIdentifier($comprehensiveLocationIdentifier)     
    {                                                              
        $this->comprehensiveLocationIdentifier = $comprehensiveLocationIdentifier;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getComprehensiveLocationIdentifier()                        
    {                                                              
        return $this->comprehensiveLocationIdentifier;                          
    }                                                              

    /**                                                            
     * @param $assigningAuthorityForLocation string                            
     */                                                            
    public function setAssigningAuthorityForLocation($assigningAuthorityForLocation)     
    {                                                              
        $this->assigningAuthorityForLocation = $assigningAuthorityForLocation;           
    }                                                              

    /**                                                            
     * @return string                                              
     */                                                            
    public function getAssigningAuthorityForLocation()                        
    {                                                              
        return $this->assigningAuthorityForLocation;                          
    }                                                              

}                                                                  
?>
