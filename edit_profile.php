<?php include_once "templates/header.php"; ?>




    <div class="row">
        <div class="col-md-12">
            <section class="panel b-a">

                <div class="panel-heading b-b">  
                    <a href="#" class="font-bold">Edit your profile</a> 
                </div>

                <div class="panel-body"> 
                <!-- MAIN CODE GOES HERE  -->


                    <div class="profile">
                        <div class="profile-picture">

                            <?php  
                                $uname = $_SESSION['uname'];

                               $photo =  $obj -> showProfilePicture($uname);

                            ?>
                            <img style="width: 200px" src="admin_photos/<?php echo $photo['user_photo']; ?>" alt="">
                            <br>
                            <hr>
                            
                            <?php  

                                if( isset($_POST['upload_photo']) ){
                                    $ppic_name = $_FILES['pphoto']['name'];
                                    $ppic_tmp = $_FILES['pphoto']['tmp_name'];

                                    $pic_ext_array =  explode('.', $ppic_name);
                                    $ext = end($pic_ext_array);
                                    $u_pic_name = md5(time().rand().$ppic_name).'.'. strtolower(  $ext );

                                    if( empty($ppic_name) ){
                                         $mess = "<p class='alert alert-danger'>Please select a Photo <button class='close' data-dismiss='alert'>&times;</button></p>";
                                    }else {
                                        
                                        $obj -> uploadProfilePhoto($u_pic_name, $ppic_tmp, $uname);
                                    }
                                }

                            ?>
                            
                            <div class="mess">
                                <?php  

                                  if( isset($mess) ){
                                    echo $mess;
                                  }

                                ?>
                            </div>


                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                <input name="pphoto" type="file">
                                <input name="upload_photo" class="btn btn-success" type="submit" value="Upload photo">
                            </form>

                        </div>

                        <br>
                        <br>
                        <br>

                        <hr>
                        <div class="profile-info">
                            <table class="table">
                                <tr>
                                    <td>Full Name</td>
                                    <td>Asraful  Haque</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>Asraful  Haque</td>
                                </tr>
                                <tr>
                                    <td>Cell</td>
                                    <td>Asraful  Haque</td>
                                </tr>

                                <tr>
                                    <td>Full Name</td>
                                    <td>Asraful  Haque</td>
                                </tr>
                            </table>
                        </div>
                    </div>      
                     


                </div>

                <div class="clearfix panel-footer"> 
                    <a class="btn btn-success" href="edite_profile.php">Edit Profile</a>
                </div>
            </section>
        </div>
    </div>




<?php include_once "templates/footer.php"; ?>