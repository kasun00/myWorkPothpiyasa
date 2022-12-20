
<?php include('../private/views/admin/includes/header.view.php'); ?>

<body>
<div class="header">
        <p class="operation">Event Log</p>
        <input type="text" class="searchbox">
        <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
        <p class="search">Search</p>
        <div class="notificationIconBack"></div>
        <i class="fa-solid fa-bell" id="notificationIcon"></i>
        <p class="logout"><a href="<?=ROOT?>/logout">Logout</a></p>
</div>

<!-- navigation bar -->

<?php include('../private/views/admin/includes/nav.view.php'); ?>


<!-- Footer     -->
<?php include('../private/views/admin/includes/footer.view.php'); ?>
