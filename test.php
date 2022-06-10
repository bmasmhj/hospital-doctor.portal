<style>
    .avatar-upload {
    position: relative;
    max-width: 200px;
    /*margin: 50px auto;*/
}
.avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
}
.avatar-upload .avatar-edit input {
    display: none;
}
.avatar-upload .avatar-edit input + label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 12%);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-preview {
    width: 192px;
    height: 192px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 10%);
}
.avatar-upload .avatar-preview > div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
    </style>

<div class="avatar-upload">
    <form action="controllerUserData.php" method="POST" enctype="multipart/form-data">
    <div class="avatar-edit">
        <input type='file' id="imageUpload" name="photo" />
        <input type='hidden' name="img" value="<?php echo $userinfo['image_url'];?>" />
        <label for="imageUpload"><i class="fas fa-pencil-alt"></i></label>
    </div>
    <div class="avatar-preview">
        <div id="imagePreview" style="background-image: url(../assets/<?php echo $userinfo['image_url'];?>);">
        </div>
    </div>
    <input type="submit" name="btnpp" class="btn btn-success mt-2" value="Update">
</form>
</div>
