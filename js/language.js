// Language
const enBtn = document.getElementById('selectEn')
const plBtn = document.getElementById('selectPl')
const langs = ['en', 'pl'];
let lang = localStorage.getItem('lang') || navigator.language.split('-')[0];

function setLang(lang) {
    setLangStyles(lang);
    localStorage.setItem('lang', lang);
}
enBtn.addEventListener("click", () =>{setLang('en')})
plBtn.addEventListener("click", () =>{setLang('pl')})

function setLangStyles(lang) {
  if (lang == 'pl')
  {
      plBtn.style.display = 'none'
      enBtn.style.display = 'block'
  }
  else
  {
      plBtn.style.display = 'block'
      enBtn.style.display = 'none'
  }

  let styles = langs
  .filter(function (l) {
    return l != lang;
  })
  .map(function (l) {
    return ':lang('+ l +') { display: none; }';
  })
  .join(' ') + ':lang('+ lang +') { display: block; }';
  setStyles(styles);
}
function setStyles(styles) {
    var elementId = '__lang_styles';
    var element = document.getElementById(elementId);
    if (element) {
      element.remove();
    }
  
    let style = document.createElement('style');
    style.id = elementId;
    style.type = 'text/css';
  
    if (style.styleSheet) {
      style.styleSheet.cssText = styles;
    } else {
      style.appendChild(document.createTextNode(styles));
    }
    document.getElementsByTagName('head')[0].appendChild(style);
}

setLangStyles(lang);