<?php include('../private/views/librarian/includes/header.view.php'); ?>

<body>
<div class="header">
        <p class="operation">View Authors</p>
        <input type="text" class="searchbox">
        <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
        <p class="search">Search</p>
        <div class="notificationIconBack"></div>
        <i class="fa-solid fa-bell" id="notificationIcon"></i>
        <p class="logout"><a href="<?=ROOT?>/logout">Logout</a></p>
</div>

<!-- navigation bar -->

<?php 
   include('../private/views/librarian/includes/nav.view.php');
 ?>

<!-- body -->

<div class="container_view">
                <?php if ($rows): ?>

                        
                <table class="user_table">

                        <tr>
                                <th>No</th>
                                <th>Author Name</th>
                                <th>Sex</th>
                                <th>Email</th>
                                <th>Added by</th>
                                <th>Operations</th>

                        </tr>
                        <?php 
                        $i=0;
                        foreach ($rows as $row): 

                                ?>
                        <tr>
                                <td><?= ++$i; ?></td>
                                <td><a href='<?= ROOT ?>/authors/viewOne/<?= $row->AuthorID ?>'><?= $row->Name ?></a></td>
                                <td><?= $row->Sex ?></td>
                                <td><?= $row->Email ?></td>
                                <!-- Getting staff member name when given id -->
                                <td><?= get_staff_name('StaffID', $row->AddStaffID) ?></td>


                                <td><button type='button' class='editbtn' id='editbtn'><i
                                                        class='fa-solid fa-pen'></i>&nbsp;<a class="a1"
                                                        href='<?= ROOT ?>/authors/edit/<?= $row->AuthorID ?>'>
                                                        Edit</a></button>
                                        <button type='button' class='deletebtn' id='deletebtn' disabled><i
                                                        class='fa-solid fa-trash'></i>&nbsp;<a
                                                        href='<?= ROOT ?>/authors/delete/<?= $row->AuthorID ?>'>
                                                        Delete</a></button>
                                </td>

                        </tr>

                        <?php endforeach; ?>
                </table>

                <?php else: ?>
                <h4>No users were found at this time</h4>
                <?php endif; ?>
        </div>
        <button class="backbtn"><a href="<?= ROOT ?>/librarian/home">Back</a></button>

 </div>


<?php include('../private/views/librarian/includes/footer.view.php'); ?>