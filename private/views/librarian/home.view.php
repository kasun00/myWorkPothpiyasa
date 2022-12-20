<?php include('../private/views/librarian/includes/header.view.php'); ?>

<body>
<div class="header">
        <p class="operation">Dashboard</p>
        <input type="text" class="searchbox">
        <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
        <p class="search">Search</p>
        <div class="notificationIconBack"></div>
        <i class="fa-solid fa-bell" id="notificationIcon"></i>
        <p class="logout"><a href="<?=ROOT?>/logout">Logout</a></p>
</div>

<!-- navigation bar -->

<?php include('../private/views/librarian/includes/nav.view.php'); ?>


<div class="dashContainer1">
      <h1 class="overallAnalytics">Overall Analytics</h1> 
      <div class="totalBook">
            <h3 class="totalBookLabel">Total Books</h3>
            <p class="totalBookValue">120</p>
      </div>
      <div class="totalMem">
            <h3 class="totalMemLabel">Total Members</h3>
            <p class="totalMemValue">200</p>
      </div>
      <div class="borowedBook">
            <h3 class="totalBBookLabel">Borrowed Books</h3>
            <p class="totalBValue">25</p>
      </div>
      <div class="damedgeBook">
            <h3 class="totalDLabel">Dameged Books</h3>
            <p class="totalDValue">100</p>
      </div>
</div>


<!-- Calendar -->
<?php include('../private/views/librarian/includes/calendar.view.php'); ?>

    
<?php include('../private/views/librarian/includes/footer.view.php'); ?>
