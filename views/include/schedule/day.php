<div class="row">
  <div class="col">
    <div class="row">
      <div class="col">
        <?php echo $day ?>
      </div>
    </div>
    <?php foreach (array_keys($events[$day]) as $time): ?>
      <?php include 'time.php'; ?>
    <?php endforeach; ?>
  </div>
</div>
