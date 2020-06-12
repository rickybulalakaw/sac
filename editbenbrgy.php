<?php

session_start();
include "db.php";
include "functions.php";
ensuresignin();

$id = $_SESSION['sac_id'];
ensureaccountactive($id);

if(!isset($_GET['bid'])) {
    echo "You are accessing this page with insufficient parameters.";
    return; 

}

ensuremswdo();
$bid = $_GET['bid'];

include "header.php";



navigationbar();

?>

     
            <form action="/sac2/editbenbrgyprocess.php" method ="post" enctype="multipart/form-data">
            <?php

                $getbarangaydetails = "select * from barangay where id = $bid";
                $process = $db->query($getbarangaydetails);

                $key = $process->fetch_assoc();

                $barangay = $key['barangay'];
                $sacbeneficiaries = $key['sacbeneficiaries'];
                $district = $key['district'];
                $psgc = $key['psgc'];
                $punongbarangay = $key['punongbarangay'];

            ?>
            <div class="row">
            

            <div class="col-md-4 col-xs-12"></div>
            <div class="col-md-4 col-xs-12">
                <h1 class="text-center">Details of Barangay</h1>
                <hr>
                <p>Update the details of the barangay below:</p>
                <hr>
                <input type="number" name="id" value="<?=$bid?>" hidden >
                <label>Barangay:</label>
                <input type="text" name="barangay" value="<?= $barangay?>" class="form-control" required><br>
                <label>District:</label>
                    <select name="district" class="form-control" required>
                        <option value="<?= $district?>"><?= $district?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <br>

                <label>PSGC Code:</label>
                <input type="text" value="<?= $psgc?>" class="form-control" name="psgc"><br />

                <label>Punong Barangay:</label> 
                <input type="text" value="<?= $punongbarangay?>" class="form-control" name="punongbarangay" ><br>

                <label>Target SAC Beneficiaries:</label>  
                <input type="number" value="<?= $sacbeneficiaries?>" name="sacbeneficiaries" class="form-control" required>
                <hr>
                <input type="submit" name="update" value="Update" class="btn btn-primary btn-block">
            </div>
            <br /><br/>
            
            
            </form>

            </div>
         
        </div>  

    </body>
</html>