<?php include('../private/views/librarian/includes/header.view.php'); ?>


    <body>
        <div class="header">
            <p class="operation">View Book</p>
            <input type="text" class="searchbox">
            <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
            <p class="search">Search</p>
            <div class="notificationIconBack"></div>
            <i class="fa-solid fa-bell" id="notificationIcon"></i>
            <p class="logout"><a href="<?= ROOT ?>/logout">Logout</a></p>
        </div>
    
        <!-- navigation bar -->
    
        <?php include('../private/views/librarian/includes/nav.view.php'); ?>
        <!-- <select name="filterViewBook" id="filterViewBook">
            <option value="">--- Choose Type ---</option>
            <option value="">Title</option>
            <option value="">ISBN</option>
            <option value="">Edition</option>
            <option  value="">Language</option>
            <option  value="Publisher">Publisher</option>
            <option  value="PublishedYear">PublishedYear</option>
        </select>
        <input type="text" class="filterViewBookInput" id="filterViewBookInput">
        <button></button> -->
        <!-- body -->
        <div class="bodyContainer01ViewBook">
        <?php include('../private/views/includes/popup.delete1.view.php');?>
        <?php include('../private/views/includes/popup.delete2.view.php');?>
            <?php 
                $book = new Book();
                $data = $book->findAll();

                

                $currentPage =1 ;
                $disableItem='';
                $disableItem1='';
                $disableItem2='';

                if(isset($_GET['page'])){
                    $page1 = $_GET['page'];
                }
                else{
                    $page1 = 1;
                }

                $start = ($page1-1)*7;

                $totalRows = count($data);
                $rowsPerPage = 7;
                $pages = $totalRows/$rowsPerPage;
                $pages = ceil($pages);

                $data2 = $book->findLimit($start,$rowsPerPage);

                $table = "<table id='viewBook'>";
                $table.= '<tr class="heding"><th>Book ID</th><th>Book Tital</th><th>ISBN</th><th>Book Edition</th><th>Number of Pages</th><th>Language</th><th>Publish Year</th><th>Publisher</th><th>Image</th><th>Received Date</th><th>Staff Name</th><th>Vendor Name</th><th>Donor Name</th><th>Author Name</th><th>Add Date</th><th>Rack ID</th><th>Category</th><th>Actions</th>';
                
                for ($i=0; $i < count($data2); $i++) { 
                    $table .="<tr><td>{$data2[$i]->BookID}</td>";
                    $table .="<td><a href='".ROOT."/books/viewSpecific/".$data2[$i]->BookID."' class='bookTitleTable'>{$data2[$i]->Title}</td>";
                    $table .="<td>{$data2[$i]->ISBN}</td>";
                    $table .="<td>{$data2[$i]->Edition}</td>";
                    $table .="<td>{$data2[$i]->NoPages}</td>";
                    $table .="<td>{$data2[$i]->Language}</td>";
                    $table .="<td>{$data2[$i]->PublishedYear}</td>";
                    $table .="<td>{$data2[$i]->Publisher}</td>";
                    $table .="<td>{$data2[$i]->Image}</td>";
                    $table .="<td>{$data2[$i]->ReceivedDate}</td>";
                    $table .="<td>".get_StaffName("StaffID",$data2[$i]->AddStaffID)."</td>";
                    $table .="<td>".get_VendorName("VendorID",$data2[$i]->VendorID)."</td>";
                    $table .="<td>".get_DonorName("DonorID",$data2[$i]->DonorID)."</td>";
                    $table .="<td>".get_authorName("AuthorID",$data2[$i]->AuthorID)."</td>";
                    $table .="<td>{$data2[$i]->AddDate}</td>";
                    $table .="<td>{$data2[$i]->RackID}</td>";
                    $table .="<td>".get_categoryName("CategoryID",$data2[$i]->Category)."</td>";
                    $table.="<td><button type='button' class='editbtn' id='editbtn'><i class='fa-solid fa-pen'></i>&nbsp;<a href='".ROOT."/books/edit/".$data2[$i]->BookID."'> Edit</a></button> <button type='button' class='deletebtn' id='deletebtn' onclick='openDeletePopup({$data2[$i]->BookID})'><i class='fa-solid fa-trash'></i>&nbsp;Delete</button></tr> ";
                }
                $table .= '</table>';
                echo $table;
                // <a href='".ROOT."/books/deletePreview/".$data2[$i]->BookID."'>
                $currentPage = $_GET['page'];
                $previous = $currentPage-1;

                if($pages==1){
                    $disableItem1 = 'previous';
                    $disableItem2 = 'next';
                    $next =1;
                    $previous =1;
                    
                  }else{
                    if($currentPage-1>0){
                        $previous = $currentPage-1;
                      }
                      else if($currentPage==1 && $currentPage-1<=1){
                        $previous = $currentPage;
                        $disableItem = 'previous';
                      }
                       if($pages>=$currentPage+1){
                        $next = $currentPage + 1;
                      }
                      else if($currentPage==$pages && $currentPage+1>=$pages){
                        $next = $currentPage;
                        $disableItem = 'next';
                      }
                  }

                $table1 = "<table class='pagination'>";
                $table1 .="<tr class='paginationTr'>";

                $table1 .= "<th class='pagingheader'><a  href='".ROOT."/books/viewBook.php?page=$previous&pages=$pages' style='text-decoration:none;color:blue;font-size:20px'><i id='previous' class='fa-solid fa-angles-left'></i></a></th>";
                for($i=1; $i<=$pages;$i++){
                    if($i == $currentPage){
                        $table1 .="<th class='pagingheader' id='activeItem'><a id='activeA'  href='".ROOT."/books/viewBook.php?page=$i&pages=$pages' style='text-decoration:none;color:blue;' >$i</a></th>";
                    }
                    else{
                        $table1 .="<th class='pagingheader' ><a href='".ROOT."/books/viewBook.php?page=$i&pages=$pages' style='text-decoration:none;color:blue;' >$i</a></th>";
                    }
                    
                }
                $table1 .= "<th  class='pagingheader'><a href='".ROOT."/books/viewBook.php?page=$next&pages=$pages' style='text-decoration:none;color:blue;font-size:20px'><i class='fa-solid fa-angles-right'id='next'></i></a></th>";
                
                $table1 .= "</tr>";
                $table1 .= "</table>";

                echo $table1;
            ?>
            
        <?php include('../private/views/includes/popup.delete1.view.php'); ?>

        </div>
<?php include('../private/views/librarian/includes/footer.view.php'); ?>

