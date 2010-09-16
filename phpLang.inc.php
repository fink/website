<?php
// +--------------------------------------------------------------------------+
// | phpLang modified for Fink website (fink.sourceforge.net)                 |
// | based on phpLang version 0.5.0 - 2002/02/23                              |
// +--------------------------------------------------------------------------+
// | Copyright (c) 2000-2001 The phpHeaven-team                               |
// +--------------------------------------------------------------------------+
// | License:  GNU/GPL - http://www.gnu.org/copyleft/gpl.html                 |
// +--------------------------------------------------------------------------+
// | It is a simple script that enables you to simply have different          |
// | languages on you web site.                                               |
// |                                                                          |
// | usage:    read attached documentation                                    |
// +--------------------------------------------------------------------------+
// | Last release available on phpHeaven:                                     |
// |    http://www.phpheaven.net/projects/phpLang/                            |
// |                                                                          |
// | Authors:  Nicolas Hoizey <nhoizey@phpheaven.net>                         |
// |           Loïã Chapeaux <lolo@phpheaven.net>                             |
// +--------------------------------------------------------------------------+

// path to image files
if(!defined('phpLang_images'))
	define('phpLang_images', 'flags/');

// path to translated files
if(!defined('phpLang_localDir'))
	define('phpLang_localDir', './');

// name of a translation file that will always be included if it exists
if(!defined('phpLang_globalFile'))
	define('phpLang_globalFile', getenv('REDIRECT_HOMEDIR').'localization/global.php');

// parameter to add in url
if(!defined('phpLang_urlParam'))
	define('phpLang_urlParam', 'phpLang');

// indicates if it should put a cookie
if(!defined('phpLang_useCookie'))
	define('phpLang_useCookie', true);

// how are named the xx-localized version of file 'toto.php' ?
// 1 -> current_dir/toto.php.xx
// 2 -> current_dir/toto.xx.php
// 3 -> current_dir/xx.toto.php
// 4 -> current_dir/xx/toto.php (in a directory for each language)
if(!defined('phpLang_fileNameType'))
	define('phpLang_fileNameType', 2);

// list of available languages, order it as you need
$phpLang_languages = array(
	"en([-_][[:alpha:]]{2})?|english"		=>	array('en', 'english', 'English'),
	
	"fr([-_][[:alpha:]]{2})?|french"		=>	array('fr', 'french', 'Fran&ccedil;ais'),
	
	"cs|czech"					=>	array('cs', 'czech', ''),
	
	"da|danish"					=>	array('da', 'danish', 'Dansk'),
	
	"nl([-_][[:alpha:]]{2})?|dutch"			=>	array('nl', 'dutch', 'Nederlands'),
	
	"de([-_][[:alpha:]]{2})?|german"		=>	array('de', 'german', 'Deutsch'),
	
	"fi|finnish"					=>	array('fi', 'finnish', ''),
	
	"is|icelandic"					=>	array('is', 'icelandic', ''),
	
	"it|italian"					=>	array('it', 'italian', 'Italiano'),
	
	"ja|japanese"					=>	array('ja', 'japanese', '&#26085;&#26412;&#35486; (Nihongo)'),
	
	"no|norwegian"					=>	array('no', 'norwegian', ''),
	
	"sv([-_][[:alpha:]]{2})?|swedish"		=>	array('sv', 'swedish', 'svensk'),
	
	"pl|polish"					=>	array('pl', 'polish', 'Polski'),
	
	"ru|russian"					=>	array('ru', 'russian', '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081; (Russkiy)'),
	
	"sk|slovak"					=>	array('sk', 'slovak', ''),
	
	"es([-_][[:alpha:]]{2})?|spanish"		=>	array('es', 'spanish', 'Espa&ntilde;ol'),
	
	"th|thai"					=>	array('th', 'thai', ''),
	
	"pt[-_]br"					=>	array('pt-br', 'brazilian portuguese'),
	
	"pt([-_][[:alpha:]]{2})?|portuguese"		=>	array('pt', 'portuguese', 'Portugu&ecirc;s'),
	
	"uk([-_][[:alpha:]]{2})?|ukrainian"		=>	array('ua', 'ukrainian', ''),
	
	"ko([-_][[:alpha:]]{2})?|korean"		=>	array('ko', 'korean', ''),
	
	"he|hebrew"					=>	array('he', 'hebrew', ''),
	
	"ar([-_][[:alpha:]]{2})?|arabic"		=>	array('ar', 'arabic', ''),
	
	"zh[-_]tw"					=>	array('zh-tw', 'chinese_traditional', ''),
	
	"zh([-_][[:alpha:]]{2})?|chinese"		=>	array('zh', 'chinese_simplified', '&#20013;&#25991; (&#31616;) (Simplified Chinese)')
);

// Disable languages. e.g. $GLOBALS['phpLang_disabledLanguages'] = 'de ja' before calling phpLang.
if (isset($GLOBALS['phpLang_disabledLanguages'])) {
	$disLangs = explode(' ', $GLOBALS['phpLang_disabledLanguages']);
	foreach ($GLOBALS['phpLang_languages'] as $langKey => $langArray) { 
		foreach ($disLangs as $disLang) {
			if ($langArray[0] == $disLang) unset ($phpLang_languages[$langKey]);
		}
	}
}

// finds current file name, extension and uri
if (!isset($SCRIPT_NAME)) $SCRIPT_NAME = getenv('SCRIPT_NAME');
if(preg_match("|([^/?]+)(\?.*)?$|", $SCRIPT_NAME, $regs)) {
	define('phpLang_currentFile', $regs[1]);
	if(preg_match("|(.*)(\.[^.]+)$|", phpLang_currentFile, $regs2)) {
		define('phpLang_currentFileName', $regs2[1]);
		define('phpLang_currentFileExtension', $regs2[2]);
	} else {
		define('phpLang_currentFileName', phpLang_currentFile);
	}
	$uri = preg_replace("|[?&]".phpLang_urlParam."=[^&]*|", "", $regs[0]);
	$uri .= preg_match("|\?|", $uri) ? '&' : '?';
	define('phpLang_currentURI', $uri);
} else {
	// it should not be possible
	define('phpLang_currentFile', '');
	define('phpLang_currentURI', '');
	define('phpLang_currentFileName', '');
	define('phpLang_currentFileExtension', '');
}

$HTTP_ACCEPT_LANGUAGE = getenv('HTTP_ACCEPT_LANGUAGE');
$HTTP_USER_AGENT = getenv('HTTP_USER_AGENT');

// checks if the language is disabled
function isDisabled($lang)
{
	if (isset($GLOBALS['phpLang_disabledLanguages'])) {
		if (' '.strpos($GLOBALS['phpLang_disabledLanguages'],$lang)>0) return TRUE;
	}
	return FALSE;
}

// function that gives the localized file name
function phpLang_localizedFileName($lang)
{
	switch(phpLang_fileNameType) {
		case 1	:	$ret = phpLang_localDir.phpLang_currentFileName.phpLang_currentFileExtension.'.'.$lang;
					break;
		case 2	:	$ret = phpLang_localDir.phpLang_currentFileName.'.'.$lang.phpLang_currentFileExtension;
					break;
		case 3	:	$ret = phpLang_localDir.$lang.'.'.phpLang_currentFileName.phpLang_currentFileExtension;
					break;
		case 4	:	$ret = phpLang_localDir.$lang.'/'.phpLang_currentFileName.phpLang_currentFileExtension;
					break;
	}
	return $ret;
}

// language code detection
function phpLang_detectLanguage($str, $from)
{
	$ext = '';
	reset($GLOBALS['phpLang_languages']);
	while($ext == '' && list($key, $name) = each($GLOBALS['phpLang_languages'])) {
		if (($from == 1 && preg_match("|^".$key."$|i", $str)) || ($from == 2 && preg_match("?(\(|\[|;[[:space:]])".$key."(;|\]|\))?i",$str))) {
			$ext = $name[0];
		}
	}

	return $ext;
}

// finds the appropriate language file
if (isset($HTTP_GET_VARS[phpLang_urlParam]) && file_exists(phpLang_localizedFileName($HTTP_GET_VARS[phpLang_urlParam])) && !isDisabled($HTTP_GET_VARS[phpLang_urlParam])) {
	// a language as been chosen by the user
	define('phpLang_current', $HTTP_GET_VARS[phpLang_urlParam]);
}

if (!defined('phpLang_current') && phpLang_useCookie && isset($HTTP_COOKIE_VARS['phpLangCookie']) && file_exists(phpLang_localizedFileName($HTTP_COOKIE_VARS['phpLangCookie'])) && !isDisabled($HTTP_COOKIE_VARS['phpLangCookie'])) {
	// a language as been found in a cookie previously set
	define('phpLang_current', $HTTP_COOKIE_VARS['phpLangCookie']);
}

if (!defined('phpLang_current') && isset($HTTP_ACCEPT_LANGUAGE) && trim($HTTP_ACCEPT_LANGUAGE) != '') {
	// looks at the languages accepted by the browser
	$accepted = explode(',', $HTTP_ACCEPT_LANGUAGE);
	while(!defined('phpLang_current') && list($key, $name) = each($accepted)) {
		$code = explode(';', $name);
		$ext = phpLang_detectLanguage($code[0], 1);
		if(file_exists(phpLang_localizedFileName($ext)) && !isDisabled($ext)) {
			define('phpLang_current', $ext);
		}
	}
}

if (!defined('phpLang_current') && isset($HTTP_USER_AGENT) && trim($HTTP_USER_AGENT) != '') {
	// looks at the browser's identification
	$ext = phpLang_detectLanguage($HTTP_USER_AGENT, 2);
	if(file_exists(phpLang_localizedFileName($ext))) {
		define('phpLang_current', $ext);
	}
}

if(!defined('phpLang_current')) {
	// if no language yet found, chose the first existing in site's list
	reset($phpLang_languages);
	while(!defined('phpLang_current') && list($key, $name) = each($phpLang_languages)) {
		if(file_exists(phpLang_localizedFileName($name[0]))) {
			define('phpLang_current', $name[0]);
		}
	}
}

// detection done, cookie update and inclusion of localized files if any available
if(defined('phpLang_current')) {
	if(phpLang_useCookie) {
		// set a cookie expiring in one year for current language
		setcookie('phpLangCookie', phpLang_current, time() + 60*60*24*365, "/");
	}
	
	// defines a string to add at the end of each link
	define('phpLang_link', phpLang_urlParam.'='.phpLang_current);
} else {
	// no language found
	define('phpLang_current', '');
	define('phpLang_link', phpLang_urlParam.'=');
}

// ###################################################################
// only for backward compatibility with versions previous to 0.3.0 !!!
   define('CUR_LANG', phpLang_current);
   define('LANG_LINK', phpLang_link);
// ###################################################################

// function that adds the flags with links for existing files
// give as first parameter the HTML string to put between each flag
// function that adds the flags with links for existing files
// give as first parameter the HTML string to put between each flag
function AddFlags($between = "", $showCurrent = false, $root = '')
{
	reset($GLOBALS["phpLang_languages"]);
	$temp = "";
	while(list($key, $name) = each($GLOBALS["phpLang_languages"])) {
		if(file_exists(phpLang_localizedFileName($name[0])) && ($showCurrent || $name[0] != phpLang_current)) {
			echo("\t" . $temp . '<a href="' . phpLang_currentURI . phpLang_urlParam . '=' . $name[0] . "\">\n");
			echo("\t\t<img src=\"" . $root . phpLang_images . $name[0] . '.png" border="0" align="middle" width="24" height="16" alt="' . $name[1] . "\" />\n");
			echo("\t</a>\n");
			$temp = $between;
		} elseif (file_exists(phpLang_localizedFileName($name[0]))) {
			// Shows selected language
			echo("\t\t<img src=\"" . $root . phpLang_images . $name[0] . '.png" border="0" align="middle" width="24" height="16" alt="' . $name[1] . "\"  \n");
			echo("\t\t\tstyle=\"padding: 0px 0px 16px 0px;\" />\n");
			$temp = $between;
		}
	}
}

function AddLanguageNames($between = " | ", $showCurrent = false)
{
	$count = 0;
	reset($GLOBALS["phpLang_languages"]);
	echo ($between);
	while(list($key, $name) = each($GLOBALS["phpLang_languages"])) {
		if(file_exists(phpLang_localizedFileName($name[0])) && ($showCurrent || $name[0] != phpLang_current)) {
			echo('<a href="'.phpLang_currentURI.phpLang_urlParam.'='.$name[0].'">');
			echo($name[2]);
			echo('</a>' . $between);
			$count ++;
		} elseif ($name[0] == phpLang_current) {
			echo($name[2] . $between);
			$count ++;
		}
	}
	if (0 == $count) {
		echo ('English only' . $between);
	}
}

if(phpLang_current != '') {
	// includes global language file
	if(file_exists(phpLang_localDir.phpLang_globalFile.'.'.phpLang_current)) {
		include(phpLang_localDir.phpLang_globalFile.'.'.phpLang_current);
	}
	// includes current language file
	include(phpLang_localizedFileName(phpLang_current));
}

// then, you can use two constants in your scripts :
//   phpLang_current : current language code
//   phpLang_link    : add this in the links after a '?' or a '&'
?>
