<?php
$target_dir="uploads/";//where the file is going to be placed
$target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);//path of the file to be upload
$uploadOk=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//hold extension
//check whether the file is already exists
if(file_exists($target_file))
{
    echo "sorry,file already exists.";
    $uploadOk=0;
}
//Check if image file is an actual image
if(isset($_POST["submit"])&& $uploadOk==1)
{
    $check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check!=false)
        {
            echo "File is an image-";
            $uploadOk=1;
        }
        else
        {
            echo "File is not an image.";
            $uploadOk=0;
        }
}

//limit file type
if($imageFileType!="jpg" && $imageFileType!="jpeg" && $imageFileType!="png" && $imageFileType!="gif")
{
    echo "<br>";
    echo "Sorry,only JPEG,JPG,PNG and GIF files can be uploaded.";
    $uploadOk=0;
}
//if everything is ok,try to upload file
if($uploadOk==1)
{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))//moves an uploaded file to a new location
    {
        echo "\nThe file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded";
    }
    else
    {
        echo "\nSorry,there was an error uploding your file.";
    }
}
?>