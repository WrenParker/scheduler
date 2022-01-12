<div class="row mt-3">
  <div class="col">
    <div class="row py-2">
      <div class="col-2 mr-1 pt-2 time-slot text-right">
        <?php echo $time ?>
      </div>
      <div class="col">
        <div class="row justify-content-left">
          <?php foreach ($events[$day][$time] as $event): ?>
            <?php include 'event.php'; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
