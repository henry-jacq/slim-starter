<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $this->title ?></title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
        line-height: 1.6;
    }

    header {
        background-color: #4CAF50;
        color: white;
        padding: 10px 0;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    header h1 {
        margin: 0;
        font-size: 2.5em;
    }

    .banner {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 0 20px;
    }

    h2 {
        text-align: center;
        color: #4CAF50;
        margin-bottom: 20px;
    }

    .features {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .feature {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .feature h3 {
        margin-top: 0;
    }

    .get-started-header {
        text-align: center;
        margin: 40px 0;
    }

    .get-started {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        text-align: center;
        margin: 40px 0;
    }

    .get-started a {
        text-decoration: none;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .get-started a:hover {
        background-color: #45a049;
    }
</style>