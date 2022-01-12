<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <?php include 'include/header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col mx-2">
          <h1>Top Events</h1>
        </div>
        <div class="col-1 mx-2 align-self-end text-right">
          <h5>clicks</h5>
        </div>
        <div class="col-1 mx-2 align-self-end text-right">
          <h5>shares</h5>
        </div>
      </div>
      <?php if (!empty($top)): ?>
        <div class="row">
          <div class="col">
            <?php foreach ($top as $event): ?>
              <a href="routes.php?action=viewEvent&id=<?php echo $event->id ?>">
                <div class="mt-1 mx-1 mb-0 p-2 event">
                  <div class="row mx-2 justify-content-between">
                    <div class="col mx-2">
                      <?php echo $event->name ?>
                    </div>
                    <div class="col-1 px-2 text-right">
                      <p><?php echo $event->clicks ?></p>
                    </div>
                    <div class="col-1 px-2 text-right">
                      <?php echo $event->shares ?>
                    </div>
                  </div>

                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

      <?php else: ?>
        <div class="mx-2">
          No Events Have Been Added!
        </div>
      <?php endif; ?>

      <?php include 'include/restore-events.php' ?>
    </div>
    <?php include 'include/footer.php'; ?>
  </body>
</html>
