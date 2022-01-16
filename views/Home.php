<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <?php include 'include/header.php'; ?>
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <h1>Event Scheduler</h1>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2>Local Set Up</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <ul>
            <li>Clone project to apache document root (htdocs on xampp)</li>
            <li>Import DDL script found in /sql/CREATE_EVENTS.sql into MySQL via CLI or phpmyadmin</li>
            <li>Edit credentials and database info in /config/db.php to match local database instance</li>
            <li>Note: Developed for php 7.3</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2>Development Process</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p>This project was built using a LAMP stack and the MVC architectural pattern. A constraint I put on myself was to use minimal frameworks outside of the languages themselves. I opted to use Bootstrap 4 and Font Awesome for rapid UI development, but everything else was done from scratch.</p>
          <p>Languages used: PHP, HTML, CSS, Javascript, MySQL</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2>Additional Info</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p>This project was created as a submission for the <a href="https://www.eventeny.com/" target="_blank">Eventeny</a> Product Software Engineer application process in January 2022.</p>
        </div>
      </div>
    </div>
    <?php include 'include/footer.php'; ?>
  </body>
</html>
