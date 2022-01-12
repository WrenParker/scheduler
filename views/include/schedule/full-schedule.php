<?php
if(!isset($events) || empty($events)) {
  echo "No Events Have Been Added!";
}
else
  foreach (array_keys($events) as $day):
 ?>
  <?php include 'day.php'; ?>
<?php endforeach; ?>
