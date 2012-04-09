<?php require_once '../../inc/header.php'; ?>
    <body class="inner blog" id="blog">
        <?php require_once '../../inc/nav.php'; ?>
        <section role="main">
            <div class="row">
                <div class="column grid_8">
                    
					<?php echo $post; ?>

                </div>
                <?php require_once '../../inc/bio.php'; ?>
            </div>
        </section>
<?php require_once '../../inc/footer.php'; ?>
