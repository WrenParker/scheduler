<?php
require './AdminController.php';
require './OrganizerController.php';
require './UserController.php';
require '../config/db.php';
require '../models/Event.php';

switch ($_REQUEST['action']) {

  case 'viewUser':
    UserController::showAllEvents();
    break;

  case 'share':
    UserController::shareEvent($_REQUEST['platform'], $_REQUEST['url'], $_REQUEST['id']);
    break;

  case 'bookmark':
    UserController::toggleBookmark($_POST['id']);
    break;

  case 'createEvent':
    AdminController::createEvent($_POST['id'], $_POST['name'], $_POST['description'], $_POST['location'], $_POST['start_time'], $_POST['duration'], $_POST['hosts']);
    break;

  case 'deleteEvent':
    AdminController::toggleEvent($_POST['event']);
    break;
  case 'viewAdmin':
    AdminController::viewAdmin();
    break;

  case 'viewOrganizer':
    OrganizerController::viewOrganizer();
    break;

  case 'restoreEvent':
    if($_POST['admin']==true)
      AdminController::toggleEvent($_POST['id']);
    else
      OrganizerController::toggleEvent($_POST['id']);
    break;

  case 'viewEvent':
    UserController::viewEvent($_GET['id']);
    break;

  // viewhome is default
  case 'viewHome':
  default:
    include '../views/Home.php';
    break;
}


 ?>
