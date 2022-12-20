<?php include('../private/views/librarian/includes/header.view.php'); ?>


<body>
        <div class="header">
            <p class="operation">Delete Preview</p>
            <input type="text" class="searchbox">
            <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
            <p class="search">Search</p>
            <div class="notificationIconBack"></div>
            <i class="fa-solid fa-bell" id="notificationIcon"></i>
            <p class="logout"><a href="<?= ROOT ?>/logout">Logout</a></p>
        </div> 
    
        <!-- navigation bar-->
       
        <?php 
        include('../private/views/librarian/includes/nav.view.php'); ?>
    <div class="bodyContainer01">
        <div class="bodyContainerEditBook">
    <?php if($row): ?>
        
    <form  method="post" enctype="multipart/form-data">

        <label for="tital" class="titalLabel">Title</label>
        <input type="text" name="Title" class="tital" id="tital" value="<?= get_var('Title',$row[0]->Title) ?>" disabled>
        <span class="errorMsgTitleEditBook">
        <?php if (isset($errors['Title'])): ?>
                    <p>
                        <?="*" . $errors['Title'] ?>
                    </p>
                    <?php endif; ?>
        </span>

        <label for="isbn" class="isbnLabel">ISBN</label>
        <input type="text" name="ISBN" class="isbn" id="isbn" value="<?= get_var('ISBN',$row[0]->ISBN) ?>" disabled>
        <span class="errorMsgISBNEditBook">
        <?php if (isset($errors['ISBN'])): ?>
                    <p>
                        <?="*" . $errors['ISBN'] ?>
                    </p>
                    <?php endif; ?>
        </span>

        <label for="author" class="authorsLabel">Author(s)</label>
        <input type="text" name="AuthorName" class="author" id="author" value="<?= get_var('AuthorName',get_authorName("AuthorID",$row[0]->AuthorID)) ?>" disabled>
        <div class="errorMesgAuthorEditBook">
                    <?php if (isset($errors['AuthorName'])): ?>
                    <p>
                        <?="*" . $errors['AuthorName'] ?>
                    </p>
                    <?php endif; ?>
        </div>

        <label for="edition" class="editionLabel">Edition</label>
        <input type="text" name="Edition" class="edition" id="edition" value="<?= get_var('Edition',$row[0]->Edition) ?>" disabled>
        <div class="errorMesgEditionEditBook">
                    <?php if (isset($errors['Edition'])): ?>
                    <p>
                        <?="*" . $errors['Edition'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        <label for="publisher" class="publisherLabel">Publisher</label>
        <input type="text" name="Publisher" class="publisher" id="publisher" value="<?= get_var('Publisher',$row[0]->Publisher) ?>" disabled>
        <div class="errorMesgPublisherEditBook">
                    <?php if (isset($errors['Publisher'])): ?>
                    <p>
                        <?="*" . $errors['Publisher'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        <label for="year" class="yearLabel">Publish Year</label>
        <input type="text" name="PublishedYear" class="year" id="year" value="<?= get_var('PublishedYear',$row[0]->PublishedYear) ?>" disabled>
        <div class="errorMesgPublishedYearEditBook">
                    <?php if (isset($errors['PublishedYear'])): ?>
                    <p>
                        <?="*" . $errors['PublishedYear'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        <label for="category" class="cateogoryLable">Category</label>
        <select id="category" class="category" name="Category" id="category"  disabled>
            <option value="">--- Choose Type ---</option>
            <?php
                $category = new BookCategory();
                $data = $category->findAll();
                for ($i=0; $i < count($data); $i++) { 
                    echo "<option ". get_select('Category',$data[$i]->Name,get_CategoryName("CategoryID",$row[0]->Category) ?? "") . " value='".$data[$i]->Name."'" .">".$data[$i]->Name."</option>"; 
                }
                
            ?>
          
        </select>
        <!-- <button class="defineNewCategorybtn"><a href="#">Define New Category</a></button> -->

        <label for="rack" class="rackLable">Rack</label>
        <select id="rack" class="rack" name="RackID" disabled>
            <option value="">--- Choose Type ---</option>
            <?php
                $rack = new Rack();
                $data = $rack->findAll();
                for ($i=0; $i < count($data); $i++) { 
                    echo "<option ". get_select('RackID',$data[$i]->RackID,$row[0]->RackID ?? ""). " value=".$data[$i]->RackID.">".$data[$i]->RackID."</option>"; 
                }
                
            ?>
        </select>
        <!-- <button class="defineNewRackbtn"><a href="#">Define New Rack</a></button> -->

        <label for="condition" class="conditionLable">Condition</label>
        <select id="condition" class="condition" name="Condition" disabled>
            <option value="">--- Choose Type ---</option>
            <option <?= get_select('Condition','Fine/Like New(F)',$row[0]->BookCondition ?? "")?> value="Fine/Like New(F)">Fine/Like New(F)</option>
            <option <?= get_select('Condition','Near Fine(NF)',$row[0]->BookCondition ?? "")?> value="Near Fine(NF)">Near Fine(NF)</option>
            <option <?= get_select('Condition','Very Good(VG)',$row[0]->BookCondition ?? "")?> value="Very Good(VG)">Very Good(VG)</option>
            <option <?= get_select('Condition','Good(G)',$row[0]->BookCondition ?? "")?> value="Good(G)">Good(G)</option>
            <option <?= get_select('Condition','Fair(F)',$row[0]->BookCondition ?? "")?> value="Fair(F)">Fair(F)</option>
            <option <?= get_select('Condition','Poor(P)',$row[0]->BookCondition ?? "")?> value="Poor(P)">Poor(P)</option>
        </select>

        <label for="pages" class="pagesEditBookLabel">Pages</label>
        <input type="text" name="NoPages" class="pagesEditBook" id="pages" value="<?= get_var("Nopages",$row[0]->NoPages)?>" disabled>

        <label for="languages" class="languagesEditBookLabel">Language</label>
        <select id="languages" class="languagesEditBook" name="Languages" disabled>
            <option value="">--- Choose Type ---</option>
            <option <?= get_select("Languages","English",$row[0]->Language)?> value="English">English</option>
            <option <?= get_select("Languages","Sinhala",$row[0]->Language)?> value="Sinhala">Sinhala</option>
            <option <?= get_select("Languages","Tamil",$row[0]->Language)?> value="Tamil">Tamil</option>
        </select>

        <div class="imageViewer" id="imageViewer"><img src="<?=ROOT?>/uploads/<?= get_var("Image",$row[0]->Image)?>" class='imgView' id="imgPreview"></div>
        
        <label for="bookImage" class="bookImageEditBookLabel">Upload Image</label> 
        <input type="file" id="imagefile" name="Image" class="imagefileEditBook" disabled>
        <div class="errorMesgImageEditBook">
                    <?php if (isset($imgErrors['Image'])): ?>
                    <p>
                        <?="*" . $ImgErrors['Image'] ?>
                    </p>
                    <?php endif; ?>
        </div>
        <label for="receivedDate" class="receivedEditBookLabel">Received Date</label> 
        <input type="date" id="receivedDate" name="ReceivedDate" class="receivedDateEditBook" value="<?= get_var("ReceivedDate",$row[0]->ReceivedDate)?>" disabled>
        
        <!-- vender/doner -->
        
        
           
            <div class="redioBtns">
            <label class="personTypeEdit">Type</label>
            <input type="radio" name="vendorDonor" id="Vendor" value="Vendor" <?php echo select_redioButton($row[0]->VendorID)?> onchange="choseVendor()" disabled><label for="Vendor" class="VendorLabel" >Vendor</label> 
            <input type="radio" name="vendorDonor" id="Donor" value="Donor" <?php echo select_redioButton($row[0]->DonorID)?> onchange="choseDonor()" disabled><label for="Donor" class="DonorLabel" >Donor</label> 

            </div>
           
            
                
            

            <div class="donor" id="donor">
               
            <label for="vendorDonor" class="personLabel">Name</label>
            <div class="option1" id="option1">
                <select id="vendorDoner" class="person" name="Person" disabled>
                    
                    <?php 
                         
                         if(!empty($row[0]->VendorID)){
                             $vendor = new Vendor();
                             $data = $vendor->findAll();
                             echo '<option '. get_select('DonorID','', $row[0]->VendorID ?? "").' value="">--- Choose Type ---</option>';
                             for ($i=0; $i < count($data); $i++) { 
                                 
                                 echo "<option ". get_select("DonorID",$data[$i]->VendorID,$row[0]->VendorID ?? "") ." value='".$data[$i]->VendorID."'".">".get_selectedVendorDonorName($row[0]->VendorID,$row[0]->DonorID)."</option>"; 
                             }
                             // echo '<button class="defineDonorVendorbtn"><a href="#">Define New Vendor</a></button>';
                         }
                         else if(!empty($row[0]->DonorID)){
                             $donor = new Donor();
                             $data = $donor->findAll();
                             echo '<option '. get_select('DonorID','', $row[0]->DonorID ?? "").' value="">--- Choose Type ---</option>';
                             for ($i=0; $i < count($data); $i++) { 
                                 
                                 echo "<option ". get_select("DonorID",$data[$i]->DonorID,$row[0]->DonorID ?? "") ." value='".$data[$i]->DonorID."'".">".get_selectedVendorDonorName($row[0]->VendorID,$row[0]->DonorID)."</option>"; 
                             }
                             // echo '<button class="defineDonorVendorbtn"><a href="#">Define New Donor</a></button>';
                         }
                         
                     ?>
                </select>
                </div>
                <div class="option2" id="option2">
                <select id="vendorDoner" class="person" name="VendorID" >
                        <option value="">--- Choose Type ---</option>
                        <?php 
                            $vendor = new Vendor();
                            $data = $vendor->findAll();
                            for ($i=0; $i < count($data); $i++) { 
                                echo "<option". get_select("VendorID",$data[$i]->VendorID) ." value='".$data[$i]->VendorID."'"." >".$data[$i]->Name."</option>"; 
                            }
                        ?>

                </select>
                    </div>

                    <div class="option3" id="option3">
                    <select id="vendorDoner" class="person" name="DonorID" >
                    <option value="">--- Choose Type ---</option>
                    <?php 
                        $donor = new Donor();
                        $data = $donor->findAll();
                        for ($i=0; $i < count($data); $i++) { 
                            echo "<option". get_select("DonorID",$data[$i]->DonorID) ." value='".$data[$i]->DonorID."'".">".$data[$i]->Name."</option>"; 
                        }
                    ?>
                    </select>
                    </div>
                    
                
            
        

        <button class="deleteBookBtn" name="submit" type="submit"><a href="<?=ROOT?>/books/delete/<?= $row[0]->BookID?>" >Delete</a></button>
        <button class="EditBookBackBtn"><a href="<?=ROOT?>/books?page=1">Back</a></button>
        </div>
    </form>
    <?php 
        include('../private/views/includes/popup.delete2.view.php');?> 
        </div>
           
    <?php endif;?>
    <!-- set the popup msg -->

    <?php include('../private/views/librarian/includes/footer.view.php'); ?>

  

   