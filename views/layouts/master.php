<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->renderLayout('head', $params) ?>
</head>

<body>
    
    {{contents}}

    <?= $this->renderLayout('script', $params) ?>

</body>

</html>