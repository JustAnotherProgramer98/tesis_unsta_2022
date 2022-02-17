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
  var province_id = $("#search_cities_by_province_id option:selected").val();
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
try {
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
    
} catch (error) {
console.log('Sin popOver button');
}

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

}
//Limit of input cuppons
function limiter_cuppons(input) {
if (input.value < 0) input.value = 1;
if (input.value > 100) input.value = 100;
}
function limiter_discount(input) {
 if (input.value < 1) input.value = 1;
 if (input.value > 100) input.value = 100;
}


//Change select color
function change_select_color() {
status_experiencia = $( "#status option:selected" ).text();
switch (status_experiencia) {
    case "Inactivo":
         $('#status').css('background-color', ' rgb(239 68 68)');
         $('#status').css('color', ' white');
        break;
    case "Activo":
         $('#status').css('background-color', ' rgb(34, 197, 94)');
         $('#status').css('color', ' white');
        break;
    case "Pendiente de aprobacion":
         $('#status').css('background-color', ' rgb(234, 179, 8)');
         $('#status').css('color', 'white');
        break;
    default:
        $('#status').css('background-color', ' white');
        break;
}
}

function show_password() {
var x = document.getElementById("password");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}

const slider = document.querySelector('.parent');
let mouseDown = false;
let startX, scrollLeft;

let startDragging = function (e) {
  mouseDown = true;
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
};
let stopDragging = function (event) {
  mouseDown = false;
};

slider.addEventListener('mousemove', (e) => {
  e.preventDefault();
  if(!mouseDown) { return; }
  const x = e.pageX - slider.offsetLeft;
  const scroll = x - startX;
  slider.scrollLeft = scrollLeft - scroll;
});

// Add the event listeners
slider.addEventListener('mousedown', startDragging, false);
slider.addEventListener('mouseup', stopDragging, false);
slider.addEventListener('mouseleave', stopDragging, false);
