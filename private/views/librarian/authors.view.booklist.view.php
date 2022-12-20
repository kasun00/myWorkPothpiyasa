
<div class="container">
    <?php
    
      $rows = viewbooksforauthor($authorID) ;
    
    
    ?>
    <?php if ($rows): 
                    
                            
                    foreach ($rows as $row): 
                        $row->Title; 
            
            
                    endforeach; ?>
                        
            <?php else: ?>
                    <h4>No users were found at this time</h4>
            <?php endif; ?>
</div>

