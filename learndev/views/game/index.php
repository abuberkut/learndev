<?php include ROOT.'/views/layouts/header.php';?>
<!--We've access to news and categories from News and Category-->
    <main class="page-wrapper mb-5"><!-- MAIN BEGIN -->
         <div class="container">
             <div class="row no-gutters justify-content-between ">
        <?php include ROOT.'/views/layouts/leftsidebar.php'?>
                <div class="content col-sm-6 border"><div class="row no-gutters"><!-- CONTENT -->
                        <ul class="game-collection">
                            <?php foreach($gamesList as $game):?>
                                <li class="game-item">
                                    <h1 class="game-title"><?php echo $game['title'];?></h1>
                                    <p class="game-text"><?php echo $game['text'];?></p>
                                    <a href="/game/<?php echo $game['id'];?>">See all</a>
                                </li>    
                            <?php endforeach;?>
                        </ul>                     
                 </div></div><!-- CONTENT END -->
        <?php include ROOT.'/views/layouts/rightsidebar.php'?>           
            </div>
         </div>
    </main> <!-- MAIN END -->   

<?php include ROOT.'/views/layouts/footer.php';?>