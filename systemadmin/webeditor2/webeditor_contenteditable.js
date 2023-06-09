///////////////////////////////////////////////////////////////////////////////////////////////////
// Asbru Web Content Editor
// (C) 2002-2008 Asbru Ltd.
// www.asbrusoft.com
///////////////////////////////////////////////////////////////////////////////////////////////////

var webeditor;
webeditor.skin = 'default';
WebEditorSkin();
webeditor.count = 0;
webeditor.inited = 0;
webeditor.initTimeout = 1000;
webeditor.initTimeoutMultiplier = 1; // adjust timeout period for subsequent timeouts
webeditor.disabled = false;
//webeditor.undo = false; // set to false to disable web content editor undo functionality
webeditor.clipboard = true; // set to true to use web content editor clipboard functionality
webeditor.useCSS = true; // set to true to make Mozilla generate B, I and U tags etc. instead of SPAN tags and STYLE attributes
webeditor.WYSIWYGselect = true; // set to true to use WYSIWYG toolbar select boxes instead of default HTML select boxes
webeditor.pasteToDelete = false; // set to true to make Microsoft Internet Explorer paste an empty string to delete content selection
webeditor.scrollContentToTop = true;
webeditor.contextmenus = true;
webeditor.refreshtoolbarOnAnyEvent = false;
webeditor.forceParamPlay = "-1"; // set to "-1" to force Flash objects to play
//webeditor.baseHref = "" + document.location.protocol + "//" + document.location.host + "/";
//webeditor.baseHref = "" + document.location.protocol + "//" + document.location.host + document.location.pathname.substring(0, document.location.pathname.lastIndexOf("/")+1);
webeditor.baseHref = "" + document.location.protocol + "//" + document.location.host + document.location.pathname;
webeditor.baseHrefPath = "" + webeditor.baseHref.substring(0, webeditor.baseHref.lastIndexOf("/")+1);
webeditor.baseHrefPrefix = "";
webeditor.shortenLocalURLs = true; // set to true to shorten local URLs to relative URLs
webeditor.shortenLocalURLsSearch = true; // set to true to shorten local URLs to relative URLs where (host+)path+search matches
webeditor.shortenLocalURLsPath = true; // set to true to shorten local URLs to relative URLs where (host+)path matches
webeditor.shortenLocalURLsBase = true; // set to true to shorten local URLs to relative URLs where (host+)base matches
webeditor.shortenLocalURLsHost = true; // set to true to shorten local URLs to relative URLs where host matches
webeditor.shortenLocalURLsBaseHref = true; // set to true to shorten local URLs to relative URLs where (host+)basehref matches
webeditor.shortenLocalURLsRootPath = true; // set to true to shorten local URLs to relative URLs where (host+)rootpath matches
webeditor.shortenLocalURLsRoot = false; // set to true to shorten local URLs to relative URLs where (host+)/ matches
webeditor.shortenLocalURLsRegExp = new Object() // set search (keys) and replace (values) regular expressions
webeditor.shortenNearlyEmptyContent = true; // set content to blank if it is "<br>"
webeditor.fixBaseHrefPastedURLs = true; // set to true to fix URLs in pasted content (Mozilla/Firefox base href paste error)
webeditor.encodeScriptTags = true; // encode <script> ... </script> tags
webeditor.encodeCommentTags = true; // encode <!-- ... --> tags
webeditor.encodePercentTags = true; // encode <% ... %> tags
webeditor.encodeQuestionTags = true; // encode <? ... ?> tags
webeditor.encodePhpTags = true; // encode <?php ... ?> tags
webeditor.content2textareaOnBlur = true;
webeditor.formatcontent = true; // set to true to reformat web browser generated HTML code
webeditor.mergecontent = true; // set to true to merge edited content with original content head and body
webeditor.setcontentbodyinnerhtml = false; // set true to set MSIE content through innerHTML instead of DOM
webeditor.setcontentbodydocumentwrite = true; // set true to set MSIE content through document.write instead of DOM
webeditor.container = "";
webeditor.minWidth = "";
webeditor.maxWidth = "";
webeditor.minHeight = "";
webeditor.maxHeight = "";
webeditor.stylesheets = new Array();
// Safari selection fix
webeditor.contentSelectionBaseNode = new Array();
webeditor.contentSelectionBaseOffset = new Array();
webeditor.contentSelectionExtentNode = new Array();
webeditor.contentSelectionExtentOffset = new Array();
// remove format
webeditor.removeformatAllHTML = false; // set to true to remove all HTML tags
webeditor.removeformatAllXML = false; // set to true to remove all XML tags
webeditor.removeformatAllNamespace = false; // set to true to remove all namespace attributes
webeditor.removeformatAllLang = false; // set to true to remove all lang attributes
webeditor.removeformatAllClass = false; // set to true to remove all class attributes
webeditor.removeformatAllStyle = true; // set to true to remove all style attributes
webeditor.removeformatEmptyStyle = true; // set to true to remove empty style attributes
webeditor.removeformatEmptySpan = true; // set to true to remove empty span attributes
webeditor.removeformatAllSpan = false; // set to true to remove all span attributes
webeditor.removeformatEmptyFont = false; // set to true to remove empty font tags
webeditor.removeformatAllFont = true; // set to true to remove all font tags
webeditor.removeformatAllDelIns = false; // set to true to remove all del and ins tags
webeditor.removeformatEmptyPDiv = true; // set to true to remove empty p and div tags
webeditor.removeformatAllFormatTags = true; // set to true to remove all format tags
webeditor.removeformatAllMsoClass = false; // set to true to remove all mso classes
webeditor.removeformatAllMsoStyle = false; // set to true to remove all mso styles
webeditor.removeformatAllMsoConditional = false; // set to true to remove all mso conditional tags
// autoclean
webeditor.autoclean = true; // set to true to automatically clean html code
webeditor.autocleanAllHTML = false; // set to true to remove all HTML tags
webeditor.autocleanAllXML = true; // set to true to remove all XML tags
webeditor.autocleanAllNamespace = true; // set to true to remove all namespace attributes
webeditor.autocleanAllLang = true; // set to true to remove all lang attributes
webeditor.autocleanAllClass = false; // set to true to remove all class attributes
webeditor.autocleanAllStyle = false; // set to true to remove all style attributes
webeditor.autocleanEmptyStyle = true; // set to true to remove empty style attributes
webeditor.autocleanEmptySpan = true; // set to true to remove empty span attributes
webeditor.autocleanAllSpan = false; // set to true to remove all span attributes
webeditor.autocleanEmptyFont = true; // set to true to remove empty font tags
webeditor.autocleanAllFont = false; // set to true to remove all font tags
webeditor.autocleanAllDelIns = true; // set to true to remove all del and ins tags
webeditor.autocleanEmptyPDiv = false; // set to true to remove empty p and div tags
webeditor.autocleanAllFormatTags = false; // set to true to remove all format tags
webeditor.autocleanAllMsoClass = true; // set to true to remove all mso classes
webeditor.autocleanAllMsoStyle = true; // set to true to remove all mso styles
webeditor.autocleanAllMsoConditional = true; // set to true to remove all mso conditional tags
webeditor.nbsp2blank = false; // set to true to convert all &nbsp; to blanks
webeditor.strip = {};

var webeditor_keyCode_command = "ctrlKey";
var webeditor_keyCode_undo = 90;
var webeditor_keyCode_redo = 89;
var webeditor_keyCode_enter = 13;
var webeditor_keyCode_cut = 88;
var webeditor_keyCode_copy = 67;
var webeditor_keyCode_paste = 86;
webeditor_keyCode_backspace = 8;
webeditor_keyCode_delete = 46;


///////////////////////////////////////////////////////////////////////////////////////////////////
// Main function/object called from web page at location of the web editor content
///////////////////////////////////////////////////////////////////////////////////////////////////

function WebEditor(name, value, options) {
	// options: stylesheet language manager onEnter onShiftEnter onCtrlEnter onAltEnter toolbar width height format encoding direction
	if (! options) options = new Object();
	// set options for global webeditor attributes
	for (var attr in options) {
		if (typeof(webeditor[attr])!='undefined') webeditor[attr] = options[attr];
	}
	if (webeditor.baseHref.match("^/.*$")) {
		webeditor.baseHref = "" + document.location.protocol + "//" + document.location.host + webeditor.baseHref;
		webeditor.baseHrefPath = "" + webeditor.baseHref.substring(0, webeditor.baseHref.lastIndexOf("/")+1);
	} else if (! webeditor.baseHref.match("^https?://")) {
		webeditor.baseHref = "" + document.location.href.substring(0, document.location.href.lastIndexOf("/")+1) + webeditor.baseHref;
		if (webeditor.baseHref.length != webeditor.baseHref.lastIndexOf("/")+1) {
			webeditor.baseHref += "/";
		}
		webeditor.baseHrefPath = "" + webeditor.baseHref;
	} else {
		webeditor.baseHrefPath = "" + webeditor.baseHref.substring(0, webeditor.baseHref.lastIndexOf("/")+1);
	}
	if ((typeof(options.stylesheet)!='undefined') && (options.stylesheet!='') && (options.stylesheet!=false)) {
		if (options.stylesheet.match("^https?://.*$")) {
			// ok - absolute url
		} else if (options.stylesheet.match("^/.*$")) {
			// ok - absolute path
		} else {
			options.stylesheet = document.location.pathname.substring(0, document.location.pathname.lastIndexOf("/")+1) + options.stylesheet;
		}
	}
	if ((typeof(options.language)=='undefined') || (options.language=='') || (options.language==false)) {
		if (document.location.pathname.match(".*\.asp$")) {
			options.language = 'asp';
		} else if (document.location.pathname.match(".*\.aspx$")) {
			options.language = 'aspx';
		} else if (document.location.pathname.match(".*\.cfm$")) {
			options.language = 'cfm';
		} else if (document.location.pathname.match(".*\.jsp$")) {
			options.language = 'jsp';
		} else if (document.location.pathname.match(".*\.php$")) {
			options.language = 'php';
		}
	}
	if ((typeof(options.manager)=='undefined') && (typeof(options.language)!='undefined') && (options.language != 'html')) {
		options.manager = 'manager';
	}
	return HardCoreWebEditor(options.rootpath, options.language, name, value, options.value_htmlencoded, options.stylesheet, options.showhtml, options.manager, options.onEnter, options.onShiftEnter, options.onCtrlEnter, options.onAltEnter, options.toolbar, options.width, options.height, options.format, options.encoding, options.direction);
}
function HardCoreWebEditor(rootpath, language, name, value, value_htmlencoded, stylesheet, showhtml, manager, onEnter, onShiftEnter, onCtrlEnter, onAltEnter, toolbar, width, height, format, encoding, direction) {
	webeditor_menu_init();
	webeditor_dropdown_init('formatclass');
	webeditor_dropdown_init('formatblock');
	webeditor_dropdown_init('fontname');
	webeditor_dropdown_init('fontsize');

	webeditor.count += 1;
	if (rootpath) webeditor.rootpath = rootpath;
	webeditor.language = language || "html";
	webeditor.stylesheet = stylesheet || "";
	webeditor.stylesheets[name] = webeditor.stylesheet;
	webeditor.manager = manager || "";
	webeditor.onEnter = onEnter || "";
	webeditor.onShiftEnter = onShiftEnter || "";
	webeditor.onCtrlEnter = onCtrlEnter || "";
	webeditor.onAltEnter = onAltEnter || "";
	if (toolbar && (typeof(toolbar) == "string")) {
		webeditor.toolbar = document.getElementById(toolbar) || parent.document.getElementById(toolbar) || "";
	} else {
		webeditor.toolbar = toolbar || "";
	}
	if (webeditor.toolbar) webeditor.toolbarid = webeditor.toolbar.id;
	if (webeditor.toolbar) webeditor.WYSIWYGselect = false;
	webeditor.width = width || "100%";
	webeditor.height = height || "100%";
	webeditor.format = format || "";
	webeditor.encoding = encoding || "UTF-8";
	webeditor.direction = direction || '';
	if (! webeditor.select_focused) webeditor.select_focused = new Array();
	if (! webeditor.textarea_content) webeditor.textarea_content = new Array();

	if ((! webeditor.manager) || (webeditor.manager == "basic")) {
		webeditor.image_window_width = "550";
		webeditor.image_window_height = "600";
		webeditor.hyperlink_window_width = "475";
		webeditor.hyperlink_window_height = "475";
	} else {
		webeditor.image_window_width = "750";
		webeditor.image_window_height = "500";
		webeditor.hyperlink_window_width = "750";
		webeditor.hyperlink_window_height = "450";
		if (screen.width >= 1280) {
			webeditor.image_window_width = 1000;
			webeditor.hyperlink_window_width = 1000;
		} else if (screen.width >= 1024) {
			webeditor.image_window_width = 875;
			webeditor.hyperlink_window_width = 875;
		} else if (screen.width >= 800) {
			webeditor.image_window_width = 750;
			webeditor.hyperlink_window_width = 750;
		}
		if (screen.width >= 1024) {
			webeditor.image_window_height = 700;
			webeditor.hyperlink_window_height = 650;
		} else if (screen.width >= 768) {
			webeditor.image_window_height = 600;
			webeditor.hyperlink_window_height = 550;
		} else if (screen.width >= 600) {
			webeditor.image_window_height = 500;
			webeditor.hyperlink_window_height = 450;
		}
	}

	value = webeditor_empty_content_fix(value);
	value = contenteditable_split_content(name, value);
	try {
		if (webeditor_custom_encode) value = webeditor_custom_encode(value);
	} catch(e) {
	}
	try {
		if (typeof(webeditor_custom_initialize) != "undefined") value = webeditor_custom_initialize(value);
	} catch(e) {
	}
	value = contenteditable_encodeScriptTags(value);

//	contenteditable(name, unescape(value), stylesheet, webeditor.container);
//	contenteditable(name, decodeURI(value), stylesheet, webeditor.container);
	contenteditable(name, value, stylesheet, webeditor.container);
	contenteditable_onload(webeditor_init);
	if (webeditor.container) webeditor_init();
}

function HardCoreWebEditorFocus(id) {
	return WebEditorFocus(id);
}
function WebEditorFocus(id) {
	contenteditable_enable(id);
	if (id) {
		contenteditable_focus(id);
	}
}

function WebEditorEnable(editor) {
	return WebEditorActivate(editor);
}
function WebEditorActivate(editor) {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	if (editor && (typeof(editor)=="string")) {
		contenteditable_inited[editor] = true;
		contenteditable_enable(editor);
	} else if (editor && editor.tagName && (editor.tagName == "IFRAME") && ((editor.className == 'webeditor_contenteditable') || (editor.className == 'webeditor_contenteditable_disabled')) && editor.id) {
		contenteditable_inited[editor.id] = true;
		contenteditable_enable(editor);
	} else {
		contenteditable_reinit();
		contenteditable_enable();
	}
}

function WebEditorDisable(editor) {
	return WebEditorDeactivate(editor);
}
function WebEditorDeactivate(editor) {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	if (editor && (typeof(editor)=="string")) {
		contenteditable_disable(editor);
		contenteditable_inited[editor] = false;
		contenteditable_inited_document[editor] = false;
		contenteditable_inited_stylesheet[editor] = false;
	} else if (editor && editor.tagName && (editor.tagName == "IFRAME") && ((editor.className == 'webeditor_contenteditable') || (editor.className == 'webeditor_contenteditable_disabled')) && editor.id) {
		contenteditable_disable(editor.id);
		contenteditable_inited[editor.id] = false;
		contenteditable_inited_document[editor.id] = false;
		contenteditable_inited_stylesheet[editor.id] = false;
	} else {
		contenteditable_disable();
		contenteditable_inited = new Array();
	}
}

function HardCoreWebEditorDOMInspector(name) {
	return WebEditorDOMInspector(name);
}
function WebEditorDOMInspector(name, container) {
	var html = '';
//	html += '<table summary="" class="webeditor_DOM_inspector" cellpadding="0" cellspacing="0" bgcolor="#C0C0C0" border="0" width="' + webeditor.width + '">' + '\r\n';
	html += '<table summary="" class="webeditor_DOM_inspector" cellpadding="0" cellspacing="0" bgcolor="#C0C0C0" border="0" width="100%">' + '\r\n';
	if (name) {
		html += '<tr><td id="webeditor_DOM_inspector_'+name+'">' + '\r\n';
	} else {
		html += '<tr><td id="webeditor_DOM_inspector">' + '\r\n';
	}
	html += '&nbsp;' + '\r\n';
	html += '</td></tr>' + '\r\n';
	html += '</table>' + '\r\n';

	if (container && (typeof(container)=='string') && document.getElementById(container)) {
		document.getElementById(container).innerHTML = html;
	} else if (container && (typeof(container.innerHTML)!='undefined')) {
		container.innerHTML = html;
	} else {
		document.write(html);
	}
}

function WebEditorSkin(name) {
	if (name) {
		webeditor.skin = name;
	}
	if (webeditor.skin) {
		webeditor.skinpath = webeditor.rootpath + webeditor.skin + '/';
	} else {
		webeditor.skinpath = webeditor.rootpath;
	}
	webeditor.buttonpath = webeditor.skinpath;
	var stylesheet = document.getElementById("webeditor_skin_css");
	if (stylesheet) {
		if (! stylesheet.href.match(webeditor.skinpath + 'webeditor.css' + "$")) {
			stylesheet.href = webeditor.skinpath + 'webeditor.css';
		}
	} else {
		var head = document.getElementsByTagName("head");
		if (head && head[0]) {
			// Safari may not display web content editor correctly if stylesheet is loaded before web content editor input has been invoked
			if (webeditor.count || (webeditor.type != "safari")) {
				stylesheet = document.createElement("link");
				stylesheet.id = "webeditor_skin_css";
				stylesheet.rel = "stylesheet";
				stylesheet.type = "text/css";
				stylesheet.href = webeditor.skinpath + 'webeditor.css';
				head[0].appendChild(stylesheet);
			}
		}
	}
	var table = document.getElementsByTagName("table");
	for (var i=0; i<table.length; i++) {
		if (table[i].className == "webeditor_toolbar") {
			var image = table[i].getElementsByTagName("img");
			for (var j=0; j<image.length; j++) {
				image[j].src = webeditor.buttonpath + image[j].src.substring(image[j].src.lastIndexOf("/")+1);
			}
		}
	}
}

function WebEditorToolbarRefresh(name) {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	if (name) contenteditable_focus(name);
	webeditor_refreshToolbar(true);
}

function HardCoreWebEditorToolbar(name, options) {
	switch(arguments.length) {
	case 0:
		return WebEditorToolbar();
		break;
	case 1:
		return WebEditorToolbar(name);
		break;
	case 2:
		return WebEditorToolbar(name, options);
		break;
	case 3:
		return WebEditorToolbar(name, options, arguments[2]);
		break;
	case 4:
		return WebEditorToolbar(name, options, arguments[2], arguments[3]);
		break;
	case 5:
		return WebEditorToolbar(name, options, arguments[2], arguments[3], arguments[4]);
		break;
	case 6:
		return WebEditorToolbar(name, options, arguments[2], arguments[3], arguments[4], arguments[5]);
		break;
	case 7:
		return WebEditorToolbar(name, options, arguments[2], arguments[3], arguments[4], arguments[5], arguments[6]);
		break;
	case 8:
		return WebEditorToolbar(name, options, arguments[2], arguments[3], arguments[4], arguments[5], arguments[6], arguments[7]);
		break;
	case 9:
		return WebEditorToolbar(name, options, arguments[2], arguments[3], arguments[4], arguments[5], arguments[6], arguments[7], arguments[8]);
		break;
	default:
		return WebEditorToolbar(name, options, arguments[2], arguments[3], arguments[4], arguments[5], arguments[6], arguments[7], arguments[8], arguments[9]);
		break;
	}
}
function WebEditorToolbar(name, options) {
// You are not allowed in any way to remove or hide the copyright notice unless you obtain a valid commercial license for the Asbru Web Content Editor from Asbru Ltd. - www.asbrusoft.com
// The copyright notice must remain visible and unmodified at all times unless you obtain a valid commercial license for the Asbru Web Content Editor from Asbru Ltd. - www.asbrusoft.com
	var html = '';
//	html += '<div align="left"><font size="-1">Asbru Web Content Editor - (C) 2002-2008 - Asbru Ltd. - <a href="http://www.asbrusoft.com" target="_blank">www.asbrusoft.com</a></font></div>' + '\r\n';
	WebEditorSkin();
	var rows = new Array(0);
	if ((name && (typeof(name) == "string")) || (name === null)) {
		if (arguments.length > 2) {
			for (var i=2; i<arguments.length; i++) if (arguments[i]) rows[rows.length] = arguments[i];
		}
	} else {
		if (arguments.length > 1) {
			for (var i=1; i<arguments.length; i++) if (arguments[i]) rows[rows.length] = arguments[i];
		}
		options = name;
	}
	if (! options) options = new Array();
	if (options['toolbar1']) {
		for (var i=1; i<10; i++) {
			if (options['toolbar'+i]) {
				rows[i-1] = options['toolbar'+i];
			}
		}
	} else if ((name == "-COMPACT-") || (rows.length && (rows[0] == "-COMPACT-")) || (options['toolbar'] == "-COMPACT-")) {
		rows[0] = "formatclass formatblock fontname fontsize find help";
		rows[1] = "cut copy paste clean delete selectall undo redo insertorderedlist insertunorderedlist outdent indent justify nobr textformat forecolor backcolor spellcheck preview";
		rows[2] = "table insertmedia imagemap createlink mailto anchor unlink specialcharacter formmenu iframe box positionmenu inserthorizontalrule printbreak print import viewdetails viewsource save";
	} else if ((name == "-COMPACT2-") || (rows.length && (rows[0] == "-COMPACT2-")) || (options['toolbar'] == "-COMPACT2-")) {
		rows[0] = "formatclass formatblock fontname fontsize insertorderedlist insertunorderedlist outdent indent justify nobr textformat forecolor backcolor spellcheck find help";
		rows[1] = "cut copy paste clean delete selectall undo redo table insertmedia imagemap createlink mailto anchor unlink specialcharacter formmenu iframe box positionmenu inserthorizontalrule printbreak print import viewdetails viewsource preview save";
	} else if ((name == "-MINIMAL-") || (rows.length && (rows[0] == "-MINIMAL-")) || (options['toolbar'] == "-MINIMAL-")) {
		rows[0] = "cut copy paste clean delete selectall undo redo formatclass formatblock spellcheck find help";
		rows[1] = "table insertmedia imagemap createlink mailto anchor unlink specialcharacter formmenu iframe inserthorizontalrule insertorderedlist insertunorderedlist print import viewdetails viewsource preview save";
	} else if ((name == "-FULL-") || (rows.length && (rows[0] == "-FULL-")) || (options['toolbar'] == "-FULL-")) {
		rows[0] = "formatclass formatblock fontname fontsize bold italic underline forecolor backcolor superscript subscript strikethrough removeformat help";
		rows[1] = "cut copy paste clean delete selectall undo redo specialcharacter insertmedia imagemap iframe createlink mailto anchor unlink inserthorizontalrule insertorderedlist insertunorderedlist outdent indent justifyleft justifycenter justifyright justifyfull nobr";
		rows[2] = "createtable tableproperties insertcaption insertrowhead insertrowfoot rowproperties insertrowabove insertrowbelow deleterow splitcellrows columnproperties insertcolumnleft insertcolumnright deletecolumn splitcellcolumns cellproperties insertcellleft insertcellright deletecell splitcell mergecells import find printbreak print preview";
		rows[3] = "form submitbutton resetbutton backbutton imagebutton file button text password hidden textarea checkbox radio select position forwards backwards front back abovetext belowtext box spellcheck viewdetails viewsource save";
	} else if ((name == "-ALL-") || (rows.length && (rows[0] == "-ALL-")) || (options['toolbar'] == "-ALL-")) {
		rows[0] = "formatclass formatblock fontname fontsize textformat bold italic underline forecolor backcolor superscript subscript strikethrough removeformat help";
		rows[1] = "cut copy paste clean delete selectall undo redo specialcharacter insertmedia imagemap iframe createlink mailto anchor unlink inserthorizontalrule insertorderedlist insertunorderedlist outdent indent justify justifyleft justifycenter justifyright justifyfull nobr find";
		rows[2] = "table createtable tableproperties insertcaption insertrowhead insertrowfoot rowproperties insertrowabove insertrowbelow deleterow splitcellrows columnproperties insertcolumnleft insertcolumnright deletecolumn splitcellcolumns cellproperties insertcellleft insertcellright deletecell splitcell mergecells ltr rtl import printbreak print preview";
		rows[3] = "formmenu form submitbutton resetbutton backbutton imagebutton file button text password hidden textarea checkbox radio select positionmenu position forwards backwards front back abovetext belowtext box spellcheck viewdetails viewsource save";
	} else if ((name == "-DEFAULT-") || (rows.length && (rows[0] == "-DEFAULT-")) || (options['toolbar'] == "-DEFAULT-")) {
		rows[0] = "formatclass formatblock fontname fontsize find help";
		rows[1] = "cut copy paste clean delete selectall undo redo insertorderedlist insertunorderedlist outdent indent justify nobr textformat forecolor backcolor spellcheck preview";
		rows[2] = "table insertmedia imagemap createlink mailto anchor unlink specialcharacter formmenu iframe box positionmenu inserthorizontalrule printbreak print import viewdetails viewsource save";
	}
	if (! rows.length) {
		rows[0] = "formatclass formatblock fontname fontsize find help";
		rows[1] = "cut copy paste clean delete selectall undo redo insertorderedlist insertunorderedlist outdent indent justify nobr textformat forecolor backcolor spellcheck preview";
		rows[2] = "table insertmedia imagemap createlink mailto anchor unlink specialcharacter formmenu iframe box positionmenu inserthorizontalrule printbreak print import viewdetails viewsource save";
	}
	var container = options['container'];
	if (options['formatblock'] && (typeof(options['formatblock'])=='object') && (typeof(options['formatblock'].length)=='number')) {
		for (var i=0; i<options['formatblock'].length; i++) {
			if (typeof(options['formatblock'][i])=='string') {
				var formatblock = options['formatblock'][i];
				options['formatblock'][i] = new Object();
				options['formatblock'][i].name=formatblock;
				options['formatblock'][i].value=formatblock;
			}
		}
	} else if (options['formatblock'] && (typeof(options['formatblock'])=='object') && (typeof(options['formatblock'].length)=='undefined')) {
		var formatblock_options = new Array();
		var i=0;
		for (var optionname in options['formatblock']) {
			formatblock_options[i] = new Object();
			formatblock_options[i].name = '' + optionname;
			formatblock_options[i++].value= '' + options['formatblock'][optionname];
		}
		options['formatblock'] = formatblock_options;
	} else if (! options['formatblock']) {
		var i=0;
		options['formatblock'] = new Array();
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_normal');
		options['formatblock'][i++].value='<p>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_paragraph');
		options['formatblock'][i++].value='<p>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_formatted');
		options['formatblock'][i++].value='<pre>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_heading1');
		options['formatblock'][i++].value='<h1>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_heading2');
		options['formatblock'][i++].value='<h2>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_heading3');
		options['formatblock'][i++].value='<h3>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_heading4');
		options['formatblock'][i++].value='<h4>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_heading5');
		options['formatblock'][i++].value='<h5>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_heading6');
		options['formatblock'][i++].value='<h6>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_numberedlist');
		options['formatblock'][i++].value='<ol>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_bulletedlist');
		options['formatblock'][i++].value='<ul>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_directorylist');
		options['formatblock'][i++].value='<dir>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_menulist');
		options['formatblock'][i++].value='<menu>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_definitionterm');
		options['formatblock'][i++].value='<dt>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_definition');
		options['formatblock'][i++].value='<dd>';
		options['formatblock'][i] = new Object();
		options['formatblock'][i].name=Text('formatblock_address');
		options['formatblock'][i++].value='<address>';
	}
	if (options['fontname'] && (typeof(options['fontname'])=='object') && (typeof(options['fontname'].length)=='number')) {
		for (var i=0; i<options['fontname'].length; i++) {
			if (typeof(options['fontname'][i])=='string') {
				var fontname = options['fontname'][i];
				options['fontname'][i] = new Object();
				options['fontname'][i].name=fontname;
				options['fontname'][i].value=fontname;
			}
		}
	} else if (options['fontname'] && (typeof(options['fontname'])=='object') && (typeof(options['fontname'].length)=='undefined')) {
		var fontname_options = new Array();
		var i=0;
		for (var optionname in options['fontname']) {
			fontname_options[i] = new Object();
			fontname_options[i].name = '' + optionname;
			fontname_options[i++].value= '' + options['fontname'][optionname];
		}
		options['fontname'] = fontname_options;
	} else if (! options['fontname']) {
		var i=0;
		options['fontname'] = new Array();
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Andale Mono, sans-serif';
		options['fontname'][i++].value='Andale Mono, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Arial, Helvetica, sans-serif';
		options['fontname'][i++].value='Arial, Helvetica, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Arial Black, Gadget, sans-serif';
		options['fontname'][i++].value='Arial Black, Gadget, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Comic Sans MS, cursive';
		options['fontname'][i++].value='Comic Sans MS, cursive';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Courier New, Courier, monospace';
		options['fontname'][i++].value='Courier New, Courier, monospace';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Georgia, serif';
		options['fontname'][i++].value='Georgia, serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Impact, Charcoal, sans-serif';
		options['fontname'][i++].value='Impact, Charcoal, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Lucida Console, Monaco, monospace';
		options['fontname'][i++].value='Lucida Console, Monaco, monospace';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Lucida Sans Unicode, Lucida Grande, sans-serif';
		options['fontname'][i++].value='Lucida Sans Unicode, Lucida Grande, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='MS Sans Serif, Geneva, sans-serif';
		options['fontname'][i++].value='MS Sans Serif, Geneva, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='MS Serif, New York, serif';
		options['fontname'][i++].value='MS Serif, New York, serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Palatino Linotype, Book Antiqua, Palatino, serif';
		options['fontname'][i++].value='Palatino Linotype, Book Antiqua, Palatino, serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Tahoma, Geneva, sans-serif';
		options['fontname'][i++].value='Tahoma, Geneva, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Times New Roman, Times, serif';
		options['fontname'][i++].value='Times New Roman, Times, serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Trebuchet MS, Helvetica, sans-serif';
		options['fontname'][i++].value='Trebuchet MS, Helvetica, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Verdana, Geneva, sans-serif';
		options['fontname'][i++].value='Verdana, Geneva, sans-serif';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Symbol';
		options['fontname'][i++].value='Symbol';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Webdings';
		options['fontname'][i++].value='Webdings';
		options['fontname'][i] = new Object();
		options['fontname'][i].name='Wingdings, Zapf Dingbats';
		options['fontname'][i++].value='Wingdings, Zapf Dingbats';
	}
	if (options['fontsize'] && (typeof(options['fontsize'])=='object') && (typeof(options['fontsize'].length)=='number')) {
		for (var i=0; i<options['fontsize'].length; i++) {
			if (typeof(options['fontsize'][i])=='string') {
				var fontsize = options['fontsize'][i];
				options['fontsize'][i] = new Object();
				options['fontsize'][i].name=fontsize;
				options['fontsize'][i].value=fontsize;
			}
		}
	} else if (options['fontsize'] && (typeof(options['fontsize'])=='object') && (typeof(options['fontsize'].length)=='undefined')) {
		var fontsize_options = new Array();
		var i=0;
		for (var optionname in options['fontsize']) {
			fontsize_options[i] = new Object();
			fontsize_options[i].name = '' + optionname;
			fontsize_options[i++].value= '' + options['fontsize'][optionname];
		}
		options['fontsize'] = fontsize_options;
	} else if (! options['fontsize']) {
		var i=0;
		options['fontsize'] = new Array();
		options['fontsize'][i] = new Object();
		options['fontsize'][i].name='8';
		options['fontsize'][i++].value='1';
		options['fontsize'][i] = new Object();
		options['fontsize'][i].name='10';
		options['fontsize'][i++].value='2';
		options['fontsize'][i] = new Object();
		options['fontsize'][i].name='12';
		options['fontsize'][i++].value='3';
		options['fontsize'][i] = new Object();
		options['fontsize'][i].name='14';
		options['fontsize'][i++].value='4';
		options['fontsize'][i] = new Object();
		options['fontsize'][i].name='18';
		options['fontsize'][i++].value='5';
		options['fontsize'][i] = new Object();
		options['fontsize'][i].name='24';
		options['fontsize'][i++].value='6';
		options['fontsize'][i] = new Object();
		options['fontsize'][i].name='36';
		options['fontsize'][i++].value='7';
	}
	webeditor.options = options;
	if (name && (typeof(name) == "string")) {
		html += '<table summary="" id="webeditor_toolbar_' + name + '" class="webeditor_toolbar" cellpadding="0" cellspacing="0" bgcolor="#C0C0C0" border="0">' + '\r\n';
	} else {
		html += '<table summary="" class="webeditor_toolbar" cellpadding="0" cellspacing="0" bgcolor="#C0C0C0" border="0">' + '\r\n';
	}
	var maxcellcount = 0;
	for (var i=0; i<rows.length; i++) {
		html += '<tr>' + '\r\n';
		var elements = rows[i].split(" ");
		var cellcount = 0;
		for (var j=0; j<elements.length; j++) {
			switch(elements[j]) {
			case "":
				break;
			case "formatclass":
				cellcount += 5;
				if (webeditor.WYSIWYGselect) {
					html += '<td colspan="5">' + '\r\n';
					html += '<span unselectable="on" style="white-space: nowrap;"><input unselectable="on" readonly="readonly" style="width: 105px;" type="text" class="webeditor_select" id="formatclass" name="webeditor_formatclass" value="" size="10" onclick="webeditor_dropdown(\'formatclass\', this)"><img unselectable="on" onclick="webeditor_dropdown(\'formatclass\', this.previousSibling)" align="top" border="0" src="' + webeditor.buttonpath + 'dropdown.gif"></span>' + '\r\n';
					html += '</td>' + '\r\n';
					webeditor_dropdown_init('formatclass');
					webeditor_dropdown_option('formatclass', "&nbsp;", "");
				} else {
					html += '<td colspan="5">' + '\r\n';
					html += '<select unselectable="on" class="webeditor_select" id="formatclass" name="webeditor_formatclass" title="'+Text('toolbar_formatclass')+'" style="width: 125px;">' + '\r\n';
					html += '  <option value="">&nbsp;</option>' + '\r\n';
					html += '</select>' + '\r\n';
					html += '</td>' + '\r\n';
				}
				break;
			case "formatblock":
				cellcount += 4;
				if (webeditor.WYSIWYGselect) {
					html += '<td colspan="4">' + '\r\n';
					html += '<span unselectable="on" style="white-space: nowrap;"><input unselectable="on" readonly="readonly" style="width: 80px;" type="text" class="webeditor_select" id="formatblock" name="webeditor_formatblock" value="" size="10" onclick="webeditor_dropdown(\'formatblock\', this)"><img unselectable="on" onclick="webeditor_dropdown(\'formatblock\', this.previousSibling)" align="top" border="0" src="' + webeditor.buttonpath + 'dropdown.gif"></span>' + '\r\n';
					html += '</td>' + '\r\n';
					webeditor_dropdown_init('formatblock');
					for (var k=0; k<options['formatblock'].length; k++) {
						webeditor_dropdown_option('formatblock', options['formatblock'][k].name, options['formatblock'][k].value);
					}
				} else {
					html += '<td colspan="4">' + '\r\n';
					html += '<select unselectable="on" class="webeditor_select" id="formatblock" name="webeditor_formatblock" title="'+Text('toolbar_formatblock')+'" style="width: 100px;">' + '\r\n';
					for (var k=0; k<options['formatblock'].length; k++) {
						html += '  <option value="'+options['formatblock'][k].value+'">'+options['formatblock'][k].name+'</option>' + '\r\n';
					}
					html += '</select>' + '\r\n';
					html += '</td>' + '\r\n';
				}
				break;
			case "fontname":
				cellcount += 6;
				if (webeditor.WYSIWYGselect) {
					html += '<td colspan="6">' + '\r\n';
					html += '<span unselectable="on" style="white-space: nowrap;"><input unselectable="on" readonly="readonly" style="width: 130px;" type="text" class="webeditor_select" id="fontname" name="webeditor_fontname" value="" size="10" onclick="webeditor_dropdown(\'fontname\', this)"><img unselectable="on" onclick="webeditor_dropdown(\'fontname\', this.previousSibling)" align="top" border="0" src="' + webeditor.buttonpath + 'dropdown.gif"></span>' + '\r\n';
					html += '</td>' + '\r\n';
					webeditor_dropdown_init('fontname');
					for (var k=0; k<options['fontname'].length; k++) {
						webeditor_dropdown_option('fontname', options['fontname'][k].name, options['fontname'][k].value);
					}
				} else {
					html += '<td colspan="6">' + '\r\n';
					html += '<select unselectable="on" class="webeditor_select" id="fontname" name="webeditor_fontname" title="'+Text('toolbar_fontname')+'" style="width: 150px;">' + '\r\n';
					html += '  <option value="">&nbsp;</option>' + '\r\n';
					for (var k=0; k<options['fontname'].length; k++) {
						html += '  <option value="'+options['fontname'][k].value+'">'+options['fontname'][k].name+'</option>' + '\r\n';
					}
					html += '</select>' + '\r\n';
					html += '</td>' + '\r\n';
				}
				break;
			case "fontsize":
				cellcount += 2;
				if (webeditor.WYSIWYGselect) {
					html += '<td colspan="2">' + '\r\n';
					html += '<span unselectable="on" style="white-space: nowrap;"><input unselectable="on" readonly="readonly" style="width: 30px;" type="text" class="webeditor_select" id="fontsize" name="webeditor_fontsize" value="" size="10" onclick="webeditor_dropdown(\'fontsize\', this)"><img unselectable="on" onclick="webeditor_dropdown(\'fontsize\', this.previousSibling)" align="top" border="0" src="' + webeditor.buttonpath + 'dropdown.gif"></span>' + '\r\n';
					html += '</td>' + '\r\n';
					webeditor_dropdown_init('fontsize', '300px', '225px'); // webeditor_dropdown_init('fontsize', '275px', '250px');
					for (var k=0; k<options['fontsize'].length; k++) {
						webeditor_dropdown_option('fontsize', options['fontsize'][k].name, options['fontsize'][k].value);
					}
				} else {
					html += '<td colspan="2">' + '\r\n';
					html += '<select unselectable="on" class="webeditor_select" id="fontsize" name="webeditor_fontsize" title="'+Text('toolbar_fontsize')+'" style="width: 50px;">' + '\r\n';
					html += '  <option value="">&nbsp;</option>' + '\r\n';
					for (var k=0; k<options['fontsize'].length; k++) {
						html += '  <option value="'+options['fontsize'][k].value+'">'+options['fontsize'][k].name+'</option>' + '\r\n';
					}
					html += '</select>' + '\r\n';
					html += '</td>' + '\r\n';
				}
				break;
			case "textformat":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="textformat" src="' + webeditor.buttonpath + 'textformat.gif" alt="'+Text('toolbar_textformat')+'" title="'+Text('toolbar_textformat')+'" onmouseover="webeditor_menu(\'textformat\', this)" onclick="return false;"></span></td>' + '\r\n';
				break;
			case "bold":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="bold" src="' + webeditor.buttonpath + 'bold.gif" alt="'+Text('toolbar_bold')+'" title="'+Text('toolbar_bold')+'"></span></td>' + '\r\n';
				break;
			case "italic":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="italic" src="' + webeditor.buttonpath + 'italic.gif" alt="'+Text('toolbar_italic')+'" title="'+Text('toolbar_italic')+'"></span></td>' + '\r\n';
				break;
			case "underline":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="underline" src="' + webeditor.buttonpath + 'underline.gif" alt="'+Text('toolbar_underline')+'" title="'+Text('toolbar_underline')+'"></span></td>' + '\r\n';
				break;
			case "forecolor":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="forecolor" src="' + webeditor.buttonpath + 'forecolor.gif" alt="'+Text('toolbar_forecolor')+'" title="'+Text('toolbar_forecolor')+'" onmouseover="webeditor_menu(\'colour\', this)"></span></td>' + '\r\n';
				break;
			case "backcolor":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="backcolor" src="' + webeditor.buttonpath + 'backcolor.gif" alt="'+Text('toolbar_backcolor')+'" title="'+Text('toolbar_backcolor')+'" onmouseover="webeditor_menu(\'colour\', this)"></span></td>' + '\r\n';
				break;
			case "removeformat":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="removeformat" src="' + webeditor.buttonpath + 'removeformat.gif" alt="'+Text('toolbar_removeformat')+'" title="'+Text('toolbar_removeformat')+'"></span></td>' + '\r\n';
				break;
			case "cut":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="cut" src="' + webeditor.buttonpath + 'cut.gif" alt="'+Text('toolbar_cut')+'" title="'+Text('toolbar_cut')+'"></span></td>' + '\r\n';
				break;
			case "copy":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="copy" src="' + webeditor.buttonpath + 'copy.gif" alt="'+Text('toolbar_copy')+'" title="'+Text('toolbar_copy')+'"></span></td>' + '\r\n';
				break;
			case "paste":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="paste" src="' + webeditor.buttonpath + 'paste.gif" alt="'+Text('toolbar_paste')+'" title="'+Text('toolbar_paste')+'"></span></td>' + '\r\n';
				break;
			case "delete":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="delete" src="' + webeditor.buttonpath + 'delete.gif" alt="'+Text('toolbar_delete')+'" title="'+Text('toolbar_delete')+'"></span></td>' + '\r\n';
				break;
			case "selectall":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="selectall" src="' + webeditor.buttonpath + 'selectall.gif" alt="'+Text('toolbar_selectall')+'" title="'+Text('toolbar_selectall')+'"></span></td>' + '\r\n';
				break;
			case "undo":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="undo" src="' + webeditor.buttonpath + 'undo.gif" alt="'+Text('toolbar_undo')+'" title="'+Text('toolbar_undo')+'"></span></td>' + '\r\n';
				break;
			case "redo":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="redo" src="' + webeditor.buttonpath + 'redo.gif" alt="'+Text('toolbar_redo')+'" title="'+Text('toolbar_redo')+'"></span></td>' + '\r\n';
				break;
			case "specialcharacter":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="specialcharacter" src="' + webeditor.buttonpath + 'specialcharacter.gif" alt="'+Text('toolbar_specialcharacter')+'" title="'+Text('toolbar_specialcharacter')+'"></span></td>' + '\r\n';
				break;
			case "insertmedia":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="insertmedia" src="' + webeditor.buttonpath + 'media.gif" alt="'+Text('toolbar_insertmedia')+'" title="'+Text('toolbar_insertmedia')+'"></span></td>' + '\r\n';
				break;
			case "insertimage":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="insertimage" src="' + webeditor.buttonpath + 'image.gif" alt="'+Text('toolbar_insertimage')+'" title="'+Text('toolbar_insertimage')+'"></span></td>' + '\r\n';
				break;
			case "insertflash":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="insertflash" src="' + webeditor.buttonpath + 'flash.gif" alt="'+Text('toolbar_insertflash')+'" title="'+Text('toolbar_insertflash')+'"></span></td>' + '\r\n';
				break;
			case "insertapplet":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="insertapplet" src="' + webeditor.buttonpath + 'applet.gif" alt="'+Text('toolbar_insertapplet')+'" title="'+Text('toolbar_insertapplet')+'"></span></td>' + '\r\n';
				break;
			case "imagemap":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="imagemap" src="' + webeditor.buttonpath + 'imagemap.gif" alt="'+Text('toolbar_imagemap')+'" title="'+Text('toolbar_imagemap')+'"></span></td>' + '\r\n';
				break;
			case "createlink":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="createlink" src="' + webeditor.buttonpath + 'link.gif" alt="'+Text('toolbar_createlink')+'" title="'+Text('toolbar_createlink')+'"></span></td>' + '\r\n';
				break;
			case "mailto":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="mailto" src="' + webeditor.buttonpath + 'mailto.gif" alt="'+Text('toolbar_mailto')+'" title="'+Text('toolbar_mailto')+'"></span></td>' + '\r\n';
				break;
			case "unlink":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="unlink" src="' + webeditor.buttonpath + 'unlink.gif" alt="'+Text('toolbar_unlink')+'" title="'+Text('toolbar_unlink')+'"></span></td>' + '\r\n';
				break;
			case "inserthorizontalrule":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="inserthorizontalrule" src="' + webeditor.buttonpath + 'hr.gif" alt="'+Text('toolbar_inserthorizontalrule')+'" title="'+Text('toolbar_inserthorizontalrule')+'"></span></td>' + '\r\n';
				break;
			case "insertorderedlist":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="insertorderedlist" src="' + webeditor.buttonpath + 'ol.gif" alt="'+Text('toolbar_insertorderedlist')+'" title="'+Text('toolbar_insertorderedlist')+'"></span></td>' + '\r\n';
				break;
			case "insertunorderedlist":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="insertunorderedlist" src="' + webeditor.buttonpath + 'ul.gif" alt="'+Text('toolbar_insertunorderedlist')+'" title="'+Text('toolbar_insertunorderedlist')+'"></span></td>' + '\r\n';
				break;
			case "outdent":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="outdent" src="' + webeditor.buttonpath + 'outdent.gif" alt="'+Text('toolbar_outdent')+'" title="'+Text('toolbar_outdent')+'"></span></td>' + '\r\n';
				break;
			case "indent":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="indent" src="' + webeditor.buttonpath + 'indent.gif" alt="'+Text('toolbar_indent')+'" title="'+Text('toolbar_indent')+'"></span></td>' + '\r\n';
				break;
			case "justify":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="justify" src="' + webeditor.buttonpath + 'justify.gif" alt="'+Text('toolbar_justify')+'" title="'+Text('toolbar_justify')+'" onmouseover="webeditor_menu(\'justify\', this)" onclick="return false;"></span></td>' + '\r\n';
				break;
			case "justifyleft":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="justifyleft" src="' + webeditor.buttonpath + 'justifyleft.gif" alt="'+Text('toolbar_justifyleft')+'" title="'+Text('toolbar_justifyleft')+'"></span></td>' + '\r\n';
				break;
			case "justifycenter":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="justifycenter" src="' + webeditor.buttonpath + 'justifycenter.gif" alt="'+Text('toolbar_justifycenter')+'" title="'+Text('toolbar_justifycenter')+'"></span></td>' + '\r\n';
				break;
			case "justifyright":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="justifyright" src="' + webeditor.buttonpath + 'justifyright.gif" alt="'+Text('toolbar_justifyright')+'" title="'+Text('toolbar_justifyright')+'"></span></td>' + '\r\n';
				break;
			case "justifyfull":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="justifyfull" src="' + webeditor.buttonpath + 'justifyfull.gif" alt="'+Text('toolbar_justifyfull')+'" title="'+Text('toolbar_justifyfull')+'"></span></td>' + '\r\n';
				break;
			case "strikethrough":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="strikethrough" src="' + webeditor.buttonpath + 'strikethrough.gif" alt="'+Text('toolbar_strikethrough')+'" title="'+Text('toolbar_strikethrough')+'"></span></td>' + '\r\n';
				break;
			case "superscript":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="superscript" src="' + webeditor.buttonpath + 'superscript.gif" alt="'+Text('toolbar_superscript')+'" title="'+Text('toolbar_superscript')+'"></span></td>' + '\r\n';
				break;
			case "subscript":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="subscript" src="' + webeditor.buttonpath + 'subscript.gif" alt="'+Text('toolbar_subscript')+'" title="'+Text('toolbar_subscript')+'"></span></td>' + '\r\n';
				break;
			case "table":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="createtable" src="' + webeditor.buttonpath + 'table.gif" alt="'+Text('toolbar_createtable')+'" title="'+Text('toolbar_createtable')+'" onmouseover="webeditor_menu(\'table\', this)"></span></td>' + '\r\n';
				break;
			case "createtable":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="createtable" src="' + webeditor.buttonpath + 'createtable.gif" alt="'+Text('toolbar_createtable')+'" title="'+Text('toolbar_createtable')+'"></span></td>' + '\r\n';
				break;
			case "tableproperties":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="tableproperties" src="' + webeditor.buttonpath + 'tableproperties.gif" alt="'+Text('toolbar_tableproperties')+'" title="'+Text('toolbar_tableproperties')+'"></span></td>' + '\r\n';
				break;
			case "rowproperties":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="rowproperties" src="' + webeditor.buttonpath + 'rowproperties.gif" alt="'+Text('toolbar_rowproperties')+'" title="'+Text('toolbar_rowproperties')+'"></span></td>' + '\r\n';
				break;
			case "insertcaption":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertcaption" src="' + webeditor.buttonpath + 'insertcaption.gif" alt="'+Text('toolbar_insertcaption')+'" title="'+Text('toolbar_insertcaption')+'"></span></td>' + '\r\n';
				break;
			case "insertrowhead":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertrowhead" src="' + webeditor.buttonpath + 'insertrowhead.gif" alt="'+Text('toolbar_insertrowhead')+'" title="'+Text('toolbar_insertrowhead')+'"></span></td>' + '\r\n';
				break;
			case "insertrowfoot":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertrowfoot" src="' + webeditor.buttonpath + 'insertrowfoot.gif" alt="'+Text('toolbar_insertrowfoot')+'" title="'+Text('toolbar_insertrowfoot')+'"></span></td>' + '\r\n';
				break;
			case "insertrowabove":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertrowabove" src="' + webeditor.buttonpath + 'insertrowabove.gif" alt="'+Text('toolbar_insertrowabove')+'" title="'+Text('toolbar_insertrowabove')+'"></span></td>' + '\r\n';
				break;
			case "insertrowbelow":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertrowbelow" src="' + webeditor.buttonpath + 'insertrowbelow.gif" alt="'+Text('toolbar_insertrowbelow')+'" title="'+Text('toolbar_insertrowbelow')+'"></span></td>' + '\r\n';
				break;
			case "deleterow":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="deleterow" src="' + webeditor.buttonpath + 'deleterow.gif" alt="'+Text('toolbar_deleterow')+'" title="'+Text('toolbar_deleterow')+'"></span></td>' + '\r\n';
				break;
			case "splitcellrows":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="splitcellrows" src="' + webeditor.buttonpath + 'splitcellrows.gif" alt="'+Text('toolbar_splitcellrows')+'" title="'+Text('toolbar_splitcellrows')+'"></span></td>' + '\r\n';
				break;
			case "columnproperties":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="columnproperties" src="' + webeditor.buttonpath + 'columnproperties.gif" alt="'+Text('toolbar_columnproperties')+'" title="'+Text('toolbar_columnproperties')+'"></span></td>' + '\r\n';
				break;
			case "insertcolumnleft":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertcolumnleft" src="' + webeditor.buttonpath + 'insertcolumnleft.gif" alt="'+Text('toolbar_insertcolumnleft')+'" title="'+Text('toolbar_insertcolumnleft')+'"></span></td>' + '\r\n';
				break;
			case "insertcolumnright":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertcolumnright" src="' + webeditor.buttonpath + 'insertcolumnright.gif" alt="'+Text('toolbar_insertcolumnright')+'" title="'+Text('toolbar_insertcolumnright')+'"></span></td>' + '\r\n';
				break;
			case "deletecolumn":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="deletecolumn" src="' + webeditor.buttonpath + 'deletecolumn.gif" alt="'+Text('toolbar_deletecolumn')+'" title="'+Text('toolbar_deletecolumn')+'"></span></td>' + '\r\n';
				break;
			case "splitcellcolumns":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="splitcellcolumns" src="' + webeditor.buttonpath + 'splitcellcolumns.gif" alt="'+Text('toolbar_splitcellcolumns')+'" title="'+Text('toolbar_splitcellcolumns')+'"></span></td>' + '\r\n';
				break;
			case "cellproperties":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="cellproperties" src="' + webeditor.buttonpath + 'cellproperties.gif" alt="'+Text('toolbar_cellproperties')+'" title="'+Text('toolbar_cellproperties')+'"></span></td>' + '\r\n';
				break;
			case "insertcellleft":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertcellleft" src="' + webeditor.buttonpath + 'insertcellleft.gif" alt="'+Text('toolbar_insertcellleft')+'" title="'+Text('toolbar_insertcellleft')+'"></span></td>' + '\r\n';
				break;
			case "insertcellright":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="insertcellright" src="' + webeditor.buttonpath + 'insertcellright.gif" alt="'+Text('toolbar_insertcellright')+'" title="'+Text('toolbar_insertcellright')+'"></span></td>' + '\r\n';
				break;
			case "deletecell":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="deletecell" src="' + webeditor.buttonpath + 'deletecell.gif" alt="'+Text('toolbar_deletecell')+'" title="'+Text('toolbar_deletecell')+'"></span></td>' + '\r\n';
				break;
			case "splitcell":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="splitcell" src="' + webeditor.buttonpath + 'splitcell.gif" alt="'+Text('toolbar_splitcell')+'" title="'+Text('toolbar_splitcell')+'"></span></td>' + '\r\n';
				break;
			case "mergecells":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon_disabled" id="mergecells" src="' + webeditor.buttonpath + 'mergecells.gif" alt="'+Text('toolbar_mergecells')+'" title="'+Text('toolbar_mergecells')+'"></span></td>' + '\r\n';
				break;
			case "find":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="find" src="' + webeditor.buttonpath + 'find.gif" alt="'+Text('toolbar_find')+'" title="'+Text('toolbar_find')+'"></span></td>' + '\r\n';
				break;
			case "print":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="print" src="' + webeditor.buttonpath + 'print.gif" alt="'+Text('toolbar_print')+'" title="'+Text('toolbar_print')+'"></span></td>' + '\r\n';
				break;
			case "printbreak":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="printbreak" src="' + webeditor.buttonpath + 'printbreak.gif" alt="'+Text('toolbar_printbreak')+'" title="'+Text('toolbar_printbreak')+'"></span></td>' + '\r\n';
				break;
			case "viewdetails":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="viewdetails" src="' + webeditor.buttonpath + 'viewdetails.gif" alt="'+Text('toolbar_viewdetails')+'" title="'+Text('toolbar_viewdetails')+'"></span></td>' + '\r\n';
				break;
			case "viewsource":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="viewsource" src="' + webeditor.buttonpath + 'viewsource.gif" alt="'+Text('toolbar_viewsource')+'" title="'+Text('toolbar_viewsource')+'"></span></td>' + '\r\n';
				break;
			case "help":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="help" src="' + webeditor.buttonpath + 'help.gif" alt="'+Text('toolbar_help')+'" title="'+Text('toolbar_help')+'"></span></td>' + '\r\n';
				break;
			case "formmenu":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="form" src="' + webeditor.buttonpath + 'formmenu.gif" alt="'+Text('toolbar_form')+'" title="'+Text('toolbar_form')+'" onmouseover="webeditor_menu(\'form\', this)"></span></td>' + '\r\n';
				break;
			case "form":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="form" src="' + webeditor.buttonpath + 'form.gif" alt="'+Text('toolbar_form')+'" title="'+Text('toolbar_form')+'"></span></td>' + '\r\n';
				break;
			case "submitbutton":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="submitbutton" src="' + webeditor.buttonpath + 'submitbutton.gif" alt="'+Text('toolbar_submitbutton')+'" title="'+Text('toolbar_submitbutton')+'"></span></td>' + '\r\n';
				break;
			case "button":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="button" src="' + webeditor.buttonpath + 'button.gif" alt="'+Text('toolbar_button')+'" title="'+Text('toolbar_button')+'"></span></td>' + '\r\n';
				break;
			case "resetbutton":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="resetbutton" src="' + webeditor.buttonpath + 'resetbutton.gif" alt="'+Text('toolbar_resetbutton')+'" title="'+Text('toolbar_resetbutton')+'"></span></td>' + '\r\n';
				break;
			case "backbutton":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="backbutton" src="' + webeditor.buttonpath + 'backbutton.gif" alt="'+Text('toolbar_backbutton')+'" title="'+Text('toolbar_backbutton')+'"></span></td>' + '\r\n';
				break;
			case "imagebutton":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="imagebutton" src="' + webeditor.buttonpath + 'imagebutton.gif" alt="'+Text('toolbar_imagebutton')+'" title="'+Text('toolbar_imagebutton')+'"></span></td>' + '\r\n';
				break;
			case "text":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="text" src="' + webeditor.buttonpath + 'text.gif" alt="'+Text('toolbar_text')+'" title="'+Text('toolbar_text')+'"></span></td>' + '\r\n';
				break;
			case "hidden":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="hidden" src="' + webeditor.buttonpath + 'hidden.gif" alt="'+Text('toolbar_hidden')+'" title="'+Text('toolbar_hidden')+'"></span></td>' + '\r\n';
				break;
			case "textarea":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="textarea" src="' + webeditor.buttonpath + 'textarea.gif" alt="'+Text('toolbar_textarea')+'" title="'+Text('toolbar_textarea')+'"></span></td>' + '\r\n';
				break;
			case "password":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="password" src="' + webeditor.buttonpath + 'password.gif" alt="'+Text('toolbar_password')+'" title="'+Text('toolbar_password')+'"></span></td>' + '\r\n';
				break;
			case "radio":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="radio" src="' + webeditor.buttonpath + 'radio.gif" alt="'+Text('toolbar_radio')+'" title="'+Text('toolbar_radio')+'"></span></td>' + '\r\n';
				break;
			case "checkbox":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="checkbox" src="' + webeditor.buttonpath + 'checkbox.gif" alt="'+Text('toolbar_checkbox')+'" title="'+Text('toolbar_checkbox')+'"></span></td>' + '\r\n';
				break;
			case "select":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="select" src="' + webeditor.buttonpath + 'select.gif" alt="'+Text('toolbar_select')+'" title="'+Text('toolbar_select')+'"></span></td>' + '\r\n';
				break;
			case "file":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="file" src="' + webeditor.buttonpath + 'file.gif" alt="'+Text('toolbar_file')+'" title="'+Text('toolbar_file')+'"></span></td>' + '\r\n';
				break;
			case "clean":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="clean" src="' + webeditor.buttonpath + 'clean.gif" alt="'+Text('toolbar_clean')+'" title="'+Text('toolbar_clean')+'"></span></td>' + '\r\n';
				break;
			case "positionmenu":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="position" src="' + webeditor.buttonpath + 'positionmenu.gif" alt="'+Text('toolbar_position')+'" title="'+Text('toolbar_position')+'" onmouseover="webeditor_menu(\'position\', this)"></span></td>' + '\r\n';
				break;
			case "position":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="position" src="' + webeditor.buttonpath + 'position.gif" alt="'+Text('toolbar_position')+'" title="'+Text('toolbar_position')+'"></span></td>' + '\r\n';
				break;
			case "forwards":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="forwards" src="' + webeditor.buttonpath + 'forwards.gif" alt="'+Text('toolbar_forwards')+'" title="'+Text('toolbar_forwards')+'"></span></td>' + '\r\n';
				break;
			case "backwards":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="backwards" src="' + webeditor.buttonpath + 'backwards.gif" alt="'+Text('toolbar_backwards')+'" title="'+Text('toolbar_backwards')+'"></span></td>' + '\r\n';
				break;
			case "front":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="front" src="' + webeditor.buttonpath + 'front.gif" alt="'+Text('toolbar_front')+'" title="'+Text('toolbar_front')+'"></span></td>' + '\r\n';
				break;
			case "back":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="back" src="' + webeditor.buttonpath + 'back.gif" alt="'+Text('toolbar_back')+'" title="'+Text('toolbar_back')+'"></span></td>' + '\r\n';
				break;
			case "abovetext":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="abovetext" src="' + webeditor.buttonpath + 'abovetext.gif" alt="'+Text('toolbar_abovetext')+'" title="'+Text('toolbar_abovetext')+'"></span></td>' + '\r\n';
				break;
			case "belowtext":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="belowtext" src="' + webeditor.buttonpath + 'belowtext.gif" alt="'+Text('toolbar_belowtext')+'" title="'+Text('toolbar_belowtext')+'"></span></td>' + '\r\n';
				break;
			case "box":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="box" src="' + webeditor.buttonpath + 'box.gif" alt="'+Text('toolbar_box')+'" title="'+Text('toolbar_box')+'"></span></td>' + '\r\n';
				break;
			case "iframe":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="iframe" src="' + webeditor.buttonpath + 'iframe.gif" alt="'+Text('toolbar_iframe')+'" title="'+Text('toolbar_iframe')+'"></span></td>' + '\r\n';
				break;
			case "preview":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="preview" src="' + webeditor.buttonpath + 'preview.gif" alt="'+Text('toolbar_preview')+'" title="'+Text('toolbar_preview')+'"></span></td>' + '\r\n';
				break;
			case "anchor":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="anchor" src="' + webeditor.buttonpath + 'anchor.gif" alt="'+Text('toolbar_anchor')+'" title="'+Text('toolbar_anchor')+'"></span></td>' + '\r\n';
				break;
			case "nobr":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="nobr" src="' + webeditor.buttonpath + 'nobr.gif" alt="'+Text('toolbar_nobr')+'" title="'+Text('toolbar_nobr')+'"></span></td>' + '\r\n';
				break;
			case "import":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="import" src="' + webeditor.buttonpath + 'import.gif" alt="'+Text('toolbar_import')+'" title="'+Text('toolbar_import')+'"></span></td>' + '\r\n';
				break;
			case "save":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="save" src="' + webeditor.buttonpath + 'save.gif" alt="'+Text('toolbar_save')+'" title="'+Text('toolbar_save')+'"></span></td>' + '\r\n';
				break;
		// experimental / deprecated
			case "increasefontsize":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="increasefontsize" src="' + webeditor.buttonpath + 'increasefontsize.gif" alt="'+Text('toolbar_increasefontsize')+'" title="'+Text('toolbar_increasefontsize')+'"></span></td>' + '\r\n';
				break;
			case "decreasefontsize":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="decreasefontsize" src="' + webeditor.buttonpath + 'decreasefontsize.gif" alt="'+Text('toolbar_decreasefontsize')+'" title="'+Text('toolbar_decreasefontsize')+'"></span></td>' + '\r\n';
				break;
			case "usecss":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="usecss" src="' + webeditor.buttonpath + 'usecss.gif" alt="'+Text('toolbar_usecss')+'" title="'+Text('toolbar_usecss')+'"></span></td>' + '\r\n';
				break;
			case "readonly":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="readonly" src="' + webeditor.buttonpath + 'readonly.gif" alt="'+Text('toolbar_readonly')+'" title="'+Text('toolbar_readonly')+'"></span></td>' + '\r\n';
				break;
			case "spellcheck":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="spellcheck" src="' + webeditor.buttonpath + 'spellcheck.gif" alt="'+Text('toolbar_spellcheck')+'" title="'+Text('toolbar_spellcheck')+'"></span></td>' + '\r\n';
				break;
			case "saveas":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="saveas" src="' + webeditor.buttonpath + 'saveas.gif" alt="'+Text('toolbar_saveas')+'" title="'+Text('toolbar_saveas')+'"></span></td>' + '\r\n';
				break;
			case "stylesheet_toggle":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><span style="white-space: nowrap;">&nbsp; <input class="webeditor_input" id="stylesheet_toggle" type="checkbox" name="dummy" value="dummy" checked onClick="contenteditable_stylesheet_toggle(this.checked);">'+Text('toolbar_stylesheet_toggle')+'</span></span></td>' + '\r\n';
				break;
			case "BlockDirLTR":
			case "ltr":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="BlockDirLTR" src="' + webeditor.buttonpath + 'ltr.gif" alt="'+Text('toolbar_ltr')+'" title="'+Text('toolbar_ltr')+'"></span></td>' + '\r\n';
				break;
			case "BlockDirRTL":
			case "rtl":
				cellcount += 1;
				html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="BlockDirRTL" src="' + webeditor.buttonpath + 'rtl.gif" alt="'+Text('toolbar_rtl')+'" title="'+Text('toolbar_rtl')+'"></span></td>' + '\r\n';
				break;
			default:
				cellcount += 1;
				var custom_function;
				try {
					custom_function = eval('webeditor_custom_toolbar_'+elements[j]);
				} catch (e) {
					custom_function = null;
				}
				if (custom_function) {
					try {
						html += eval('webeditor_custom_toolbar_'+elements[j]+'()');
					} catch(e) {
					}
				} else {
					if (Text('toolbar_'+elements[j]) != 'toolbar_'+elements[j]) {
						html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="'+elements[j]+'" src="' + webeditor.buttonpath + ''+elements[j]+'.gif" alt="'+Text('toolbar_'+elements[j])+'" title="'+Text('toolbar_'+elements[j])+'"></span></td>' + '\r\n';
					} else {
						html += '<td class="webeditor_icon"><span unselectable="on" class="webeditor_icon"><img unselectable="on" class="webeditor_icon" id="'+elements[j]+'" src="' + webeditor.buttonpath + ''+elements[j]+'.gif" alt="'+elements[j]+'" title="'+elements[j]+'"></span></td>' + '\r\n';
					}
				}
				break;
			}
		}
		if (cellcount > maxcellcount) maxcellcount = cellcount;
		if (i == (rows.length-1)) {
			html += '<td colspan="' + (maxcellcount - cellcount + 1) + '">&nbsp;</td><td width="100%">&nbsp;</td></tr>' + '\r\n';
		} else {
			html += '<td>&nbsp;</td></tr>' + '\r\n';
		}
	}
	html += '</table>' + '\r\n';

	if (container && (typeof(container)=='string') && document.getElementById(container)) {
		document.getElementById(container).innerHTML = html;
	} else if (container && (typeof(container.innerHTML)!='undefined')) {
		container.innerHTML = html;
	} else if ((container == null) && (typeof(container)=='object')) {
		// null container parameter - ignore completely
	} else {
		document.write(html);
	}
}

function HardCoreWebEditorStylesheet(stylesheet, id) {
	return WebEditorStylesheet(stylesheet, id);
}
function WebEditorStylesheet(stylesheet, id) {
	contenteditable_stylesheet_link(stylesheet, id);
}

function HardCoreWebEditorSubmit() {
	return WebEditorSubmit();
}
function WebEditorSubmit() {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	contenteditable_onSubmit();
}

function WebEditorPreview(id) {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	contenteditable_preview(id);
}

function HardCoreWebEditorGetContent(id) {
	return WebEditorGetContent(id);
}
function WebEditorGetContent(id) {
	webeditor.handling_event = true;
	var content = contenteditable_getContentBodyNode(id).innerHTML;
	if (webeditor.formatcontent) content = contenteditable_formatContent(contenteditable_getContentBodyNode(id));
	if (webeditor.autoclean) content = cleanContentSub(content, webeditor.autocleanAllHTML, webeditor.autocleanAllXML, webeditor.autocleanAllNamespace, webeditor.autocleanAllLang, webeditor.autocleanAllClass, webeditor.autocleanAllStyle, webeditor.autocleanEmptySpan, webeditor.autocleanAllSpan, webeditor.autocleanEmptyFont, webeditor.autocleanAllFont, webeditor.autocleanAllDelIns, webeditor.autocleanEmptyPDiv, webeditor.autocleanAllFormatTags, webeditor.autocleanAllMsoClass, webeditor.autocleanAllMsoStyle, webeditor.autocleanAllMsoConditional, webeditor.autocleanEmptyStyle);
	content = contenteditable_decodeScriptTags(content);
	try {
		if (webeditor_custom_decode) content = webeditor_custom_decode(content);
	} catch(e) {
	}
	try {
		if (webeditor_custom_finalize) content = webeditor_custom_finalize(content);
	} catch(e) {
	}
	content = contenteditable_merge_content(id, content);
	webeditor.handling_event = false;
	return content;
}

function HardCoreWebEditorGetContentSelection(id) {
	return WebEditorGetContentSelection(id);
}
function WebEditorGetContentSelection(id) {
	var content = contenteditable_getContentSelection(id);
//	var content = contenteditable_formatContent(.....);
//	if (webeditor.formatcontent) content = contenteditable_formatContent(.....);
	if (webeditor.autoclean) content = cleanContentSub(content, webeditor.autocleanAllHTML, webeditor.autocleanAllXML, webeditor.autocleanAllNamespace, webeditor.autocleanAllLang, webeditor.autocleanAllClass, webeditor.autocleanAllStyle, webeditor.autocleanEmptySpan, webeditor.autocleanAllSpan, webeditor.autocleanEmptyFont, webeditor.autocleanAllFont, webeditor.autocleanAllDelIns, webeditor.autocleanEmptyPDiv, webeditor.autocleanAllFormatTags, webeditor.autocleanAllMsoClass, webeditor.autocleanAllMsoStyle, webeditor.autocleanAllMsoConditional, webeditor.autocleanEmptyStyle);
	content = contenteditable_decodeScriptTags(content);
	try {
		if (webeditor_custom_decode) content = webeditor_custom_decode(content);
	} catch(e) {
	}
	try {
		if (webeditor_custom_finalize) content = webeditor_custom_finalize(content);
	} catch(e) {
	}
	return content;
}

function WebEditorGetContentSelectionContainer(tagName) {
//QQQ add "id" parameter
	return contenteditable_selection_container(tagName);
}

function HardCoreWebEditorGetContentEdited(id) {
	return WebEditorGetContentEdited(id);
}
function WebEditorGetContentEdited(id) {
	var content;
	if (! id) {
		if (contenteditable_viewsource_status[contenteditable_focused]) {
			var textarea = contenteditable_focused_textarea();
			content = textarea.value;
		} else {
			var iframe = document.getElementsByTagName('iframe').item(contenteditable_focused);
			if (iframe) {
				content = iframe.contentWindow.document.body.innerHTML;
				if (webeditor.formatcontent) content = contenteditable_formatContent(iframe.contentWindow.document.body);
			}
		}
	} else {
		for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
			var iframe = document.getElementsByTagName('iframe').item(i);
			if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
				if (id == iframe.id) {
					if (contenteditable_viewsource_status[i]) {
						contenteditable_focused = i;
						var textarea = contenteditable_focused_textarea();
						content = textarea.value;
					} else {
						content = iframe.contentWindow.document.body.innerHTML;
						if (webeditor.formatcontent) content = contenteditable_formatContent(iframe.contentWindow.document.body);
					}
				}
			}
		}
	}
	if (content) {
		if (webeditor.autoclean) content = cleanContentSub(content, webeditor.autocleanAllHTML, webeditor.autocleanAllXML, webeditor.autocleanAllNamespace, webeditor.autocleanAllLang, webeditor.autocleanAllClass, webeditor.autocleanAllStyle, webeditor.autocleanEmptySpan, webeditor.autocleanAllSpan, webeditor.autocleanEmptyFont, webeditor.autocleanAllFont, webeditor.autocleanAllDelIns, webeditor.autocleanEmptyPDiv, webeditor.autocleanAllFormatTags, webeditor.autocleanAllMsoClass, webeditor.autocleanAllMsoStyle, webeditor.autocleanAllMsoConditional, webeditor.autocleanEmptyStyle);
		content = contenteditable_decodeScriptTags(content);
		try {
			if (webeditor_custom_decode) content = webeditor_custom_decode(content);
		} catch(e) {
		}
		try {
			if (webeditor_custom_finalize) content = webeditor_custom_finalize(content);
		} catch(e) {
		}
		content = contenteditable_merge_content(id, content);
	}
	return content;
}

function HardCoreWebEditorSetContent(content, id) {
	return WebEditorSetContent(content, id);
}
function WebEditorSetContent(content, id) {
	webeditor.handling_event = true;
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	content = webeditor_empty_content_fix(content);
	content = contenteditable_split_content(id, content);
	try {
		if (webeditor_custom_encode) content = webeditor_custom_encode(content);
	} catch(e) {
	}
	try {
		if (webeditor_custom_initialize) content = webeditor_custom_initialize(content);
	} catch(e) {
	}
	content = contenteditable_encodeScriptTags(content);
	contenteditable_setContent(content, id);
	webeditor.handling_event = false;
}

function HardCoreWebEditorPasteContent(content, id) {
	return WebEditorPasteContent(content, id);
}
function WebEditorPasteContent(content, id) {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	try {
		if (webeditor_custom_encode) content = webeditor_custom_encode(content);
	} catch(e) {
	}
	try {
		if (webeditor_custom_initialize) content = webeditor_custom_initialize(content);
	} catch(e) {
	}
	content = contenteditable_encodeScriptTags(content);
	contenteditable_event_paste_do_pre();
	contenteditable_pasteContent(content, id);
	contenteditable_event_paste_do_post();
	contenteditable_event_paste_fix();
}

function HardCoreWebEditorCleanContent(all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style) {
	return WebEditorCleanContent(all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style);
}
function WebEditorCleanContent(all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style) {
	cleanContent(all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style);
}

function HardCoreWebEditorCleanContentString(content, all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style) {
	return WebEditorCleanContentString(content, all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style);
}
function WebEditorCleanContentString(content, all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style) {
	return cleanContentSub(content, all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style);
}



///////////////////////////////////////////////////////////////////////////////////////////////////
// Helper object used for global settings and callback from web editor dialog windows
///////////////////////////////////////////////////////////////////////////////////////////////////

webeditor.insertSpecialCharacter = insertSpecialCharacter;
webeditor.insertHyperlink = insertHyperlink;
webeditor.insertImage = insertImage;
webeditor.insertFlash = insertFlash;
webeditor.insertApplet = insertApplet;
webeditor.insertQuicktime = insertQuicktime;
webeditor.insertTable = insertTable;
webeditor.updateTable = updateTable;
webeditor.updateRow = updateRow;
webeditor.updateColumn = updateColumn;
webeditor.updateCell = updateCell;
webeditor.backColor = backColor;
webeditor.backcolor = backColor;
webeditor.foreColor = foreColor;
webeditor.forecolor = foreColor;
webeditor.insertForm = insertForm;
webeditor.insertButton = insertButton;
webeditor.insertText = insertText;
webeditor.insertHidden = insertHidden;
webeditor.insertTextarea = insertTextarea;
webeditor.insertCheckbox = insertCheckbox;
webeditor.insertFile = insertFile;
webeditor.insertSelect = insertSelect;
webeditor.insertMap = insertMap;
webeditor.cleanContent = cleanContent;
webeditor.insertBox = insertBox;
webeditor.insertIframe = insertIframe;
webeditor.insertAnchor = insertAnchor;
webeditor.insertMailto = insertMailto;
webeditor.importFile = importFile;



///////////////////////////////////////////////////////////////////////////////////////////////////
// Init web editor toolbar event handlers
///////////////////////////////////////////////////////////////////////////////////////////////////

function webeditor_init() {
	contenteditable_init();
	webeditor_init_toolbar();
//	webeditor.inited += 1;
	if (webeditor.inited >= webeditor.count) {
		webeditor_dropdown_refresh('formatclass');
		webeditor_dropdown_refresh('formatblock');
		webeditor_dropdown_refresh('fontname');
		webeditor_dropdown_refresh('fontsize');
	}
	contenteditable_position(true);
}

function webeditor_init_toolbar() {
	var toolbar = contenteditable_toolbar();
	children = toolbar.getElementsByTagName('DIV');
	for (var i=0; i < children.length; i++) {
		if ((children[i].className == "webeditor_button") || (children[i].className == "webeditor_button_selected") || (children[i].className == "webeditor_button_disabled") || (children[i].className == "webeditor_button_mouseover") || (children[i].className == "webeditor_button_mousedown") || (children[i].className == "webeditor_button_mouseup")) {
			if (! contenteditable_getAttribute(children[i], "onmouseover")) children[i].onmouseover = webeditor_button_mouseover;
			if (! contenteditable_getAttribute(children[i], "onmouseout")) children[i].onmouseout = webeditor_button_mouseout;
			if (! contenteditable_getAttribute(children[i], "onmousedown")) children[i].onmousedown = webeditor_button_mousedown;
			if (! contenteditable_getAttribute(children[i], "onmouseup")) children[i].onmouseup = webeditor_button_mouseup;
			if (! contenteditable_getAttribute(children[i], "onclick")) children[i].onclick = webeditor_click;
		}
	}
	children = toolbar.getElementsByTagName('IMG');
	for (var i=0; i < children.length; i++) {
		if ((children[i].className == "webeditor_icon") || (children[i].className == "webeditor_icon_selected") || (children[i].className == "webeditor_icon_disabled") || (children[i].className == "webeditor_icon_mouseover") || (children[i].className == "webeditor_icon_mousedown") || (children[i].className == "webeditor_icon_mouseup")) {
			if (! children[i].onmouseover) children[i].onmouseover = webeditor_icon_mouseover;
			if (! children[i].onmouseout) children[i].onmouseout = webeditor_icon_mouseout;
			if (! children[i].onmousedown) children[i].onmousedown = webeditor_icon_mousedown;
			if (! children[i].onmouseup) children[i].onmouseup = webeditor_icon_mouseup;
			if (! children[i].onclick) children[i].onclick = webeditor_click;
		}
	}
	children = toolbar.getElementsByTagName('SELECT');
	for (var i=0; i < children.length; i++) {
		if ((children[i].className == "webeditor_select") || (children[i].className == "webeditor_select_selected") || (children[i].className == "webeditor_select_disabled")) {
			children[i].onchange = webeditor_select;
			webeditor_select_init(children[i]);
		}
	}
	children = toolbar.getElementsByTagName('INPUT');
	for (var i=0; i < children.length; i++) {
		if ((children[i].className == "webeditor_select") || (children[i].className == "webeditor_select_selected") || (children[i].className == "webeditor_select_disabled")) {
			children[i].onchange = webeditor_select;
			webeditor_select_init(children[i]);
		}
	}
}

var contenteditable_focused_fix = false;
function webeditor_onfocus() {
	contenteditable_focused_fix = contenteditable_focused;
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (webeditor.handling_event) return;
	try {
		var iframe = contenteditable_focused_iframe();
		if ((typeof(webeditor_custom_onfocus) != "undefined") && iframe && iframe.id) webeditor_custom_onfocus(iframe.id);
	} catch(e) {
	}
}

function webeditor_onblur() {
	contenteditable_focused_fix = false;
	if (webeditor.handling_event) return;
	try {
		if (webeditor_custom_onblur) webeditor_custom_onblur(contenteditable_focused_iframe().id);
	} catch(e) {
	}

	if (webeditor && webeditor.content2textareaOnBlur && (! contenteditable_viewsource_status[contenteditable_focused])) {
		var iframe = contenteditable_focused_iframe();
		var form = iframe;
		while ((form.tagName != "FORM") && (form.tagName != "HTML")) {
			form = form.parentNode;
		}
		var textarea = false;
		if (form.tagName != "HTML") {
			textarea = form[iframe.id];
		}
		if (! textarea) {
			textarea = document.getElementById(iframe.id+'_textarea');
		}
		if (textarea) {
			if (webeditor.textarea_content[iframe.id] != iframe.contentWindow.document.body.innerHTML) {
				webeditor.textarea_content[iframe.id] = iframe.contentWindow.document.body.innerHTML;
				var value = iframe.contentWindow.document.body.innerHTML;
				if (webeditor.formatcontent) value = contenteditable_formatContent(iframe.contentWindow.document.body);
				if (webeditor.autoclean) value = cleanContentSub(value, webeditor.autocleanAllHTML, webeditor.autocleanAllXML, webeditor.autocleanAllNamespace, webeditor.autocleanAllLang, webeditor.autocleanAllClass, webeditor.autocleanAllStyle, webeditor.autocleanEmptySpan, webeditor.autocleanAllSpan, webeditor.autocleanEmptyFont, webeditor.autocleanAllFont, webeditor.autocleanAllDelIns, webeditor.autocleanEmptyPDiv, webeditor.autocleanAllFormatTags, webeditor.autocleanAllMsoClass, webeditor.autocleanAllMsoStyle, webeditor.autocleanAllMsoConditional, webeditor.autocleanEmptyStyle);
				value = contenteditable_decodeScriptTags(value);
				try {
					if (webeditor_custom_decode) value = webeditor_custom_decode(value);
				} catch(e) {
				}
				try {
					if (webeditor_custom_finalize) value = webeditor_custom_finalize(value);
				} catch(e) {
				}
				value = contenteditable_merge_content(iframe.id, value);
				textarea.value = value;
				// Safari may not set the textarea value
				if (textarea.value != value) {
					textarea.innerText = value;
				}
			}
		}
	}
}

function webeditor_refreshToolbar(force, timeout) {
	if (webeditor.refreshToolbar == false) return;
	var selection = contenteditable_selection();
	var range = contenteditable_selection_range(selection);
	if (webeditor.refreshToolbarTimeout) clearTimeout(webeditor.refreshToolbarTimeout);
	webeditor.refreshToolbarTimeout = null;
	var start_time = (new Date()).getTime();
	if ((force == true) || ((typeof(contenteditable_selection_range_parentNode) != "undefined") && (contenteditable_selection_range_parentNode() != webeditor.contenteditable_selection_range_parentNode))) {
		webeditor.contenteditable_selection_range_parentNode = contenteditable_selection_range_parentNode();
		var toolbar = contenteditable_toolbar(true);
		webeditor_refreshToolbar_buttons(toolbar);
		webeditor_refreshToolbar_inputs(toolbar);
		webeditor_refreshToolbar_DOM_inspector();
		try {
			if (webeditor_custom_refresh) {
				webeditor_event_handled = webeditor_custom_refresh();
			}
		} catch(e) {
		}
	}
	var end_time = (new Date()).getTime();
	if (! timeout) timeout = (end_time-start_time)*10;
	if (timeout < 100) timeout = 100;
	if (webeditor.refreshToolbarTimeout) clearTimeout(webeditor.refreshToolbarTimeout);
	webeditor.refreshToolbarTimeout = setTimeout(webeditor_refreshToolbar, timeout);
}

function webeditor_refreshToolbar_buttons(toolbar) {
		var positionable = contenteditable_positionable();
		var isTable = contenteditable_isTable();
		var isTableCaption = contenteditable_isTableCaption();
		var isRow = contenteditable_isRow();
		var isCell = contenteditable_isCell();

		var children = toolbar.getElementsByTagName('IMG');
		for (var i=0; i < children.length; i++) {
			try {
				if ((children[i].className == "webeditor_icon") || (children[i].className == "webeditor_icon_selected") || (children[i].className == "webeditor_icon_disabled") || (children[i].className == "webeditor_icon_mousedown") || (children[i].className == "webeditor_icon_mouseup")) {
					if (contenteditable_viewsource_status[contenteditable_focused]) {
						switch(children[i].id) {
						case "viewsource":
							if (children[i].className != "webeditor_icon_selected") {
								children[i].className = "webeditor_icon_selected";
								if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_selected";
							}
							break;
						case "help":
						case "preview":
						case "print":
						case "save":
							if (children[i].className != "webeditor_icon") {
								children[i].className = "webeditor_icon";
								if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
							}
							break;
						default:
							if (children[i].className != "webeditor_icon_disabled") {
								children[i].className = "webeditor_icon_disabled";
								if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
							}
							break;
						}
					} else {
						switch(children[i].id) {
						case "viewsource":
							if (contenteditable_viewsource_status[contenteditable_focused]) {
								if (children[i].className != "webeditor_icon_selected") {
									children[i].className = "webeditor_icon_selected";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_selected";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "bold":
						case "italic":
						case "underline":
						case "strikethrough":
						case "superscript":
						case "subscript":
						case "justifyleft":
						case "justifyright":
						case "justifycenter":
						case "justifyfull":
						case "BlockDirLTR":
						case "BlockDirRTL":
							try {
								var selection_value = contenteditable_focused_document().queryCommandState(children[i].id);
								if (selection_value) {
									if (children[i].className != "webeditor_icon_selected") {
										children[i].className = "webeditor_icon_selected";
										if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_selected";
									}
								} else {
									if (children[i].className != "webeditor_icon") {
										children[i].className = "webeditor_icon";
										if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
									}
								}
							} catch(e) {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "insertunorderedlist":
							var selection_value = contenteditable_formatblock_query().toLowerCase();
							if ((selection_value == "ul") || (selection_value == "bulleted list")) {
								if (children[i].className != "webeditor_icon_selected") {
									children[i].className = "webeditor_icon_selected";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_selected";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "insertorderedlist":
							var selection_value = contenteditable_formatblock_query().toLowerCase();
							if ((selection_value == "ol") || (selection_value == "numbered list")) {
								if (children[i].className != "webeditor_icon_selected") {
									children[i].className = "webeditor_icon_selected";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_selected";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "tableproperties":
						case "insertcaption":
							if (! isTable) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "deleterow":
							if ((! isRow) && (! isTableCaption)) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "rowproperties":
						case "insertrowhead":
						case "insertrowfoot":
						case "insertrowabove":
						case "insertrowbelow":
							if (! isRow) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "splitcellrows":
						case "columnproperties":
						case "insertcolumnleft":
						case "insertcolumnright":
						case "deletecolumn":
						case "splitcellcolumns":
						case "cellproperties":
						case "insertcellleft":
						case "insertcellright":
						case "deletecell":
						case "splitcell":
							if (! isCell) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "mergecells":
							if (! contenteditable_selection_container('table')) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "nobr":
							if (contenteditable_selection_container('nobr')) {
								if (children[i].className != "webeditor_icon_selected") {
									children[i].className = "webeditor_icon_selected";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_selected";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "viewdetails":
							if (contenteditable_viewdetails_status[contenteditable_focused]) {
								if (children[i].className != "webeditor_icon_selected") {
									children[i].className = "webeditor_icon_selected";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_selected";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "position":
						case "forwards":
						case "backwards":
						case "front":
						case "back":
						case "abovetext":
						case "belowtext":
							if (! positionable) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "box":
							// MSIE may crash if inserting box inside text formatting tags
							if (contenteditable_selection_container('span') || contenteditable_selection_container('font') || contenteditable_selection_container('strong') || contenteditable_selection_container('em') || contenteditable_selection_container('u')) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "import":
							if ((webeditor.language == "") || (webeditor.language == "html")) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "spellcheck":
							if ((webeditor.language == "") || (webeditor.language == "html")) {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							} else {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							}
							break;
						case "imagemap":
							if (contenteditable_selection_container('img')) {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							} else {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							}
							break;
						case "createlink":
						case "mailto":
							if (contenteditable_selection_container('a') || (! contenteditable_selection_contains('a'))) {
								if (children[i].className != "webeditor_icon") {
									children[i].className = "webeditor_icon";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
								}
							} else {
								if (children[i].className != "webeditor_icon_disabled") {
									children[i].className = "webeditor_icon_disabled";
									if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon_disabled";
								}
							}
							break;
						default:
							if (children[i].className != "webeditor_icon") {
								children[i].className = "webeditor_icon";
								if (children[i].parentNode.nodeName == "SPAN") children[i].parentNode.className = "webeditor_icon";
							}
							break;
						}
					}
				}
			} catch (e) {
			}
		}
}

function webeditor_refreshToolbar_inputs(toolbar) {
		var children;
		if (webeditor.WYSIWYGselect) {
			children = toolbar.getElementsByTagName('INPUT');
		} else {
			children = toolbar.getElementsByTagName('SELECT');
		}
		for (var i=0; i < children.length; i++) {
			if ((children[i].className == "webeditor_select") || (children[i].className == "webeditor_select_disabled")) {
				if (contenteditable_viewsource_status[contenteditable_focused]) {
					if (children[i].className != "webeditor_select_disabled") children[i].className = "webeditor_select_disabled";
					if (children[i].disabled != true) children[i].disabled = true;
				} else {
					if (children[i].className != "webeditor_select") children[i].className = "webeditor_select";
					if (children[i].disabled != false) children[i].disabled = false;
					switch(children[i].id) {
					case "fontname":
					case "fontsize":
						try {
							var selection_value = ('' + contenteditable_focused_document().queryCommandValue(children[i].id)).toLowerCase();
							if (webeditor.WYSIWYGselect) {
								var selection_option = "";
								for (var name in webeditor_dropdown_options[children[i].id]) if (typeof(webeditor_dropdown_options[children[i].id][name]) != "function") {
									if (selection_value.toLowerCase() == webeditor_dropdown_options[children[i].id][name].toLowerCase()) {
										selection_option = name;
										break;
									} else if (webeditor_dropdown_options[children[i].id][name].toLowerCase().match(new RegExp("^"+selection_value.toLowerCase()+","))) {
										selection_option = name;
										break;
									} else if (webeditor_dropdown_options[children[i].id][name].toLowerCase().match(new RegExp(", "+selection_value.toLowerCase()+","))) {
										selection_option = name;
										break;
									}
								}
								if ((children[i].value != selection_value) && (! webeditor.select_focused[children[i].id])) {
									if (selection_option == "&nbsp;") {
										children[i].value = "";
									} else {
										children[i].value = HtmlDecode(selection_option);
									}
								}
								if ((children[i].value == "") && (webeditor["default_"+children[i].id])) {
									children[i].value = webeditor["default_"+children[i].id];
								}
							} else {
								var selection_index = 0;
								for (var j=0; j < children[i].options.length; j++) {
									if (selection_value.toLowerCase() == children[i].options[j].value.toLowerCase()) {
										selection_index = j;
										break;
									}
								}
								if ((children[i].selectedIndex != selection_index) && (! webeditor.select_focused[children[i].id])) children[i].selectedIndex = selection_index;
							}
						} catch(e) {
						}
						break;
					case "formatblock":
						try {
							var selection_name = contenteditable_formatblock_query();
							var selection_value = '<' + selection_name + '>';
							if (selection_value == "<normal>") {
								selection_value = "<p>";
							} else if (selection_value == "<formatted>") {
								selection_value = "<pre>";
							} else if (selection_value == "<heading 1>") {
								selection_value = "<h1>";
							} else if (selection_value == "<heading 2>") {
								selection_value = "<h2>";
							} else if (selection_value == "<heading 3>") {
								selection_value = "<h3>";
							} else if (selection_value == "<heading 4>") {
								selection_value = "<h4>";
							} else if (selection_value == "<heading 5>") {
								selection_value = "<h5>";
							} else if (selection_value == "<heading 6>") {
								selection_value = "<h6>";
							} else if (selection_value == "<numbered list>") {
								selection_value = "<ol>";
							} else if (selection_value == "<bulleted list>") {
								selection_value = "<ul>";
							} else if (selection_value == "<directory list>") {
								selection_value = "<dir>";
							} else if (selection_value == "<menu list>") {
								selection_value = "<menu>";
							} else if (selection_value == "<definition term>") {
								selection_value = "<dt>";
							} else if (selection_value == "<definition>") {
								selection_value = "<dd>";
							}
							if (webeditor.WYSIWYGselect) {
								var selection_option = "";
								for (var name in webeditor_dropdown_options[children[i].id]) if (typeof(webeditor_dropdown_options[children[i].id][name]) != "function") {
									if (selection_value.toLowerCase() == webeditor_dropdown_options[children[i].id][name].toLowerCase()) {
										selection_option = name;
										break;
									}
									if (selection_name.toLowerCase() == name.toLowerCase()) {
										selection_option = name;
										break;
									}
								}
								if ((children[i].value != selection_value) && (! webeditor.select_focused[children[i].id])) {
									if (selection_option == "&nbsp;") {
										children[i].value = "";
									} else {
										children[i].value = HtmlDecode(selection_option);
									}
								}
								if ((children[i].value == "") && (webeditor["default_"+children[i].id])) {
									children[i].value = webeditor["default_"+children[i].id];
								}
							} else {
								var selection_index = 0;
								for (var j=0; j < children[i].options.length; j++) {
									if (selection_value.toLowerCase() == children[i].options[j].value.toLowerCase()) {
										selection_index = j;
										break;
									}
									if (selection_name.toLowerCase() == children[i].options[j].text.toLowerCase()) {
										selection_index = j;
										break;
									}
								}
								if ((children[i].selectedIndex != selection_index) && (! webeditor.select_focused[children[i].id])) children[i].selectedIndex = selection_index;
							}
						} catch(e) {
						}
						break;
					case "formatclass":
						try {
							webeditor_refreshStylesheet(contenteditable_focused_document());
							var selection_name = contenteditable_formatclass_query();
							var selection_value = '<' + selection_name + '>';
							if (webeditor.WYSIWYGselect) {
								var selection_option = "";
								var stylesheetclassnames = webeditor.stylesheetclassnames;
								if ((! stylesheetclassnames) && parent.webeditor) {
									stylesheetclassnames = parent.webeditor.stylesheetclassnames;
								}
								var stylesheetclassvalues = webeditor.stylesheetclassvalues;
								if ((! stylesheetclassvalues) && parent.webeditor) {
									stylesheetclassvalues = parent.webeditor.stylesheetclassvalues;
								}
								if (stylesheetclassnames && stylesheetclassvalues) {
									for (var j in stylesheetclassnames) if (typeof(stylesheetclassnames[j]) != "function") {
										var myclassname = stylesheetclassnames[j];
										var myclassvalue = stylesheetclassvalues[myclassname];
										if (myclassname) {
											if (selection_value.toLowerCase() == myclassvalue.toLowerCase()) {
												selection_option = myclassname;
												break;
											}
											if (selection_name.toLowerCase() == myclassvalue.toLowerCase()) {
												selection_option = myclassname;
												break;
											}
											if (selection_name.toLowerCase() == myclassname.toLowerCase()) {
												selection_option = myclassname;
												break;
											}
										}
									}
								}
								if ((children[i].value != selection_option) && (! webeditor.select_focused[children[i].id])) {
									if (selection_option == "&nbsp;") {
										children[i].value = "";
									} else {
										children[i].value = HtmlDecode(selection_option);
									}
								}
								if ((children[i].value == "") && (webeditor["default_"+children[i].id])) {
									children[i].value = webeditor["default_"+children[i].id];
								}
							} else {
								var selection_index = 0;
								var selection_option = 1;
								var stylesheetclassnames = webeditor.stylesheetclassnames;
								if ((! stylesheetclassnames) && parent.webeditor) {
									stylesheetclassnames = parent.webeditor.stylesheetclassnames;
								}
								var stylesheetclassvalues = webeditor.stylesheetclassvalues;
								if ((! stylesheetclassvalues) && parent.webeditor) {
									stylesheetclassvalues = parent.webeditor.stylesheetclassvalues;
								}
								if (stylesheetclassnames && stylesheetclassvalues) {
									for (var j in stylesheetclassnames) if (typeof(stylesheetclassnames[j]) != "function") {
										var myclassname = stylesheetclassnames[j];
										var myclassvalue = stylesheetclassvalues[myclassname];
										if (myclassname) {
											if ((! children[i].options[selection_option]) || (children[i].options[selection_option].value != myclassvalue)) {
												var myoption = new Option(myclassname, myclassvalue, false, false);
												children[i].options[selection_option] = myoption;
											}
											if (selection_value.toLowerCase() == children[i].options[selection_option].value.toLowerCase()) {
												selection_index = selection_option;
											}
											if (selection_name.toLowerCase() == children[i].options[selection_option].value.toLowerCase()) {
												selection_index = selection_option;
											}
											if (selection_name.toLowerCase() == children[i].options[selection_option].text.toLowerCase()) {
												selection_index = selection_option;
											}
											selection_option++;
										}
									}
								}
								for (var j=children[i].options.length; j>selection_option; j--) {
									children[i].options[j-1] = null;
								}
								if ((children[i].selectedIndex != selection_index) && (! webeditor.select_focused[children[i].id])) children[i].selectedIndex = selection_index;
							}
						} catch(e) {
						}
						break;
					}
				}
			}
		}

		var children = toolbar.getElementsByTagName('INPUT');
		for (var i=0; i < children.length; i++) {
			if ((children[i].className == "webeditor_input") || (children[i].className == "webeditor_input_disabled")) {
				if (contenteditable_viewsource_status[contenteditable_focused]) {
					if (children[i].className != "webeditor_input_disabled") children[i].className = "webeditor_input_disabled";
					if (children[i].disabled != true) children[i].disabled = true;
				} else {
					if (children[i].className != "webeditor_input") children[i].className = "webeditor_input";
					if (children[i].disabled != false) children[i].disabled = false;
				}
			}
		}
}

function webeditor_refreshToolbar_DOM_inspector() {
		var iframe;
		if (iframe = contenteditable_focused_iframe()) {
			if (DOM_inspector = document.getElementById('webeditor_DOM_inspector_'+iframe.id) || document.getElementById('webeditor_DOM_inspector')) {
				if ((parentnode = contenteditable_selection_container()) && (! contenteditable_viewsource_status[contenteditable_focused])) {
					// MSIE may change image src to absolute URL on drag and drop
					// MSIE may not trigger dragend/mouseup event on dragged/dropped image
					contenteditable_dragdrop_fix(parentnode);

					var attributes = "";
					if (parentnode && parentnode.attributes && (parentnode.nodeName != "BODY")) {
						attributes = contenteditable_node_attributes(parentnode);
					}
					var level = 0;
					var hierarchy = "";
					for (var node=parentnode; (node && (node.nodeType == 1)); node=node.parentNode) {
//						if ((node.nodeName == "BODY") && (node.className != "WebEditor")) {
//							hierarchy = "";
//							attributes = "";
//							break;
//						}
						if ((node.nodeName != "HTML") && (node.nodeName != "BODY") && (node.nodeName != "HEAD") && (node.nodeName != "BASE")) {
							if (hierarchy) hierarchy = " > " + hierarchy;
							hierarchy = '</a>' + hierarchy;
							hierarchy = node.nodeName + hierarchy;
							hierarchy = '<a href="javascript:webeditor_DOMselect(' + level + ',\'' + node.nodeName + '\',\'' + iframe.id + '\');">' + hierarchy;
						} else if ((node.nodeName != "HEAD") && (node.nodeName != "BASE")) {
							if (hierarchy) hierarchy = " > " + hierarchy;
							hierarchy = node.nodeName + hierarchy;
						}
						level++;
					}
					if (hierarchy) {
						switch (parentnode.nodeName) {
						case "HTML":
						case "BODY":
						case "TABLE":
						case "THEAD":
						case "TBODY":
						case "TFOOT":
						case "TR":
						case "TD":
						case "OL":
						case "UL":
						case "LI":
							remove = '';
							break;
						default:
							remove = '<a style="color: red;" href="javascript:webeditor_remove_parentnode(\'' + iframe.id + '\');">' + Text('dominspector_remove') + '</a>';
							break;
						}
						var html = hierarchy;
						if (attributes) html += ' ' + attributes;
						if (remove) html += ' &lt;&lt;&lt; ' + remove;
						if (DOM_inspector.HardCoreDOMInspectorInnerHTML != html) {
							DOM_inspector.HardCoreDOMInspectorInnerHTML = html;
							DOM_inspector.innerHTML = html;
						}
					}
				} else {
					if (DOM_inspector.HardCoreDOMInspectorInnerHTML != "&nbsp;") {
						DOM_inspector.HardCoreDOMInspectorInnerHTML = "&nbsp;";
						DOM_inspector.innerHTML = "&nbsp;";
					}
				}
			}
		}
}

function webeditor_refreshStylesheet(mydocument) {
	var stylesheetclasshref = contenteditable_stylesheet[contenteditable_focused_iframe().id];
	if ((! webeditor.stylesheetclassnames) || (! webeditor.stylesheetclassnames.length) || (webeditor.stylesheetclasshref != stylesheetclasshref)) {
		webeditor.stylesheetclassnames = new Array();
		webeditor.stylesheetclassvalues = new Array();
		webeditor.stylesheetcolours = new Array();
		if (mydocument.styleSheets.length) {
			for (var stylesheet=0; stylesheet<mydocument.styleSheets.length; stylesheet++) {
				if ((stylesheetclasshref != '') && (mydocument.styleSheets[stylesheet].href.indexOf(stylesheetclasshref) >= 0) && ((mydocument.styleSheets[stylesheet].id == "stylesheet") || (! mydocument.styleSheets[stylesheet].id))) {
					var cssrules = contenteditable_document_stylesheets_cssrules(mydocument.styleSheets[stylesheet]);
					webeditor_refreshStylesheet_cssRules(cssrules);
					webeditor.stylesheetclasshref = stylesheetclasshref;
				}
			}
		}
		webeditor.stylesheetclassnames = webeditor.stylesheetclassnames.sort();
	}
}

function webeditor_refreshStylesheet_cssRules(cssrules) {
	if (cssrules.length) {
		for (var rule=0; rule<cssrules.length; rule++) {
			if (cssrules[rule].selectorText) {
				var selectors = cssrules[rule].selectorText.split(",");
				var selectorText = cssrules[rule].selectorText;
				for (var selector in selectors) if (typeof(selectors[selector]) != "function") {
					selectorText = selectors[selector];
					if (selectorText.match(new RegExp("^.*\\.([-a-zA-Z0-9_]*).*$"))) {
						var myclassname = selectorText.replace(/^.*\.([-a-zA-Z0-9_]*).*$/, "$1");
						var myclassvalue = myclassname;
						try {
							if (webeditor_custom_formatclass_option) myclassname = webeditor_custom_formatclass_option(myclassname);
						} catch(e) {
						}
						if (myclassname && myclassvalue && (! webeditor.stylesheetclassvalues[myclassname])) {
							webeditor.stylesheetclassnames[webeditor.stylesheetclassnames.length] = myclassname;
							webeditor.stylesheetclassvalues[myclassname] = myclassvalue;
						}
					}
				}
				// CSS/DOM web browser support may vary
				// Check CSS/DOM attributes
				for (var attribute in cssrules[rule].style) if (typeof(cssrules[rule].style[attribute]) != "function") {
					if (((attribute == "color") || (attribute == "backgroundColor")) && (cssrules[rule].style[attribute] != '')) {
						webeditor_refreshStylesheet_cssRules_colour(cssrules[rule].style[attribute]);
					}
				}
				// Check CSS/DOM methods
				if (cssrules[rule].style.getPropertyValue) {
					webeditor_refreshStylesheet_cssRules_colour(cssrules[rule].style.getPropertyValue('color'));
					webeditor_refreshStylesheet_cssRules_colour(cssrules[rule].style.getPropertyValue('background-color'));
				} else if (cssrules[rule].style.getAttribute) {
					webeditor_refreshStylesheet_cssRules_colour(cssrules[rule].style.getAttribute('color'));
					webeditor_refreshStylesheet_cssRules_colour(cssrules[rule].style.getAttribute('backgroundColor'));
				}
				// Check CSS/DOM cssText
				if (cssrules[rule].style.cssText.match(new RegExp("[^a-z]background-color:\\s([^;]+);"))) {
					webeditor_refreshStylesheet_cssRules_colour(RegExp.$1);
				}
				if (cssrules[rule].style.cssText.match(new RegExp("[^a-z]color:\\s([^;]+);"))) {
					webeditor_refreshStylesheet_cssRules_colour(RegExp.$1);
				}
			} else if (cssrules[rule].cssRules) {
				webeditor_refreshStylesheet_cssRules(cssrules[rule].cssRules);
			}
		}
	}
}

function webeditor_refreshStylesheet_cssRules_colour(colour) {
	if (! colour) return;
	if (webeditor.stylesheetcolours) {
		for (var i=0; i<=webeditor.stylesheetcolours.length; i++) {
			if (i == webeditor.stylesheetcolours.length) {
				webeditor.stylesheetcolours[webeditor.stylesheetcolours.length] = colour;
				break;
			} else if (webeditor.stylesheetcolours[i] == colour) {
				break;
			}
		}
	}
}

// Safari DOM Inspector cannot call function named "webeditor_select_parentnode" - rename it to "webeditor_DOMselect" - keep wrapper function with the old name for backwards compatibility
function webeditor_select_parentnode(select_level, select_node, id) {
	return webeditor_DOMselect(select_level, select_node, id);
}
function webeditor_DOMselect(select_level, select_node, id) {
	contenteditable_selection_fix();
	if ((iframe = contenteditable_focused_iframe()) && ((iframe.id == id) || (! id)))  {
		var parentnode = contenteditable_selection_container();
		var level = 0;
		for (var node=parentnode; (node && (node.nodeType == 1)); node=node.parentNode) {
			if (level == select_level) {
				if (node.nodeName == select_node) {
					contenteditable_selection_node(node);
				} else if (node.firstChild && node.firstChild.nodeName == select_node) {
					contenteditable_selection_node(node.firstChild);
				}
				if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
			}
			level++;
		}
		webeditor_refreshToolbar(true);
	}
}

function webeditor_remove_parentnode(id) {
	contenteditable_selection_fix();
	if ((iframe = contenteditable_focused_iframe()) && ((iframe.id == id) || (! id)))  {
		if (node = contenteditable_selection_container()) {
			switch (node.nodeName) {
			case "HTML":
			case "BODY":
			case "TABLE":
			case "THEAD":
			case "TBODY":
			case "TFOOT":
			case "TR":
			case "TD":
			case "OL":
			case "UL":
			case "LI":
				break;
			default:
				contenteditable_remove_parentnode(node);
				webeditor_refreshToolbar(true);
				if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
				break;
			}
		}
	}
}

// Web editor toolbar event handlers

function webeditor_event(evt) {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	var my_event = (evt) ? evt : ((event) ? event : null);
	if (webeditor.disabled) {
		contenteditable_event_stop(my_event);
		return;
	}
	webeditor.selection_node = "";
	contenteditable_undo_init();
	var webeditor_event_handled = false;
	try {
		if (webeditor_custom_event) {
			webeditor_event_handled = webeditor_custom_event(my_event);
		}
	} catch(e) {
	}
	if (! webeditor_event_handled) {
		contenteditable_event_paste(my_event);
		contenteditable_event_enter(my_event);
		contenteditable_event_delete(my_event);
		contenteditable_event_dragdrop(my_event);
//		if (contenteditable_event_ctrlkey(event) && contenteditable_event_key(event)) {
//			// check for and handle CTRL+key events here
//			contenteditable_event_stop(event);
//		}
	}
	if (webeditor.refreshToolbarTimeout) clearTimeout(webeditor.refreshToolbarTimeout);
	webeditor.refreshToolbarTimeout = setTimeout(webeditor_refreshToolbar, 100);
}

function webeditor_button_mousedown() {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if (this.className != "webeditor_button_disabled") this.className = "webeditor_button_mousedown";
}

function webeditor_button_mouseup() {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if (this.className != "webeditor_button_disabled") this.className = "webeditor_button_mouseup";
}

function webeditor_button_mouseout() {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	webeditor.handling_event = false;
	if (this.className != "webeditor_button_disabled") this.className = "webeditor_button";
	if (webeditor.refreshToolbarTimeout) clearTimeout(webeditor.refreshToolbarTimeout);
	webeditor.refreshToolbarTimeout = setTimeout(webeditor_refreshToolbar, 100);
}

function webeditor_button_mouseover() {
	webeditor_menu_hide();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (this.className != "webeditor_button_disabled") this.className = "webeditor_button_mouseover";
	webeditor.handling_event = true;
}

function webeditor_icon_mousedown() {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if (this.className != "webeditor_icon_disabled") {
		this.className = "webeditor_icon_mousedown";
		if (this.parentNode.nodeName == "SPAN") this.parentNode.className = "webeditor_icon_mousedown";
	}
	return false;
}

function webeditor_icon_mouseup() {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if (this.className != "webeditor_icon_disabled") {
		this.className = "webeditor_icon_mouseup";
		if (this.parentNode.nodeName == "SPAN") this.parentNode.className = "webeditor_icon_mouseup";
	}
}

function webeditor_icon_mouseout() {
	if ((typeof(webeditor) == "undefined") || (! webeditor)) return;
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	webeditor.handling_event = false;
	if ((this.className != "webeditor_icon_disabled") && (this.className != "webeditor_icon_selected")) {
		this.className = "webeditor_icon";
		if (this.parentNode.nodeName == "SPAN") this.parentNode.className = "webeditor_icon";
	}
	if (webeditor.refreshToolbarTimeout) clearTimeout(webeditor.refreshToolbarTimeout);
	if (typeof(webeditor_refreshToolbar) != "undefined") webeditor.refreshToolbarTimeout = setTimeout(webeditor_refreshToolbar, 100);
}

function webeditor_icon_mouseover() {
	if ((typeof(webeditor) == "undefined") || (! webeditor)) return;
	webeditor_menu_hide();
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if ((this.className != "webeditor_icon_disabled") && (this.className != "webeditor_icon_selected")) {
		this.className = "webeditor_icon_mouseover";
		if (this.parentNode.nodeName == "SPAN") this.parentNode.className = "webeditor_icon_mouseover";
	}
	webeditor.handling_event = true;
}

function webeditor_menu_mousedown() {
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if (this.className != "webeditor_menu_disabled") this.className = "webeditor_menu_mousedown";
	return false;
}

function webeditor_menu_mouseup() {
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if (this.className != "webeditor_menu_disabled") this.className = "webeditor_menu_mouseup";
}

function webeditor_menu_mouseout() {
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if ((typeof(webeditor) == "undefined") || (! webeditor)) return;
	if ((this.className != "webeditor_menu_disabled") && (this.className != "webeditor_menu")) this.className = "webeditor_menu";
}

function webeditor_menu_mouseover(menuitem) {
	if ((typeof(webeditor) == "undefined") || (! webeditor)) return;
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	if (menuitem) {
		if ((menuitem.className != "webeditor_menu_disabled") && (menuitem.className != "webeditor_menu_mouseover")) menuitem.className = "webeditor_menu_mouseover";
	}
	if ((this.className != "webeditor_menu_disabled") && (this.className != "webeditor_menu_mouseover")) this.className = "webeditor_menu_mouseover";
	if (this.className != "webeditor_menu") webeditor_submenu_hide();
}

function webeditor_submenu_mouseout() {
	if ((typeof(webeditor) == "undefined") || (! webeditor)) return;
	if (webeditor_submenu_parent) webeditor_submenu_parent.className = "webeditor_menu";
	if (this.className != "webeditor_menu_disabled") this.className = "webeditor_menu";
}

function webeditor_submenu_mouseover() {
	if ((typeof(webeditor) == "undefined") || (! webeditor)) return;
	if (webeditor_submenu_parent) webeditor_submenu_parent.className = "webeditor_menu_mouseover";
	if (this.className != "webeditor_menu_disabled") this.className = "webeditor_menu_mouseover";
	var submenu = document.getElementById("submenu_dropdown");
	if (submenu && submenu.name) {
		var menu = document.getElementById(submenu.name);
		if (menu) menu.className = "webeditor_menu_mouseover";
	}
}

function webeditor_click() {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	contenteditable_focus_toolbar(this);
//	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	if (this.className == "webeditor_icon_disabled") return;
	if (this.className == "webeditor_menu_disabled") return;
	webeditor_menu_hide();
	if (! webeditor_supported(this.id)) return;
	var custom_function;
	try {
		custom_function = eval('webeditor_custom_'+this.id);
	} catch (e) {
		custom_function = null;
	}
	if (custom_function) {
		try {
			contenteditable_undo_save();
			eval('webeditor_custom_'+this.id+'()');
			contenteditable_undo_save();
		} catch(e) {
		}
	} else if (this.id == "help") {
		webeditor_help();
	} else if (this.id == "preview") {
		contenteditable_preview();
	} else if (this.id == "print") {
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
		if (! contenteditable_print(this.id)) {
			alert(Text('print_alert'));
		}
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "save") {
		contenteditable_save();
	} else if (this.id == "viewsource") {
		contenteditable_undo_save();
		contenteditable_viewsource(this.checked);
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (contenteditable_viewsource_status[contenteditable_focused]) {
		// ignore
	} else if (this.id == "specialcharacter") {
		webeditor_specialcharacter();
	} else if (this.id == "createtable") {
		webeditor_createtable();
	} else if (this.id == "selecttable") {
		contenteditable_selecttable();
	} else if (this.id == "selectrow") {
		contenteditable_selectrow();
	} else if (this.id == "selectcolumn") {
		contenteditable_selectcolumn();
	} else if (this.id == "selectcell") {
		contenteditable_selectcell();
	} else if (this.id == "tableproperties") {
		webeditor_tableproperties();
	} else if (this.id == "rowproperties") {
		webeditor_rowproperties();
	} else if (this.id == "columnproperties") {
		webeditor_columnproperties();
	} else if (this.id == "cellproperties") {
		webeditor_cellproperties();
	} else if (this.id == "insertcaption") {
		contenteditable_undo_save();
		contenteditable_insertcaption();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertrowhead") {
		contenteditable_undo_save();
		contenteditable_insertrowhead();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertrowfoot") {
		contenteditable_undo_save();
		contenteditable_insertrowfoot();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertrowabove") {
		contenteditable_undo_save();
		contenteditable_insertrowabove();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertrowbelow") {
		contenteditable_undo_save();
		contenteditable_insertrowbelow();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "deleterow") {
		contenteditable_undo_save();
		contenteditable_deleterow();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertcolumnleft") {
		contenteditable_undo_save();
		contenteditable_insertcolumnleft();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertcolumnright") {
		contenteditable_undo_save();
		contenteditable_insertcolumnright();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "deletecolumn") {
		contenteditable_undo_save();
		contenteditable_deletecolumn();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertcellleft") {
		contenteditable_undo_save();
		contenteditable_insertcellleft();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertcellright") {
		contenteditable_undo_save();
		contenteditable_insertcellright();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "deletecell") {
		contenteditable_undo_save();
		contenteditable_deletecell();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "mergecells") {
		contenteditable_undo_save();
		contenteditable_mergecells();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "splitcell") {
		contenteditable_undo_save();
		contenteditable_splitcell();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "splitcellrows") {
		contenteditable_undo_save();
		contenteditable_splitcellrows();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "splitcellcolumns") {
		contenteditable_undo_save();
		contenteditable_splitcellcolumns();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "insertmedia") {
		webeditor_insertmedia();
	} else if (this.id == "insertimage") {
		webeditor_insertmedia();
	} else if (this.id == "insertflash") {
		webeditor_insertmedia();
	} else if (this.id == "insertapplet") {
		webeditor_insertmedia();
	} else if (this.id == "insertquicktime") {
		webeditor_insertquicktime();
	} else if (this.id == "imagemap") {
		webeditor_imagemap();
	} else if (this.id == "createlink") {
		webeditor_createlink();
	} else if (this.id == "mailto") {
		webeditor_mailto();
	} else if (this.id == "backcolor") {
		webeditor_backcolor();
	} else if (this.id == "forecolor") {
		webeditor_forecolor();
	} else if (this.id == "form") {
		webeditor_form();
	} else if (this.id == "button") {
		webeditor_button();
	} else if (this.id == "submitbutton") {
		webeditor_submitbutton();
	} else if (this.id == "resetbutton") {
		webeditor_resetbutton();
	} else if (this.id == "backbutton") {
		webeditor_backbutton();
	} else if (this.id == "imagebutton") {
		webeditor_imagebutton();
	} else if (this.id == "text") {
		webeditor_text();
	} else if (this.id == "password") {
		webeditor_password();
	} else if (this.id == "textarea") {
		webeditor_textarea();
	} else if (this.id == "checkbox") {
		webeditor_checkbox();
	} else if (this.id == "radio") {
		webeditor_radio();
	} else if (this.id == "select") {
		webeditor_selectlist();
	} else if (this.id == "hidden") {
		webeditor_hidden();
	} else if (this.id == "file") {
		webeditor_file();
	} else if (this.id == "clean") {
		webeditor_clean();
	} else if (this.id == "position") {
		contenteditable_undo_save();
		contenteditable_position();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "forwards") {
		contenteditable_undo_save();
		contenteditable_forwards();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "backwards") {
		contenteditable_undo_save();
		contenteditable_backwards();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "front") {
		contenteditable_undo_save();
		contenteditable_front();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "back") {
		contenteditable_undo_save();
		contenteditable_back();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "abovetext") {
		contenteditable_undo_save();
		contenteditable_abovetext();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "belowtext") {
		contenteditable_undo_save();
		contenteditable_belowtext();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "box") {
		webeditor_box();
	} else if (this.id == "iframe") {
		webeditor_iframe();
	} else if (this.id == "import") {
		webeditor_import();
	} else if (this.id == "spellcheck") {
		contenteditable_spellcheck();
	} else if (this.id == "nobr") {
		contenteditable_undo_save();
		contenteditable_nobr();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "anchor") {
		webeditor_anchor();
	} else if (this.id == "printbreak") {
		contenteditable_undo_save();
		contenteditable_printbreak();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "undo") {
		if (webeditor.undo != false) {
			contenteditable_undo();
		} else {
			contenteditable_execcommand("undo");
		}
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "redo") {
		if (webeditor.undo != false) {
			contenteditable_redo();
		} else {
			contenteditable_execcommand("redo");
		}
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "viewdetails") {
		contenteditable_undo_save();
		contenteditable_viewdetails(this.checked);
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "find") {
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
		if (! contenteditable_find(this.id)) {
			alert(Text('find_alert'));
		}
	} else if (this.id == "cut") {
		contenteditable_undo_save();
		if (webeditor.clipboard) webeditor.clipboardHTML = contenteditable_getContentSelection();
		if (! contenteditable_execcommand(this.id)) {
			alert(Text('cut_alert'));
		}
		contenteditable_webeditor_clipboard_cut();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "copy") {
		if (webeditor.clipboard) webeditor.clipboardHTML = contenteditable_getContentSelection();
		if (! contenteditable_execcommand(this.id)) {
			alert(Text('copy_alert'));
		}
		contenteditable_webeditor_clipboard_copy();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "paste") {
		if (contenteditable_webeditor_clipboard_paste()) {
			contenteditable_paste_replacement_fix();
		} else if (! contenteditable_execcommand(this.id)) {
			alert(Text('paste_alert'));
		}
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "saveas") {
		if (! contenteditable_execcommand(this.id)) {
			alert(Text('saveas_alert'));
		}
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "removeformat") {
		contenteditable_undo_save();
		contenteditable_execcommand(this.id);
		contenteditable_removeformat();
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "selectall") {
		contenteditable_selection_all();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "BlockDirLTR") {
		contenteditable_BlockDirLTR(this.id);
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "BlockDirRTL") {
		contenteditable_BlockDirRTL(this.id);
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (this.id == "inserthorizontalrule") {
		contenteditable_undo_save();
		var mycontainer;
		if (mycontainer = contenteditable_selection_container('p')) {
			mycontainer.parentElement.insertBefore(contenteditable_focused_document().createElement("hr"), mycontainer);
		} else if (mycontainer = contenteditable_selection_container('h1')) {
			mycontainer.parentElement.insertBefore(contenteditable_focused_document().createElement("hr"), mycontainer);
		} else if (mycontainer = contenteditable_selection_container('h2')) {
			mycontainer.parentElement.insertBefore(contenteditable_focused_document().createElement("hr"), mycontainer);
		} else if (mycontainer = contenteditable_selection_container('h3')) {
			mycontainer.parentElement.insertBefore(contenteditable_focused_document().createElement("hr"), mycontainer);
		} else if (mycontainer = contenteditable_selection_container('h4')) {
			mycontainer.parentElement.insertBefore(contenteditable_focused_document().createElement("hr"), mycontainer);
		} else if (mycontainer = contenteditable_selection_container('h5')) {
			mycontainer.parentElement.insertBefore(contenteditable_focused_document().createElement("hr"), mycontainer);
		} else if (mycontainer = contenteditable_selection_container('h6')) {
			mycontainer.parentElement.insertBefore(contenteditable_focused_document().createElement("hr"), mycontainer);
		} else if (mycontainer = contenteditable_selection_container('address')) {
			mycontainer.parentElement.insertBefore(contenteditable_focused_document().createElement("hr"), mycontainer);
		} else {
			contenteditable_execcommand(this.id);
		}
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else {
		contenteditable_undo_save();
		contenteditable_execcommand(this.id);
		contenteditable_undo_save();
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	}
	if (webeditor.refreshToolbarTimeout) clearTimeout(webeditor.refreshToolbarTimeout);
	webeditor.refreshToolbarTimeout = setTimeout(webeditor_refreshToolbar, 100);
}

function webeditor_select() {
	var id = this.id;
	var value = this.value;
	if (! webeditor_supported(id)) return;
	if ((id != "undo") && (id != "redo")) contenteditable_undo_save();
	if (id == "formatclass") {
		webeditor_select_focus();
		contenteditable_formatclass(id,value);
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
		contenteditable_formatclass_fix();
	} else if (id == "formatblock") {
		webeditor_select_focus();
		contenteditable_formatblock(id,value);
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (id == "fontname") {
		webeditor_select_focus();
		contenteditable_fontname(id,value);
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else if (id == "fontsize") {
		webeditor_select_focus();
		contenteditable_fontsize(id,value);
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	} else {
		webeditor_select_focus();
		var custom_function;
		try {
			custom_function = eval('webeditor_custom_'+id);
		} catch (e) {
			custom_function = null;
		}
		if (custom_function) {
			try {
				eval('webeditor_custom_'+id+'(\''+value+'\')');
			} catch(e) {
			}
		} else {
			contenteditable_execcommand(id,value);
		}
		if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	}
	if ((id != "undo") && (id != "redo")) contenteditable_undo_save();
	if (webeditor.refreshToolbarTimeout) clearTimeout(webeditor.refreshToolbarTimeout);
	webeditor.refreshToolbarTimeout = setTimeout(webeditor_refreshToolbar, 100);
}

function webeditor_select_deactivate(evt) {
	if (evt && evt.target && evt.target.id) webeditor.select_focused[evt.target.id] = false;
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	return true;
}

function webeditor_select_blur(evt) {
	if (evt && evt.target && evt.target.id && webeditor) webeditor.select_focused[evt.target.id] = false;
	return true;
}

function webeditor_help() {
	if ((typeof(webeditor.help_window) == "undefined") || (webeditor.help_window == null) || webeditor.help_window.closed) {
		webeditor.help_window = window.open(webeditor.rootpath+"help2.html?editor=webeditor", "help_window", "scrollbars=yes,width=600,height=435,resizable=yes,status=yes", true);
	}
	if (webeditor.help_window) webeditor.help_window.focus();
}

function webeditor_specialcharacter() {
	if ((typeof(webeditor.specialcharacter_window) == "undefined") || (webeditor.specialcharacter_window == null) || webeditor.specialcharacter_window.closed) {
		webeditor.specialcharacter_window = window.open(webeditor.rootpath+"specialcharacter.html?editor=webeditor", "specialcharacter_window", "scrollbars=yes,width=500,height=425,resizable=yes,status=yes", true);
	}
	if (webeditor.specialcharacter_window) webeditor.specialcharacter_window.focus();
}

function webeditor_import() {
	if ((typeof(webeditor.import_window) == "undefined") || (webeditor.import_window == null) || webeditor.import_window.closed) {
		if (webeditor.language) {
			webeditor.import_window = window.open(webeditor.rootpath+"import."+webeditor.language+"?editor=webeditor", "import_window", "scrollbars=yes,width=350,height=200,resizable=yes,status=yes", true);
			if (webeditor.import_window) webeditor.import_window.focus();
		} else {
//			webeditor.import_window = window.open(webeditor.rootpath+"import.html?editor=webeditor", "import_window", "scrollbars=yes,width=350,height=200,resizable=yes,status=yes", true);
//			if (webeditor.import_window) webeditor.import_window.focus();
		}
	}
}

function webeditor_createtable() {
	if ((typeof(webeditor.table_window) == "undefined") || (webeditor.table_window == null) || webeditor.table_window.closed) {
		if (webeditor.language) {
			webeditor.table_window = window.open(webeditor.rootpath+"table."+webeditor.language+"?editor=webeditor", "table_window", "scrollbars=yes,width=475,height=400,resizable=yes,status=yes", true);
		} else {
			webeditor.table_window = window.open(webeditor.rootpath+"table.html?editor=webeditor", "table_window", "scrollbars=yes,width=475,height=400,resizable=yes,status=yes", true);
		}
	}
	if (webeditor.table_window) webeditor.table_window.focus();
}

function contenteditable_selecttable() {
	var table;
	if (table = contenteditable_isTable()) {
		contenteditable_selection_node(table);
	}
}

function contenteditable_selectrow() {
	var row;
	if (row = contenteditable_isRow()) {
		contenteditable_selection_node(row);
	}
}

function contenteditable_selectcolumn() {
//QQQ create selection range
	var table;
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow()) && (table = contenteditable_isTable())) {
		var cellcolumns = contenteditable_adjustedCellColumns(table);
		var column = cellcolumns[contenteditable_rowIndex(row)][contenteditable_cellIndex(cell)];
		var skiprows = 0;
		for (var i=0; i<table.rows.length; i++) {
			if (! skiprows) {
				var rowcolumn = 0;
				for (var j=0; ((j<table.rows[i].cells.length) && (rowcolumn<=column)); j++) {
					rowcolumn = cellcolumns[i][j];
					if ((rowcolumn == column) || (rowcolumn + contenteditable_cellColSpan(table.rows[i].cells[j]) > column)) {
						var thiscell = table.rows[i].cells[j];
//QQQ	add thiscell node to selection range
						skiprows = contenteditable_cellRowSpan(table.rows[i].cells[j]) - 1;
					} else if ((rowcolumn + contenteditable_cellColSpan(table.rows[i].cells[j])) > column) {
						skiprows = contenteditable_cellRowSpan(table.rows[i].cells[j]) - 1;
					}
					rowcolumn += contenteditable_cellColSpan(table.rows[i].cells[j]);
				}
			} else {
				skiprows--;
			}
		}
	}
}

function contenteditable_selectcell() {
	var cell;
	if (cell = contenteditable_isCell()) {
		contenteditable_selection_node(cell);
	}
}

function webeditor_tableproperties() {
	var table;
	if (table = contenteditable_isTable()) {
		if ((typeof(webeditor.tableproperties_window) == "undefined") || (webeditor.tableproperties_window == null) || webeditor.tableproperties_window.closed) {
			var border = contenteditable_getAttribute(table, "border") || "";
			var width = '';
			var height = '';
			if (table.style) {
				width = table.style.width.replace(/[^0-9%]/g,"") || contenteditable_getAttribute(table, "width") || '';
				height = table.style.height.replace(/[^0-9%]/g,"") || contenteditable_getAttribute(table, "height") || '';
			} else {
				width = contenteditable_getAttribute(table, "width") || '';
				height = contenteditable_getAttribute(table, "height") || '';
			}
			var cellpadding = contenteditable_getAttribute(table, "cellPadding") || "";
			var cellspacing = contenteditable_getAttribute(table, "cellSpacing") || "";
			var bgcolor = contenteditable_getAttribute(table, "bgColor") || "";
			var bordercolor = contenteditable_getAttribute(table, "borderColor") || "";
			var background = contenteditable_getAttribute(table, "background") || "";
			var htmlclass = contenteditable_getAttribute(table, "class") || "";
			var htmlid = contenteditable_getAttribute(table, "id") || "";
			if (webeditor.language) {
				webeditor.tableproperties_window = window.open(webeditor.rootpath+"tableproperties."+webeditor.language+"?editor=webeditor&border="+escape(border)+"&width="+escape(width)+"&height="+escape(height)+"&cellpadding="+escape(cellpadding)+"&cellspacing="+escape(cellspacing)+"&bgcolor="+escape(bgcolor)+"&bordercolor="+escape(bordercolor)+"&background="+escape(background)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid), "tableproperties_window", "scrollbars=yes,width=475,height=400,resizable=yes,status=yes", true);
			} else {
				webeditor.tableproperties_window = window.open(webeditor.rootpath+"tableproperties.html?editor=webeditor&border="+escape(border)+"&width="+escape(width)+"&height="+escape(height)+"&cellpadding="+escape(cellpadding)+"&cellspacing="+escape(cellspacing)+"&bgcolor="+escape(bgcolor)+"&bordercolor="+escape(bordercolor)+"&background="+escape(background)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid), "tableproperties_window", "scrollbars=yes,width=475,height=400,resizable=yes,status=yes", true);
			}
		}
		if (webeditor.tableproperties_window) webeditor.tableproperties_window.focus();
	}
}

function webeditor_rowproperties() {
	var row;
	if (row = contenteditable_isRow()) {
		if ((typeof(webeditor.rowproperties_window) == "undefined") || (webeditor.rowproperties_window == null) || webeditor.rowproperties_window.closed) {
			var align = contenteditable_getAttribute(row, "align") || "";
			var valign = contenteditable_getAttribute(row, "vAlign") || "";
			var bgcolor = contenteditable_getAttribute(row, "bgColor") || "";
			var bordercolor = contenteditable_getAttribute(row, "borderColor") || "";
			var background = contenteditable_getAttribute(row, "background") || "";
			var htmlclass = contenteditable_getAttribute(row, "class") || "";
			var htmlid = contenteditable_getAttribute(row, "id") || "";
			if (webeditor.language) {
				webeditor.rowproperties_window = window.open(webeditor.rootpath+"rowproperties."+webeditor.language+"?editor=webeditor&align="+escape(align)+"&valign="+escape(valign)+"&bgcolor="+escape(bgcolor)+"&bordercolor="+escape(bordercolor)+"&background="+escape(background)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid), "rowproperties_window", "scrollbars=yes,width=475,height=375,resizable=yes,status=yes", true);
			} else {
				webeditor.rowproperties_window = window.open(webeditor.rootpath+"rowproperties.html?editor=webeditor&align="+escape(align)+"&valign="+escape(valign)+"&bgcolor="+escape(bgcolor)+"&bordercolor="+escape(bordercolor)+"&background="+escape(background)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid), "rowproperties_window", "scrollbars=yes,width=475,height=375,resizable=yes,status=yes", true);
			}
		}
		if (webeditor.rowproperties_window) webeditor.rowproperties_window.focus();
	}
}

function webeditor_columnproperties() {
	var cell;
	if (cell = contenteditable_isCell()) {
		if ((typeof(webeditor.columnproperties_window) == "undefined") || (webeditor.columnproperties_window == null) || webeditor.columnproperties_window.closed) {
			var width = contenteditable_getAttribute(cell, "width") || "";
			var height = contenteditable_getAttribute(cell, "height") || "";
			var align = contenteditable_getAttribute(cell, "align") || "";
			var valign = contenteditable_getAttribute(cell, "vAlign") || "";
			var bgcolor = contenteditable_getAttribute(cell, "bgColor") || "";
			var bordercolor = contenteditable_getAttribute(cell, "borderColor") || "";
			var background = contenteditable_getAttribute(cell, "background") || "";
			var htmlclass = contenteditable_getAttribute(cell, "class") || "";
			if (webeditor.language) {
				webeditor.columnproperties_window = window.open(webeditor.rootpath+"columnproperties."+webeditor.language+"?editor=webeditor&width="+escape(width)+"&height="+escape(height)+"&colspan="+"&align="+escape(align)+"&valign="+escape(valign)+"&bgcolor="+escape(bgcolor)+"&bordercolor="+escape(bordercolor)+"&background="+escape(background)+"&htmlclass="+escape(htmlclass), "columnproperties_window", "scrollbars=yes,width=475,height=475,resizable=yes,status=yes", true);
			} else {
				webeditor.columnproperties_window = window.open(webeditor.rootpath+"columnproperties.html?editor=webeditor&width="+escape(width)+"&height="+escape(height)+"&colspan="+"&align="+escape(align)+"&valign="+escape(valign)+"&bgcolor="+escape(bgcolor)+"&bordercolor="+escape(bordercolor)+"&background="+escape(background)+"&htmlclass="+escape(htmlclass), "columnproperties_window", "scrollbars=yes,width=475,height=475,resizable=yes,status=yes", true);
			}
		}
		if (webeditor.columnproperties_window) webeditor.columnproperties_window.focus();
	}
}

function webeditor_cellproperties() {
	var cell;
	if (cell = contenteditable_isCell()) {
		if ((typeof(webeditor.cellproperties_window) == "undefined") || (webeditor.cellproperties_window == null) || webeditor.cellproperties_window.closed) {
			var width = contenteditable_getAttribute(cell, "width") || "";
			var height = contenteditable_getAttribute(cell, "height") || "";
			var colspan = contenteditable_getAttribute(cell, "colSpan") || "";
			var rowspan = contenteditable_getAttribute(cell, "rowSpan") || "";
			var align = contenteditable_getAttribute(cell, "align") || "";
			var valign = contenteditable_getAttribute(cell, "vAlign") || "";
			var bgcolor = contenteditable_getAttribute(cell, "bgColor") || "";
			var bordercolor = contenteditable_getAttribute(cell, "borderColor") || "";
			var background = contenteditable_getAttribute(cell, "background") || "";
			var htmlclass = contenteditable_getAttribute(cell, "class") || "";
			var htmlid = contenteditable_getAttribute(cell, "id") || "";
			if (webeditor.language) {
				webeditor.cellproperties_window = window.open(webeditor.rootpath+"cellproperties."+webeditor.language+"?editor=webeditor&width="+escape(width)+"&height="+escape(height)+"&colspan="+escape(colspan)+"&rowspan="+escape(rowspan)+"&align="+escape(align)+"&valign="+escape(valign)+"&bgcolor="+escape(bgcolor)+"&bordercolor="+escape(bordercolor)+"&background="+escape(background)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid), "cellproperties_window", "scrollbars=yes,width=475,height=475,resizable=yes,status=yes", true);
			} else {
				webeditor.cellproperties_window = window.open(webeditor.rootpath+"cellproperties.html?editor=webeditor&width="+escape(width)+"&height="+escape(height)+"&colspan="+escape(colspan)+"&rowspan="+escape(rowspan)+"&align="+escape(align)+"&valign="+escape(valign)+"&bgcolor="+escape(bgcolor)+"&bordercolor="+escape(bordercolor)+"&background="+escape(background)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid), "cellproperties_window", "scrollbars=yes,width=475,height=475,resizable=yes,status=yes", true);
			}
		}
		if (webeditor.cellproperties_window) webeditor.cellproperties_window.focus();
	}
}

function webeditor_insertmedia() {
	var href = '';
	var border = '';
	var alt = '';
	var width = '';
	var height = '';
	var vspace = '';
	var hspace = '';
	var align = '';
	var onmouseover = '';
	var onmouseout = '';
	var usemap = '';
	var htmlid = '';
	var htmlclass = '';
	var mediaclass = '';
	var text = contenteditable_selection_text();
	var element = contenteditable_selection_container('img');
	if (element) {
		contenteditable_selection_node(element);
		href = contenteditable_getAttribute(element, "src") || '';
		border = contenteditable_getAttribute(element, "border") || '';
		alt = contenteditable_getAttribute(element, "alt") || '';
		if (element.style) {
			width = element.style.width.replace(/[^0-9%]/g,"") || contenteditable_getAttribute(element, "width") || '';
			height = element.style.height.replace(/[^0-9%]/g,"") || contenteditable_getAttribute(element, "height") || '';
		} else {
			width = contenteditable_getAttribute(element, "width") || '';
			height = contenteditable_getAttribute(element, "height") || '';
		}
		vspace = contenteditable_getAttribute(element, "vspace") || '';
		hspace = contenteditable_getAttribute(element, "hspace") || '';
		align = contenteditable_getAttribute(element, "align") || '';
		onmouseover = contenteditable_getAttribute(element, "onMouseOver") || '';
		onmouseout = contenteditable_getAttribute(element, "onMouseOut") || '';
		usemap = contenteditable_getAttribute(element, "useMap") || '';
		htmlclass = contenteditable_getAttribute(element, "class") || "";
		htmlid = contenteditable_getAttribute(element, "id") || "";
		mediaclass = "image";
	} else if (element = contenteditable_selection_container('object')) {
		if (contenteditable_getAttribute(element, 'classid') == "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000") {
			href = "";
			for (var node=element.firstChild; node; node=node.nextSibling) {
				if ((node.nodeName == "PARAM") && (contenteditable_getAttribute(node, 'name').toLowerCase() == "movie")) {
					href = contenteditable_getAttribute(node, 'value') || '';
				}
			}
			width = contenteditable_getAttribute(element, "width") || '';
			height = contenteditable_getAttribute(element, "height") || '';
			htmlclass = contenteditable_getAttribute(element, "class") || "";
			htmlid = contenteditable_getAttribute(element, "id") || "";
			mediaclass = "flash";
			contenteditable_selection_node(element);
		} else if (contenteditable_getAttribute(element, 'classid') == "clsid:CAFEEFAC-0014-0002-0000-ABCDEFFEDCBA") {
			href = "";
			for (var node=element.firstChild; node; node=node.nextSibling) {
				if ((node.nodeName == "PARAM") && (contenteditable_getAttribute(node, 'name') == "codebase")) {
					href = contenteditable_getAttribute(node, 'value') + href;
				} else if ((node.nodeName == "PARAM") && (contenteditable_getAttribute(node, 'name') == "code")) {
					href = href + contenteditable_getAttribute(node, 'value') || '';
				}
			}
			width = contenteditable_getAttribute(element, "width") || '';
			height = contenteditable_getAttribute(element, "height") || '';
			htmlclass = contenteditable_getAttribute(element, "class") || "";
			htmlid = contenteditable_getAttribute(element, "id") || "";
			mediaclass = "applet";
			contenteditable_selection_node(element);
		} else if (contenteditable_getAttribute(element, 'classid') == "clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B") {
			href = "";
			for (var node=element.firstChild; node; node=node.nextSibling) {
				if ((node.nodeName == "PARAM") && (contenteditable_getAttribute(node, 'name').toLowerCase() == "src")) {
					href = contenteditable_getAttribute(node, 'value') || '';
				}
			}
			width = contenteditable_getAttribute(element, "width") || '';
			height = contenteditable_getAttribute(element, "height") || '';
			htmlclass = contenteditable_getAttribute(element, "class") || "";
			htmlid = contenteditable_getAttribute(element, "id") || "";
			mediaclass = "quicktime";
			contenteditable_selection_node(element);
		}
	}

	if ((typeof(webeditor.image_window) == "undefined") || (webeditor.image_window == null) || webeditor.image_window.closed) {
		if ((webeditor.type == "dhtml") && (majorVersion == 4)) {
			webeditor.image_window = window.open(webeditor.rootpath+"media.html?editor=webeditor&href="+escape(href)+"&border="+escape(border)+"&alt="+escape(alt)+"&width="+escape(width)+"&height="+escape(height)+"&vspace="+escape(vspace)+"&hspace="+escape(hspace)+"&align="+escape(align)+"&onmouseover="+escape(onmouseover)+"&onmouseout="+escape(onmouseout)+"&usemap="+escape(usemap)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid)+"&mediaclass="+escape(mediaclass),"image_window","scrollbars=yes,width="+webeditor.image_window_width+",height="+webeditor.image_window_height+",resizable=yes,status=yes");
		} else if (webeditor.manager && webeditor.language) {
			webeditor.image_window = window.open(webeditor.rootpath+"media"+webeditor.manager+"."+webeditor.language+"?editor=webeditor&href="+escape(href)+"&border="+escape(border)+"&alt="+escape(alt)+"&width="+escape(width)+"&height="+escape(height)+"&vspace="+escape(vspace)+"&hspace="+escape(hspace)+"&align="+escape(align)+"&onmouseover="+escape(onmouseover)+"&onmouseout="+escape(onmouseout)+"&usemap="+escape(usemap)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid)+"&mediaclass="+escape(mediaclass),"image_window","scrollbars=yes,width="+webeditor.image_window_width+",height="+webeditor.image_window_height+",resizable=yes,status=yes");
		} else if (webeditor.manager) {
			webeditor.image_window = window.open(webeditor.rootpath+"media"+webeditor.manager+".html?editor=webeditor&href="+escape(href)+"&border="+escape(border)+"&alt="+escape(alt)+"&width="+escape(width)+"&height="+escape(height)+"&vspace="+escape(vspace)+"&hspace="+escape(hspace)+"&align="+escape(align)+"&onmouseover="+escape(onmouseover)+"&onmouseout="+escape(onmouseout)+"&usemap="+escape(usemap)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid)+"&mediaclass="+escape(mediaclass),"image_window","scrollbars=yes,width="+webeditor.image_window_width+",height="+webeditor.image_window_height+",resizable=yes,status=yes");
		} else {
			webeditor.image_window = window.open(webeditor.rootpath+"media.html?editor=webeditor&href="+escape(href)+"&border="+escape(border)+"&alt="+escape(alt)+"&width="+escape(width)+"&height="+escape(height)+"&vspace="+escape(vspace)+"&hspace="+escape(hspace)+"&align="+escape(align)+"&onmouseover="+escape(onmouseover)+"&onmouseout="+escape(onmouseout)+"&usemap="+escape(usemap)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid)+"&mediaclass="+escape(mediaclass),"image_window","scrollbars=yes,width="+webeditor.image_window_width+",height="+webeditor.image_window_height+",resizable=yes,status=yes");
		}
	} else {
		if ((webeditor.type == "dhtml") && (majorVersion == 4)) {
			webeditor.image_window.document.location = webeditor.rootpath+"media.html?editor=webeditor&href="+escape(href)+"&border="+escape(border)+"&alt="+escape(alt)+"&width="+escape(width)+"&height="+escape(height)+"&vspace="+escape(vspace)+"&hspace="+escape(hspace)+"&align="+escape(align)+"&onmouseover="+escape(onmouseover)+"&onmouseout="+escape(onmouseout)+"&usemap="+escape(usemap)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid)+"&mediaclass="+escape(mediaclass);
		} else if (webeditor.manager && webeditor.language) {
			webeditor.image_window.document.location = webeditor.rootpath+"media"+webeditor.manager+"."+webeditor.language+"?editor=webeditor&href="+escape(href)+"&border="+escape(border)+"&alt="+escape(alt)+"&width="+escape(width)+"&height="+escape(height)+"&vspace="+escape(vspace)+"&hspace="+escape(hspace)+"&align="+escape(align)+"&onmouseover="+escape(onmouseover)+"&onmouseout="+escape(onmouseout)+"&usemap="+escape(usemap)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid)+"&mediaclass="+escape(mediaclass);
		} else if (webeditor.manager) {
			webeditor.image_window.document.location = webeditor.rootpath+"media"+webeditor.manager+".html?editor=webeditor&href="+escape(href)+"&border="+escape(border)+"&alt="+escape(alt)+"&width="+escape(width)+"&height="+escape(height)+"&vspace="+escape(vspace)+"&hspace="+escape(hspace)+"&align="+escape(align)+"&onmouseover="+escape(onmouseover)+"&onmouseout="+escape(onmouseout)+"&usemap="+escape(usemap)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid)+"&mediaclass="+escape(mediaclass);
		} else {
			webeditor.image_window.document.location = webeditor.rootpath+"media.html?editor=webeditor&href="+escape(href)+"&border="+escape(border)+"&alt="+escape(alt)+"&width="+escape(width)+"&height="+escape(height)+"&vspace="+escape(vspace)+"&hspace="+escape(hspace)+"&align="+escape(align)+"&onmouseover="+escape(onmouseover)+"&onmouseout="+escape(onmouseout)+"&usemap="+escape(usemap)+"&htmlclass="+escape(htmlclass)+"&htmlid="+escape(htmlid)+"&mediaclass="+escape(mediaclass);
		}
	}
	if (webeditor.image_window) webeditor.image_window.focus();
}

function webeditor_imagemap() {
	var image = contenteditable_selection_container('img');
	if (image) {
		contenteditable_selection_node(image);
		if ((typeof(webeditor.imagemap_window) == "undefined") || (webeditor.imagemap_window == null) || webeditor.imagemap_window.closed) {
			webeditor.imagemap_window = window.open(webeditor.rootpath+"imagemap.html?editor=webeditor", "imagemap_window", "scrollbars=yes,width=600,height=600,resizable=yes,status=yes", true);
		}
		if (webeditor.imagemap_window) webeditor.imagemap_window.focus();
	}
}

function webeditor_createlink() {
	var text = '';
	var href = '';
	var target = '';
	var htmlid = '';
	var htmlclass = '';
	var onclick = '';
	var title = '';

	var text = contenteditable_selection_text();
	var element = contenteditable_selection_container('a');
	if (element) {
		contenteditable_selection_node(element);
		text = element.innerHTML;
		href = contenteditable_getAttribute(element, "href") || '';
		href = href.replace(/&amp;/gi, "&");
		target = contenteditable_getAttribute(element, "target") || '';
		htmlclass = contenteditable_getAttribute(element, "class") || "";
		htmlid = contenteditable_getAttribute(element, "id") || "";
		onclick = contenteditable_getAttribute(element, "onclick") || "";
		title = contenteditable_getAttribute(element, "title") || "";
	} else if (contenteditable_selection_contains('a')) {
		return;
	}

	if ((typeof(webeditor.hyperlink_window) == "undefined") || (webeditor.hyperlink_window == null) || webeditor.hyperlink_window.closed) {
		if (webeditor.manager && webeditor.language) {
			try {
				webeditor.hyperlink_window = window.open(webeditor.rootpath+"hyperlink"+webeditor.manager+"."+webeditor.language+"?editor=webeditor&href="+escape(href)+"&target="+escape(target)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"&onclick="+escape(onclick)+"&title="+escape(title)+"&text="+escape(text) ,"hyperlink_window","scrollbars=yes,width="+webeditor.hyperlink_window_width+",height="+webeditor.hyperlink_window_height+",resizable=yes,status=yes",true);
			} catch(e) {
				// error selected text may be too long for URL parameter
			}
		} else if (webeditor.manager) {
			try {
				webeditor.hyperlink_window = window.open(webeditor.rootpath+"hyperlink"+webeditor.manager+".html?editor=webeditor&href="+escape(href)+"&target="+escape(target)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"&onclick="+escape(onclick)+"&title="+escape(title)+"&text="+escape(text) ,"hyperlink_window","scrollbars=yes,width="+webeditor.hyperlink_window_width+",height="+webeditor.hyperlink_window_height+",resizable=yes,status=yes",true);
			} catch(e) {
				// error selected text may be too long for URL parameter
			}
		} else {
			try {
				webeditor.hyperlink_window = window.open(webeditor.rootpath+"hyperlink.html?editor=webeditor&href="+escape(href)+"&target="+escape(target)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"&onclick="+escape(onclick)+"&title="+escape(title)+"&text="+escape(text) ,"hyperlink_window","scrollbars=yes,width="+webeditor.hyperlink_window_width+",height="+webeditor.hyperlink_window_height+",resizable=yes,status=yes",true);
			} catch(e) {
				// error selected text may be too long for URL parameter
			}
		}
	} else {
		if (webeditor.manager && webeditor.language) {
			try {
				webeditor.hyperlink_window.document.location = webeditor.rootpath+"hyperlink"+webeditor.manager+"."+webeditor.language+"?editor=webeditor&href="+escape(href)+"&target="+escape(target)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"&onclick="+escape(onclick)+"&text="+escape(text)+"&title="+escape(title);
			} catch(e) {
				// error selected text may be too long for URL parameter
			}
		} else if (webeditor.manager) {
			try {
				webeditor.hyperlink_window.document.location = webeditor.rootpath+"hyperlink"+webeditor.manager+".html?editor=webeditor&href="+escape(href)+"&target="+escape(target)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"&onclick="+escape(onclick)+"&text="+escape(text)+"&title="+escape(title);
			} catch(e) {
				// error selected text may be too long for URL parameter
			}
		} else {
			try {
				webeditor.hyperlink_window.document.location = webeditor.rootpath+"hyperlink.html?editor=webeditor&href="+escape(href)+"&target="+escape(target)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"&onclick="+escape(onclick)+"&text="+escape(text)+"&title="+escape(title);
			} catch(e) {
				// error selected text may be too long for URL parameter
			}
		}
	}
	if (webeditor.hyperlink_window) webeditor.hyperlink_window.focus();
}

function webeditor_mailto() {
	var text = '';
	var email = '';
	var subject = '';
	var htmlid = '';
	var htmlclass = '';

	var text = contenteditable_selection_text();
	var element = contenteditable_selection_container('a');
	if (element) {
		contenteditable_selection_node(element);
		text = element.innerHTML;
		var href = contenteditable_getAttribute(element, "href") || '';
		if (href.match(new RegExp("^mailto:([^?]*)(.*)$", "gi"))) email = href.replace(/^mailto:([^?]*)(.*)$/gi, "$1") || '';
		if (href.match(new RegExp("^(.*)\\?subject=(.*)", "gi"))) subject = href.replace(/^(.*)\?subject=(.*)/gi, "$2") || '';
		if (typeof(decodeURI) == "function") {
			subject = decodeURI(subject);
		}
		htmlclass = contenteditable_getAttribute(element, "class") || "";
		htmlid = contenteditable_getAttribute(element, "id") || "";
	} else if (contenteditable_selection_contains('a')) {
		return;
	}

	if ((typeof(webeditor.mailto_window) == "undefined") || (webeditor.mailto_window == null) || webeditor.mailto_window.closed) {
		webeditor.mailto_window = window.open(webeditor.rootpath+"mailto.html?editor=webeditor&email="+escape(email)+"&subject="+escape(subject)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass), "mailto_window", "width=500,height=325,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.mailto_window) webeditor.mailto_window.focus();
}

function webeditor_backcolor() {
	if ((typeof(webeditor.colour_window) == "undefined") || (webeditor.colour_window == null) || webeditor.colour_window.closed) {
		webeditor.colour_window = window.open(webeditor.rootpath+"colour.html?editor=webeditor&attribute=backColor", "colour_window", "width=475,height=350,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.colour_window) webeditor.colour_window.focus();
}

function webeditor_forecolor() {
	if ((typeof(webeditor.colour_window) == "undefined") || (webeditor.colour_window == null) || webeditor.colour_window.closed) {
		webeditor.colour_window = window.open(webeditor.rootpath+"colour.html?editor=webeditor&attribute=foreColor", "colour_window", "width=475,height=350,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.colour_window) webeditor.colour_window.focus();
}

function webeditor_form() {
	var action = '';
	var enctype = '';
	var method = '';
	var target = '';
	var onsubmit = '';
	var onreset = '';
	var htmlid = '';
	var htmlclass = '';

	var form = contenteditable_selection_container('form');
	if (form) {
		contenteditable_selection_node(form);
		action = contenteditable_getAttribute(form, "action") || '';
		enctype = contenteditable_getAttribute(form, "enctype") || '';
		method = contenteditable_getAttribute(form, "method") || '';
		target = contenteditable_getAttribute(form, "target") || '';
		onsubmit = contenteditable_getAttribute(form, "onsubmit") || '';
		onreset = contenteditable_getAttribute(form, "onreset") || '';
		htmlclass = contenteditable_getAttribute(form, "class") || "";
		htmlid = contenteditable_getAttribute(form, "id") || "";
	}
	if ((typeof(webeditor.form_window) == "undefined") || (webeditor.form_window == null) || webeditor.form_window.closed) {
		webeditor.form_window = window.open(webeditor.rootpath+"form.html?editor=webeditor&action="+escape(action)+"&enctype="+escape(enctype)+"&method="+escape(method)+"&target="+escape(target)+"&onsubmit="+escape(onsubmit)+"&onreset="+escape(onreset)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "form_window", "width=475,height=375,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.form_window) webeditor.form_window.focus();
}

function webeditor_button(type, onclick) {
	if (! type) type = 'button';
	if (! onclick) onclick = '';
	var name = '';
	var value = '';
	var src = '';
	var align = '';
	var onfocus = '';
	var onblur = '';
	var htmlid = '';
	var htmlclass = '';

	var button = contenteditable_selection_container('input');
	if (button) {
		contenteditable_selection_node(button);
		name = contenteditable_getAttribute(button, "name") || '';
		value = contenteditable_getAttribute(button, "value") || '';
		src = contenteditable_getAttribute(button, "src") || '';
		align = contenteditable_getAttribute(button, "align") || '';
		if (! onclick) onclick = contenteditable_getAttribute(button, "onclick") || '';
		onfocus = contenteditable_getAttribute(button, "onfocus") || '';
		onblur = contenteditable_getAttribute(button, "onblur") || '';
		htmlclass = contenteditable_getAttribute(button, "class") || "";
		htmlid = contenteditable_getAttribute(button, "id") || "";
	}
	if ((typeof(webeditor.button_window) == "undefined") || (webeditor.button_window == null) || webeditor.button_window.closed) {
		webeditor.button_window = window.open(webeditor.rootpath+"button.html?editor=webeditor&type="+escape(type)+"&name="+escape(name)+"&value="+escape(value)+"&src="+escape(src)+"&align="+escape(align)+"&onclick="+escape(onclick)+"&onfocus="+escape(onfocus)+"&onblur="+escape(onblur)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "button_window", "width=475,height=425,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.button_window) webeditor.button_window.focus();
}

function webeditor_submitbutton() {
	webeditor_button("submit");
}

function webeditor_resetbutton() {
	webeditor_button("reset");
}

function webeditor_imagebutton() {
	webeditor_button("image");
}

function webeditor_backbutton() {
	webeditor_button("button", "history.back(-1);");
}

function webeditor_text() {
	var name = '';
	var value = '';
	var size = '';
	var maxlength = '';
	var onclick = '';
	var onchange = '';
	var onfocus = '';
	var onblur = '';
	var htmlid = '';
	var htmlclass = '';

	var input = contenteditable_selection_container('input');
	if (input) {
		contenteditable_selection_node(input);
		name = contenteditable_getAttribute(input, "name") || '';
		value = contenteditable_getAttribute(input, "value") || '';
		size = contenteditable_getAttribute(input, "size") || '';
		maxlength = contenteditable_getAttribute(input, "maxLength") || '';
		onclick = contenteditable_getAttribute(input, "onclick") || '';
		onchange = contenteditable_getAttribute(input, "onchange") || '';
		onfocus = contenteditable_getAttribute(input, "onfocus") || '';
		onblur = contenteditable_getAttribute(input, "onblur") || '';
		htmlclass = contenteditable_getAttribute(input, "class") || "";
		htmlid = contenteditable_getAttribute(input, "id") || "";
	}
	if ((typeof(webeditor.text_window) == "undefined") || (webeditor.text_window == null) || webeditor.text_window.closed) {
		webeditor.text_window = window.open(webeditor.rootpath+"text.html?editor=webeditor&name="+escape(name)+"&value="+escape(value)+"&size="+escape(size)+"&maxlength="+escape(maxlength)+"&onclick="+escape(onclick)+"&onchange="+escape(onchange)+"&onfocus="+escape(onfocus)+"&onblur="+escape(onblur)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "text_window", "width=475,height=475,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.text_window) webeditor.text_window.focus();
}

function webeditor_password() {
	var name = '';
	var value = '';
	var size = '';
	var maxlength = '';
	var onclick = '';
	var onchange = '';
	var onfocus = '';
	var onblur = '';
	var htmlid = '';
	var htmlclass = '';

	var input = contenteditable_selection_container('input');
	if (input) {
		contenteditable_selection_node(input);
		name = contenteditable_getAttribute(input, "name") || '';
		value = contenteditable_getAttribute(input, "value") || '';
		size = contenteditable_getAttribute(input, "size") || '';
		maxlength = contenteditable_getAttribute(input, "maxLength") || '';
		onclick = contenteditable_getAttribute(input, "onclick") || '';
		onchange = contenteditable_getAttribute(input, "onchange") || '';
		onfocus = contenteditable_getAttribute(input, "onfocus") || '';
		onblur = contenteditable_getAttribute(input, "onblur") || '';
		htmlclass = contenteditable_getAttribute(input, "class") || "";
		htmlid = contenteditable_getAttribute(input, "id") || "";
	}
	if ((typeof(webeditor.password_window) == "undefined") || (webeditor.password_window == null) || webeditor.password_window.closed) {
		webeditor.password_window = window.open(webeditor.rootpath+"password.html?editor=webeditor&name="+escape(name)+"&value="+escape(value)+"&size="+escape(size)+"&maxlength="+escape(maxlength)+"&onclick="+escape(onclick)+"&onchange="+escape(onchange)+"&onfocus="+escape(onfocus)+"&onblur="+escape(onblur)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "password_window", "width=475,height=475,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.password_window) webeditor.password_window.focus();
}

function webeditor_hidden() {
	var type = 'hidden';
	var name = '';
	var value = '';
	var htmlid = '';
	var htmlclass = '';

	var input = contenteditable_selection_container('input');
	if (input) {
		contenteditable_selection_node(input);
		name = contenteditable_getAttribute(input, "name") || '';
		value = contenteditable_getAttribute(input, "value") || '';
		htmlclass = contenteditable_getAttribute(input, "class") || "";
		htmlid = contenteditable_getAttribute(input, "id") || "";
	}
	if ((typeof(webeditor.hidden_window) == "undefined") || (webeditor.hidden_window == null) || webeditor.hidden_window.closed) {
		webeditor.hidden_window = window.open(webeditor.rootpath+"hidden.html?editor=webeditor&type="+escape(type)+"&name="+escape(name)+"&value="+escape(value)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "hidden_window", "width=475,height=275,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.hidden_window) webeditor.hidden_window.focus();
}

function webeditor_textarea() {
	var name = '';
	var cols = '';
	var rows = '';
	var wrap = '';
	var onclick = '';
	var onchange = '';
	var onfocus = '';
	var onblur = '';
	var htmlid = '';
	var htmlclass = '';

	var textarea = contenteditable_selection_container('textarea');
	if (textarea) {
		contenteditable_selection_node(textarea);
		name = contenteditable_getAttribute(textarea, "name") || '';
		cols = contenteditable_getAttribute(textarea, "cols") || '';
		rows = contenteditable_getAttribute(textarea, "rows") || '';
		wrap = contenteditable_getAttribute(textarea, "wrap") || '';
		onclick = contenteditable_getAttribute(textarea, "onclick") || '';
		onchange = contenteditable_getAttribute(textarea, "onchange") || '';
		onfocus = contenteditable_getAttribute(textarea, "onfocus") || '';
		onblur = contenteditable_getAttribute(textarea, "onblur") || '';
		htmlclass = contenteditable_getAttribute(textarea, "class") || "";
		htmlid = contenteditable_getAttribute(textarea, "id") || "";
	}
	if ((typeof(webeditor.textarea_window) == "undefined") || (webeditor.textarea_window == null) || webeditor.textarea_window.closed) {
		webeditor.textarea_window = window.open(webeditor.rootpath+"textarea.html?editor=webeditor&name="+escape(name)+"&cols="+escape(cols)+"&rows="+escape(rows)+"&wrap="+escape(wrap)+"&&onclick="+escape(onclick)+"&onchange="+escape(onchange)+"&onfocus="+escape(onfocus)+"&onblur="+escape(onblur)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "textarea_window", "width=475,height=475,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.textarea_window) webeditor.textarea_window.focus();
}

function webeditor_checkbox() {
	var name = '';
	var value = '';
	var checked = '';
	var onclick = '';
	var onchange = '';
	var onfocus = '';
	var onblur = '';
	var htmlid = '';
	var htmlclass = '';

	var input = contenteditable_selection_container('input');
	if (input) {
		contenteditable_selection_node(input);
		name = contenteditable_getAttribute(input, "name") || '';
		value = contenteditable_getAttribute(input, "value") || '';
		checked = contenteditable_getAttribute(input, "checked") ? 'checked' : '';
		onclick = contenteditable_getAttribute(input, "onclick") || '';
		onchange = contenteditable_getAttribute(input, "onchange") || '';
		onfocus = contenteditable_getAttribute(input, "onfocus") || '';
		onblur = contenteditable_getAttribute(input, "onblur") || '';
		htmlclass = contenteditable_getAttribute(input, "class") || "";
		htmlid = contenteditable_getAttribute(input, "id") || "";
	}
	if ((typeof(webeditor.checkbox_window) == "undefined") || (webeditor.checkbox_window == null) || webeditor.checkbox_window.closed) {
		webeditor.checkbox_window = window.open(webeditor.rootpath+"checkbox.html?editor=webeditor&name="+escape(name)+"&value="+escape(value)+"&checked="+escape(checked)+"&onclick="+escape(onclick)+"&onchange="+escape(onchange)+"&onfocus="+escape(onfocus)+"&onblur="+escape(onblur)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "checkbox_window", "width=475,height=425,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.checkbox_window) webeditor.checkbox_window.focus();
}

function webeditor_radio() {
	var name = '';
	var value = '';
	var checked = '';
	var onclick = '';
	var onchange = '';
	var onfocus = '';
	var onblur = '';
	var htmlid = '';
	var htmlclass = '';

	var input = contenteditable_selection_container('input');
	if (input) {
		contenteditable_selection_node(input);
		name = contenteditable_getAttribute(input, "name") || '';
		value = contenteditable_getAttribute(input, "value") || '';
		checked = contenteditable_getAttribute(input, "checked") ? 'checked' : '';
		onclick = contenteditable_getAttribute(input, "onclick") || '';
		onchange = contenteditable_getAttribute(input, "onchange") || '';
		onfocus = contenteditable_getAttribute(input, "onfocus") || '';
		onblur = contenteditable_getAttribute(input, "onblur") || '';
		htmlclass = contenteditable_getAttribute(input, "class") || "";
		htmlid = contenteditable_getAttribute(input, "id") || "";
	}
	if ((typeof(webeditor.radiobutton_window) == "undefined") || (webeditor.radiobutton_window == null) || webeditor.radiobutton_window.closed) {
		webeditor.radiobutton_window = window.open(webeditor.rootpath+"radiobutton.html?editor=webeditor&name="+escape(name)+"&value="+escape(value)+"&checked="+escape(checked)+"&onclick="+escape(onclick)+"&onchange="+escape(onchange)+"&onfocus="+escape(onfocus)+"&onblur="+escape(onblur)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "radiobutton_window", "width=475,height=425,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.radiobutton_window) webeditor.radiobutton_window.focus();
}

function webeditor_file() {
	var type = 'file';
	var name = '';
	var value = '';
	var accept = '';
	var onclick = '';
	var onchange = '';
	var onfocus = '';
	var onblur = '';
	var htmlid = '';
	var htmlclass = '';

	var input = contenteditable_selection_container('input');
	if (input) {
		contenteditable_selection_node(input);
		name = contenteditable_getAttribute(input, "name") || '';
		value = contenteditable_getAttribute(input, "value") || '';
		accept = contenteditable_getAttribute(input, "accept") || '';
		onclick = contenteditable_getAttribute(input, "onclick") || '';
		onchange = contenteditable_getAttribute(input, "onchange") || '';
		onfocus = contenteditable_getAttribute(input, "onfocus") || '';
		onblur = contenteditable_getAttribute(input, "onblur") || '';
		htmlclass = contenteditable_getAttribute(input, "class") || "";
		htmlid = contenteditable_getAttribute(input, "id") || "";
	}
	if ((typeof(webeditor.file_window) == "undefined") || (webeditor.file_window == null) || webeditor.file_window.closed) {
		webeditor.file_window = window.open(webeditor.rootpath+"file.html?editor=webeditor&type="+escape(type)+"&name="+escape(name)+"&value="+escape(value)+"&accept="+escape(accept)+"&onclick="+escape(onclick)+"&onchange="+escape(onchange)+"&onfocus="+escape(onfocus)+"&onblur="+escape(onblur)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass)+"", "file_window", "width=475,height=375,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.file_window) webeditor.file_window.focus();
}

function webeditor_selectlist() {
	var name = '';
	var size = '';
	var multiple = '';
	var onclick = '';
	var onchange = '';
	var onfocus = '';
	var onblur = '';
	var htmlid = '';
	var htmlclass = '';
	webeditor.selectlist_options = false;
	webeditor.selectlist_node = false;

	var selectbox = contenteditable_selection_container('select');
	if (selectbox) {
		contenteditable_selection_node(selectbox);
		name = contenteditable_getAttribute(selectbox, "name") || '';
		size = contenteditable_getAttribute(selectbox, "size") || '';
		if (size < 1) size = '';
		multiple = contenteditable_getAttribute(selectbox, "multiple") ? 'multiple' : '';
		onclick = contenteditable_getAttribute(selectbox, "onclick") || '';
		onchange = contenteditable_getAttribute(selectbox, "onchange") || '';
		onfocus = contenteditable_getAttribute(selectbox, "onfocus") || '';
		onblur = contenteditable_getAttribute(selectbox, "onblur") || '';
		htmlclass = contenteditable_getAttribute(selectbox, "class") || "";
		htmlid = contenteditable_getAttribute(selectbox, "id") || "";
		webeditor.selectlist_node = selectbox;
		webeditor.selectlist_options = selectbox.options;
	}
	if ((typeof(webeditor.select_window) == "undefined") || (webeditor.select_window == null) || webeditor.select_window.closed) {
		webeditor.select_window = window.open(webeditor.rootpath+"select.html?editor=webeditor&name="+escape(name)+"&size="+escape(size)+"&multiple="+escape(multiple)+"&onclick="+escape(onclick)+"&onchange="+escape(onchange)+"&onfocus="+escape(onfocus)+"&onblur="+escape(onblur)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass), "select_window", "scrollbars=yes,width=875,height=400,resizable=yes,status=yes", true);
	}
	if (webeditor.select_window) webeditor.select_window.focus();
}

function webeditor_selectlist_options() {
	// MSIE contenteditable_selection_container() called from dialog window may not work correctly i.e. if select list is only editable content
	if (webeditor.selectlist_options) return webeditor.selectlist_options;
	var selectbox = contenteditable_selection_container('select');
	if (selectbox) {
		return selectbox.options;
	}
}

function webeditor_imagemap_node(usemap) {
	if (usemap) {
//		var element = contenteditable_focused_document().getElementsByName(usemap);
		var element = contenteditable_focused_document().getElementsByTagName("MAP");
		for (var i=0; i<element.length; i++) {
			if (element[i].tagName == "MAP") {
				return element[i];
			}
		}
	}
}

function webeditor_clean() {
	if ((typeof(webeditor.clean_window) == "undefined") || (webeditor.clean_window == null) || webeditor.clean_window.closed) {
		webeditor.clean_window = window.open(webeditor.rootpath+"clean.html?editor=webeditor", "clean_window", "width=475,height=300,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.clean_window) webeditor.clean_window.focus();
}

function webeditor_box() {
	var width = '100';
	var height = '100';
	var borderwidth = '1';
	var borderstyle = 'solid';
	var bordercolor = '';
	var backgroundcolor = '';
	var htmlid = '';
	var htmlclass = '';

	var box = contenteditable_selection_container('div');
	if (box && box.style && (box.style.position == "absolute")) {
		if (box && box.style) {
			contenteditable_selection_node(box);
			width = box.style.width || '';
			height = box.style.height || '';
			borderwidth = box.style.borderTopWidth || '';
			borderstyle = box.style.borderTopStyle || '';
			bordercolor = box.style.borderTopColor || '';
			backgroundcolor = box.style.backgroundColor || '';
			htmlclass = contenteditable_getAttribute(box, "class") || "";
			htmlid = contenteditable_getAttribute(box, "id") || "";
		}
	}
	if ((typeof(webeditor.box_window) == "undefined") || (webeditor.box_window == null) || webeditor.box_window.closed) {
		webeditor.box_window = window.open(webeditor.rootpath+"box.html?editor=webeditor&width="+escape(width)+"&height="+escape(height)+"&borderwidth="+escape(borderwidth)+"&borderstyle="+escape(borderstyle)+"&bordercolor="+escape(bordercolor)+"&backgroundcolor="+escape(backgroundcolor)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass), "box_window", "width=475,height=375,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.box_window) webeditor.box_window.focus();
}

function webeditor_iframe() {
	var width = '';
	var height = '';
	var src = '';
	var htmlid = '';
	var htmlclass = '';

	var iframe = contenteditable_selection_container('iframe');
	if (iframe) {
		contenteditable_selection_node(iframe);
		width = contenteditable_getAttribute(iframe, "width") || '';
		height = contenteditable_getAttribute(iframe, "height") || '';
		src = contenteditable_getAttribute(iframe, "src") || '';
		htmlclass = contenteditable_getAttribute(iframe, "class") || "";
		htmlid = contenteditable_getAttribute(iframe, "id") || "";
	}
	if ((typeof(webeditor.iframe_window) == "undefined") || (webeditor.iframe_window == null) || webeditor.iframe_window.closed) {
		webeditor.iframe_window = window.open(webeditor.rootpath+"iframe.html?editor=webeditor&width="+escape(width)+"&height="+escape(height)+"&src="+escape(src)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass), "iframe_window", "width=525,height=350,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.iframe_window) webeditor.iframe_window.focus();
}

function webeditor_anchor() {
	var name = '';
	var htmlid = '';
	var htmlclass = '';

	var anchor = contenteditable_selection_container('a');
	if (anchor) {
		contenteditable_selection_node(anchor);
		name = contenteditable_getAttribute(anchor, 'name') || '';
		htmlclass = contenteditable_getAttribute(anchor, "class") || "";
		htmlid = contenteditable_getAttribute(anchor, "id") || "";
	}
	if ((typeof(webeditor.anchor_window) == "undefined") || (webeditor.anchor_window == null) || webeditor.anchor_window.closed) {
		webeditor.anchor_window = window.open(webeditor.rootpath+"anchor.html?editor=webeditor&name="+escape(name)+"&htmlid="+escape(htmlid)+"&htmlclass="+escape(htmlclass), "anchor_window", "width=475,height=275,scrollbars=yes,resizable=yes,status=yes", true);
	}
	if (webeditor.anchor_window) webeditor.anchor_window.focus();
}

function webeditor_dropdown(inputname, inputnode) {
	if (typeof(webeditor_dropdown_close_all) != "undefined") webeditor_dropdown_close_all();
	if (typeof(webeditor_menu_hide) != "undefined") webeditor_menu_hide();
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	contenteditable_focus_toolbar(inputnode);
	if (contenteditable_viewsource_status[contenteditable_focused]) return;
	if (inputname != "formatclass") webeditor_dropdown_close("formatclass");
	if (inputname != "formatblock") webeditor_dropdown_close("formatblock");
	if (inputname != "fontname") webeditor_dropdown_close("fontname");
	if (inputname != "fontsize") webeditor_dropdown_close("fontsize");
	webeditor_dropdown_refresh(inputname);
	var div = document.getElementById(inputname+"_dropdown");
	if (div && div.style) {
		if (contenteditable_dropdown_hidden(div)) {
			div.style.zIndex = 1 + getMaxZIndex(inputnode);
			if (div.style.zIndex < 100000) div.style.zIndex = 100000;
		     	div.style.top = "" + (getAbsoluteOffsetTop(inputnode) + inputnode.clientHeight + (inputnode.clientTop ? inputnode.clientTop : 1)) + "px";
		     	div.style.left = "" + (getAbsoluteOffsetLeft(inputnode)) + "px";
			contenteditable_dropdown_show(div);
		} else {
			contenteditable_dropdown_hide(div);
		}
	}
}

function webeditor_dropdown_refresh(inputname) {
	webeditor_dropdown_init(inputname, false, false, true);
	if ((inputname == "formatclass") || (inputname == "fontname") || (inputname == "fontsize")) {
		webeditor_dropdown_option(inputname, "&nbsp;", "");
	}
	if (inputname == "formatclass") {
		var stylesheetclassnames = webeditor.stylesheetclassnames;
		if ((! stylesheetclassnames) && parent.webeditor) {
			stylesheetclassnames = parent.webeditor.stylesheetclassnames;
		}
		var stylesheetclassvalues = webeditor.stylesheetclassvalues;
		if ((! stylesheetclassvalues) && parent.webeditor) {
			stylesheetclassvalues = parent.webeditor.stylesheetclassvalues;
		}
		if (stylesheetclassnames && stylesheetclassvalues) {
			for (var j in stylesheetclassnames) if (typeof(stylesheetclassnames[j]) != "function") {
				var myclassname = stylesheetclassnames[j];
				var myclassvalue = stylesheetclassvalues[myclassname];
				if (myclassname) {
					webeditor_dropdown_option('formatclass', myclassname, myclassvalue);
				}
			}
		}
	} else {
		if (webeditor && webeditor.options) {
			for (var k=0; k<webeditor.options[inputname].length; k++) {
				webeditor_dropdown_option(inputname, webeditor.options[inputname][k].name, webeditor.options[inputname][k].value);
			}
		}
	}
}

function webeditor_dropdown_close(inputname) {
	var div = document.getElementById(inputname+"_dropdown");
	if (div && div.style) {
		contenteditable_dropdown_hide(div);
	}
}

function webeditor_dropdown_close_all() {
	if (webeditor.WYSIWYGselect) {
		webeditor_dropdown_close("formatclass");
		webeditor_dropdown_close("formatblock");
		webeditor_dropdown_close("fontname");
		webeditor_dropdown_close("fontsize");
	}
}

function webeditor_dropdown_select(inputname, selectedname, selectedvalue) {
	var div = document.getElementById(inputname+"_dropdown");
	if (div && div.style) {
		contenteditable_dropdown_hide(div);
	}
	if (document.getElementById(inputname).value != selectedname) {
		document.getElementById(inputname).value = selectedname;
		var selected = new Object();
		selected.id = inputname;
		selected.name = selectedname;
		selected.value = selectedvalue;
		selected.select = webeditor_select;
		selected.select();
	}
}

var webeditor_dropdown_options = new Array();

function webeditor_dropdown_init(inputname, height, width, loadstylesheet) {
	if (webeditor.WYSIWYGselect) {
		height = height || "300px";
		width = width || "250px";
	} else {
		height = "1px";
		width = "1px";
	}
	var iframe = document.getElementById(inputname+"_dropdown");
	if (! iframe) {
		iframe = document.createElement("IFRAME");
		iframe.setAttribute("id", inputname + "_dropdown");
		iframe.setAttribute("class", "webeditor_dropdown");
		iframe.setAttribute("className", "webeditor_dropdown");
		iframe.setAttribute("width", width);
		iframe.setAttribute("height", height);
		iframe.setAttribute("scrolling", "yes");
		iframe.setAttribute("unselectable", "on");
//		iframe.setAttribute("src", webeditor.rootpath + 'dropdown.html');
		if (webeditor.stylesheets[inputname]) {
			iframe.setAttribute("src", webeditor.rootpath + 'dropdown.html?stylesheet=' + webeditor.stylesheets[inputname]);
		} else if (webeditor.stylesheet) {
			iframe.setAttribute("src", webeditor.rootpath + 'dropdown.html?stylesheet=' + webeditor.stylesheet);
		} else {
			iframe.setAttribute("src", webeditor.rootpath + 'dropdown.html');
		}
		iframe.style.background = "white";
		iframe.style.position = "absolute";
		contenteditable_dropdown_hide(iframe);
		document.body.insertBefore(iframe, document.body.firstChild);
//		document.body.insertBefore(iframe, document.body.lastChild);
	}
	if (iframe && iframe.contentWindow && iframe.contentWindow.document && iframe.contentWindow.document.body) {
		iframe.contentWindow.document.body.innerHTML = '<div unselectable="on"><table summary="" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td id="' + inputname + '_dropdown_options" nowrap="nowrap"></td></tr></tbody></table></div>';
	}
//	if (contenteditable_stylesheet[contenteditable_focused_iframe().id]) webeditor_dropdown_stylesheet(inputname, contenteditable_stylesheet[contenteditable_focused_iframe().id]);
	if (loadstylesheet && contenteditable_stylesheet[contenteditable_focused_iframe().id]) webeditor_dropdown_stylesheet(inputname, contenteditable_stylesheet[contenteditable_focused_iframe().id]);
	webeditor_dropdown_options[inputname] = new Object();
}

function webeditor_dropdown_stylesheet(inputname, stylesheet) {
	var iframe = document.getElementById(inputname+"_dropdown");
	if (stylesheet && iframe && iframe.contentWindow && iframe.contentWindow.document && iframe.contentWindow.document.getElementById('dropdownstylesheet') && iframe.contentWindow.document.getElementById('dropdownstylesheet').href) {
		var stylesheet_changed = iframe.contentWindow.document.getElementById('dropdownstylesheet').href.indexOf(stylesheet) - (iframe.contentWindow.document.getElementById('dropdownstylesheet').href.length - stylesheet.length);
		if (stylesheet_changed) iframe.contentWindow.document.getElementById('dropdownstylesheet').href = stylesheet;
	}
}

function webeditor_dropdown_option(inputname, name, value) {
	var iframe = document.getElementById(inputname+"_dropdown");
	if (iframe && iframe.contentWindow && iframe.contentWindow.document) {
		var options = iframe.contentWindow.document.getElementById(inputname+"_dropdown_options");
		if (options) {
			if (inputname == "formatclass") {
				options.innerHTML += '<div style="max-width: 250px;" unselectable="on" class="webeditor_dropdown_item" onmouseover="this.className=\'webeditor_dropdown_item_mouseover\'" onmouseout="this.className=\'webeditor_dropdown_item\'" onclick="this.className=\'webeditor_dropdown_item\'; parent.webeditor_dropdown_select(\'' + inputname + '\',\'' + name + '\',\'' + value + '\')"><span unselectable="on" class="' + value + '">' + name + '</span></div>';
			} else if (inputname == "formatblock") {
				options.innerHTML += '<div style="max-width: 250px;" unselectable="on" class="webeditor_dropdown_item" onmouseover="this.className=\'webeditor_dropdown_item_mouseover\'" onmouseout="this.className=\'webeditor_dropdown_item\'" onclick="this.className=\'webeditor_dropdown_item\'; parent.webeditor_dropdown_select(\'' + inputname + '\',\'' + name + '\',\'' + value + '\')">' + value.substring(0,value.length-1) + ' unselectable="on">' + name + '</' + value.substring(1) + '</div>';
			} else if (inputname == "fontname") {
				options.innerHTML += '<div style="max-width: 250px;" unselectable="on" class="webeditor_dropdown_item" onmouseover="this.className=\'webeditor_dropdown_item_mouseover\'" onmouseout="this.className=\'webeditor_dropdown_item\'" onclick="this.className=\'webeditor_dropdown_item\'; parent.webeditor_dropdown_select(\'' + inputname + '\',\'' + name + '\',\'' + value + '\')"><font unselectable="on" face="' + value + '">' + name + '</font></div>';
			} else if (inputname == "fontsize") {
				options.innerHTML += '<div style="max-width: 250px;" unselectable="on" class="webeditor_dropdown_item" onmouseover="this.className=\'webeditor_dropdown_item_mouseover\'" onmouseout="this.className=\'webeditor_dropdown_item\'" onclick="this.className=\'webeditor_dropdown_item\'; parent.webeditor_dropdown_select(\'' + inputname + '\',\'' + name + '\',\'' + value + '\')"><font unselectable="on" size="' + value + '">' + name + '</font></div>';
			}
			webeditor_dropdown_options[inputname][name] = value;
		}
	}
}

function webeditor_menu_init() {
	var div = document.getElementById("menu_dropdown");
	if (! div) {
		div = document.createElement("DIV");
		div.setAttribute("id", "menu_dropdown");
		div.setAttribute("class", "webeditor_dropdown");
		div.setAttribute("className", "webeditor_dropdown");
		div.style.background = "white";
		div.style.position = "absolute";
		div.style.width = "200px";
		contenteditable_dropdown_hide(div);
		document.body.insertBefore(div, document.body.firstChild);
//		document.body.insertBefore(div, document.body.lastChild);
	}
	if (div) {
		div.innerHTML = '<DIV unselectable="on" class="webeditor_menu_dropdown"><table summary="" class="webeditor_menu_dropdown" width="100%" cellspacing="0" cellpadding="0" border="1"><TBODY><tr><td id="' + 'menu_dropdown_options" nowrap="nowrap"></td></tr></tbody></table></div>';
	}
	div = document.getElementById("submenu_dropdown");
	if (! div) {
		div = document.createElement("DIV");
		div.setAttribute("name", "");
		div.setAttribute("id", "submenu_dropdown");
		div.setAttribute("class", "webeditor_dropdown");
		div.setAttribute("className", "webeditor_dropdown");
		div.style.background = "white";
		div.style.position = "absolute";
		div.style.width = "200px";
		contenteditable_dropdown_hide(div);
		document.body.insertBefore(div, document.body.firstChild);
//		document.body.insertBefore(div, document.body.lastChild);
	}
	if (div) {
		div.innerHTML = '<DIV unselectable="on" class="webeditor_menu_dropdown"><table summary="" class="webeditor_menu_dropdown" width="100%" cellspacing="0" cellpadding="0" border="1"><TBODY><tr><td id="' + 'submenu_dropdown_options" nowrap="nowrap"></td></tr></tbody></table></div>';
	}
}

function webeditor_menu(inputname, inputnode, xpos, ypos) {
	if (webeditor.count && (webeditor.count != webeditor.inited)) return;
	if (webeditor.disabled) return;
	if ((! contenteditable_focused_iframe()) || (! contenteditable_focused_iframe().id) || (! contenteditable_inited[contenteditable_focused_iframe().id])) return;
	contenteditable_focus_toolbar(inputnode);
	if (contenteditable_viewsource_status[contenteditable_focused]) return;
	if (inputnode) inputnode.className = "webeditor_icon_mouseover";
	var menu = document.getElementById("menu_dropdown");
	var options = document.getElementById("menu_dropdown_options");
	if (menu && options) {
		options.innerHTML = webeditor_menuitems(inputname, inputnode);
	}
	if (menu && menu.style) {
		if (xpos || ypos) {
			menu.style.zIndex = 100000;
		     	menu.style.top = "" + (getAbsoluteOffsetTop(inputnode) + ypos) + "px";
	     		menu.style.left = "" + (getAbsoluteOffsetLeft(inputnode) + xpos) + "px";
			contenteditable_dropdown_show(menu);
		} else if (inputnode) {
			menu.style.zIndex = 1 + getMaxZIndex(inputnode);
			if (menu.style.zIndex < 100000) menu.style.zIndex = 100000;
		     	menu.style.top = "" + (getAbsoluteOffsetTop(inputnode) + inputnode.clientHeight + (inputnode.clientTop ? inputnode.clientTop : 1)) + "px";
	     		menu.style.left = "" + (getAbsoluteOffsetLeft(inputnode)) + "px";
			contenteditable_dropdown_show(menu);
		}
	}
	if (menu) {
		children = menu.getElementsByTagName('DIV');
		for (var i=0; i < children.length; i++) {
			if ((children[i].className == "webeditor_menu") || (children[i].className == "webeditor_menu_selected") || (children[i].className == "webeditor_menu_disabled")) {
				children[i].style.width = "100%";
				if (children[i].onmouseover && children[i].getAttribute("onmouseover") && children[i].removeEventListener && children[i].addEventListener) {
					// Netscape may not attach event handlers through innerHTML
					var event_handler = children[i].onmouseover;
					contenteditable_detach_event_handler(children[i], "mouseover", event_handler);
					contenteditable_attach_event_handler(children[i], "mouseover", event_handler);
				}
				if (! children[i].onmouseover) {
					contenteditable_attach_event_handler(children[i], "mouseover", webeditor_menu_mouseover);
				}
				if (! children[i].onmouseout) {
					contenteditable_attach_event_handler(children[i], "mouseout", webeditor_menu_mouseout);
				}
				if (! children[i].onmousedown) {
					contenteditable_attach_event_handler(children[i], "mousedown", webeditor_menu_mousedown);
				}
				if (! children[i].onmouseup) {
					contenteditable_attach_event_handler(children[i], "mouseup", webeditor_menu_mouseup);
				}
				if (! children[i].onclick) {
					contenteditable_attach_event_handler(children[i], "click", webeditor_click);
				}
			}
		}
	}
}

var webeditor_submenu_parent;

function webeditor_submenu(inputname, inputnode) {
	if (contenteditable_viewsource_status[contenteditable_focused]) return;
	if (inputnode) if (inputnode.className != "webeditor_menu_disabled") inputnode.className = "webeditor_menu_mouseover";
	webeditor_submenu_parent = inputnode;
	var parentmenu = document.getElementById(inputname);
	if (parentmenu) parentmenu.className = "webeditor_menu_mouseover";
	var menu = document.getElementById("submenu_dropdown");
	if (menu) {
		menu.name = inputname;
	}
	var options = document.getElementById("submenu_dropdown_options");
	if (menu && options) {
		options.innerHTML = webeditor_menuitems(inputname, inputnode);
	}
	if (menu && menu.style) {
		menu.style.zIndex = 1 + getMaxZIndex(inputnode);
		if (menu.style.zIndex < 100000) menu.style.zIndex = 100000;
	     	menu.style.top = "" + getAbsoluteOffsetTop(inputnode,true) + "px";
     		menu.style.left = "" + (getAbsoluteOffsetLeft(inputnode,true) + inputnode.offsetWidth + 2) + "px";
		contenteditable_dropdown_show(menu);
	}
	children = menu.getElementsByTagName('DIV');
	for (var i=0; i < children.length; i++) {
		if ((children[i].className == "webeditor_menu") || (children[i].className == "webeditor_menu_selected") || (children[i].className == "webeditor_menu_disabled")) {
			children[i].style.width = "100%";
			if (! children[i].onmouseover) children[i].onmouseover = webeditor_submenu_mouseover;
			if (! children[i].onmouseout) children[i].onmouseout = webeditor_submenu_mouseout;
			if (! children[i].onmousedown) children[i].onmousedown = webeditor_menu_mousedown;
			if (! children[i].onmouseup) children[i].onmouseup = webeditor_menu_mouseup;
			if (! children[i].onclick) children[i].onclick = webeditor_click;
		}
	}
}

function webeditor_menuitems(inputname, inputnode) {
	var menuitems = '';
	var isTable = contenteditable_isTable();
	var isTableCaption = contenteditable_isTableCaption();
	var isRow = contenteditable_isRow();
	var isCell = contenteditable_isCell();
	var positionable = contenteditable_positionable();
	var selection = contenteditable_selection_text();
	var container = contenteditable_selection_container();
	if (inputname == "clipboard") {
		menuitems += webeditor_menu_clipboard(inputname, inputnode);
	} else if (inputname == "colour") {
		menuitems += webeditor_menu_colour(inputname, inputnode);
	} else if (inputname == "form") {
		menuitems += webeditor_menu_form(inputname, inputnode);
	} else if (inputname == "justify") {
		menuitems += webeditor_menu_justify(inputname, inputnode);
	} else if (inputname == "position") {
		menuitems += webeditor_menu_position(inputname, inputnode, positionable);
	} else if (inputname == "table") {
		menuitems += webeditor_menu_table(inputname, inputnode, isTable, isTableCaption, isRow, isCell);
	} else if (inputname == "textformat") {
		menuitems += webeditor_menu_textformat(inputname, inputnode);

	} else if (inputname == "tableinsert") {
		menuitems += webeditor_menu_tableinsert(inputname, inputnode, isTable, isTableCaption, isRow, isCell);
	} else if (inputname == "tabledelete") {
		menuitems += webeditor_menu_tabledelete(inputname, inputnode, isTable, isTableCaption, isRow, isCell);
	} else if (inputname == "tableselect") {
		menuitems += webeditor_menu_tableselect(inputname, inputnode, isTable, isTableCaption, isRow, isCell);
	} else if (inputname == "tablemodify") {
		menuitems += webeditor_menu_tablemodify(inputname, inputnode, isTable, isTableCaption, isRow, isCell);
	} else if (inputname == "tablepropertiesmenu") {
		menuitems += webeditor_menu_tablepropertiesmenu(inputname, inputnode, isTable, isTableCaption, isRow, isCell);

	} else if (inputname == "context") {
		menuitems += webeditor_menu_clipboard(inputname, inputnode, selection);
		if ((selection != '') && (container.nodeName != "IMG")) {
			menuitems += webeditor_menu_text(inputname, inputnode);
		}
		if ((container.nodeName == "H1") || (container.nodeName == "H2") || (container.nodeName == "H3") || (container.nodeName == "H4") || (container.nodeName == "H5") || (container.nodeName == "H6")) {
			menuitems += webeditor_menu_heading(inputname, inputnode);
		}
		if ((container.nodeName == "P") || (container.nodeName == "DIV")) {
			menuitems += webeditor_menu_paragraph(inputname, inputnode);
		}
		if (positionable && (positionable.nodeName != 'TABLE')) {
			menuitems += webeditor_menu_separator();
			menuitems += webeditor_menu_position(inputname, inputnode, positionable);
		}
		if (isTable) {
			menuitems += webeditor_menu_table(inputname, inputnode, isTable, isTableCaption, isRow, isCell);
		}
		if (positionable && (positionable.nodeName == 'TABLE')) {
			menuitems += webeditor_menu_separator();
			menuitems += webeditor_menu_position(inputname, inputnode, positionable);
		}
	}
	return menuitems;
}

function webeditor_menu_hide() {
	webeditor_submenu_hide();
	var menu = document.getElementById("menu_dropdown");
	if (menu) contenteditable_dropdown_hide(menu);
}

function webeditor_submenu_hide() {
	var submenu = document.getElementById("submenu_dropdown");
	if (submenu) contenteditable_dropdown_hide(submenu);
	if (submenu && submenu.name) {
		var menu = document.getElementById(submenu.name);
		if (menu) menu.className = "webeditor_menu";
		submenu.name = "";
	}
}

function webeditor_menu_separator() {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu_separator"><img unselectable="on" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div>';
	return menuitems;
}

function webeditor_menu_table(inputname, inputnode, isTable, isTableCaption, isRow, isCell) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu_heading"><span unselectable="on">'+Text('toolbar_menu_table')+'</span></div>';
	menuitems += '<div onclick="return false;" unselectable="on" class="webeditor_menu" id="tableinsert" onmouseover="webeditor_submenu(\'tableinsert\',this);"><img unselectable="on" src="' + webeditor.buttonpath + 'tableinsert.gif" alt="'+Text('toolbar_menu_tableinsert')+'"> <span unselectable="on">'+Text('toolbar_menu_tableinsert')+'</span></div>';
	menuitems += '<div onclick="return false;" unselectable="on" class="webeditor_menu" id="tabledelete" onmouseover="webeditor_submenu(\'tabledelete\',this);"><img unselectable="on" src="' + webeditor.buttonpath + 'tabledelete.gif" alt="'+Text('toolbar_menu_tabledelete')+'"> <span unselectable="on">'+Text('toolbar_menu_tabledelete')+'</span></div>';
	menuitems += '<div onclick="return false;" unselectable="on" class="webeditor_menu" id="tableselect" onmouseover="webeditor_submenu(\'tableselect\',this);"><img unselectable="on" src="' + webeditor.buttonpath + 'tableselect.gif" alt="'+Text('toolbar_menu_tableselect')+'"> <span unselectable="on">'+Text('toolbar_menu_tableselect')+'</span></div>';
	menuitems += '<div onclick="return false;" unselectable="on" class="webeditor_menu" id="tablemodify" onmouseover="webeditor_submenu(\'tablemodify\',this);"><img unselectable="on" src="' + webeditor.buttonpath + 'tablemodify.gif" alt="'+Text('toolbar_menu_tablemodify')+'"> <span unselectable="on">'+Text('toolbar_menu_tablemodify')+'</span></div>';
	menuitems += '<div onclick="return false;" unselectable="on" class="webeditor_menu" id="tablepropertiesmenu" onmouseover="webeditor_submenu(\'tablepropertiesmenu\',this);"><img unselectable="on" src="' + webeditor.buttonpath + 'tablepropertiesmenu.gif" alt="'+Text('toolbar_menu_tablepropertiesmenu')+'"> <span unselectable="on">'+Text('toolbar_menu_tablepropertiesmenu')+'</span></div>';
	return menuitems;
}

function webeditor_menu_tablepropertiesmenu(inputname, inputnode, isTable, isTableCaption, isRow, isCell) {
	var menuitems = '';
	if (! isTable) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="tableproperties"><img unselectable="on" src="' + webeditor.buttonpath + 'tableproperties.gif" alt="'+Text('toolbar_tableproperties')+'"> <span unselectable="on">'+Text('toolbar_tableproperties')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="tableproperties"><img unselectable="on" src="' + webeditor.buttonpath + 'tableproperties.gif" alt="'+Text('toolbar_tableproperties')+'"> <span unselectable="on">'+Text('toolbar_tableproperties')+'</span></div>';
	}
	if (! isRow) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="rowproperties"><img unselectable="on" src="' + webeditor.buttonpath + 'rowproperties.gif" alt="'+Text('toolbar_rowproperties')+'"> <span unselectable="on">'+Text('toolbar_rowproperties')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="rowproperties"><img unselectable="on" src="' + webeditor.buttonpath + 'rowproperties.gif" alt="'+Text('toolbar_rowproperties')+'"> <span unselectable="on">'+Text('toolbar_rowproperties')+'</span></div>';
	}
	if (! isCell) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="columnproperties"><img unselectable="on" src="' + webeditor.buttonpath + 'columnproperties.gif" alt="'+Text('toolbar_columnproperties')+'"> <span unselectable="on">'+Text('toolbar_columnproperties')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="cellproperties"><img unselectable="on" src="' + webeditor.buttonpath + 'cellproperties.gif" alt="'+Text('toolbar_cellproperties')+'"> <span unselectable="on">'+Text('toolbar_cellproperties')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="columnproperties"><img unselectable="on" src="' + webeditor.buttonpath + 'columnproperties.gif" alt="'+Text('toolbar_columnproperties')+'"> <span unselectable="on">'+Text('toolbar_columnproperties')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="cellproperties"><img unselectable="on" src="' + webeditor.buttonpath + 'cellproperties.gif" alt="'+Text('toolbar_cellproperties')+'"> <span unselectable="on">'+Text('toolbar_cellproperties')+'</span></div>';
	}
	return menuitems;
}

function webeditor_menu_tableinsert(inputname, inputnode, isTable, isTableCaption, isRow, isCell) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="createtable"><img unselectable="on" src="' + webeditor.buttonpath + 'createtable.gif" alt="'+Text('toolbar_createtable')+'"> <span unselectable="on">'+Text('toolbar_createtable')+'</span></div>';
	if (! isTable) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertcaption"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcaption.gif" alt="'+Text('toolbar_insertcaption')+'"> <span unselectable="on">'+Text('toolbar_insertcaption')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertcaption"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcaption.gif" alt="'+Text('toolbar_insertcaption')+'"> <span unselectable="on">'+Text('toolbar_insertcaption')+'</span></div>';
	}
	if (! isRow) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertrowhead"><img unselectable="on" src="' + webeditor.buttonpath + 'insertrowhead.gif" alt="'+Text('toolbar_insertrowhead')+'"> <span unselectable="on">'+Text('toolbar_insertrowhead')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertrowfoot"><img unselectable="on" src="' + webeditor.buttonpath + 'insertrowfoot.gif" alt="'+Text('toolbar_insertrowfoot')+'"> <span unselectable="on">'+Text('toolbar_insertrowfoot')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertrowabove"><img unselectable="on" src="' + webeditor.buttonpath + 'insertrowabove.gif" alt="'+Text('toolbar_insertrowabove')+'"> <span unselectable="on">'+Text('toolbar_insertrowabove')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertrowbelow"><img unselectable="on" src="' + webeditor.buttonpath + 'insertrowbelow.gif" alt="'+Text('toolbar_insertrowbelow')+'"> <span unselectable="on">'+Text('toolbar_insertrowbelow')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertrowhead"><img unselectable="on" src="' + webeditor.buttonpath + 'insertrowhead.gif" alt="'+Text('toolbar_insertrowhead')+'"> <span unselectable="on">'+Text('toolbar_insertrowhead')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertrowfoot"><img unselectable="on" src="' + webeditor.buttonpath + 'insertrowfoot.gif" alt="'+Text('toolbar_insertrowfoot')+'"> <span unselectable="on">'+Text('toolbar_insertrowfoot')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertrowabove"><img unselectable="on" src="' + webeditor.buttonpath + 'insertrowabove.gif" alt="'+Text('toolbar_insertrowabove')+'"> <span unselectable="on">'+Text('toolbar_insertrowabove')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertrowbelow"><img unselectable="on" src="' + webeditor.buttonpath + 'insertrowbelow.gif" alt="'+Text('toolbar_insertrowbelow')+'"> <span unselectable="on">'+Text('toolbar_insertrowbelow')+'</span></div>';
	}
	if (! isCell) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertcolumnleft"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcolumnleft.gif" alt="'+Text('toolbar_insertcolumnleft')+'"> <span unselectable="on">'+Text('toolbar_insertcolumnleft')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertcolumnright"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcolumnright.gif" alt="'+Text('toolbar_insertcolumnright')+'"> <span unselectable="on">'+Text('toolbar_insertcolumnright')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertcellleft"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcellleft.gif" alt="'+Text('toolbar_insertcellleft')+'"> <span unselectable="on">'+Text('toolbar_insertcellleft')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="insertcellright"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcellright.gif" alt="'+Text('toolbar_insertcellright')+'"> <span unselectable="on">'+Text('toolbar_insertcellright')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertcolumnleft"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcolumnleft.gif" alt="'+Text('toolbar_insertcolumnleft')+'"> <span unselectable="on">'+Text('toolbar_insertcolumnleft')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertcolumnright"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcolumnright.gif" alt="'+Text('toolbar_insertcolumnright')+'"> <span unselectable="on">'+Text('toolbar_insertcolumnright')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertcellleft"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcellleft.gif" alt="'+Text('toolbar_insertcellleft')+'"> <span unselectable="on">'+Text('toolbar_insertcellleft')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="insertcellright"><img unselectable="on" src="' + webeditor.buttonpath + 'insertcellright.gif" alt="'+Text('toolbar_insertcellright')+'"> <span unselectable="on">'+Text('toolbar_insertcellright')+'</span></div>';
	}
	return menuitems;
}

function webeditor_menu_tabledelete(inputname, inputnode, isTable, isTableCaption, isRow, isCell) {
	var menuitems = '';
	if ((! isRow) && (! isTableCaption)) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="deleterow"><img unselectable="on" src="' + webeditor.buttonpath + 'deleterow.gif" alt="'+Text('toolbar_deleterow')+'"> <span unselectable="on">'+Text('toolbar_deleterow')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="deleterow"><img unselectable="on" src="' + webeditor.buttonpath + 'deleterow.gif" alt="'+Text('toolbar_deleterow')+'"> <span unselectable="on">'+Text('toolbar_deleterow')+'</span></div>';
	}
	if (! isCell) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="deletecolumn"><img unselectable="on" src="' + webeditor.buttonpath + 'deletecolumn.gif" alt="'+Text('toolbar_deletecolumn')+'"> <span unselectable="on">'+Text('toolbar_deletecolumn')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="deletecell"><img unselectable="on" src="' + webeditor.buttonpath + 'deletecell.gif" alt="'+Text('toolbar_deletecell')+'"> <span unselectable="on">'+Text('toolbar_deletecell')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="deletecolumn"><img unselectable="on" src="' + webeditor.buttonpath + 'deletecolumn.gif" alt="'+Text('toolbar_deletecolumn')+'"> <span unselectable="on">'+Text('toolbar_deletecolumn')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="deletecell"><img unselectable="on" src="' + webeditor.buttonpath + 'deletecell.gif" alt="'+Text('toolbar_deletecell')+'"> <span unselectable="on">'+Text('toolbar_deletecell')+'</span></div>';
	}
	return menuitems;
}

function webeditor_menu_tableselect(inputname, inputnode, isTable, isTableCaption, isRow, isCell) {
	var menuitems = '';
	if (! isTable) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="selecttable"><img unselectable="on" src="' + webeditor.buttonpath + 'selecttable.gif" alt="'+Text('toolbar_selecttable')+'"> <span unselectable="on">'+Text('toolbar_selecttable')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="selecttable"><img unselectable="on" src="' + webeditor.buttonpath + 'selecttable.gif" alt="'+Text('toolbar_selecttable')+'"> <span unselectable="on">'+Text('toolbar_selecttable')+'</span></div>';
	}
	if (! isRow) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="selectrow"><img unselectable="on" src="' + webeditor.buttonpath + 'selectrow.gif" alt="'+Text('toolbar_selectrow')+'"> <span unselectable="on">'+Text('toolbar_selectrow')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="selectrow"><img unselectable="on" src="' + webeditor.buttonpath + 'selectrow.gif" alt="'+Text('toolbar_selectrow')+'"> <span unselectable="on">'+Text('toolbar_selectrow')+'</span></div>';
	}
	if (! isCell) {
//		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="selectcolumn"><img unselectable="on" src="' + webeditor.buttonpath + 'selectcolumn.gif" alt="'+Text('toolbar_selectcolumn')+'"> <span unselectable="on">'+Text('toolbar_selectcolumn')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="selectcell"><img unselectable="on" src="' + webeditor.buttonpath + 'selectcell.gif" alt="'+Text('toolbar_selectcell')+'"> <span unselectable="on">'+Text('toolbar_selectcell')+'</span></div>';
	} else {
//		menuitems += '<div unselectable="on" class="webeditor_menu" id="selectcolumn"><img unselectable="on" src="' + webeditor.buttonpath + 'selectcolumn.gif" alt="'+Text('toolbar_selectcolumn')+'"> <span unselectable="on">'+Text('toolbar_selectcolumn')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="selectcell"><img unselectable="on" src="' + webeditor.buttonpath + 'selectcell.gif" alt="'+Text('toolbar_selectcell')+'"> <span unselectable="on">'+Text('toolbar_selectcell')+'</span></div>';
	}
	return menuitems;
}

function webeditor_menu_tablemodify(inputname, inputnode, isTable, isTableCaption, isRow, isCell) {
	var menuitems = '';
	if (! contenteditable_selection_container('table')) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="mergecells"><img unselectable="on" src="' + webeditor.buttonpath + 'mergecells.gif" alt="'+Text('toolbar_mergecells')+'"> <span unselectable="on">'+Text('toolbar_mergecells')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="mergecells"><img unselectable="on" src="' + webeditor.buttonpath + 'mergecells.gif" alt="'+Text('toolbar_mergecells')+'"> <span unselectable="on">'+Text('toolbar_mergecells')+'</span></div>';
	}
	if (! isCell) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="splitcell"><img unselectable="on" src="' + webeditor.buttonpath + 'splitcell.gif" alt="'+Text('toolbar_splitcell')+'"> <span unselectable="on">'+Text('toolbar_splitcell')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="splitcellcolumns"><img unselectable="on" src="' + webeditor.buttonpath + 'splitcellcolumns.gif" alt="'+Text('toolbar_splitcellcolumns')+'"> <span unselectable="on">'+Text('toolbar_splitcellcolumns')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="splitcellrows"><img unselectable="on" src="' + webeditor.buttonpath + 'splitcellrows.gif" alt="'+Text('toolbar_splitcellrows')+'"> <span unselectable="on">'+Text('toolbar_splitcellrows')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="splitcell"><img unselectable="on" src="' + webeditor.buttonpath + 'splitcell.gif" alt="'+Text('toolbar_splitcell')+'"> <span unselectable="on">'+Text('toolbar_splitcell')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="splitcellcolumns"><img unselectable="on" src="' + webeditor.buttonpath + 'splitcellcolumns.gif" alt="'+Text('toolbar_splitcellcolumns')+'"> <span unselectable="on">'+Text('toolbar_splitcellcolumns')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="splitcellrows"><img unselectable="on" src="' + webeditor.buttonpath + 'splitcellrows.gif" alt="'+Text('toolbar_splitcellrows')+'"> <span unselectable="on">'+Text('toolbar_splitcellrows')+'</span></div>';
	}
	return menuitems;
}

function webeditor_menu_form(inputname, inputnode) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="form"><img unselectable="on" src="' + webeditor.buttonpath + 'form.gif" alt="'+Text('toolbar_form')+'"> <span unselectable="on">'+Text('toolbar_form')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="submitbutton"><img unselectable="on" src="' + webeditor.buttonpath + 'submitbutton.gif" alt="'+Text('toolbar_submitbutton')+'"> <span unselectable="on">'+Text('toolbar_submitbutton')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="resetbutton"><img unselectable="on" src="' + webeditor.buttonpath + 'resetbutton.gif" alt="'+Text('toolbar_resetbutton')+'"> <span unselectable="on">'+Text('toolbar_resetbutton')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="backbutton"><img unselectable="on" src="' + webeditor.buttonpath + 'backbutton.gif" alt="'+Text('toolbar_backbutton')+'"> <span unselectable="on">'+Text('toolbar_backbutton')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="imagebutton"><img unselectable="on" src="' + webeditor.buttonpath + 'imagebutton.gif" alt="'+Text('toolbar_imagebutton')+'"> <span unselectable="on">'+Text('toolbar_imagebutton')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="file"><img unselectable="on" src="' + webeditor.buttonpath + 'file.gif" alt="'+Text('toolbar_file')+'"> <span unselectable="on">'+Text('toolbar_file')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="button"><img unselectable="on" src="' + webeditor.buttonpath + 'button.gif" alt="'+Text('toolbar_button')+'"> <span unselectable="on">'+Text('toolbar_button')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="text"><img unselectable="on" src="' + webeditor.buttonpath + 'text.gif" alt="'+Text('toolbar_text')+'"> <span unselectable="on">'+Text('toolbar_text')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="password"><img unselectable="on" src="' + webeditor.buttonpath + 'password.gif" alt="'+Text('toolbar_password')+'"> <span unselectable="on">'+Text('toolbar_password')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="hidden"><img unselectable="on" src="' + webeditor.buttonpath + 'hidden.gif" alt="'+Text('toolbar_hidden')+'"> <span unselectable="on">'+Text('toolbar_hidden')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="textarea"><img unselectable="on" src="' + webeditor.buttonpath + 'textarea.gif" alt="'+Text('toolbar_textarea')+'"> <span unselectable="on">'+Text('toolbar_textarea')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="checkbox"><img unselectable="on" src="' + webeditor.buttonpath + 'checkbox.gif" alt="'+Text('toolbar_checkbox')+'"> <span unselectable="on">'+Text('toolbar_checkbox')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="radio"><img unselectable="on" src="' + webeditor.buttonpath + 'radio.gif" alt="'+Text('toolbar_radio')+'"> <span unselectable="on">'+Text('toolbar_radio')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="select"><img unselectable="on" src="' + webeditor.buttonpath + 'select.gif" alt="'+Text('toolbar_select')+'"> <span unselectable="on">'+Text('toolbar_select')+'</span></div>';
	return menuitems;
}

function webeditor_menu_position(inputname, inputnode, positionable) {
	var menuitems = '';
	if (! positionable) {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="position"><img unselectable="on" src="' + webeditor.buttonpath + 'position.gif" alt="'+Text('toolbar_position')+'"> <span unselectable="on">'+Text('toolbar_position')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="forwards"><img unselectable="on" src="' + webeditor.buttonpath + 'forwards.gif" alt="'+Text('toolbar_forwards')+'"> <span unselectable="on">'+Text('toolbar_forwards')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="backwards"><img unselectable="on" src="' + webeditor.buttonpath + 'backwards.gif" alt="'+Text('toolbar_backwards')+'"> <span unselectable="on">'+Text('toolbar_backwards')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="front"><img unselectable="on" src="' + webeditor.buttonpath + 'front.gif" alt="'+Text('toolbar_front')+'"> <span unselectable="on">'+Text('toolbar_front')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="back"><img unselectable="on" src="' + webeditor.buttonpath + 'back.gif" alt="'+Text('toolbar_back')+'"> <span unselectable="on">'+Text('toolbar_back')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="abovetext"><img unselectable="on" src="' + webeditor.buttonpath + 'abovetext.gif" alt="'+Text('toolbar_abovetext')+'"> <span unselectable="on">'+Text('toolbar_abovetext')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="belowtext"><img unselectable="on" src="' + webeditor.buttonpath + 'belowtext.gif" alt="'+Text('toolbar_belowtext')+'"> <span unselectable="on">'+Text('toolbar_belowtext')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="position"><img unselectable="on" src="' + webeditor.buttonpath + 'position.gif" alt="'+Text('toolbar_position')+'"> <span unselectable="on">'+Text('toolbar_position')+'</span></div>';
		if (inputnode || (positionable && positionable.style && positionable.style.position && (positionable.style.position != 'static'))) {
			menuitems += '<div unselectable="on" class="webeditor_menu" id="forwards"><img unselectable="on" src="' + webeditor.buttonpath + 'forwards.gif" alt="'+Text('toolbar_forwards')+'"> <span unselectable="on">'+Text('toolbar_forwards')+'</span></div>';
			menuitems += '<div unselectable="on" class="webeditor_menu" id="backwards"><img unselectable="on" src="' + webeditor.buttonpath + 'backwards.gif" alt="'+Text('toolbar_backwards')+'"> <span unselectable="on">'+Text('toolbar_backwards')+'</span></div>';
			menuitems += '<div unselectable="on" class="webeditor_menu" id="front"><img unselectable="on" src="' + webeditor.buttonpath + 'front.gif" alt="'+Text('toolbar_front')+'"> <span unselectable="on">'+Text('toolbar_front')+'</span></div>';
			menuitems += '<div unselectable="on" class="webeditor_menu" id="back"><img unselectable="on" src="' + webeditor.buttonpath + 'back.gif" alt="'+Text('toolbar_back')+'"> <span unselectable="on">'+Text('toolbar_back')+'</span></div>';
			menuitems += '<div unselectable="on" class="webeditor_menu" id="abovetext"><img unselectable="on" src="' + webeditor.buttonpath + 'abovetext.gif" alt="'+Text('toolbar_abovetext')+'"> <span unselectable="on">'+Text('toolbar_abovetext')+'</span></div>';
			menuitems += '<div unselectable="on" class="webeditor_menu" id="belowtext"><img unselectable="on" src="' + webeditor.buttonpath + 'belowtext.gif" alt="'+Text('toolbar_belowtext')+'"> <span unselectable="on">'+Text('toolbar_belowtext')+'</span></div>';
		}
	}
	return menuitems;
}

function webeditor_menu_text(inputname, inputnode) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu_heading"><span unselectable="on">'+Text('toolbar_menu_text')+'</span></div>';
	menuitems += '<div onclick="return false;" unselectable="on" class="webeditor_menu" id="textformat" onmouseover="webeditor_submenu(\'textformat\',this);"><img unselectable="on" src="' + webeditor.buttonpath + 'textformat.gif" alt="'+Text('toolbar_menu_textformat')+'"> <span unselectable="on">'+Text('toolbar_menu_textformat')+'</span></div>';
	return menuitems;
}

function webeditor_menu_textformat(inputname, inputnode) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="bold"><img unselectable="on" src="' + webeditor.buttonpath + 'bold.gif" alt="'+Text('toolbar_bold')+'"> <span unselectable="on">'+Text('toolbar_bold')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="italic"><img unselectable="on" src="' + webeditor.buttonpath + 'italic.gif" alt="'+Text('toolbar_italic')+'"> <span unselectable="on">'+Text('toolbar_italic')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="underline"><img unselectable="on" src="' + webeditor.buttonpath + 'underline.gif" alt="'+Text('toolbar_underline')+'"> <span unselectable="on">'+Text('toolbar_underline')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="forecolor"><img unselectable="on" src="' + webeditor.buttonpath + 'forecolor.gif" alt="'+Text('toolbar_forecolor')+'"> <span unselectable="on">'+Text('toolbar_forecolor')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="backcolor"><img unselectable="on" src="' + webeditor.buttonpath + 'backcolor.gif" alt="'+Text('toolbar_backcolor')+'"> <span unselectable="on">'+Text('toolbar_backcolor')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="superscript"><img unselectable="on" src="' + webeditor.buttonpath + 'superscript.gif" alt="'+Text('toolbar_superscript')+'"> <span unselectable="on">'+Text('toolbar_superscript')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="subscript"><img unselectable="on" src="' + webeditor.buttonpath + 'subscript.gif" alt="'+Text('toolbar_subscript')+'"> <span unselectable="on">'+Text('toolbar_subscript')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="strikethrough"><img unselectable="on" src="' + webeditor.buttonpath + 'strikethrough.gif" alt="'+Text('toolbar_strikethrough')+'"> <span unselectable="on">'+Text('toolbar_strikethrough')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="removeformat"><img unselectable="on" src="' + webeditor.buttonpath + 'removeformat.gif" alt="'+Text('toolbar_removeformat')+'"> <span unselectable="on">'+Text('toolbar_removeformat')+'</span></div>';
	return menuitems;
}

function webeditor_menu_justify(inputname, inputnode) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="justifyleft"><img unselectable="on" src="' + webeditor.buttonpath + 'justifyleft.gif" alt="'+Text('toolbar_justifyleft')+'"> <span unselectable="on">'+Text('toolbar_justifyleft')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="justifycenter"><img unselectable="on" src="' + webeditor.buttonpath + 'justifycenter.gif" alt="'+Text('toolbar_justifycenter')+'"> <span unselectable="on">'+Text('toolbar_justifycenter')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="justifyright"><img unselectable="on" src="' + webeditor.buttonpath + 'justifyright.gif" alt="'+Text('toolbar_justifyright')+'"> <span unselectable="on">'+Text('toolbar_justifyright')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="justifyfull"><img unselectable="on" src="' + webeditor.buttonpath + 'justifyfull.gif" alt="'+Text('toolbar_justifyfull')+'"> <span unselectable="on">'+Text('toolbar_justifyfull')+'</span></div>';
	return menuitems;
}

function webeditor_menu_heading(inputname, inputnode) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu_heading"><span unselectable="on">'+Text('toolbar_menu_heading')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="outdent"><img unselectable="on" src="' + webeditor.buttonpath + 'outdent.gif" alt="'+Text('toolbar_outdent')+'"> <span unselectable="on">'+Text('toolbar_outdent')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="indent"><img unselectable="on" src="' + webeditor.buttonpath + 'indent.gif" alt="'+Text('toolbar_indent')+'"> <span unselectable="on">'+Text('toolbar_indent')+'</span></div>';
	menuitems += '<div onclick="return false;" unselectable="on" class="webeditor_menu" id="justify" onmouseover="webeditor_submenu(\'justify\',this);"><img unselectable="on" src="' + webeditor.buttonpath + 'justify.gif" alt="'+Text('toolbar_menu_justify')+'"> <span unselectable="on">'+Text('toolbar_menu_justify')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="nobr"><img unselectable="on" src="' + webeditor.buttonpath + 'nobr.gif" alt="'+Text('toolbar_nobr')+'"> <span unselectable="on">'+Text('toolbar_nobr')+'</span></div>';
	return menuitems;
}

function webeditor_menu_paragraph(inputname, inputnode) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu_heading"><span unselectable="on">'+Text('toolbar_menu_paragraph')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="outdent"><img unselectable="on" src="' + webeditor.buttonpath + 'outdent.gif" alt="'+Text('toolbar_outdent')+'"> <span unselectable="on">'+Text('toolbar_outdent')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="indent"><img unselectable="on" src="' + webeditor.buttonpath + 'indent.gif" alt="'+Text('toolbar_indent')+'"> <span unselectable="on">'+Text('toolbar_indent')+'</span></div>';
	menuitems += '<div onclick="return false;" unselectable="on" class="webeditor_menu" id="justify" onmouseover="webeditor_submenu(\'justify\',this);"><img unselectable="on" src="' + webeditor.buttonpath + 'justify.gif" alt="'+Text('toolbar_menu_justify')+'"> <span unselectable="on">'+Text('toolbar_menu_justify')+'</span></div>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="nobr"><img unselectable="on" src="' + webeditor.buttonpath + 'nobr.gif" alt="'+Text('toolbar_nobr')+'"> <span unselectable="on">'+Text('toolbar_nobr')+'</span></div>';
	return menuitems;
}

function webeditor_menu_clipboard(inputname, inputnode, selection) {
	var menuitems = '';
	if (selection == '') {
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="cut"><img unselectable="on" src="' + webeditor.buttonpath + 'cut.gif" alt="'+Text('toolbar_cut')+'"> <span unselectable="on">'+Text('toolbar_cut')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="copy"><img unselectable="on" src="' + webeditor.buttonpath + 'copy.gif" alt="'+Text('toolbar_copy')+'"> <span unselectable="on">'+Text('toolbar_copy')+'</span></div>';
	} else {
		menuitems += '<div unselectable="on" class="webeditor_menu" id="cut"><img unselectable="on" src="' + webeditor.buttonpath + 'cut.gif" alt="'+Text('toolbar_cut')+'"> <span unselectable="on">'+Text('toolbar_cut')+'</span></div>';
		menuitems += '<div unselectable="on" class="webeditor_menu" id="copy"><img unselectable="on" src="' + webeditor.buttonpath + 'copy.gif" alt="'+Text('toolbar_copy')+'"> <span unselectable="on">'+Text('toolbar_copy')+'</span></div>';
	}
	menuitems += '<div unselectable="on" class="webeditor_menu" id="paste"><img unselectable="on" src="' + webeditor.buttonpath + 'paste.gif" alt="'+Text('toolbar_paste')+'"> <span unselectable="on">'+Text('toolbar_paste')+'</span></div>';
//	if (selection == '') {
//		menuitems += '<div unselectable="on" class="webeditor_menu_disabled" id="delete"><img unselectable="on" src="' + webeditor.buttonpath + 'delete.gif" alt="'+Text('toolbar_delete')+'"> <span unselectable="on">'+Text('toolbar_delete')+'</span></div>';
//	} else {
//		menuitems += '<div unselectable="on" class="webeditor_menu" id="delete"><img unselectable="on" src="' + webeditor.buttonpath + 'delete.gif" alt="'+Text('toolbar_delete')+'"> <span unselectable="on">'+Text('toolbar_delete')+'</span></div>';
//	}
//	menuitems += '<div unselectable="on" class="webeditor_menu" id="selectall"><img unselectable="on" src="' + webeditor.buttonpath + 'selectall.gif" alt="'+Text('toolbar_selectall')+'"> <span unselectable="on">'+Text('toolbar_selectall')+'</span></div>';
	return menuitems;
}

function webeditor_menu_colour(inputname, inputnode) {
	var menuitems = '';
	menuitems += '<div unselectable="on" class="webeditor_menu" onclick="webeditor.' + inputnode.id + '(\'transparent\');webeditor_menu_hide();"><img unselectable="on" width="16" height="16" src="' + webeditor.rootpath + 'spacer.gif" alt=""> <span unselectable="on">'+Text('toolbar_menu_autocolours')+'</span></div>';
	if (webeditor.stylesheetcolours) {
		menuitems += '<div unselectable="on" class="webeditor_menu_heading"><span unselectable="on">'+Text('toolbar_menu_stylesheetcolours')+'</span></div>';
		var colours = '<table summary="" class="webeditor_menu_colour"><tr>';
		for (var i=0; i<webeditor.stylesheetcolours.length; i++) {
			if ((i != 0) && ((i % 8) == 0)) {
				colours += '<td>&nbsp;</td></tr><tr>';
			}
			colours += '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'' + webeditor.stylesheetcolours[i] + '\');webeditor_menu_hide();" style="background-color:' + webeditor.stylesheetcolours[i] + '" title="' + webeditor.stylesheetcolours[i] + '" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
		}
		colours += '<td>&nbsp;</td></tr></table>';
		menuitems += colours;
	}
	menuitems += '<div unselectable="on" class="webeditor_menu_heading"><span unselectable="on">'+Text('toolbar_menu_standardcolours')+'</span></div>';
	menuitems += '<table summary="" class="webeditor_menu_colour"><tr>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_000000" style="background-color:#000000" title="#000000" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_FFFFFF" style="background-color:#FFFFFF" title="#FFFFFF" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_008000" style="background-color:#008000" title="#008000" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_800000" style="background-color:#800000" title="#800000" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_808000" style="background-color:#808000" title="#808000" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_000080" style="background-color:#000080" title="#000080" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_800080" style="background-color:#800080" title="#800080" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_808080" style="background-color:#808080" title="#808080" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td>&nbsp;</td>'
			   + '</tr><tr>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_FFFF00" style="background-color:#FFFF00" title="#FFFF00" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_00FF00" style="background-color:#00FF00" title="#00FF00" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_00FFFF" style="background-color:#00FFFF" title="#00FFFF" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_FF00FF" style="background-color:#FF00FF" title="#FF00FF" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_C0C0C0" style="background-color:#C0C0C0" title="#C0C0C0" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_FF0000" style="background-color:#FF0000" title="#FF0000" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_0000FF" style="background-color:#0000FF" title="#0000FF" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td class="webeditor_menu_colour"><div unselectable="on" onclick="webeditor.' + inputnode.id + '(\'#\'+this.id.substring(4));webeditor_menu_hide();" id="col_008080" style="background-color:#008080" title="#008080" class="webeditor_menu_colour" onmouseover="this.parentNode.className=\'webeditor_menu_colour_mouseover\'" onmouseout="this.parentNode.className=\'webeditor_menu_colour\'"><img unselectable="on" class="webeditor_menu_colour" src="' + webeditor.rootpath + 'spacer.gif" alt=""></div></td>'
			   + '<td>&nbsp;</td>'
			   + '</tr></table>';
	menuitems += '<div unselectable="on" class="webeditor_menu" id="' + inputnode.id + '"><img unselectable="on" src="' + webeditor.buttonpath + 'colours.gif" alt="'+Text('toolbar_menu_morecolours')+'"> <span unselectable="on">'+Text('toolbar_menu_morecolours')+'</span></div>';
	return menuitems;
}

function getAbsoluteOffsetTop(element, skipbodyoffset) {
	var offsetTop = 0;
	if (element.offsetParent) {
		offsetTop = element.offsetTop;
		while (element = element.offsetParent) {
			// Safari contextmenu sub-menu position may be wrong if adding the top offsetParent's offset
			if (element.offsetParent || (! skipbodyoffset)) {
				offsetTop += element.offsetTop;
			}
		}
	}
	return offsetTop;
}

function getAbsoluteOffsetLeft(element, skipbodyoffset) {
	var offsetLeft = 0;
	if (element.offsetParent) {;
		offsetLeft = element.offsetLeft;
		while (element = element.offsetParent) {
			// Safari contextmenu sub-menu position may be wrong if adding the top offsetParent's offset
			if (element.offsetParent || (! skipbodyoffset)) {
				offsetLeft += element.offsetLeft;
			}
		}
	}
	return offsetLeft;
}

function getMaxZIndex(element) {
	var zIndex = 0;
	while (element && (element != document.body)) {
		if (element.style.zIndex > zIndex) zIndex = element.style.zIndex;
		element = element.offsetParent;
	}
	return zIndex;
}



///////////////////////////////////////////////////////////////////////////////////////////////////
// Callback functions called from web editor dialog windows
///////////////////////////////////////////////////////////////////////////////////////////////////

function cleanContent(all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	contenteditable_cleanContent_fix();
	var content = contenteditable_getContentSelection();
	if (content) {
		content = cleanContentSub(content, all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style);
		contenteditable_event_paste_do_pre();
		contenteditable_pasteContent(content);
		contenteditable_event_paste_do_post();
		contenteditable_event_paste_fix();
	} else {
		content = contenteditable_getContent();
		content = cleanContentSub(content, all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style);
		contenteditable_event_paste_do_pre();
		contenteditable_setContent(content);
		contenteditable_event_paste_do_post();
		contenteditable_event_paste_fix();
	}
	contenteditable_undo_save();
}

function cleanContentSub(content, all_html, all_xml, all_namespace, all_lang, all_class, all_style, empty_span, all_span, empty_font, all_font, all_del_ins, empty_p_div, all_format_tags, mso_class, mso_style, mso_conditional, empty_style) {
	RegExp.global = true;
	RegExp.multiline = true;
	if (all_html) {
		// all html tags
		content = content.replace(/(<\/?[^>]*>)[\r\n]+/gi, "$1 ");
		content = content.replace(/<\/?[^>]*>/gi, "");
	}
	if (all_xml) {
		// xml tags
		content = content.replace(/<\?xml[^>]*>/gi, "");
		content = content.replace(/<xml[^>]*>/gi, "");
		content = content.replace(/<\?[^>]*\?>/gi, "")
		if (webeditor.encodeQuestionTags) {
			content = content.replace(/&lt;\?xml[^&]*&gt;/gi, "");
			content = content.replace(/&lt;xml[^&]*&gt;/gi, "");
			content = content.replace(/&lt;\?[^&]*\?&gt;/gi, "")
		}
	}
	if (all_namespace) {
		// all namespace tags
		content = content.replace(/<\/?[a-z]+:[^>]*>/gi, "");
		if (webeditor.encodeQuestionTags) {
			content = content.replace(/&lt;\/?[a-z]+:[^&]*&gt;/gi, "");
		}
	}
	if (all_lang) {
		// all lang attributes
		content = content.replace(/(<[^>]+)[ \t\r\n]+lang=[^ \t\r\n|>]*([^>]*>)/gi, "$1 $2");
	}
	if (all_del_ins) {
		// all del and ins tags
		content = content.replace(/<del[^>]*>.*<\/del>/gi, "");
		content = content.replace(/<ins[^>]*>(.*)<\/ins>/gi, "$1");
	}
	if (all_class) {
		// all class attributes
		content = content.replace(/(<[^>]+)[ \t\r\n]+class=[^ \t\r\n|>]*([^>]*>)/gi, "$1 $2");
	}
	if (mso_class) {
		// Mso* class attributes
		content = content.replace(/(<[^>]+)[ \t\r\n]+class=Mso[^ \t\r\n>]*([^>]*>)/gi, "$1 $2");
		content = content.replace(/(<[^>]+)[ \t\r\n]+class="Mso[^ \t\r\n>"]*"([^>]*>)/gi, "$1 $2");
	}
	if (all_style) {
		// all style attributes
		content = content.replace(/(<[^>]+)[ \t\r\n]+style="[^"]*"([^>]*>)/gi, "$1$2");
	}
	if (mso_style) {
		// mso-* style attributes
		content = content.replace(/(<[^>]+[ \t\r\n]+style="[^"]*)[; \t\r\n]*mso-[^:]+:[^;"]+;([^"]*"[^>]*>)/gi, "$1$2");
		content = content.replace(/(<[^>]+[ \t\r\n]+style="[^"]*)[; \t\r\n]*mso-[^:]+:[^;"]+("[^>]*>)/gi, "$1$2");
		content = content.replace(/(<[^>]+[ \t\r\n]+style=")mso-[^:]+:[^;"]+;([^"]*"[^>]*>)/gi, "$1$2");
		content = content.replace(/(<[^>]+[ \t\r\n]+style=")mso-[^:]+:[^;"]+("[^>]*>)/gi, "$1$2");
		// mso-* style attributes in single-quotes inside mso conditionals
		content = content.replace(/(<[^>]+[ \t\r\n]+style='[^']*)[; \t\r\n]*mso-[^:]+:[^;']+;([^']*'[^>]*>)/gi, "$1$2");
		content = content.replace(/(<[^>]+[ \t\r\n]+style='[^']*)[; \t\r\n]*mso-[^:]+:[^;']+('[^>]*>)/gi, "$1$2");
		content = content.replace(/(<[^>]+[ \t\r\n]+style=')mso-[^:]+:[^;']+;([^']*'[^>]*>)/gi, "$1$2");
		content = content.replace(/(<[^>]+[ \t\r\n]+style=')mso-[^:]+:[^;']+('[^>]*>)/gi, "$1$2");
	}
	if (empty_style) {
		content = content.replace(/(<[^>]+)[ \t\r\n]+style=""([^>]*>)/gi, "$1$2");
	}
	if (mso_conditional) {
		// [if *] ... [endif]
		while (true) {
			var ifend = content.indexOf("<![endif]-->");
			var ifstart = content.substring(0,ifend).lastIndexOf("<!--[if");
			if ((ifend < 0) || (ifstart < 0)) break;
			content = content.substring(0,ifstart) + content.substring(ifend+12);
		}
		while (true) {
			var ifend = content.indexOf("[endif]");
			var ifstart = content.substring(0,ifend).lastIndexOf("[if");
			if ((ifend < 0) || (ifstart < 0)) break;
			content = content.substring(0,ifstart) + content.substring(ifend+7);
		}
	}
	if (empty_span) {
		// double and empty span tags and span tags without attributes
		content = content.replace(/<span *><span *>([^<]*)<\/span><\/span>/gi, "<span>$1</span>");
		content = content.replace(/<span><\/span>/gi, "");
		content = content.replace(/<span\s[^>]*><\/span>/gi, "");
		content = content.replace(/<span *>([^<]*)<\/span>/gi, "$1");
	}
	if (all_span) {
		// all span tags
		content = content.replace(/<\/?span[^>]*>/gi, "");
	}
	if (empty_font) {
		// double and empty font tags and font tags without attributes
		content = content.replace(/<font><font>([^<]*)<\/font><\/font>/gi, "<font>$1</font>");
		content = content.replace(/<font[^>]*><\/font>/gi, "");
		content = content.replace(/<font>([^<]*)<\/font>/gi, "$1");
	}
	if (all_font) {
		// all font tags
		content = content.replace(/<\/?font[^>]*>/gi, "");
	}
	if (empty_p_div) {
		// empty p and div tags
		content = content.replace(/<p>( |&nbsp;)*<\/p>[\r\n]*/gi, "")
		content = content.replace(/<p><\/p>[\r\n]*/gi, "")
		content = content.replace(/<p\/>[\r\n]*/gi, "");
		content = content.replace(/<div>( |&nbsp;)*<\/div>[\r\n]*/gi, "")
		content = content.replace(/<div><\/div>[\r\n]*/gi, "")
		content = content.replace(/<div\/>[\r\n]*/gi, "");

		content = content.replace(/<p\s[^>]*>( |&nbsp;)*<\/p>[\r\n]*/gi, "")
		content = content.replace(/<p\s[^>]*><\/p>[\r\n]*/gi, "")
		content = content.replace(/<p\s[^>]*\/>[\r\n]*/gi, "");
		content = content.replace(/<div\s[^>]*>( |&nbsp;)*<\/div>[\r\n]*/gi, "")
		content = content.replace(/<div\s[^>]*><\/div>[\r\n]*/gi, "")
		content = content.replace(/<div\s[^>]*\/>[\r\n]*/gi, "");
	}
	if (all_format_tags) {
		// all text formatting tags
		content = content.replace(/<(\/?)address[^>]*>/gi, "<$1p>");
		content = content.replace(/<\/?b>/gi, "");
		content = content.replace(/<\/?big>/gi, "");
		content = content.replace(/<\/?blink[^>]*>/gi, "");
		content = content.replace(/<(\/?)blockquote>/gi, "<$1p>");
		content = content.replace(/<(\/?)center>/gi, "<$1p>");
		content = content.replace(/<\/?cite>/gi, "");
		content = content.replace(/<\/?code>/gi, "");
		content = content.replace(/<\/?em>/gi, "");
		content = content.replace(/<(\/?)h1>/gi, "<$1p>");
		content = content.replace(/<(\/?)h2>/gi, "<$1p>");
		content = content.replace(/<(\/?)h3>/gi, "<$1p>");
		content = content.replace(/<(\/?)h4>/gi, "<$1p>");
		content = content.replace(/<(\/?)h5>/gi, "<$1p>");
		content = content.replace(/<(\/?)h6>/gi, "<$1p>");
		content = content.replace(/<\/?i>/gi, "");
		content = content.replace(/<\/?kbd>/gi, "");
		content = content.replace(/<(\/?)pre>/gi, "<$1p>");
		content = content.replace(/<\/?q>/gi, "");
		content = content.replace(/<\/?s>/gi, "");
		content = content.replace(/<\/?samp>/gi, "");
		content = content.replace(/<\/?small>/gi, "");
		content = content.replace(/<\/?strike>/gi, "");
		content = content.replace(/<\/?strong>/gi, "");
		content = content.replace(/<\/?sub>/gi, "");
		content = content.replace(/<\/?sup>/gi, "");
		content = content.replace(/<\/?u>/gi, "");
		content = content.replace(/<\/?var>/gi, "");
	}
	// Crossed P and SPAN tags
	content = content.replace(/<p([ \t\r\n]+[^<]*)?><span([ \t\r\n]+[^<]*)?>([^<]*)<\/p><\/span>/gi, "<p $1><span $2>$3</span></p>");
	content = content.replace(/<span([ \t\r\n]+[^<]*)?><p([ \t\r\n]+[^<]*)?>([^<]*)<\/span><\/p>/gi, "<p $1><span $2>$3</span></p>");
	// remove blanks tag simple tags
	content = content.replace(/<([a-zA-Z][a-zA-Z0-9]*)[ \t\r\n]+>/g, "<$1>");
	return content;
}

function insertMailto(email, subject, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var href = "mailto:" + email;
	if (subject) {
		if (typeof(encodeURI) == "function") {
			href += "?subject=" + encodeURI(subject);
		} else {
			href += "?subject=" + subject;
		}
	}
	var anchor = contenteditable_selection_container('a');
	if (anchor) {
		text = anchor.innerHTML;
		if (contenteditable_getAttribute(anchor, "href") != href) {
			if (href == "") {
				contenteditable_removeAttribute(anchor, "href");
			} else {
				contenteditable_setAttribute(anchor, "href", href);
			}
		}
		if (contenteditable_getAttribute(anchor, "class") != htmlclass) {
			if (htmlclass == "") {
				contenteditable_removeAttribute(anchor, "class");
			} else {
				contenteditable_setAttribute(anchor, "class", htmlclass);
			}
		}
		if (contenteditable_getAttribute(anchor, "id") != htmlid) {
			if (htmlid == "") {
				contenteditable_removeAttribute(anchor, "id");
			} else {
				contenteditable_setAttribute(anchor, "id", htmlid);
			}
		}
		anchor.innerHTML = text;
	} else {
		var text = contenteditable_selection_text() || subject || email || '&nbsp;';
		var attributes = '';
		if (href) attributes += ' href="' + href + '"';
		if (htmlid) attributes += ' id="' + htmlid + '"';
		if (htmlclass) attributes += ' class="' + htmlclass + '"';
		anchor = contenteditable_pasteContent('<a' + attributes + '>' + text + '</a>');
		if (anchor) contenteditable_selection_node(anchor);
		if (anchor = contenteditable_selection_container("a")) {
			insertMailto(email, subject, htmlclass, htmlid);
		}
	}
	contenteditable_undo_save();
	contenteditable_mailto_fix();
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
}

function insertAnchor(name, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var anchor = contenteditable_selection_container('a');
	if (anchor) {
		if (contenteditable_getAttribute(anchor, "name") != name) {
			if (name == "") {
				contenteditable_removeAttribute(anchor, "name");
			} else {
				contenteditable_setAttribute(anchor, "name", name);
			}
		}
		if (contenteditable_getAttribute(anchor, "class") != htmlclass) {
			if (htmlclass == "") {
				contenteditable_removeAttribute(anchor, "class");
			} else {
				contenteditable_setAttribute(anchor, "class", htmlclass);
			}
		}
		if (contenteditable_getAttribute(anchor, "id") != htmlid) {
			if (htmlid == "") {
				contenteditable_removeAttribute(anchor, "id");
			} else {
				contenteditable_setAttribute(anchor, "id", htmlid);
			}
		}
	} else {
		var text = contenteditable_selection_text() || '&nbsp;';
		var attributes = '';
		if (name) attributes += ' name="' + name + '"';
		if (htmlid) attributes += ' id="' + htmlid + '"';
		if (htmlclass) attributes += ' class="' + htmlclass + '"';
		anchor = contenteditable_pasteContent('<a' + attributes + '>' + text + '</a>');
		if (anchor) contenteditable_selection_node(anchor);
		if (anchor = contenteditable_selection_container("a")) {
			insertAnchor(name, htmlclass, htmlid);
		}
	}
	contenteditable_undo_save();
	contenteditable_anchor_fix();
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
}

function insertBox(width, height, borderwidth, borderstyle, bordercolor, backgroundcolor, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var box = contenteditable_selection_container('div');
	if (box && box.style && (box.style.position == "absolute")) {
		width = width.replace(/^([0-9]+)$/gi, "$1px");
		height = height.replace(/^([0-9]+)$/gi, "$1px");
		borderwidth = borderwidth.replace(/^([0-9]+)$/gi, "$1px");
		try { if (width) box.style.width = width; } catch (e) { }
		try { if (height) box.style.height = height; } catch (e) { }
		try { if (borderwidth) box.style.borderWidth = borderwidth; } catch (e) { }
		try { if (borderstyle) box.style.borderStyle = borderstyle; } catch (e) { }
		try { if (bordercolor) box.style.borderColor = bordercolor; } catch (e) { }
		try { if (backgroundcolor) box.style.backgroundColor = backgroundcolor; } catch (e) { }
		if (contenteditable_getAttribute(box, "class") != htmlclass) {
			if (htmlclass == "") {
				contenteditable_removeAttribute(box, "class");
			} else {
				contenteditable_setAttribute(box, "class", htmlclass);
			}
		}
		if (contenteditable_getAttribute(box, "id") != htmlid) {
			if (htmlid == "") {
				contenteditable_removeAttribute(box, "id");
			} else {
				contenteditable_setAttribute(box, "id", htmlid);
			}
		}
	} else {
// Safari must have at least one character both before and after caret/cursor to be able to type text into box
//		var text = contenteditable_selection_text() || '&nbsp;';
		var text = contenteditable_selection_text() || '&nbsp;&nbsp;';
		var attributes = '';
		attributes += ' style="position:absolute;';
		width = width.replace(/^([0-9]+)$/gi, "$1px");
		height = height.replace(/^([0-9]+)$/gi, "$1px");
		borderwidth = borderwidth.replace(/^([0-9]+)$/gi, "$1px");
		if (width) attributes += ' width: ' + width + ';';
		if (height) attributes += ' height: ' + height + ';';
		if (borderwidth) attributes += ' border-width: ' + borderwidth + ';';
		if (borderstyle) attributes += ' border-style: ' + borderstyle + ';';
		if (bordercolor) attributes += ' border-color: ' + bordercolor + ';';
		if (backgroundcolor) attributes += ' background-color: ' + backgroundcolor + ';';
		attributes += '"';
		if (htmlid) attributes += ' id="' + htmlid + '"';
		if (htmlclass) attributes += ' class="' + htmlclass + '"';
		box = contenteditable_pasteContent('<div' + attributes + '>' + text + '</div>');
		if (box) contenteditable_selection_node(box);
		if (box = contenteditable_selection_container("div")) {
			insertBox(width, height, borderwidth, borderstyle, bordercolor, backgroundcolor, htmlclass, htmlid);
		}
		contenteditable_position(true);
	}
	contenteditable_undo_save();
	contenteditable_box_fix();
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
}

function insertIframe(width, height, src, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var iframe = contenteditable_selection_container('iframe');
	if (iframe) {
		if (contenteditable_getAttribute(iframe, "width") != width) {
			if (width == "") {
				contenteditable_removeAttribute(iframe, "width");
			} else {
				contenteditable_setAttribute(iframe, "width", width);
			}
		}
		if (contenteditable_getAttribute(iframe, "height") != height) {
			if (height == "") {
				contenteditable_removeAttribute(iframe, "height");
			} else {
				contenteditable_setAttribute(iframe, "height", height);
			}
		}
		if (contenteditable_getAttribute(iframe, "src") != src) {
			if (src == "") {
				contenteditable_removeAttribute(iframe, "src");
			} else {
				contenteditable_setAttribute(iframe, "src", src);
			}
		}
		if (contenteditable_getAttribute(iframe, "class") != htmlclass) {
			if (htmlclass == "") {
				contenteditable_removeAttribute(iframe, "class");
			} else {
				contenteditable_setAttribute(iframe, "class", htmlclass);
			}
		}
		if (contenteditable_getAttribute(iframe, "id") != htmlid) {
			if (htmlid == "") {
				contenteditable_removeAttribute(iframe, "id");
			} else {
				contenteditable_setAttribute(iframe, "id", htmlid);
			}
		}
	} else {
		var attributes = '';
		if (width) attributes += ' width="' + width + '"';
		if (height) attributes += ' height="' + height + '"';
		if (src) attributes += ' src="' + src + '"';
		if (htmlid) attributes += ' id="' + htmlid + '"';
		if (htmlclass) attributes += ' class="' + htmlclass + '"';
		iframe = contenteditable_pasteContent('<iframe' + attributes + '>&nbsp;</iframe>');
		if (iframe) contenteditable_selection_node(iframe);
		if (iframe = contenteditable_selection_container("iframe")) {
			insertIframe(width, height, src, htmlclass, htmlid);
		}
	}
	contenteditable_undo_save();
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
}

function insertForm(action, method, enctype, target, onsubmit, onreset, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var form = contenteditable_selection_container('form');
	if (form) {
		if (contenteditable_getAttribute(form, "action") != action) {
			if (action == "") {
				contenteditable_removeAttribute(form, "action");
			} else {
				contenteditable_setAttribute(form, "action", action);
			}
		}
		if (contenteditable_getAttribute(form, "method") != method) {
			if (method == "") {
				contenteditable_removeAttribute(form, "method");
			} else {
				contenteditable_setAttribute(form, "method", method);
			}
		}
		if (contenteditable_getAttribute(form, "enctype") != enctype) {
			if (enctype == "") {
				contenteditable_removeAttribute(form, "enctype");
			} else {
				contenteditable_setAttribute(form, "enctype", enctype);
			}
		}
		if (contenteditable_getAttribute(form, "target") != target) {
			if (target == "") {
				contenteditable_removeAttribute(form, "target");
			} else {
				contenteditable_setAttribute(form, "target", target);
			}
		}
		if (contenteditable_getAttribute(form, "onsubmit") != onsubmit) {
			if (onsubmit == "") {
				contenteditable_removeAttribute(form, "onsubmit");
			} else {
				contenteditable_setAttribute(form, "onsubmit", onsubmit);
			}
		}
		if (contenteditable_getAttribute(form, "onreset") != onreset) {
			if (onreset == "") {
				contenteditable_removeAttribute(form, "onreset");
			} else {
				contenteditable_setAttribute(form, "onreset", onreset);
			}
		}
		if (contenteditable_getAttribute(form, "class") != htmlclass) {
			if (htmlclass == "") {
				contenteditable_removeAttribute(form, "class");
			} else {
				contenteditable_setAttribute(form, "class", htmlclass);
			}
		}
		if (contenteditable_getAttribute(form, "id") != htmlid) {
			if (htmlid == "") {
				contenteditable_removeAttribute(form, "id");
			} else {
				contenteditable_setAttribute(form, "id", htmlid);
			}
		}
	} else {
		var attributes = '';
		if (action) attributes += ' action="' + action + '"';
		if (method) attributes += ' method="' + method + '"';
		if (enctype) attributes += ' enctype="' + enctype + '"';
		if (target) attributes += ' target="' + target + '"';
		if (onsubmit) attributes += ' onsubmit="' + onsubmit + '"';
		if (onreset) attributes += ' onreset="' + onreset + '"';
		if (htmlid) attributes += ' id="' + htmlid + '"';
		if (htmlclass) attributes += ' class="' + htmlclass + '"';
//		form = contenteditable_pasteContent('<form' + attributes + '>&nbsp;</form>');
		form = contenteditable_pasteContent('<form' + attributes + '><br></form>');
		if (form) contenteditable_selection_node(form);
		if (form = contenteditable_selection_container("form")) {
			insertForm(action, method, enctype, target, onsubmit, onreset, htmlclass, htmlid);
		}
	}
	contenteditable_undo_save();
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
}

function insertButton(type, name, value, src, align, onclick, onfocus, onblur, htmlclass, htmlid) {
	insertInput('input', type, name, value, '', '', '', '', '', '', '', '', '', src, align, onclick, '', onfocus, onblur, htmlclass, htmlid);
}

function insertText(type, name, value, size, maxlength, onclick, onchange, onfocus, onblur, htmlclass, htmlid) {
	insertInput('input', type, name, value, '', '', '', size, maxlength, '', '', '', '', '', '', onclick, onchange, onfocus, onblur, htmlclass, htmlid);
}

function insertHidden(type, name, value, htmlclass, htmlid) {
	insertInput('input', type, name, value, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', htmlclass, htmlid);
}

function insertTextarea(name, cols, rows, wrap, onclick, onchange, onfocus, onblur, htmlclass, htmlid) {
	insertInput('textarea', '', name, '', '', '', '', '', '', cols, rows, wrap, '', '', '', onclick, onchange, onfocus, onblur, htmlclass, htmlid);
}

function insertCheckbox(type, name, value, checked, onclick, onchange, onfocus, onblur, htmlclass, htmlid) {
	insertInput('input', type, name, value, checked, '', '', '', '', '', '', '', '', '', '', onclick, onchange, onfocus, onblur, htmlclass, htmlid);
}

function insertFile(type, name, value, accept, onclick, onchange, onfocus, onblur, htmlclass, htmlid) {
	insertInput('input', type, name, value, '', '', '', '', '', '', '', '', accept, '', '', onclick, onchange, onfocus, onblur, htmlclass, htmlid);
}

function insertSelect(name, size, multiple, options, onclick, onchange, onfocus, onblur, htmlclass, htmlid) {
	// MSIE contenteditable_selection_container() called after dialog window may not work correctly i.e. if select list is only editable content
	if (webeditor.selectlist_node) contenteditable_selection_node(webeditor.selectlist_node);
	insertInput('select', '', name, '', '', multiple, options, size, '', '', '', '', '', '', '', onclick, onchange, onfocus, onblur, htmlclass, htmlid);
}

function insertInput(tag, type, name, value, checked, multiple, options, size, maxlength, cols, rows, wrap, accept, src, align, onclick, onchange, onfocus, onblur, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var input = contenteditable_selection_container(tag);
	// MSIE contenteditable_selection_container() called after dialog window may not work correctly i.e. if select list is only editable content
	if ((! input) && (tag == "select") && (webeditor.selectlist_node)) input = webeditor.selectlist_node;
	if (input) {
		contenteditable_selection_node(input);
		if (contenteditable_getAttribute(input, "name") != name) {
			if (name == "") {
				contenteditable_removeAttribute(input, "name");
			} else {
				contenteditable_setAttribute(input, "name", name);
			}
		}
		if (contenteditable_getAttribute(input, "value") != value) {
			if (value == "") {
				contenteditable_removeAttribute(input, "value");
			} else {
				contenteditable_setAttribute(input, "value", value);
			}
		}
		if (! checked) {
			contenteditable_removeAttribute(input, "checked");
		} else {
			contenteditable_setAttribute(input, "checked", true);
		}
		if (! multiple) {
			contenteditable_removeAttribute(input, "multiple");
		} else {
			contenteditable_setAttribute(input, "multiple", true);
		}
		if (contenteditable_getAttribute(input, "size") != size) {
			if (size == "") {
				contenteditable_removeAttribute(input, "size");
			} else {
				contenteditable_setAttribute(input, "size", size);
			}
		}
		if (contenteditable_getAttribute(input, "maxLength") != maxlength) {
			if (maxlength == "") {
				contenteditable_removeAttribute(input, "maxLength");
			} else {
				contenteditable_setAttribute(input, "maxLength", maxlength);
			}
		}
		if (contenteditable_getAttribute(input, "cols") != cols) {
			if (cols == "") {
				contenteditable_removeAttribute(input, "cols");
			} else {
				contenteditable_setAttribute(input, "cols", cols);
			}
		}
		if (contenteditable_getAttribute(input, "rows") != rows) {
			if (rows == "") {
				contenteditable_removeAttribute(input, "rows");
			} else {
				contenteditable_setAttribute(input, "rows", rows);
			}
		}
		if (contenteditable_getAttribute(input, "wrap") != wrap) {
			if (wrap == "") {
				contenteditable_removeAttribute(input, "wrap");
			} else {
				contenteditable_setAttribute(input, "wrap", wrap);
			}
		}
		if (contenteditable_getAttribute(input, "accept") != accept) {
			if (accept == "") {
				contenteditable_removeAttribute(input, "accept");
			} else {
				contenteditable_setAttribute(input, "accept", accept);
			}
		}
		if (contenteditable_getAttribute(input, "src") != src) {
			if (src == "") {
				contenteditable_removeAttribute(input, "src");
			} else {
				contenteditable_setAttribute(input, "src", src);
			}
		}
		if (contenteditable_getAttribute(input, "align") != align) {
			if (align == "") {
				contenteditable_removeAttribute(input, "align");
			} else {
				contenteditable_setAttribute(input, "align", align);
			}
		}
		if (contenteditable_getAttribute(input, "onclick") != onclick) {
			if (onclick == "") {
				contenteditable_removeAttribute(input, "onclick");
			} else {
				contenteditable_setAttribute(input, "onclick", onclick);
			}
		}
		if (contenteditable_getAttribute(input, "onchange") != onchange) {
			if (onchange == "") {
				contenteditable_removeAttribute(input, "onchange");
			} else {
				contenteditable_setAttribute(input, "onchange", onchange);
			}
		}
		if (contenteditable_getAttribute(input, "onfocus") != onfocus) {
			if (onfocus == "") {
				contenteditable_removeAttribute(input, "onfocus");
			} else {
				contenteditable_setAttribute(input, "onfocus", onfocus);
			}
		}
		if (contenteditable_getAttribute(input, "onblur") != onblur) {
			if (onblur == "") {
				contenteditable_removeAttribute(input, "onblur");
			} else {
				contenteditable_setAttribute(input, "onblur", onblur);
			}
		}
		if (contenteditable_getAttribute(input, "class") != htmlclass) {
			if (htmlclass == "") {
				contenteditable_removeAttribute(input, "class");
			} else {
				contenteditable_setAttribute(input, "class", htmlclass);
			}
		}
		if (contenteditable_getAttribute(input, "id") != htmlid) {
			if (htmlid == "") {
				contenteditable_removeAttribute(input, "id");
			} else {
				contenteditable_setAttribute(input, "id", htmlid);
			}
		}
		// setting options must be done last due to MSIE workaround
		if (options) {
			input.selectedIndex = 0;
			for (var i=0; i<options.length; i++) {
//				var option = new Option();
				var option = contenteditable_focused_document().createElement("option");
				option.text = options[i].text;
				option.value = options[i].value;
				option.selected = options[i].defaultselected;
				option.defaultSelected = options[i].defaultselected;
				input.options[i] = option;
			}
			input.length = options.length;
		}
		// setting type must be done last due to MSIE workaround
		if (contenteditable_getAttribute(input, "type") != type) {
			if (type == "") {
				contenteditable_removeAttribute(input, "type");
			} else {
				contenteditable_setAttribute(input, "type", type);
			}
		}
	} else {
		var attributes = '';
		var select_options = '';
		if (options) {
			for (var i=0; i<options.length; i++) {
				select_options += '<option value="';
				select_options += options[i].value;
				select_options += '"';
				select_options += options[i].defaultselected ? ' selected' : '';
				select_options += '>';
				select_options += options[i].text;
			}
		}
		if (type) attributes += ' type="' + type + '"';
		if (name) attributes += ' name="' + name + '"';
		if (value) attributes += ' value="' + value + '"';
		if (checked) attributes += ' checked';
		if (multiple) attributes += ' multiple';
		if (size) attributes += ' size="' + size + '"';
		if (maxlength) attributes += ' maxLength="' + maxlength + '"';
		if (cols) attributes += ' cols="' + cols + '"';
		if (rows) attributes += ' rows="' + rows + '"';
		if (wrap) attributes += ' wrap="' + wrap + '"';
		if (src) attributes += ' src="' + src + '"';
		if (onclick) attributes += ' onclick="' + onclick + '"';
		if (onchange) attributes += ' onchange="' + onchange + '"';
		if (onfocus) attributes += ' onfocus="' + onfocus + '"';
		if (onblur) attributes += ' onblur="' + onblur + '"';
		if (htmlid) attributes += ' id="' + htmlid + '"';
		if (htmlclass) attributes += ' class="' + htmlclass + '"';
		if (tag == "textarea") {
			input = contenteditable_pasteContent('<textarea' + attributes + '></textarea>');
			if (input) contenteditable_selection_node(input);
			if (input = contenteditable_selection_container(tag)) {
				insertInput(tag, type, name, value, checked, multiple, options, size, maxlength, cols, rows, wrap, accept, src, align, onclick, onchange, onfocus, onblur, htmlclass, htmlid);
			}
		} else if (tag == "select") {
			input = contenteditable_pasteContent('<select' + attributes + '>' + select_options + '</select>');
			if (input) contenteditable_selection_node(input);
			if (input = contenteditable_selection_container(tag)) {
				insertInput(tag, type, name, value, checked, multiple, options, size, maxlength, cols, rows, wrap, accept, src, align, onclick, onchange, onfocus, onblur, htmlclass, htmlid);
			}
		} else {
			input = contenteditable_pasteContent('<input' + attributes + '>');
			if (input) contenteditable_selection_node(input);
			if (input = contenteditable_selection_container(tag)) {
				insertInput(tag, type, name, value, checked, multiple, options, size, maxlength, cols, rows, wrap, accept, src, align, onclick, onchange, onfocus, onblur, htmlclass, htmlid);
			}
		}
	}
	contenteditable_undo_save();
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
}

function insertMap(image, imagemap, name, areas, htmlclass, htmlid) {
	var map_areas = '';
	if (areas) {
		for (var i=0; i<areas.length; i++) {
			var parts = areas[i].text.split("=");
			var shape = parts[0];
			var coords = parts[1];
			var href = areas[i].value;
			map_areas += '<area shape="';
			map_areas += shape;
			map_areas += '" coords="';
			map_areas += coords;
			map_areas += '" href="';
			map_areas += href;
			map_areas += '">';
		}
	}
	if (image) {
		contenteditable_setAttribute(image, "useMap", "#"+name);
		if (! imagemap) {
			imagemap = contenteditable_focused_document().createElement("map");
			contenteditable_setAttribute(imagemap, "name", name);
			image.parentNode.insertBefore(imagemap, image);
		}
		if (imagemap) {
			if (contenteditable_getAttribute(imagemap, "class") != htmlclass) {
				if (htmlclass == "") {
					contenteditable_removeAttribute(imagemap, "class");
				} else {
					contenteditable_setAttribute(imagemap, "class", htmlclass);
				}
			}
			if (contenteditable_getAttribute(imagemap, "id") != htmlid) {
				if (htmlid == "") {
					contenteditable_removeAttribute(imagemap, "id");
				} else {
					contenteditable_setAttribute(imagemap, "id", htmlid);
				}
			}
			contenteditable_setAttribute(imagemap, "name", name);
			imagemap.innerHTML = map_areas;
			contenteditable_insertmap_fix(imagemap);
			contenteditable_event_paste_fix(imagemap);
		}
	}
}

function insertTable(rows, cols, border, width, height, cellpadding, cellspacing, background, bgcolor, bordercolor, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	if (! border) { border = '1'; }
	contenteditable_createtable(rows, cols, border, width, height, cellpadding, cellspacing, background, bgcolor, bordercolor, htmlclass, htmlid);
	contenteditable_undo_save();
}

function insertHyperlink(href, target, text, htmlclass, htmlid, onclick, title) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	contenteditable_createlink(href, target, text, htmlclass, htmlid, onclick, title);
	contenteditable_undo_save();
}

function insertImage(src, border, alt, width, height, vspace, hspace, align, htmlclass, htmlid, onmouseover, onmouseout, usemap) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	contenteditable_insertimage(src, border, alt, width, height, vspace, hspace, align, htmlclass, htmlid, onmouseover, onmouseout, usemap);
	contenteditable_undo_save();
}

function insertFlash(src, alt, width, height, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	contenteditable_insertflash(src, alt, width, height, htmlclass, htmlid);
	contenteditable_undo_save();
}

function insertApplet(src, alt, width, height, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	contenteditable_insertapplet(src, alt, width, height, htmlclass, htmlid);
	contenteditable_undo_save();
}

function insertQuicktime(src, alt, width, height, htmlclass, htmlid) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	contenteditable_insertquicktime(src, alt, width, height, htmlclass, htmlid);
	contenteditable_undo_save();
}

function insertSpecialCharacter(value) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	contenteditable_specialcharacter(value);
	contenteditable_undo_save();
}

function backColor(value) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	if (value) contenteditable_execcommand("backcolor",rgb2hexColor(value));
	contenteditable_undo_save();
}

function foreColor(value) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	if (value) contenteditable_execcommand("forecolor",rgb2hexColor(value));
	contenteditable_undo_save();
}

function rgb2hexColor(value) {
	if (value.match(new RegExp("^rgb\\( *(.*) *, *(.*) *, *(.*) *\\)$"))) {
		var hexChars = "0123456789ABCDEF";
		value = "#"+hexChars.charAt(Math.floor(RegExp.$1/16))+hexChars.charAt(RegExp.$1%16)+hexChars.charAt(Math.floor(RegExp.$2/16))+hexChars.charAt(RegExp.$2%16)+hexChars.charAt(Math.floor(RegExp.$3/16))+hexChars.charAt(RegExp.$3%16);
	}
	return value;
}

function updateTable(form) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var table;
	if (table = contenteditable_isTable()) {
		if ((contenteditable_getAttribute(table, "width") != form.width.value) || ((contenteditable_getAttribute(table, "width") != table.style.width) && (table.style.width != ""))) {
			if (form.width.value == "") {
				contenteditable_removeAttribute(table, "width");
				// Set style property to default in case it cannot be removed
				table.style.width = "auto";
				// Try to remove style property in different ways
				table.style.width = "";
				try { delete table.style.width; } catch(e) { }
				if (table.style.removeProperty) table.style.removeProperty("width");
				if (contenteditable_getAttribute(table, "style") == "") {
					contenteditable_removeAttribute(table, "style");
				}
			} else {
				contenteditable_setAttribute(table, "width", form.width.value);
				if (table.style.width) {
					if (form.width.value.match(new RegExp("^[0-9]+$"))) {
						table.style.width = form.width.value + "px";
					} else {
						table.style.width = form.width.value;
					}
				}
			}
		}
		if ((contenteditable_getAttribute(table, "height") != form.height.value) || ((contenteditable_getAttribute(table, "height") != table.style.height) && (table.style.height != ""))) {
			if (form.height.value == "") {
				contenteditable_removeAttribute(table, "height");
				// Set style property to default in case it cannot be removed
				table.style.height = "auto";
				// Try to remove style property in different ways
				table.style.height = "";
				try { delete table.style.height; } catch(e) { }
				if (table.style.removeProperty) table.style.removeProperty("height");
				if (contenteditable_getAttribute(table, "style") == "") {
					contenteditable_removeAttribute(table, "style");
				}
			} else {
				contenteditable_setAttribute(table, "height", form.height.value);
				if (table.style.height) {
					if (form.height.value.match(new RegExp("^[0-9]+$"))) {
						table.style.height = form.height.value + "px";
					} else {
						table.style.height = form.height.value;
					}
				}
			}
		}
		if (contenteditable_getAttribute(table, "cellPadding") != form.cellpadding.value) {
			if (form.cellpadding.value == "") {
				contenteditable_removeAttribute(table, "cellPadding");
			} else {
				contenteditable_setAttribute(table, "cellPadding", form.cellpadding.value);
			}
		}
		if (contenteditable_getAttribute(table, "cellSpacing") != form.cellspacing.value) {
			if (form.cellspacing.value == "") {
				contenteditable_removeAttribute(table, "cellSpacing");
			} else {
				contenteditable_setAttribute(table, "cellSpacing", form.cellspacing.value);
			}
		}
		if (contenteditable_getAttribute(table, "border") != form.border.value) {
			if (form.border.value == "") {
				contenteditable_removeAttribute(table, "border");
			} else {
				contenteditable_setAttribute(table, "border", form.border.value);
			}
		}
		if (contenteditable_getAttribute(table, "bgColor") != form.bgcolor.value) {
			if (form.bgcolor.value == "") {
				contenteditable_removeAttribute(table, "bgColor");
			} else {
				contenteditable_setAttribute(table, "bgColor", form.bgcolor.value);
			}
		}
		if (contenteditable_getAttribute(table, "borderColor") != form.bordercolor.value) {
			if (form.bordercolor.value == "") {
				contenteditable_removeAttribute(table, "borderColor");
			} else {
				contenteditable_setAttribute(table, "borderColor", form.bordercolor.value);
			}
		}
		if (contenteditable_getAttribute(table, "background") != form.background.value) {
			if (form.background.value == "") {
				contenteditable_removeAttribute(table, "background");
			} else {
				contenteditable_setAttribute(table, "background", form.background.value);
			}
		}
		if (contenteditable_getAttribute(table, "class") != form.htmlclass.value) {
			if (form.htmlclass.value == "") {
				contenteditable_removeAttribute(table, "class");
			} else {
				contenteditable_setAttribute(table, "class", form.htmlclass.value);
			}
		}
		if (contenteditable_getAttribute(table, "id") != form.htmlid.value) {
			if (form.htmlid.value == "") {
				contenteditable_removeAttribute(table, "id");
			} else {
				contenteditable_setAttribute(table, "id", form.htmlid.value);
			}
		}
	}
	contenteditable_undo_save();
}

function updateRow(form) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var row;
	if (row = contenteditable_isRow()) {
		if (contenteditable_getAttribute(row, "align") != form.align.value) {
			if (form.align.value == "") {
				contenteditable_removeAttribute(row, "align");
			} else {
				contenteditable_setAttribute(row, "align", form.align.value);
			}
		}
		if (contenteditable_getAttribute(row, "vAlign") != form.valign.value) {
			if (form.valign.value == "") {
				contenteditable_removeAttribute(row, "vAlign");
			} else {
				contenteditable_setAttribute(row, "vAlign", form.valign.value);
			}
		}
		if (contenteditable_getAttribute(row, "bgColor") != form.bgcolor.value) {
			if (form.bgcolor.value == "") {
				contenteditable_removeAttribute(row, "bgColor");
			} else {
				contenteditable_setAttribute(row, "bgColor", form.bgcolor.value);
			}
		}
		if (contenteditable_getAttribute(row, "borderColor") != form.bordercolor.value) {
			if (form.bordercolor.value == "") {
				contenteditable_removeAttribute(row, "borderColor");
			} else {
				contenteditable_setAttribute(row, "borderColor", form.bordercolor.value);
			}
		}
		if (contenteditable_getAttribute(row, "background") != form.background.value) {
			if (form.background.value == "") {
				contenteditable_removeAttribute(row, "background");
			} else {
				contenteditable_setAttribute(row, "background", form.background.value);
			}
		}
		if (contenteditable_getAttribute(row, "class") != form.htmlclass.value) {
			if (form.htmlclass.value == "") {
				contenteditable_removeAttribute(row, "class");
			} else {
				contenteditable_setAttribute(row, "class", form.htmlclass.value);
			}
		}
		if (contenteditable_getAttribute(row, "id") != form.htmlid.value) {
			if (form.htmlid.value == "") {
				contenteditable_removeAttribute(row, "id");
			} else {
				contenteditable_setAttribute(row, "id", form.htmlid.value);
			}
		}
	}
	contenteditable_undo_save();
}

function updateColumn(form) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var table;
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow()) && (table = contenteditable_isTable())) {
		var cellcolumns = contenteditable_adjustedCellColumns(table);
		var column = cellcolumns[contenteditable_rowIndex(row)][contenteditable_cellIndex(cell)];
		var skiprows = 0;
		for (var i=0; i<table.rows.length; i++) {
			if (! skiprows) {
				var rowcolumn = 0;
				for (var j=0; ((j<table.rows[i].cells.length) && (rowcolumn<=column)); j++) {
					rowcolumn = cellcolumns[i][j];
					if ((rowcolumn == column) || (rowcolumn + contenteditable_cellColSpan(table.rows[i].cells[j]) > column)) {
						var thiscell = table.rows[i].cells[j];
						if (contenteditable_getAttribute(thiscell, "width") != form.width.value) {
							if (form.width.value == "") {
								contenteditable_removeAttribute(thiscell, "width");
							} else {
								contenteditable_setAttribute(thiscell, "width", form.width.value);
							}
						}
						if (contenteditable_getAttribute(thiscell, "height") != form.height.value) {
							if (form.height.value == "") {
								contenteditable_removeAttribute(thiscell, "height");
							} else {
								contenteditable_setAttribute(thiscell, "height", form.height.value);
							}
						}
						if (contenteditable_getAttribute(thiscell, "align") != form.align.value) {
							if (form.align.value == "") {
								contenteditable_removeAttribute(thiscell, "align");
							} else {
								contenteditable_setAttribute(thiscell, "align", form.align.value);
							}
						}
						if (contenteditable_getAttribute(thiscell, "vAlign") != form.valign.value) {
							if (form.valign.value == "") {
								contenteditable_removeAttribute(thiscell, "vAlign");
							} else {
								contenteditable_setAttribute(thiscell, "vAlign", form.valign.value);
							}
						}
						if (contenteditable_getAttribute(thiscell, "bgColor") != form.bgcolor.value) {
							if (form.bgcolor.value == "") {
								contenteditable_removeAttribute(thiscell, "bgColor");
							} else {
								contenteditable_setAttribute(thiscell, "bgColor", form.bgcolor.value);
							}
						}
						if (contenteditable_getAttribute(thiscell, "borderColor") != form.bordercolor.value) {
							if (form.bordercolor.value == "") {
								contenteditable_removeAttribute(thiscell, "borderColor");
							} else {
								contenteditable_setAttribute(thiscell, "borderColor", form.bordercolor.value);
							}
						}
						if (contenteditable_getAttribute(thiscell, "background") != form.background.value) {
							if (form.background.value == "") {
								contenteditable_removeAttribute(thiscell, "background");
							} else {
								contenteditable_setAttribute(thiscell, "background", form.background.value);
							}
						}
						if (contenteditable_getAttribute(thiscell, "class") != form.htmlclass.value) {
							if (form.htmlclass.value == "") {
								contenteditable_removeAttribute(thiscell, "class");
							} else {
								contenteditable_setAttribute(thiscell, "class", form.htmlclass.value);
							}
						}
						skiprows = contenteditable_cellRowSpan(table.rows[i].cells[j]) - 1;
					} else if ((rowcolumn + contenteditable_cellColSpan(table.rows[i].cells[j])) > column) {
						skiprows = contenteditable_cellRowSpan(table.rows[i].cells[j]) - 1;
					}
					rowcolumn += contenteditable_cellColSpan(table.rows[i].cells[j]);
				}
			} else {
				skiprows--;
			}
		}
	}
	contenteditable_undo_save();
}

function updateCell(form) {
	if (contenteditable_focused_contentwindow()) contenteditable_focused_contentwindow().focus();
	contenteditable_undo_save();
	var cell;
	if (cell = contenteditable_isCell()) {
		if (contenteditable_getAttribute(cell, "width") != form.width.value) {
			if (form.width.value == "") {
				contenteditable_removeAttribute(cell, "width");
			} else {
				contenteditable_setAttribute(cell, "width", form.width.value);
			}
		}
		if (contenteditable_getAttribute(cell, "height") != form.height.value) {
			if (form.height.value == "") {
				contenteditable_removeAttribute(cell, "height");
			} else {
				contenteditable_setAttribute(cell, "height", form.height.value);
			}
		}
		if (contenteditable_getAttribute(cell, "colSpan") != form.colspan.value) {
			if (form.colspan.value == "") {
				contenteditable_removeAttribute(cell, "colSpan");
			} else {
				contenteditable_setAttribute(cell, "colSpan", form.colspan.value);
			}
		}
		if (contenteditable_getAttribute(cell, "rowSpan") != form.rowspan.value) {
			if (form.rowspan.value == "") {
				contenteditable_removeAttribute(cell, "rowSpan");
			} else {
				contenteditable_setAttribute(cell, "rowSpan", form.rowspan.value);
			}
		}
		if (contenteditable_getAttribute(cell, "align") != form.align.value) {
			if (form.align.value == "") {
				contenteditable_removeAttribute(cell, "align");
			} else {
				contenteditable_setAttribute(cell, "align", form.align.value);
			}
		}
		if (contenteditable_getAttribute(cell, "vAlign") != form.valign.value) {
			if (form.valign.value == "") {
				contenteditable_removeAttribute(cell, "vAlign");
			} else {
				contenteditable_setAttribute(cell, "vAlign", form.valign.value);
			}
		}
		if (contenteditable_getAttribute(cell, "bgColor") != form.bgcolor.value) {
			if (form.bgcolor.value == "") {
				contenteditable_removeAttribute(cell, "bgColor");
			} else {
				contenteditable_setAttribute(cell, "bgColor", form.bgcolor.value);
			}
		}
		if (contenteditable_getAttribute(cell, "borderColor") != form.bordercolor.value) {
			if (form.bordercolor.value == "") {
				contenteditable_removeAttribute(cell, "borderColor");
			} else {
				contenteditable_setAttribute(cell, "borderColor", form.bordercolor.value);
			}
		}
		if (contenteditable_getAttribute(cell, "background") != form.background.value) {
			if (form.background.value == "") {
				contenteditable_removeAttribute(cell, "background");
			} else {
				contenteditable_setAttribute(cell, "background", form.background.value);
			}
		}
		if (contenteditable_getAttribute(cell, "class") != form.htmlclass.value) {
			if (form.htmlclass.value == "") {
				contenteditable_removeAttribute(cell, "class");
			} else {
				contenteditable_setAttribute(cell, "class", form.htmlclass.value);
			}
		}
		if (contenteditable_getAttribute(cell, "id") != form.htmlid.value) {
			if (form.htmlid.value == "") {
				contenteditable_removeAttribute(cell, "id");
			} else {
				contenteditable_setAttribute(cell, "id", form.htmlid.value);
			}
		}
	}
	contenteditable_undo_save();
}

function importFile(content) {
	content = contenteditable_split_content(false, content);
	try {
		if (webeditor_custom_encode) content = webeditor_custom_encode(content);
	} catch(e) {
	}
	try {
		if (webeditor_custom_initialize) content = webeditor_custom_initialize(content);
	} catch(e) {
	}
	content = contenteditable_encodeScriptTags(content);
	contenteditable_setContent(content);
}



///////////////////////////////////////////////////////////////////////////////////////////////////
// Common contenteditable variables for the actual document manipulation
///////////////////////////////////////////////////////////////////////////////////////////////////

var contenteditable_contents = new Array();			// contenteditable blocks' initial content
var contenteditable_contents_head = new Array();		// contenteditable blocks' initial content head
var contenteditable_contents_body = new Array();		// contenteditable blocks' initial content body
var contenteditable_stylesheet = new Array();			// contenteditable blocks' initial stylesheet
var contenteditable_inited = new Array();			// contenteditable blocks' inited flag
var contenteditable_inited_document = new Array();		// contenteditable blocks' inited document flag
var contenteditable_inited_stylesheet = new Array();		// contenteditable blocks' inited stylesheet flag
var contenteditable_viewsource_status = new Array();		// WYSIWYG vs. SOURCE flag
var contenteditable_viewdetails_status = new Array();		// WYSIWYG vs. DETAILS flag
var contenteditable_onfocus = new Array();			// onfocus handler functions
var contenteditable_onblur = new Array();			// onblur handler functions
var contenteditable_focused = 0;				// which contenteditable block is focused (if any)
var contenteditable_event_paste_pre = "";			// content DOM before paste
var contenteditable_event_paste_post = "";			// content DOM after paste
var contenteditable_event_pasted_pre = "";			// content DOM before paste flag
var contenteditable_event_pasted_post = "";			// content DOM after paste flag
var contenteditable_event_paste_parentNode = "";		// parent node for selection range before paste
var contenteditable_event_paste_previousNode = new Array();	// node before selection range before paste
var contenteditable_event_paste_nextNode = new Array();		// node after selection range before paste



///////////////////////////////////////////////////////////////////////////////////////////////////
// Common contenteditable functions for the actual document manipulation
///////////////////////////////////////////////////////////////////////////////////////////////////

function contenteditable(id, content, stylesheet, container) {
	var html = '';
	contenteditable_contents[id] = content;
	if (stylesheet) {
		var stylesheet_toggle = document.getElementById('stylesheet_toggle');
		if (stylesheet_toggle) stylesheet_toggle.checked = true;
		contenteditable_stylesheet[id] = stylesheet;
	} else {
		var stylesheet_toggle = document.getElementById('stylesheet_toggle');
		if (stylesheet_toggle) stylesheet_toggle.checked = true;
		contenteditable_stylesheet[id] = webeditor.rootpath + 'default.css';
	}
	var style = '';
	style += 'width: ' + webeditor.width + '; height: ' + webeditor.height + ';';
	if (webeditor.minWidth) {
		style += ' min-width: ' + webeditor.minWidth + ';';
	}
	if (webeditor.maxWidth) {
		style += ' max-width: ' + webeditor.maxWidth + ';';
	}
	if (webeditor.minHeight) {
		style += ' min-height: ' + webeditor.minHeight + ';';
	}
	if (webeditor.maxHeight) {
		style += ' max-height: ' + webeditor.maxHeight + ';';
	}
	html += '<textarea id="'+id+'_textarea" name="'+id+'" cols="1" rows="1" style="display:none"></textarea>';
	html += '<iframe src="' + webeditor.rootpath + 'empty.' + webeditor.language + '?basehref=' + escape(webeditor.baseHref) + '" id="'+id+'" class="webeditor_contenteditable" width="' + webeditor.width + '" height="' + webeditor.height + '" style="' + style + '">' + '</iframe>';
//QQQ	html += '<iframe onblur="webeditor_onblur();" onmouseover="webeditor_iframe_fix(this);" src="' + webeditor.rootpath + 'empty.' + webeditor.language + '?basehref=' + escape(webeditor.baseHref) + '" id="'+id+'" class="webeditor_contenteditable" width="' + webeditor.width + '" height="' + webeditor.height + '" style="' + style + '">' + '</iframe>';

	contenteditable_inited[id] = false;
	contenteditable_inited_document[id] = false;
	contenteditable_inited_stylesheet[id] = false;
	if (container && (typeof(container)=='string') && document.getElementById(container)) {
		document.getElementById(container).innerHTML = html;
	} else if (container && (typeof(container.innerHTML)!='undefined')) {
		container.innerHTML = html;
	} else {
		document.write(html);
	}
}

function contenteditable_onSubmit() {
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
			if (contenteditable_viewsource_status[i]) {
				contenteditable_focused = i;
				contenteditable_viewsource(false);
			}
			var form = iframe;
			while (form && (form.tagName != "FORM") && (form.tagName != "HTML")) {
				form = form.parentNode;
			}
			var textarea = false;
			if (form && (form.tagName != "HTML")) {
				textarea = form[iframe.id];
			}
			if ((! textarea) || (textarea.id != iframe.id+'_textarea')) {
				textarea = document.getElementById(iframe.id+'_textarea');
			}
			if (textarea) {
				var value = iframe.contentWindow.document.body.innerHTML;
				if (webeditor.formatcontent) value = contenteditable_formatContent(iframe.contentWindow.document.body);
				if (webeditor.autoclean) value = cleanContentSub(value, webeditor.autocleanAllHTML, webeditor.autocleanAllXML, webeditor.autocleanAllNamespace, webeditor.autocleanAllLang, webeditor.autocleanAllClass, webeditor.autocleanAllStyle, webeditor.autocleanEmptySpan, webeditor.autocleanAllSpan, webeditor.autocleanEmptyFont, webeditor.autocleanAllFont, webeditor.autocleanAllDelIns, webeditor.autocleanEmptyPDiv, webeditor.autocleanAllFormatTags, webeditor.autocleanAllMsoClass, webeditor.autocleanAllMsoStyle, webeditor.autocleanAllMsoConditional, webeditor.autocleanEmptyStyle);
				value = contenteditable_decodeScriptTags(value);
				try {
					if (webeditor_custom_decode) value = webeditor_custom_decode(value);
				} catch(e) {
				}
				try {
					if (webeditor_custom_finalize) value = webeditor_custom_finalize(value);
				} catch(e) {
				}
				value = contenteditable_merge_content(iframe.id, value);
				textarea.value = value;
				// Safari may not set the textarea value
				if (textarea.value != value) {
					textarea.innerText = value;
				}
			}
		}
	}
}

function contenteditable_getContent(id) {
	var body = contenteditable_getContentBodyNode(id);
	if (body) {
		return body.innerHTML;
	}
}

function contenteditable_getContentBodyNode(id) {
	if (! id) {
		if (contenteditable_viewsource_status[contenteditable_focused]) {
			contenteditable_viewsource(false);
		}
		var iframe = document.getElementsByTagName('iframe').item(contenteditable_focused);
		if (iframe) {
			return iframe.contentWindow.document.body;
		}
	} else {
		for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
			var iframe = document.getElementsByTagName('iframe').item(i);
			if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
				if (id == iframe.id) {
					if (contenteditable_viewsource_status[i]) {
						contenteditable_focused = i;
						contenteditable_viewsource(false);
					}
					return iframe.contentWindow.document.body;
				}
			}
		}
	}
}

function contenteditable_getContentSelection(id) {
	if (! id) {
		if (contenteditable_viewsource_status[contenteditable_focused]) {
			contenteditable_viewsource(false);
		}
		var contentWindow = contenteditable_focused_contentwindow();
		var contentSelection = contenteditable_selection(contentWindow);
		var content = contenteditable_selection_text(contentSelection);
		return content;
	} else {
		for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
			var iframe = document.getElementsByTagName('iframe').item(i);
			if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
				if (id == iframe.id) {
					if (contenteditable_viewsource_status[i]) {
						contenteditable_focused = i;
						contenteditable_viewsource(false);
					}
					var contentWindow = iframe.contentWindow;
					var contentSelection = contenteditable_selection(contentWindow);
					var content = contenteditable_selection_text(contentSelection);
					return content;
				}
			}
		}
	}
}

function contenteditable_setContent(content, id) {
	if (! id) {
		if (contenteditable_viewsource_status[contenteditable_focused]) {
			contenteditable_viewsource(false);
		}
		var iframe = document.getElementsByTagName('iframe').item(contenteditable_focused);
		if (iframe) {
			contenteditable_setContent_body(content, id, iframe);
		}
	} else {
		for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
			var iframe = document.getElementsByTagName('iframe').item(i);
			if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
				if (id == iframe.id) {
					if (contenteditable_viewsource_status[i]) {
						contenteditable_focused = i;
						contenteditable_viewsource(false);
					}
					contenteditable_setContent_body(content, id, iframe);
				}
			}
		}
	}
}

function contenteditable_pasteContent(content, id) {
	var firstChild;
	if (! id) {
		var node = contenteditable_pasteContent_node();
		// MSIE may crash or create empty node if node.outerHTML is set
		// MSIE may break/remove PARAM tags inside OBJECT tag when node.innerHTML is set
		// Safari may loose content when setting node.innerHTML or node.outerHTML - no known workaround
		node.innerHTML = content;
		contenteditable_event_paste_fix(node);
		if (contenteditable_viewsource_status[contenteditable_focused]) {
			contenteditable_viewsource(false);
		}
		if (node.childNodes.length == 1) {
			node = contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), node.firstChild, content);
			firstChild = node;
		} else {
			node = contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), node, content);
			if (node) {
				firstChild = node.firstChild;
				contenteditable_remove_parentnode(node);
			}
		}
	} else {
		for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
			var iframe = document.getElementsByTagName('iframe').item(i);
			if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
				if (id == iframe.id) {
					var node = contenteditable_pasteContent_node();
					// MSIE may crash or create empty node if node.outerHTML is set
					// MSIE may break/remove PARAM tags inside OBJECT tag when node.innerHTML is set
					// Safari may loose content when setting node.innerHTML or node.outerHTML - no known workaround
					try {
						node.innerHTML = content;
					} catch(e) {
						// MSIE may fail handling HR tags inside P tags
						content = content.replace(/<hr>/g, "");
						content = content.replace(/<hr\s[^>]*>/g, "");
						node.innerHTML = content;
					}
					contenteditable_event_paste_fix(node);
					if (contenteditable_viewsource_status[i]) {
						contenteditable_focused = i;
						contenteditable_viewsource(false);
					}
					if (node.childNodes.length == 1) {
						node = contenteditable_insertNodeAtSelection(iframe.contentWindow, node.firstChild, content);
						firstChild = node;
					} else {
						node = contenteditable_insertNodeAtSelection(iframe.contentWindow, node, content);
						if (node) {
							firstChild = node.firstChild;
							contenteditable_remove_parentnode(node);
						}
					}
				}
			}
		}
	}
	return firstChild;
}

function contenteditable_focus_toolbar(inputnode) {
	var toolbar = inputnode;
	while (toolbar && (toolbar.nodeName != "TABLE") && (toolbar.nodeName != "BODY") && (toolbar.nodeName != "HTML")) {
		toolbar = toolbar.parentNode;
	}
	if (toolbar && toolbar.id && (toolbar.id.match(new RegExp('^webeditor_toolbar_')))) {
		contenteditable_focus(toolbar.id.replace(new RegExp('^webeditor_toolbar_'), ""));
	}
}

function contenteditable_focus(id) {
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
			if (id == iframe.id) {
				if (! contenteditable_onfocus[i]) contenteditable_reinit();
				contenteditable_onfocus[i]();
// Safari selection fix may need to be restored
if (webeditor.contentSelectionFocused != contenteditable_focused) {
	if (webeditor.contentSelectionBaseNode[contenteditable_focused] && webeditor.contentSelectionExtentNode[contenteditable_focused]) contenteditable_selection().setBaseAndExtent(webeditor.contentSelectionBaseNode[contenteditable_focused], webeditor.contentSelectionBaseOffset[contenteditable_focused], webeditor.contentSelectionExtentNode[contenteditable_focused], webeditor.contentSelectionExtentOffset[contenteditable_focused]);
	webeditor.contentSelectionBaseNode[contenteditable_focused] = false;
	webeditor.contentSelectionExtentNode[contenteditable_focused] = false;
}
			}
		}
	}
}

function contenteditable_focused_contentwindow() {
	if (document.getElementsByTagName('iframe').item(contenteditable_focused)) {
		return document.getElementsByTagName('iframe').item(contenteditable_focused).contentWindow;
	} else {
//		return document.window;
	}
}

function contenteditable_focused_document() {
	if (document && document.getElementsByTagName('iframe') && document.getElementsByTagName('iframe').item(contenteditable_focused) && document.getElementsByTagName('iframe').item(contenteditable_focused).contentWindow) return document.getElementsByTagName('iframe').item(contenteditable_focused).contentWindow.document;
}

function contenteditable_focused_iframe() {
	return document.getElementsByTagName('iframe').item(contenteditable_focused);
}

function contenteditable_focused_form() {
	var form = contenteditable_focused_iframe();
	while ((form.tagName != "FORM") && (form.tagName != "HTML")) {
		form = form.parentNode;
	}
	if (form.tagName != "HTML") {
		return form;
	}
}

function contenteditable_focused_textarea() {
	var iframe = contenteditable_focused_iframe();
	var form = contenteditable_focused_form();
	if (form) {
		return form[iframe.id];
	} else {
		return document.getElementById(iframe.id+'_textarea');
	}
}

function contenteditable_iframe(id) {
	var iframes = document.getElementsByTagName('iframe');
	for (var i=0; i<iframes.length; i++) {
		if ((iframes.item(i).className == 'webeditor_contenteditable') || (iframes.item(i).className == 'webeditor_contenteditable_disabled')) {
			if (iframes.item(i).id == id) return iframes.item(i);
		}
	}
}

function contenteditable_createtable(rows, cols, border, width, height, cellpadding, cellspacing, background, bgcolor, bordercolor, htmlclass, htmlid) {
	var contentWindow = contenteditable_focused_contentwindow();
	if ((rows > 0) && (cols > 0)) {
		var table = contentWindow.document.createElement("table");
		if (border) { contenteditable_setAttribute(table, "border", border); }
		if (width) { contenteditable_setAttribute(table, "width", width); }
		if (height) { contenteditable_setAttribute(table, "height", height); }
		if (cellpadding) { contenteditable_setAttribute(table, "cellPadding", cellpadding); }
		if (cellspacing) { contenteditable_setAttribute(table, "cellSpacing", cellspacing); }
		if (background) { contenteditable_setAttribute(table, "background", background); }
		if (bgcolor) { contenteditable_setAttribute(table, "bgColor", bgcolor); }
		if (bordercolor) { contenteditable_setAttribute(table, "borderColor", bordercolor); }
		if (htmlclass) { contenteditable_setAttribute(table, "class", htmlclass); }
		if (htmlid) { contenteditable_setAttribute(table, "id", htmlid); }
		var tbody = contentWindow.document.createElement("tbody");
		for (var i=0; i<rows; i++) {
			var tr = contentWindow.document.createElement("tr");
			for (var j=0; j<cols; j++) {
				var td = contentWindow.document.createElement("td");
				td.innerHTML = "&nbsp;";
				tr.appendChild(td);
			}
			tbody.appendChild(tr);
		}
		table.appendChild(tbody);			
		contenteditable_insertNodeAtSelection(contentWindow, table);
	}
}

function contenteditable_isTable() {
	var table;
	if ((table = contenteditable_isRow()) || (table = contenteditable_isTableCaption()) || (table = contenteditable_selection_container())) {
		while ((table) && (table.tagName != "TABLE") && (table.tagName != "HTML")) {
			table = table.parentNode;
		}
		if ((! table) || (table.tagName == "HTML")) {
			return false;
		} else {
			return table;
		}
	}
}

function contenteditable_isTableCaption() {
	var caption = contenteditable_selection_container();
	while ((caption) && (caption.tagName != "CAPTION") && (caption.tagName != "TABLE") && (caption.tagName != "HTML")) {
		caption = caption.parentNode;
	}

	if ((! caption) || (caption.tagName != "CAPTION")) {
		return false;
	} else {
		return caption;
	}
}

function contenteditable_isTableHead() {
	var table;
	if ((table = contenteditable_isRow()) || (table = contenteditable_selection_container())) {
		while ((table) && (table.tagName != "THEAD") && (table.tagName != "TABLE") && (table.tagName != "HTML")) {
			table = table.parentNode;
		}
		if (table && (table.tagName == "THEAD")) {
			return table;
		} else {
			return false;
		}
	}
}

function contenteditable_isTableBody() {
	var table;
	if ((table = contenteditable_isRow()) || (table = contenteditable_selection_container())) {
		while ((table) && (table.tagName != "TBODY") && (table.tagName != "TABLE") && (table.tagName != "HTML")) {
			table = table.parentNode;
		}
		if (table && (table.tagName == "TBODY")) {
			return table;
		} else {
			return false;
		}
	}
}

function contenteditable_isTableFoot() {
	var table;
	if ((table = contenteditable_isRow()) || (table = contenteditable_selection_container())) {
		while ((table) && (table.tagName != "TFOOT") && (table.tagName != "TABLE") && (table.tagName != "HTML")) {
			table = table.parentNode;
		}
		if ((table) && (table.tagName == "TFOOT")) {
			return table;
		} else {
			return false;
		}
	}
}

function contenteditable_isRow() {
	var row;
	if ((row = contenteditable_isCell()) || (row = contenteditable_selection_container())) {
		while ((row) && (row.tagName != "TR") && (row.tagName != "HTML")) {
			row = row.parentNode;
		}
		if ((! row) || (row.tagName == "HTML")) {
			return false;
		} else {
			return row;
		}
	}
}

function contenteditable_isCell() {
	var cell = contenteditable_selection_container();
	while ((cell) && (cell.tagName != "TD") && (cell.tagName !=  "TH") && (cell.tagName != "BODY") && (cell.tagName != "HTML")) {
		cell = cell.parentNode;
	}

	if ((! cell) || (cell.tagName == "BODY") || (cell.tagName == "HTML")) {
		return false;
	} else {
		return cell;
	}
}

function contenteditable_rowIndex(row) {
	var rowIndex = 0;
	var nodeName = row.nodeName;
	var parentNode = row.parentNode;
	if (parentNode.nodeName != "TABLE") {
		while (parentNode = parentNode.previousSibling) {
			if ((parentNode.nodeName == "THEAD") || (parentNode.nodeName == "TBODY")) {
				rowIndex += parentNode.rows.length;
			}
		}
	}
	while (row = row.previousSibling) {
		if (nodeName == row.nodeName) rowIndex++;
	}
	return rowIndex;
}

function contenteditable_adjustedCellColumns(table) {
	// find cell columns adjusted for table rowspans
	var cellColumn = new Array();
	var rowspan_adjustment = new Array();
	for (var i=0; i<table.rows.length; i++) {
		if (! rowspan_adjustment[i]) rowspan_adjustment[i] = new Array();
		if (! cellColumn[i]) cellColumn[i] = new Array();
		var column = 0;
		for (var j=0; j<table.rows[i].cells.length; j++) {
			var rowspan = contenteditable_cellRowSpan(table.rows[i].cells[j]);
			var colspan = contenteditable_cellColSpan(table.rows[i].cells[j]);
			if (! rowspan_adjustment[i][column]) rowspan_adjustment[i][column] = 0;
			while (rowspan_adjustment[i][column]) column += rowspan_adjustment[i][column];
			if (rowspan > 1) {
				var rowsspanned = parseInt(rowspan);
				while (rowsspanned > 1) {
					rowsspanned--;
					if (! rowspan_adjustment[i+rowsspanned]) rowspan_adjustment[i+rowsspanned] = new Array();
					rowspan_adjustment[i+rowsspanned][column] = colspan;
				}
			}
			cellColumn[i][j] = column;
			column += colspan;
		}
	}
	return cellColumn;
}

function contenteditable_adjustedSelectionColumns(rows) {
	// find cell columns adjusted for table rowspans
	var cellColumn = new Array();
	var rowspan_adjustment = new Array();
	for (var i=0; i<rows.length; i++) {
		if (! rowspan_adjustment[i]) rowspan_adjustment[i] = new Array();
		if (! cellColumn[i]) cellColumn[i] = new Array();
		var column = 0;
		for (var j=0; j<rows[i].length; j++) {
			if (! rowspan_adjustment[i][column]) rowspan_adjustment[i][column] = 0;
			while (rowspan_adjustment[i][column]) column += rowspan_adjustment[i][column];
			if (contenteditable_cellRowSpan(rows[i][j]) > 1) {
				var rowsspanned = parseInt(contenteditable_cellRowSpan(rows[i][j]));
				while (rowsspanned > 1) {
					rowsspanned--;
					if (! rowspan_adjustment[i+rowsspanned]) rowspan_adjustment[i+rowsspanned] = new Array();
					rowspan_adjustment[i+rowsspanned][column] = contenteditable_cellColSpan(rows[i][j]);
				}
			}
			cellColumn[i][j] = column;
			column += contenteditable_cellColSpan(rows[i][j]);
		}
	}
	return cellColumn;
}

function contenteditable_insertrow_rowspans(new_row, rowspan) {
	if (new_row) {
		for (var row=new_row.previousSibling; row; row=row.previousSibling) {
			rowspan++;
			for (var cell=row.firstChild; cell; cell=cell.nextSibling) {
				if (cell.tagName == "TD") {
					if ((contenteditable_cellRowSpan(cell) > rowspan) && (contenteditable_cellRowSpan(cell) > 1)) {
						cell.rowSpan++;
					}
				}
			}
		}
	}
}

function contenteditable_insertcaption() {
	var table;
	if (table = contenteditable_isTable()) {
		var caption;
		for (var node=table.firstChild; node; node=node.nextSibling) {
			if (node.tagName == "CAPTION") caption = node;
		}
		if (! caption) {
			caption = contenteditable_focused_contentwindow().document.createElement("caption");
			caption.innerHTML = "caption";
			if (table.firstChild) {
				table.insertBefore(caption, table.firstChild);
			} else {
				table.appendChild(caption);
			}
		}
	}
}

function contenteditable_insertrowhead() {
	var table;
	var row;
	if ((table = contenteditable_isTable()) && (row = contenteditable_isRow())) {
		var caption;
		var thead;
		for (var node=table.firstChild; node; node=node.nextSibling) {
			if (node.tagName == "THEAD") thead = node;
			if (node.tagName == "CAPTION") caption = node;
		}

		if (thead) {
			//
		} else if (caption) {
			thead = contenteditable_focused_contentwindow().document.createElement("thead");
			if (caption.nextSibling) {
				table.insertBefore(thead, caption.nextSibling);
			} else {
				table.appendChild(thead);
			}
		} else {
			thead = contenteditable_focused_contentwindow().document.createElement("thead");
			if (table.firstChild) {
				table.insertBefore(thead, table.firstChild);
			} else {
				table.appendChild(thead);
			}
		}

		var new_row = row.cloneNode(true);
		for (var cell=new_row.firstChild; cell; cell=cell.nextSibling) {
			if (cell.tagName == "TD") {
				contenteditable_removeAttribute(cell, "rowSpan");
				cell.innerHTML = "&nbsp;";
			}
		}
		if (thead.firstChild) {
			thead.insertBefore(new_row, thead.firstChild);
		} else {
			thead.appendChild(new_row);
		}
	}
}

function contenteditable_insertrowfoot() {
	var table;
	var row;
	if ((table = contenteditable_isTable()) && (row = contenteditable_isRow())) {
		var tfoot;
		for (var node=table.firstChild; node; node=node.nextSibling) {
			if (node.tagName == "TFOOT") tfoot = node;
		}

		if (! tfoot) {
			tfoot = contenteditable_focused_contentwindow().document.createElement("tfoot");
			table.appendChild(tfoot);
		}

		var new_row = row.cloneNode(true);
		for (var cell=new_row.firstChild; cell; cell=cell.nextSibling) {
			if (cell.tagName == "TD") {
				contenteditable_removeAttribute(cell, "rowSpan");
				cell.innerHTML = "&nbsp;";
			}
		}
		tfoot.appendChild(new_row);
	}
}

function contenteditable_insertrowabove() {
	var row;
	if (row = contenteditable_isRow()) {
		var new_row = row.cloneNode(true);
		for (var cell=new_row.firstChild; cell; cell=cell.nextSibling) {
			if (cell.tagName == "TD") {
				contenteditable_removeAttribute(cell, "rowSpan");
				cell.innerHTML = "&nbsp;";
			}
		}
		row.parentNode.insertBefore(new_row, row);
	}
	contenteditable_insertrow_rowspans(new_row,0);
}

function contenteditable_insertrowbelow() {
	var row;
	if (row = contenteditable_isRow()) {
		var new_row = row.cloneNode(true);
		for (var cell=new_row.firstChild; cell; cell=cell.nextSibling) {
			if (cell.tagName == "TD") {
				if (contenteditable_cellRowSpan(cell) > 1) {
					cell.parentNode.removeChild(cell);
				}
				cell.innerHTML = "&nbsp;";
			}
		}
		row.parentNode.insertBefore(new_row, row.nextSibling);
	}
	contenteditable_insertrow_rowspans(new_row,-1);
}

function contenteditable_deleterow() {
	var table = contenteditable_isTable();
	var row;
	if (tablecaption = contenteditable_isTableCaption()) {
		table = tablecaption.parentNode;
		table.removeChild(tablecaption);
	} else if ((row = contenteditable_isRow()) && (tablehead = contenteditable_isTableHead())) {
		if (tablehead.rows.length > 1) {
			row.parentNode.removeChild(row);
		} else {
			tablehead.parentNode.removeChild(tablehead);
		}
	} else if ((row = contenteditable_isRow()) && (tablebody = contenteditable_isTableBody())) {
		if (tablebody.rows.length > 1) {
			row.parentNode.removeChild(row);
		} else {
			tablebody.parentNode.removeChild(tablebody);
		}
	} else if ((row = contenteditable_isRow()) && (tablefoot = contenteditable_isTableFoot())) {
		if (tablefoot.rows.length > 1) {
			row.parentNode.removeChild(row);
		} else {
			tablefoot.parentNode.removeChild(tablefoot);
		}
	} else if ((row = contenteditable_isRow()) && (table = contenteditable_isTable())) {
		if (table.rows.length > 1) {
			row.parentNode.removeChild(row);
		} else {
			table.parentNode.removeChild(table);
		}
	}
	if (table && (table.rows.length == 0)) {
		table.parentNode.removeChild(table);
	}
}

function contenteditable_insertcolumnleft() {
	var table;
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow()) && (table = contenteditable_isTable())) {
		var cellcolumns = contenteditable_adjustedCellColumns(table);
		var column = cellcolumns[contenteditable_rowIndex(row)][contenteditable_cellIndex(cell)];
		var skiprows = 0;
		for (var i=0; i<table.rows.length; i++) {
			if (! skiprows) {
				var rowcolumn = 0;
				for (var j=0; ((j<table.rows[i].cells.length) && (rowcolumn<=column)); j++) {
					var rowspan = contenteditable_cellRowSpan(table.rows[i].cells[j]);
					var colspan = contenteditable_cellColSpan(table.rows[i].cells[j]);
					rowcolumn = cellcolumns[i][j];
					if (rowcolumn == column) {
						var new_cell = contenteditable_focused_contentwindow().document.createElement("td");
						new_cell.innerHTML = "&nbsp;";
//						new_cell.rowSpan = contenteditable_cellRowSpan(table.rows[i].cells[j]);
						if (contenteditable_cellRowSpan(table.rows[i].cells[j])) new_cell.rowSpan = contenteditable_cellRowSpan(table.rows[i].cells[j]);
						skiprows = rowspan - 1;
						table.rows[i].insertBefore(new_cell, table.rows[i].cells[j]);
					} else if ((rowcolumn + colspan) > column) {
						table.rows[i].cells[j].colSpan += 1;
						skiprows = rowspan - 1;
					}
					rowcolumn += contenteditable_cellColSpan(table.rows[i].cells[j]);
				}
			} else {
				skiprows--;
			}
		}
	}
}

function contenteditable_insertcolumnright() {
	var table;
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow()) && (table = contenteditable_isTable())) {
		var cellcolumns = contenteditable_adjustedCellColumns(table);
		var column = cellcolumns[contenteditable_rowIndex(row)][contenteditable_cellIndex(cell)] + contenteditable_cellColSpan(cell);
		var skiprows = 0;
		for (var i=0; i<table.rows.length; i++) {
			if (! skiprows) {
				var rowcolumn = 0;
				for (var j=0; ((j<table.rows[i].cells.length) && (rowcolumn<column)); j++) {
					var rowspan = contenteditable_cellRowSpan(table.rows[i].cells[j]);
					var colspan = contenteditable_cellColSpan(table.rows[i].cells[j]);
					rowcolumn = cellcolumns[i][j];
					rowcolumn += colspan;
					if (rowcolumn == column) {
						var new_cell = contenteditable_focused_contentwindow().document.createElement("td");
						new_cell.innerHTML = "&nbsp;";
//						new_cell.rowSpan = contenteditable_cellRowSpan(table.rows[i].cells[j]);
						if (table.rows[i].cells[j].rowSpan) new_cell.rowSpan = contenteditable_cellRowSpan(table.rows[i].cells[j]);
						skiprows = rowspan - 1;
						if (table.rows[i].cells[j].nextSibling) {
							table.rows[i].insertBefore(new_cell, table.rows[i].cells[j].nextSibling);
						} else {
							table.rows[i].appendChild(new_cell);
						}
					} else if (rowcolumn > column) {
						table.rows[i].cells[j].colSpan += 1;
						skiprows = rowspan - 1;
					}
				}
			} else {
				skiprows--;
			}
		}
	}
}

function contenteditable_deletecolumn() {
	var table;
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow()) && (table = contenteditable_isTable())) {
		if (row.cells.length > 1) {
			var cellcolumns = contenteditable_adjustedCellColumns(table);
			var column = cellcolumns[contenteditable_rowIndex(row)][contenteditable_cellIndex(cell)];
			var skiprows = 0;
			for (var i=0; i<table.rows.length; i++) {
				if (! skiprows) {
					var rowcolumn = 0;
					for (var j=0; ((j<table.rows[i].cells.length) && (rowcolumn<=column)); j++) {
						rowcolumn = cellcolumns[i][j];
						if ((rowcolumn == column) && (contenteditable_cellColSpan(table.rows[i].cells[j]) == 1)) {
							skiprows = contenteditable_cellRowSpan(table.rows[i].cells[j]) - 1;
							table.rows[i].removeChild(table.rows[i].cells[j]);
							rowcolumn++;
							rowcolumn = column + 1;
						} else if ((rowcolumn + contenteditable_cellColSpan(table.rows[i].cells[j])) > column) {
							table.rows[i].cells[j].colSpan -= 1;
							skiprows = contenteditable_cellRowSpan(table.rows[i].cells[j]) - 1;
							rowcolumn += contenteditable_cellColSpan(table.rows[i].cells[j]);
							rowcolumn = column + 1;
						}
					}
				} else {
					skiprows--;
				}
			}
		} else {
			table.parentNode.removeChild(table);
		}
	}
}

function contenteditable_insertcellleft() {
	var cell;
	if (cell = contenteditable_isCell()) {
		var new_cell = contenteditable_focused_contentwindow().document.createElement("td");
		new_cell.innerHTML = "&nbsp;";
		cell.parentNode.insertBefore(new_cell, cell);
	}
}

function contenteditable_insertcellright() {
	var cell;
	if (cell = contenteditable_isCell()) {
		var new_cell = contenteditable_focused_contentwindow().document.createElement("td");
		new_cell.innerHTML = "&nbsp;";
		cell.parentNode.insertBefore(new_cell, cell.nextSibling);
	}
}

function contenteditable_deletecell() {
	var table;
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow()) && (table = contenteditable_isTable())) {
		if (row.cells.length > 1) {
			row.removeChild(cell);
		} else {
			contenteditable_deleterow();
		}
	}
}

function contenteditable_mergecells() {
	if (cells = contenteditable_selection_cells()) {
		var cellcolumns = contenteditable_adjustedSelectionColumns(cells);
		var html = '';
		var colspan = 0;
		var rowspan = 0;
		for (var row=0; row<cells.length; row++) {
			if (html != '') html += '<br>\r\n';
			var rowcolumn = 0;
			for (var column=0; column<cells[row].length; column++) {
				rowcolumn = cellcolumns[row][column];
				if (row == 0) colspan += contenteditable_cellColSpan(cells[row][column]);
				if (colspan == rowcolumn) {
					if (column == 0) rowspan += contenteditable_cellRowSpan(cells[row][column]);
				} else {
					if (rowcolumn == 0) rowspan += contenteditable_cellRowSpan(cells[row][column]);
				}
				if (cells[row][column].innerHTML != '&nbsp;') {
					html += cells[row][column].innerHTML;
				}
				if (row || column) {
					var parentnode = cells[row][column].parentNode;
					parentnode.removeChild(cells[row][column]);
				}
			}
		}
		if (html == '') html = '&nbsp;';
		cells[0][0].innerHTML = html;
		cells[0][0].rowSpan = rowspan;
		cells[0][0].colSpan = colspan;
	}
}

function contenteditable_splitcell() {
	var table;
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow()) && (table = contenteditable_isTable())) {
		var column = contenteditable_cellIndex(cell);
		var colSpan = contenteditable_cellColSpan(cell);
		var rowSpan = contenteditable_cellRowSpan(cell);
		contenteditable_removeAttribute(cell, "colSpan");
		contenteditable_removeAttribute(cell, "rowSpan");
		for (var i=0; i<rowSpan; i++) {
			if (i) {
				if (row.rowIndex < row.parentNode.rows.length) {
					row = row.parentNode.rows[row.rowIndex+1];
				} else {
					var new_row = row.cloneNode(false);
					row.parentNode.appendChild(new_row);
					row = new_row;
				}
			}
			for (var j=0; j<colSpan; j++) {
				var new_cell = cell.cloneNode(true);
				contenteditable_removeAttribute(new_cell, "colSpan");
				contenteditable_removeAttribute(new_cell, "rowSpan");
				new_cell.innerHTML = "&nbsp;";
				if (i) {
					if (row.cells && row.cells[column] && row.cells[column].nextSibling) {
						row.insertBefore(new_cell, row.cells[column].nextSibling);
					} else {
						row.appendChild(new_cell);
					}
				} else if (j) {
					if (row.cells && row.cells[column] && row.cells[column].nextSibling) {
						row.insertBefore(new_cell, row.cells[column].nextSibling);
					} else {
						row.appendChild(new_cell);
					}
				}
			}
		}
	}
}

function contenteditable_splitcellcolumns() {
	var table;
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow())) {
		var column = contenteditable_cellIndex(cell);
		var colSpan = contenteditable_cellColSpan(cell);
		contenteditable_removeAttribute(cell, "colSpan");
		for (var i=1; i<colSpan; i++) {
			var new_cell = cell.cloneNode(true);
			contenteditable_removeAttribute(new_cell, "colSpan");
			new_cell.innerHTML = "&nbsp;";
			if (cell.nextSibling) {
				row.insertBefore(new_cell, cell.nextSibling);
			} else {
				row.appendChild(new_cell);
			}
		}
	}
}

function contenteditable_splitcellrows() {
	var row;
	var cell;
	if ((cell = contenteditable_isCell()) && (row = contenteditable_isRow())) {
		var column = contenteditable_cellIndex(cell);
		var colSpan = contenteditable_cellColSpan(cell);
		var rowSpan = contenteditable_cellRowSpan(cell);
		contenteditable_removeAttribute(cell, "rowSpan");
		for (var i=1; i<rowSpan; i++) {
			if (row.rowIndex < row.parentNode.rows.length) {
				row = row.parentNode.rows[row.rowIndex];
			} else {
				var new_row = row.cloneNode(false);
				row.parentNode.appendChild(new_row);
				row = new_row;
			}
			var new_cell = cell.cloneNode(true);
			contenteditable_removeAttribute(new_cell, "rowSpan");
			if (colSpan) {
				contenteditable_setAttribute(new_cell, "colSpan", colSpan);
			}
			new_cell.innerHTML = "&nbsp;";
			if (row.cells[column]) {
				row.insertBefore(new_cell, row.cells[column]);
			} else {
				row.appendChild(new_cell);
			}
		}
	}
}

function contenteditable_createlink(href, target, text, htmlclass, htmlid, onclick, title) {
	var contentWindow = contenteditable_focused_contentwindow();
	if (href) {
		if (! text) text = href;
		text = text.replace(/<a\s+[^>]+>/gi, "");
		text = text.replace(/<\/a>/gi, "");
		var element = contenteditable_selection_container('a');
		if (element) {
			contenteditable_selection_node(element);
			contenteditable_setAttribute(element, "href", href);
			if (target) {
				contenteditable_setAttribute(element, "target", target);
			} else {
				contenteditable_removeAttribute(element, "target");
			}
			if (htmlclass) {
				contenteditable_setAttribute(element, "class", htmlclass);
			} else {
				contenteditable_removeAttribute(element, "class");
			}
			if (htmlid) {
				contenteditable_setAttribute(element, "id", htmlid);
			} else {
				contenteditable_removeAttribute(element, "id");
			}
			if (onclick) {
				contenteditable_setAttribute(element, "onclick", onclick);
			} else {
				contenteditable_removeAttribute(element, "onclick");
			}
			if (title) {
				contenteditable_setAttribute(element, "title", title);
			} else {
				contenteditable_removeAttribute(element, "title");
			}
			contenteditable_insertlink_fix(element, href, target, text, htmlclass, htmlid, onclick, title);
		} else {
			var a = contentWindow.document.createElement("a");
			contenteditable_setAttribute(a, "href", href);
			if (target) { contenteditable_setAttribute(a, "target", target); }
			if (htmlclass) { contenteditable_setAttribute(a, "class", htmlclass); }
			if (htmlid) { contenteditable_setAttribute(a, "id", htmlid); }
			if (onclick) { contenteditable_setAttribute(a, "onclick", onclick); }
			if (title) { contenteditable_setAttribute(a, "title", title); }
			a.innerHTML = text;
			var node = contenteditable_insertNodeAtSelection(contentWindow, a);
			// MSIE insertNodeAtSelection/pasteHTML may not work properly - changes src from relative to absolute + sets unspecified default values
			contenteditable_insertlink_fix(node, href, target, text, htmlclass, htmlid, onclick, title);
		}
	}
}

function contenteditable_insertimage(src, border, alt, width, height, vspace, hspace, align, htmlclass, htmlid, onmouseover, onmouseout, usemap) {
	var contentWindow = contenteditable_focused_contentwindow();
	if (src) {
		var element = contenteditable_selection_container('object');
		if ((contenteditable_getAttribute(element, 'classid') == "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000") || (contenteditable_getAttribute(element, 'classid') == "clsid:CAFEEFAC-0014-0002-0000-ABCDEFFEDCBA")) {
			element.parentNode.removeChild(element);
		}
		var img = contentWindow.document.createElement("img");
		contenteditable_setAttribute(img, "src", src);
		if (border) {
			contenteditable_setAttribute(img, "border", border);
		}
		if (alt) {
			contenteditable_setAttribute(img, "alt", alt);
		}
		if (width) {
			contenteditable_setAttribute(img, "width", width);
		}
		if (height) {
			contenteditable_setAttribute(img, "height", height);
		}
		if (vspace) {
			contenteditable_setAttribute(img, "vspace", vspace);
		}
		if (hspace) {
			contenteditable_setAttribute(img, "hspace", hspace);
		}
		if (align) {
			contenteditable_setAttribute(img, "align", align);
		}
		if (onmouseover) {
			contenteditable_setAttribute(img, "onMouseOver", onmouseover);
		}
		if (onmouseout) {
			contenteditable_setAttribute(img, "onMouseOut", onmouseout);
		}
		if (usemap) {
			contenteditable_setAttribute(img, "useMap", usemap);
		}
		if (htmlclass) {
			contenteditable_setAttribute(img, "class", htmlclass);
		}
		if (htmlid) {
			contenteditable_setAttribute(img, "id", htmlid);
		}
		contenteditable_insertNodeAtSelection(contentWindow, img);
		// MSIE insertNodeAtSelection/pasteHTML may not work properly - changes src from relative to absolute + sets unspecified default values
		contenteditable_insertimage_fix(src, border, alt, width, height, vspace, hspace, align, htmlclass, htmlid, onmouseover, onmouseout, usemap);
	}
}

function contenteditable_insertflash(href, alt, width, height, htmlclass, htmlid) {
	var contentWindow = contenteditable_focused_contentwindow();
	if (href) {
		var element = contenteditable_selection_container('object');
		if ((contenteditable_getAttribute(element, 'classid') == "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000") || (contenteditable_getAttribute(element, 'classid') == "clsid:CAFEEFAC-0014-0002-0000-ABCDEFFEDCBA") || (contenteditable_getAttribute(element, 'classid') == "clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B")) {
			element.parentNode.removeChild(element);
		}
		var html = '<object';
		html += ' codeBase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab"';
		html += ' classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"';
		if (width) { html += ' width="'+width+'"'; }
		if (height) { html += ' height="'+height+'"'; }
		if (htmlclass) { html += ' class="'+htmlclass+'"'; }
		if (htmlid) { html += ' id="'+htmlid+'"'; }
		html += '>';
		html += '<param name="movie" value="'+href+'">';
		html += '<param name="quality" value="high">';
		html += '<embed';
		html += ' src="'+href+'"';
		html += ' pluginspage="http://www.macromedia.com/go/getflashplayer"';
		html += ' type="application/x-shockwave-flash"';
		html += ' quality="high"';
		if (width) { html += ' width="'+width+'"'; }
		if (height) { html += ' height="'+height+'"'; }
		html += '>';
		html += '<noembed>';
		html += alt;
		html += '</noembed>';
		html += '</embed>';
		html += '</object>';
		contenteditable_pasteContent(html);
	}
}

function contenteditable_insertapplet(href, alt, width, height, htmlclass, htmlid) {
	var contentWindow = contenteditable_focused_contentwindow();
	if (href) {
		var element = contenteditable_selection_container('object');
		if ((contenteditable_getAttribute(element, 'classid') == "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000") || (contenteditable_getAttribute(element, 'classid') == "clsid:CAFEEFAC-0014-0002-0000-ABCDEFFEDCBA") || (contenteditable_getAttribute(element, 'classid') == "clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B")) {
			element.parentNode.removeChild(element);
		}
		var code;
		var codebase;
		if (href.lastIndexOf("/")>=0) {
			code = href.substring(href.lastIndexOf("/")+1);
			codebase = href.substring(0, href.lastIndexOf("/")+1);
		} else {
			code = href;
			codebase = "";
		}
		var html = '';
		html += '<object';
		html += ' codeBase="http://java.sun.com/products/plugin/autodl/jinstall-1_4_2-windows-i586.cab"';
		html += ' classid="clsid:CAFEEFAC-0014-0002-0000-ABCDEFFEDCBA"';
		if (width) { html += ' width="'+width+'"'; }
		if (height) { html += ' height="'+height+'"'; }
		if (htmlclass) { html += ' class="'+htmlclass+'"'; }
		if (htmlid) { html += ' id="'+htmlid+'"'; }
		html += '>';
		html += '<param name="codebase" value="'+codebase+'">';
		html += '<param name="code" value="'+code+'">';
		html += '<param name="type" value="application/x-java-applet">';
		html += '<comment>';
		html += '<embed';
		html += ' pluginspage="http://java.sun.com/products/plugin/index.html#download"';
		html += ' codebase="'+codebase+'"';
		html += ' code="'+code+'"';
		html += ' type="application/x-java-applet"';
		if (width) { html += ' width="'+width+'"'; }
		if (height) { html += ' height="'+height+'"'; }
		html += '>';
		html += '<noembed>';
		html += '<applet';
		html += ' codebase="'+codebase+'"';
		html += ' code="'+code+'"';
		if (width) { html += ' width="'+width+'"'; }
		if (height) { html += ' height="'+height+'"'; }
		html += '>';
		html += alt;
		html += '</applet>';
		html += '</noembed>';
		html += '</embed>';
		html += '</comment>';
		html += '</object>';
		contenteditable_pasteContent(html);
	}
}

function contenteditable_insertquicktime(href, alt, width, height, htmlclass, htmlid) {
	var contentWindow = contenteditable_focused_contentwindow();
	if (href) {
		var element = contenteditable_selection_container('object');
		if ((contenteditable_getAttribute(element, 'classid') == "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000") || (contenteditable_getAttribute(element, 'classid') == "clsid:CAFEEFAC-0014-0002-0000-ABCDEFFEDCBA") || (contenteditable_getAttribute(element, 'classid') == "clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B")) {
			element.parentNode.removeChild(element);
		}
		var html = '<object';
		html += ' codeBase="http://www.apple.com/qtactivex/qtplugin.cab"';
		html += ' classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"';
		if (width) { html += ' width="'+width+'"'; }
		if (height) { html += ' height="'+height+'"'; }
		if (htmlclass) { html += ' class="'+htmlclass+'"'; }
		if (htmlid) { html += ' id="'+htmlid+'"'; }
		html += '>';
		html += '<param name="src" value="'+href+'">';
//		html += '<param name="autoplay" value="true">';
//		html += '<param name="loop" value="false">';
//		html += '<param name="controller" value="true">';
		html += '<embed';
		html += ' src="'+href+'"';
		html += ' pluginspage="http://www.apple.com/quicktime/"';
		html += ' type="video/quicktime"';
//		html += ' autoplay="true"';
//		html += ' loop="false"';
//		html += ' controller="true"';
		if (width) { html += ' width="'+width+'"'; }
		if (height) { html += ' height="'+height+'"'; }
		html += '>';
		html += '<noembed>';
		html += alt;
		html += '</noembed>';
		html += '</embed>';
		html += '</object>';
		contenteditable_pasteContent(html);
	}
}

function contenteditable_stylesheet_link(stylesheet, id) {
	if (! stylesheet) {
		stylesheet = webeditor.rootpath + 'default.css';
		var stylesheet_toggle = document.getElementById('stylesheet_toggle');
		if (stylesheet_toggle) stylesheet_toggle.checked = true;
	} else {
		var stylesheet_toggle = document.getElementById('stylesheet_toggle');
		if (stylesheet_toggle) stylesheet_toggle.checked = true;
	}
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
			if ((id == iframe.id) || (! id)) {
				webeditor.stylesheets[iframe.id] = stylesheet;
				try {
					// MSIE may crash if the style sheet imports other style sheets using @import
					//iframe.contentWindow.document.getElementById('stylesheet').href = stylesheet;
					var oldNode = iframe.contentWindow.document.getElementById('stylesheet');
					var newNode = iframe.contentWindow.document.createElement("link");
					newNode.id = "stylesheet";
					newNode.rel = "stylesheet";
					newNode.type = "text/css";
					newNode.href = stylesheet;
					oldNode.parentNode.replaceChild(newNode, oldNode);
					oldNode = false;
					contenteditable_stylesheet[iframe.id] = stylesheet;
					webeditor.stylesheetclassnames = new Array();
					webeditor.stylesheetclassvalues = new Array();
					webeditor_refreshToolbar(true);
				}  catch (e) {
				}
			}
		}
	}
}

function contenteditable_stylesheet_toggle(use_stylesheet) {
	editor_stylesheet = webeditor.rootpath + 'editor.css';
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
			try {
				if (use_stylesheet) {
					iframe.contentWindow.document.getElementById('stylesheet').href = contenteditable_stylesheet[iframe.id];
					var stylesheet_toggle = document.getElementById('stylesheet_toggle');
					if (stylesheet_toggle) stylesheet_toggle.checked = true;
				} else {
					iframe.contentWindow.document.getElementById('stylesheet').href = editor_stylesheet;
					var stylesheet_toggle = document.getElementById('stylesheet_toggle');
					if (stylesheet_toggle) stylesheet_toggle.checked = false;
				}
			}  catch (e) {
			}
		}
	}
}

function contenteditable_formatclass_query() {
	var selection_class = "";
	for (var node = contenteditable_selection_container(); ((node != null) && (node.nodeName != "HTML")); node = node.parentNode) {
		if (node.className != "") {
			selection_class = node.className;
			break;
		}
	}
	return selection_class;
}

function contenteditable_formatclass_attribute(node, value) {
	if (value) {
		node.className = value;
	} else {
		contenteditable_removeAttribute(node, "class");
		if ((node.nodeName == "SPAN") && (node.childNodes) && (node.childNodes.length == 1)) {
			var empty = true;
			for (var i in node.attributes) if (typeof(node.attributes[j]) != "function") {
				if (node.attributes[i] && (node.attributes[i].specified == true)) {
					empty = false;
					break;
				}
			}
			if (empty) node.parentNode.replaceChild(node.childNodes[0], node);
		} else if ((node.nodeName == "SPAN") && (! node.childNodes) || (node.childNodes.length == 0)) {
			var empty = true;
			for (var i in node.attributes) if (typeof(node.attributes[i]) != "function") {
				if (node.attributes[i] && (node.attributes[i].specified == true)) {
					empty = false;
					break;
				}
			}
			if (empty && node.parentNode) node.parentNode.removeChild(node);
		}
	}
}

function contenteditable_fontname(command,value) {
	if (value == "") {
		var element = contenteditable_selection_container('font');
		if (element) {
			contenteditable_removeAttribute(element, "face");
			if (! contenteditable_node_attributes(element)) contenteditable_remove_parentnode(element);
			return true;
		} else {
			return false;
		}
	} else {
		return contenteditable_execcommand(command,value);
	}
}

function contenteditable_fontsize(command,value) {
	if (value == "") {
		var element = contenteditable_selection_container('font');
		if (element) {
			contenteditable_removeAttribute(element, "size");
			if (! contenteditable_node_attributes(element)) contenteditable_remove_parentnode(element);
			return true;
		} else {
			return false;
		}
	} else {
		return contenteditable_execcommand(command,value);
	}
}

function contenteditable_viewdetails(details) {
	if (details == null) details = ! contenteditable_viewdetails_status[contenteditable_focused];
	if (details) {
		contenteditable_viewdetails_status[contenteditable_focused] = true;
		contenteditable_stylesheet_toggle(false);
	} else {
		contenteditable_viewdetails_status[contenteditable_focused] = false;
		contenteditable_stylesheet_toggle(true);
	}
	webeditor_refreshToolbar(true);
}

function contenteditable_viewsource(source) {
	if (true) {
		// new viewsource functionality using textarea
		var iframe = contenteditable_focused_iframe();
		var form = contenteditable_focused_form();
		if (form && form.tagName != "HTML") {
			var textarea = contenteditable_focused_textarea();
			if (! contenteditable_viewsource_status[contenteditable_focused]) {
				contenteditable_viewsource_status[contenteditable_focused] = true;
				var viewdetails_status = contenteditable_viewdetails_status[contenteditable_focused] || false;
				contenteditable_viewdetails(false);
				contenteditable_viewdetails_status[contenteditable_focused] = viewdetails_status;
				var content = iframe.contentWindow.document.body.innerHTML;
				if (webeditor.formatcontent) content = contenteditable_formatContent(iframe.contentWindow.document.body);
				if (webeditor.autoclean) content = cleanContentSub(content, webeditor.autocleanAllHTML, webeditor.autocleanAllXML, webeditor.autocleanAllNamespace, webeditor.autocleanAllLang, webeditor.autocleanAllClass, webeditor.autocleanAllStyle, webeditor.autocleanEmptySpan, webeditor.autocleanAllSpan, webeditor.autocleanEmptyFont, webeditor.autocleanAllFont, webeditor.autocleanAllDelIns, webeditor.autocleanEmptyPDiv, webeditor.autocleanAllFormatTags, webeditor.autocleanAllMsoClass, webeditor.autocleanAllMsoStyle, webeditor.autocleanAllMsoConditional, webeditor.autocleanEmptyStyle);
				content = contenteditable_decodeScriptTags(content);
				try {
					if (webeditor_custom_decode) content = webeditor_custom_decode(content);
				} catch(e) {
				}
				try {
					if (webeditor_custom_finalize) content = webeditor_custom_finalize(content);
				} catch(e) {
				}
				content = contenteditable_merge_content(iframe.id, content);
				textarea.value = content;
				var iframe_offsetWidth = iframe.offsetWidth;
				var iframe_offsetHeight = iframe.offsetHeight;
// Safari selection fix may need to be cleared
webeditor.contentSelectionBaseNode[contenteditable_focused] = false;
webeditor.contentSelectionBaseOffset[contenteditable_focused] = false;
webeditor.contentSelectionExtentNode[contenteditable_focused] = false;
webeditor.contentSelectionExtentOffset[contenteditable_focused] = false;
				contenteditable_iframe_hide(iframe);
// Safari selection fix may need to be cleared
webeditor.contentSelectionBaseNode[contenteditable_focused] = false;
webeditor.contentSelectionBaseOffset[contenteditable_focused] = false;
webeditor.contentSelectionExtentNode[contenteditable_focused] = false;
webeditor.contentSelectionExtentOffset[contenteditable_focused] = false;
				textarea.style.display = "block";
				while (textarea.offsetWidth < iframe_offsetWidth) {
					var textarea_offsetWidth = textarea.offsetWidth;
					textarea.cols += 2;
					if (textarea_offsetWidth >= textarea.offsetWidth) break;
				}
				while (textarea.offsetHeight < iframe_offsetHeight) {
					var textarea_offsetHeight = textarea.offsetHeight;
					textarea.rows += 2;
					if (textarea_offsetWidth >= textarea.offsetWidth) break;
				}
				contenteditable_viewsource_onfocus(textarea);
			} else {
				contenteditable_viewsource_status[contenteditable_focused] = false;
				contenteditable_viewdetails(contenteditable_viewdetails_status[contenteditable_focused]);
				textarea.style.display = "none";
				contenteditable_iframe_show(iframe);
				contenteditable_viewsource_textarea2html(textarea, iframe);
				contenteditable_enable();
				contenteditable_position(true);
			}
			webeditor_refreshToolbar(true);
		}
		return;
	} else {
		// old viewsource functionality using text encoding
		if (! contenteditable_viewsource_status[contenteditable_focused]) {
			contenteditable_viewsource_status[contenteditable_focused] = true;
			contenteditable_stylesheet_toggle(false);
			contenteditable_viewsource_show();
		} else {
			contenteditable_viewsource_status[contenteditable_focused] = false;
			contenteditable_stylesheet_toggle(true);
			contenteditable_viewsource_hide();
		}
	}
}

function contenteditable_node_attributes(node) {
	var attributes = "";
	if (node && node.attributes) {
		for (var attribute=0; attribute<node.attributes.length; attribute++) {
			if ((typeof(webeditor.strip[node.nodeName+"."+node.attributes[attribute].name]) != "undefined") || (typeof(webeditor.strip["."+node.attributes[attribute].name]) != "undefined")) {
				// ignore attribute
			} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].name) && (node.attributes[attribute].name == 'class') && ((contenteditable_getAttribute(node, node.attributes[attribute].name) == 'Apple-style-span') || (contenteditable_getAttribute(node, node.attributes[attribute].name) == 'khtml-block-placeholder'))) {
				// ignore Safari special attributes
			} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].nodeName) && (node.attributes[attribute].nodeName == 'class') && ((contenteditable_getAttribute(node, node.attributes[attribute].nodeName) == 'Apple-style-span') || (contenteditable_getAttribute(node, node.attributes[attribute].nodeName) == 'khtml-block-placeholder'))) {
				// ignore Safari special attributes
			} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].name) && (node.attributes[attribute].name == 'type') && (contenteditable_getAttribute(node, node.attributes[attribute].name) == '_moz')) {
				// ignore Safari special attributes
			} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].nodeName) && (node.attributes[attribute].nodeName == 'type') && (contenteditable_getAttribute(node, node.attributes[attribute].nodeName) == '_moz')) {
				// ignore Safari special attributes
			} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].name) && (node.attributes[attribute].name.substr(0,4) == "_moz")) {
				// ignore Mozilla special attributes
			} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].nodeName) && (node.attributes[attribute].nodeName.substr(0,4) == "_moz")) {
				// ignore Mozilla special attributes
			} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].name)) {
				attributes += node.attributes[attribute].name + '="' + contenteditable_getAttribute(node, node.attributes[attribute].name) + '" ';
			} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].nodeName)) {
				attributes += node.attributes[attribute].nodeName + '="' + contenteditable_getAttribute(node, node.attributes[attribute].nodeName) + '" ';
			}
		}
	}
	attributes = contenteditable_node_attributes_fix(attributes);
	return attributes;
}

function contenteditable_nextnode(rootnode, node, skipChildren) {
	var current_node = node;
	if (node && node.firstChild && (! skipChildren)) {
		return node.firstChild;
	} else {
		while (node && (node != rootnode) && (! node.nextSibling)) node = node.parentNode;
		if (node && (node != rootnode)) {
			// MSIE DOM may be broken with loops caused by overlapping tags
			if (node.nextSibling == current_node) return false;
			return node.nextSibling;
		} else {
			return false;
		}
	}
}

function contenteditable_previousnode(rootnode, node) {
	if (rootnode == node) {
		while (node && node.lastChild) node = node.lastChild;
	} else if (node) {
		if (node.previousSibling) {
			node = node.previousSibling;
			while (node && node.lastChild) node = node.lastChild;
		} else {
			node = node.parentNode;
		}
	}
	if (node && (node != rootnode)) {
		return node;
	} else {
		return false;
	}
}

function contenteditable_event_cut_down(my_event) {
	if (my_event && (my_event.type == "keydown") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_cut)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_cut_up(my_event) {
	if (my_event && (my_event.type == "keyup") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_cut)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_cut_keypress(my_event) {
	if (my_event && (my_event.type == "keypress") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_cut)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_copy_down(my_event) {
	if (my_event && (my_event.type == "keydown") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_copy)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_copy_up(my_event) {
	if (my_event && (my_event.type == "keyup") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_copy)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_copy_keypress(my_event) {
	if (my_event && (my_event.type == "keypress") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_copy)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_paste_down(my_event) {
	if (my_event && (my_event.type == "keydown") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_paste)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_paste_up(my_event) {
	if (my_event && (my_event.type == "keyup") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_paste)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_paste_keypress(my_event) {
	if (my_event && (my_event.type == "keypress") && my_event[webeditor_keyCode_command] && (my_event.keyCode == webeditor_keyCode_paste)) {
		return true;
	} else {
		return false;
	}
}

function contenteditable_event_paste(evt) {
	// MSIE and Mozilla pastes absolute URLs instead of relative URLs as originally copied/cut
	if (webeditor.clipboard && (contenteditable_event_cut_down(evt) || contenteditable_event_cut_keypress(evt))) {
		webeditor.clipboardHTML = contenteditable_getContentSelection();
		if (contenteditable_execcommand("cut")) {
			contenteditable_webeditor_clipboard_cut();
		} else {
			webeditor.clipboard = false;
		}
		contenteditable_event_stop(evt);
		return;
	} else if (webeditor.clipboard && (contenteditable_event_copy_down(evt) || contenteditable_event_copy_keypress(evt))) {
		webeditor.clipboardHTML = contenteditable_getContentSelection();
		if (contenteditable_execcommand("copy")) {
			contenteditable_webeditor_clipboard_copy();
		} else {
			webeditor.clipboard = false;
		}
		contenteditable_event_stop(evt);
		return;
	} else if (contenteditable_webeditor_clipboard_paste()) {
		if (contenteditable_event_paste_down(evt) && (! contenteditable_event_pasted_pre)) {
			contenteditable_undo_save();
			contenteditable_event_stop(evt);
		} else if (contenteditable_event_paste_up(evt) || contenteditable_event_pasted_pre) {
			contenteditable_paste_replacement_fix();
			contenteditable_event_stop(evt);
		} else if (contenteditable_event_paste_keypress(evt)) {
			contenteditable_undo_save();
			contenteditable_paste_replacement_fix();
			contenteditable_event_stop(evt);
		}
		return;
	}
	if (! contenteditable_event_pasted_post) {
		if (contenteditable_event_paste_down(evt) && (! contenteditable_event_pasted_pre)) {
			contenteditable_undo_save();
			contenteditable_event_paste_do_pre();
		} else if (contenteditable_event_paste_up(evt) || contenteditable_event_pasted_pre) {
			contenteditable_event_paste_do_post();
			setTimeout(contenteditable_event_paste_do_fix, 100);
		} else if (contenteditable_event_paste_keypress(evt)) {
			contenteditable_undo_save();
			contenteditable_event_paste_do_pre();
			contenteditable_event_paste_do_post();
			setTimeout(contenteditable_event_paste_do_fix, 100);
		}
	}
}

function contenteditable_event_paste_do_pre() {
	contenteditable_event_pasted_pre = true;
	contenteditable_paste_fix_prepare();
}

function contenteditable_event_paste_do_post() {
	contenteditable_event_pasted_post = true;
}

function contenteditable_event_paste_do_fix() {
	contenteditable_event_paste_fix();
	if (webeditor.fixBaseHrefPastedURLs) contenteditable_paste_fix();
	contenteditable_undo_save();
}

function contenteditable_event_paste_fix(contentnode) {
	contenteditable_event_paste_fix_sub("A", "href", contentnode);
	contenteditable_event_paste_fix_sub("IMG", "src", contentnode);
	contenteditable_event_paste_fix_sub("INPUT", "src", contentnode);
	contenteditable_event_paste_fix_sub("TABLE", "background", contentnode);
	contenteditable_event_paste_fix_sub("TR", "background", contentnode);
	contenteditable_event_paste_fix_sub("TD", "background", contentnode);
	contenteditable_event_paste_fix_sub("IFRAME", "src", contentnode);
	contenteditable_event_paste_fix_sub("AREA", "href", contentnode);
	contenteditable_event_pasted_pre = false;
	contenteditable_event_pasted_post = false;
}

function contenteditable_event_paste_fix_sub(tagName, attributeName, contentnode) {
//	if (webeditor.setcontentbodydocumentwrite && (webeditor.type == "msie")) return;
	if (webeditor.shortenLocalURLs) {
		var url = '';
		if (document.location.protocol) url += document.location.protocol + '//';
		if (document.location.hostname) url += document.location.hostname;
		if (document.location.port) url += ':' + document.location.port;
		var base = '';
		if (document.location.pathname) base += document.location.pathname.substring(0,document.location.pathname.lastIndexOf('/')+1);
		var path = '';
		if (document.location.pathname) path += document.location.pathname;
		var search = '';
		if (document.location.search) search += document.location.search;
		var docurl = url;
		var docbase = base;
		var docpath = path;
		var docsearch = search;
		if (webeditor.baseHref.match(new RegExp("^(https?://[^/]+)([^?]*)(.*)$"))) {
			url = RegExp.$1;
			path = RegExp.$2;
			search = RegExp.$3;
			base = path.substring(0,path.lastIndexOf('/')+1);
		}
		var tags;
		if (contentnode) {
			tags = contentnode.getElementsByTagName(tagName);
			var node = contentnode;
			var attributeValues = new Array();
			if (webeditor.shortenLocalURLsSearch && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+docpath+docsearch.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+docpath+docsearch.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")), "");
			}
			if (webeditor.shortenLocalURLsSearch && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+path+search.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+path+search.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")), "");
			}
			if (webeditor.shortenLocalURLsSearch && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+docpath+docsearch.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+docpath+docsearch.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")), "");
			}
			if (webeditor.shortenLocalURLsSearch && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+path+search.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+path+search.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")), "");
			}
			if (webeditor.shortenLocalURLsPath && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+docpath+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+docpath), "");
			}
			if (webeditor.shortenLocalURLsPath && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+path+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+path), "");
			}
			if (webeditor.shortenLocalURLsPath && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docpath+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docpath), "");
			}
			if (webeditor.shortenLocalURLsPath && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+path+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+path), "");
			}
			if (webeditor.shortenLocalURLsBase && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+docbase+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+docbase), "");
			}
			if (webeditor.shortenLocalURLsBase && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+base+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+base), "");
			}
			if (webeditor.shortenLocalURLsBase && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docbase+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docbase), "");
			}
			if (webeditor.shortenLocalURLsBase && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+base+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+base), "");
			}
			if (webeditor.shortenLocalURLsHost && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+'/#.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+'/'), "");
			}
			if (webeditor.shortenLocalURLsHost && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+'/#.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+'/'), "");
			}
			if (webeditor.shortenLocalURLsHost && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl), "");
			}
			if (webeditor.shortenLocalURLsHost && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url), "");
			}
			if (webeditor.shortenLocalURLsRootPath && (! webeditor.baseHref) && contenteditable_getAttribute(node, attributeName).substring(0,17+webeditor.rootpath.length+webeditor.language.length) == webeditor.rootpath + "empty." + webeditor.language + "?basehref=#") {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).substring(16+webeditor.rootpath.length+webeditor.language.length);
			}
			if (webeditor.shortenLocalURLsRootPath && (! webeditor.baseHref) && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+webeditor.rootpath+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+webeditor.rootpath), "");
			}
			if (webeditor.shortenLocalURLsRootPath && (! webeditor.baseHref) && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+webeditor.rootpath+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+webeditor.rootpath), "");
			}
			if (webeditor.shortenLocalURLsBaseHref && (! webeditor.baseHref) && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+webeditor.baseHref+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+webeditor.baseHref), "");
			}
			if (webeditor.shortenLocalURLsBaseHref && (! webeditor.baseHref) && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+webeditor.baseHref+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+webeditor.baseHref), "");
			}
			if (webeditor.shortenLocalURLsRoot && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+'/.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+'/'), "");
			}
			if (webeditor.shortenLocalURLsRoot && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^/.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^/'), "");
			}
			var attributeValue = contenteditable_getAttribute(node, attributeName);
			if (webeditor.setcontentbodydocumentwrite && (webeditor.type == "msie")) {
				// ignore
			} else {
				for (var j=0; j<attributeValues.length; j++) {
					if (attributeValues[j].length < attributeValue.length) {
						attributeValue = attributeValues[j];
					}
				}
				if (attributeValue.match(new RegExp("^(https?://[^/]+)([^?]*)(.*)$"))) {
					// absolute url
				} else if (webeditor.baseHrefPrefix && (attributeValue.substr(0,webeditor.baseHrefPrefix.length) != webeditor.baseHrefPrefix)) {
					attributeValue = webeditor.baseHrefPrefix + attributeValue;
				}
			}
			for (var key in webeditor.shortenLocalURLsRegExp) {
				attributeValue = attributeValue.replace(new RegExp(key), webeditor.shortenLocalURLsRegExp[key]);
			}
			if (attributeValue != contenteditable_getAttribute(node, attributeName)) {
				contenteditable_setAttribute(node, attributeName, attributeValue);
			}
		} else {
			tags = contenteditable_focused_document().getElementsByTagName(tagName);
		}
		for (var i=0; i<tags.length; i++) {
			var node = tags[i];
			var attributeValues = new Array();
			if (webeditor.shortenLocalURLsSearch && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+docpath+docsearch.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+docpath+docsearch.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")), "");
			}
			if (webeditor.shortenLocalURLsSearch && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+path+search.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+path+search.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")), "");
			}
			if (webeditor.shortenLocalURLsSearch && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+docpath+docsearch.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+docpath+docsearch.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")), "");
			}
			if (webeditor.shortenLocalURLsSearch && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+path+search.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+path+search.replace(/\?/,"\\?").replace(/\+/,"\\+").replace(/\[/,"\\[")), "");
			}
			if (webeditor.shortenLocalURLsPath && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+docpath+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+docpath), "");
			}
			if (webeditor.shortenLocalURLsPath && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+path+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+path), "");
			}
			if (webeditor.shortenLocalURLsPath && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docpath+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docpath), "");
			}
			if (webeditor.shortenLocalURLsPath && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+path+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+path), "");
			}
			if (webeditor.shortenLocalURLsBase && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+docbase+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+docbase), "");
			}
			if (webeditor.shortenLocalURLsBase && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+base+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+base), "");
			}
			if (webeditor.shortenLocalURLsBase && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docbase+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docbase), "");
			}
			if (webeditor.shortenLocalURLsBase && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+base+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+base), "");
			}
			if (webeditor.shortenLocalURLsHost && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+'/#.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl+'/'), "");
			}
			if (webeditor.shortenLocalURLsHost && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+'/#.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+'/'), "");
			}
			if (webeditor.shortenLocalURLsHost && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+docurl+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+docurl), "");
			}
			if (webeditor.shortenLocalURLsHost && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url), "");
			}
			if (webeditor.shortenLocalURLsRootPath && (! webeditor.baseHref) && contenteditable_getAttribute(node, attributeName).substring(0,17+webeditor.rootpath.length+webeditor.language.length) == webeditor.rootpath + "empty." + webeditor.language + "?basehref=#") {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).substring(16+webeditor.rootpath.length+webeditor.language.length);
			}
			if (webeditor.shortenLocalURLsRootPath && (! webeditor.baseHref) && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+webeditor.rootpath+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+webeditor.rootpath), "");
			}
			if (webeditor.shortenLocalURLsRootPath && (! webeditor.baseHref) && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+webeditor.rootpath+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+webeditor.rootpath), "");
			}
			if (webeditor.shortenLocalURLsBaseHref && (! webeditor.baseHref) && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+webeditor.baseHref+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+webeditor.baseHref), "");
			}
			if (webeditor.shortenLocalURLsBaseHref && (! webeditor.baseHref) && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+webeditor.baseHref+'.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+webeditor.baseHref), "");
			}
			if (webeditor.shortenLocalURLsRoot && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^'+url+'/.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^'+url+'/'), "");
			}
			if (webeditor.shortenLocalURLsRoot && (node.nodeName == tagName) && ((""+contenteditable_getAttribute(node, attributeName)).match(new RegExp('^/.+')))) {
				attributeValues[attributeValues.length] = contenteditable_getAttribute(node, attributeName).replace(new RegExp('^/'), "");
			}
			var attributeValue = contenteditable_getAttribute(node, attributeName);
			if (webeditor.setcontentbodydocumentwrite && (webeditor.type == "msie")) {
				// ignore
			} else {
				for (var j=0; j<attributeValues.length; j++) {
					if (attributeValues[j].length < attributeValue.length) {
						attributeValue = attributeValues[j];
					}
				}
				if (attributeValue.match(new RegExp("^(https?://[^/]+)([^?]*)(.*)$"))) {
					// absolute url
				} else if (webeditor.baseHrefPrefix && (attributeValue.substr(0,webeditor.baseHrefPrefix.length) != webeditor.baseHrefPrefix)) {
					attributeValue = webeditor.baseHrefPrefix + attributeValue;
				}
			}
			for (var key in webeditor.shortenLocalURLsRegExp) {
				attributeValue = attributeValue.replace(new RegExp(key), webeditor.shortenLocalURLsRegExp[key]);
			}
			if (attributeValue != contenteditable_getAttribute(node, attributeName)) {
				contenteditable_setAttribute(node, attributeName, attributeValue);
			}
		}
	}
}

function contenteditable_event_enter(my_event) {
	if (my_event && my_event.keyCode && (my_event.keyCode == webeditor_keyCode_enter)) {
		if ((my_event.type == "keydown") || (my_event.type == "keypress")) {
			contenteditable_undo_save();
		}
		contenteditable_event_enter_fix(my_event);
		if (webeditor.onCtrlEnter && my_event.ctrlKey) {
			if (webeditor.onCtrlEnter.toLowerCase() == "<p>") {
				contenteditable_event_enter_p(my_event);
			} else {
				if (my_event.type == "keydown") {
					contenteditable_event_stop(my_event);
					contenteditable_pasteContent(webeditor.onCtrlEnter);
				} else {
					contenteditable_event_stop(my_event);
				}
			}
		} else if (webeditor.onShiftEnter && my_event.shiftKey) {
			if (webeditor.onShiftEnter.toLowerCase() == "<p>") {
				contenteditable_event_enter_p(my_event);
			} else {
				if (my_event.type == "keydown") {
					contenteditable_event_stop(my_event);
					contenteditable_pasteContent(webeditor.onShiftEnter);
				} else {
					contenteditable_event_stop(my_event);
				}
			}
		} else if (webeditor.onAltEnter && my_event.altKey) {
			if (webeditor.onAltEnter.toLowerCase() == "<p>") {
				contenteditable_event_enter_p(my_event);
			} else {
				if (my_event.type == "keydown") {
					contenteditable_event_stop(my_event);
					contenteditable_pasteContent(webeditor.onAltEnter);
				} else {
					contenteditable_event_stop(my_event);
				}
			}
		} else if (webeditor.onEnter && contenteditable_selection_container('li')) {
			// default browser action
		} else if (webeditor.onEnter) {
			if (webeditor.onEnter.toLowerCase() == "<p>") {
				contenteditable_event_enter_p(my_event);
			} else {
				if (my_event.type == "keydown") {
					contenteditable_event_stop(my_event);
					contenteditable_pasteContent(webeditor.onEnter);
				} else {
					contenteditable_event_stop(my_event);
				}
			}
		}
	} else if (my_event && my_event[webeditor_keyCode_command] && (my_event.type == "keydown") && (my_event.keyCode == webeditor_keyCode_undo)) {
		if (webeditor.undo != false) {
			contenteditable_event_stop(my_event);
			contenteditable_undo();
		}
	} else if (my_event && my_event[webeditor_keyCode_command] && (my_event.type == "keydown") && (my_event.keyCode == webeditor_keyCode_redo)) {
		if (webeditor.undo != false) {
			contenteditable_event_stop(my_event);
			contenteditable_redo();
		}
	} else if (my_event && (my_event.type == "keydown")) {
		if (! webeditor.undoSaveBeforeUndo) {
			contenteditable_undo_save();
			webeditor.undoSaveBeforeUndo = true;
		}
	} else if (my_event && (my_event.type == "mouseup")) {
		// detect mouse drag & drop
		//if (! webeditor.undoSaveBeforeUndo) {
		//	contenteditable_undo_save();
		//	webeditor.undoSaveBeforeUndo = true;
		//}
	} else {
		//if (my_event && my_event[webeditor_keyCode_command] && (my_event.type == "keydown") && (my_event.keyCode != 17)) alert(my_event.keyCode);
	}
}

function contenteditable_positionable() {
	var element = contenteditable_selection_container();
	while (element && (element.tagName != "IMG") && (element.tagName != "TABLE") && (element.tagName != "P") && (element.tagName != "DIV") && (element.tagName != "INPUT") && (element.tagName != "SELECT") && (element.tagName != "TEXTAREA") && (element.tagName != "IFRAME") && (element.tagName != "MARQUEE") && (element.tagName != "HR") && (element.tagName != "OBJECT")) {
		element = element.parentNode;
	}
	return element;
}

function contenteditable_positionable_front_max() {
	var content = contenteditable_focused_document().body;
	var tag = content;
	var zIndex = 0;
	while (tag = contenteditable_nextnode(content, tag)) {
		if (tag.style && (tag.style.position || tag.style.zIndex)) {
			var this_zIndex = parseInt(tag.style.zIndex) || parseInt("0" + tag.style.zIndex);
			if (this_zIndex > zIndex) zIndex = this_zIndex;
		}
	}
	return zIndex;
}

function contenteditable_positionable_back_min() {
	var content = contenteditable_focused_document().body;
	var tag = content;
	var zIndex = contenteditable_positionable_front_max();
	while (tag = contenteditable_nextnode(content, tag)) {
		if (tag.style && (tag.style.position || tag.style.zIndex)) {
			var this_zIndex = parseInt(tag.style.zIndex) || parseInt("0" + tag.style.zIndex);
			if (this_zIndex < zIndex) zIndex = this_zIndex;
		}
	}
	return zIndex;
}

function contenteditable_removeformat() {
	var content = contenteditable_getContentSelection();
	content = cleanContentSub(content, webeditor.removeformatAllHTML, webeditor.removeformatAllXML, webeditor.removeformatAllNamespace, webeditor.removeformatAllLang, webeditor.removeformatAllClass, webeditor.removeformatAllStyle, webeditor.removeformatEmptySpan, webeditor.removeformatAllSpan, webeditor.removeformatEmptyFont, webeditor.removeformatAllFont, webeditor.removeformatAllDelIns, webeditor.removeformatEmptyPDiv, webeditor.removeformatAllFormatTags, webeditor.removeformatAllMsoClass, webeditor.removeformatAllMsoStyle, webeditor.removeformatAllMsoConditional, webeditor.removeformatEmptyStyle);
	contenteditable_event_paste_do_pre();
	contenteditable_pasteContent(content);
	contenteditable_event_paste_do_post();
	contenteditable_event_paste_fix();
}

function contenteditable_preview(id) {
	var iframe;
	if (id) {
		iframe = contenteditable_iframe(id);
	} else {
		iframe = contenteditable_focused_iframe();
	}
	var preview_window = window.open("", "preview_window", "width=850,height=600,resizable=yes,status=yes,titlebar=yes,scrollbars=yes,menubar=no,location=no,toolbar=no", true);
	if (webeditor.preview_window) preview_window.focus();
	var content = contenteditable_getContentBodyNode().innerHTML;
	if (webeditor.formatcontent) content = contenteditable_formatContent(contenteditable_getContentBodyNode());
	if (webeditor.autoclean) content = cleanContentSub(content, webeditor.autocleanAllHTML, webeditor.autocleanAllXML, webeditor.autocleanAllNamespace, webeditor.autocleanAllLang, webeditor.autocleanAllClass, webeditor.autocleanAllStyle, webeditor.autocleanEmptySpan, webeditor.autocleanAllSpan, webeditor.autocleanEmptyFont, webeditor.autocleanAllFont, webeditor.autocleanAllDelIns, webeditor.autocleanEmptyPDiv, webeditor.autocleanAllFormatTags, webeditor.autocleanAllMsoClass, webeditor.autocleanAllMsoStyle, webeditor.autocleanAllMsoConditional, webeditor.autocleanEmptyStyle);
	content = contenteditable_decodeScriptTags(content);
	try {
		if (webeditor_custom_decode) content = webeditor_custom_decode(content);
	} catch(e) {
	}
	try {
		if (webeditor_custom_finalize) content = webeditor_custom_finalize(content);
	} catch(e) {
	}
	content = contenteditable_merge_content(iframe.id, content);

	var contenthead = contenteditable_content_has_head(content);
	var contentbody = contenteditable_content_has_body(content);
	var contentcontent = contenteditable_content_has_content(content);

	// Netscape may not permit writing to the preview window
	// Safari may not display content correctly if written directly to the preview window
	if (typeof(contenteditable_preview_fix) == "function") {
		contenteditable_preview_fix(preview_window, contenthead, contentbody, contentcontent);
		return;
	}

	if (contenthead) {
		preview_window.document.write(contenthead);
	} else {
		if (webeditor.format == "xhtml") {
			preview_window.document.writeln('<?xml version="1.0" encoding="' + webeditor.encoding + '" ?>');
			preview_window.document.writeln('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">');
			preview_window.document.writeln('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">');
		} else {
			preview_window.document.writeln('<html>');
		}
		preview_window.document.writeln('<head>');
		preview_window.document.writeln('<title>'+Text('preview_title')+'</title>');
		if (webeditor.format == "xhtml") {
			if (webeditor.stylesheets[iframe.id]) {
				preview_window.document.writeln('<link rel="stylesheet" type="text/css" href="' + webeditor.stylesheets[iframe.id] + '" />');
			} else {
				preview_window.document.writeln('<link rel="stylesheet" type="text/css" href="' + webeditor.stylesheet + '" />');
			}
			preview_window.document.writeln('<base href="' + webeditor.baseHref + '" />');
		} else {
			if (webeditor.stylesheets[iframe.id]) {
				preview_window.document.writeln('<link rel="stylesheet" type="text/css" href="' + webeditor.stylesheets[iframe.id] + '">');
			} else {
				preview_window.document.writeln('<link rel="stylesheet" type="text/css" href="' + webeditor.stylesheet + '">');
			}
			preview_window.document.writeln('<base href="' + webeditor.baseHref + '">');
		}
		preview_window.document.writeln('</head>');
	}
	if (contentbody) {
		preview_window.document.write(contentbody);
	} else {
		if (webeditor.direction) {
			preview_window.document.write('<body style="margin: 0px;" dir="' + webeditor.direction + '">');
		} else {
			preview_window.document.write('<body style="margin: 0px;">');
		}
	}
	preview_window.document.writeln(contentcontent);
	preview_window.document.writeln('</body>');
	preview_window.document.writeln('</html>');
	preview_window.document.close();
}

function contenteditable_spellcheck() {
	var spellcheck_window;
	if ((typeof(spellcheck_window) == "undefined") || (webeditor.spellcheck_window == null) || spellcheck_window.closed) {
		var id = contenteditable_focused_iframe().id;
		if (webeditor.language) {
			spellcheck_window = window.open(webeditor.rootpath+"spellcheck."+webeditor.language+"?editor=webeditor&amp;id="+id, "spellcheck_window", "scrollbars=yes,width=500,height=350,resizable=yes,status=yes", true);
			if (webeditor.spellcheck_window) spellcheck_window.focus();
		} else {
//			spellcheck_window = window.open(webeditor.rootpath+"spellcheck.html?editor=webeditor&amp;id="+id, "spellcheck_window", "scrollbars=yes,width=500,height=350,resizable=yes,status=yes", true);
//			if (webeditor.spellcheck_window) spellcheck_window.focus();
		}
	}
}

function contenteditable_save() {
	contenteditable_onSubmit();
	var form = contenteditable_focused_iframe();
	while ((form = form.parentNode) && (form.nodeName != "FORM"));
	if (form) form.submit();
}

function contenteditable_remove_parentnode(node) {
	// MSIE DOM may be broken with lost childNodes
	var nodeCount = 0;
	for (var count_node=node.firstChild; count_node; count_node=count_node.nextSibling) {
		nodeCount++;
	}
	if (nodeCount == node.childNodes.length) {
		var parentnode = node.parentNode;
		var nextsibling =  node.nextSibling;
		if (parentnode) {
//			parentnode.removeChild(node);
//			for (var childnode=node.lastChild; childnode; childnode=childnode.previousSibling) {
//				var new_node = contenteditable_clonenode(childnode);
//				if (new_node && nextsibling && nextsibling.insertBefore) {
//					parentnode.insertBefore(new_node, nextsibling);
//					nextsibling = new_node;
//				} else {
//					parentnode.appendChild(new_node);
//					nextsibling = new_node;
//				}
//			}
			while (node.firstChild) {
				parentnode.insertBefore(node.firstChild, node);
			}
			parentnode.removeChild(node);
		}
	}
}

function contenteditable_clonenode(node) {
	var new_node = node.cloneNode(true);
	// MSIE may have broken/removed PARAM tags inside OBJECT tag when node was cloned
	if (node.outerHTML != new_node.outerHTML) {
		try {
			new_node.innerHTML = node.innerHTML;
		} catch(e) {
		}
		// MSIE may have broken/removed TR/TD/PARAM tags when node was copied
		if (node.outerHTML != new_node.outerHTML) {
			new_node = node.cloneNode(false);
			var nextsibling = false;
			for (var childnode=node.lastChild; childnode; childnode=childnode.previousSibling) {
				var new_childnode = contenteditable_clonenode(childnode);
				if (new_childnode && nextsibling && nextsibling.insertBefore) {
					new_node.insertBefore(new_childnode, nextsibling);
					nextsibling = new_childnode;
				} else {
					new_node.appendChild(new_childnode);
					nextsibling = new_childnode;
				}
			}
		}
	}
	return new_node;
}

function contenteditable_nobr() {
	var nobr = contenteditable_selection_container('nobr');
	if (nobr) {
		contenteditable_remove_parentnode(nobr);
	} else {
		var text = contenteditable_selection_text() || '&nbsp;';
		contenteditable_event_paste_do_pre();
		contenteditable_pasteContent('<nobr>' + text + '</nobr>');
		contenteditable_event_paste_do_post();
		contenteditable_event_paste_fix();
		contenteditable_nobr_fix();
	}
}

function contenteditable_printbreak() {
//	var nobr = contenteditable_selection_container('nobr');
//	if (nobr) {
//		contenteditable_remove_parentnode(nobr);
//	} else {
		var text = contenteditable_selection_text() || '&nbsp;';
		contenteditable_pasteContent('<div title="Print Page Break" style="page-break-before: always; background-color: #C0C0C0; vertical-align: middle; height: 1px; font-size: 1px;">' + text + '</div>');
//	}
}

function contenteditable_position_offsetTop(node) {
	//if (node.nodeName == "#text") node = node.parentNode;
	var top = node.offsetTop;
	while (node = node.offsetParent) {
		top += parseInt(node.offsetTop);
	}
	return top;
}

function contenteditable_position_offsetLeft(node) {
	var left = node.offsetLeft;
	while (node = node.offsetParent) {
		left += parseInt(node.offsetLeft);
	}
	return left;
}

function contenteditable_focused_getContent() {
	var iframe = document.getElementsByTagName('iframe').item(contenteditable_focused);
	if (iframe && iframe.contentWindow) {
		return iframe.contentWindow.document.body.innerHTML;
	}
}

function contenteditable_focused_setContent(content) {
	var iframe = document.getElementsByTagName('iframe').item(contenteditable_focused);
	if (iframe && iframe.contentWindow) {
		iframe.contentWindow.document.body.innerHTML = content;
	}
}

function contenteditable_undo_init() {
	if (webeditor.undo == false) return;
	if (! webeditor.undo) contenteditable_undo_save();
}

function contenteditable_undo_save() {
	if (webeditor.undo == false) return;
	var content = contenteditable_focused_getContent();
	if (! webeditor.undo) {
		webeditor.undo = new Array();
		webeditor.undo.MAX = 25;
	}
	if (! webeditor.undo[contenteditable_focused]) {
		webeditor.undo[contenteditable_focused] = new Array();
		webeditor.undo[contenteditable_focused][0] = new Object();
		webeditor.undo[contenteditable_focused][0].content = content;
		webeditor.undo[contenteditable_focused][0].bookmark = contenteditable_selection_bookmark();
		webeditor.undo[contenteditable_focused].current = 0;
		webeditor.undo[contenteditable_focused].latest = webeditor.undo[contenteditable_focused].current;
	}
	if ((typeof(webeditor.undo[contenteditable_focused].current) != "undefined") && (content != webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current].content)) {
		if (! webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current+1]) {
			webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current+1] = new Object();
		}
		webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current+1].content = content;
		webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current+1].bookmark = contenteditable_selection_bookmark();
		webeditor.undo[contenteditable_focused].current++;
		webeditor.undo[contenteditable_focused].latest = webeditor.undo[contenteditable_focused].current;
	}
	if (webeditor.undo[contenteditable_focused].current == webeditor.undo.MAX) {
		for (var i=1; i<=webeditor.undo.MAX; i++) {
			webeditor.undo[contenteditable_focused][i-1].content = webeditor.undo[contenteditable_focused][i].content;
			webeditor.undo[contenteditable_focused][i-1].bookmark = webeditor.undo[contenteditable_focused][i].bookmark;
		}
		webeditor.undo[contenteditable_focused].current = webeditor.undo.MAX-1;
		webeditor.undo[contenteditable_focused].latest = webeditor.undo[contenteditable_focused].current;
	}
}

function contenteditable_undo() {
	if (webeditor.undo == false) return;
	if (webeditor.undoSaveBeforeUndo) {
		contenteditable_undo_save();
		webeditor.undoSaveBeforeUndo = false;
	}
	if (webeditor.undo && webeditor.undo[contenteditable_focused]) {
		if (webeditor.undo[contenteditable_focused].current) webeditor.undo[contenteditable_focused].current--;
		contenteditable_event_paste_do_pre();
		contenteditable_focused_setContent(webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current].content);
		contenteditable_event_paste_do_post();
		contenteditable_event_paste_fix();
		contenteditable_selection_bookmark(webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current].bookmark);
	}
}

function contenteditable_redo() {
	if (webeditor.undo == false) return;
	if (webeditor.undoSaveBeforeUndo) {
		contenteditable_undo_save();
		webeditor.undoSaveBeforeUndo = false;
	}
	if (webeditor.undo && webeditor.undo[contenteditable_focused]) {
		if (webeditor.undo[contenteditable_focused].current < webeditor.undo[contenteditable_focused].latest) webeditor.undo[contenteditable_focused].current++;
		contenteditable_event_paste_do_pre();
		contenteditable_focused_setContent(webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current].content);
		contenteditable_event_paste_do_post();
		contenteditable_event_paste_fix();
		contenteditable_selection_bookmark(webeditor.undo[contenteditable_focused][webeditor.undo[contenteditable_focused].current].bookmark);
	}
}

function contenteditable_formatContent(rootnode) {
	var content = '';
	if (webeditor.format == "html") {
		content = '';
		for (var childnode = rootnode.firstChild; childnode; childnode=childnode.nextSibling) {
			content += contenteditable_formatContentNodeHTML(childnode, rootnode);
		}
	} else if (webeditor.format) { // webeditor.format == "xhtml"
		content = '';
		for (var childnode = rootnode.firstChild; childnode; childnode=childnode.nextSibling) {
			content += contenteditable_formatContentNodeXHTML(childnode, rootnode);
		}
	} else if (rootnode) {
		content = rootnode.innerHTML;
		if (webeditor.forceParamPlay != "") {
			content = content.replace(/<PARAM[ \r\n]+NAME="Play"[ \r\n]+VALUE="0"[ \r\n]*>/i, '<PARAM NAME="Play" VALUE="' + webeditor.forceParamPlay + '">');
		}
		// OBJECTs may have been resized - resize their EMBEDs too
		if (content.match(new RegExp("<OBJECT", "i"))) {
			var objects = content.split(/<OBJECT/i);
			if (objects.length) {
				if (objects.length == 1) {
					objects[1] = objects[0];
					objects[0] = '';
				}
				content = objects[0];
				for (var i=1; i<objects.length; i++) {
					var objectparts = objects[i].split(/<\/OBJECT>/i);
					if (objectparts.length) {
						if (objectparts.length == 1) {
							objectparts[1] = '';
						}
						var embed = objectparts[0].split(/<EMBED/i);
						if (embed.length) {
							if (embed.length == 1) {
								embed[1] = embed[0];
								embed[0] = '';
							}
							var embedparts = embed[1].split(/<\/EMBED>/i);
							if (embedparts.length) {
								if (embedparts.length == 1) {
									embedparts[1] = '';
								}
								var width = objectparts[0].match(new RegExp("[ \\r\\n]width=([^ \\r\\n]*)"));
								if (width && (width.length > 1)) {
									embedparts[0] = embedparts[0].replace(/[ \r\n]width=[^ \r\n]*/i, ' width='+ width[1]);
								}
								var height = objectparts[0].match(new RegExp("[ \\r\\n]height=([^ \\r\\n]*)"));
								if (height && (height.length > 1)) {
									embedparts[0] = embedparts[0].replace(/[ \r\n]height=[^ \r\n]*/i, ' height='+ height[1]);
								}
								content += "<OBJECT" + embed[0] + "<EMBED" + embedparts[0] + "</EMBED>" + embedparts[1] + "</OBJECT>" + objectparts[1];
							} else {
								content += "<OBJECT" + embed[0] + "<EMBED" + embed[1] + "</OBJECT>" + objectparts[1];
							}
						} else {
							content += "<OBJECT" + objectparts[0] + "</OBJECT>" + objectparts[1];
						}
					} else {
						content += "<OBJECT" + object[i];
					}
				}
			}
		}
	}
	content = content.replace(/<([a-zA-Z][a-zA-Z0-9]*)[ \t\r\n]+>/g, "<$1>");
	content = content.replace(/\r\n(\r\n)+/g, "\r\n");
	content = content.replace(/\r(\r)+/g, "\r\n");
	content = content.replace(/\n(\n)+/g, "\r\n");
	if (webeditor.shortenNearlyEmptyContent) {
		content = content.replace(/^[\r\n]+/gi, "");
		content = content.replace(/[\r\n]+$/gi, "");
		if (content == "<br>") content = "";
		if (content == "<br />") content = "";
		if (content == "<p>") content = "";
		if (content == "<p />") content = "";
		if (content == "<p>&nbsp;</p>") content = "";
	}
	content = contenteditable_formatContent_fix(content);
	return content;
}

function contenteditable_formatContentNodeHTML(node, rootnode) {
	var content = '';
	if (node.tagName) {
		if ((node.firstChild) || (node.tagName.match(new RegExp("^(TEXTAREA|TABLE|THEAD|TBODY|TFOOT|TR|TD|DIR|MENU|DL|OL|UL|FORM|SELECT|H1|H2|H3|H4|H5|H6|A|OBJECT|EMBED|NOEMBED|MAP|IFRAME|DIV)$")))) {
			if (typeof(webeditor.strip[node.tagName]) == "undefined") {
				content += '<' + node.tagName.toLowerCase() + contenteditable_formatContentNodeAttributes(node) + '>';
				if (node.tagName.match(new RegExp("^(TABLE|THEAD|TBODY|TFOOT|TR|DIR|MENU|DL|OL|UL|FORM|SELECT|OBJECT|EMBED|NOEMBED)$"))) {
					if ((! node.nextSibling) || (node.nextSibling.nodeName != "#text") || ((node.nextSibling.nodeValue[0] != "\r") && (node.nextSibling.nodeValue[0] != "\n"))) {
						content += '\r\n';
					}
				}
			}
			if (! webeditor.strip[node.tagName]) {
				// MSIE may ignore EMBED tags inside OBJECT tags
				var content_fix = contenteditable_formatContentNodeHTML_fix(node);
				var childnode = node;
				for (var childnode = node.firstChild; childnode; childnode=childnode.nextSibling) {
					// MSIE may ignore EMBED tags inside OBJECT tags
					if (childnode.nodeName == "EMBED") content_fix = "";
					content += contenteditable_formatContentNodeHTML(childnode, rootnode);
				}
				content += content_fix;
			}
			if (typeof(webeditor.strip[node.tagName]) == "undefined") {
				content += '</' + node.tagName.toLowerCase() + '>';
				if (node.tagName.match(new RegExp("^(TABLE|THEAD|TBODY|TFOOT|TR|DIR|MENU|DL|OL|UL|FORM|OPTION|TD|P|DIV|LI|DD|DT|H1|H2|H3|H4|H5|H6|IFRAME|OBJECT|EMBED|NOEMBED|MAP|IFRAME)$"))) {
					if ((! node.nextSibling) || (node.nextSibling.nodeName != "#text") || ((node.nextSibling.nodeValue[0] != "\r") && (node.nextSibling.nodeValue[0] != "\n"))) {
						content += '\r\n';
					}
				}
			}
		} else {
			if (typeof(webeditor.strip[node.tagName]) == "undefined") {
				content += '<' + node.tagName.toLowerCase() + contenteditable_formatContentNodeAttributes(node) + '>';
				if (node.tagName.match(new RegExp("^(P|BR|HR|LI|DD|DT)$"))) {
					if ((! node.nextSibling) || (node.nextSibling.nodeName != "#text") || ((node.nextSibling.nodeValue[0] != "\r") && (node.nextSibling.nodeValue[0] != "\n"))) {
						content += '\r\n';
					}
				}
			}
		}
	} else if (node.nodeValue) {
		var value = node.nodeValue;
		if (value.match(new RegExp("^<script", "i")) && value.match(new RegExp("</script>", "i"))) {
			// ok - script
		} else if (value.match(new RegExp("^<!--")) && value.match(new RegExp("-->"))) {
			// ok - comment
		} else {
			while (value.match(new RegExp("([^-a-zA-Z0-9\\t\\n\\r !#$%&'()*+,./:;=?@\\[\\\\\\]^_`{|}~])"))) {
				value = value.replace(RegExp.$1, contenteditable_formatContentEscape(RegExp.$1));
			}
			if (webeditor.nbsp2blank) value = value.replace(/&nbsp;/g," ");
			value = value.replace(/(&(?![#a-zA-Z0-9]+;))/gi, "&amp;");
		}
		content += value;
	}
	return content;
}

function contenteditable_formatContentNodeXHTML(node, rootnode) {
	var content = '';
	if (node.tagName) {
		if ((node.firstChild) || (node.tagName.match(new RegExp("^(TEXTAREA|TABLE|THEAD|TBODY|TFOOT|TR|TD|DIR|MENU|DL|OL|UL|FORM|SELECT|H1|H2|H3|H4|H5|H6|A|OBJECT|EMBED|NOEMBED|MAP|IFRAME|DIV)$")))) {
			if (typeof(webeditor.strip[node.tagName]) == "undefined") {
				content += '<' + node.tagName.toLowerCase() + contenteditable_formatContentNodeAttributes(node) + '>';
				if (node.tagName.match(new RegExp("^(TABLE|THEAD|TBODY|TFOOT|TR|DIR|MENU|DL|OL|UL|FORM|SELECT|OBJECT|EMBED|NOEMBED)$"))) {
					if ((! node.nextSibling) || (node.nextSibling.nodeName != "#text") || ((node.nextSibling.nodeValue[0] != "\r") && (node.nextSibling.nodeValue[0] != "\n"))) {
						content += '\r\n';
					}
				}
			}
			if (! webeditor.strip[node.tagName]) {
				// MSIE may ignore EMBED tags inside OBJECT tags
				var content_fix = contenteditable_formatContentNodeXHTML_fix(node);
				var childnode = node;
				for (var childnode = node.firstChild; childnode; childnode=childnode.nextSibling) {
					// MSIE may ignore EMBED tags inside OBJECT tags
					if (childnode.nodeName == "EMBED") content_fix = "";
					content += contenteditable_formatContentNodeXHTML(childnode, rootnode);
				}
				content += content_fix;
			}
			if (typeof(webeditor.strip[node.tagName]) == "undefined") {
				content += '</' + node.tagName.toLowerCase() + '>';
				if (node.tagName.match(new RegExp("^(TABLE|THEAD|TBODY|TFOOT|TR|DIR|MENU|DL|OL|UL|FORM|OPTION|TD|P|DIV|LI|DD|DT|H1|H2|H3|H4|H5|H6|IFRAME|OBJECT|EMBED|NOEMBED|MAP|IFRAME)$"))) {
					if ((! node.nextSibling) || (node.nextSibling.nodeName != "#text") || ((node.nextSibling.nodeValue[0] != "\r") && (node.nextSibling.nodeValue[0] != "\n"))) {
						content += '\r\n';
					}
				}
			}
		} else {
			if (typeof(webeditor.strip[node.tagName]) == "undefined") {
				// MSIE may not handle custom start/end tags and child nodes
				if (node.tagName.charAt(0) == "/") {
					// MSIE: "/foo" custom end tag tagName = custom end tag
					content += '<' + node.tagName.toLowerCase() + contenteditable_formatContentNodeAttributes(node) + '>';
				} else {
					// MSIE: check for "/foo" custom end tag tagNames
					var endtags = rootnode.getElementsByTagName("/"+node.tagName);
					if (endtags.length) {
						// MSIE: "/foo" custom end tag tagNames = custom start tag
						content += '<' + node.tagName.toLowerCase() + contenteditable_formatContentNodeAttributes(node) + '>';
					} else {
						// empty tag
						content += '<' + node.tagName.toLowerCase() + contenteditable_formatContentNodeAttributes(node) + ' />';
					}
				}
				if (node.tagName.match(new RegExp("^(P|BR|HR|LI|DD|DT)$"))) {
					if ((! node.nextSibling) || (node.nextSibling.nodeName != "#text") || ((node.nextSibling.nodeValue[0] != "\r") && (node.nextSibling.nodeValue[0] != "\n"))) {
						content += '\r\n';
					}
				}
			}
		}
	} else if (node.nodeValue) {
		var value = node.nodeValue;
		if (value.match(new RegExp("^<script", "i")) && value.match(new RegExp("</script>", "i"))) {
			// ok - script
		} else if (value.match(new RegExp("^<!--")) && value.match(new RegExp("-->"))) {
			// ok - comment
		} else {
			while (value.match(new RegExp("([^-a-zA-Z0-9\\t\\n\\r !#$%&'()*+,./:;=?@\\[\\\\\\]^_`{|}~])"))) {
				value = value.replace(RegExp.$1, contenteditable_formatContentEscape(RegExp.$1));
			}
			value = value.replace(/(&(?![#a-zA-Z0-9]+;))/gi, "&amp;");
		}
		content += value;
	}
	return content;
}

function contenteditable_formatContentNodeAttributes(node) {
	var attributes = "";
	if (node && node.attributes) {
		for (var attribute=0; attribute<node.attributes.length; attribute++) {
			if (node.attributes[attribute].specified || (node.tagName == "AREA") || (node.tagName == "INPUT")) {
				if ((typeof(webeditor.strip[node.nodeName+"."+node.attributes[attribute].name]) != "undefined") || (typeof(webeditor.strip["."+node.attributes[attribute].name]) != "undefined")) {
					// ignore attribute
				} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].name) && (node.attributes[attribute].name == 'class') && ((contenteditable_getAttribute(node, node.attributes[attribute].name) == 'Apple-style-span') || (contenteditable_getAttribute(node, node.attributes[attribute].name) == 'khtml-block-placeholder') || (contenteditable_getAttribute(node, node.attributes[attribute].name) == 'webkit-block-placeholder'))) {
					// ignore Safari special attributes
				} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].nodeName) && (node.attributes[attribute].nodeName == 'class') && ((contenteditable_getAttribute(node, node.attributes[attribute].nodeName) == 'Apple-style-span') || (contenteditable_getAttribute(node, node.attributes[attribute].nodeName) == 'khtml-block-placeholder'))) {
					// ignore Safari special attributes
				} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].name) && (node.attributes[attribute].name == 'type') && (contenteditable_getAttribute(node, node.attributes[attribute].name) == '_moz')) {
					// ignore Safari special attributes
				} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].nodeName) && (node.attributes[attribute].nodeName == 'type') && (contenteditable_getAttribute(node, node.attributes[attribute].nodeName) == '_moz')) {
					// ignore Safari special attributes
				} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].name) && (node.attributes[attribute].name.substr(0,4) == "_moz")) {
					// ignore Mozilla special attributes
				} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].nodeName) && (node.attributes[attribute].nodeName.substr(0,4) == "_moz")) {
					// ignore Mozilla special attributes
				// MSIE may not set "specified" for input value and area coords and shape - always output these
				} else if ((node.attributes[attribute].name) && (node.attributes[attribute].specified || ((node.tagName == "AREA") && ((node.attributes[attribute].name == "coords") || (node.attributes[attribute].name == "shape"))) || ((node.tagName == "INPUT") && (node.attributes[attribute].name == "value")))) {
					if ((webeditor.forceParamPlay != "") && (node.tagName.toLowerCase() == "param") && (node.name.toLowerCase() == "play") && (node.attributes[attribute].name.toLowerCase() == "value")) {
						attributes += ' ' + node.attributes[attribute].name + '="' + webeditor.forceParamPlay + '"';
					} else if (contenteditable_getAttribute(node, node.attributes[attribute].name)) {
						attributes += ' ' + node.attributes[attribute].name + '="' + contenteditable_getAttribute(node, node.attributes[attribute].name).replace(/</gi, "&lt;").replace(/>/gi, "&gt;").replace(/"/gi, "&quot;") + '"';
					} else if ((node.attributes[attribute].name == "checked") || (node.attributes[attribute].name == "compact") || (node.attributes[attribute].name == "declare") || (node.attributes[attribute].name == "defer") || (node.attributes[attribute].name == "disabled") || (node.attributes[attribute].name == "ismap") || (node.attributes[attribute].name == "multiple") || (node.attributes[attribute].name == "noresize") || (node.attributes[attribute].name == "noshade") || (node.attributes[attribute].name == "nowrap") || (node.attributes[attribute].name == "readonly") || (node.attributes[attribute].name == "selected")) {
						attributes += ' ' + node.attributes[attribute].name + '="' + node.attributes[attribute].name + '"';
					} else {
						attributes += ' ' + node.attributes[attribute].name + '=""';
					}
				} else if ((node.attributes[attribute].specified) && (node.attributes[attribute].nodeName)) {
					if ((webeditor.forceParamPlay != "") && (node.tagName.toLowerCase() == "param") && (node.name.toLowerCase() == "play") && (node.attributes[attribute].nodeName.toLowerCase() == "value")) {
						attributes += ' ' + node.attributes[attribute].nodeName + '="' + webeditor.forceParamPlay + '"';
					} else if (contenteditable_getAttribute(node, node.attributes[attribute].nodeName)) {
						attributes += ' ' + node.attributes[attribute].nodeName + '="' + contenteditable_getAttribute(node, node.attributes[attribute].nodeName).replace(/</gi, "&lt;").replace(/>/gi, "&gt;").replace(/"/gi, "&quot;") + '"';
					} else if ((node.attributes[attribute].nodeName == "checked") || (node.attributes[attribute].nodeName == "compact") || (node.attributes[attribute].nodeName == "declare") || (node.attributes[attribute].nodeName == "defer") || (node.attributes[attribute].nodeName == "disabled") || (node.attributes[attribute].nodeName == "ismap") || (node.attributes[attribute].nodeName == "multiple") || (node.attributes[attribute].nodeName == "noresize") || (node.attributes[attribute].nodeName == "noshade") || (node.attributes[attribute].nodeName == "nowrap") || (node.attributes[attribute].nodeName == "readonly") || (node.attributes[attribute].nodeName == "selected")) {
						attributes += ' ' + node.attributes[attribute].nodeName + '="' + node.attributes[attribute].nodeName + '"';
					} else {
						attributes += ' ' + node.attributes[attribute].nodeName + '=""';
					}
				}
			}
		}
	}
	return attributes;
}

function contenteditable_formatContentEscape(value) {
	switch(value.charCodeAt(0)) {

	case 34:	return '&quot;';
	case 38:	return '&amp;';
	case 39:	return '&apos;';
	case 60:	return '&lt;';
	case 62:	return '&gt;';

	case 160:	return '&nbsp;';
	case 161:	return '&iexcl;';
	case 162:	return '&cent;';
	case 163:	return '&pound;';
	case 164:	return '&curren;';
	case 165:	return '&yen;';
	case 166:	return '&brvbar;';
	case 167:	return '&sect;';
	case 168:	return '&uml;';
	case 169:	return '&copy;';
	case 170:	return '&ordf;';
	case 171:	return '&laquo;';
	case 172:	return '&not;';
	case 173:	return '&shy;';
	case 174:	return '&reg;';
	case 175:	return '&macr;';
	case 176:	return '&deg;';
	case 177:	return '&plusmn;';
	case 178:	return '&sup2;';
	case 179:	return '&sup3;';
	case 180:	return '&acute;';
	case 181:	return '&micro;';
	case 182:	return '&para;';
	case 183:	return '&middot;';
	case 184:	return '&cedil;';
	case 185:	return '&supl;';
	case 186:	return '&ordm;';
	case 187:	return '&raquo;';
	case 188:	return '&frac14;';
	case 189:	return '&frac12;';
	case 190:	return '&frac34;';
	case 191:	return '&iquest;';
	case 192:	return '&Agrave;';
	case 193:	return '&Aacute;';
	case 194:	return '&Acirc;';
	case 195:	return '&Atilde;';
	case 196:	return '&Auml;';
	case 197:	return '&Aring;';
	case 198:	return '&AElig;';
	case 199:	return '&Ccedil;';
	case 200:	return '&Egrave;';
	case 201:	return '&Eacute;';
	case 202:	return '&Ecirc;';
	case 203:	return '&Euml;';
	case 204:	return '&Igrave;';
	case 205:	return '&Iacute;';
	case 206:	return '&Icirc;';
	case 207:	return '&Iuml;';
	case 208:	return '&ETH;';
	case 209:	return '&Ntilde;';
	case 210:	return '&Ograve;';
	case 211:	return '&Oacute;';
	case 212:	return '&Ocirc;';
	case 213:	return '&Otilde;';
	case 214:	return '&Ouml;';
	case 215:	return '&times;';
	case 216:	return '&Oslash;';
	case 217:	return '&Ugrave;';
	case 218:	return '&Uacute;';
	case 219:	return '&Ucirc;';
	case 220:	return '&Uuml;';
	case 221:	return '&Yacute;';
	case 222:	return '&THORN;';
	case 223:	return '&szlig;';
	case 224:	return '&agrave;';
	case 225:	return '&aacute;';
	case 226:	return '&acirc;';
	case 227:	return '&atilde;';
	case 228:	return '&auml;';
	case 229:	return '&aring;';
	case 230:	return '&aelig;';
	case 231:	return '&ccedil;';
	case 232:	return '&egrave;';
	case 233:	return '&eacute;';
	case 234:	return '&ecirc;';
	case 235:	return '&euml;';
	case 236:	return '&igrave;';
	case 237:	return '&iacute;';
	case 238:	return '&icirc;';
	case 239:	return '&iuml;';
	case 240:	return '&eth;';
	case 241:	return '&ntilde;';
	case 242:	return '&ograve;';
	case 243:	return '&oacute;';
	case 244:	return '&ocirc;';
	case 245:	return '&otilde;';
	case 246:	return '&ouml;';
	case 247:	return '&divide;';
	case 248:	return '&oslash;';
	case 249:	return '&ugrave;';
	case 250:	return '&uacute;';
	case 251:	return '&ucirc;';
	case 252:	return '&uuml;';
	case 253:	return '&yacute;';
	case 254:	return '&thorn;';
	case 255:	return '&yuml;';

	case 338:	return '&OElig;';
	case 339:	return '&oelig;';
	case 352:	return '&Scaron;';
	case 353:	return '&scaron;';
	case 376:	return '&Yuml;';

	case 710:	return '&circ;';
	case 732:	return '&tilde;';

	case 8194:	return '&ensp;';
	case 8195:	return '&emsp;';
	case 8201:	return '&thinsp;';
	case 8204:	return '&zwnj;';
	case 8205:	return '&zwj;';
	case 8206:	return '&lrm;';
	case 8207:	return '&rlm;';
	case 8211:	return '&ndash;';
	case 8212:	return '&mdash;';
	case 8216:	return '&lsquo;';
	case 8217:	return '&rsquo;';
	case 8218:	return '&sbquo;';
	case 8220:	return '&ldquo;';
	case 8221:	return '&rdquo;';
	case 8222:	return '&bdquo;';
	case 8224:	return '&dagger;';
	case 8225:	return '&Dagger;';
	case 8240:	return '&permil;';
	case 8249:	return '&lsaquo;';
	case 8250:	return '&rsaquo;';
	case 8364:	return '&euro;';

	case 402:	return '&fnof;';

	case 913:	return '&Alpha;';
	case 914:	return '&Beta;';
	case 915:	return '&Gamma;';
	case 916:	return '&Delta;';
	case 917:	return '&Epsilon;';
	case 918:	return '&Zeta;';
	case 919:	return '&Eta;';
	case 920:	return '&Theta;';
	case 921:	return '&Iota;';
	case 922:	return '&Kappa;';
	case 923:	return '&Lambda;';
	case 924:	return '&Mu;';
	case 925:	return '&Nu;';
	case 926:	return '&Xi;';
	case 927:	return '&Omicron;';
	case 928:	return '&Pi;';
	case 929:	return '&Rho;';
	case 931:	return '&Sigma;';
	case 932:	return '&Tau;';
	case 933:	return '&Upsilon;';
	case 934:	return '&Phi;';
	case 935:	return '&Chi;';
	case 936:	return '&Psi;';
	case 937:	return '&Omega;';
	case 945:	return '&alpha;';
	case 946:	return '&beta;';
	case 947:	return '&gamma;';
	case 948:	return '&delta;';
	case 949:	return '&epsilon;';
	case 950:	return '&zeta;';
	case 951:	return '&eta;';
	case 952:	return '&theta;';
	case 953:	return '&iota;';
	case 954:	return '&kappa;';
	case 955:	return '&lambda;';
	case 956:	return '&mu;';
	case 957:	return '&nu;';
	case 958:	return '&xi;';
	case 959:	return '&omicron;';
	case 960:	return '&pi;';
	case 961:	return '&rho;';
	case 962:	return '&sigmaf;';
	case 963:	return '&sigma;';
	case 964:	return '&tau;';
	case 965:	return '&upsilon;';
	case 966:	return '&phi;';
	case 967:	return '&chi;';
	case 968:	return '&psi;';
	case 969:	return '&omega;';
	case 977:	return '&thetasym;';
	case 978:	return '&upsih;';
	case 982:	return '&piv;';

	case 8226:	return '&bull;';
	case 8230:	return '&hellip;';
	case 8242:	return '&prime;';
	case 8243:	return '&Prime;';
	case 8254:	return '&oline;';
	case 8260:	return '&frasl;';

	case 8472:	return '&weierp;';
	case 8465:	return '&image;';
	case 8476:	return '&real;';
	case 8482:	return '&trade;';
	case 8501:	return '&alefsym;';

	case 8592:	return '&larr;';
	case 8593:	return '&uarr;';
	case 8594:	return '&rarr;';
	case 8595:	return '&darr;';
	case 8596:	return '&harr;';
	case 8629:	return '&crarr;';
	case 8656:	return '&lArr;';
	case 8657:	return '&uArr;';
	case 8658:	return '&rArr;';
	case 8659:	return '&dArr;';
	case 8660:	return '&hArr;';

	case 8704:	return '&forall;';
	case 8706:	return '&part;';
	case 8707:	return '&exist;';
	case 8709:	return '&empty;';
	case 8711:	return '&nabla;';
	case 8712:	return '&isin;';
	case 8713:	return '&notin;';
	case 8715:	return '&ni;';
	case 8719:	return '&prod;';
	case 8721:	return '&sum;';
	case 8722:	return '&minus;';
	case 8727:	return '&lowast;';
	case 8730:	return '&radic;';
	case 8733:	return '&prop;';
	case 8734:	return '&infin;';
	case 8736:	return '&ang;';
	case 8743:	return '&and;';
	case 8744:	return '&or;';
	case 8745:	return '&cap;';
	case 8746:	return '&cup;';
	case 8747:	return '&int;';
	case 8756:	return '&there4;';
	case 8764:	return '&sim;';
	case 8773:	return '&cong;';
	case 8776:	return '&asymp;';
	case 8800:	return '&ne;';
	case 8801:	return '&equiv;';
	case 8804:	return '&le;';
	case 8805:	return '&ge;';
	case 8834:	return '&sub;';
	case 8835:	return '&sup;';
	case 8836:	return '&nsub;';
	case 8838:	return '&sube;';
	case 8839:	return '&supe;';
	case 8853:	return '&oplus;';
	case 8855:	return '&otimes;';
	case 8869:	return '&perp;';
	case 8901:	return '&sdot;';

	case 8968:	return '&lceil;';
	case 8969:	return '&rceil;';
	case 8970:	return '&lfloor;';
	case 8971:	return '&rfloor;';
	case 9001:	return '&lang;';
	case 9002:	return '&rang;';

	case 9674:	return '&loz;';

	case 9824:	return '&spades;';
	case 9827:	return '&clubs;';
	case 9829:	return '&hearts;';
	case 9830:	return '&diams;';

	default:	return '&#' + value.charCodeAt(0) + ';';
	}
}

function contenteditable_encodeScriptTags(content) {
	RegExp.global = true;
	RegExp.multiline = true;

	content = '' + content;

	if (webeditor.strip["SCRIPT"]) {
		content = content.replace(/<script([^>]*)>.*?<\/script>/gi, '');
	} else if (typeof(webeditor.strip["SCRIPT"]) != "undefined") {
		content = content.replace(/<script([^>]*)>/gi, '');
		content = content.replace(/<\/script>/gi, '');
	}
	if (webeditor.strip["NOSCRIPT"]) {
		content = content.replace(/<noscript([^>]*)>.*?<\/noscript>/gi, '');
	} else if (typeof(webeditor.strip["NOSCRIPT"]) != "undefined") {
		content = content.replace(/<noscript([^>]*)>/gi, '');
		content = content.replace(/<\/noscript>/gi, '');
	}

	if (webeditor.encodeScriptTags) {
		startscript = content.indexOf('<script');
		if (startscript >= 0) {
			endscript = content.indexOf('<\/script>', startscript);
			if (endscript >= 0) {
				scriptcontent = content.substring(startscript,endscript+9);
				scriptcontent = scriptcontent.replace(/</gi, '&lt;');
				scriptcontent = scriptcontent.replace(/>/gi, '&gt;');
				content = content.substring(0,startscript) + scriptcontent + content.substring(endscript+9);
			}
		}

		content = content.replace(/<script([^>]*)>/gi, '&lt;script$1&gt;');
		content = content.replace(/<script/gi, '&lt;script');
		content = content.replace(/<\/script>/gi, '&lt;/script&gt;');

		content = content.replace(/<noscript/gi, '&lt;noscript');
		content = content.replace(/<\/noscript>/gi, '&lt;/noscript&gt;');
	}

	if (webeditor.encodeCommentTags) {
		content = content.replace(/<!--\[([^>]*)\]>/gi, '&lt;!--[$1]&gt;');
		content = content.replace(/<!\[([^>]*)\]-->/gi, '&lt;![$1]--&gt;');
		content = content.replace(/<!\[([^>]*)\]>/gi, '&lt;![$1]&gt;');
		content = content.replace(/<!--([^>]*)-->/gi, '&lt;!--$1--&gt;');
		content = content.replace(/<!--/gi, '&lt;!--');
		content = content.replace(/-->/gi, '--&gt;');
	}

	if (webeditor.encodePercentTags) {
		content = content.replace(/<%/gi, '&lt;%');
		content = content.replace(/%>/gi, '%&gt;');
	}

	if (webeditor.encodeQuestionTags) {
		content = content.replace(/<\?/gi, '&lt;?');
		content = content.replace(/\?>/gi, '\?&gt;');
	}

	if (webeditor.encodePhpTags) {
		content = content.replace(/<\?php/gi, '&lt;?php');
		content = content.replace(/\?>/gi, '\?&gt;');
	}

	return content;
}

function contenteditable_decodeScriptTags(content) {
	RegExp.global = true;
	RegExp.multiline = true;

	content = '' + content;

	if (webeditor.encodePhpTags) {
		content = content.replace(/&lt;\?php/gi, '<\?php');
		content = content.replace(/\?&gt;/gi, '\?>');
	}

	if (webeditor.encodeQuestionTags) {
		content = content.replace(/&lt;\?/gi, '<\?');
		content = content.replace(/\?&gt;/gi, '\?>');
	}

	if (webeditor.encodePercentTags) {
		content = content.replace(/&lt;%/gi, '<%');
		content = content.replace(/%&gt;/gi, '%>');
	}

	if (webeditor.encodeCommentTags) {
		content = content.replace(/&lt;!--\[([^&]*)\]&gt;/gi, '<!--[$1]>');
		content = content.replace(/&lt;!\[([^&]*)\]--&gt;/gi, '<![$1]-->');
		content = content.replace(/&lt;!\[([^&]*)\]&gt;/gi, '<![$1]>');
		content = content.replace(/&lt;!--([^&]*)--&gt;/gi, '<!--$1-->');
		content = content.replace(/&lt;!--([^>]*)--&gt;/gi, '<!--$1-->');
		content = content.replace(/&lt;!--/gi, '<!--');
		content = content.replace(/--&gt;/gi, '-->');
	}

	if (webeditor.encodeScriptTags) {
		while (content.match(new RegExp("&lt;script([^&]*)=&quot;([^&]*)&quot;", "gi"))) {
			content = content.replace(/&lt;script([^&]*)=&quot;([^&]*)&quot;/gi, '&lt;script$1="$2"');
		}
		content = content.replace(/&lt;script([^&]*)&gt;/gi, '<script$1>');
		content = content.replace(/&lt;script/gi, '<script');
		content = content.replace(/&lt;\/script&gt;/gi, '</script>');

		content = content.replace(/&lt;noscript/gi, '<noscript');
		content = content.replace(/&lt;\/noscript&gt;/gi, '</noscript>');
	}

	return content;
}

function contenteditable_content_has_head(content) {
	RegExp.global = false;
	RegExp.multiline = true;
//	if (content.match(new RegExp("^((.|\\r|\\n)+)<body[^>]*>(.|\\r|\\n)*</body>(.|\\r|\\n)+$", "i"))) {
	if ((content.indexOf("<body") > -1) && (content.indexOf("</body>") > -1)) {
//		return content.replace(/^((.|\r|\n)+)<body[^>]*>(.|\r|\n)*<\/body>(.|\r|\n)+$/i, "$1");
		return content.substring(0, content.indexOf("<body"));
	} else {
		return '';
	}
}

function contenteditable_content_has_body(content) {
	RegExp.global = false;
	RegExp.multiline = true;
//	if (content.match(new RegExp("^(.|\\r|\\n)*(<body[^>]*>)(.|\\r|\\n)*</body>(.|\\r|\\n)*$", "i"))) {
	if ((content.indexOf("<body") > -1) && (content.indexOf("</body>") > -1)) {
//		return content.replace(/^(.|\r|\n)*(<body[^>]*>)(.|\r|\n)*<\/body>(.|\r|\n)*$/i, "$2");
		return content.substring(content.indexOf("<body")).match(new RegExp("^(<body[^>]*>)", "i"))[1];
	} else {
		return '';
	}
}

function contenteditable_content_has_content(content) {
	RegExp.global = false;
	RegExp.multiline = true;
//	if (content.match(new RegExp("^(.|\\r|\\n)*<body[^>]*>((.|\\r|\\n)*)<\/body>(.|\\r|\\n)*$", "i"))) {
	if ((content.indexOf("<body") > -1) && (content.indexOf("</body>") > -1)) {
//		return content.replace(/^(.|\r|\n)*<body[^>]*>((.|\r|\n)*)<\/body>(.|\r|\n)*$/i, "$2");
		return content.substring(content.indexOf("<body"), content.indexOf("</body>")).match(new RegExp("^<body[^>]*>((.|\\r|\\n)*)", "i"))[1];
	} else {
		return content;
	}
}

function contenteditable_split_content(id, content) {
	if (! id) {
		var iframe = document.getElementsByTagName('iframe').item(contenteditable_focused);
		if (iframe && iframe.id) {
			id = iframe.id;
		}
	}
	if (id) {
		contenteditable_contents_head[id] = contenteditable_content_has_head(content);
		contenteditable_contents_body[id] = contenteditable_content_has_body(content);
	}
	return contenteditable_content_has_content(content);
}

function contenteditable_merge_content(id, content) {
	if (! webeditor.mergecontent) return content;
	if (! id) {
		var iframe = document.getElementsByTagName('iframe').item(contenteditable_focused);
		if (iframe && iframe.id) {
			id = iframe.id;
		}
	}
	if (id) {
		if (contenteditable_contents_body[id]) {
			content = contenteditable_contents_body[id] + content + "</body>";
		}
		if (contenteditable_contents_head[id]) {
			content = contenteditable_contents_head[id] + content + "</html>";
		}
	}
	return content;
}

function contenteditable_setBody(body, id) {
	if (! body) return;
	RegExp.global = false;
	RegExp.multiline = true;
	var attributes = contenteditable_contents_body[id].substring(6, contenteditable_contents_body[id].length-1);
	while (attributes) {
		var matches;
		if (matches = attributes.match(new RegExp("^(\\w+)=\"([^\"]*)\"\\s*(.*)", "i"))) {
			for (var i=0; i<body.attributes.length; i++) {
				if (body.attributes[i].name.toLowerCase() == matches[1]) {
					body.setAttribute(body.attributes[i].name, matches[2]);
				}
			}
			attributes = matches[3];
		} else if (matches = attributes.match(new RegExp("^(\\w+)=([^\\s])\\s*(.*)\"", "i"))) {
			for (var i=0; i<body.attributes.length; i++) {
				if (body.attributes[i].name.toLowerCase() == matches[1]) {
					body.setAttribute(body.attributes[i].name, matches[2]);
				}
			}
			attributes = matches[3];
		} else {
			attributes = false;
		}
	}
}

function contenteditable_paste_replacement_fix() {
	contenteditable_pasteContent('<div id="webeditor_clipboard">'+webeditor.clipboardHTML+'</div>');
	var webeditor_clipboard = webeditor.clipboardHTML.replace("[\r\n\t]"," ");
	var pasted = contenteditable_focused_document().getElementById("webeditor_clipboard");
	var copiedlinks = webeditor_clipboard.match(new RegExp("<a [^>]*>", "gi"));
	var pastedlinks = pasted.getElementsByTagName("A");
	if (copiedlinks && pastedlinks) {
		for (var i=0; (i<copiedlinks.length) && (i<pastedlinks.length); i++) {
			if (contenteditable_getAttribute(pastedlinks[i], "href") && contenteditable_getAttribute(copiedlinks[i], "href")) {
				contenteditable_setAttribute(pastedlinks[i], "href", contenteditable_getAttribute(copiedlinks[i], "href"));
			}
		}
	}
	var copiedimages = webeditor_clipboard.match(new RegExp("<img [^>]*>", "gi"));
	var pastedimages = pasted.getElementsByTagName("IMG");
	if (copiedimages && pastedimages) {
		for (var i=0; (i<copiedimages.length) && (i<pastedimages.length); i++) {
			if (contenteditable_getAttribute(pastedimages[i], "src") && contenteditable_getAttribute(copiedimages[i], "src")) {
				contenteditable_setAttribute(pastedimages[i], "src", contenteditable_getAttribute(copiedimages[i], "src"));
			}
		}
	}
	var copiedinputs = webeditor_clipboard.match(new RegExp("<input [^>]*>", "gi"));
	var pastedinputs = pasted.getElementsByTagName("INPUT");
	if (copiedinputs && pastedinputs) {
		for (var i=0; (i<copiedinputs.length) && (i<pastedinputs.length); i++) {
			if (contenteditable_getAttribute(pastedinputs[i], "src") && contenteditable_getAttribute(copiedinputs[i], "src")) {
				contenteditable_setAttribute(pastedinputs[i], "src", contenteditable_getAttribute(copiedinputs[i], "src"));
			}
		}
	}
	var copiedtables = webeditor_clipboard.match(new RegExp("<table [^>]*>", "gi"));
	var pastedtables = pasted.getElementsByTagName("TABLE");
	if (copiedtables && pastedtables) {
		for (var i=0; (i<copiedtables.length) && (i<pastedtables.length); i++) {
			if (contenteditable_getAttribute(pastedtables[i], "background") && contenteditable_getAttribute(copiedtables[i], "background")) {
				contenteditable_setAttribute(pastedtables[i], "background", contenteditable_getAttribute(copiedtables[i], "background"));
			}
		}
	}
	var copiedtablerows = webeditor_clipboard.match(new RegExp("<tr [^>]*>", "gi"));
	var pastedtablerows = pasted.getElementsByTagName("TR");
	if (copiedtablerows && pastedtablerows) {
		for (var i=0; (i<copiedtablerows.length) && (i<pastedtablerows.length); i++) {
			if (contenteditable_getAttribute(pastedtablerows[i], "background") && contenteditable_getAttribute(copiedtablerows[i], "background")) {
				contenteditable_setAttribute(pastedtablerows[i], "background", contenteditable_getAttribute(copiedtablerows[i], "background"));
			}
		}
	}
	var copiedtablecells = webeditor_clipboard.match(new RegExp("<td [^>]*>", "gi"));
	var pastedtablecells = pasted.getElementsByTagName("TR");
	if (copiedtablecells && pastedtablecells) {
		for (var i=0; (i<copiedtablecells.length) && (i<pastedtablecells.length); i++) {
			if (contenteditable_getAttribute(pastedtablecells[i], "background") && contenteditable_getAttribute(copiedtablecells[i], "background")) {
				contenteditable_setAttribute(pastedtablecells[i], "background", contenteditable_getAttribute(copiedtablecells[i], "background"));
			}
		}
	}
	var copiediframes = webeditor_clipboard.match(new RegExp("<iframe [^>]*>", "gi"));
	var pastediframes = pasted.getElementsByTagName("IFRAME");
	if (copiediframes && pastediframes) {
		for (var i=0; (i<copiediframes.length) && (i<pastediframes.length); i++) {
			if (contenteditable_getAttribute(pastediframes[i], "src") && contenteditable_getAttribute(copiediframes[i], "src")) {
				contenteditable_setAttribute(pastediframes[i], "src", contenteditable_getAttribute(copiediframes[i], "src"));
			}
		}
	}
	var copiedareas = webeditor_clipboard.match(new RegExp("<area [^>]*>", "gi"));
	var pastedareas = pasted.getElementsByTagName("AREA");
	if (copiedareas && pastedareas) {
		for (var i=0; (i<copiedareas.length) && (i<pastedareas.length); i++) {
			if (contenteditable_getAttribute(pastedareas[i], "href") && contenteditable_getAttribute(copiedareas[i], "href")) {
				contenteditable_setAttribute(pastedareas[i], "href", contenteditable_getAttribute(copiedareas[i], "href"));
			}
		}
	}
	contenteditable_remove_parentnode(pasted);
}

//function $(id) { return(document.getElementById(id)); }
//function $T(tagname,id) { return ((typeof(id)=='string' ? $(id) : (id ? id : document)).getElementsByTagName(tagname)); }
//function $D(msg,obj,dest) { var out=''+typeof(obj)+':::'+obj+':::'; for (var a in obj) { out += " "+a; }; $OUT(msg+out,dest); }
//function $DM(msg,obj,dest) { var out=''; for (var a in obj) if (typeof(obj[a])=='function') { out += " "+a; }; $OUT(msg+out,dest); }
//function $DA(msg,obj,dest) { var out=''; for (var a in obj) if (typeof(obj[a])!='function') { out += " "+a; }; $OUT(msg+out,dest); }
//function $DAV(msg,obj,dest) { var out=''; for (var a in obj) if (typeof(obj[a])!='function') { try { out += "     "+a+"="+obj[a]; } catch(e) { out += "     "+a+"=["+typeof(obj[a])+"]"; } }; $OUT(msg+out,dest); }
//function $DAVNN(msg,obj,dest) { var out=''; for (var a in obj) if ((typeof(obj[a])!='function') && (obj[a]!=null)) { try { out += "     "+a+"="+obj[a]; } catch(e) { out += "     "+a+"=["+typeof(obj[a])+"]"; } }; $OUT(msg+out,dest); }
//function $OUT(out,dest,append) { if (dest && (typeof(dest.value)!='undefined')) { if (append) { dest.value+=''+out; } else { dest.value=out; } } else if (dest && (typeof(dest.innerHTML)!='undefined')) { if (append) { dest.innerHTML+=''+out; } else { dest.innerHTML=out; } } else { alert(out); } }
