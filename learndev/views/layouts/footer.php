    <footer><!--FOOTER BEGIN-->
    <div class="container">
        <div class="row no-gutters justify-content-between align-items-center border">
            <div class="col-sm-2 text-center border" id="copyright"><div class="info">
                <p>Copyright &copy; Abubakr</p>
            </div></div><!--Copyright-->
            <div id="menu" class="col-sm-5 text-center border"> <!-- MENU -->
                     <div class="menu-caption border"><a href="/news/">news</a></div>
                     <div class="menu-caption border"><a href="/lesson/">lessons</a></div>
                     <div class="menu-caption border"><a href="/game/">games</a></div>
                     <?php if(isset($_SESSION['status']) && $_SESSION['status']==1):?>
                         <div class="menu-caption border"><a href="/admin/">admin panel</a></div>
                     <?php endif;?>                  
            </div><!-- MENU END -->
            <div class="col-sm-2 border text-center" id="statistics"><div class="info">
                <p>Statistics</p>
            </div></div><!--Statistics-->
        </div>
    </div>
    </footer><!--FOOTER END-->
    
    
<!--
 js scripts 
<script src="/template/js/jquery-3.4.1.min.js"></script>
<script src="/template/js/popper.min.js"></script>
<script src="/template/js/bootstrap.js"></script>
-->
<script src="/template/js/main.js"></script>
<!--
<script>
    $('.toggle-btn').button('dispose');
    $('#myAlert').on('closed.bs.alert',function(){
       console.log("closed"); 
    });
</script>
-->
</body>

</html>