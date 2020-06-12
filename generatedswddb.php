<?php

session_start();
include "db.php";
include "functions.php";

if(!isset($_SESSION['sac_id'])){
    header("Location: /sac2");
}

include "header.php";
navigationbar();

$userid = $_SESSION['sac_id'];

$recordview = "INSERT INTO systemrecord (user, object, record) VALUES ($userid, $userid, 'View DSWD Database')";
$record = mysqli_query($db, $recordview);


?>

<?php 

if(!isset($_GET['limit'])){
    $results_per_page = 100;
} else {
    $results_per_page = $_GET['limit'];    
}

?>
<h1 class="text-center">Database of Beneficiaries for DSWD</h1>
<p class="text-center">This matrix is arranged by barcode and limited to <b><font color="red"><?= $results_per_page ?></font></b> members per page. To change the number of items in this page, you may change the second number in the URL.</p>

    <?php 

        checkaccessrights();
        $rights = $_SESSION['rights'];

        $allowed = array("MSWDO", "MSWDOAdmin", "Admin");
        if(!in_array($rights, $allowed)){
            echo "You are not allowed to access this page.";
            return;
        }

        

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page-1)*$results_per_page;



    $getmembers = "select * from dswddatabase order by Barcode asc, ReltoHHCode asc limit $start_from, $results_per_page";
    $process = mysqli_query($db, $getmembers);

    if(mysqli_num_rows($process) < 1){
        echo "<p>No member has been added in the database yet.</p>";
        echo "<p>If you suspect this is an error, please make sure the first number after <b>generatedswddb</b> in the URL is 1, and consider lowering the second number, which sets the number of resuls in each page.</p>";
        return;
    } else {
        starttable();
        startrow();
        
        columnhead("Row Indicator");
        // columnhead("COVID Municipality Series");
        columnhead("Barcode");
        columnhead("Last Name");
        columnhead("First Name");
        columnhead("Middle Name");
        columnhead("Ext");
        columnhead("Rel HH");
        columnhead("Kapanganakan");
        columnhead("Kasarian");
        columnhead("Trabaho");
        columnhead("Sektor");
        columnhead("Kondisyon ng Kalusugan");
        columnhead("PSGC Barangay Code");
        columnhead("Tirahan");
        columnhead("Kalye");
        columnhead("Uri ng ID");
        columnhead("Numero ng ID");
        columnhead("Buwanang Kita");
        columnhead("Cellphone Number");
        columnhead("Pinagtatrabahuhang Lugar");
        columnhead("BENE_UCT");
        columnhead("BENE_4Ps");
        columnhead("Katutubo");
        columnhead("Katutubo Name");
        columnhead("Bene_others");
        columnhead("Others_Name");
        columnhead("Petsa ng Pagrehistro");
        columnhead("Pangalan ng Punong Barangay");
        columnhead("Pangalan ng LSWDO");

        endrow();

        foreach($process as $row){
            startrow();
            if($row['ReltoHHCode'] == "1"){
                $rowindicator = "H";
            } else {
                $rowindicator = "M";
            }
            columncenter($rowindicator);
            // columncenter("Something");
            $municpalityseries = "PH-COVID-19-015511000-";
            cellright($row['Barcode']);
            celltext($row['LastName']);
            celltext($row['FirstName']);
            celltext($row['MiddleName']);

            if($row['Ext'] == ""){
                celltext("-");
            } else {
                celltext($row['Ext']);
            }


            
            celltext($row['ReltoHH']);
            celltext(date('m/d/Y',strtotime($row['DOB']))); // 
            celltext($row['Sex']);

            // Work column

            if($rowindicator == "M"){
                celltext("-");
            } else {
                if($row['Work'] == ""){
                    celltext("-");
                } else {
                    celltext($row['Work']);
                }

            }
            
            
            celltext($row['Sector']);
            celltext($row['HealthCondition']);
          
            if($row['ReltoHHCode'] != 1){

                celltext("");
                celltext("-");
                celltext("-");
                celltext("-");
                celltext("-");
                celltext("-");
                celltext("-");
                celltext("-");
            } else {
                celltext($row['PSGCCode']);
                if($row['Tirahan'] == ""){
                    celltext("-");
                } else {
                    celltext($row['Tirahan']);
                }
                
                celltext($row['Kalye']);
                celltext($row['TypeofIDLabel']);
                celltext($row['Numero_ng_ID']);
                celltext($row['BuwanangKita']);
                celltext($row['Cellphone']);
                celltext($row['WorkPlace']);
            }
            
            
            

            if($row['ReltoHHCode'] != 1){
                celltext("-");
                celltext("-");
                celltext("-");
                celltext("-");
                celltext("-");
            } else {
                celltext("N");
                celltext("N");
                celltext($row['Katutubo']);
                celltext($row['KatutuboName']);
                celltext("N");
            }
            
            celltext("-");
            // celltext($row['DateRegistered']);
            // echo "<td>";
            $datereg = substr($row['DateRegistered'], 0, 10); // celltext(date('m/d/Y',strtotime($row['DOB']))); //
            celltext(date('m/d/Y',strtotime($datereg)));
            // echo "</td>";

            celltext($row['PunongBarangay']);
            celltext("Kimberly Basco");
            endrow();

        }
        endtable();
    }

    $sql = "select count(id) as total from dswddatabase";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row['total'] / $results_per_page);
    //$total_pages = ceil($total_records / $results_per_page);
    
    for ($i=1; $i<=$total_pages; $i++) 
    {  // print links for all pages
            echo "<a class='btn btn-primary' href='/sac2/generatedswddb/".$i."/$results_per_page'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> ";
    };

    
$recordview = "INSERT INTO systemrecord (user, object, record) VALUES ($userid, $userid, 'View DSWD Database page $page')";
$record = mysqli_query($db, $recordview);



    ?>


    </div>
</body>
</html>