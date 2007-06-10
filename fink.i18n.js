/* $Id: fink.i18n.js,v 1.1 2007/06/10 09:18:10 babayoshihiko Exp $ */
// +--------------------------------------------------------------------------+
// | fink.i18n.js                                                             |
// +--------------------------------------------------------------------------+
// | Copyright (c)                                                            |
// +--------------------------------------------------------------------------+
// | License:  GNU/GPL - http:/www.gnu.org/copyleft/gpl.html                  |
// +--------------------------------------------------------------------------+
// | Used by all the PHP files at http:/www.finkproject.org                   |
// |    to produce the headers (incl HTML headers and top parts)              |
// |                                                                          |
// | usage:    1. read the comments                                           |
// |           2. include this file in <head> in HTML file                    |
// +--------------------------------------------------------------------------+
// | issues:                                                                  |
// |           1. too many! issues remain                                     |
// |                                                                          |
// +--------------------------------------------------------------------------+


function i18n_Init(form_id){
	//alert("test");
	var e = document.getElementById('i18n_form_' + form_id);		// form to show
	var f = document.getElementById('i18n_showform_' + form_id);	// [translate] to hide
	
	// Change the bgcolor of the text to be translated.
	f.parentNode.style.backgroundColor = "#ffc";
	f.parentNode.style.border ="2px solid #ccc";
	
	// Guesses the suitable window size for column width.
	var colwidth = (document.width - 80) / 9;
	colwidth = (colwidth > 40 ? colwidth : 40);
	
	e.getElementsByTagName('textarea')[0].cols = colwidth;
	
	// Unset style property to be visible.
	e.style.display = '';
	f.style.display = 'none';
}

function i18n_Close(form_id){
	//alert("test");
	var e = document.getElementById('i18n_form_' + form_id);		// form to hide
	var f = document.getElementById('i18n_showform_' + form_id);	// [translate] to show
	
	// Revert the bgcolor.
	f.parentNode.style.backgroundColor = "#fff";
	f.parentNode.style.border ="none";
	
	// Set style property to be invisible.
	e.style.display = 'none';
	f.style.display = '';
}
