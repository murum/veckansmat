<?php require_once 'unirest-php/lib/Unirest.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <h1>Veckans Mat</h1>
      <?php 
        $response = Unirest::get(
          "https://community-food2fork.p.mashape.com/search?key=072dab5f903386b74b70342f0d64c943",
          array(
            "X-Mashape-Authorization" => "8be3b7Mc8DOF47xIo3c1hZr5MInHeo9Z"
          ),
          null
        );
        $recipes = json_decode($response->raw_body)->recipes;
      ?>

      <ul class="recipes">
        <?php $counter = 0; ?>
        <?php foreach ($recipes as $recipe) : ?>
          <?php $counter++; ?>
          <?php if($counter <= 7): ?>
            <li>
              <a target="_blank" href="<?php echo $recipe->f2f_url; ?>">
                <h2>
                  <?php echo $recipe->title; ?>
                </h2>
              </a>
              <a target="_blank" href="<?php echo $recipe->f2f_url; ?>">
                <img src="<?php echo $recipe->image_url; ?>" alt="<?php echo $recipe->title; ?>">
              </a>
                <span class="rank">
                  <?php echo $recipe->social_rank; ?>
                </span>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  </body>
</html>