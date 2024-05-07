<?php
session_start(); // Start or resume a session to persist data across multiple pages

include_once ("../backend/config.php"); // Include the configuration file which contains important settings

// Check if the form has been submitted (Select_btn is set in the form)
if (isset($_POST["Select_btn"])) {
    // Store form data in session variables for later us
    $_SESSION['drName'] = $_POST["drName"];
    $_SESSION['date'] = $_POST["date"];
    $_SESSION['time'] = $_POST["time"];
    $_SESSION['Specialized_field'] = $_POST["Specialized_field"];

    header("Location: consult.php"); // Redirect to the confirmation page after setting session variables
    exit(); // Ensure that no other output is sent before redirecting
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consultation Information</title>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- External CSS files -->
    <link rel="stylesheet" href="../../css/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/Consultation.css">
    <link rel="stylesheet" href="../../css/header_footer.css">
</head>
<body>
    <?php include_once ("header.php"); ?>   <!-- Include header -->

    <h1>Consultation Information</h1> <!-- Page title -->

    <div class="slideshowContainer">  <!-- Slideshow container -->
        <img class="imageSlides" src="../../image/slideshow1.jpeg">
        <img class="imageSlides" src="../../image/slideshow2.jpeg">
        <img class="imageSlides" src="../../image/slideshow3.jpeg">
        <img class="imageSlides" src="../../image/slideshow4.jpeg">
        <img class="imageSlides" src="../../image/img4.jpg">

        <!-- Slideshow navigation arrows -->
        <span id="leftArrow" class="slideshowArrow">&#8249;</span>
        <span id="rightArrow" class="slideshowArrow">&#8250;</span>

        <div class="slideshowCircles"> <!-- Slideshow circles for navigation -->
            <span class="circle dot"></span>
            <span class="circle"></span>
            <span class="circle"></span>
            <span class="circle"></span>
            <span class="circle"></span>
        </div>

    </div>
    <br>
    <!-- Introduction section -->
    <p class="Intro">Welcome to our Hospital Consulting services, where expertise meets innovation to transform
        healthcare facilities. Our seasoned consultants specialize in navigating the complex landscape of hospital
        management, offering tailored solutions to enhance operational efficiency, optimize patient care, and ensure
        regulatory compliance. Whether it's streamlining workflows, implementing cutting-edge technology, or
        strategizing for long-term sustainability, we're dedicated to empowering healthcare institutions to thrive in
        today's dynamic healthcare environment. Let us partner with you to elevate your hospital's performance and

    <div class="Speciality">  <!-- Speciality selection dropdown -->
        <label for="Services" class="speciality_name">SPECIALITY :</label>
        <select id="speciality" name="Specialized_field">  <!-- Options for specialities -->
            <option name="select">Select</option>
            <option value="Allergy">Allergy and Immunology</option>
            <option value="Anesthesiology">Anesthesiology</option>
            <option value="Dermatology">Dermatology</option>
            <option value="Radiology">Radiology</option>
            <option value="Cardiology">Cardiology</option>
            <option value="Obstetrics">Obstetrics and gynaecology</option>
            <option value="Oncology">Oncology</option>
            <option value="Psychiatry">Psychiatry</option>
            <option value="Neurology">Neurology</option>
            <option value="Pediatrics">Pediatrics</option>
            <option value="Surgery">Surgery</option>
            <option value="Hematology">Hematology</option>
            <option value="Immunology">Immunology</option>
            <option value="Ophthalmology">Ophthalmology</option>
            <option value="Gastroenterology">Gastroenterology</option>
            <option value="Urology">Urology</option>
        </select>
    </div>

    <br>
    <br>
     <!-- Doctor information section -->
    <div class="scroll-bar">
        <div class="input-box">
            <div class="Allergy">
                <form action="consult.php" method="POST" id="doctorForm">  <!-- Form for selecting a doctor -->
                    <img class="Dr" src="../../image/Dr.Suranjith .png" alt="Dr" width="70px" height="70px">
                     <!-- Doctor information -->
                    <p class="drName" value="Suranjith" name="drName"><b>PROF . SURANJITH SENEWIRATHNE</b></p>
                    <p>Professor and Consultant in Clinical Immunology and Allergy, Royal Free Hospital and University
                        College London.
                        <br>
                        <br>
                        <b>Qualifications:</b>DPhil(Oxon), MBBS, MD, DPath, MRCPath, MRCP, FRCP, FRCPath, FSLCGP, FCCP
                        Professor
                        <br>
                        <b>Areas of Treatment :</b>Virus , Infectious Disease Epidemiology , Tropical Diseases ,
                        Infection
                        <br>
                        <b>Languages:</b>Sinhala and English
                    <p>0115777848</p>
                    <b>Available Dates:</b>Monday & Tuesday
                    <br>
                    <br>
                    <div class="Available"> <!-- Input fields for selecting date and time -->
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date" name="date" required>
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time" name="time" required>
                            <option name="select">Select</option>
                            <option value="7.00pm">7.00pm - 7.15pm</option>
                            <option value="7.30pm">7.30pm - 7.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('PROF . SURANJITH SENEWIRATHNE', 'Allergy')"
                        value="Select" class="dr_select">  <!-- Submit button to select the doctor -->


                </form>
            </div>
        </div>

        <div class="input-box">
            <div class="Allergy">
                <form action="consult.php" method="POST" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.anura.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>PROF . ANURA AMARASIGHE</b></p>
                    <p>Consultant Physician and specialist in Allergy and Immunology
                        <br>
                        <br>
                        <b>Qualifications: </b>MBBS, MD, DCH, DTM&H, MRCP, FRCP, PhD, Fellow of the Ceylon College of
                        Physicians
                        <br>
                        <b>Areas of Treatment: </b>Allergy cases such as skin allergies or drug allergies , General
                        Medicine ,Asthma
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>0342222888
                    </p>
                    <b>Available Dates:</b>Wednesday & Saturday
                    <br>
                    <br>
                    <div class="Available">
                        <b><label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Saturday">Saturday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="7.00pm">3.00pm - 3.15pm</option>
                            <option value="7.30pm">5.30pm - 5.45pm</option>
                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('PROF . ANURA AMARASIGHE', 'Allergy')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Allergy">
                <form action="consult.php" method="POST" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Neelika.png.jpeg" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>PROF (MRS.) G. NEELIKA MALAVIGE</b></p>
                    <p>Professor and Immunologist, Faculty of Medical Sciences,University of Sri Jayawardenapura
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS, MRCP, DPhil, FRCP(Lond.),FRCPath
                        <br>
                        <b>Areas of Treatment:</b>Allergy cases such as skin allergies or drug allergies ,General
                        Medicine ,Asthma ,Runny Nose
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>0342222888
                        <b>Available Dates:</b>Friday & Sunday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Friday">Friday</option>
                            <option value="Sunday">Sunday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="7.00pm">6.30pm - 6.45pm</option>
                            <option value="7.30pm">8.30pm - 8.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('PROF (MRS.) G. NEELIKA MALAVIGE', 'Allergy')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Anesthesiology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr. Saman.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>DR. SAMAN NANAYAKKARA</b></p>
                    <p>Senior Lecturer in Anaesthesiology, Consultant Anaesthetist
                        <br>
                        <br>
                        <b>Qualifications:</b>MD in Anaesthesiology, MBBS, Member of Acupuncture Foundation of Sri
                        Lanka, Postgraduate Diploma in Sociology
                        <br>
                        <b>Interests:</b> Pain Medicine, Labour analgesia
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 077 160 1212
                        <b>Available Dates:</b>Wednesday & Thursday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="7.00pm">4.00pm - 4.15pm</option>
                            <option value="7.30pm">5.30pm - 5.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. SAMAN NANAYAKKARA', 'Anesthesiology')"
                        value="Select" class="dr_select">


                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Anesthesiology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Rochana.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>DR. ROCHANA PERERA</b></p>
                    <p>Consultant Anaesthetist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS (Peradeniya), MD Anaesthesiology (Colombo), FRCA (UK), Accreditation
                        in Focused Intensive care ECHO by Intensive Care society - UK
                        <br>
                        <b>Interests:</b> Anaesthesia and Intensive care in Organ transplantation, Anaesthesia and
                        intensive care for Hepatobiliary and Pancreatic Surgeries, Pain
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>077 268 9724
                        <b>Available Dates:</b>Monday & Tuesday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="7.00pm">7.00pm - 7.15pm</option>
                            <option value="7.30pm">8.30pm - 8.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. ROCHANA PERERA', 'Anesthesiology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Dermatology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr. punya.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>DR(MRS) PUNYA ABEYGUNAWARDANA</b></p>
                    <p>Dermatologist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS, FD (USA), FOMT (USA), FAAD
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 0114 367 636
                        <b>Available Dates:</b>Monday & Tuesday &
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Friday">Friday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="3.00pm">3.00pm - 3.15pm</option>
                            <option value="4.30pm">4.30pm - 4.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button"
                        onclick="redirectToConsultation('DR(MRS) PUNYA ABEYGUNAWARDANA', 'Dermatology')" value="Select"
                        class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Dermatology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Pathirana.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>DR. K. P. N. PATHIRANA</b></p>
                    <p>Dermatologist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS, (SL), MD Dermatology, MISD
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 033 2 233501
                        <b>Available Dates:</b>Thursday & Friday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="7.00pm">7.00pm - 7.15pm</option>
                            <option value="8.30pm">8.30pm - 8.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. K. P. N. PATHIRANA', 'Dermatology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Radiology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Udaya.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>DR. UDAYA BANDARA</b></p>
                    <p>Consultant Radiologist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS (SL) MD in Radiology (SL) Consultant Radiologist (Act)
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 077 931 0300
                        <b>Available Dates:</b>Monday & Saturday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Saturday">Saturday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="6.00pm">6.00pm - 6.15pm</option>
                            <option value="7.30pm">7.30pm - 7.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. UDAYA BANDARA', 'Radiology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>

        <div class="input-box">
            <div class="Radiology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Manusha.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>DR.MANUSHA SILVA</b></p>
                    <p>Consultant Radiologist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS (SL) MD in Radiology (SL) Consultant Radiologist (Act)
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 077 931 0300
                        <b>Available Dates:</b>Sunday & Tuesday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Sunday">Sunday</option>
                            <option value="Tuesday">Tuesday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="6.00pm">6.00pm - 6.15pm</option>
                            <option value="8.30pm">8.30pm - 8.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR.MANUSHA SILVA', 'Radiology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Cardiology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Sampath.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>DR SAMPATH ATHUKORALA</b></p>
                    <p>Cardiologist
                        <br>
                        <br>
                        <b>Qualifications:</b>over 30 years of experience in the field and completed a fellowship in
                        interventional cardiology in Singapore
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 011 5 577111
                        <b>Available Dates:</b>Monday & Tuesday & Sunday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Sunday">Sunday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="2.00pm">2.00pm - 2.15pm</option>
                            <option value="3.30pm">3.30pm - 3.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR SAMPATH ATHUKORALA', 'Cardiology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Cardiology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr. Godwin.png" alt="Dr" width="70px" height="70px">
                    <p class="drName"><b>DR GODVIN CONSTANTINE</b></p>
                    <p>Cardiologist
                        <br>
                        <br>
                        <b>Qualifications:</b>Consultant cardiologist at the National Hospital of Sri Lanka and has over
                        20 years of experience
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 011 5 577111
                        <b>Available Dates:</b>Friday & Saturday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="5.30pm">5.30pm - 5.45pm</option>
                            <option value="6.30pm">6.30pm - 6.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR GODVIN CONSTANTINE', 'Cardiology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Obstetrics">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Dharshana.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR DARSHANA ABEYGUNAWARDANA</b></p>
                    <p>Gynaecologist
                        <br>
                        <br>
                        <b>Qualifications:</b>over 15 years of experience in the field
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 011 7 888888
                        <b>Available Dates:</b>Saturday & Sunday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="3.00pm">3.00pm - 3.15pm</option>
                            <option value="4.00pm">4.00pm - 4.15pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR DARSHANA ABEYGUNAWARDANA', 'Obstetrics')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Oncology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Sidath.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR.SIDATH WIJESEKARA</b></p>
                    <p>Cancer specialist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS(Col), MD (Clinical Oncology)
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 0112 369113
                        <b>Available Dates:</b>Tuesday & Thursday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Thursday">Thursday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="7.00pm">7.00pm - 7.15pm</option>
                            <option value="7.30pm">7.30pm - 7.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR.SIDATH WIJESEKARA', 'Oncology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Psychiatry">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Jayan.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR. JAYAN MENDIS</b></p>
                    <p>Consultant Psychiatrist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS,MD(Psy),FSLCPsy,FCCP
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>011 451 4770
                        <b>Available Dates:</b>Monday & Saturday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Saturday">Saturday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="4.00pm">4.00pm - 4.15pm</option>
                            <option value="6.30pm">6.30pm - 6.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. JAYAN MENDIS', 'Psychiatry')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Psychiatry">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.M.Ganeshan.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR. M. GANESHAN</b></p>
                    <p>Senior Lecturer in Psychiatry and Consultant Psychiatrist
                        <br>
                        <br>
                        <b>Qualifications:</b>
                    <p>B.A. Biochemistry (Hons) - University of Oxford, UK M.B.B.S (Hons) University of Colombo,</p>
                    <p>SL Postgraduate Dip in Applied Psychology University of Colombo MD in Psychiatry, University of
                        Colombo</p>

                    <b>Languages : </b>Sinhala and English
                    <br>
                    <br>
                    <b>Phone : </b> 011 550 6000
                    <b>Available Dates:</b>Saturday & Sunday
                    <br>
                    <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="5.00pm">5.00pm - 5.15pm</option>
                            <option value="7.30pm">7.30pm - 7.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. M. GANESHAN', 'Psychiatry')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Neurology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Prof.Gamage.png" alt="Dr" width="70px" height="70px">
                    <p><b>PROF R.GAMAGE</b></p>
                    <p>Neurological Diagnostics
                        <br>
                        <br>
                        <b>Qualifications:</b>over 10 years of experience at at the National Hospital.
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 0112 551410
                        <b>Available Dates:</b>Monday & Friday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Friday">Friday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="3.00pm">3.00pm - 3.15pm</option>
                            <option value="6.30pm">6.30pm - 6.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('PROF R.GAMAGE', 'Neurology')" value="Select"
                        class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Pediatrics">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Ranil.png" alt="Dr" width="70px" height="70px">
                    <p><b>D.R.R ABEYSINGHE</b></p>
                    <p>Professor in Paediatrics, Faculty of Medicine, Peradeniya Consultant Paediatrician
                        <br>
                        <br>
                        <b>Qualifications:</b> MBBS (SL), MD (Col), DCH (Col), MRCP(UK), FRCPCH (UK)
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 0817 770700
                        <b>Available Dates:</b>Tuesday & Friday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Friday">Friday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="5.00pm">5.00pm - 5.15pm</option>
                            <option value="8.30pm">8.30pm - 8.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('D.R.R ABEYSINGHE', 'Pediatrics')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Surgery">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Lamawansa.png" alt="Dr" width="70px" height="70px">
                    <p><b>PROF. M.D. LAMAWANSA</b></p>
                    <p>Dean, Faculty of Medicine, University of Peradeniya Professor in Surgery and Consultant Surgeon
                        <br>
                        <br>
                        <b>Qualifications:</b> MBBS, MS, FRCS (Edin) PhD (Aus)
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 0812388008
                        <b>Available Dates:</b>Monday & Tuesday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="3.00pm">3.00pm - 3.15pm</option>
                            <option value="7.00pm">7.00pm - 7.15pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('PROF. M.D. LAMAWANSA', 'Surgery')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Surgery">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Pethiyagoda.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR. A.U.B. PETHIYAGODA</b></p>
                    <p> Head, Department of Surgery, Senior Lecturer in Surgery andConsultant surgeon
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS, MS, FRCS(Edin), FRCS(Glas)
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 0812388009
                        <b>Available Dates:</b>Friday & Saturday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="6.00pm">6.00pm - 6.15pm</option>
                            <option value="7.00pm">7.00pm - 7.15pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. A.U.B. PETHIYAGODA', 'Surgery')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Surgery">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr,Dharmapala.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR. A.D. DHARMAPALA</b></p>
                    <p> Senior Lecturer in Surgery and Consultant Surgeon
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS, MS, FRCS
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 0112388200
                        <b>Available Dates:</b>Monday & Tuesday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Wednesday">Wednesday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="4.00pm">4.00pm - 4.15pm</option>
                            <option value="6.30pm">6.30pm - 6.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. A.D. DHARMAPALA', 'Surgery')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Hematology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Dhammika.png" alt="Dr" width="70px" height="70px">
                    <p><b>PROF. DHAMMIKA DISSANAYAKE</b></p>
                    <p> Consultant Haematologist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS, D Path, MD, PhD
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b> 011 5 077234
                        <b>Available Dates:</b>Monday & Saturday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Saturday">Saturday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="7.00pm">7.00pm - 7.15pm</option>
                            <option value="7.30pm">7.30pm - 7.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('PROF. DHAMMIKA DISSANAYAKE', 'Hematology')"
                        value="Select" class="dr_select">

                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Immunology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Indika.png" alt="Dr" width="70px" height="70px">
                    <p><b>PROF. INDIKA GAWARAMMANA</b></p>
                    <p> Consultant Immunologist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS, MSc (Allergy), PhD (Immunology)
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>0342029845
                        <b>Available Dates:</b>Tuesday & Wednesday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="3.00pm">3.00pm - 3.15pm</option>
                            <option value="4.30pm">4.30pm - 4.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('PROF. INDIKA GAWARAMMANA', 'Immunology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Ophthalmology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr. Saliya.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR. SALIYA PATHIRANA</b></p>
                    <p> Consultant Eye Surgeon
                        <br>
                        <br>
                        <b>Qualifications:</b>Master of Surgery M.S , Diploma in Ophthalmology D.O Ophthalmology
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>0715645324
                        <b>Available Dates:</b>Monday & Sunday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Sunday">Sunday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="4.00pm">4.00pm - 4.15pm</option>
                            <option value="5.30pm">5.30pm - 5.45pm</option>
                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. SALIYA PATHIRANA', 'Ophthalmology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Gastroenterology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Nilesh.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR. NILESH FERNANDO</b></p>
                    <p> Consultant Gastroenterologist
                        <br>
                        <br>
                        <b>Qualifications:</b>MBBS(Col), MD(Col), Sp. cert. in Gastroenterology(UK)
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>0774589764
                        <b>Available Dates:</b>Saturday & Sunday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="7.00pm">7.00pm - 7.15pm</option>
                            <option value="8.00pm">8.00pm - 8.15pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. NILESH FERNANDO', 'Gastroenterology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Urology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.Dimantha.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR. DIMANTHA DE SILVA</b></p>
                    <p> Consultant Urologist
                        <br>
                        <br>
                        <b>Qualifications:</b>10 year Experiences in Jayawardhanapura Hospital
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>0778934226
                        <b>Available Dates:</b>Monday & Saturday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Saturday">Saturday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="5.00pm">5.00pm - 5.15pm</option>
                            <option value="6.30pm">6.30pm - 6.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR. DIMANTHA DE SILVA', 'Urology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>


        <div class="input-box">
            <div class="Urology">
                <form action="consult2.html" method="GET" id="doctorForm">
                    <img class="Dr" src="../../image/Dr.shiran.png" alt="Dr" width="70px" height="70px">
                    <p><b>DR.SHIRANTHA BANDARA</b></p>
                    <p> Consultant Urologist
                        <br>
                        <br>
                        <b>Qualifications:</b>10 year Experiences in Jayawardhanapura Hospital
                        <br>
                        <b>Languages : </b>Sinhala and English
                        <br>
                        <br>
                        <b>Phone : </b>0778934226
                        <b>Available Dates:</b>Wednesday & Thursday
                        <br>
                        <br>
                    <div class="Available">
                        <b> <label for="Select a Date  "> Select a Date :</label></b>
                        <select id="date">
                            <option name="select">Select</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                        </select>

                        <b> <label for="Select a Time"> Select a Time :</label></b>
                        <select id="time">
                            <option name="select">Select</option>
                            <option value="6.00pm">6.00pm - 6.15pm</option>
                            <option value="7.30pm">7.30pm - 7.45pm</option>

                        </select>
                    </div>
                    </p>
                    <input type="button" onclick="redirectToConsultation('DR.SHIRANTHA BANDARA', 'Urology')"
                        value="Select" class="dr_select">
                </form>
            </div>
        </div>

    </div> <!-- Closing tag for the container div -->
    <?php include_once ("footer.php"); ?>  <!-- Include footer section using PHP include_once function -->
    <script src="../../js/Consultation.js"></script>  <!-- Include JavaScript file for additional functionality -->
</body>

</html>