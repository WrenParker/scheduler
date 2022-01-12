<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <?php include 'include/header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <h3><?php echo $event->name ?></h3>
          <?php if ($event->hosts[0]!==''): ?>
            <p><i>Hosted by:
              <?php for ($i=0; $i<count($event->hosts); $i++): ?>
                 <?php
                  echo $event->hosts[$i];
                  echo (count($event->hosts) !== $i+1) ? "," : "";
                 ?>
              <?php endfor; ?>
            </i></p>
          <?php endif; ?>
          <p><?php echo $event->description ?></p>
          <p>Location: <?php echo $event->location ?></p>
          <p>Date: <?php echo $date ?></p>
          <p>Start Time: <?php echo $time ?></p>
          <p>Duration <?php echo $event->duration . ($event->duration == '1' ? ' Minute' : ' Minutes') ?></p>
        </div>
      </div>
      Share: <a href="routes.php?action=share&url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>&platform=email&id=<?php echo $event->id ?>">Email</a>
             <a href="routes.php?action=share&url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>&platform=twitter&id=<?php echo $event->id ?>">Twitter</a>
             <a href="routes.php?action=share&url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>&platform=facebook&id=<?php echo $event->id ?>">Facebook</a>
    </div>
    <?php include 'include/footer.php'; ?>
  </body>
</html>
