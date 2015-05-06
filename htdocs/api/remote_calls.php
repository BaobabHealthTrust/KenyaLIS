<?php

  require_once "authenticate.php";

  if(isset($_REQUEST['action'])) {
  
  	if($_REQUEST['action'] == 'get_panel_tests_by_loinc_code') {
  	
  		if(!isset($_REQUEST['loinc_code'])) {
          echo -2;
          return;
      } else {
      
        $result = API::get_panel_tests_by_accession_number($_REQUEST["loinc_code"]);

        echo json_encode($result);

        return;
      
      }
  	
    // Expects calls made as: /api/remote_calls?action=get_test_type_measure_by_patient&loinc_code=LOINC_CODE&accession_num=ACCESSION_NUMBER
		} else if($_REQUEST['action'] == 'get_test_type_measure_by_accession_num') {
    
      if(!isset($_REQUEST['loinc_code']) || !isset($_REQUEST['accession_num'])) {
          echo -2;
          return;
      } else {
      
        $result = API::get_test_type_measure_ranges($_REQUEST["loinc_code"], $_REQUEST["accession_num"]);

        echo json_encode($result);

        return;
      
      }
      
    // Expects calls made as: /api/remote_calls?action=get_test_type_measure&id=ACCESSION_NUMBER
    } else if ($_REQUEST['action'] == 'get_test_type_measure') {
    
      if(!isset($_REQUEST['id'])) {
          echo -2;
          return;
      } else {
      
        getTestTypeMeasure($_REQUEST["id"]);
        
        return;
      
      }
      
    // Expects calls made as: /api/remote_calls?action=get_panel_info&loinc_code=LOINC_CODE&accession_num=ACCESSION_NUMBER
    } else if ($_REQUEST['action'] == 'get_panel_info'){

	  	if(!isset($_REQUEST['loinc_code']) || !isset($_REQUEST['accession_num'])) {
          echo -2;
          return;
      } else {

		$result = API::get_panel_info($_REQUEST['loinc_code'], $_REQUEST['accession_num']);

		echo json_encode($result);

		return;
      
	}
      
	}else if($_REQUEST['action'] == 'by_accession_num'){  
    
      if(!isset($_REQUEST['id'])) {
          echo -2;
          return;
      } else {
      
       getByAccessionNum($_REQUEST["id"]);
        
        return;
      
      }
    
    } else if($_REQUEST['action'] == 'get_patient_by_sp_id') {  
    
      if(!isset($_REQUEST['id'])) {
          echo -2;
          return;
      } else {
      
        getPatientBySpId($_REQUEST["id"]);
        
        return;
      
      }
    
    } else if($_REQUEST['action'] == 'get_tests_by_specimen_id') {  
    
      if(!isset($_REQUEST['id'])) {
          echo -2;
          return;
      } else {
      
        getTestsBySpecimenId($_REQUEST["id"]);
        
        return;
      
      }
    //http://localhost/blis/htdocs/api/remote_calls.php?action=get_user_details&username=username
    }else if($_REQUEST['action'] == 'get_user_details') {  
    
      if(!isset($_REQUEST['username'])) {
          echo -2;
          return;
      } else {
            
        getUserDetails($_REQUEST["username"]);
        
        return;
      
      }
    
    }
    
  }

  function getTestTypeMeasure($id){
  
    $response = get_test_type_measure($id);
  
    echo json_encode($response);
    
  }
  
  function getByAccessionNum($q){
  
    $specimens = search_specimens_by_accession_exact($q);
    
    $result = array();
    
    for($i = 0; $i < count($specimens); $i++) {
    
      $id = $specimens[$i]->specimenId;
      
      $tests = get_tests_by_specimen_id($id);
      
      $type = get_specimen_type_by_id($specimens[$i]->specimenTypeId);
    
      for($t = 0; $t < count($tests); $t++) {
      
        $test = get_test_type_measure($tests[$t]->testTypeId);
        
        $name = get_test_name_by_id($tests[$t]->testTypeId);
        
        $loincCode = get_loinc_code_by_id($tests[$t]->testTypeId);

		$params = array(
				"test_name" => $name,
				"accession_num" => $q
		);
		
		$status = API::getStatus($params);
        
        $result["$name|".$tests[$t]->testTypeId."|".$type->name."|".$loincCode."|".$status."|".$tests[$t]->isPanel] = $test;
      
      }
      
    }
    
    echo json_encode($result);
    
  }

  function getPatientBySpId($id){
  
    $spec = get_specimens_by_accession($id);
  
    $response = get_patient_by_sp_id($spec[0]->specimenId);
    
    echo json_encode($response);
  
  }

  function getTestsBySpecimenId($id){
  
    $spec = get_specimens_by_accession($id);
  
  	echo json_encode($spec);
  
    $response = get_tests_by_specimen_id($spec[0]->specimenId);
  
    echo json_encode($response);
  
  }

  function getuserDetails($user_id){

	$details = API::get_user_details($user_id);

	echo json_encode($details);
	
  }

?>
