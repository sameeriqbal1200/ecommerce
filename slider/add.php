<?php
include 'header.php';
include('../db_connection/connection.php');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $button_text = $_POST['button_text'];
    $button_url = $_POST['button_url'];
    $status = $_POST['status'];
    // echo $status;
    $target_dir = "./uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["imageUpload"]["name"],".jpg");

    if(empty($title) || empty($description) || empty($button_text) || empty($button_url) || empty($status)){

        if(empty($title)){
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        if(empty($description)){
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
        if(empty($button_text)){
            echo "<font color='red'>Button_text field is empty.</font><br/>";
        }
        if(empty($button_url)){
            echo "<font color='red'>Button_url field is empty.</font><br/>";
        }
        if(empty($status)){
            echo "<font color='red'>Status field is empty.</font><br/>";
        }
    }
    else{
        $result = mysqli_query($database, "INSERT INTO slider(title,description,button_text,button_url,status,image) VALUES('$title','$description','$button_text','$button_url','$status','$image')");
        if($result){
            echo "<font color='green'>Data added successfully.";
        }else{
            echo "Try Again.";
        }       
    }
}

?>

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row">
	<div class="col-md-12">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add Slide
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form YU class="kt-form" method="POST" action="">
				<div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="button_text">Button Text</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="button_text" id="button_text">
                    </div>
                    <div class="form-group">
                        <label for="button_url">Button Url</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="button_url" id="button_url">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div></div>
                        <select class="custom-select form-control" name="status">
                            <option value="" selected>Select</option>
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                    <div class="form-group">
						<label>File Browser</label>
						<div></div>
						<div class="custom-file">
						  	<input type="file" class="custom-file-input" name="imageUpload" id="imageUpload">
						  	<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
                        <input class="btn btn-primary" type="submit" name="submit" value="Submit">
						<button type="reset" class="btn btn-secondary">Cancel</button>
					</div>
				</div>
			</form>
			<!--end::Form-->			
		</div>
		<!--end::Portlet-->
	</div>
</div></div>
<!-- end:: Content -->				</div>				
				
				<?php include 'footer.php'; ?>