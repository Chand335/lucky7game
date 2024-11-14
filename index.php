<?php

$input = $_POST;
print_r($input);
// $input = 3;
print_r($_SESSION['balance']);
if(!isset($_SESSION['balance']))
{
  $_SESSION['balance'] = 100;
}

echo $_SESSION['balance'];

function PlayLuckySevenGame($input)
{
  $_SESSION['balance'] -= 10;
  $dice1 = rand(1, 6);
  $dice2 = rand(1, 6);
  $score = $dice1 + $dice2;
  echo "Game Results <br/>";
  echo "dice 1 :" . $dice1 . "<br/>";
  echo "dice 2 :" . $dice2 . "<br/>";
  echo "Total :" . $score . "<br/>";
  if ($input === 3 && $score === 7) {
    $_SESSION['balance'] += 30;
    echo "Congratulation you win your balance is " . $_SESSION['balance'] . "Rs" . "<br/>";
  } elseif ($input === 1 && $score < 7) {
    $_SESSION['balance'] += 20;
    echo "Congratulation you win your balance is " . $_SESSION['balance'] . "Rs" . "<br/>";
  } elseif ($input === 2 && $score > 7) {
    $_SESSION['balance'] += 20;
    echo "Congratulation you win your balance is " . $_SESSION['balance'] . "Rs" . "<br/>";
  } else {
    echo "You Lose your balance is " . $_SESSION['balance'] . "Rs" . "<br/>";
  }
}


// 1 < below 7
// 2 > above 7
// 3 = equal 7

?>
<html>

<head></head>

<body>
  <h1>Welcome to Lucky & Game.</h1>
  <form action="index.php" method="post">
    <label>Place Your bet (Rs 10):</label>
    <div>
      <label>Below 7</label>
      <input type="radio" name="option" value="20">
    </div>
    <div>
      <label>Will be 7</label>
      <input type="radio" name="option" value="30">
    </div>
    <div>
      <label>Above 7</label>
      <input type="radio" name="option" value="20">
    </div>
    <button type="submit" value="20">Submit</button>
  </form>
  <?php
  if($input["option"])
  {
    PlayLuckySevenGame($input["option"], $_SESSION['balance']);
  }
  ?>
</body>

</html>
