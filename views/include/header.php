<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://kit.fontawesome.com/71e3851dff.js" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
</head>

<div class="container">
  <div class="row mt-5">
    <div class="col">
      <h1>Event Scheduler</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <a class="btn btn-primary m-1 <?php echo $_REQUEST['action'] == 'viewHome' ? "disabled": '' ?>" href="routes.php?action=viewHome">Home</a>
      <a class="btn btn-primary m-1 <?php echo $_REQUEST['action'] == 'viewUser' ? "disabled": '' ?>" href="routes.php?action=viewUser">View User Page</a>
      <a class="btn btn-primary m-1 <?php echo $_REQUEST['action'] == 'viewAdmin' ? "disabled": '' ?>" href="routes.php?action=viewAdmin">View Admin Page</a>
      <a class="btn btn-primary m-1 <?php echo $_REQUEST['action'] == 'viewOrganizer' ? "disabled": '' ?>" href="routes.php?action=viewOrganizer">View Organizer Page</a>
    </div>
  </div>
  <hr>
</div>
