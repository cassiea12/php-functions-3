<?php

function titlecase($word) {
  $word = ucwords($word);
  return $word;
}

function capfirst($word) {
  $word = ucfirst($word);
  return $word;
}

function buyFlowers($customer, $flowerArr, $numPots, $flowerType) {
  if ($flowerType != 'nothing' && $numPots > 0) {
    $valid = true;
    $price = $flowerArr[$flowerType];
    $balance = $price * $numPots;
    if ($numPots < 2) {
      $title = titlecase($flowerType).' for '.$customer;
      $balance = 'Total: $'.number_format($balance, 2); //make the total go up by 2 decimal spaces (ex: $2.5 is now $2.50)
      $description = $customer.' ordered '.$numPots.' '.$flowerType.' pot.';
    } elseif ($numPots > 30) {
      $title = $numPots .' '.titlecase($flowerType).' pots for '.$customer.':';
      // $flowerType = 'rediculous';
      $description = ''.$customer.', please call (430) 432-2212 to complete your order of '.$numPots.' '.$flowerType.' pots!';
      $balance = 'Total: $'.number_format($balance, 2);
    } else {
      $title = titlecase($flowerType).' for '.$customer;
      $description = $customer.' ordered '.number_format($numPots).' '.$flowerType.' pots.';
      $balance = 'Total: $'.number_format($balance, 2);
    }
  } else {
    $valid = false;
  };

  if ($valid == true) {
    return('
      <div class="card my-4 mx-auto" style="width: 20rem;">
        <img class="img-fluid" src="images/'.$flowerType.'.jpg" alt="Card image cap">
        <div class="card-block">
          <h2 class="h4 card-title">'.$title.'</h2>
          <p class="card-text">'.$description.'</p>
          <p class="h5">'.$balance.'</p>
        </div>
      </div>
    ');
  } else {
    return('
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="m-0">Pick at least 1 flower pot!</p>
      </div>
    ');
  }
}
