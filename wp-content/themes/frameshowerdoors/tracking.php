<!-- begin olark code -->
<script type="text/javascript" async>
    ;(function(o,l,a,r,k,y){if(o.olark)return;
        r="script";y=l.createElement(r);r=l.getElementsByTagName(r)[0];
        y.async=1;y.src="//"+a;r.parentNode.insertBefore(y,r);
        y=o.olark=function(){k.s.push(arguments);k.t.push(+new Date)};
        y.extend=function(i,j){y("extend",i,j)};
        y.identify=function(i){y("identify",k.i=i)};
        y.configure=function(i,j){y("configure",i,j);k.c[i]=j};
        k=y._={s:[],t:[+new Date],c:{},l:a};
    })(window,document,"static.olark.com/jsclient/loader.js");
    /* Add configuration calls below this comment */
    olark.identify('5877-824-10-9101');</script>
<!-- end olark code -->



<!--zoho tracking-->
<script type="text/javascript" 
src='https://crm.zoho.com/crm/javascript/zcga.js'> 
</script>



<!--BING tracking-->
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5667129"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=5667129&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>

<?php
// THIS CODE REMOVES PaRT OF THE NAV FOR FLORIDA
$dir = get_template_directory()."/class/geo_object.php";
require_once($dir);
$geo = new geo_object();
$isFL = $geo->isFL();
if($isFL){
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery("#menu-item-173, .menu-item-173").hide();
        });
    </script>
    <?php
}
?>