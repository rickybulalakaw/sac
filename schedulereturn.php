<?php 

include "db.php";
include "functions.php";

// header("Location:/sac2");

include "header.php";
navigationbar();


?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
        <h1>Balik Probinsya Notification Form</h1>
        <p>As we will need to get some personally identifiable information (PIIE) in our queuing system, we would like to inform you how we will handle your PIIs. Please take a few minutes to read the privacy notice below. If you agree, you may fill out the form. The text of the privacy notice will be saved in the database as your informed consent to how we will handle your PII. </p>  
        <p>This page will get your PIIs for entering into the database. Afterwards, you will be taken to a second page for setting your proposed schedule of return.</p>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12">
        <h2>Privacy Notice</h2>
        <p>I understand that the Local Government Unit of the Municipality of Bayambang, Pangasinan (LGU-Bayambang) is implementing the Bayambang Balik Probinsiya Queuing System (henceforth, “the System) to manage the influx of returning Bayambanguenos after the Enhanced Community Quarantine relative to the Coronavirus-19 Disease (COVID).</p>
        <p>I understand that in order to adequately identify me as a returnee and adequately manage my return in light of the 14-day quarantine requirement in a designated facility, I need to provide to LGU-Bayambang the following personally identifiable information (PII) for the specified purpose/s: </p>
        <ul>
            <li>Names, date of birth of returnees – To personally identify the person within the System;</li>
            <li>Address of returnee/s – To confirm residence with barangay and designation of closest quarantine facility;</li>
            <li>Sex of returnee/s – For physical segregation / accommodation in the quarantine facility;</li>
            <li>Civil Status - For validation of family relationship/s;</li>
            <li>Contact information, including email address and mobile number – For sending communications; and</li>
            <li>Address where the person is coming from – For validation of COVID-19 clearance from source location. </li>
        </ul>
        <p>I understand that the System collectively refers to the web-based information system, the process, as well as the persons or LGU-Bayambang offices who would have role-based access to the information system.</p>
        <p>I understand that I have the right to edit my/our PIIs stored in the system. I understand, however, that when the stored PII is edited, it may affect management of service/s provided to me as preparations will be based on the data provided in the System.</p>
        <p>I understand that the requested PIIs shall only be used for identification of the person/s of my party that will be returning to Bayambang for queuing in the quarantine facility of my district. In the course thereof, I further understand that the said information may be processed (summarized, presented into graphs or tables, and/or deanonymized) for the Balik Probinsiya process of LGU-Bayambang.</p>
        <p>I understand that the requested PIIs shall only be shared to persons within the LGU-Bayambang who have a “need-to-know” of said information. I further understand that the LGU-Bayambang shall not share my information in whatever form to entities without my express written (paper or electronic) approval. Further, I understand that withholding permission to share the requested PII may affect management of delivery of services me/us, which shall also be communicated when the LGU-Bayambang requests the sharing of PII. </p>
        <p>I understand that my personal information shall be stored within the System only within the duration of the Enhanced or General Community Quarantine or other forms of Government-mandated Quarantine relative to the COVID-19. In case there is a need for further storage of my personal information, I shall be informed via mobile phone or email, which are included in my contact information in this database.</p>
        <p>I accept that my primary means of being communicated is through my mobile phone, and that a record of transmission of any message to said communication channel shall be deemed accepted and agreed to unless otherwise expressed via the mobile phone or in writing within 24 hours of the communication being transmitted.</p>
        <p>I understand that in support to the mobile phone, the LGU-Bayambang shall utilize the official Facebook Page of the LGU, “Balon Bayambang” when announcing that System-related messages have been sent to constituents who have signed up in the System.</p>
        <p>I understand that I shall be notified when my personal information shall be deleted. </p>
        <p>I understand that I have the right to have my PII deleted from the system. However, I also understand that doing so may affect the efficiency of the system or the ability of the LGU-Bayambang to effectively provide me necessary services relative to the quarantine period requirement for Balik Probinsya constituents.</p>
        <p>I understand that these terms only apply to my/our PIIs I have voluntarily entered in this System. </p>
        <p>I understand my return to Bayambang has other requirements as mandated by national, provincial and municipal laws, ordinances, and other issuances, all of which are not necessarily covered by this System. </p>
        <p>I accept that upon registering with my PIIs in this form, all of the text of this privacy notice shall be saved in the database to indicate my agreement with this requirement and my satisfaction with the informed consent.</p>
        </div>

        <div class="col-md-6 col-xs-12">
            <form action="/sac2/balikprobinsyaregprocess.php" method ="post" enctype="multipart/form-data">
                <h2>Returnee Information</h2>
                <div class="form-group">

                    <p>Last Name <br/>
                    <input placeholder="Last Name" class="form-control" name="lastname" type="text" required></p>
                    <p>First Name <br/>
                    <input placeholder="First Name" class="form-control" name="firstname" type="text" required></p>
                    <p>Middle Name <br/>
                    <input placeholder="Middle Name" class="form-control"  name="middlename" type="text" required></p>

                    <label>Email address</label>                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                    <label>Mobile Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="09XX-XXX-XXXX" required>
                    
                    <p>Sex <br />
                    <select name="sex" class="form-control" required>
                        <option value="">Choose One</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select></p>    

                    <p>Civil Status <br />
                    <select name="civilstatus" class="form-control" required></p>
                    <p><option value="">Choose One</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Common Law Partner">Common Law Partner</option>
                        <option value="Separated">Separated</option>
                        <option value="Widow">Widow</option>
                        </select></p>

                    <p>Date of Birth<br />
                    <input type="date" name = "dob" required></p>

                    <p>Barangay<br/>                    
                    <?php                     
                        barangaydrop();
                    ?>
                    
                    <label>Address in Bayambang</label>
                    <input name="address" class="form-control"  placeholder = "Address" type = "text" required>
                    <p>Place of Origin</p>
                    <select name="placeoforigin" class="form-control"id="">
                        <option value=""></option>
                        <option value="Philippines">Within the Philippines</option>
                        <option value="Foreign">Outside of the Philippines</option>
                    </select>
                    <br>
                    <label>Address outside Bayambang </label>
                    <input name="addresssource" class="form-control"  placeholder = "Address" type = "text" required>
                    
                    <input type="text" name="privacyconsent" value="" hidden>
                    <!-- </div> -->
                    <br>
                    <br>
                    <input type="checkbox" name="privacy" value="agree" required>
                    <br>
                    <p> </p>
                    
                    <p><b>Please check the details before clicking "Register" below</b></p>
                    
                    <p><input name="register" class='btn btn-primary' type="submit" value="Submit"></p>

                </div>
            </form>        
        </div>    
    </div>
</div>

</body>
</html>

