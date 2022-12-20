<?php include('../private/views/librarian/includes/header.view.php'); ?>
<body>
        <div class="header">
            <p class="operation">Edit Book</p>
            <input type="text" class="searchbox">
            <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
            <p class="search">Search</p>
            <div class="notificationIconBack"></div>
            <i class="fa-solid fa-bell" id="notificationIcon"></i>
            <p class="logout"><a href="<?= ROOT ?>/logout">Logout</a></p>
        </div> 
    
        <!-- navigation bar-->
        <?php include('../private/views/librarian/includes/nav.view.php'); ?>    
        
        <div class="bodyContainer01">
 

        <?php if($row):?>

        <img src="<?= ROOT ?>/uploads/<?=$row[0]->Image?>" alt="" srcset="" class="imageProfile" id="imageProfile">
        <!-- <img src="image/profile.jpg" alt="" class="imageProfile"> -->
        <div class="bookInfo"><label for="bookfomation" class="info">Book Info</label></div>
        
            <table id="bookInfoTable">
                
                    <tr >
                        <td id="titleBookInfo">Title</td>
                        <td id="valueBookInfo"><?= $row[0]->Title;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">ISBN</td>
                        <td id="valueBookInfo"><?= $row[0]->ISBN;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Author Name</td>
                        <td id="valueBookInfo"><?= get_authorName("AuthorID",$row[0]->AuthorID);?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Edition</td>
                        <td id="valueBookInfo"><?= $row[0]->Edition;?> Edition</td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Language</td>
                        <td id="valueBookInfo"><?= $row[0]->Language;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Publisher</td>
                        <td id="valueBookInfo"><?= $row[0]->Publisher;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Published Year</td>
                        <td id="valueBookInfo"><?= $row[0]->PublishedYear;?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">Category Name</td>
                        <td id="valueBookInfo"><?= get_CategoryName("CategoryID",$row[0]->Category);?></td>
                    </tr>
                    <tr >
                        <td id="titleBookInfo">No of Pages</td>
                        <td id="valueBookInfo"><?= $row[0]->NoPages;?></td>
                    </tr>
                

            </table>
            
                
            
            <div class="containerBookInfo"> <p class="ReservedListBookInfo">Reserved List</p> </div>
            
            
           
        </div>

       
        



        
        

        <button class="backbtnBookInfo"><a href="<?= ROOT ?>/books?page=1">Back</a></button>
       
       <?php endif;?>
                
    </div>
<?php include('../private/views/librarian/includes/footer.view.php'); ?>