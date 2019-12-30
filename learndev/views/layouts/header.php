<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site for learn JS">
        <meta name="author" content="Abubakr">
        <title><?php echo $title;?></title>
        <link href="/template/css/bootstrap.css" rel="stylesheet">
        <link href="/template/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->   
    </head><!--/head-->

<body>
   <header class="mb-5"> <!--HEADER BEGIN-->
        <div class="container">
       <div class="row no-gutters h-100 align-items-center justify-content-between border">
          
           <div id="logo" class="col-sm-1 text-center border"> <!-- LOGO  -->
                <div class="logo-img">
                    <a href="/"><img src="" alt="logo image" class="img-fluid"></a>
                </div>
           </div><!-- LOGO END -->
            <div id="menu" class="col-sm-5 text-center border"> <!-- MENU -->
                     <div class="menu-caption border"><a href="/news/">news</a></div>
                     <div class="menu-caption border"><a href="/lesson/">lessons</a></div>
                     <div class="menu-caption border"><a href="/game/">games</a></div>
                     <?php if(isset($_SESSION['status']) && $_SESSION['status']==1):?>
                         <div class="menu-caption border"><a href="/admin/">admin panel</a></div>
                     <?php endif;?>
                  
            </div><!-- MENU END -->
           <div id="sign" class="col-sm-1 text-center border"> <!-- SIGN IN&OUT -->
              <span class="sign-caption">sign</span>
              <?php if(isset($_SESSION['user'])):?>
               <div class="sign-out"><a href="/user/logout">sign out</a></div>
               <div class="user-info"><a href="/cabinet/"><?php if(isset($_SESSION['user']))echo $_SESSION['user_name'];?> info</a><input type="hidden" value="<?=$_SESSION['user']?>"></div>
               <?php else:?>
               <div class="sign-in"><a href="/user/login">sign in</a></div>
               <div class="sign-up"><a href="/user/register">sign up</a></div>
               <?php endif;?>
           </div><!-- SIGN IN&OUT END -->
       </div>
            
        </div>
    </header> <!--HEADER END-->