<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $this->title ?></title>
<?php if (isDevMode()) : ?>
    <link rel="stylesheet" href="http://localhost:5173/resources/css/app.css">
<?php else : ?>
    <link rel="stylesheet" href="<?= get_app_css() ?>">
<?php endif; ?>