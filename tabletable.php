<?php 


// CREATE VIEW totalsacdistrib1 as SELECT count(id) as totalsacdistrib1 from imagerec where actiontype = "sacdistribution1"

// CREATE VIEW totalsacdistrib2 as SELECT count(id) as totalsacdistrib2 from imagerec where actiontype = "sacdistribution2"

// CREATE VIEW fullmasterlist as SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, beneficiary.sex as Sex, beneficiary.dob as DOB, beneficiary.civilstatus as CivilStatus, beneficiary.address as Address, barangay.barangay as Barangay, barangay.id as BarangayID, beneficiary.barcode as BarCode, user.fullname as EnteredBy, beneficiary.timestamp as EntryTimestamp from beneficiary, user, barangay where barangay.id = beneficiary.barangay and beneficiary.enteredby = user.id ORDER by LastName, FirstName, MiddleName

// SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, beneficiary.dob as DOB, beneficiary.civilstatus as CivilStatus, beneficiary.address as Address, barangay.barangay as Barangay, barangay.id as BarangayID, beneficiary.barcode as BarCode, user.fullname as EnteredBy, beneficiary.timestamp as EntryTimestamp from beneficiary, user, barangay where barangay.id = beneficiary.barangay and beneficiary.enteredby = user.id ORDER by beneficiary.lastname ASC, beneficiary.firstname ASC, beneficiary.middlename ASC

// SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, barangay.barangay as Barangay, barangay.id as BarangayID, barangay.district as District, imagerec.actiontype as ActionType, beneficiary.barcode as BarCode, imagerec.date as Date from beneficiary, barangay, imagerec where barangay.id = beneficiary.barangay and imagerec.entityid = beneficiary.id

// SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, beneficiary.barangay as Barangay, beneficiary.barangay as BarangayID, barangay.district as District, imagerec.actiontype as ActionType, imagerec.date as Date from beneficiary, barangay, imagerec where beneficiary.id = imagerec.entityid and beneficiary.barangay = barangay.id

// CREATE VIEW beneficiaryimage AS SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, beneficiary.barangay as Barangay, beneficiary.barangay as BarangayID, barangay.district as District, imagerec.actiontype as ActionType, imagerec.date as Date from beneficiary, barangay, imagerec where beneficiary.id = imagerec.entityid and beneficiary.barangay = barangay.id

// CREATE VIEW sacdistribution2view as SELECT entityid as EntityID, date as SACBatch1Date from imagerec where entitytype = 'beneficiary' and actiontype = 'sacdistribution1'

// CREATE VIEW sacdistribution2view as SELECT entityid as EntityID, date as SACBatch2Date from imagerec where entitytype = 'beneficiary' and actiontype = 'sacdistribution2'

// CREATE VIEW sacreportview as SELECT sacdistribution1view.entityid as EntityID, sacdistribution1view.SACBatch1Date as SACBatch1Date, sacdistribution2view.SACBatch2Date as SACBatch2Date FROM sacdistribution1view LEFT JOIN sacdistribution2view on sacdistribution1view.EntityID = sacdistribution2view.EntityID

// CREATE VIEW beneficiarybenefitview as SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, beneficiary.sex as Sex, beneficiary.civilstatus as CivilStatus, beneficiary.dob as DateofBirth, beneficiary.barcode as BarCode, beneficiary.address as Address, beneficiary.barangay as BarangayID, sacdistribution1view.SACBatch1Date as SACBatch1Date, sacdistribution2view.SACBatch2Date as SACBatch2Date FROM beneficiary LEFT JOIN sacdistribution1view on beneficiary.id = sacdistribution1view.EntityID LEFT JOIN sacdistribution2view ON beneficiary.id= sacdistribution2view.EntityID ORDER BY beneficiary.lastname, beneficiary.firstname

// SELECT SACBatch1Date, BarangayID, COUNT(BeneficiaryID) FROM beneficiarybenefitview WHERE SACBatch1Date != "" GROUP BY SACBatch1Date, BarangayID ORDER by SACBatch1Date ASC, BarangayID ASC 

// CREATE VIEW sacbatch1dailyreportview as SELECT SACBatch1Date as SACBatch1Date, BarangayID as BarangayID, COUNT(BeneficiaryID) BeneficiaryCount FROM beneficiarybenefitview WHERE SACBatch1Date != "" GROUP BY SACBatch1Date, BarangayID ORDER by SACBatch1Date ASC, BarangayID ASC

// SELECT sacbatch1dailyreportview.SACBatch1Date as SACBatch1Date, sacbatch1dailyreportview.BarangayID as BarangayID, sacbatch1dailyreportview.BeneficiaryCount as BeneficiaryCount, barangay.sacbeneficiaries as Target FROM `sacbatch1dailyreportview` LEFT JOIN barangay on sacbatch1dailyreportview.BarangayID = barangay.id

// SELECT sacbatch1dailyreportview.SACBatch1Date as SACBatch1Date, sacbatch1dailyreportview.BarangayID as BarangayID, barangay.barangay as Barangay, sacbatch1dailyreportview.BeneficiaryCount as BeneficiaryCount, barangay.sacbeneficiaries as Target FROM `sacbatch1dailyreportview` LEFT JOIN barangay on sacbatch1dailyreportview.BarangayID = barangay.id

// CREATE VIEW sacdailyreportvstargetbatch1view as SELECT sacbatch1dailyreportview.SACBatch1Date as SACBatch1Date, sacbatch1dailyreportview.BarangayID as BarangayID, barangay.barangay as Barangay, sacbatch1dailyreportview.BeneficiaryCount as BeneficiaryCount, barangay.sacbeneficiaries as Target FROM `sacbatch1dailyreportview` LEFT JOIN barangay on sacbatch1dailyreportview.BarangayID = barangay.id

// CREATE VIEW sacbatch2dailyreportview as SELECT SACBatch2Date as SACBatch2Date, BarangayID as BarangayID, COUNT(BeneficiaryID) BeneficiaryCount FROM beneficiarybenefitview WHERE SACBatch2Date != "" GROUP BY SACBatch2Date, BarangayID ORDER by SACBatch2Date ASC, BarangayID ASC

// CREATE VIEW sacdailyreportvstargetbatch2view as SELECT sacbatch2dailyreportview.SACBatch2Date as SACBatch2Date, sacbatch2dailyreportview.BarangayID as BarangayID, barangay.barangay as Barangay, sacbatch2dailyreportview.BeneficiaryCount as BeneficiaryCount, barangay.sacbeneficiaries as Target FROM `sacbatch2dailyreportview` LEFT JOIN barangay on sacbatch2dailyreportview.BarangayID = barangay.id

// CREATE VIEW barangaysacbatch1sum as SELECT BarangayID, Barangay, SUM(BeneficiaryCount) AS Distributed, Target FROM `sacdailyreportvstargetbatch1view` GROUP BY BarangayID

// CREATE VIEW barangaysacbatch2sum as SELECT BarangayID, Barangay, SUM(BeneficiaryCount) AS Distributed, Target FROM `sacdailyreportvstargetbatch2view` GROUP BY BarangayID

// CREATE VIEW barangaybatch1complete as select COUNT(BarangayID) as barangaybatch1complete from barangaysacbatch1sum where Distributed >= Target

// CREATE VIEW barangaybatch2complete as select COUNT(BarangayID) as barangaybatch2complete from barangaysacbatch2sum where Distributed >= Target

// CREATE VIEW sactargetbydistrict as SELECT SUM(sacbeneficiaries) as TargetBeneficiaries, district from barangay GROUP BY district ORDER BY district

// CREATE VIEW beneficiarybenefitwithdistrictview as SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, beneficiary.sex as Sex, beneficiary.civilstatus as CivilStatus, beneficiary.dob as DOB, barangay.id as BarangayID, barangay.barangay as BarangayName, barangay.district as District, beneficiary.barcode as BarCode, imagerec.id as BenefitPayoutID, imagerec.actiontype as PayoutType, imagerec.date as PayoutDate FROM beneficiary LEFT JOIN Barangay ON beneficiary.barangay = barangay.id LEFT JOIN imagerec on beneficiary.id = imagerec.entityid ORDER BY beneficiary.id

// CREATE VIEW districtdistributionsacbatch1 AS SELECT District, COUNT(BenefitPayoutID) as Paid FROM `beneficiarybenefitwithdistrictview` where PayoutType = "sacdistribution1" GROUP BY District ORDER BY District

// CREATE VIEW districtdistributionsacbatch2 AS SELECT District, COUNT(BenefitPayoutID) as Paid FROM `beneficiarybenefitwithdistrictview` where PayoutType = "sacdistribution2" GROUP BY District ORDER BY District

// CREATE VIEW progressbydistrictbatch1view as SELECT sactargetbydistrict.district as District, sactargetbydistrict.TargetBeneficiaries as Target, districtdistributionsacbatch1.Paid as Paid FROM sactargetbydistrict LEFT JOIN districtdistributionsacbatch1 ON sactargetbydistrict.district = districtdistributionsacbatch1.District

// CREATE VIEW progressbydistrictbatch2view as SELECT sactargetbydistrict.district as District, sactargetbydistrict.TargetBeneficiaries as Target, districtdistributionsacbatch2.Paid as Paid FROM sactargetbydistrict LEFT JOIN districtdistributionsacbatch2 ON sactargetbydistrict.district = districtdistributionsacbatch2.District

// CREATE VIEW sacbatch1dailyview AS SELECT SACBatch1Date as Date, SUM(BeneficiaryCount) as Paid FROM `sacbatch1dailyreportview` GROUP BY SACBatch1Date ASC

// CREATE VIEW sacbatch2dailyview AS SELECT SACBatch2Date as Date, SUM(BeneficiaryCount) as Paid FROM `sacbatch2dailyreportview` GROUP BY SACBatch2Date ASC

// SELECT member.id as ID, beneficiary.barcode as Barcode, member.lastname as LastName, member.firstname as FirstName, member.middlename as MiddleName, member.extension as Ext, reltohh.relation as ReltoHH, member.dob as DOB, member.sex as Sex, member.work as Work, sector.sector as Sector, healthcondition.healthcondition as HealthCondition, barangay.psgc as PSGCCode, beneficiary.homeaddress as Tirahan, beneficiary.address as Kalye, barangay.barangay as Barangay, beneficiary.barangay as BarangayID, beneficiary.typeofid as TypeofID, beneficiary.idnumber as Numero_ng_ID, beneficiary.monthlywage as BuwanangKita, beneficiary.cellphone as Cellphone, beneficiary.placeofwork as WorkPlace, beneficiary.indigenouspeople as Katutubo, beneficiary.indigenouspeopletype as KatutuboName, beneficiary.timestamp as DateRegistered, barangay.punongbarangay as PunongBarangay 

// create VIEW dswddatabase as SELECT member.id as ID, beneficiary.barcode as Barcode, member.lastname as LastName, member.firstname as FirstName, member.middlename as MiddleName, member.extension as Ext, 

//     member.reltohh as ReltoHHCode, reltohh.relation as ReltoHH, member.dob as DOB, member.sex as Sex, member.work as Work, beneficiary.sectorid as SectorID, sector.sector as Sector, beneficiary.healthconditionid as HealthConditionID, healthcondition.healthcondition as HealthCondition, beneficiary.homeaddress as Tirahan, beneficiary.address as Kalye, barangay.barangay as Barangay, beneficiary.barangay as BarangayID, barangay.psgc as PSGCCode,  
    
//     beneficiary.typeofid as TypeofID, typeofid.typeofid as TypeofIDLabel, beneficiary.idnumber as Numero_ng_ID, beneficiary.monthlywage as BuwanangKita, beneficiary.cellphone as Cellphone, beneficiary.placeofwork as WorkPlace, beneficiary.indigenouspeople as Katutubo, beneficiary.indigenouspeopletype as KatutuboName, beneficiary.timestamp as DateRegistered, barangay.punongbarangay as PunongBarangay 
    
//     from member LEFT JOIN beneficiary ON member.memberprimary = beneficiary.id 
//     LEFT JOIN barangay ON beneficiary.barangay = barangay.id 
//     LEFT JOIN reltohh on member.reltohh = reltohh.id 
//     LEFT JOIN healthcondition on member.healthconditionid = healthcondition.id
//     LEFT JOIN sector ON member.sectorid = sector.id
//     LEFT join typeofid ON beneficiary.typeofid = typeofid.id



?>