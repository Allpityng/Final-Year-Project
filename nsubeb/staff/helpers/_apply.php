<?php
// leave uploads
 if (isset($_POST['apply'])) {

    $id = $_SESSION['s_staffID'];

    $email = $_SESSION['s_staff_email'];



    $date = date('Y-m-d H:i:s');

    $title = mysqli_real_escape_string($connection, sanitizeInput($_POST['title']));

    if (empty($title)) {
        $titleError = "Leave title cannot be empty";
    }

    
    // written_application
    if(!isset($_FILES['written_application']) || $_FILES['written_application']['error'] == UPLOAD_ERR_NO_FILE){
        $written_applicationError =  "Hand Written Application must be uploaded";
    }else if($_FILES['written_application']['error'] > 0){
        $written_applicationError =  $_FILES['written_application']['error'];
    }

    // birth_certificate
    if(!isset($_FILES['birth_certificate']) || $_FILES['birth_certificate']['error'] == UPLOAD_ERR_NO_FILE){
        $birthError =  "Birth Certificate must be uploaded";
    }else if($_FILES['birth_certificate']['error'] > 0){
        $birthError =  $_FILES['birth_certificate']['error'];
    }

    // qualification
    if(!isset($_FILES['qualification']) || $_FILES['qualification']['error'] == UPLOAD_ERR_NO_FILE){
        $qualificationError =  "Qualification Certificate must be uploaded";
    }else if($_FILES['qualification']['error'] > 0){
        $qualificationError =  $_FILES['qualification']['error'];
    }
    
    // primary_certificate
    if(!isset($_FILES['primary_certificate']) || $_FILES['primary_certificate']['error'] == UPLOAD_ERR_NO_FILE){
        $primary_certificateError =  "Primary Certificate Certificate must be uploaded";
    }else if($_FILES['primary_certificate']['error'] > 0){
        $primary_certificateError =  $_FILES['primary_certificate']['error'];
    }

    // secondary_certificate
    if(!isset($_FILES['secondary_certificate']) || $_FILES['secondary_certificate']['error'] == UPLOAD_ERR_NO_FILE){
        $secondary_certificateError =  "Secondary Certificate Certificate must be uploaded";
    }else if($_FILES['secondary_certificate']['error'] > 0){
        $secondary_certificateError =  $_FILES['secondary_certificate']['error'];
    }


    if (!isset($written_applicationError) && !isset($birthError) && !isset($qualificationError) && !isset($primary_certificateError) && !isset ($secondary_certificateError)) {
        
        $upload_dir = '../documents/';

        // file directory and names
        $target_file_written_application = $upload_dir .  basename($_FILES["written_application"]["name"]);


        $target_file_birth_certificate = $upload_dir .  basename($_FILES["birth_certificate"]["name"]);

        $target_file_qualification = $upload_dir .  basename($_FILES["qualification"]["name"]);


        $target_file_primary_certificate = $upload_dir .  basename($_FILES["primary_certificate"]["name"]);

        $target_file_secondary_certificate = $upload_dir .  basename($_FILES["secondary_certificate"]["name"]);


        // files temporary location
        $temp_written_application = $_FILES["written_application"]['tmp_name'];

        $temp_birth_certificate = $_FILES["birth_certificate"]['tmp_name'];

        $temp_qualification = $_FILES["qualification"]['tmp_name'];

        $temp_primary_certificate = $_FILES["primary_certificate"]['tmp_name'];

        $temp_secondary_certificate = $_FILES["secondary_certificate"]['tmp_name'];
        
        // get files types
        $FileTypewritten_application = strtolower(pathinfo($target_file_written_application, PATHINFO_EXTENSION));

        $FileTypebirth_certificate = strtolower(pathinfo($target_file_birth_certificate, PATHINFO_EXTENSION));

        $FileTypequalification = strtolower(pathinfo($target_file_qualification, PATHINFO_EXTENSION));

        $FileTypeprimary_certificate = strtolower(pathinfo($target_file_primary_certificate, PATHINFO_EXTENSION));

        $FileTypesecondary_certificate = strtolower(pathinfo($target_file_secondary_certificate, PATHINFO_EXTENSION));

        // move the uploaded file to the upload_dir
        $new_file_written_application = $upload_dir . "written_application_" . $id . '.' . $FileTypewritten_application;

        $new_file_birth_certificate = $upload_dir . "birth_certificate_"  . $id . '.' .$FileTypebirth_certificate;

        $new_file_qualification = $upload_dir . "qualification_" . $id . '.' . $FileTypequalification;

        $new_file_primary_certificate = $upload_dir . "primary_certificate_" . $id . '.' . $FileTypeprimary_certificate;

        $new_file_secondary_certificate = $upload_dir . "secondary_certificate_" . $id . '.' . $FileTypesecondary_certificate;


        // upload the files
        move_uploaded_file($temp_written_application, $new_file_written_application);

        move_uploaded_file($temp_birth_certificate, $new_file_birth_certificate);

        move_uploaded_file($temp_qualification, $new_file_qualification);

        move_uploaded_file($temp_primary_certificate, $new_file_primary_certificate);

        move_uploaded_file($temp_secondary_certificate, $new_file_secondary_certificate);

        // add files information to database
        $addFilesQuery = "INSERT INTO `leaves`(`email`, `title`, `written_application`, `birth_certificate`, `qualification`, `secondary_certificate`, `primary_certificate`, `datetime`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $files_smtmt = mysqli_prepare($connection, $addFilesQuery);

        mysqli_stmt_bind_param($files_smtmt, "ssssssss", 
        $email,
        $title,
        $new_file_written_application,
        $new_file_birth_certificate,
        $new_file_qualification,
        $new_file_primary_certificate,
        $new_file_secondary_certificate,
        $date
    );

        $exec_files_query = mysqli_stmt_execute($files_smtmt);


        if ($exec_files_query) {
            $messages['msgSucc'] = "Leave applied and uploaded successfully...wait for approval";
        }else{
            $messages['msgErr'] = "Error occured, try again";
        }
        mysqli_stmt_close($files_smtmt);
    }

}
