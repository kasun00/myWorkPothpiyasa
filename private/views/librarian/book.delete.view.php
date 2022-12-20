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
    
    <?php 
        include('../private/views/includes/popup.delete2.view.php');?> 
        </div>

    <?php include('../private/views/librarian/includes/footer.view.php'); ?>

    <!-- set the popup msg -->
<?php if($flag[0]==1){
    echo '<script type="text/javascript">openPopup("'.ROOT.'/books?page=1");</script>';
}?>