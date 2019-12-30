<?php include ROOT.'/views/layouts/header.php';?>

   
   <!--We've access to news and categories from News and Category-->
    <main class="page-wrapper mb-5"><!-- MAIN BEGIN -->
        <input id="clink" type="hidden" value="<?=$comment_link?>">
         <div class="container">
             <div class="row no-gutters justify-content-center">
                <div class="content col-sm-10 border"><div class="row no-gutters justify-content-center"><!-- CONTENT -->
                    <h1 class="news-title"><?php echo $news['title'];?></h1>
                    <p class="news-content"><?php echo $news['content'];?></p>
                    <a href="/news">News</a>                                             
                 </div></div><!-- CONTENT END --> 
                 <div class="w-100"></div>         
                <!-- COMMENTS -->
                   <?php if(isset($_SESSION['user'])):?>
                           <input id="userId" type="hidden" value="<?=$_SESSION['user']?>">
                            <div class="add-comment col-sm-10 border text-center">
                                    <div class="row no-gutters">
                                        <button id="addComBtn" type="button" class="btn btn-success">Add comment</button>
                                        <div class="comment-block d-none">
                                           <form id="comment_form" method="post">
                                            <textarea name="text" form="comment_form" id="comArea"></textarea>
                                            <input type="submit" id="postComBtn" class="btn btn-secondary" value="Add comment" onclick="return comments.add(this)">
                                            </form> 
                                        </div>    
                                    </div>
                            </div>
                    <?php endif;?>
                    <div class="w-100"></div>
                    <!-- All comments -->
                        <div class="row no-gutters justify-content-center">
                            <div id="comments" class="all-comments">
                             
                            </div>                            
                        </div>

                <!-- COMMENTS END -->
            </div>
         </div>
    </main> <!-- MAIN END -->   
<?php include ROOT.'/views/layouts/footer.php';?>