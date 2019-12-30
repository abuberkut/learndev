<?php 
require '../models/Comments.php';
require '../models/Admin.php';
$pdo = new Comments();

switch($_POST['req']){
    default: 
        echo "ERROR";
        break;
    case "show":
        $comments = $pdo->get($_POST['clink']);
        if(is_array($comments)){
        foreach($comments as $c){
            $userName = $pdo->userNameById($c['user_id']);
            ?>
    <div class="container">
        <div class="row no-gutters justify-content-center">
        <div class="col-sm-10">
            <input type="hidden" id="cid" value="<?=$c['id']?>">
            <h6><?=$c['date']?></h6>
            <h4><?=$userName?></h4>
            <p><?=$c['text'];?></p>
            <p>likes: <span><?=$c['like_count'];?></span> dislikes: <span><?=$c['dislike_count'];?></span>
            <?php if($_POST['userId']!=""&&$_POST['userId']==$c['user_id']){?>
                <span id="delete" class="btn btn-warning" onclick="return comments.delete(<?=$c['id']?>)">Delete</span>
                <span id="edit" class="btn btn-success" onclick="return comments.beforeEdit(this)">Edit</span>
            <?php;}?>
            </p>                                 
        </div>
        </div>
    </div>
       <?php;}}
        break;
    case "add":
        echo $pdo->add($_POST['clink'],$_POST['user_id'],$_POST['text'])?"OK":"ERR";
        break;
    case "del":
        echo $pdo->delete($_POST['id'])?"OK":"ERR";
        break;
    case "edit":
        echo $pdo->edit($_POST['text'],$_POST['id'])?"OK":"ERR";
        break;
    case "adminShow":
        $things = Admin::get($_POST['thing']);
        ?>
        <div class="container">
            <div class="row">
               <select id="<?=$_POST['thing'];?>">
                <?php
                    if($_POST['thing']=='user'){
                         foreach($things as $user){
                             ?>
                             <option value="<?=$user['id'];?>"><?=$user['name'];?></option>
                             <?php
                         }  
                    }else if($_POST['thing']=='news'){
                         foreach($things as $news){
                             ?>
                             <option value="<?=$news['id'];?>"><?=$news['title'];?></option>
                             <?php
                         }                          
                    }else if($_POST['thing']=='lesson'){
                         foreach($things as $lesson){
                             ?>
                             <option value="<?=$lesson['id'];?>"><?=$lesson['title'];?></option>
                             <?php
                         }                          
                    }else if($_POST['thing']=='game'){
                         foreach($things as $game){
                             ?>
                             <option value="<?=$game['id'];?>"><?=$game['title'];?></option>
                             <?php
                         }                          
                    }else if($_POST['thing']=='comment'){
                         foreach($things as $comment){
                             ?>
                             <option value="<?=$comment['id'];?>"><?=$comment['text'];?></option>
                             <?php
                         }                          
                    }else{
                         foreach($things as $question){
                             ?>
                             <option value="<?=$question['id'];?>"><?=$question['title'];?></option>
                             <?php
                         }                        
                    }
                
                ?>
                </select>
                <button id="delete" onclick="return things.delete(this.parentElement.children[0])">DELETE</button><button id="edit" onclick="return things.edit(<?=$_POST['thing']?>)">EDIT</button><button id="add" onclick="return things.add(this.parentElement.parentElement.parentElement)">ADD</button>
            </div>
        </div>
        
        <?php
        break;
    case "adminAdd":
        echo $_POST['thing']; 
        if($_POST['thing']=='question'){            
            echo Admin::addQuestion($_POST['title'],$_POST['text'],$_POST['answer'],$_POST['category'],$_POST['type'],$_POST['level'])?"OK":"ERR";
        }else if($_POST['thing']=='news'){
            echo Admin::addNews($_POST['title'],$_POST['category'],$_POST['content'],$_POST['short_content'])?"OK":"ERR"; 
        }else if($_POST['thing']=='lesson'||$_POST['thing']=='game'){
            echo Admin::addGL($_POST['thing'],$_POST['title'],$_POST['text'],$_POST['link'],$_POST['level'],$_POST['order'])?"OK":"ERR";
        }
        break;
    case "adminDel":
        echo Admin::delete($_POST['thing'],$_POST['id'])?"ok":"err";
        break;
    case "adminEditGet":
        echo json_encode(Admin::getSmthById($_POST['thing'],$_POST['id']));
        break;
    case "adminEdit":
        if($_POST['thing'] == 'news'){
           echo Admin::editNews($_POST['thing'],$_POST['title'],$_POST['text'],$_POST['short_text'],$_POST['category'],$_POST['id'])?"OK":"ERR";
        }else if($_POST['thing'] == 'lesson' || $_POST['thing'] == 'game'){
           echo Admin::editGL($_POST['thing'],$_POST['title'],$_POST['text'],$_POST['link'],$_POST['order'],$_POST['level'],$_POST['id'])?"OK":"ERR";
        }else if($_POST['thing'] == 'question'){
           echo Admin::editQuestion($_POST['thing'],$_POST['title'],$_POST['text'],$_POST['answer'],$_POST['category'],$_POST['type'],$_POST['level'],$_POST['id'])?"OK":"ERR";
        }
        break;
    
}
?>