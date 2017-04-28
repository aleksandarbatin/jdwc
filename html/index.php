<?php
if (file_exists('../config.php') === false) die('Please configure site (config.php.dist => config.php)');
require_once('../config.php');
//var for url error
$errors = urlErrors();

require_once(TPL_PATH . 'header.tpl.php');

?>

<div class="sectionWrapper" id="pagepiling">

<?php
    //if no url errors and page is not thanks
    if(!$errors['langError'] && $errors['tnx'] == 'notTnx'){

        require_once(TPL_PATH . 'content.tpl.php');
        require_once(TPL_PATH . 'ambassador.tpl.php');
        require_once(TPL_PATH . 'subscribe.tpl.php');
    //if no language errors and page is thanks
    }elseif(!$errors['langError'] && $errors['tnx'] == 'tnx'){

        require_once(TPL_PATH . 'thanks.tpl.php');
    //errors on laguage part or 2nd url param
    }else{

        require_once(TPL_PATH . 'error.tpl.php');

    }
?>

</div>
<!-- FOOTER -->
<?php require_once(TPL_PATH . 'footer.tpl.php'); ?>
