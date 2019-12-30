<?php include ROOT.'/views/layouts/header.php';?>

<!--We've access to news and categories from News and Category-->
    <main class="page-wrapper mb-5"><!-- MAIN BEGIN -->
         <div class="container">
             <div class="row no-gutters justify-content-center">
                       <input id="clink" type="hidden" value="<?=$comment_link?>">

                <div class="content col-sm-10 border"><div class="row no-gutters justify-content-center"><!-- CONTENT -->
                    <h1 class="lesson-title w-100 text-center"><?php echo $lesson['title'];?></h1>
                    <p class="lesson-content w-100"><?php echo $lesson['text'];?></p>
                    <a href="/lesson">Lessons</a>                                             
                 </div></div><!-- CONTENT END -->
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