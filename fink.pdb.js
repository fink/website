function list_unmaintained_packages(value) {
  if (value) {
    document.pdb_browser.elements.maintainer.value="None"
  }
  else {
    if (document.pdb_browser.elements.maintainer.value=="None") {
      document.pdb_browser.elements.maintainer.value=""
    }
  }
}

function set_list_nomaintainer(text) {
  if (text=="None") {
    document.pdb_browser.elements.nomaintainer.checked=true
  }
  else {
    document.pdb_browser.elements.nomaintainer.checked=false
  }
}

function switchMenu(obj, img) {
  var el = document.getElementById(obj);
  if (el.style.display != 'none') {
    el.style.display = 'none';
    document.getElementById(img).src = "../img/expand.png";
  }
  else {
    el.style.display = '';
    document.getElementById(img).src = "../img/collapse.png";
  }
}

