<head>
    <title>
        E-commerce
    </title>
</head>
<style>
    body {
        font-family: 'monospace', sans-serif;
        margin: 0;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        background-color: black;
        color: white;
    }

    header > a {
        cursor: pointer;
        color: white;
        text-decoration: none;
    }

    .product {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .product figure {
        width: 20vw;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product figure img {
        width: 100%;
    }

    .button {
        background-color: #396fd3;
        color: white;
        padding: 10px 0;
        margin-top: 10px;
        cursor: pointer;
        transition: 1s;
        outline: none;
        width: 100%;
        border: solid 1px #396fd3;
    }

    .button:hover {
        background-color: white;
        color: #396fd3;
        font-weight: bold;
    }

</style>
<body>

<header>
    <h1>
        E-commerce
    </h1>
    <a href="/basket">BASKET <span><?= $count ? $count : false ?></span></a>
</header>

<div class="product">

    <?php foreach ($products as $product): ?>
    <figure>
        <img src="<?= $product->pics ?>" alt="<?= $product->name ?>">
        <form method="post">
            @csrf
            <figcaption>
                <p><b>Name:</b> <?= $product->name ?> </p>
                <p><b>Description:</b> <?= $product->text ?> </p>
                <p><b>Price:</b> <?= $product->price ?> € </p>
                <label for="quantity">
                    Select your quantity
                </label>
                <br/>
                <input id="quantity" name="quantity" value="1" type="number"/>
                <input id="id" name="id" value="<?= $product->id ?>" style="display: none">
            </figcaption>
            <button class="button">
                ADD TO CART
            </button>
        </form>
    </figure>


    <?php  endforeach; ?>
</div>

</body>
