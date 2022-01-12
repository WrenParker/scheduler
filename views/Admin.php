<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <?php include 'include/header.php'; ?>
    <div class="container">
      <div class="row mb-2">
        <div class="col">
          <button id="create-button" onclick="this.innerHTML !== 'Hide' ? this.innerHTML = 'Hide' : this.innerHTML = 'Create Event'" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#create-form">
            Create Event
          </button>
        </div>
      </div>
      <div id="create-form" class="collapse row">
        <div class="col-8">
          <form class="" action="../controllers/routes.php?action=createEvent" method="post">
            <input type="hidden" id="event-id" name="id">
            <div class="form-group">
              <label for="event-name">Event Name</label>
              <input type="text" class="form-control" id="event-name" aria-describedby="event name" placeholder="Enter Event Name" name="name" required>
            </div>
            <div class="form-group">
              <label for="event-description">Event Description</label>
              <input type="text" class="form-control" id="event-description" placeholder="Enter Event Description" name="description" required>
            </div>
            <div class="form-group">
              <label for="event-location">Event Location</label>
              <input type="text" class="form-control" id="event-location" placeholder="Enter Event Location" name="location" required>
            </div>
            <div class="form-group">
              <label for="event-start">Start Time</label>
              <input type="datetime-local" class="form-control" id="event-start" name="start_time" required>
            </div>
            <div class="form-group">
              <label for="event-duration">Duration (Minutes)</label>
              <input type="number" class="form-control" id="event-duration" placeholder="Enter Event Duration" name="duration" required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col">
                  <label for="event-duration">Hosts</label>
                  <input type="hidden" class="form-control" id="host-array" name="hosts" required>
                </div>
              </div>
              <div class="row">
                <div class="col my-1" id="hosts">

                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button onclick="addHostField()" class="btn btn-primary" type="button" name="button">+ Add Host</button>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success mb-2">Submit Event</button>
            <button class="btn btn-outline-danger mb-2" onclick="clearEvent()">Clear Event</button>
          </form>
        </div>
      </div>

      <?php include 'include/schedule/full-schedule.php' ?>

      <?php include 'include/restore-events.php'; ?>
    </div>
    <?php include 'include/footer.php'; ?>
  </body>
</html>
