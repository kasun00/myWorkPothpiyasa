
<?php 
include('../private/views/librarian/includes/header.view.php'); ?>


    <body>
        <div class="header">
            <p class="operation">Add Book</p>
            <input type="text" class="searchbox">
            <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
            <p class="search">Search</p>
            <div class="notificationIconBack"></div>
            <i class="fa-solid fa-bell" id="notificationIcon"></i>
            <p class="logout"><a href="<?= ROOT ?>/logout">Logout</a></p>
        </div>
    
        <!-- navigation bar -->
         <?php include('../private/views/librarian/includes/nav.view.php'); ?> 
        
    
        <div class="bodyContainer01">

<!-- form -->
   
<div class="bodyContainer2">

    <form  method="post" enctype="multipart/form-data">

        <label for="tital" class="titalLabel">Title</label>
        <input type="text" name="Title" class="tital" id="tital" value="<?= get_var('Title') ?>" required>
        <div class="errorTitleMesg">
                    <?php if (isset($errors['Title'])): ?>
                    <p>
                        <?="*" . $errors['Title'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        

        <label for="isbn" class="isbnLabel">ISBN</label>
        <input type="text" name="ISBN" class="isbn" id="isbn" value="<?= get_var('ISBN') ?>" required>
        <div class="errorISBNMesg">
                    <?php if (isset($errors['ISBN'])): ?>
                    <p>
                        <?="*" . $errors['ISBN'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        

        <label for="author" class="authorsLabel">Author(s)</label>
        <input type="text" name="AuthorName" class="author" id="author" value="<?= get_var('AuthorName') ?>" required>
        <div class="errorAuthorMesg">
                    <?php if (isset($errors['Author'])): ?>
                    <p>
                        <?="*" . $errors['Author'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        
        <!-- <button type="button" name="checkauthor" value="checkauthor" class="checkAuthor"><a href="#">Define a Author</a></button> -->

        <label for="edition" class="editionLabel">Edition</label>
        <input type="text" name="Edition" class="edition" id="edition" value="<?= get_var('Edition') ?>" required>
        <div class="errorEditionMesg">
                    <?php if (isset($errors['Edition'])): ?>
                    <p>
                        <?="*" . $errors['Edition'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        

        <label for="publisher" class="publisherLabel">Publisher</label>
        <input type="text" name="Publisher" class="publisher" id="publisher" value="<?= get_var('Publisher') ?>" required>

        <label for="year" class="yearLabel">Publish Year</label>
        <input type="text" name="PublishedYear" class="year" id="year" value="<?= get_var('PublishedYear') ?>" required>

        <label for="category" class="cateogoryLable">Category</label>
        <select id="category" class="category" name="Category" id="category" value="<?= get_var('Category') ?>" required>
            <option value="">--- Choose Type ---</option>
            <?php
                $category = new BookCategory();
                $data = $category->findAll();
                for ($i=0; $i < count($data); $i++) { 
                    echo "<option ". get_select('Category',get_CategoryName("CategoryID",$data[$i]->CategoryID)) . " value='".$data[$i]->CategoryID."'" .">".$data[$i]->Name."</option>"; 
                }
                
            ?>
          
        </select>
        <!-- <button class="defineNewCategorybtn"><a href="#">Define New Category</a></button> -->

        <label for="rack" class="rackLable">Rack</label>
        <select id="rack" class="rack" name="RackID" required>
            <option value="">--- Choose Type ---</option>
            <?php
                $rack = new Rack();
                $data = $rack->findAll();
                for ($i=0; $i < count($data); $i++) { 
                    echo "<option ". get_select('RackID',$data[$i]->RackID). " value=".$data[$i]->RackID.">".$data[$i]->RackID."</option>"; 
                }
                
            ?>
        </select>
        <!-- <button class="defineNewRackbtn"><a href="#">Define New Rack</a></button> -->

        <label for="condition" class="conditionLable">Condition</label>
        <select id="condition" class="condition" name="Condition" required>
            <option value="">--- Choose Type ---</option>
            <option <?= get_select('Condition','Fine')?> value="Fine">Fine/Like New(F)</option>
            <option <?= get_select('Condition','Near Fine')?> value="Near Fine">Near Fine(NF)</option>
            <option <?= get_select('Condition','Very Good')?> value="Very Good">Very Good(VG)</option>
            <option <?= get_select('Condition','Good')?> value="Good">Good(G)</option>
            <option <?= get_select('Condition','Fair')?> value="Fair">Fair(F)</option>
            <option <?= get_select('Condition','Poor')?> value="Poor">Poor(P)</option>
        </select>

        <label for="pages" class="pagesLabel">Pages</label>
        <input type="text" name="NoPages" class="pages" id="pages" value="<?= get_var("Nopages")?>" required>
        <div class="errorNoPagesMesg">
                    <?php if (isset($errors['NoPages'])): ?>
                    <p>
                        <?="*" . $errors['NoPages'] ?>
                    </p>
                    <?php endif; ?>
        </div>

        <label for="languages" class="languagesLabel">Language</label>
        <select id="languages" class="languages" name="Languages" required>
            <option value="">--- Choose Type ---</option>
            <option <?= get_select("Languages","English")?> value="English">English</option>
            <option <?= get_select("Languages","Sinhala")?> value="Sinhala">Sinhala</option>
            <option <?= get_select("Languages","Tamil")?> value="Tamil">Tamil</option>
        </select>
        
        <label for="bookImage" class="bookImageLabel">Upload Image</label> 
        <input type="file" id="imagefile" name="Image" class="imagefile" value="<?= get_var("Image")?>" required>

        <label for="receivedDate" class="receivedLabel">Received Date</label> 
        <input type="date" id="receivedDate" name="ReceivedDate" class="receivedDate" value="<?= get_var("ReceivedDate")?>" required>
        
        <!-- vender/doner -->
        
        <div class="container3">
            <div class="button-box">
                <div id="btn"></div>
                <button class="toggle-btn" id="vendorbtn" type="button" value="Vendor"
                onclick="getVendor()">Vendor</button>
                <button class="toggle-btn" id="donorbtn" type="button" value="Donor"
                onclick="getDonor()">Donor</button>
            </div>

            <div class="vendor" id="vendor">
                <label for="vendorDonor" class="vendorDonorLabel">Name</label>
                <select id="vendorDoner" class="vendorDonor" name="VendorID" >
                    <option value="">--- Choose Type ---</option>
                    <?php 
                        $vendor = new Vendor();
                        $data = $vendor->findAll();
                        for ($i=0; $i < count($data); $i++) { 
                            echo "<option". get_select("VendorID",$data[$i]->VendorID) ." value='".$data[$i]->VendorID."'"." >".$data[$i]->VendorID." - ".$data[$i]->Name."</option>"; 
                        }
                    ?>
                </select>
                <!-- <button class="defineDonorVendorbtn"><a href="#">Define New Vendor</a></button> -->
            </div>

            <div class="donor" id="donor">
                <label for="vendorDonor" class="vendorDonorLabel">Name</label>
                <select id="vendorDoner" class="vendorDonor" name="DonorID" >
                    <option value="">--- Choose Type ---</option>
                    <?php 
                        $donor = new Donor();
                        $data = $donor->findAll();
                        for ($i=0; $i < count($data); $i++) { 
                            echo "<option". get_select("DonorID",$data[$i]->DonorID) ." value='".$data[$i]->DonorID."'".">".$data[$i]->DonorID." - ".$data[$i]->Name."</option>"; 
                        }
                    ?>
                </select>
                <!-- <button class="defineDonorVendorbtn"><a href="#">Define New Donor</a></button> -->
            </div>
        

        <button class="addbookbtn" id="addbookbtn" name="submit" type="submit">Add Book</button>
        <button class="backbtnAddBook"><a href="<?=ROOT?>">Back</a></button>
            
    </div>
    </form>
    
</div>


</div>
<?php 
include('../private/views/includes/popup.add.view.php');?>    
    
<?php include('../private/views/librarian/includes/footer.view.php'); ?>

<!-- set the popup msg -->
<?php if($flag[0]==1){
    echo '<script type="text/javascript">openPopup("http://localhost/Pothpiyasa-main/public/books/add");</script>';
}?>