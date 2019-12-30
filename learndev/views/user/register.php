<?php include ROOT.'/views/layouts/header.php';?>

<section>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 padding-right">
           <?php if(isset($errors) && is_array($errors)):?>
               <ul>
                   <?php foreach($errors as $error):?>
                       <li>
                           <?php echo $error;?>
                       </li>
                   <?php endforeach;?>
               </ul>
           <?php endif;?>
            <div class="signup-form">
                <h2>Регистраци на сайте</h2>
                <form method="post">
                    <input type="text" name="name" placeholder="ИМЯ" value="<?php echo $name;?>">
                    <input type="text" name="login" placeholder="Login"value="<?php echo $login;?>">
                    <input type="password" name="password" placeholder="password"value="<?php echo $password;?>">
                    <input type="submit" name="submit" class="btn btn-secondary" value="Регистрация">
                </form>
            </div>
        </div>
    </div>
</div>            
</section>

<?php include ROOT.'/views/layouts/footer.php';?>
