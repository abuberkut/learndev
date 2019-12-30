<?php include ROOT.'/views/layouts/header.php';?>
<!--We've access to news and categories from News and Category-->
    <main class="page-wrapper mb-5"><!-- MAIN BEGIN -->
         <div class="container">
             <div class="row no-gutters justify-content-between ">
        <?php include ROOT.'/views/layouts/leftsidebar.php'?>
                <div class="content col-sm-6 border"><div class="row no-gutters"><!-- CONTENT -->
                        <ul class="lesson-collection">
                            <?php foreach($lessonsList as $lesson):?>
                                <li class="lesson-item">
                                    <h1 class="lesson-title"><?php echo $lesson['title'];?></h1>
                                    <p class="lesson-text"><?php echo $lesson['text'];?></p>
                                    <a href="/lesson/<?php echo $lesson['id'];?>">See all</a>
                                </li>    
                            <?php endforeach;?>
                        </ul>                     
                 </div></div><!-- CONTENT END -->
        <?php include ROOT.'/views/layouts/rightsidebar.php'?>           
            </div>
         </div>
    </main> <!-- MAIN END -->   

<?php include ROOT.'/views/layouts/footer.php';?>