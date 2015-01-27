#!/bin/bash

./generatePhpType.pl CE identifier,text,nameOfCodingSystem,alternateIdentifier,alternateTest,nameOfAlternateCodingSystem > CE.php
./generatePhpType.pl CQ quantity,units > CQ.php
./generatePhpType.pl CWE identifier,text,nameOfCodingSystem,alternateIdentifier,alternateText,nameOfAlternateCodingSystem,codingSystemVersionId,alternateCodingSystemVersionId,originalText >CWE.php
./generatePhpType.pl CX idNumber,checkDigit,checkDigitScheme,assigningAuthority,identifierTypeCode,assigningFacility,effectiveDate > CX.php
./generatePhpType.pl ED sourceApplication,typeOfData,dataSubtype,encoding,data >ED.php
./generatePhpType.pl EI	entityIdentifier,namespaceID,universalId,universalIdType > EI.php
./generatePhpType.pl EIP placerAssignedIdentifier,fillerAssignedIdentifier > EIP.php
./generatePhpType.pl FN	surname,ownSurnamePrefix,ownSurname,surnamePrefixFromPartnerSpouse,surnameFromPartnerSpouse > FN.php
./generatePhpType.pl HD	namespaceId,universalId,universalIdType  > HD.php
./generatePhpType.pl MSG messageCode,triggerEvent,messageStructure   > MSG.php
./generatePhpType.pl PL	pointOfCare,room,bed,facility,locationStatus,personLocationType,building,floor,locationDescription,comprehensiveLocationIdentifier,assigningAuthorityForLocation > PL.php
./generatePhpType.pl PRL parentObservationIdentifier,parentObservationSubIdentifier,parentObservationValueDescriptor  > PRL.php
./generatePhpType.pl PT	processingId,processingMode  > PT.php
./generatePhpType.pl RP	pointer,applicationId,namespaceId,universalId,universalIdType,typeOfData,subtype > RP.php
./generatePhpType.pl SAD streetOrMailingAddress,streetName,dwellingNumber    > SAD.php
./generatePhpType.pl SN	comparator,num1,separatorSuffix,num2   >SN.php
./generatePhpType.pl VID versionId,internationalizationCode,internationalVersionId  > VID.php
./generatePhpType.pl XAD streetAddress,otherDesignation,city,stateOrProvince,zipOrPostalCode,country,addressType,otherGeographicDesignation,countyParishCode,censusTract,addressRepresentationCode   > XAD.php
./generatePhpType.pl XCN idNumber,familyName,lastNamePrefix,givenName,middleInitialName,suffix,prefix,degree,sourceTable,assigning authority,nameTypeCode,identifierCheckDigit,codeIdentifying,checkDigitSchemeEmployed,identifierTypeCode,assigningFacility,nameRepresentationCode > XCN.php
./generatePhpType.pl XON organizationName,organizationNameTypeCode,checkDigit,checkDigitScheme,assigningAuthority,identifierTypeCode,assigningFacility,nameRepresentationCode,organizationIdentifier > XON.php
./generatePhpType.pl XPN familyName,givenName,middleInitialOrName,Suffix,Prefix,degree,nameTypeCode,nameRepresentationCode,nameContext > XPN.php
./generatePhpType.pl XON namespaceId,universalId,universalIdType > XON.php

echo "<?php" > Types.php
for i in `ls *.php | grep -v Types`;
do
echo "include_once(\"Net/HL7/Types/$i\");" >> Types.php
done;
echo "?>" >> Types.php


