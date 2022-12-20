<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author</title>
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/header.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/includes/nav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/librarian/addAuthor.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/all.min.css">
</head>

<body>
    <div class="header">
        <p class="operation">Add Author</p>
        <input type="text" class="searchbox">
        <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
        <p class="search">Search</p>
        <div class="notificationIconBack"></div>
        <i class="fa-solid fa-bell" id="notificationIcon"></i>
        <p class="logout"><a href="#">Logout</a></p>
    </div>

    <!-- navigation bar -->

    <?php 
       $this->view('librarian/includes/nav'); 
    ?>

    <!-- body -->

    <div class="bodyContainer01">

<!-- form -->

<div class="bodyContainer02">
    <form method="post" enctype="multipart/form-data">
        <label for="fullname" class="fnameLabel">Full Name</label>
        <input type="text" name="Name" class="fname" id="fname" required value="<?= get_var('Name') ?>">
        <div class="errorName">
                    <?php if (isset($errors['Name'])): ?>
                    <p>
                        <?="*" . $errors['Name'] ?>
                    </p>
                    <?php endif; ?>
    

        <label for="sex" class="sexLabel">Sex</label>
        <select id="sex" class="sex" name="Sex" required >
            <!-- <option value="" disabled selected>  --- Choose Type ---</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option> -->

            <option <?=get_select('Sex','')?> value="" disabled selected >--- Choose Type ---</option>
                            <option <?=get_select('Sex','Male')?> value="Male">Male</option>
                            <option <?=get_select('Sex','Female')?> value="Female">Female</option>
                            <option <?=get_select('Sex','Other')?> value="Other">Other</option>
        
        </select>

        <label for="email" class="emailLabel">Email</label>
        <input type="email" name="Email" class="email" id="email" required value="<?= get_var('Email') ?>">

        <div class="errorEmail">
                    <?php if (isset($errors['Email'])): ?>
                    <p>
                        <?="*" . $errors['Email'] ?>
                    </p>
                    <?php endif; ?>

        

        <label for="authorImage" class="authorImageLabel">Upload Image</label> 
        <input type="file" id="imagefile" name="imagefile" class="imagefile" required >

      
        
        <div class="container3" id="imagecontainer">
            <img src="<?=ROOT?>/img/profile.jpg" id="imagepreview" class="imagepreview">

        <button class="addauthorbtn" name="submit" type="submit">Add Author</button>
        </div>
    </form>
</div>
<button class="backbtn"><a href="<?= ROOT ?>/librarian">Back</a></button>


        
</div>

    <?php $this->view('librarian/includes/footer'); ?>