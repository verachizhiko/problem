function i() {
 var social = document.getElementById("social");
 var selectSocial = social.options[social.selectedIndex].value;
 var isSocial = selectSocial == "Отклонена"
  var show = document.getElementById("show");
  show.style.display = isSocial ? 'inherit': 'none';
 
}