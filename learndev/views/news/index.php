<?php include ROOT.'/views/layouts/header.php';?>
<!--We've access to news and categories from News and Category-->
    <main class="page-wrapper mb-5"><!-- MAIN BEGIN -->
         <div class="container">
             <div class="row no-gutters justify-content-between ">
            <?php include ROOT.'/views/layouts/leftsidebar.php'?>
                <div class="content col-sm-6 border"><div class="row no-gutters"><!-- CONTENT -->
                        <ul class="news-collection">
                            <?php foreach($newsList as $news):?>
                                <li class="news-item">
                                    <h1 class="news-title"><?php echo $news['title'];?></h1>
                                    <p class="news-content"><?php echo $news['short_content'];?></p>
                                    <a href="/news/<?php echo $news['id'];?>">See all</a>
                                </li>    
                            <?php endforeach;?>
                        </ul>                     
                 </div></div><!-- CONTENT END -->
            <?php include ROOT.'/views/layouts/rightsidebar.php'?>           
            </div>

         </div>

    </main> <!-- MAIN END -->   

<?php include ROOT.'/views/layouts/footer.php';?>
