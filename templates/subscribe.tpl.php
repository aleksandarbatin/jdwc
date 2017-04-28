<section class="section subscribe">
    <div class="section__container">
        <h2 class="subscribe__title"><?php echo labels('registerTitle', language()); ?></h2>
        <p class="subscribe__description">
            <?php echo labels('registerDesc', language()); ?>
        </p>
        <a href="" onclick=window.open('https://uplayconnect.ubi.com/?lang=<?php echo language().'-'.strtoupper(language() == 'en' ? 'gb' : language()); ?>&appId=1f602a1c-c1d1-415c-bf96-f775fc86266d&genomeID=0d708e4a-eea2-4451-9acb-6ea63f376e6e&nextURL=http://www.justdanceworldcup.com/fr/thanks','uplayconnect','width=400,height=800,toolbar=no,status=no') class="btn"><?php echo labels('register', language()); ?></a>
    </div>
</section>