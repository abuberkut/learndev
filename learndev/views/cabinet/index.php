<?php include ROOT.'/views/layouts/header.php';?>
<section>
    <div class="row no-gutters justify-content-center">
        <div class="col-sm-6">
            <ul>
                <li><?php echo "Привет, ".$_SESSION['user_name']."!";?></li>
                <li><a href="/cabinet/edit">Редактировать</a></li>
            </ul>
        </div>
    </div>
</section>
<?php include ROOT.'/views/layouts/footer.php';?>