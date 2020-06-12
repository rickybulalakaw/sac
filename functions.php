<?php 

function barangaydrop() {
    include "db.php";

    echo "<select name='barangay'  class='form-control' required>";
    echo "<option value=''></option>";        

    $getbarangays = "SELECT id, barangay from barangay order by barangay";
    $process = $db->query($getbarangays);
    //$row = $process(fetch_assoc());

    while ($row = $process->fetch_assoc()){           
        echo "<option value = '". $row['id'] ."'>" . $row['barangay'] . "</option>";
    }
    echo "</select>";
}

function starttable(){
    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped' align='center'>";
}

function endtable(){
    echo "</table>";
    echo "</div>";
}

function columnhead($columnhead){
    echo "<th>$columnhead</th>";
}

function cellright($value) {
    echo "<td align='right'>$value</td>";
}

function columnheadspan($columnhead, $number){
    echo "<td align='center' colspan = '$number'><b>$columnhead</b></t3>";
}

function columncenter($text){
    echo "<td align='center'>$text</td>";
}

function columncenterlink($text, $dblink, $identifier, $id){
    echo "<td align='center' ><a href='$dblink/$id'>$text</a></td>";
}

function startrow(){ 
    echo "<tr>";
}

function endrow(){
    echo "</tr>";
}

function celltext($text){
    echo "<td>$text</td>";
}

function cellnumbered($text, $num){
    echo "<td>$num. $text</td>";
}

function textcenter($text){
    echo "<p align='center'>$text</p>";
}

function textcenterlink($text, $link){
    echo "<p align='center'><a href='$link'>$text</a></p>";
}

function ensuresignin(){
    if(!isset($_SESSION['sac_id'])) {
        header("Location: /sac2/signin");
    }
}

function setsessiontype(){
    if(!isset($_SESSION['sac_id'])) {
        $_SESSION['sessiontype'] = "Public";
    } else {
        $_SESSION['sessiontype'] = "Private";
    }    
}

function checkaccessrights(){
    include "db.php";

    if(isset($_SESSION['sac_id'])){
        $id = $_SESSION['sac_id'];
        $checkadmin = "SELECT rights from user where id = '$id'";
        $process = $db->query($checkadmin);
        $row = mysqli_fetch_assoc($process);
        // $row = $process->fetch_assoc();
        $rights = $row['rights'];
        $_SESSION['rights'] = $rights;

    }
    
}

function navigationbar() {
    include "db.php";
    setsessiontype();
    $sessiontype = $_SESSION['sessiontype'];

    // include main navbar 
    include "navbarmain.php";

    // then select depending on user

    if($sessiontype === "Public") {
        // use public navigation bar
        include "navbarpublic.php";
        return;

    } else {
        checkaccessrights();
        $rights = $_SESSION['rights'];

        switch ($rights) {
            case "Admin": 
                include "navbaradmin.php";
            break;

            case "MSWDO":
                include "navbarmswdo.php";
            break;

            case "MSWDOAdmin": 
                include "navbarmswdoadmin.php";
            break;

            case "Executive":
                include "navbarexec.php";
            break;

            case "ITSupport":
                include "navbaritsupport.php";
            break;

            default: 
                include "navbardefaultsignin.php";
        }


    }

    
    // 

    // echo "<ul>";
    // echo "<li><a href='/sac'>Home</a></li>";
    // if($_SESSION['rights'] === "DEFAULT" || $_SESSION['rights'] === "MSWDO"){
    //     echo "<li><a href='/sac2/addbeneficiary'>Add beneficiary</a></li>";
    // }
  
    // if($_SESSION['rights'] === "Admin"){
    //     echo "<li><a href='/sac2/manageusers'>Manage users</a></li>";
    //     echo "<li><a href='/sac2/systemrecord'>System Activities</a></li>";
    //     echo "<li><a href='/sac2/viewprogress/sacdistribution1'>View Progress Batch 1</a></li>";
    //     echo "<li><a href='/sac2/viewprogress/sacdistribution2'>View Progress Batch 2</a></li>";
    // }

    // if($_SESSION['rights'] === "Executive") {
    //     echo "<li><a href='/sac2/viewsacbybrgy'>SAC Beneficiaries</a></li>"; 
    //     echo "<li><a href='/sac2/viewnonsacbybrgy'>Non-SAC Beneficiaries</a></li>"; 
    //     echo "<li><a href='/sac2/viewprogress/sacdistribution1'>View Progress Batch 1</a></li>";
    //     echo "<li><a href='/sac2/viewprogress/sacdistribution2'>View Progress Batch 2</a></li>";
    // }

    // if($_SESSION['rights'] === "MSWDO") {
    //     echo "<li><a href='/sac2/search'>Search beneficiary</a></li>";
    //     echo "<li><a href='/sac2/viewmasterlist'>View masterlist</a></li>";
    // }
              
    // if($_SESSION['rights'] === "Admin" || $_SESSION['rights'] === "MSWDO"){
        
    //     echo "<li><a href='/sac2/viewsacbybrgy'>SAC Beneficiaries</a></li>"; 
    //     echo "<li><a href='/sac2/viewnonsacbybrgy'>Non-SAC Beneficiaries</a></li>"; 
    //     echo "<li><a href='/sac2/viewsumbysex'>Summary by Sex</a></li>"; 
    // }    
    
    // echo "<li><a href='/sac2/signout'>Sign out</a></li>";
    // echo "</ul>";
}

function titlephp(){
    echo "Bayambang Social Amelioration Card Input System";
}

function ensureallowed($id){
    include("db.php");
    
    checkaccessrights($id);
    $rights = $_SESSION['rights'];
    if($rights === "DEFAULT"){
        header("Location:/sac2/notsufficientrights");
    }

}

function ensureexecutive($id){
    include("db.php");
    
    checkaccessrights($id);
    $rights = $_SESSION['rights'];
    if($rights != "Executive"){
        header("Location:/sac2/notsufficientrights");
    }

}


function ensuremswdo() {
    include "db.php";
    checkaccessrights();
    $rights = $_SESSION['rights'];

    $allowed = array("MSWDOAdmin", "MSWDO");

    if(!in_array($rights, $allowed)) {
        echo "You are not authorized to access this page.";
        header("Location: /sac2/notsufficientrights.php");
        return;

    }

}

function viewsystemactionrecords() {
    include "db.php";
    $viewsystemactionrecords = "select * from systemrecordmaster";

    // CREATE VIEW systemrecordmaster as SELECT systemrecord.id as TransactionID, user.fullname as User, systemrecord.record as Record, systemrecord.object as ActivityObject, systemrecord.timestamp from systemrecord, user where systemrecord.user = user.id ORDER by systemrecord.timestamp desc limit 50

    $proc = $db->query($viewsystemactionrecords);
    if(mysqli_num_rows($proc) >= 1){
        starttable();
        startrow();
        columnhead("Transaction ID");
        columnhead("User");
        columnhead("Activity");
        columnhead("Action Object");        
        columnhead("Timestamp");
        endrow();

        foreach($proc as $row) {
            startrow();
            echo "<td>" . $row['TransactionID'] . "</td>";
            echo "<td>" . $row['User'] . "</td>";
            echo "<td>" . $row['Record'] . "</td>";
            echo "<td>" . $row['ActivityObject'] . "</td>";
            echo "<td>" . $row['timestamp'] . "</td>";

            endrow();
        }
    }
}



function viewbeneficiariessummary($id) {
    include("db.php");

    echo "<div class='pagetitle'><h1>Beneficiaries Summary Page</h1></div>";

    // Get table

    $getsummary = "SELECT * from sumbeneficiariesrecordedbybrgy";
    $process = $db->query($getsummary);
    if(mysqli_num_rows($process) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th> Barangay";
        echo "</th>"; 
        echo "<th> Number of Registered Beneficiaries";
        echo "</th>";
        // echo "<th> Details";
        // echo "</th>";
        echo "</tr>";

        $i = 1;
        foreach($process as $row){

            $selectbarangayname = "SELECT id, barangay from barangay where id = ".$row['barangayid'];
            $process2 = $db->query($selectbarangayname);
            $row2 = $process2->fetch_assoc();
            $barangayname = $row2['barangay'];

            echo "<tr>";
            echo "<td>$i. ". $barangayname . "</td>";    
            echo "<td align='center'>". $row['beneficiariesrecorded'] . "</td>";
            // echo "<td align='center'> View details </td>";
            echo "</tr>";
            $i++;            
        }
        echo "</table>";

    }

}

function viewsacbybrgy() {
    include "db.php";

    include "progressbargraph.php";
            

    if(isset($_SESSION['rights'])){
        $allowed = array("MSWDOAdmin", "MSWDO");

        if(in_array($_SESSION['rights'], $allowed)) {
            $mswdocolumn = "Yes";
        } else {
            $mswdocolumn = "No";
        }

    }

    // create view totalsacrecorded as select count(id) as totalsacrecorded from beneficiary where barcode > 0

    $gettotalrecorded = "SELECT totalsacrecorded from totalsacrecorded";
    $process = $db->query($gettotalrecorded);
    $row = $process->fetch_assoc();
    $totalrecorded = $row['totalsacrecorded'];

    // gettotalrecorded();

    $percentaccomplished = $totalrecorded*100 / 16000;

    $displaypercentaccomplish = round($percentaccomplished);    

    
    echo "<div class='row'>";
        echo "<div class='col-2'>";
        echo "</div>";

        echo "<div class='col-8'>";
        progressbar("Overall", $displaypercentaccomplish."%", $displaypercentaccomplish);
        echo "</div>";
        echo "<div class='col-2'>";
        echo "</div>";

    echo "</div>";

    echo "<div class='row'>";
        echo "<div class='col-4'>";
        echo "</div>";
        echo "<div class='col-4'>";
        echo "<p align='center'>Total Recorded: ".number_format($totalrecorded)."</p>";
        echo "</div>";

        echo "<div class='col-4'>";
        echo "</div>";

    echo "</div>";

    // Get table

    $getsummary = "SELECT * from progresssacbybarangay";

    // CREATE view progresssacbybarangay as SELECT barangay.id as barangayid, barangay.barangay as barangayname, barangay.sacbeneficiaries as sacbentarget, count(beneficiary.barangay) as brgysacrecorded from beneficiary, barangay where barangay.id = beneficiary.barangay and beneficiary.barcode > 0 group by barangay.id

    $process = $db->query($getsummary);
    if(mysqli_num_rows($process) > 0){
        starttable();
        startrow();
        echo "<th scope='col'>#</th>";
        echo "<th scope='col'>Barangay</th>";
        echo "<th scope='col'>No. Allocated</th>";
        // columnhead("Barangay");
        // columnhead("No. Allocated");
        columnhead("No. Recorded");
        columnhead("Percent of SAC Validated");
        if(isset($_SESSION['rights'])){
            if($mswdocolumn == "Yes"){
                columnheadspan("Action", 2);
            } 
            if($_SESSION['rights'] == "Admin"){
                columnhead("Action");
            }

        }
        
        endrow();

        $i = 1;
        while($row = $process->fetch_assoc()){

            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>".$row['barangayname'] . "</td>"; 
            columncenter($row['sacbentarget']);           
            columncenter($row['brgysacrecorded']);
            $percentcalculate = $row['brgysacrecorded'] / $row['sacbentarget'];
            $percentno = $percentcalculate*100;
            $percentvalue = round($percentno, 2);
            cellright($percentvalue);
            // echo "<td  align='right'>$percentvalue</td>";
            if(isset($_SESSION['rights'])){
                if($mswdocolumn == "Yes"){
                    
                    echo "<td align='center'><a class='btn btn-primary btn-sm' href='/sac2/getbenbrgy/".$row['barangayid']."' role='button'>View list</a></td>";
                    echo "<td align='center'><a class='btn btn-warning btn-sm' href='/sac2/editbenbrgy/".$row['barangayid']."' role='button'>Edit Barangay Details</a></td>";

                }
                if($_SESSION['rights'] == "Admin"){
                    echo "<td align='center'><a class='btn btn-primary btn-sm' href='/sac2/getbenbrgy/".$row['barangayid']."' role='button'>View list</a></td>";

                }
                
            }


            
            echo "</tr>";
            $i++;            
        }
        echo "</table>";

    }

}

function viewsumbysex() {
    include("db.php");

    echo "<div class='pagetitle'><h1>Beneficiaries Summary by Sex</h1></div>";

    $gettotalrecorded = "SELECT totalrecorded from totalrecorded";
    $process = $db->query($gettotalrecorded);
    $row = $process->fetch_assoc();
    $totalrecorded = $row['totalrecorded'];

    // Get table

    $getsummary = "SELECT * from sexsum";
    $process = $db->query($getsummary);
    if(mysqli_num_rows($process) > 0){
        
        starttable();
        columnhead("Sex");
        columnhead("Number of Registered Beneficiaries");
        columnhead("Percentage");
        endrow();
        while($row = $process->fetch_assoc()){
            startrow();

            if($row['sex'] == "") {
                $dbsex = "None recorded";
            } else {
                $dbsex = $row['sex'];
            }
            echo "<td>". $dbsex . "</td>";        
            columncenter(number_format($row['count(id)']));            
            $calculate = $row['count(id)'] * 100 / $totalrecorded;
            $calculate = round($calculate, 2);
            cellright($calculate);
            // echo "<td align='right'>$calculate</td>";
            endrow();                        
        }       
        endtable();

    }

}

function checkadminpage($id) {
    include "db.php";
    checkaccessrights($id); 
    $rights = $_SESSION['rights'];
    if($rights != "Admin"){
        //echo "This page requires an administrative account for access. ";
        header("Location:/sac2/notsufficientrights");

    }
}

function usermanagementtable() {

    include("db.php");
    // Table of Requests

    $fetchuserrequest = "SELECT id, username, fullname, status, rights, createdtimestamp from user";
    $process = $db->query($fetchuserrequest);

    if(mysqli_num_rows($process) > 0){

        echo "<p>View the accounts created below and click <b>Approve</b> to allow them to sign in.</p>";
        
        starttable();
        startrow();
        columnhead("Full Name");
        columnhead("Username");
        columnhead("Status");
        columnhead("Access Rights");
        columnhead("Creation Timestamp");
        columnheadspan("Action", 6);
        endrow();

        $i = 1;

            while($row = $process->fetch_assoc()){
                startrow();
                cellnumbered($row['fullname'], $i);
                columncenter($row['username']);
                columncenter($row['status']);
                columncenter($row['rights']);
                columncenter($row['createdtimestamp']);
                if($row['status'] === "Active") {
                    // columncenterlink("", "deactivateuser.php", "newid", $row['id']);
                    // echo "<td align='center'><a href='/sac2/deactivateuser/".$row['id']."'></a></td>";

                    if($row['rights'] == "Admin") {
                        echo "<td align='center'><a class='btn btn-danger btn-sm disabled' href='/sac2/deactivateuser/".$row['id']."' role='button'>Deactivate account</a></td>";
                    } else {
                        echo "<td align='center'><a class='btn btn-danger btn-sm' href='/sac2/deactivateuser/".$row['id']."' role='button'>Deactivate account</a></td>";
                    }
                    
                    
                } else {
                    // echo "<td align='center'><a href='/sac2/activateuser/".$row['id']."'>Activate account</a></td>";
                    echo "<td align='center'><a class='btn btn-success btn-sm' href='/sac2/activateuser/".$row['id']."' role='button'>Activate account</a></td>";
                    // columncenterlink("Activate account", "activateuser.php", "newid", $row['id']);
                }
                
                // columncenterlink("Set as Admin", "assignadmin.php", "newid", $row['id']); 
                // columncenterlink("Set as MSWDO", "makemswdo.php", "newid", $row['id']);    
                // columncenterlink("Set as Executive", "makeexecutive.php", "newid", $row['id']);    
                // columncenterlink("Remove special rights", "removespecial.php", "newid", $row['id']); 

                if($row['rights'] == "MSWDOAdmin" || $row['rights'] == "Admin") {                    

                echo "<td align='center'><a class='btn btn-primary btn-sm disabled' href='/sac2/makemswdoa/".$row['id']."' role='button' >Make MSWDO Admin</a></td>";

                } else {                    
                echo "<td align='center'><a class='btn btn-primary btn-sm' href='/sac2/makemswdoa/".$row['id']."' role='button'>Make MSWDO Admin</a></td>";
                }

                // if($row['rights'] == "Admin") {                    

                //     echo "<td align='center'><a class='btn btn-primary disabled' href='/sac2/assignadmin/".$row['id']."' role='button' >Make Admin</a></td>";
    
                //     } else {                    
                //     echo "<td align='center'><a class='btn btn-primary' href='/sac2/assignadmin/".$row['id']."' role='button'>Make Admin</a></td>";
                //     }

                if($row['rights'] == "MSWDO"  || $row['rights'] == "Admin") {                    

                echo "<td align='center'><a class='btn btn-primary btn-sm disabled' href='/sac2/makemswdo/".$row['id']."' role='button'>Make MSWDO</a></td>";
                } else {
                    echo "<td align='center'><a class='btn btn-primary btn-sm' href='/sac2/makemswdo/".$row['id']."' role='button'>Make MSWDO</a></td>";
                }

                if($row['rights'] == "ITSupport"  || $row['rights'] == "Admin") {                    

                    echo "<td align='center'><a class='btn btn-primary btn-sm disabled' href='/sac2/makeits/".$row['id']."' role='button'>Make IT Support</a></td>";
                    } else {
                        echo "<td align='center'><a class='btn btn-primary btn-sm' href='/sac2/makeits/".$row['id']."' role='button'>Make IT Support</a></td>";
                    }


                if($row['rights'] == "Executive" || $row['rights'] == "Admin"){
                    echo "<td align='center'><a class='btn btn-primary btn-sm disabled' href='/sac2/makeexecutive/".$row['id']."' role='button'>Make Executive</a></td>";
                
                } else {
                    echo "<td align='center'><a class='btn btn-primary btn-sm' href='/sac2/makeexecutive/".$row['id']."' role='button'>Make Executive</a></td>";
               
                }
                if($row['rights'] == "DEFAULT" || $row['rights'] == "Admin") {
                    echo "<td align='center'><a class='btn btn-danger btn-sm disabled' href='/sac2/removespecial/".$row['id']."' role='button'>Remove special access</a></td>";
               
                } else {
                    echo "<td align='center'><a class='btn btn-danger btn-sm' href='/sac2/removespecial/".$row['id']."' role='button'>Remove special access</a></td>";
                }
                
                

                // echo "<td align='center'><a href='/sac2/assignadmin/".$row['id']."'>Set as Admin</a></td>";
                // echo "<td align='center'><a href='/sac2/makemswdo/".$row['id']."'>Set as MSWDO</a></td>";
                // echo "<td align='center'><a href='/sac2/makeexecutive/".$row['id']."'>Set as Executive</a></td>";
                // echo "<td align='center'><a href='/sac2/removespecial/".$row['id']."'>Remove special rights</a></td>";
                  
                                endrow();
                $i++;
            }

        endtable();  

    } else {
        echo "<p align='center'>Great! There is no new user access request. Click <a href='index.php'>here</a> to go back to the home page.</p> ";
        return;
    }
}

function pagetitle($title){
    echo "<div class='pagetitle'><h1>$title</h1></div>";
}

function viewmasterlist($page) {

    include "db.php";
    $checkbeneficiary = "select * from fullmasterlist";
    $process = $db->query($checkbeneficiary);
    if(mysqli_num_rows($process) > 0){

        pagetitle("Masterlist of Social Amelioration  Program Beneficiaries");
        starttable();
        startrow();
        // columnhead("Province");
        // columnhead("Municipality");
        columnhead("#");
        columnhead("Last Name");
        columnhead("First Name");
        columnhead("Middle Name");
        columnhead("Sex");
        columnhead("Date of Birth"); 
        columnhead("Civil Status");
        columnhead("Address");
        columnhead("Barangay");
        columnhead("BarangayID");
        columnhead("BarCode");
        columnhead("Entered By");
        columnhead("Entry TimeStamp");
        endrow();

        $i = 1;      

        foreach ($process as $row) {

            startrow();
            columncenter($i);
            celltext($row['LastName']);
            celltext($row['FirstName']);
            celltext($row['MiddleName']);
            columncenter($row['Sex']);            
            columncenter($row['DOB']);
            columncenter($row['CivilStatus']);
            columncenter($row['Address']);
            columncenter($row['Barangay']);
            columncenter($row['BarangayID']);
            columncenter($row['BarCode']);
            columncenter($row['EnteredBy']);
            columncenter($row['EntryTimestamp']);
            endrow();
            $i++;

        } 

        endtable();

    }
}

function getbeneficiarybarrecord($bid, $id) {
    include("db.php");
    $getbeneficiaryrecord = "select enteredby, lastname, firstname, middlename, barangay, dob, address from beneficiary where barangay = $bid and enteredby = $id order by timestamp desc limit 1";
    $process2 = $db->query($getbeneficiaryrecord);
    if(mysqli_num_rows($process2) > 0){

        $row = $process2->fetch_assoc();
        $dblname = $row['lastname'];
        $dbfname = $row['firstname'];
        $dbmname = $row['middlename'];        
        $dob = $row['dob'];
        $brgy = $row['barangay'];
        $address = $row['address']; 
        $dbenteredby = $row['enteredby'];

        if($id != $dbenteredby) {
            echo "<p>You did not enter this record.</p>";
            echo "<p>Please click <a href='/sac2/addbeneficiary'>here</a> to enter new beneficiary record.</p>";

            return;
        }

        // Get barangay name 

        $getbarangayname = "select barangay from barangay where id = $brgy";
        $process = $db->query($getbarangayname);
        $row = $process->fetch_assoc();
        $brgyname = $row['barangay'];

        echo "<p>Beneficiary Name: $dbfname $dbmname $dblname</p>";
        echo "<p>Date of Birth: $dob</p>";
        echo "<p>Address: $address</p>";
        echo "<p>Barangay: $brgyname</p>";
        echo "<p>Please click <b><a href='/sac2/addbeneficiary'>here</a></b> to enter new beneficiary record.</p>";
        
    } else {
        echo "<p>Sorry, this page was accessed with incorrect parameters.</p>";
        echo "<p>Please click <a href='/sac2/addbeneficiary'>here</a> to enter beneficiary record.</p>";
        return;
    }
}

function getbeneficiaryupdatedbarrecord($bar, $id) {
    include "db.php";
    $getbeneficiaryrecord = "select enteredby, lastname, firstname, middlename, barangay, dob, address from beneficiary where barcode = $bar";
    $process2 = $db->query($getbeneficiaryrecord);
    if(mysqli_num_rows($process2) > 0){   

        $row = $process2->fetch_assoc();
        $lname = $row['lastname'];
        $fname = $row['firstname'];
        $mname = $row['middlename'];        
        $dob = $row['dob'];
        $brgy = $row['barangay'];
        $address = $row['address']; 

        // Get barangay name 

        $getbarangayname = "select barangay from barangay where id = $brgy";
        $process = $db->query($getbarangayname);
        $row = $process->fetch_assoc();
        $brgyname = $row['barangay'];

        echo "<p>Beneficiary Name: $fname $mname $lname</p>";
        echo "<p>Date of Birth: $dob</p>";
        echo "<p>Address: $address</p>";
        echo "<p>Barangay: $brgyname</p>";

        echo "<p>Please click <b><a href='/sac2/addbeneficiary'>here</a></b> to enter beneficiary record.</p>";
        
    } else {
        echo "<p>Sorry, there is no record with that barcode.</p>";
        echo "<p>Please click <a href='/sac2/addbeneficiary'>here</a> to enter beneficiary record.</p>";
        return;
    }
}

function getbeneficiarydetail($beneficiaryid) {
    include "db.php";
}

function ensureaccountactive() {
    include "db.php";
    $id = $_SESSION['sac_id'];
    $checkaccountstatus = "SELECT status from user where id = $id";
    $process = $db->query($checkaccountstatus);
    $row = $process->fetch_assoc();
    $status = $row['status'];
    if ($status === "Inactive"){
        header("Location:signout.php");
    }

}

function getbarangayname($bid){
    include "db.php";
    $getbarangayname = "SELECT barangay from barangay where id = $bid";
    $process = $db->query($getbarangayname);
    $row = $process->fetch_assoc();
    $barangayname = $row['barangay'];
    echo $barangayname;
}

function editbenbrgy($barangayid) {
    include "db.php";
    // echo "Barangay ID: $barangayid <br/>";

    $gettarget = "SELECT sacbeneficiaries from barangay where id = $barangayid";
    $process = mysqli_query($db, $gettarget);
    $row = mysqli_fetch_assoc($process);
    $dbtarget = $row['sacbeneficiaries'];

    echo $dbtarget;

}

function getbenbrgy($barangayid){
    include "db.php";
    echo "<h1>SAC Recipients for Barangay "; 
    getbarangayname($barangayid);
    echo " </h1>";
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "</div>";
    echo "</div>";

    $allowed = array("MSWDO", "MSWDOAdmin");

    if(in_array($_SESSION['rights'], $allowed)) {

        echo "<div class='row'>";

        echo "<div class='col-6'>";
        echo "<a class='btn btn-primary btn-lg btn-block' href='/sac2/generatepayroll/sacdistribution1/$barangayid' role='button'>Generate Payroll for Batch 1</a>";
        echo "</div>";

        echo "<div class='col-6'>";
        echo "<a class='btn btn-primary btn-lg btn-block' href='/sac2/generatepayroll/sacdistribution2/$barangayid' role='button'>Generate Payroll for Batch 2</a>";
        echo "</div>";

        echo "</div>";        
    }
    echo "<div class='row'>";
    echo "<div class='col'>";

    $getbenbrgy = "select * from beneficiarybenefitview  where BarangayID = $barangayid order by lastname, firstname";
    
    $process = mysqli_query($db, $getbenbrgy);
    
    if($process->num_rows < 1) {
        echo "This barangay currently has no recorded SAC recipients.";
        return;
    } else {
        starttable();
        startrow();
        columnhead("No.");
        columnhead("Name");
        columnhead("Address");
        columnhead("Sex");
        columnhead("Civil Status");
        columnhead("Date of Birth");
        columnhead("Bar Code");

        if(isset($_SESSION['rights'])){
            $rights = $_SESSION['rights'];

            if($rights == "MSWDO") {
                columnheadspan("Action", 4);             
            } elseif($rights=="MSWDOAdmin") {
                columnheadspan("Action",5);
            } elseif ($rights == "Admin") {
                columnheadspan("Action",4);
            }

        }
        
       
        $i = 1;

        foreach ($process as $row){
            echo "<tr>";
            echo "<td> $i </td>";
            echo "<td>". $row['LastName'] . ", " . $row['FirstName'] . " " . $row['MiddleName'];
            echo "</td>";    
            celltext($row['Address']);        
            
            celltext($row['Sex']);
            celltext($row['CivilStatus']);
            celltext($row['DateofBirth']);

            if($row['BarCode'] == 0){
                echo "<td><font color='red'><b>".$row['BarCode']."</b></font></td>";

            } else {
                celltext($row['BarCode']);
            }
           
            if(isset($_SESSION['rights'])){
               
                $editcolumndisplay = array("MSWDO", "MSWDOAdmin", "Admin");
    
                if(in_array($_SESSION['rights'], $editcolumndisplay)){
                    echo "<td align='center'><a class='btn btn-primary  btn-sm' href='/sac2/editbenrecord/".$row['BeneficiaryID']."' role='button'>Edit record</a></td>";

                    if ($row['SACBatch1Date'] != "") { // if already received sacbatch 1
                        echo "<td align='center'><a class='btn btn-primary btn-sm disabled' href='/sac2/recordsacben/".$row['BeneficiaryID']."/$barangayid/sacdistribution1' role='button'>Tag SAC Payout 1</a></td>";

                    } else {
                        echo "<td align='center'><a class='btn btn-primary  btn-sm' href='/sac2/recordsacben/".$row['BeneficiaryID']."/$barangayid/sacdistribution1' role='button'>Tag SAC Payout 1</a></td>";
                        $brgypayoutarraybatch1[] = $row['BeneficiaryID'];
                        
                    }
                    if ($row['SACBatch2Date'] != "") { // if received sacbatch 2
                        echo "<td align='center'><a class='btn btn-primary  btn-sm disabled' href='/sac2/recordsacben/".$row['BeneficiaryID']."/$barangayid/sacdistribution2' role='button'>Tag SAC Payout 2</a></td>";
                  
                    } else {
                        echo "<td align='center'><a class='btn btn-primary  btn-sm' href='/sac2/recordsacben/".$row['BeneficiaryID']."/$barangayid/sacdistribution2' role='button'>Tag SAC Payout 2</a></td>"; 
                        $brgypayoutarraybatch2[] = $row['BeneficiaryID'];
                    }        

                    if($row['SACBatch1Date'] != ""){
                        echo "<td align='center'><a class='btn btn-danger btn-sm disabled' href='/sac2/delbenrecord/".$row['BeneficiaryID']."/$barangayid' role='button'>Delete</a></td>";
                    } else {
                        echo "<td align='center'><a class='btn btn-danger btn-sm' href='/sac2/delbenrecord/".$row['BeneficiaryID']."/$barangayid' role='button'>Delete</a></td>";

                    }

                    if($_SESSION['rights'] == "MSWDOAdmin"){
                        echo "<td align='center'><a class='btn btn-danger btn-sm' href='/sac2/admindelbenrecord/$barangayid/".$row['BeneficiaryID']."' role='button'>Override Delete</a></td>";
                    }
                    
                }
    
            }
            

            echo "</tr>";
            $i++;
        }
        endtable();

        echo "</div>";
        echo "</div>";                

        $allowed2 = array("MSWDO", "MSWDOAdmin", "Admin");
        if(in_array($_SESSION['rights'], $allowed2)) {

            echo "<div class='row'>";
            echo "<div class='col'>";                 
            
            if(isset($brgypayoutarraybatch1)) {
                if(count($brgypayoutarraybatch1) >= 1){
                    // echo "<p>Payout 1: </p>";
                    echo "<form action='/sac2/recordpaybrgyprocess/$barangayid' method ='post' enctype='multipart/form-data'>";
                    echo "<input type='text' name='entitytype' value='beneficiary' hidden>";
                        echo "<input type='text' name='actiontype' value='sacdistribution1' hidden>";
                    foreach($brgypayoutarraybatch1 as $key) {
                        echo "<input type='number' name='beneficiaryid[]' value='$key' hidden>";
                        
                    }
                    echo "<p align='center'><input type='submit' class='btn btn-primary'  name='$barangayid' value='Register Payout 1 for all individuals in this list'></p>";
                    echo "</form>";
                }

            }
            echo "</div>"; // for ending column 1

            echo "<div class='col'>"; // for starting column 2

            // echo "<p>Payout 2: </p>";

            if(isset($brgypayoutarraybatch2)){

                if(count($brgypayoutarraybatch2) >= 1){

                    echo "<form action='/sac2/recordpaybrgyprocess/$barangayid' method ='post' enctype='multipart/form-data'>";
                    echo "<input type='text' name='entitytype' value='beneficiary' hidden>";
                    echo "<input type='text' name='actiontype' value='sacdistribution2' hidden>";
                    foreach($brgypayoutarraybatch2 as $key2) {
                        echo "<input type='number' name='beneficiaryid[]' value='$key2' hidden>";
                        }

                        echo "<p align='center'><input type='submit' class='btn btn-primary'  name='$barangayid' value='Register Payout 2 for all individuals in this list'></p>";
                        echo "</form>";
                }

            }
            echo "</div>"; // for ending column 2

            echo "</div>"; // for row

        
        }

        
            
    }

}



function viewnonsacbybrgy($id) {
    include "db.php";

    ensuremswdo();

    $gettotalnonsac = "SELECT totalnonsac from totalnonsac";
    $process = $db->query($gettotalnonsac);
    $row = $process->fetch_assoc();
    $totalnonsac = $row['totalnonsac'];

    echo "<p align='center'> Total No. of Non-SAC Households recorded: $totalnonsac";

    $getnonsacsum = "select barangayid, barangayname, brgynonsacrecorded from barangaynonsacsummary order by barangayname";
    $process = $db->query($getnonsacsum);
    if(mysqli_num_rows($process) <= 0) {
        echo "<p>No non-SAC household recorded.</p>";
        return;

    } else {
        starttable();
        startrow();
        
        columnhead("No.");
        columnhead("Barangay");
        columnhead("No. of Non-SAC Households Recorded");
        if($_SESSION['rights'] == "MSWDO") {
            columnhead("Action");
        }
        endrow();
        $i = 1;
        while($row = $process->fetch_assoc()) {
            startrow();
            echo "<td> $i</td> ";
            echo "<td> ".$row['barangayname']."</td>";
            columncenter($row['brgynonsacrecorded']);
            if($_SESSION['rights'] == "MSWDO") {
               
                echo "<td align='center'><a class='btn btn-primary' href='/sac2/getbenbrgynonsac/".$row['barangayid']."' role='button'>View Details</a></td>";
                
              
            }
            
            endrow();
            $i++;
        }

        endtable();

    }

}

function getbenbrgynonsac($barangayid){
    include "db.php";

    // CREATE view masterlistnonsac as CREATE VIEW masterlistnonsac as SELECT beneficiary.id as BeneficiaryID, beneficiary.lastname as LastName, beneficiary.firstname as FirstName, beneficiary.middlename as MiddleName, beneficiary.dob as DOB, beneficiary.civilstatus as CivilStatus, beneficiary.barcode as BarCode, beneficiary.address as Address, barangay.id as BarangayID, barangay.barangay as Barangay, user.fullname from beneficiary, barangay, user where beneficiary.enteredby = user.id and beneficiary.barangay = barangay.id and beneficiary.barcode = 0

    echo "<h1>Non-SAC Recipients for Barangay "; 
    getbarangayname($barangayid);
    echo " </h1>";

    $getbenbrgy = "select * from masterlistnonsac where BarangayID = $barangayid order by lastname, firstname";
    $process = $db->query($getbenbrgy);
    if(mysqli_num_rows($process) < 1) {
        echo "This barangay currently has no recorded SAC recipients.";
        return;
    } else {
        starttable();
        startrow();
        columnhead("No.");
        columnhead("Name");
        columnhead("Sex");
        columnhead("Civil Status");
        columnhead("Date of Birth");
        columnhead("Bar Code");
        
        if($_SESSION['rights'] == "MSWDO") {
            // columnhead("Action");     
            columnheadspan("Action", 2);       
        } 
        $i = 1;
        while($row = $process->fetch_assoc()) {
            echo "<tr>";
            echo "<td> $i</td>";
            echo "<td> ".$row['LastName'] . ", " . $row['FirstName'] . " " . $row['MiddleName'];
            echo "</td>";   
            columncenter($row['Sex']);
            columncenter($row['CivilStatus']);
            columncenter($row['DOB']);
            columncenter($row['BarCode']);
          
            if($_SESSION['rights'] === "MSWDO") {              
                echo "<td align='center'><a class='btn btn-primary' href='/sac2/editbenrecord/".$row['BeneficiaryID']."' role='button'>Edit</a></td>";
                echo "<td align='center'><a class='btn btn-primary' href='/sac2/delbenrecord/".$row['BeneficiaryID']."' role='button'>Delete</a></td>";
                
            
            } 
            
            echo "</tr>";
            $i++;
        }
        endtable();

    }

}

function viewprogressparagraph ($eventtag){
    include "db.php";
    

    if($eventtag == "sacdistribution2") {
        $tableview = "totalsacdistrib2";
        $batchno = 2;
        $nextpage = 1;
        $barangayfulltable = "barangaybatch2complete";
        $districtprogressview = "progressbydistrictbatch2view"; // districtprogressview
        $dailytablesource = "sacbatch2dailyview";

    } else {
        $tableview = "totalsacdistrib1";
        $batchno = 1;
        $nextpage = 2;
        $barangayfulltable = "barangaybatch1complete";
        $districtprogressview = "progressbydistrictbatch1view";
        $dailytablesource = "sacbatch1dailyview";
    }   
   
    echo "<div class='col-md-8 col-xs-12'>";
    echo "<h1>SAC Cash Assistance Distribution Batch $batchno</h1>";

    echo "</div>"; // close div 1

    echo "<div class='col-md-4 col-xs-12'>";

    echo "<a class='btn btn-primary' href='/sac2/viewprogress/sacdistribution$nextpage' role='button'>View other batch</a>";
    
    echo "</div>"; // close div 2


}

function viewprogressoverallpie($eventtag) {

    include "db.php";
    
    $universe = 16000;

    if($eventtag == "sacdistribution2") {
        $tableview = "totalsacdistrib2";
        $batchno = 2;
        $nextpage = 1;
        $barangayfulltable = "barangaybatch2complete";
        $districtprogressview = "progressbydistrictbatch2view"; // districtprogressview
        $dailytablesource = "sacbatch2dailyview";

    } else {
        $tableview = "totalsacdistrib1";
        $batchno = 1;
        $nextpage = 2;
        $barangayfulltable = "barangaybatch1complete";
        $districtprogressview = "progressbydistrictbatch1view";
        $dailytablesource = "sacbatch1dailyview";
    }
   
    $gettotaldistrib = "SELECT $tableview FROM $tableview";
    $process = mysqli_query($db, $gettotaldistrib);
    $row = mysqli_fetch_array($process);
    $totaldistrib = $row[$tableview];

    $rate = $totaldistrib*100/16000;
    
    $roundedvaluerate = round($rate,2);
    
    $cashdistrib = number_format($totaldistrib*5500);

    date_default_timezone_set("Singapore");
  
    $getfullbarangay = "SELECT $barangayfulltable from $barangayfulltable";
    $processgetfullbarangay = mysqli_query($db, $getfullbarangay);
    $rowfull = mysqli_fetch_assoc($processgetfullbarangay);
    $barangayfullno = $rowfull[$barangayfulltable];

    if($barangayfullno >= 2) {
        $barangaygrammar = "barangays";
    } else {
        $barangaygrammar = "barangay";
    }
    
    $percentagedisplay = round($rate);

    $remaining = $universe-$totaldistrib;
    $labelsarray = array("Unpaid","Paid");
    $valuesarray = array(intval($remaining), intval($totaldistrib));
    
    piechart("Overall Accomplishment", "myChart", "right", 2, $labelsarray, $valuesarray);

    echo "<p></p>";    

    echo "<p>As of today, ".date("m-d-Y").", MSWDO reports a total of <b>$totaldistrib families</b> or <b>$roundedvaluerate%</b> of the total target of 16,000 families have been paid out cash. This translates to cash amount of <b>P$cashdistrib</b></p>";
    echo "<p>In terms of barangay level distribution, the LGU has distributed to 100% of targeted families in <b>$barangayfullno</b> $barangaygrammar.</p>";

}

function viewtargetbydistrictpie($eventtag) {
    include "db.php";

    $universe = 16000;

    if($eventtag == "sacdistribution2") {
        $tableview = "totalsacdistrib2";
        $batchno = 2;
        $nextpage = 1;
        $barangayfulltable = "barangaybatch2complete";
        $districtprogressview = "progressbydistrictbatch2view"; // districtprogressview
        $dailytablesource = "sacbatch2dailyview";

    } else {
        $tableview = "totalsacdistrib1";
        $batchno = 1;
        $nextpage = 2;
        $barangayfulltable = "barangaybatch1complete";
        $districtprogressview = "progressbydistrictbatch1view";
        $dailytablesource = "sacbatch1dailyview";
    }

    $getdistricttargets = "SELECT District, Target from $districtprogressview";
    $processgettarget = mysqli_query($db, $getdistricttargets);
    foreach($processgettarget as $district){
        $labelsarray2[] = $district['District'];
        $valuesarray2[] = intval($district['Target']);
    }
    
    piechart("Target by District", "myChart2", "right", 9, $labelsarray2, $valuesarray2); 
    echo "<br/>";
    echo "<p>You may hover your mouse over each section of the pie chart to display how many are the targeted beneficiaries per district.</p>";  
}

function viewprogressbydistrictstack($eventtag) {
    include "db.php";
    $universe = 16000;

    if($eventtag == "sacdistribution2") {
        $tableview = "totalsacdistrib2";
        $batchno = 2;
        $nextpage = 1;
        $barangayfulltable = "barangaybatch2complete";
        $districtprogressview = "progressbydistrictbatch2view"; // districtprogressview
        $dailytablesource = "sacbatch2dailyview";

    } else {
        $tableview = "totalsacdistrib1";
        $batchno = 1;
        $nextpage = 2;
        $barangayfulltable = "barangaybatch1complete";
        $districtprogressview = "progressbydistrictbatch1view";
        $dailytablesource = "sacbatch1dailyview";
    }
    // get values 

    $getdistricttargetandaccomplish = "select District, Target, Paid from $districtprogressview";
    $processgetdistrictaccomp = mysqli_query($db, $getdistricttargetandaccomplish);
    foreach($processgetdistrictaccomp as $key5){
        $districtarray[] = "District ".$key5['District'];
        $paidfamilies[] = intval($key5['Paid']);
        $remaining = intval($key5['Target']-$key5['Paid']);
        $remainingfamilies[] = $remaining;
    }

    // echo json_encode($districtarray);
    // echo "<br />";
    // echo json_encode($paidfamilies);
    // echo "<br />";
    // echo json_encode($remainingfamilies);
    // echo "<br />";

    $presentationtitle3 = "Accomplishment per District";
    $chartid3 = "myChart3";
    $labelposition3 = "bottom";

    $valuescategories3 = array("Unpaid", "Paid");

    stackbar($presentationtitle3, $chartid3, $labelposition3, $valuescategories3, $districtarray, $remainingfamilies,$paidfamilies);

}

function viewdailydistributiongraph($eventtag) {
    include "db.php";
    $universe = 16000;

    if($eventtag == "sacdistribution2") {
        $tableview = "totalsacdistrib2";
        $batchno = 2;
        $nextpage = 1;
        $barangayfulltable = "barangaybatch2complete";
        $districtprogressview = "progressbydistrictbatch2view"; // districtprogressview
        $dailytablesource = "sacbatch2dailyview";
        $otherbatch = "sacdistribution1";

    } else {
        $tableview = "totalsacdistrib1";
        $batchno = 1;
        $nextpage = 2;
        $barangayfulltable = "barangaybatch1complete";
        $districtprogressview = "progressbydistrictbatch1view";
        $dailytablesource = "sacbatch1dailyview";
        $otherbatch = "sacdistribution2";
    }

    $presentationtitle = "Daily Payout Report for Batch $batchno";
	$chartname = "myChart4";
    $labelposition = "bottom";

    $getdailypaid = "SELECT Date, Paid from $dailytablesource";
    $processgetdailypaid = mysqli_query($db, $getdailypaid);
    // print_r($processgetdailypaid);
    
    if($processgetdailypaid->num_rows >= 1) {
        $temporaryvalue = 0;
        foreach($processgetdailypaid as $key4) {
            $labelsarray4[] = $key4['Date'];
            $valuesarray6[] = $key4['Paid']; // daily accomplishment 
            $temporaryvalue = $temporaryvalue+$key4['Paid'];
            $valuesarray7[] = $temporaryvalue;
        }

        echo "<a class='btn btn-primary' href='/sac2/viewdailyprogressgraph/$otherbatch' role='button'>View graph of other payout</a>";
        
        $valuecategories6 = array("Daily Accomplishment", "Cumulative");	

        $xaxisttitle = "Date";
        $yaxistitle = "Families";

        linebartime($presentationtitle, $chartname, $labelposition, $valuecategories6, $labelsarray4, $valuesarray7, $valuesarray6, $xaxisttitle, $yaxistitle);

    } else {
        echo "<p>No record of paid beneficiaries for this batch.<br />";
        echo "<a class='btn btn-primary' href='/sac2/viewdailyprogressgraph/$otherbatch' role='button'>View graph of other payout</a>";
    }
    

}


function viewdailyprogress($eventtag) {
    include "db.php";

    switch ($eventtag) {
        case "sacdistribution1":
            $tablename = "sacdailyreportvstargetbatch1view";
            $batchcolumn = "SACBatch1Date";
            $batchno = 1;
            $otherbatch = "sacdistribution2";            
        break;

        case "sacdistribution2":
            $tablename = "sacdailyreportvstargetbatch2view";
            $batchcolumn = "SACBatch2Date";
            $batchno = 2;
            $otherbatch = "sacdistribution1";
        break;

        default: 
            $tablename = "sacdailyreportvstargetbatch1view";
            $batchcolumn = "SACBatch1Date";
            $batchno = 1;
            $otherbatch = "sacdistribution2";
    }

    $getdailyprogresstable = "SELECT * from $tablename order by $batchcolumn DESC, Barangay ASC";
    $process = mysqli_query($db, $getdailyprogresstable);

    if($process->num_rows > 0) {
        echo "<div class='row'>";
        echo "<div class ='col-8'>";
        echo "<h2>Daily Report for Payout $batchno </h2>";
        echo "</div>";
        echo "<div class='col-4'>";
        // echo $eventtag;
        
        echo "<a class='btn btn-primary' href='/sac2/viewdailyprogressgraph/$eventtag' role='button'>View graph of daily payout</a>";
        echo "</div>";
        echo "</div>";
        echo "<p></p>";
        starttable();
        startrow();
        columnhead("Date");
        columnhead("Barangay");
        columnhead("No. of Target Beneficiaries");
        columnhead("Total Target Amount");        
        columnhead("Total Number of Beneficiaries Paid");
        columnhead("Total Amount Paid");
        columnhead("# of Beneficiaries Unpaid");
        columnhead("Total Amount Unpaid");
        columnhead("Percent Distributed");
        endrow();
        foreach($process as $row){
            startrow();
            columncenter($row[$batchcolumn]);
            celltext($row['Barangay']);
            columncenter($row['Target']);
            $targetamount = $row['Target']*5500;
            columncenter(number_format($targetamount));
            columncenter($row['BeneficiaryCount']);
            $amountpaid = $row['BeneficiaryCount']*5500;
            columncenter(number_format($amountpaid));
            $nobeneficiariesunpaid = $row['Target']-$row['BeneficiaryCount'];
            columncenter(number_format($nobeneficiariesunpaid));
            $remainingamount = $targetamount-$amountpaid;
            columncenter(number_format($remainingamount));
            $percent = $row['BeneficiaryCount']/$row['Target'];
            cellright(round($percent,2)*100);
            endrow();
        }
        endtable();

    } else {
        echo "<p>There is no report of distribution of benefits as of this moment.</p>";
    }


}

function generatepayroll($barangayid, $actiontype) {
    include "db.php";

    switch ($actiontype) {
        case "sacdistribution2":
            $columnname = "SACBatch2Date";
            $batchname = "Batch 2";
        break;

        default: 
        $columnname = "SACBatch1Date";
        $batchname = "Batch 1";

    } 

    $getbarangayname = "select barangay from barangay where id = $barangayid";
    $processgetbarangayname = $db->query($getbarangayname);
    $row = $processgetbarangayname->fetch_assoc();
    $barangayname = $row['barangay'];
    echo "<h1>Payroll of Barangay $barangayname for $batchname</h1>";

    // echo "<p>Barangay ID: $barangayname</p>";
    // echo "<p>Action Type: $actiontype</p>";

    $generatepaytable = "SELECT LastName, FirstName, MiddleName, Address, DateofBirth, CivilStatus, BarCode from beneficiarybenefitview where BarangayID = $barangayid and $columnname is null ";
    $processgeneratepaytable = mysqli_query($db, $generatepaytable);

    if($processgeneratepaytable->num_rows < 1){
        echo "This barangay has all registered SAC beneficiaries paid for this payout batch.";
        return;
    } else {

        starttable();
        startrow();
        columnhead("No.");
        columnhead("Last Name");
        columnhead("First Name");
        columnhead("Middle Name");
        columnhead("Address");
        columnhead("Date of Birth");
        columnhead("Civil Status");
        columnhead("Bar Code");
        endrow();
        $i = 1;

        foreach ($processgeneratepaytable as $row2) {
            startrow();
            columncenter($i);
            celltext($row2['LastName']);
            celltext($row2['FirstName']);
            celltext($row2['MiddleName']);
            // celltext($row2['Address'].", ".$barangayname);
            celltext($row2['Address']);
            celltext($row2['DateofBirth']);
            celltext($row2['CivilStatus']);            
            celltext($row2['BarCode']);
            endrow();
            $i++;
        }
        endtable();
    }

}

function genpayroll(){
    include "db.php";
    // echo "<p>success</p>";

    $getbarangays = "SELECT id, barangay from barangay order by barangay asc";
    $process = mysqli_query($db, $getbarangays);
    if($process->num_rows >= 1){
        starttable();
        startrow();
        columnhead("No.");
        columnhead("Barangay");
        columnheadspan("Generate Payroll for", 2);
        endrow();
        $i = 1;

        foreach($process as $row){
            startrow();
            celltext($i);
            celltext($row['barangay']);
            echo "<td align='center'>";
            echo "<a class='btn btn-primary btn-sm' href='/sac2/generatepayroll/sacdistribution1/".$row['id']."' role='button'>Batch 1</a>";
            echo "</td>";
            echo "<td align='center'>";
            echo "<a class='btn btn-primary btn-sm' href='/sac2/generatepayroll/sacdistribution2/".$row['id']."' role='button'>Batch 2</a>";
            echo "</td>";
            endrow();
            $i++;
        }

        endtable();
    }
}

function viewbarangays(){
    include "db.php";
    // echo "<p>success</p>";

    $getbarangays = "SELECT * from barangay order by barangay asc";
    $process = mysqli_query($db, $getbarangays);
    if($process->num_rows >= 1){
        starttable();
        startrow();
        columnhead("No.");
        columnhead("Barangay");
        columnhead("Edit");
        endrow();
        $i = 1;

        foreach($process as $row){
            startrow();
            celltext($i);
            celltext($row['barangay']);
            echo "<td align='center'>";
            echo "<a class='btn btn-primary btn-sm' href='/sac2/editbenbrgy/".$row['id']."' role='button'>Edit Details</a>";
            echo "</td>";
            endrow();
            $i++;
        }

        endtable();
    }
}


function preparetodelete($barangayid, $beneficiaryid) {
    include "db.php";
    $id = $_SESSION['sac_id'];

    $getbeneficiarydetails = "select lastname, firstname, middlename, sex, civilstatus, dob, barangay from beneficiary where id = $beneficiaryid";
    $process = mysqli_query($db, $getbeneficiarydetails);
    $row = mysqli_fetch_assoc($process);
    $lname = $row['lastname'];
    $fname = $row['firstname'];
    $mname = $row['middlename'];
    $dbsex = $row['sex'];
    $dbcivilstatus = $row['civilstatus'];
    $dbdob = $row['dob'];
    $dbbarangayid = $row['barangay'];

    // Check if there is payment given in imagerec 

    $checkpaymentgiven = "SELECT id, actiontype, date from imagerec WHERE entityid = $beneficiaryid and entitytype = 'beneficiary'";
    $processcheckpaymentgiven = mysqli_query($db, $checkpaymentgiven);
    if($processcheckpaymentgiven->num_rows >= 1) {
        // Display records 

        echo "$fname $mname $lname has record of having received the following cash assistance: ";
        starttable();
        startrow();
        columnhead("Item");
        columnhead("Benefit");
        columnhead("Date");
        columnhead("Action");
        endrow();
        $i = 1;
        foreach ($processcheckpaymentgiven as $row3) {
            startrow();
            celltext($i);
            if($row3['actiontype'] == "sacdistribution1") {
                $benefitdisplay = "SAC Payout 1";
            } else {
                $benefitdisplay = "SAC Payout 2";
            }
            celltext($benefitdisplay);
            celltext($row3['date']);
            echo "<td>";
            echo "<a class='btn btn-primary btn-sm' href='/sac2/admindelbenpayout/$barangayid/$beneficiaryid/".$row3['id']."' role='button'>Delete Payout Record</a>";
            echo "</td>";
            endrow();
            $i++;
        }   
        endtable();     
    } else {
        // clear to delete / Display the Delete the Beneficiary Link 

        echo "<td align='center'><a class='btn btn-danger btn-sm' href='/sac2/delbenrecord/$beneficiaryid/$barangayid' role='button'>Delete</a></td>";

        // $deletebeneficiary = "DELETE FROM beneficiary where id = $beneficiaryid";
        // $process = mysqli_query($db, $deletebeneficiary);

        // $registerdeleteben = "INSERT INTO systemrecord (user, object, record) VALUES ($id, $beneficiaryid, 'Delete Beneficiary ID $beneficiaryid / $lname, $fname, $mname / Sex = $dbsex / DOB = $dbdob / CivilStatus = $dbcivilstatus')";

        // $processregregisterpreparedelete = mysqli_query($db, $registerdeleteben);
        // header("Location: /sac2/getbenbrgy/$dbbarangayid");

    }


    

    $recordpreparedelete = "INSERT INTO systemrecord (`user`, `object`, `record`) VALUES ($id, $beneficiaryid, 'Prepare to delete record of beneficiary that has been previously given cash. Name: $lname, $fname, $mname / DOB: $dbdob / Sex: $dbsex / Barangay ID: $dbbarangayid details Name: $fname $mname $lname / Sex: $dbsex / Civil Status: $dbcivilstatus / Barangay ID $dbbarangayid')";
    $process2 = $db->query($recordpreparedelete);



    



    

    // header("Location:/sac2/beneficiaryupdated.php?bar=$barcode"); 
}

function viewprogress2() {
    include "db.php";
    include "progressbargraph.php";


    $universe = 16000;

    switch ($eventtag) {
        case "sacdistribution1":
            $tableview = "totalsacdistrib1";
            $batchno = 1;
            $nextpage = 2;
            $barangayfulltable = "barangaybatch1complete";
        break;

        case "sacdistribution2":
            $tableview = "totalsacdistrib2";
            $batchno = 2;
            $nextpage = 1;
            $barangayfulltable = "barangaybatch2complete";
        break;

        default: 
            $tableview = "totalsacdistrib1";
            $barangayfulltable = "barangaybatch1complete";
    }

    $gettotaldistrib = "SELECT $tableview FROM $tableview";
    $process = mysqli_query($db, $gettotaldistrib);
    $row = mysqli_fetch_array($process);
    $totaldistrib = $row[$tableview];

    $rate = $totaldistrib*100/16000;
    
    $roundedvaluerate = round($rate,2);
    
    $cashdistrib = number_format($totaldistrib*5500);

    echo "<p><b>Summary</b></p>";

    echo "<h2>SAC Cash Assistance Distribution Batch $batchno</h2>";

    date_default_timezone_set("Singapore");

    // echo date("h:i:sa");

    echo "<p>As of today, ".date("m-d-Y").", MSWDO reports a total of <b>$totaldistrib families</b> or <b>$roundedvaluerate%</b> of the total target of 16,000 families have been paid out cash. This translates to cash amount of <b>P$cashdistrib</b></p>";

    $getfullbarangay = "SELECT $barangayfulltable from $barangayfulltable";
    $processgetfullbarangay = mysqli_query($db, $getfullbarangay);
    $rowfull = mysqli_fetch_assoc($processgetfullbarangay);
    $barangayfullno = $rowfull[$barangayfulltable];

    if($barangayfullno >= 2) {
        $barangaygrammar = "barangays";
    } else {
        $barangaygrammar = "barangay";
    }



    echo "<p>In terms of barangay level distribution, the LGU has distributed to 100% of targeted families in <b>$barangayfullno</b> $barangaygrammar.</p>";

    $percentagedisplay = round($rate);

    // echo "<br/>".$percentagedisplay;

    // progressbar("Overall (Rounded)", $percentagedisplay."%", $percentagedisplay);
    echo "<canvass id='myChart' width='400' height='400'></canvass>";


    echo "<br/>";

    echo "<a class='btn btn-primary' href='/sac2/viewprogress/sacdistribution$nextpage' role='button'>View other batch</a>";

}