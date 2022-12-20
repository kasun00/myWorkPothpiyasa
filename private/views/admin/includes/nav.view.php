<div class="navigation">
    <img src="<?= ROOT ?>/img/logo.png" alt="" class="logo">
    <i class="fa-solid fa-bars" id="navIcon"></i>

    <div class="profile">
        <img src="<?= ROOT ?>/img/profile2.png" alt="" srcset="" class="profileImg" id="profileImg">
        <p class="profileName" id="profileName"><?=Auth::profileName()?> </p>
        <!-- <p class="profileID" id="profileID"></p> -->
    </div>

    <!-- dashbord -->

    <div class="navigationLabels">

        <div class="toggelBar" id="toggelBar"></div>

        <div class="dashbordIconBack" id="dashbordIconBack"></div>
        <i class="fa-solid fa-house-chimney" id="dashbordIcon"></i>
        <p class="dashbordLabel" id="dashbordLabel"><a href="<?= ROOT?>">Dashboard</a></p>



        <!-- account -->

        <div class="accountIconBack" id="accountIconBack"></div>
        <i class="fa-regular fa-id-card" id="accountIcon"></i>
        <p class="accountLabel" id="accountLabel"><a href="#">Account</a></p>
        <i class="fas fa-chevron-circle-right" id="toggleArrow1"></i>


        <!-- book -->

        <div class="bookIconBack" id="bookIconBack"></div>
        <i class="fa-solid fa-book" id="bookIcon"></i>
        <p class="bookLabel" id="bookLabel"><a href="#">Book</a></p>
        <i class="fas fa-chevron-circle-right" id="toggleArrow2"></i>

        
         <!-- Book Side Pannel -->
        
        <div class="booklist" id="booklist">
            <ul>
                <li class="addBook"><a href="#">Add Book</a></li>
                <li class="addBook"><a href="#">View Book</a></li>
            </ul>
            <!-- <p class="addBook">Add Book</p>
                    <p class="viewBook">View Book</p> -->
        </div>

        <!-- member -->

        <div class="memberIconBack" id="memberIconBack"></div>
        <i class="fa-solid fa-address-book" id="memberIcon"></i>
        <p class="memberLabel" id="memberLabel"><a href="#">Member</a></p>
        <i class="fas fa-chevron-circle-right" id="toggleArrow3"></i>


        <!-- Member Side Pannel -->

        <div class="memberlist" id="memberlist">
            <ul>
                <!-- Here gives path to the controller, from controller partcular view call -->
                <li class="addmember"><a href="<?= ROOT?>/users/add">Add Member</a></li>
                <li class="addmember"><a href="<?= ROOT?>/users/viewusers">View Member</a></li>
            </ul>
            <!-- <p class="addBook">Add Book</p>
                    <p class="viewBook">View Book</p> -->
        </div>
      

        <!-- circulation -->

        <div class="circulationIconBack" id="circulationIconBack"></div>
        <i class="fa-sharp fa-solid fa-paste" id="circulationIcon"></i>
        <p class="circulationLabel" id="circulationLabel"><a href="#">Circulation</a></p>
        <i class="fas fa-chevron-circle-right" id="toggleArrow4"></i>



        <!-- Book Category -->

        <div class="bookCategoryIconBack" id="bookCategoryIconBack"></div>
        <i class="fa-sharp fa-solid fa-swatchbook" id="bookCategoryIcon"></i>
        <p class="bookCategoryLabel" id="bookCategoryLabel"><a href="#">Book Category</a></p>
        <i class="fas fa-chevron-circle-right" id="toggleArrow5"></i>


        <!-- inventory -->

        <div class="inventoryIconBack" id="inventoryIconBack"></div>
        <i class="fa-sharp fa-solid fa-warehouse" id="inventoryIcon"></i>
        <p class="inventoryLabel" id="inventoryLabel"><a href="#">Inventory</a></p>
        <i class="fas fa-chevron-circle-right" id="toggleArrow6"></i>


        <!-- author -->

        <div class="authorIconBack" id="authorIconBack"></div>
        <i class="fa-solid fa-user-tie" id="authorIcon"></i>
        <p class="authorLabel" id="authorLabel"><a href="#">Author</a></p>
        <i class="fas fa-chevron-circle-right" id="toggleArrow7"></i>


        <!-- admin task -->

        <div class="adminTaskIconBack" id="adminTaskIconBack"></div>
        <i class="fa-solid fa-clipboard-list" id="adminTaskIcon"></i>
        <i class="fas fa-chevron-circle-right" id="toggleArrow8"></i>
        <p class="adminTaskLabel" id="adminTaskLabel"><a href="#">Admin Tasks</a></p>

        <div class="adminlist" id="adminlist">
            <ul>
                <li class="getReports"><a href="#">Get Reports</a></li>
                <li class="getReports"><a href="<?= ROOT?>/holidays">Add Holidays</a></li>
                <li class="getReports"><a href="<?= ROOT?>/eventlog">Event Log</a></li>
                <li class="getReports"><a href="#">Config Settings</a></li>
                <li class="getReports"><a href="#">Backups</a></li>
            </ul>
            <!-- <p class="addBook">Add Book</p>
                    <p class="viewBook">View Book</p> -->
        </div>

        
    </div>
</div>