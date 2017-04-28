<!DOCTYPE html>
<html>
<head lang='<?php echo language();?>'>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge,IE=10,IE=9,IE=8' />
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta property='og:site_name' content='JDWC'/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>JDWC</title>
    <link rel='stylesheet' media='screen' href='<?=cssUrl("css/main.css");?>' />
    <link rel="stylesheet" href="css/jquery.pagepiling.css">
    <script type='text/javascript' src='<?=jsUrl("js/vendor/jquery/jquery-1.11.3.min.js");?>' ></script>
    <script src="js/jquery.pagepiling.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?=imgUrl('/favicon.ico');?>" />

</head>
<body>
	<script type="text/javascript">var ROOT_URL = '<?php echo BASEURL;?>'; var LANG = '<?php echo language();?>'</script>
	<div class="siteWrapper">
    <header class="header">
        <span class="header__mobMenu"><img src="/images/menu-closed.png" alt="hamMenu"></span>
        <h1 class="header__logo">
            <a href="https://www.ubisoft.com/" target="_blank">
                <img src="/images/Ubisoft_logo.png" alt="ubisoft logo">
            </a>
        </h1>
        <h1 class="header__mobLogo"><img src="/images/mobileLogo.png" alt="mobileLogo"></h1>
        <div class="header__items">
            <div class="justDance-logo">
                <a href="https://just-dance.ubisoft.com" target="_blank">
                    <img src="/images/jd17-logo.png" alt="justdance Logo">
                </a>
            </div>
            <span class="stayInfo">
                <a href=''  onclick=window.open('https://uplayconnect.ubi.com/?lang=<?php echo language().'-'.strtoupper(language() == 'en' ? 'gb' : language()); ?>&appId=1f602a1c-c1d1-415c-bf96-f775fc86266d&genomeID=0d708e4a-eea2-4451-9acb-6ea63f376e6e&nextURL=http://www.justdanceworldcup.com/fr/thanks','uplayconnect','width=400,height=800,toolbar=no,status=no')>
                    <?php echo labels('stayTuned', language()); ?>
                </a>
            </span>
            <div class="langSwitcher">
                <div class="langSwitcher__current-wrap language__trigger">
                  <span class="langSwitcher__current"></span>
                  <span class="arrowDown">
                    <img src="/images/downArrow.png" alt="arrow">
                  </span>
                </div>
                <ul class="langSwitcher__links" id="language">
                    <li class="langSwitcher__link fr" data-country="fr"><img class="flag" src="/images/france.png" alt="france-flag"><?php echo labels('France', language()); ?></li>
                    <li class="langSwitcher__link ge" data-country="ge"><img class="flag" src="/images/germany.png" alt="germany-flag"><?php echo labels('Germany', language()); ?></li>
                    <li class="langSwitcher__link sp" data-country="es"><img class="flag" src="/images/spain.png" alt="spain-flag"><?php echo labels('Spain', language()); ?></li>
                    <li class="langSwitcher__link it" data-country="it"><img class="flag" src="/images/italy.png" alt="italy-flag"><?php echo labels('Italy', language()); ?></li>
                    <li class="langSwitcher__link uk" data-country="en"><img class="flag" src="/images/united-kingdom.png" alt="uk-flag"><?php echo labels('UK', language()); ?></li>
                </ul>
            </div>
        </div>

	</header>
