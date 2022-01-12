<?php


class UserController
{

  // displays main user view in chronological order
  public static function showAllEvents()
  {
    $res = Event::getAllEvents();
    $events = Event::buildEventJsonByDay($res);
    $admin = false;

    include '../views/User.php';
  }

  // shows individual event details
  public static function viewEvent($eventId)
  {
    $event = Event::getSingleEventDetails($eventId);
    $timeStamp = strtotime($event->start);
    $date = date("F j, Y", $timeStamp);
    $time = date("g:i a", $timeStamp);
    $admin = false;

    include '../views/EventDetails.php';
  }

  // swaps state of bookmark and returns to user view
  public static function toggleBookmark($id)
  {
    Event::toggleAttribuite($id, 'bookmarked');

    header('Location: routes.php?action=viewUser');
  }

  // increments shares counter and redirects user to appropriate social media platform
  public function shareEvent($platform, $url, $id)
  {
    Event::incrementEventAttribute($id, 'shares');
    $event = Event::getSingleEventDetails($id);
    if($platform == 'email') {
      $link = 'mailto:?subject=' . urlencode($event->name . ' is coming up!') . '&body=' . urlencode('Wow, I sure am excited to attend ' . $event->name . ', check it out!');
      header('Location: ' . $link);
    } elseif ($platform == 'twitter') {
      $link = 'https://twitter.com/intent/tweet?url=' . $url . '&text=' . urlencode('Wow, I sure am excited to attend ' . $event->name . ', check it out!') . '&hashtags=eventscheduler,event';
      header('Location: ' . $link);
    } elseif ($platform == 'facebook') {
      $link = 'https://www.facebook.com/sharer.php?u=' . $url;
      header('Location: ' . $link );
    }

  }

}




 ?>
