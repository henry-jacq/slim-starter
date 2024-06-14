<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->renderLayout('head', $params) ?>
</head>

<body class="font-sans bg-gray-100 text-gray-800 leading-relaxed m-0 p-0">

    {{contents}}

    <?= $this->renderLayout('script', $params) ?>

</body>

</html>