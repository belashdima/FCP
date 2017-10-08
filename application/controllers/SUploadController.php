<?php

class SUploadController
{
    function upload()
    {
        $siteData = simplexml_load_file('xml/siteData.xml');
        $rootDirectory = $siteData->rootDirectory;

        if(isset($_FILES['file'])){
            $errors= array();
            $file_name = $_FILES['file']['name'];
            $file_size =$_FILES['file']['size'];
            $file_tmp =$_FILES['file']['tmp_name'];
            $file_type=$_FILES['file']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

            $extensions= array("jpeg","jpg","png","gif");

            if (in_array($file_ext,$extensions)=== false) {
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 2097152) {
                $errors[]='File size must be less than 2 MB';
            }

            if (empty($errors) == true) {
                //echo 'file moved';
                move_uploaded_file($file_tmp,"uploadedImages/".$file_name);

                //(new DatabaseHandler())->saveUploadedImage($file_name);

                //echo "Success";
                echo $rootDirectory."/uploadedImages/".$file_name;
            } else {
                print_r($errors);
            }
        }
    }
}