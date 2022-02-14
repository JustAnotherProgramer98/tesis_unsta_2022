//Move between tabs
function openNewTab(evt, tab_name) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tab_name).style.display = "block";
  evt.currentTarget.className += " active";
}
//Move between tabs from my_profile_host
function showExperience(evt, tab_name,experience,image_url,experience_province,experience_city,experience_adress) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tab_name).style.display = "block";
  evt.currentTarget.className += " active";

  if(tab_name=='show_experience_detail'){

    if (image_url=="Sin imagenes") document.getElementById("experience_image").alt='Experiencia sin imagen';  
    
    document.getElementById("experience_image").src=image_url;
    document.getElementById('experience_title').innerHTML = experience.title;
    document.getElementById('experience_subtitle').innerHTML = experience.subtitle;
    document.getElementById('experience_description').innerHTML = experience.description;

    document.getElementById('experience_province').innerHTML = experience_province;
    document.getElementById('experience_city').innerHTML = experience_city;
    document.getElementById('experience_addres').innerHTML = experience_adress;
  }
}

//Search cities by Province_id
function searchByProvincia(url) {
  var province_id = $("#search_cities_by_province_id").val();
  $.ajax({
      url:url,
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
              "content"
          ),
      },
      type: 'POST',
      data: {
          province_id: province_id
      },

      success: (result) => {
          $("#city_name").replaceWith(result);
      },
      failure: (result) => alert(msg_error),
  }); //fin Ajax 
}
//PopOver
const button = document.querySelector('#button-popover');
const tooltip = document.querySelector('#tooltip');
var button_2 = document.querySelector('#button-popover_2');

const popperInstance = Popper.createPopper(button, tooltip, {
modifiers: [
  {
    name: 'offset',
    options: {
      offset: [0, 8],
    },
  },
],
});

function show() {
// Make the tooltip visible
tooltip.setAttribute('data-show', '');

// Enable the event listeners
popperInstance.setOptions((options) => ({
  ...options,
  modifiers: [
    ...options.modifiers,
    { name: 'eventListeners', enabled: true },
  ],
}));

// Update its position
popperInstance.update();
}

function hide() {
// Hide the tooltip
tooltip.removeAttribute('data-show');

// Disable the event listeners
popperInstance.setOptions((options) => ({
  ...options,
  modifiers: [
    ...options.modifiers,
    { name: 'eventListeners', enabled: false },
  ],
}));
}

const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];

try {
showEvents.forEach((event) => {
  button.addEventListener(event, show);  
});

hideEvents.forEach((event) => {
  button.addEventListener(event, hide);
});  
} catch (error) {
console.log(error);

}