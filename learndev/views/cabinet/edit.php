<?php include ROOT.'/views/layouts/header.php';?>
<section>
    <div class="row no-gutters justify-content-center">
        <div class="col-sm-6">
           <?php if(!isset($_POST['submit'])):?>
            <form method="post">
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                <input type="password" class="form-control" name="password" value="<?php echo $password;?>">
                <input type="submit" name="submit" class="w-100" value="Редактировать">
            </form>
            <?php else:?>
                <h1>Данные отредактированы!</h1>
            <?php endif;?>
        </div>
    </div>
</section>
<?php include ROOT.'/views/layouts/footer.php';?>