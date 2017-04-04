<?php
  // Load the functions
  require_once('functions.php');

  // Create coffee array with prices (associative array)
  $flowerArr = array(
    'rose'=>1.25,
    'lily'=>4.25,
    'tulip'=>4.75,
    'orchid'=>4.75,
    'sunflower'=>4.75,
    'daisy'=>4.75,
    'daffodil'=>4.75
  );

  // Process the form request
  if( isset($_POST['submit']) )
  {
      $customer = htmlentities($_POST['customer']);
      $flowerType = htmlentities($_POST['flowerType']);
      $flowerType = strtolower($flowerType); // Lowercase form submission
      $numPots = htmlentities($_POST['numPots']);
      $flowers = buyFlowers($customer, $flowerArr, $numPots, $flowerType);
  } else {
    // User hasn't entered a value
    $flowerType = '';
    $flowers = '';
    $customer = '';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Buy Flowers</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body class="bg-faded">
    <main class="container py-4">
      <h1 class="pb-4 font-weight-bold text-center">What Flowers Will You Buy?</h1>

      <form class="form-inline justify-content-center" action="" method="post">

        <label for="customer" class="sr-only">Customer</label>

        <input class="form-control mr-2" type="text" value="<?php echo ( $customer ? $customer : '' );?>" placeholder="Name" name="customer" id="customer"> <span class="mr-2"> would like </span>


        <input class="form-control mr-2" type="numPots" value="<?php echo ( $numPots ? $numPots : '' );?>" placeholder="Quantity" name="numPots" id="numPots">

        <select class="custom-select mr-2" name="flowerType" id="flowerType">
          <?php echo '<option value="'.( $flowerType ? $flowerType : 'nothing' ).'">'.( $flowerType ? capfirst($flowerType) : 'Select a Flower' ).'</option>'; ?>
          <?php foreach ($flowerArr as $flower => $price) {
            echo '<option value="'.$flower.'">'.capfirst($flower).'</option>';
          }; ?>
        </select>
        <span class="mr-2">pot(s)</span>

        <button class="btn btn-outline-primary" name="submit" type="submit">Submit</button>
      </form>

      <?php
        if($flowers){
           echo $flowers;
        }
      ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
