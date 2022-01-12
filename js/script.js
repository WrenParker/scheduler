

// Toggles the selected popup, clears the rest.
function togglePopup(e) {
  let popup = e.children[1];

  // popupStartedOn checks if the popup was already on before minimizeAll() happens
  let popupStartedOn = popup.style.display == 'block';
  minimizeAll();

  // popupStartedOn will make sure that if the same node is clicked twice, it will disappear.
  popup.style.display == 'block' || popupStartedOn ? popup.style.display = 'none' : popup.style.display = 'block';
}


// Hides all of the popup windows
function minimizeAll() {
  let popups = document.querySelectorAll(".pop-up");
  for(let i = 0; i< popups.length; i++) {
    popups[i].style.display = "none";
  }
}

// adds another input field for a host on the create form
function addHostField(value=null) {
  let hosts = document.getElementById('hosts');
  let newField = document.createElement('input');

  newField.class = 'form-control mt-2 event-host';
  newField.style = 'margin-bottom: 1em';
  newField.value = value;
  newField.onchange = function () {
    collectHosts()
  }

  hosts.appendChild(newField);
  hosts.appendChild(document.createElement('br'))
}

// removes all of the hosts from the create form
function clearHosts() {
  document.getElementById('hosts').innerHTML = "";
}

// adds all of the hosts of the input form as a comma delimted list on a single form
function collectHosts() {
  let children = document.getElementById('hosts').children;
  let hosts = [];
  for(let i=0; i< children.length; i++) {
    if(children[i].value !== undefined && children[i].value !== '') {
      hosts.push(children[i].value);
    }
  }
  document.getElementById('host-array').value = hosts;
}

// removes all events from create form
function clearEvent() {
  document.getElementById('event-id').value = '';
  document.getElementById('event-name').value = '';
  document.getElementById('event-description').value = '';
  document.getElementById('event-location').value = '';
  document.getElementById('event-start').value = '';
  document.getElementById('event-duration').value = '';
  clearHosts();
  collectHosts();
}

// puts all details from an event into the create form. Updates on submit.
function editEvent(event) {
  //attempt to toggle the text on the button and the form
  let createButton = document.getElementById('create-button');
  createButton.innerHTML = 'Hide';

  let createform = document.getElementById('create-form');
  createButton.class = 'collapse row show';


  // get rid of old data for good measure.
  clearEvent();

  document.getElementById('event-id').value = event.id;
  document.getElementById('event-name').value = event.name;
  document.getElementById('event-description').value = event.description;
  document.getElementById('event-location').value = event.location;

  //adjusting for Timeszone. ISO Time defaults to UTC, but the datetime selector doesn't account for that, get timezone offset and substract from UTC.
  let tmpTime = new Date(event.start)
  tmpTime.setHours(tmpTime.getHours()-tmpTime.getTimezoneOffset()/60);

  document.getElementById('event-start').value = tmpTime.toISOString().slice(0,16);
  document.getElementById('event-duration').value = event.duration

  for(let i=0; i<event.hosts.length; i++) {
    addHostField(event.hosts[i]);
  }
  //important if the hosts are not edited.
  collectHosts();
}
