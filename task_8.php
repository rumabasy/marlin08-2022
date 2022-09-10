<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <?php $pers=[
                        [
                           'name'=>'Sunny A. ',
                           'profession'=>'(UI/UX Expert)',
                           'role'=>'Lead Author',
                           'twit'=>'myplaneticket',
                           'post'=>'myorange',
                           'post-title'=>'Contact Sunny',
                           'foto'=>'img/demo/authors/sunny.png',
                           'alt-foto'=>'Sunny A.',
                           'ban' => false
                        ],
                        [
                            'name'=>'Jos K. ',
                            'profession'=>'(ASP.NET Developer)',
                            'role'=>'Partner &amp; Contributor',
                            'twit'=>'atlantez',
                            'post'=>'Walapa',
                            'post-title'=>'Contact Jos',
                            'foto'=>'img/demo/authors/josh.png',
                            'alt-foto'=>'Jos K.',
                            'ban' => false
                         ],
                         [
                            'name'=>'Jovanni L. ',
                            'profession'=>'(PHP Developer)',
                            'role'=>'Partner &amp; Contributor',
                            'twit'=>'lodev09',
                            'post'=>'lodev09',
                            'post-title'=>'Contact Jovanni',
                            'foto'=>'img/demo/authors/jovanni.png',
                            'alt-foto'=>'Jovanni Lo',
                            'ban' => true
                         ],
                         [
                            'name'=>'Roberto R. ',
                            'profession'=>'(Rails Developer)',
                            'role'=>'Partner &amp; Contributor',
                            'twit'=>'sildur',
                            'post'=>'sildur',
                            'post-title'=>'Contact Roberto',
                            'foto'=>'img/demo/authors/roberto.png',
                            'alt-foto'=>'Jovanni Lo',
                            'ban' => true
                         ],
                        ];?>
                    <div class="panel-container show">
                        <div class="panel-content">
                           <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">
                            <?php foreach ($pers as $per): ?>
                                <div class="<?php echo $per['ban'] ? 'banned' : '' ?> rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">
                                        <img src="<?php echo $per['foto'] ?>" alt="<?php echo $per['alt-foto'] ?>" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">
                                        <div class="ml-2 mr-3">
                                            <h5 class="m-0">
                                                <?php echo $per['name'] ?><?php echo $per['profession'] ?>
                                                <small class="m-0 fw-300">
                                                    <?php echo $per['role'] ?>
                                                </small>
                                            </h5>
                                            <a href="https://twitter.com/@<?php echo $per['twit'] ?>" class="text-info fs-sm" target="_blank">@<?php echo $per['twit'] ?></a> -
                                            <a href="https://wrapbootstrap.com/user/<?php echo $per['post'] ?>" class="text-info fs-sm" target="_blank" title="<?php echo $per['post-title'] ?>"><i class="fal fa-envelope"></i></a>
                                        </div>
                                    </div>                                
                            <?php endforeach ?>                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
