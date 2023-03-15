// Asbru Web Content Editor
// (C) 2002-2008 Asbru Ltd.
// www.asbrusoft.com

webeditor_keyCode_command = "metaKey";
webeditor_keyCode_backspace = 8;
webeditor_keyCode_enter = 13;
webeditor_keyCode_esc = 27;
webeditor_keyCode_pageup = 33;
webeditor_keyCode_pagedown = 34;
webeditor_keyCode_end = 35;
webeditor_keyCode_home = 36;
webeditor_keyCode_left = 37;
webeditor_keyCode_up = 38;
webeditor_keyCode_right = 39;
webeditor_keyCode_down = 40;
webeditor_keyCode_insert = 45;
webeditor_keyCode_delete = 46;
webeditor_keyCode_paste = 118;
webeditor_keyCode_a = 97;

webeditor.disable = new Array();
/*
webeditor.disable.formatblock = "DISABLED: MAY CRASH WEB BROWSER";
webeditor.disable.formatclass = "DISABLED: MAY CRASH WEB BROWSER";
webeditor.disable.insertmedia = "DISABLED: MAY CRASH WEB BROWSER";
webeditor.disable.createlink = "DISABLED: MAY CRASH WEB BROWSER";
webeditor.disable.nobr = "DISABLED: MAY CRASH WEB BROWSER";
*/

webeditor.confirm = new Array();
/*
webeditor.confirm.formatblock = "WARNING: MAY CRASH WEB BROWSER";
webeditor.confirm.formatclass = "WARNING: MAY CRASH WEB BROWSER";
webeditor.confirm.insertmedia = "WARNING: MAY CRASH WEB BROWSER";
webeditor.confirm.createlink = "WARNING: MAY CRASH WEB BROWSER";
webeditor.confirm.nobr = "WARNING: MAY CRASH WEB BROWSER";
*/

if (webeditor.majorVersion < 5) {
	webeditor.WYSIWYGselect = false;			// NOT WORKING: "unselectable" WYSIWYG dropdown options - content selection is lost
} else {
	webeditor.WYSIWYGselect = true;				// fixed in current versions - also working in some older version?
}

webeditor.fixLinkOnClick = true;				// fix when a link is clicked
webeditor.fixLinkOnClick_Alert = false;				// alert users when a link is clicked
webeditor.fixLinkOnClick_Alert_A = false;			// NOT WORKING ANYMORE: alert users when an A link is clicked
webeditor.fixLinkOnClick_Alert_AREA = false;			// alert users when an AREA is clicked
webeditor.fixLinkOnClick_Alert_INPUT_BUTTON = false;		// alert users when a BUTTON is clicked
webeditor.fixLinkOnClick_Alert_INPUT_SUBMIT = false;		// alert users when a SUBMIT is clicked
webeditor.fixLinkOnClick_Alert_Message = "WARNING: You have clicked on a link (or a form button).\r\n\r\nUnfortunately, links in editable content are \"active\" in the Safari web browser.\r\n\r\nYour web browser may now replace the web content editor input field with the \"clicked\" web page.\r\n\r\nTo stop this, press and hold down the ESC key before/while selecting OK below.\r\n\r\nTo avoid this problem, position the caret/cursor somewhere outside the link and use the arrow/cursor keys to move the caret/cursor to the link.\r\n\r\nHopefully, Apple's Safari programmers will fix this problem in the next version of the Safari web browser. (Techncally, by disabling links in editable content, or by adding support for Event.preventDefault() and Event.stopPropagation()).";
webeditor.fixLinkOnClick_Cancel = true;				// NOT WORKING: cancel event when a link is clicked
webeditor.fixLinkOnClick_Undo = false;				// NOT WORKING: save/restore content/URL when a link is clicked
webeditor.fixLinkOnClick_False_A_ONCLICK = true;		// add dummy "return false" attribute for all A tags
webeditor.fixLinkOnClick_False_AREA_HREF = true;		// add dummy "return false" attribute for all AREA tags
webeditor.fixLinkOnUnload = false;				// NOT WORKING: fix when content is unloaded
webeditor.fixLinkOnUnload_Alert = false;			// NOT WORKING: alert users when content is unloaded
webeditor.fixLinkOnUnload_Cancel = false;			// NOT WORKING: cancel event when content is unloaded
webeditor.fixExeccommandInserthorizontalrule_DOM = true;	// modify DOM instead of using execCommand
webeditor.fixExeccommandStrikethrough_DOM = true;		// modify DOM instead of using execCommand
webeditor.fixExeccommandInsertorderedlist_DOM = true;		// modify DOM instead of using execCommand
webeditor.fixExeccommandInsertunorderedlist_DOM = true;		// modify DOM instead of using execCommand
webeditor.fixExeccommandIndent_DOM = true;			// modify DOM instead of using execCommand
webeditor.fixExeccommandOutdent_DOM = true;			// modify DOM instead of using execCommand
webeditor.fixExeccommandUnlink_DOM = true;			// modify DOM instead of using execCommand
webeditor.fixExeccommandFormatblock_Paste = true;		// paste tag instead of using execCommand
webeditor.fixExeccommandFormatblock_Paste_DOM_fix = false;	// NOT FULLY WORKING: fix content after pasted tag/content
webeditor.fixExeccommandFind_Alert = true;
webeditor.fixExeccommandPaste_Alert = true;
webeditor.fixExeccommand_Paste_Fix = false;			// fix DOM after pasted tag/content
webeditor.fixExeccommandRemoveformat_Fix = false;		// fix DOM after execCommand removeformat
webeditor.fixExeccommand_DOM = false;				// fix DOM after execCommand
webeditor.fixInsertimage_DOM = false;				// ??? WORKING 10.3 - NOT WORKING 10.4: fix DOM after insertlink
webeditor.fixInsertlink_DOM = false;				// ??? WORKING 10.3 - NOT WORKING 10.4: fix DOM after insertlink
webeditor.fixFormatclass_DOM = false;				// pure DOM - no innerHTML
webeditor.fixFormatclass_Paste = false;				// paste tag/content instead of using modifying DOM
webeditor.fixFormatclass_Paste_DOM = false;			// NOT FULLY WORKING: fix DOM after formatclass
webeditor.fixFormatclass_ViewSource = false;			// NOT WORKING: switch to HTML mode after formatclass
webeditor.fixNobr_DOM = false;					// fix DOM after nobr
webeditor.fixBox_DOM = false;					// fix DOM after box
webeditor.fixMailto_DOM = false;				// fix DOM after mailto
webeditor.fixAnchor_DOM = false;				// fix DOM after box
webeditor.fixDOM_ResetInnerHTML = false;			// ??? WORKING 10.3 - NOT WORKING 10.4: reset innerHTML
webeditor.nbsp2blank = true;					// set to true to convert all &nbsp; to blanks



function webeditor_empty_content_fix(content) {
	if ((content == "<p>") || (content == "<p />")) content = "<p>&nbsp;</p>";
	return content;
}

function webeditor_supported(command) {
	if (webeditor.disable[command]) {
		alert(webeditor.disable[command]);
		return false;
	}
	if (webeditor.confirm[command]) {
		return confirm(webeditor.confirm[command]);
	}
	return true;
}

function webeditor_select_init(node) {
	node.ondeactivate = webeditor_select_deactivate;
	node.onblur = webeditor_select_blur;
	node.onfocus = webeditor_select_focus;
}

function webeditor_select_focus(evt) {
	if (evt && evt.target && evt.target.id) webeditor.select_focused[evt.target.id] = true;
	return true;
}

function contenteditable_onload(handler) {
	window.addEventListener("load", handler, true);
	WebEditorSkin();
}

function contenteditable_onload_remove(handler) {
	window.removeEventListener("load", handler, true);
}

function contenteditable_attach_event_handler(node, event, handler) {
	node.addEventListener(event, handler, true);
}

function contenteditable_detach_event_handler(node, event, handler) {
	node.removeEventListener(event, handler, true);
}

function contenteditable_false() {
	return false;
}

function contenteditable_onclick_handler(evt) {
	if (parent.webeditor.fixLinkOnClick_Undo) {
		parent.webeditor.SafariOnClickIframe = false;
	}
	if (evt.type == "click") {
		for (var node=evt.target; node && (node.nodeName != "BODY"); node = node.parentNode) {
			if ((node.nodeName == "A") || (node.nodeName == "AREA") || ((node.nodeName == "INPUT") && ((node.type.toUpperCase() == "BUTTON") || (node.type.toUpperCase() == "SUBMIT")))) {
				if (parent.webeditor.fixLinkOnClick_Undo) {
					parent.webeditor.SafariOnClickIframe = contenteditable_focused_iframe();
					parent.webeditor.SafariOnClickLocation = contenteditable_focused_iframe().document.location.href;
					parent.webeditor.SafariOnClickContent = WebEditorGetContent();
					setTimeout(contenteditable_onunload_handler, 1000);
				}
				if (parent.webeditor.fixLinkOnClick_Alert) {
					parent.webeditor.SafariOnClickContent = WebEditorGetContent();
					contenteditable_undo_save();
					alert(parent.webeditor.fixLinkOnClick_Alert_Message);
				}
				if ((node.nodeName == "A") && (parent.webeditor.fixLinkOnClick_Alert_A)) {
					parent.webeditor.SafariOnClickContent = WebEditorGetContent();
					contenteditable_undo_save();
					alert(parent.webeditor.fixLinkOnClick_Alert_Message);
				}
				if ((node.nodeName == "AREA") && (parent.webeditor.fixLinkOnClick_Alert_AREA)) {
					parent.webeditor.SafariOnClickContent = WebEditorGetContent();
					contenteditable_undo_save();
					alert(parent.webeditor.fixLinkOnClick_Alert_Message);
				}
				if ((node.nodeName == "INPUT") && (node.type.toUpperCase() == "BUTTON") && (parent.webeditor.fixLinkOnClick_Alert_INPUT_BUTTON)) {
					parent.webeditor.SafariOnClickContent = WebEditorGetContent();
					contenteditable_undo_save();
					alert(parent.webeditor.fixLinkOnClick_Alert_Message);
				}
				if ((node.nodeName == "INPUT") && (node.type.toUpperCase() == "SUBMIT") && (parent.webeditor.fixLinkOnClick_Alert_INPUT_SUBMIT)) {
					parent.webeditor.SafariOnClickContent = WebEditorGetContent();
					contenteditable_undo_save();
					alert(parent.webeditor.fixLinkOnClick_Alert_Message);
				}
				if (parent.webeditor.fixLinkOnClick_Cancel) {
					contenteditable_event_stop(evt);
					return false;
				}
			}
		}
	}
}

function contenteditable_onunload_handler(evt) {
	if (parent.webeditor.fixLinkOnClick_Undo) {
		if (parent.webeditor.SafariOnClickIframe) {
			if (! parent.webeditor.SafariOnClickIframe.document) {
				setTimeout(contenteditable_onunload_handler, 1000);
				return false;
			}
			parent.webeditor.SafariOnClickIframe.document.location.href = parent.webeditor.SafariOnClickLocation;
			return false;
		}
	}
}

function contenteditable_reinit() {
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if (iframe && iframe.contentWindow && iframe.contentWindow.document && iframe.contentWindow.document && iframe.contentWindow.document.body) {
			if (((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled'))) {
				try {
					iframe.contentWindow.document.removeEventListener("focus", contenteditable_onfocus[i], true);
				}  catch (e) {
				}
				try {
					iframe.contentWindow.document.removeEventListener("blur", contenteditable_onblur[i], true);
				}  catch (e) {
				}
			}
		}
	}
	contenteditable_inited = new Array();
	contenteditable_onfocus = new Array();
	contenteditable_onblur = new Array();
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if (iframe && iframe.contentWindow && iframe.contentWindow.document && iframe.contentWindow.document && iframe.contentWindow.document.body) {
			if (((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) && (! contenteditable_inited[iframe.id])) {
				try {
					if (! contenteditable_onfocus[i]) contenteditable_onfocus[i] = new Function('event', 'if ((contenteditable_focused) && ((event) && (! event.target))) return; contenteditable_focused='+i+';webeditor_onfocus();webeditor_refreshToolbar(true);');
					if (! contenteditable_onblur[i]) contenteditable_onblur[i] = new Function('event', 'webeditor_onblur();webeditor_refreshToolbar(true);');
					iframe.contentWindow.document.addEventListener("focus", contenteditable_onfocus[i], true);
					iframe.contentWindow.document.addEventListener("blur", contenteditable_onblur[i], true);
				}  catch (e) {
				}
				contenteditable_inited[iframe.id] = true;
			}
		}
	}
}

function contenteditable_init() {
	var first = true;

	// load style sheets and empty content files for all web editor input fields
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if (((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) && (! contenteditable_inited[iframe.id])) {
			try {
				if (contenteditable_stylesheet[iframe.id] && iframe && iframe.contentWindow && iframe.contentWindow.document && iframe.contentWindow.document.getElementById('stylesheet') && (! contenteditable_inited_stylesheet[iframe.id])) {
					iframe.contentWindow.document.getElementById('stylesheet').href = contenteditable_stylesheet[iframe.id];
					contenteditable_inited_stylesheet[iframe.id] = true;
				} else {
					if (iframe.src && iframe.contentWindow && iframe.contentWindow.document && iframe.contentWindow.document.location) {
						if (! contenteditable_inited_document[iframe.id]) {
							iframe.contentWindow.document.location.href = iframe.src;
							contenteditable_inited_document[iframe.id] = true;
							setTimeout(contenteditable_init, webeditor.initTimeout);
							webeditor.initTimeout = webeditor.initTimeout * webeditor.initTimeoutMultiplier;
							return;
						} else {
							// ok - inited
						}
					} else {
						setTimeout(contenteditable_init, webeditor.initTimeout);
						webeditor.initTimeout = webeditor.initTimeout * webeditor.initTimeoutMultiplier;
						return;
					}
				}
			}  catch (e) {
				alert(Text('webbrowser_unsupported_contenteditable')+"\r\n\r\n"+e+"\r\n\r\n"+e.message);
			}
		}
	}

	// all style sheets and empty content files for all web editor input fields have been loaded
	// make all webeditor input fields editable and set the content
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if (((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) && (! contenteditable_inited[iframe.id])) {
			try {
				if (webeditor.fixLinkOnUnload) {
					iframe.contentWindow.addEventListener("unload", contenteditable_onunload_handler, true);
					iframe.contentWindow.document.body.addEventListener("unload", contenteditable_onunload_handler, true);
				}
				if (webeditor.fixLinkOnClick) {
//					iframe.contentWindow.document.addEventListener("click", contenteditable_onclick_handler, true);
					iframe.contentWindow.document.addEventListener("click", contenteditable_onclick_handler, false);
				}
				if (webeditor.direction) iframe.contentWindow.document.dir = webeditor.direction;
				iframe.contentWindow.document.designMode = "on";
				iframe.contentWindow.document.execCommand("redo", false, null);
				if (iframe.contentWindow.document.body) {
					iframe.contentWindow.document.body.innerHTML = contenteditable_contents[iframe.id];
					contenteditable_setBody(iframe.contentWindow.document.body, iframe.id);
				}
				if (! contenteditable_onfocus[i]) contenteditable_onfocus[i] = new Function('event', 'if ((contenteditable_focused) && ((event) && (! event.target))) return; contenteditable_focused='+i+';webeditor_onfocus();webeditor_refreshToolbar(true);');
				if (! contenteditable_onblur[i]) contenteditable_onblur[i] = new Function('event', 'webeditor_onblur();webeditor_refreshToolbar(true);');
				iframe.contentWindow.document.addEventListener("focus", contenteditable_onfocus[i], true);
				iframe.contentWindow.document.addEventListener("blur", contenteditable_onblur[i], true);
				// Safari may not retrigger onfocus on iframes
				iframe.contentWindow.document.addEventListener("click", contenteditable_onfocus[i], true);
				// Safari may not trigger onblur on iframes
				iframe.contentWindow.addEventListener("blur", contenteditable_onblur[i], true);
				iframe.contentWindow.document.addEventListener("keydown", contenteditable_event, true);
				iframe.contentWindow.document.addEventListener("keyup", contenteditable_event, true);
				iframe.contentWindow.document.addEventListener("keypress", contenteditable_event, true);
				iframe.contentWindow.document.addEventListener("mousedown", contenteditable_event, true);
				iframe.contentWindow.document.addEventListener("mouseup", contenteditable_event, true);
				iframe.contentWindow.document.addEventListener("drag", contenteditable_event, true);
				if (webeditor.contextmenus) iframe.contentWindow.document.addEventListener("contextmenu", contenteditable_contextmenu, true);
				var form = iframe;
				while ((form.tagName != "FORM") && (form.tagName != "HTML")) {
					form = form.parentNode;
				}
				if (form.tagName != "HTML") {
					form.addEventListener("submit", contenteditable_onSubmit, true);
					form[iframe.id].value = contenteditable_contents[iframe.id];
				}
				// Safari may not trigger onsubmit on form
				document.addEventListener("submit", contenteditable_onSubmit, true);
				window.addEventListener("submit", contenteditable_onSubmit, true);
			}  catch (e) {
				alert(Text('webbrowser_unsupported_contenteditable')+"\r\n\r\n"+e+"\r\n\r\n"+e.message);
			}
			if (! contenteditable_inited[iframe.id]) webeditor.inited += 1;
			contenteditable_inited[iframe.id] = true;
			if (first) {
				first = false;
				contenteditable_focused = i;
//				webeditor_dropdown_stylesheet('formatclass', contenteditable_stylesheet[iframe.id]);
//				webeditor_dropdown_stylesheet('formatblock', contenteditable_stylesheet[iframe.id]);
//				webeditor_dropdown_stylesheet('fontname', contenteditable_stylesheet[iframe.id]);
//				webeditor_dropdown_stylesheet('fontsize', contenteditable_stylesheet[iframe.id]);
				if (webeditor.fixLinkOnClick_False_A_ONCLICK) {
					var links = contenteditable_focused_contentwindow().document.getElementsByTagName("a");
					for (var i=0; i<links.length; i++) {
						links[i].setAttribute("onClick", "return parent.contenteditable_false();" + (links[i].getAttribute("onClick") || ""));
					}
				}
				if (webeditor.fixLinkOnClick_False_AREA_HREF) {
					var links = contenteditable_focused_contentwindow().document.getElementsByTagName("area");
					for (var i=0; i<links.length; i++) {
						links[i].setAttribute("href", "javascript:return parent.contenteditable_false();" + (links[i].getAttribute("href") || ""));
					}
				}
			}
			try {
//				if (webeditor.scrollContentToTop && iframe && iframe.contentWindow && iframe.contentWindow.document && iframe.contentWindow.document.body && iframe.contentWindow.document.body.firstChild && iframe.contentWindow.document.body.firstChild.scrollIntoView) iframe.contentWindow.document.body.firstChild.scrollIntoView();
			} catch(e) {
			}
		}
	}

	// finalize initialization
	if (webeditor.scrollContentToTop) {
		var iframe = document.getElementsByTagName('iframe').item(contenteditable_focused);
		try {
//			if (iframe && iframe.contentWindow && iframe.contentWindow.focus) iframe.contentWindow.focus();
		} catch(e) {
		}
		webeditor_onfocus();
		webeditor_refreshToolbar(true);
//		window.focus();
//		try {
//			if (iframe && iframe.contentWindow && iframe.contentWindow.blur) iframe.contentWindow.blur();
//		} catch(e) {
//		}
//		window.focus();
		if (document.location.href.indexOf("#") < 0) window.scrollTo(0,0);
	}
	webeditor.refreshToolbar = true;
}

function contenteditable_enable(id) {
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if (((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) && (contenteditable_inited[iframe.id])) {
			if ((iframe.id == id) || (! id)) {
				try {
					if (iframe.className != 'webeditor_contenteditable') {
						iframe.className = 'webeditor_contenteditable';
					}
					if (iframe.contentWindow.document.designMode != "on") {
						iframe.contentWindow.document.designMode = "on";
					}
					if (webeditor.direction && (iframe.contentWindow.document.dir != webeditor.direction)) {
						iframe.contentWindow.document.dir = webeditor.direction;
					}
				}  catch (e) {
				}
				try {
					if (! contenteditable_onfocus[i]) contenteditable_onfocus[i] = new Function('event', 'if ((contenteditable_focused) && ((event) && (! event.target))) return; contenteditable_focused='+i+';webeditor_onfocus();webeditor_refreshToolbar(true);');
					if (! contenteditable_onblur[i]) contenteditable_onblur[i] = new Function('event', 'webeditor_onblur();webeditor_refreshToolbar(true);');
					iframe.contentWindow.document.addEventListener("focus", contenteditable_onfocus[i], true);
					iframe.contentWindow.document.addEventListener("blur", contenteditable_onblur[i], true);
				}  catch (e) {
				}
				contenteditable_inited[iframe.id] = true;
			}
		}
	}
}

function contenteditable_disable(id) {
	for (var i=0; i<document.getElementsByTagName('iframe').length; i++) {
		var iframe = document.getElementsByTagName('iframe').item(i);
		if ((iframe.className == 'webeditor_contenteditable') || (iframe.className == 'webeditor_contenteditable_disabled')) {
			if ((iframe.id == id) || (! id)) {
				try {
					if (iframe.className != 'webeditor_contenteditable_disabled') {
						iframe.className = 'webeditor_contenteditable_disabled';
					}
					if (iframe.contentWindow.document.designMode != "off") {
						iframe.contentWindow.document.designMode = "off";
					}
					if (webeditor.direction && (iframe.contentWindow.document.dir != webeditor.direction)) {
						iframe.contentWindow.document.dir = webeditor.direction;
					}
				}  catch (e) {
				}
				try {
					iframe.contentWindow.document.removeEventListener("focus", contenteditable_onfocus[i], true);
				}  catch (e) {
				}
				try {
					iframe.contentWindow.document.removeEventListener("blur", contenteditable_onblur[i], true);
				}  catch (e) {
				}
			}
		}
	}
}

function contenteditable_toolbar(focused) {
	if (webeditor.toolbar && webeditor.toolbar.contentDocument && webeditor.toolbar.contentDocument.body) {
		return webeditor.toolbar.contentDocument;
	} else if (focused && contenteditable_focused_iframe() && contenteditable_focused_iframe().id && document.getElementById('webeditor_toolbar_' + contenteditable_focused_iframe().id)) {
		return document.getElementById('webeditor_toolbar_' + contenteditable_focused_iframe().id);
	} else {
		return document;
	}
}

function contenteditable_document_stylesheets_cssrules(stylesheet) {
	return stylesheet.cssRules;
}





function contenteditable_selection_fix() {
	// Safari may loose content selection when DOM Inspector link is clicked - restore the content selection
	if (webeditor.contentSelectionBaseNode[contenteditable_focused] && webeditor.contentSelectionExtentNode[contenteditable_focused]) contenteditable_selection().setBaseAndExtent(webeditor.contentSelectionBaseNode[contenteditable_focused], webeditor.contentSelectionBaseOffset[contenteditable_focused], webeditor.contentSelectionExtentNode[contenteditable_focused], webeditor.contentSelectionExtentOffset[contenteditable_focused]);
}

function contenteditable_event(event) {
	// Safari may not trigger iframe onfocus handler
//	var frames = parent.frames;
	var frames = parent.document.getElementsByTagName('iframe');
	for (var i=0; i<frames.length; i++) {
		if (((frames[i].className == 'webeditor_contenteditable') || (frames[i].className == 'webeditor_contenteditable_disabled')) && (frames[i].document == event.target.ownerDocument) && ((i != contenteditable_focused) || (i != contenteditable_focused_fix))) {
			webeditor_onblur();
			contenteditable_focused = i;
			frames[i].contentWindow.focus();
			webeditor_onfocus();
			webeditor_refreshToolbar(true);
		}
	}
	// Safari may insert text before/after first/last list items and table cells/captions
	if (event && (event.type == "keydown") && (event.keyCode != webeditor_keyCode_backspace) && (event.keyCode != webeditor_keyCode_esc) && (event.keyCode != webeditor_keyCode_pageup) && (event.keyCode != webeditor_keyCode_pagedown) && (event.keyCode != webeditor_keyCode_end) && (event.keyCode != webeditor_keyCode_home) && (event.keyCode != webeditor_keyCode_left) && (event.keyCode != webeditor_keyCode_up) && (event.keyCode != webeditor_keyCode_right) && (event.keyCode != webeditor_keyCode_down) && (event.keyCode != webeditor_keyCode_insert) && (event.keyCode != webeditor_keyCode_delete)) {
		var selection = contenteditable_selection();
		if (selection && selection.baseNode) {
			if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseNode.parentNode.tagName == "LI") && (! selection.baseNode.parentNode.nextSibling) && (event.keyCode == webeditor_keyCode_enter) && (selection.baseNode.nodeValue.match(/^[ \xA0]*$/) != null) && ((! selection.baseNode.nextSibling) || ((selection.baseNode.nextSibling.nodeType == 3) && (! selection.baseNode.nextSibling.nextSibling) && (selection.baseNode.nextSibling.nodeValue.match(/^[ \xA0]*$/) != null)))) {
				// enter with caret/cursor at empty/whitespace last list item
				var nextnode = contenteditable_nextnode(false, selection.baseNode.parentNode, true);
				selection.baseNode.parentNode.parentNode.removeChild(selection.baseNode.parentNode);
				selection.setBaseAndExtent(nextnode, 0, nextnode, 0);
				contenteditable_event_stop(event);
			} else if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset == 0) && (! selection.baseNode.previousSibling) && (selection.baseNode.parentNode.tagName == "LI") && (! selection.baseNode.parentNode.previousSibling)) {
				// caret/cursor at start of first list item
				var node = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160));
				selection.baseNode.parentNode.insertBefore(node, selection.baseNode);
			} else if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset == 0) && (selection.baseNode.parentNode.tagName == "LI") && (event.keyCode == webeditor_keyCode_enter)) {
				// enter with caret/cursor at start of list item
				var node = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160));
				selection.baseNode.parentNode.insertBefore(node, selection.baseNode);
			} else if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset == selection.baseNode.nodeValue.length) && (! selection.baseNode.nextSibling) && (selection.baseNode.parentNode.tagName == "LI") && (! selection.baseNode.parentNode.nextSibling)) {
				// caret/cursor at end of last list item
				var node = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160));
				selection.baseNode.parentNode.appendChild(node);
			} else if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset == selection.baseNode.nodeValue.length) && (selection.baseNode.parentNode.tagName == "LI") && (event.keyCode == webeditor_keyCode_enter)) {
				// enter with caret/cursor at end of list item
				var node = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160));
				selection.baseNode.parentNode.appendChild(node);
			} else if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset != selection.baseNode.nodeValue.length) && (selection.baseNode.parentNode.tagName == "LI") && (event.keyCode == webeditor_keyCode_enter)) {
				// enter with caret/cursor in list item
				// ignore and skip the following handlers
			} else if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset == 0) && (! selection.baseNode.previousSibling) && ((selection.baseNode.parentNode.tagName == "TH") || (selection.baseNode.parentNode.tagName == "TD")) && (! selection.baseNode.parentNode.previousSibling) && (selection.baseNode.parentNode.parentNode.tagName == "TR") && (! selection.baseNode.parentNode.parentNode.previousSibling)) {
				// caret/cursor at start of first table cell
				var node = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160));
				selection.baseNode.parentNode.insertBefore(node, selection.baseNode);
			} else if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset == selection.baseNode.nodeValue.length) && (! selection.baseNode.nextSibling) && ((selection.baseNode.parentNode.tagName == "TH") || (selection.baseNode.parentNode.tagName == "TD")) && (! selection.baseNode.parentNode.nextSibling) && (selection.baseNode.parentNode.parentNode.tagName == "TR") && (! selection.baseNode.parentNode.parentNode.nextSibling)) {
				// caret/cursor at end of last table cell
				var node = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160));
				selection.baseNode.parentNode.appendChild(node);
			} else if ((selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset == 0) && (! selection.baseNode.previousSibling) && (selection.baseNode.parentNode.tagName == "CAPTION")) {
				// caret/cursor at start of table caption
				var node = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160));
				selection.baseNode.parentNode.insertBefore(node, selection.baseNode);
			} else if ((event.keyCode == webeditor_keyCode_enter) && contenteditable_isCell() && (! webeditor.onEnter)) {
				// caret/cursor in table cell
				//contenteditable_event_enter_p(event);
				contenteditable_event_stop(event);
				var node = contenteditable_pasteContent("<br>");
				if (node && node.nextSibling) {
					//var nextnode = contenteditable_nextnode(false, selection.baseNode.parentNode, true);
					selection.setBaseAndExtent(node.nextSibling, 0, node.nextSibling, 0);
				} else if (node) {
					var node2 = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160) + String.fromCharCode(160));
					node.parentNode.appendChild(node2);
					selection.setBaseAndExtent(node2, 0, node2, 0);
				}
			} else if ((selection.baseNode == selection.extentNode) && (selection.baseOffset == 0) && (selection.baseNode.tagName == "LI")) {
				var node = contenteditable_focused_contentwindow().document.createTextNode("" + String.fromCharCode(160) + String.fromCharCode(160));
				selection.baseNode.appendChild(node);
				selection.setBaseAndExtent(node, 1, node, 1);
			} else if ((event.keyCode == webeditor_keyCode_enter) && (webeditor.onEnter.toLowerCase() == "<br>") && (selection.baseNode == selection.extentNode) && (selection.baseNode == contenteditable_focused_document().body.lastChild) && (selection.baseOffset == selection.extentOffset) && (selection.baseOffset == selection.baseNode.length)) {
				contenteditable_pasteContent(webeditor.onEnter);
			}
		}
	} else if (event && (event.type == "keydown") && (event.keyCode == webeditor_keyCode_backspace)) {
		var selection = contenteditable_selection();
		if (selection && (selection.baseNode.nodeType == 3) && (selection.baseNode == selection.extentNode) && (selection.baseOffset == selection.extentOffset) && (selection.baseNode.parentNode.tagName == "LI") && (selection.baseNode.nodeValue.length == selection.baseOffset)) {
			if (selection.baseOffset > 1) {
				selection.baseNode.nodeValue = selection.baseNode.nodeValue.substring(0, selection.baseNode.nodeValue.length-1);
				selection.setBaseAndExtent(selection.baseNode, selection.baseNode.nodeValue.length, selection.baseNode, selection.baseNode.nodeValue.length);
				contenteditable_event_stop(event);
			} else if (selection.baseNode.parentNode && selection.baseNode.parentNode.previousSibling) {
				var previousnode = selection.baseNode.parentNode.previousSibling;
				if (previousnode && previousnode.lastChild && (previousnode.lastChild.nodeType == 3)) {
					var parentnode = selection.baseNode.parentNode.parentNode;
					parentnode.removeChild(selection.baseNode.parentNode);
					var node = previousnode.lastChild;
					selection.setBaseAndExtent(node, node.nodeValue.length, node, node.nodeValue.length);
					contenteditable_event_stop(event);
				}
			}
		}
	}
	// Safari may loose content selection when DOM Inspector link is clicked - save the content selection
	var contentSelection = contenteditable_selection();
	if ((event.target.tagName == "IMG") || (event.target.tagName == "OBJECT") || (event.target.tagName == "INPUT") || (event.target.tagName == "SELECT") || (event.target.tagName == "TEXTAREA")) {
		webeditor.contentSelectionFocused = contenteditable_focused;
		webeditor.contentSelectionBaseNode[contenteditable_focused] = event.target;
		webeditor.contentSelectionBaseOffset[contenteditable_focused] = 0;
		webeditor.contentSelectionExtentNode[contenteditable_focused] = event.target;
		webeditor.contentSelectionExtentOffset[contenteditable_focused] = event.target.childNodes.length || 1;
		contenteditable_selection().setBaseAndExtent(webeditor.contentSelectionBaseNode[contenteditable_focused], webeditor.contentSelectionBaseOffset[contenteditable_focused], webeditor.contentSelectionExtentNode[contenteditable_focused], webeditor.contentSelectionExtentOffset[contenteditable_focused]);
	} else if (contentSelection && contentSelection.baseNode && contentSelection.extentNode) {
		webeditor.contentSelectionFocused = contenteditable_focused;
		webeditor.contentSelectionBaseNode[contenteditable_focused] = contentSelection.baseNode;
		webeditor.contentSelectionBaseOffset[contenteditable_focused] = contentSelection.baseOffset;
		webeditor.contentSelectionExtentNode[contenteditable_focused] = contentSelection.extentNode;
		webeditor.contentSelectionExtentOffset[contenteditable_focused] = contentSelection.extentOffset;
		if ((contentSelection.extentNode.tagName == "IMG") && (contentSelection.baseNode == contentSelection.extentNode) && (contentSelection.baseOffset == contentSelection.extentOffset)) {
			webeditor.contentSelectionFocused = contenteditable_focused;
			webeditor.contentSelectionBaseOffset[contenteditable_focused] = 0;
			webeditor.contentSelectionExtentOffset[contenteditable_focused] = 1;
		}
	}
	// Safari may not set selection/range when text is double-clicked
	if (event && ((event.type == "mousedown") || (event.type == "mouseup"))) {
		if (contentSelection && contentSelection.baseNode && contentSelection.extentNode && (contentSelection.baseNode.nodeType == 3) && (contentSelection.baseNode == contentSelection.extentNode) && (contentSelection.baseOffset == contentSelection.extentOffset)) {
			setTimeout(contenteditable_event_selection_fix, 100);
		}
	}
	// Safari may not be able to delete the selected content etc. after CTRL+A
	if (event && ((event.type == "keydown") || (event.type == "keypress")) && event.metaKey && (event.keyCode == webeditor_keyCode_a)) {
		contenteditable_event_stop(event);
		var selection = contenteditable_selection();
		selection.setBaseAndExtent(contenteditable_focused_document().body, 0, contenteditable_focused_document().body, contenteditable_focused_document().body.childNodes.length);
	}
	webeditor_refreshToolbar(webeditor.refreshtoolbarOnAnyEvent);
	return webeditor_event(event);
}

function contenteditable_event_selection_fix() {
	// Safari may not set selection/range when text is double-clicked
	var contentSelection = contenteditable_selection();
	if (contentSelection && contentSelection.baseNode && contentSelection.extentNode && (contentSelection.baseNode.nodeType == 3) && (contentSelection.baseNode == contentSelection.extentNode) && (contentSelection.baseOffset == contentSelection.extentOffset)) {
		var starttext = contentSelection.baseOffset - ("" + contentSelection).length;
		if (starttext < 0) starttext = 0;
		if (contentSelection.baseNode.nodeValue.substring(starttext).indexOf(contentSelection) >= 0) {
			webeditor.contentSelectionBaseNode[contenteditable_focused] = contentSelection.baseNode;
			webeditor.contentSelectionBaseOffset[contenteditable_focused] = starttext + contentSelection.baseNode.nodeValue.substring(starttext).indexOf(contentSelection);
			webeditor.contentSelectionExtentNode[contenteditable_focused] = contentSelection.extentNode;
			webeditor.contentSelectionExtentOffset[contenteditable_focused] = webeditor.contentSelectionBaseOffset[contenteditable_focused] + ("" + contentSelection).length;
		}
	}
}

function contenteditable_event_stop(event) {
	event.preventDefault();
	event.stopPropagation();
}

function contenteditable_event_ctrlkey(event) {
}

function contenteditable_event_key(event) {
}

function contenteditable_event_delete(my_event) {
	// Safari selection/range may not include first text formatting tags
	if (my_event && my_event.keyCode && (my_event.keyCode == 46)) {
		if ((webeditor.contentSelectionBaseNode[contenteditable_focused] == contenteditable_focused_document().body.firstChild) && (webeditor.contentSelectionBaseOffset[contenteditable_focused] == 0) && (webeditor.contentSelectionExtentNode[contenteditable_focused] == contenteditable_focused_document().body.lastChild) && (webeditor.contentSelectionExtentOffset[contenteditable_focused] == 1)) {
			contenteditable_focused_document().body.innerHTML = "";
			var selection = contenteditable_selection();
			selection.setBaseAndExtent(contenteditable_focused_document().body, 0, contenteditable_focused_document().body, 0);
			return;
		}
	}
}

function contenteditable_event_enter_p(my_event) {
	contenteditable_event_stop(my_event);
	if (my_event.type != "keydown") {
		return;
	}
	var range = contenteditable_selection_range();
	if ((range.startContainer == range.endContainer) && (range.startContainer.nodeName == "#text")) {
		var preP = range.startContainer.nodeValue.substring(0, range.startOffset) || "";
		var postP = range.startContainer.nodeValue.substring(range.endOffset) || "";
		var oldP = range.startContainer;
		var oldPparentNode = oldP.parentNode;
		if (oldPparentNode.nodeName == "P") {
			if (oldPparentNode.firstChild == oldPparentNode.lastChild) {
				var newP = contenteditable_focused_contentwindow().document.createElement("P");
				newP.innerHTML = preP || "&nbsp;";
				if (postP) {
					oldP.nodeValue = postP;
				} else {
					oldPparentNode.innerHTML = "&nbsp;";
				}
				oldPparentNode.parentNode.insertBefore(newP, oldPparentNode);
				var selection = contenteditable_selection();
				selection.setBaseAndExtent(oldPparentNode, 0, oldPparentNode, 0);
			} else if (oldP == oldPparentNode.lastChild) {
				var newP = contenteditable_focused_contentwindow().document.createElement("P");
				newP.innerHTML = postP || "&nbsp;";
				oldP.nodeValue = preP;
				if (oldPparentNode.nextSibling) {
					oldPparentNode.parentNode.insertBefore(newP, oldPparentNode.nextSibling);
				} else {
					oldPparentNode.parentNode.appendChild(newP);
				}
				var selection = contenteditable_selection();
				selection.setBaseAndExtent(newP, 0, newP, 0);
			} else if (oldP == oldPparentNode.firstChild) {
				var newP = contenteditable_focused_contentwindow().document.createElement("P");
				newP.innerHTML = preP || "&nbsp;";
				oldP.nodeValue = postP;
				oldPparentNode.parentNode.insertBefore(newP, oldPparentNode);
				var selection = contenteditable_selection();
				selection.setBaseAndExtent(oldP, 0, oldP, 0);
			} else {
				var newP = contenteditable_focused_contentwindow().document.createElement("P");
				newP.innerHTML = postP || "&nbsp;";
				oldP.nodeValue = preP;
				while (oldP.nextSibling) {
					nextSibling = oldP.nextSibling;
					oldPparentNode.removeChild(nextSibling);
					newP.appendChild(nextSibling);
				}
				if (oldPparentNode.nextSibling) {
					oldPparentNode.parentNode.insertBefore(newP, oldPparentNode.nextSibling);
				} else {
					oldPparentNode.parentNode.appendChild(newP);
				}
				var selection = contenteditable_selection();
				selection.setBaseAndExtent(newP, 0, newP, 0);
			}
		} else if (oldPparentNode.nodeName == "BODY") {
			var newP = contenteditable_focused_contentwindow().document.createElement("P");
			newP.innerHTML = preP || "&nbsp;";
			var newP2 = contenteditable_focused_contentwindow().document.createElement("P");
			newP2.innerHTML = postP || "&nbsp;";
			oldPparentNode.insertBefore(newP, oldP);
			oldPparentNode.insertBefore(newP2, oldP);
			oldPparentNode.removeChild(oldP);
			var selection = contenteditable_selection();
			selection.setBaseAndExtent(newP2, 0, newP2, 0);
		} else {
			var newP = contenteditable_focused_contentwindow().document.createElement("P");
			newP.innerHTML = postP || "&nbsp;";
			oldP.nodeValue = preP;
			while (oldP.nextSibling) {
				nextSibling = oldP.nextSibling;
				oldPparentNode.removeChild(nextSibling);
				newP.appendChild(nextSibling);
			}
			while (oldPparentNode.nextSibling && (oldPparentNode.nextSibling.nodeName != "P")) {
				nextSibling = oldPparentNode.nextSibling;
				oldPparentNode.parentNode.removeChild(nextSibling);
				newP.appendChild(nextSibling);
			}
			if (oldPparentNode.nextSibling) {
				oldPparentNode.parentNode.insertBefore(newP, oldPparentNode.nextSibling);
			} else {
				oldPparentNode.parentNode.appendChild(newP);
			}
			var selection = contenteditable_selection();
			selection.setBaseAndExtent(newP, 0, newP, 0);
		}
	} else {
		contenteditable_pasteContent("<p>");
	}
}

function contenteditable_event_enter_fix(my_event) {
	if (my_event.type == "keypress") {
		var selection = contenteditable_selection();
		if (selection.baseNode && selection.baseNode.parentNode && selection.baseNode.parentNode.tagName == "FORM") {
			contenteditable_event_stop(my_event);
			var node = contenteditable_pasteContent("<br>");
			selection.setBaseAndExtent(node, 1, node, 1);
		}
	}
}

function contenteditable_event_dragdrop(my_event) {
}





function contenteditable_selection(contentWindow) {
	if (! contentWindow) contentWindow = contenteditable_focused_contentwindow();
	if (contentWindow && contentWindow.getSelection) return contentWindow.getSelection();
}

function contenteditable_selection_text(contentSelection) {
	if (! contentSelection) contentSelection = contenteditable_selection();
	var range = contenteditable_selection_range(contentSelection);
	// Safari range may be wrong if all content is selected - create new range from selection instead
	if ((range.startContainer == range.endContainer) && (contentSelection.baseNode != contentSelection.extentNode)) {
		var baseNode = contentSelection.baseNode;
		var baseOffset = contentSelection.baseOffset;
		var extentNode = contentSelection.extentNode;
		var extentOffset = contentSelection.extentOffset;
		range = contenteditable_createrange();
		try {
			range.setStart(baseNode, baseOffset);
		} catch(e) {
			try {
				if (baseOffset) {
					range.setStartAfter(baseNode);
				} else {
					range.setStartBefore(baseNode);
				}
			} catch(e) {
				range = contenteditable_selection_range(contentSelection);
			}
		}
		try {
			range.setEnd(extentNode, extentOffset);
		} catch(e) {
			try {
				if (extentOffset) {
					range.setEndAfter(extentNode);
				} else {
					range.setEndBefore(extentNode);
				}
			} catch(e) {
				range = contenteditable_selection_range(contentSelection);
			}
		}
	}
	var content = getRangeHTML(range, contentSelection);
	return content;
}

function contenteditable_selection_range_control(contentSelection) {
	if (! contentSelection) contentSelection = contenteditable_selection();
	if (contentSelection) {
		return (contentSelection.type == 'Control');
	}
}

function contenteditable_selection_range_parentNode(contentRange) {
	if (! contentRange) contentRange = contenteditable_selection_range();
	if (contentRange) {
		if (contenteditable_selection_container("IMG")) {
			return contenteditable_selection_container("IMG");
		}
		if (contenteditable_selection_container("IFRAME")) {
			return contenteditable_selection_container("IFRAME");
		}
		if (contenteditable_selection_container("INPUT")) {
			return contenteditable_selection_container("INPUT");
		}
		if (contenteditable_selection_container("SELECT")) {
			return contenteditable_selection_container("SELECT");
		}
		if (contenteditable_selection_container("TEXTAREA")) {
			return contenteditable_selection_container("TEXTAREA");
		}
		if (contentRange.commonAncestorContainer.nodeName == '#text') {
			return contentRange.commonAncestorContainer.parentNode;
		} else {
			// Safari TD selection endContainer may be set at beginning of next TD instead of at end of selected TD
			var startContainer=contentRange.startContainer;
			var endContainer=contentRange.endContainer;
			if ((contentRange.endOffset == 0) && (endContainer.nodeName == '#text') && (endContainer.parentNode.nodeName == "TD")) {
				endContainer = endContainer.parentNode.previousSibling;
				for (var startnode=startContainer; startnode && (startnode.tagName != "BODY"); startnode=startnode.parentNode) {
					for (var endnode=endContainer; endnode && (endnode.tagName != "BODY"); endnode=endnode.parentNode) {
						if (startnode == endnode) {
							return startnode;
						}
					}
				}
			}
			return contentRange.commonAncestorContainer;
		}
	}
}

function contenteditable_selection_range_startNode(contentRange) {
}

function contenteditable_selection_range_endNode(contentRange) {
}

function contenteditable_selection_range_contains(contentRange,node,partially) {
	var START_TO_START = 0;
	var START_TO_END = 1;
	var END_TO_END = 2;
	var END_TO_START = 3;
	var contains = false;
	var element = contenteditable_createrange();
	element.selectNode(node);
	if (contentRange && (contentRange.compareBoundaryPoints(START_TO_START,element) == -1) && (contentRange.compareBoundaryPoints(START_TO_END,element) == 1) && (contentRange.compareBoundaryPoints(END_TO_START,element) == -1) && (contentRange.compareBoundaryPoints(END_TO_END,element) == 1)) {
		contains = true;
	} else if (partially && contentRange && (contentRange.compareBoundaryPoints(START_TO_END,element) == -1) && (contentRange.compareBoundaryPoints(END_TO_START,element) == 1)) {
		contains = true;
	} else if (partially && contentRange && (contentRange.compareBoundaryPoints(START_TO_END,element) == 1) && (contentRange.compareBoundaryPoints(END_TO_START,element) == -1)) {
		contains = true;
	}
	return contains;
}

function contenteditable_selection_contains(tagName) {
	var range = contenteditable_selection_range();
	var parentnode = contenteditable_selection_range_parentNode(range);
	var nodes = parentnode.getElementsByTagName(tagName);
	for (var i=0; i<nodes.length; i++) {
		if (contenteditable_selection_range_contains(range,nodes[i],true)) {
			return true;
		}
	}
	return false;
}

function contenteditable_selection_range(contentSelection) {
	if (! contentSelection) contentSelection = contenteditable_selection();
	if (! contentSelection) return;
	if (! contentSelection.setBaseAndExtent) return;
	var contentSelection_baseNode;
	var contentSelection_baseOffset;
	var contentSelection_extentNode;
	var contentSelection_extentOffset;
	if (contentSelection && contentSelection.baseNode && contentSelection.extentNode) {
		contentSelection_baseNode = contentSelection.baseNode;
		contentSelection_baseOffset = contentSelection.baseOffset;
		contentSelection_extentNode = contentSelection.extentNode;
		contentSelection_extentOffset = contentSelection.extentOffset;
	} else if (contentSelection) {
		contentSelection_baseNode = webeditor.contentSelectionBaseNode[contenteditable_focused];
		contentSelection_baseOffset = webeditor.contentSelectionBaseOffset[contenteditable_focused];
		contentSelection_extentNode = webeditor.contentSelectionExtentNode[contenteditable_focused];
		contentSelection_extentOffset = webeditor.contentSelectionExtentOffset[contenteditable_focused];
		// Safari 3 may fail settting selection
		try {
			contentSelection.setBaseAndExtent(contentSelection_baseNode, contentSelection_baseOffset, contentSelection_extentNode, contentSelection_extentOffset);
		} catch (e) {
			contentSelection = false;
		}
	}
	if (contentSelection && contentSelection_baseNode && contentSelection_extentNode) {
//		// Safari range may simply be set before selected image instead of including the selected image
//		if ((webeditor.contentSelectionBaseNode[contenteditable_focused] == contentSelection_baseNode) && (webeditor.contentSelectionExtentNode[contenteditable_focused] == contentSelection_extentNode) && (contentSelection_baseNode == contentSelection_extentNode) && (contentSelection_baseNode.nodeType != 3) && (contentSelection_baseOffset == contentSelection_extentOffset) && (contentSelection_baseNode.tagName == "IMG")) {
//			contentSelection_extentOffset = contentSelection_baseOffset+1;
//			contentSelection.setBaseAndExtent(contentSelection_baseNode, contentSelection_baseOffset, contentSelection_extentNode, contentSelection_extentOffset);
//		}

		// Safari range may be set at end of previous node instead of at start of selected node
		if ((contentSelection_baseNode.nodeType != 3) && (contentSelection_baseOffset >= contentSelection_baseNode.childNodes.length) && contentSelection_baseNode.nextSibling && (contentSelection_baseNode.nextSibling == contentSelection_extentNode))  {
			contentSelection_baseNode = contentSelection_baseNode.nextSibling;
			contentSelection_baseOffset = 0;
		}
		if ((contentSelection_baseNode.nodeType == 3) && (contentSelection_baseOffset >= contentSelection_baseNode.nodeValue.length) && contentSelection_baseNode.nextSibling && (contentSelection_baseNode.nextSibling == contentSelection_extentNode))  {
			contentSelection_baseNode = contentSelection_baseNode.nextSibling;
			contentSelection_baseOffset = 0;
		}
		if ((contentSelection_extentNode.nodeType != 3) && (contentSelection_extentOffset >= contentSelection_extentNode.childNodes.length) && contentSelection_extentNode.nextSibling && (contentSelection_extentNode.nextSibling == contentSelection_baseNode))  {
			var temp = contentSelection_baseNode;
			contentSelection_baseNode = contentSelection_extentNode.nextSibling;
			contentSelection_extentNode = temp;
			var temp = contentSelection_baseOffset;
			contentSelection_baseOffset = 0;
			contentSelection_extentOffset = temp;
		}
		if ((contentSelection_extentNode.nodeType == 3) && (contentSelection_extentOffset >= contentSelection_extentNode.nodeValue.length) && contentSelection_extentNode.nextSibling && (contentSelection_extentNode.nextSibling == contentSelection_baseNode))  {
			var temp = contentSelection_baseNode;
			contentSelection_baseNode = contentSelection_extentNode.nextSibling;
			contentSelection_extentNode = temp;
			var temp = contentSelection_baseOffset;
			contentSelection_baseOffset = 0;
			contentSelection_extentOffset = temp;
		}

		// Safari selection may be back to front - if so then swap selection start/end
		if ((contentSelection_baseNode == contentSelection_extentNode) && (contentSelection_baseOffset > contentSelection_extentOffset)) {
			var temp = contentSelection_baseOffset;
			contentSelection_baseOffset = contentSelection_extentOffset;
			contentSelection_extentOffset = temp;
		} else if (contentSelection_baseNode != contentSelection_extentNode) {
			var START_TO_START = 0;
			var START_TO_END = 1;
			var END_TO_END = 2;
			var END_TO_START = 3;
			var startrange = contenteditable_createrange();
			startrange.selectNode(contentSelection_baseNode);
			var endrange = contenteditable_createrange();
			endrange.selectNode(contentSelection_extentNode);
			if (startrange.compareBoundaryPoints(START_TO_START,endrange) == 1) {
				var temp = contentSelection_baseNode;
				contentSelection_baseNode = contentSelection_extentNode;
				contentSelection_extentNode = temp;
				var temp = contentSelection_baseOffset;
				contentSelection_baseOffset = contentSelection_extentOffset;
				contentSelection_extentOffset = temp;
			}
		}

		// Safari selection containers+offsets may point to empty selection although some text is selected - use selection text if inconsistency
		if ((contentSelection != "") && (contentSelection.baseNode == contentSelection.extentNode) && (contentSelection.baseOffset == contentSelection.extentOffset)) {
			var startindex = contentSelection_baseOffset - ("" + contentSelection).length;
			if (startindex < 0) startindex = 0;
			contentSelection_baseOffset = contentSelection.baseNode.nodeValue.indexOf(contentSelection, startindex);
			contentSelection_extentOffset = contentSelection_baseOffset + ("" + contentSelection).length;
		}

		var range = contenteditable_createrange();
		if (range) {
//			if ((contentSelection_baseNode.nodeType != 3) && (contentSelection_baseNode == contentSelection_extentNode) && ((contentSelection_baseOffset == 0) || (contentSelection_baseOffset == 1)) && ((contentSelection_extentOffset == 0) || (contentSelection_extentOffset == 1))) {
			if ((contentSelection_baseNode.nodeType != 3) && (contentSelection_baseNode == contentSelection_extentNode) && ((contentSelection_baseOffset == 0) || (contentSelection_baseOffset == 1)) && ((contentSelection_extentOffset == 0) || (contentSelection_extentOffset == 1)) && (contentSelection_baseOffset != contentSelection_extentOffset)) {
				try {
					range.setStartBefore(contentSelection_baseNode);
					range.setEndAfter(contentSelection_baseNode);
					return range;
				} catch(e) {
				}
			}
			if (contentSelection.type == 'Range') {
				if ((contentSelection_baseNode.tagName == "IFRAME") || (contentSelection_extentNode.tagName == "IFRAME") || (contentSelection_baseNode.tagName == "INPUT") || (contentSelection_extentNode.tagName == "INPUT") || (contentSelection_baseNode.tagName == "TEXTAREA") || (contentSelection_extentNode.tagName == "TEXTAREA")) {
					try {
						range.setStart(contentSelection_baseNode,contentSelection_baseOffset);
						range.setEnd(contentSelection_extentNode,contentSelection_extentOffset);
					} catch(e) {
						try {
							range.setStart(contentSelection_baseNode,contentSelection_baseOffset);
							range.setEnd(contentSelection_baseNode,contentSelection_baseOffset);
						} catch(e) {
							try {
								range.setStart(contentSelection_extentNode,contentSelection_extentOffset);
								range.setEnd(contentSelection_extentNode,contentSelection_extentOffset);
							} catch(e) {
								return false;
							}
						}
					}
					return range;
				}
//				range.setStart(contentSelection_baseNode,contentSelection_baseOffset);
//				try {
//					range.setEnd(contentSelection_extentNode,contentSelection_extentOffset);
//				} catch(e) {
//					if ((contentSelection_baseNode == contentSelection_extentNode) && (contentSelection_baseOffset == 0) && (contentSelection_extentOffset == 1)) {
//						range.setEnd(contentSelection_baseNode,contentSelection_baseOffset);
//					}
//				}
				try {
					if ((contentSelection_baseOffset == 0) && (contentSelection_extentOffset == 1)) {
						range.setStartBefore(contentSelection_baseNode);
						range.setEndAfter(contentSelection_extentNode);
					} else {
						range.setStart(contentSelection_baseNode,contentSelection_baseOffset);
						range.setEnd(contentSelection_extentNode,contentSelection_extentOffset);
					}
				} catch(e) {
					try {
						range.setStart(contentSelection_baseNode,contentSelection_baseOffset);
						range.setEnd(contentSelection_baseNode,contentSelection_baseOffset);
					} catch(e) {
						try {
							range.setStart(contentSelection_extentNode,contentSelection_extentOffset);
							range.setEnd(contentSelection_extentNode,contentSelection_extentOffset);
						} catch(e) {
							return false;
						}
					}
				}
			} else if (contentSelection.type == 'Caret') {
				try {
					range.setStart(contentSelection_baseNode,contentSelection_baseOffset);
					range.setEnd(contentSelection_extentNode,contentSelection_extentOffset);
				} catch(e) {
					try {
						range.setStart(contentSelection_baseNode,contentSelection_baseOffset);
						range.setEnd(contentSelection_baseNode,contentSelection_baseOffset);
					} catch(e) {
						try {
							range.setStart(contentSelection_extentNode,contentSelection_extentOffset);
							range.setEnd(contentSelection_extentNode,contentSelection_extentOffset);
						} catch(e) {
							try {
								range.setStartBefore(contentSelection_baseNode);
								range.setEndAfter(contentSelection_baseNode);
							} catch(e) {
								return false;
							}
						}
					}
				}
			}
			return range;
		}
	}
	return false;
}

function contenteditable_createrange() {
	return contenteditable_focused_contentwindow().document.createRange();
}



function contenteditable_selection_container(tagName) {
	if (tagName) {
		if (tagName.toUpperCase() == "IMG") {
			var contentSelection = contenteditable_selection();
			if (contentSelection && contentSelection.baseNode && (contentSelection.baseNode == contentSelection.extentNode) && (contentSelection.baseNode.tagName == "IMG")) {
				return contentSelection.baseNode;
			} else if (contentSelection && contentSelection.baseNode && (contentSelection.baseNode.tagName == "IMG") && ((contentSelection.baseOffset == contentSelection.extentOffset) || (contentSelection.baseOffset == contentSelection.extentOffset-1))) {
				return contentSelection.baseNode;
			} else if (contentSelection && contentSelection.extentNode && (contentSelection.extentNode.tagName == "IMG") && ((contentSelection.baseOffset == contentSelection.extentOffset) || (contentSelection.baseOffset == contentSelection.extentOffset-1))) {
				return contentSelection.extentNode;
			}
			return false;
		} else if ((tagName.toUpperCase() == "IFRAME") || (tagName.toUpperCase() == "INPUT") || (tagName.toUpperCase() == "SELECT") || (tagName.toUpperCase() == "TEXTAREA")) {
			var contentSelection = contenteditable_selection();
			if (contentSelection && contentSelection.baseNode && (contentSelection.baseNode.tagName == tagName.toUpperCase())) {
				return contentSelection.baseNode;
			}
			if (contentSelection && contentSelection.extentNode && (contentSelection.extentNode.tagName == tagName.toUpperCase())) {
				return contentSelection.extentNode;
			}
			return false;
		}
	}
	var START_TO_START = 0;
	var START_TO_END = 1;
	var END_TO_END = 2;
	var END_TO_START = 3;
	var range = contenteditable_selection_range();
	var range_startContainer = range.startContainer;
	var range_startOffset = range.startOffset;
	var range_endContainer = range.endContainer;
	var range_endOffset = range.endOffset;
	// Safari range may be set at end of previous textnode instead of at start of selected node
	if (tagName && range_startContainer && range_endContainer && (range_startContainer.nodeType == 3) && (range_endContainer.nodeType == 3) && (range_startContainer != range_endContainer)) {
		if ((range_startOffset >= range_startContainer.nodeValue.length) && range_startContainer.nextSibling && range_endContainer.parentNode && (range_startContainer.nextSibling == range_endContainer.parentNode) && (range_startContainer.nextSibling.tagName == tagName.toUpperCase())) {
			return range_startContainer.nextSibling;
		}
	}
	var container;
	var container_exact = false;
	if (range && (range_startContainer == range_endContainer) && (! range_startContainer.tagName)) {
		// range is within single text node
		container = contenteditable_selection_range_parentNode();
		if (container && (! container.tagName)) container = container.parentNode;
	} else if (range && (range_startContainer == range_endContainer) && (range_startContainer.tagName == "BODY") && (range_startOffset == 0) && (range_endOffset == range_startContainer.childNodes.length)) {
		// range is entire body
		container = contenteditable_selection_range_parentNode();
		if (container && (! container.tagName)) container = container.parentNode;
		if (tagName && container.firstChild && (container.firstChild.tagName == tagName.toUpperCase()) && (container.firstChild == container.lastChild)) container = container.firstChild;
	} else {
		var content;
		var startContainer = false;
		var endContainer = false;
		var tag;
		if (false && range && (range_startContainer == range_endContainer) && (range_startOffset == 0) && (range_endOffset == range_startContainer.childNodes.length)) {
			// range is all child nodes
		} else if (true && range && (range_startContainer == range_endContainer) && (range_startOffset == range_endOffset-1)) {
			// range is one child node
			content = range_startContainer.childNodes[range_startOffset];
			tag = content;
		} else if (true && range && (range_startContainer == range_endContainer) && (range_startOffset == range_endOffset)) {
			// range is nothing
			if (range_startContainer.childNodes.length) {
				content = range_startContainer.childNodes[range_startOffset];
			} else {
				content = range_startContainer;
			}
			tag = content;
		} else if (true && range && range_startContainer.tagName && range_endContainer.tagName) {
			// range is node range
			content = contenteditable_selection_range_parentNode();
			startContainer = range_startContainer.childNodes[range_startOffset];
			endContainer = range_endContainer.childNodes[range_endOffset];
			tag = startContainer;
		} else if (true && range && (range_startContainer.tagName || range_endContainer.tagName)) {
			// range is partial node range
			content = contenteditable_selection_range_parentNode();
			tag = content;
		} else {
			// range is text range
			content = contenteditable_selection_range_parentNode();
			tag = content;
			if (content && content.lastChild) tag = content.lastChild;
		}
		container_exact = false;
		container = content;
		if (container && (! container.tagName)) container = container.parentNode;
		var skipChildren = false;
		var containerCount = 0;
		while (tag = contenteditable_nextnode(content, tag, skipChildren)) {
			var element = contenteditable_createrange();
			if (element.selectNode) {
//QQQ ERROR: element.selectNode("OPTION"); may fail
				element.selectNode(tag);
				if (tag.tagName && range && (range.compareBoundaryPoints(START_TO_START,element) == 0) && (range.compareBoundaryPoints(END_TO_END,element) == 0)) {
					container_exact = tag;
					if (container_exact.nodeName == webeditor.selection_node) break;
					if (tag.tagName == "TABLE") {
						skipChildren = true;
					} else {
						skipChildren = false;
					}
				} else if (tag.tagName && range && (range.compareBoundaryPoints(END_TO_START,element) <= 0) && (range.compareBoundaryPoints(START_TO_END,element) >= 0)) {
					if (container == tag.parentNode) {
						containerCount = 1;
					} else {
						containerCount++;
					}
					container = tag;
					if (tag.tagName == "TABLE") {
						skipChildren = true;
					} else {
						skipChildren = false;
					}
				} else {
					skipChildren = true;
				}
			}
			if (tag == endContainer) break;
		}
		if (containerCount > 1) container = content;
	}
	if (webeditor.selection_node && container) {
		var selection_node = container;
		while (selection_node && (webeditor.selection_node != selection_node.nodeName)) {
			selection_node = selection_node.parentNode;
		}
		if (selection_node) container = selection_node;
	}
	if (tagName) {
		var selection_node = container_exact || container || false;
		while (selection_node && (tagName.toUpperCase() != selection_node.tagName)) {
			selection_node = selection_node.parentNode;
		}
		return selection_node;
	} else {
		return container_exact || container || (contenteditable_focused_document() ? contenteditable_focused_document().body : false);
	}
}



function contenteditable_selection_all() {
//	contenteditable_selection_node(contenteditable_focused_document().body);
	if (contenteditable_focused_document().body.firstChild) {
		contenteditable_selection_node(contenteditable_focused_document().body.firstChild, contenteditable_focused_document().body.firstChild, 0, 0);
		contenteditable_selection_node(contenteditable_focused_document().body.firstChild, contenteditable_focused_document().body.lastChild, 0, contenteditable_focused_document().body.lastChild.childNodes.length || 1);
		var range = contenteditable_selection_range();
		// Safari selection/range may not include first text formatting tags
		webeditor.contentSelectionBaseNode[contenteditable_focused] = contenteditable_focused_document().body.firstChild;
		webeditor.contentSelectionBaseOffset[contenteditable_focused] = 0;
		webeditor.contentSelectionExtentNode[contenteditable_focused] = contenteditable_focused_document().body.lastChild;
		webeditor.contentSelectionExtentOffset[contenteditable_focused] = contenteditable_focused_document().body.lastChild.childNodes.length || 1;
	} else {
		var selection = contenteditable_selection();
		selection.setBaseAndExtent(contenteditable_focused_document().body, 0, contenteditable_focused_document().body, 0);
		var range = contenteditable_selection_range();
		webeditor.contentSelectionBaseNode[contenteditable_focused] = contenteditable_focused_document().body;
		webeditor.contentSelectionBaseOffset[contenteditable_focused] = 0;
		webeditor.contentSelectionExtentNode[contenteditable_focused] = contenteditable_focused_document().body;
		webeditor.contentSelectionExtentOffset[contenteditable_focused] = 0;
	}
}



function contenteditable_selection_node(startNode, endNode, startOffset, endOffset) {
	webeditor.selection_node = startNode.nodeName;
	var selection = contenteditable_selection();
	if (endNode) {
		selection.setBaseAndExtent(startNode, startOffset, endNode, endOffset);
	} else {
		if (startNode.childNodes && startNode.childNodes.length) {
			selection.setBaseAndExtent(startNode, 0, startNode, startNode.childNodes.length);
		} else {
			for (var i=0; i<startNode.parentNode.childNodes.length; i++) {
				if (startNode == startNode.parentNode.childNodes[i]) {
					selection.setBaseAndExtent(startNode.parentNode, i, startNode.parentNode, i+1);
				}
			}
		}
	}
}



function contenteditable_selection_cells(contentSelection) {
	var range = contenteditable_selection_range();
	var table = contenteditable_selection_range_parentNode();
	while ((table.tagName == "THEAD") || (table.tagName == "TBODY") || (table.tagName == "TFOOT") || (table.tagName == "TR") || (table.tagName == "TD")) {
		table = table.parentNode;
	}
	var startcontainer = range.startContainer;
	while ((startcontainer.tagName != "TH") && (startcontainer.tagName != "TD")) {
		startcontainer = startcontainer.parentNode;
	}
	var endcontainer = range.endContainer;
	while ((endcontainer.tagName != "TH") && (endcontainer.tagName != "TD")) {
		endcontainer = endcontainer.parentNode;
	}
	if (table.tagName == "TABLE") {
		// Safari as of v2.0 does not handle cell selection across rows "correctly".
		// It is not possible to select a square of cells.
		// Trailing and leading cells across rows are included in the selection.
		// Simulate a square selection of cells by finding first column in first row and last column in last row.
		var firstColumn = -1;
		var firstRow = -1;
		var lastColumn = -1;
		var lastRow = -1;
		for (var i=0; i<table.rows.length; i++) {
			for (var j=0; j<table.rows[i].cells.length; j++) {
				if (startcontainer == table.rows[i].cells[j]) {
					if (firstColumn == -1) firstColumn = j;
					if (firstRow == -1) firstRow = i;
				}
				if (endcontainer == table.rows[i].cells[j]) {
					lastColumn = j;
					lastRow = i;
				}
			}
		}
		if ((firstRow > -1) && (lastRow > -1) && (firstColumn > -1) && (lastColumn > -1)) {
			var cells = new Array();
			for (var i=firstRow; i<=lastRow; i++) {
				for (var j=firstColumn; j<=lastColumn; j++) {
					if (! cells[i-firstRow]) cells[i-firstRow] = new Array();
					cells[i-firstRow].push(table.rows[i].cells[j]);
				}
			}
			if (cells.length) return cells;
		}
	}
}



function contenteditable_selection_bookmark(bookmark) {
	if (bookmark) {
		var rootnode = contenteditable_focused_document().body;
		var startNodeNumber = bookmark.startNode;
		var startOffset = bookmark.startOffset;
		var endNodeNumber = bookmark.endNode;
		var endOffset = bookmark.endOffset;
		var startNode = contenteditable_selection_bookmark_path_node(rootnode, bookmark.startNodePath)
		var endNode = contenteditable_selection_bookmark_path_node(rootnode, bookmark.endNodePath)
		contenteditable_selection_node(startNode, endNode, startOffset, endOffset);
		if (contenteditable_selection_container().scrollIntoView) contenteditable_selection_container().scrollIntoView();
		contenteditable_focused_contentwindow().focus();
	} else {
		var selection = contenteditable_selection();
		var range = contenteditable_selection_range();
		if (range && range.startContainer && range.endContainer) {
			bookmark = new Object();
			bookmark.startNode = 0;
			bookmark.startOffset = range.startOffset;
			bookmark.endNode = 0;
			bookmark.endOffset = range.endOffset;
			bookmark.startNodePath = contenteditable_selection_bookmark_path(range.startContainer);
			bookmark.endNodePath = contenteditable_selection_bookmark_path(range.endContainer);
		} else if (selection && selection.baseNode && selection.extentNode) {
			bookmark = new Object();
			bookmark.startNode = 0;
			bookmark.startOffset = selection.baseOffset;
			bookmark.endNode = 0;
			bookmark.endOffset = selection.extentOffset;
			bookmark.startNodePath = contenteditable_selection_bookmark_path(selection.baseNode);
			bookmark.endNodePath = contenteditable_selection_bookmark_path(selection.extentNode);
		} else if (webeditor.contentSelectionBaseNode[contenteditable_focused] && webeditor.contentSelectionExtentNode[contenteditable_focused]) {
			bookmark = new Object();
			bookmark.startNode = 0;
			bookmark.startOffset = webeditor.contentSelectionBaseOffset[contenteditable_focused];
			bookmark.endNode = 0;
			bookmark.endOffset = webeditor.contentSelectionExtentOffset[contenteditable_focused];
			bookmark.startNodePath = contenteditable_selection_bookmark_path(webeditor.contentSelectionBaseNode[contenteditable_focused]);
			bookmark.endNodePath = contenteditable_selection_bookmark_path(webeditor.contentSelectionExtentNode[contenteditable_focused]);
//		} else if (contenteditable_focused_document().body.firstChild) {
//			bookmark = new Object();
//			bookmark.startNode = 0;
//			bookmark.startOffset = 0;
//			bookmark.endNode = 0;
//			bookmark.endOffset = 0;
//			bookmark.startNodePath = contenteditable_selection_bookmark_path(contenteditable_focused_document().body.firstChild);
//			bookmark.endNodePath = contenteditable_selection_bookmark_path(contenteditable_focused_document().body.firstChild);
		} else if (contenteditable_focused_document() && contenteditable_focused_document().body) {
			bookmark = new Object();
			bookmark.startNode = 0;
			bookmark.startOffset = 0;
			bookmark.endNode = 0;
			bookmark.endOffset = 0;
			bookmark.startNodePath = contenteditable_selection_bookmark_path(contenteditable_focused_document().body);
			bookmark.endNodePath = contenteditable_selection_bookmark_path(contenteditable_focused_document().body);
		}
	}
	return bookmark;
}
function contenteditable_selection_bookmark_path(node) {
	var nodePath = "";
	var nodeNumber = 1;
	var nodeName = node.nodeName;
	var tmp_node = node;
	while (tmp_node = tmp_node.previousSibling) {
		if (tmp_node.nodeName == nodeName) nodeNumber++;
	}
	nodePath = nodeNumber + "." + nodeName;
	while ((node = node.parentNode) && (node.nodeName != "BODY") && (node.nodeName != "HTML") && (node.nodeName != "#document")) {
		var nodeNumber = 1;
		var nodeName = node.nodeName;
		var tmp_node = node;
		while (tmp_node = tmp_node.previousSibling) {
			if (tmp_node.nodeName == nodeName) nodeNumber++;
		}
		nodePath = nodeNumber + "." + nodeName + " " + nodePath;
	}
	return nodePath;
}
function contenteditable_selection_bookmark_path_node(node, nodePath) {
	var nodePathSteps = nodePath.split(" ");
	for (var i=0; i<nodePathSteps.length; i++) {
		var parts = nodePathSteps[i].split(".");
		var nodeNumber = parseInt(parts[0]);
		var nodeName = parts[1];
		var childNode = node.firstChild;
		if (childNode.nodeName == nodeName) nodeNumber--;
		while (nodeNumber && (childNode = childNode.nextSibling)) {
			if (childNode.nodeName == nodeName) nodeNumber--;
		}
		if (childNode) {
			node = childNode;
		} else {
		}
	}
	return node;
}




function contenteditable_setContent_body(content, id, iframe) {
	if (iframe && iframe.contentWindow && iframe.contentWindow.document && iframe.contentWindow.document.body) {
		iframe.contentWindow.document.body.innerHTML = content;
		contenteditable_setBody(iframe.contentWindow.document.body, iframe.id);
	}
}

function contenteditable_insertNodeAtSelection(contentWindow, insertNode, insertHTML) {
	var insertedNode = insertNode;

	// get current selection
	var selection = contenteditable_selection(contentWindow);
	var selectionBaseNode;
	var selectionBaseOffset;
	var selectionExtentNode;
	var selectionExtentOffset;
	if (false && selection.baseNode) {
		selectionBaseNode = selection.baseNode;
		selectionBaseOffset = selection.baseOffset;
		selectionExtentNode = selection.extentNode;
		selectionExtentOffset = selection.extentOffset;
	} else {
		selectionBaseNode = webeditor.contentSelectionBaseNode[contenteditable_focused];
		selectionBaseOffset = webeditor.contentSelectionBaseOffset[contenteditable_focused];
		selectionExtentNode = webeditor.contentSelectionExtentNode[contenteditable_focused];
		selectionExtentOffset = webeditor.contentSelectionExtentOffset[contenteditable_focused];
	}
	if ((selectionBaseNode == selectionExtentNode) && (selectionBaseOffset > selectionExtentOffset)) {
		var tmp = selectionBaseOffset;
		selectionBaseOffset = selectionExtentOffset;
		selectionExtentOffset = tmp;
	}

	// get the first range of the selection
	// (there's almost always only one range)
	var range = contenteditable_selection_range(selection);
	var range;
	try {
//		range = selection.getRangeAt(0);
	} catch(e) {
//		range = contenteditable_createrange();
//		range.selectNodeContents(contenteditable_focused_document().body);
//		range.collapse(1);
	}

	// deselect everything
//	if (selection) selection.removeAllRanges();

	// get current selection's parent
	var parentnode = contenteditable_selection_container();
	var parentparentnode = parentnode.parentNode;
	var parentpos = 0;
	var parentBaseNode = selectionBaseNode;
	var parentExtentNode = selectionExtentNode;
	while (parentBaseNode && (parentBaseNode.parentNode != parentnode)) {
		parentBaseNode = parentBaseNode.parentNode;
	}
	while (parentExtentNode && (parentExtentNode.parentNode != parentnode)) {
		parentExtentNode = parentExtentNode.parentNode;
	}
	for (var i=0; i<parentnode.childNodes.length; i++) {
		if ((parentnode.childNodes[i] == parentBaseNode) || (parentnode.childNodes[i] == parentExtentNode)) {
			parentpos = i;
			break;
		}
	}

	// remove content of current selection from document
	if (selection.type == 'Range') {
//		contenteditable_focused_document().execCommand("delete", false, false);
//		// Safari may also delete unselected blank char before/after selection
//		if ((range.startContainer.nodeType == 3) && (range.startContainer == range.endContainer) && range.startOffset && (range.startContainer.nodeValue.charAt(range.startOffset-1) == " ")) {
//			contenteditable_focused_document().execCommand("delete", false, false);
//			contenteditable_focused_document().execCommand("insertText", false, " ");
//		} else if ((range.startContainer.nodeType == 3) && (range.startContainer == range.endContainer) && range.endOffset && (range.startContainer.nodeValue.charAt(range.endOffset) == " ")) {
//			// TO DO - reinsert deleted blank after inserted content
//			contenteditable_focused_document().execCommand("delete", false, false);
//		} else {
//			contenteditable_focused_document().execCommand("delete", false, false);
//		}
		if ((selectionBaseNode != selectionExtentNode) || (selectionBaseOffset != selectionExtentOffset) || (contenteditable_selection_text() != "")) {
			// Safari INSERTTEXT may not clear text selection
			try {
				contenteditable_focused_document().execCommand("insertText", false, "");
			} catch(e) {
			}
			if (contenteditable_selection_text() != "") {
				try {
					contenteditable_focused_document().execCommand("paste", false, "");
				} catch(e) {
				}
			}
			if (contenteditable_selection_text() != "") {
				try {
					contenteditable_focused_document().execCommand("cut", false, "");
				} catch(e) {
				}
			}
			if (contenteditable_selection_text() != "") {
				try {
					contenteditable_focused_document().execCommand("delete", false, "");
				} catch(e) {
				}
			}
			selection = contenteditable_selection(contentWindow);
			if ((selectionBaseNode == selectionExtentNode) && (! selectionBaseNode.parentNode) && (! parentnode.parentNode)) {
				parentnode = parentparentnode;
				selectionBaseNode = selection.baseNode;
				selectionBaseOffset = selection.baseOffset;
				selectionExtentNode = selection.extentNode;
				selectionExtentOffset = selection.extentOffset;
			} else if ((selectionBaseNode == selectionExtentNode) && (! selectionBaseNode.parentNode)) {
				selectionBaseNode = parentnode;
				selectionBaseOffset = 0;
				selectionExtentNode = parentnode;
				selectionExtentOffset = 0;
			} else if (true && selection.baseNode) {
				selectionBaseNode = selection.baseNode;
				selectionBaseOffset = selection.baseOffset;
				selectionExtentNode = selection.extentNode;
				selectionExtentOffset = selection.extentOffset;
			} else {
				selectionBaseNode = webeditor.contentSelectionBaseNode[contenteditable_focused];
				selectionBaseOffset = webeditor.contentSelectionBaseOffset[contenteditable_focused];
				selectionExtentNode = webeditor.contentSelectionExtentNode[contenteditable_focused];
				selectionExtentOffset = webeditor.contentSelectionExtentOffset[contenteditable_focused];
			}
			if ((selectionBaseNode == selectionExtentNode) && (selectionBaseOffset > selectionExtentOffset)) {
				var tmp = selectionBaseOffset;
				selectionBaseOffset = selectionExtentOffset;
				selectionExtentOffset = tmp;
			}
		}
	}

	// get location of current selection
	var container = selectionBaseNode;
	var pos = selectionBaseOffset;
	if ((selectionBaseNode.nodeType != 3) && selectionBaseNode.nextSibling && (selectionBaseOffset > selectionBaseNode.childNodes.length)) {
		container = selectionBaseNode.nextSibling;
		pos = 0;
//		selection.setBaseAndExtent(container, pos, selectionExtentNode, selectionExtentOffset);
	}
	if (false && parentnode && parentnode.parentNode && (selectionBaseNode == selectionExtentNode) && (selectionBaseOffset == 0) && (selectionExtentOffset == 0)) {
//		container = parentnode;
//		pos = parentpos;
		container = selectionBaseNode.parentNode;
		for (var i=0; i<container.childNodes.length; i++) {
			if (container.childNodes[i] == selectionBaseNode) {
				pos = i;
				break;
			}
		}
		if ((! container.childNodes[pos]) || (parentnode.nodeName == "BODY")) {
			container = parentnode;
			pos = parentpos;
		}
	}

	// make a new range for the new selection
	range = contenteditable_createrange();

	if ((container.nodeType == 3) && (insertNode.nodeType == 3)) {
		// if we insert text in a textnode, do optimized insertion
		if (contenteditable_selection_text() != "") {
			container.replaceData(selection.baseOffset, selection.extentOffset-selection.baseOffset, insertNode.nodeValue);
		} else {
			container.insertData(pos, insertNode.nodeValue);
		}

		// put cursor after inserted text
		selection.setBaseAndExtent(container, pos+insertNode.length, container, pos+insertNode.length);

		insertedNode = container;
	} else {
		var afterNode;
		if (container.nodeType==3) {
			// when inserting into a textnode
			// we create 2 new textnodes
			// and put the insertNode in between

			var textNode = container;
			container = textNode.parentNode;
			var text = textNode.nodeValue;

			// text before the split
			var textBefore = text.substr(0,pos);
			// text after the split
			var textAfter = text.substr(pos);

			if (! textAfter) {
				if (textNode.nextSibling) {
					afterNode = textNode.nextSibling;
					container.insertBefore(insertNode, textNode.nextSibling);
				} else {
					afterNode = container.nextSibling;
					container.appendChild(insertNode);
				}
			} else {
				var beforeNode = contentWindow.document.createTextNode(textBefore);
				afterNode = contentWindow.document.createTextNode(textAfter);
	
				// insert the 3 new nodes before the old one
// Safari may crash if old node is removed - maybe because selection still references the removed node - so replace the old node's text instead of replacing the node
//				container.insertBefore(afterNode, textNode);
//				container.insertBefore(insertNode, afterNode);
//				container.insertBefore(beforeNode, insertNode);
				container.insertBefore(beforeNode, textNode);
				container.insertBefore(insertNode, textNode);
//				container.insertBefore(afterNode, textNode);
	
				// remove the old node
// Safari may crash if old node is removed - maybe because selection references the removed node - so replace the old node's text instead of replacing the node
//				container.removeChild(textNode);
				textNode.nodeValue = afterNode.nodeValue;
			}

			insertedNode = insertNode;
		} else {
			// else simply insert the node
			afterNode = container.childNodes[pos];
			if (afterNode) {
				container.insertBefore(insertNode, afterNode);
				insertedNode = insertNode;
			} else {
				try {
//					if (container.canHaveChildren) {
//					if ((container.hasChildNodes()) || (container.tagName == "BODY")) {
					if ((container.tagName != "AREA") && (container.tagName != "BGSOUND") && (container.tagName != "BR") && (container.tagName != "FRAME") && (container.tagName != "HR") && (container.tagName != "IMG") && (container.tagName != "INPUT") && (container.tagName != "SPACER") && (container.tagName != "WBR")) {
						container.appendChild(insertNode);
						insertedNode = insertNode;
					} else {
						container.parentNode.insertBefore(insertNode, container);
					}
				} catch(e) {
					var parentNode = container.parentNode;
					parentNode.replaceChild(insertNode, container);
					insertedNode = insertNode;
				}
			}
		}
		if (afterNode) {
			selection.setBaseAndExtent(afterNode, 0, afterNode, 0);
			// Safari may not position the caret/cursor when setting selection at start of text node - set after inserted node instead
			if (insertedNode && (! insertedNode.firstChild) && afterNode.nodeType == 3) {
				for (var i=0; i<insertedNode.parentNode.childNodes.length; i++) {
					if (insertedNode == insertedNode.parentNode.childNodes[i]) {
						selection.setBaseAndExtent(insertedNode.parentNode, i+1, insertedNode.parentNode, i+1);
					}
				}
			}
			return insertedNode;
		}
	}
	contenteditable_selection_node(insertedNode);
	return insertedNode;
}

function contenteditable_insertNodeAroundSelection(contentWindow, insertNode, insertHTML) {
	var contentSelection = contenteditable_selection();
	if (typeof(contentSelection) == "object") {
		var range = contenteditable_selection_range(contentSelection);
		var startcontainer = range.startContainer;
		var startoffset = range.startOffset;
		var endcontainer = range.endContainer;
		var endoffset = range.endOffset;
		if ((startcontainer.tagName == "BODY") && (endcontainer.tagName == "BODY")) {
			startcontainer = startcontainer.childNodes[startoffset];
			startoffset = 0;
			if (endcontainer.childNodes[endoffset]) {
				endcontainer = endcontainer.childNodes[endoffset];
			} else {
				endcontainer = endcontainer.childNodes[endoffset-1];
			}
			endoffset = endcontainer.childNodes.length || 1;
		}
		if ((startcontainer == endcontainer) && (startoffset != endoffset) && (startcontainer.nodeType == 3)) { // TEXT NODE
			if ((startoffset == 0) && (endoffset == startcontainer.nodeValue.length) && (startcontainer.parentNode.nodeName == "SPAN") && (startcontainer.parentNode.childNodes.length == 1)) {
				insertNode.appendChild(contentWindow.document.createTextNode(startcontainer.nodeValue.substring(startoffset, endoffset)));
				contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), insertNode);
			} else {
				insertNode.appendChild(contentWindow.document.createTextNode(startcontainer.nodeValue.substring(startoffset, endoffset)));
				contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), insertNode);
			}
		} else if (startcontainer != endcontainer) {
			if ((startcontainer.nodeType == 3) && (startoffset != 0)) {
				var node = startcontainer.cloneNode(true);
				node.nodeValue = node.nodeValue.substring(0, startoffset);
				startcontainer.parentNode.insertBefore(node, startcontainer);
			}

			if ((endcontainer.nodeType == 3) && (endoffset != 0)) {
				var node = endcontainer.cloneNode(true);
				node.nodeValue = node.nodeValue.substring(endoffset);
				if (endcontainer.nextSibling) {
					endcontainer.parentNode.insertBefore(node, endcontainer.nextSibling);
				} else {
					endcontainer.parentNode.appendChild(node);
				}
			}

			startcontainer.parentNode.insertBefore(insertNode,startcontainer);

			var nextnode;
			for (var node = startcontainer; node && (node != endcontainer); node = nextnode) {
				nextnode = node.nextSibling;
				insertNode.appendChild(node);
			}
			insertNode.appendChild(endcontainer);

			startcontainer.nodeValue = startcontainer.nodeValue.substring(startoffset);
			endcontainer.nodeValue = endcontainer.nodeValue.substring(0, endoffset);
		} else if (startoffset != endoffset) {
			startcontainer.parentNode.insertBefore(insertNode,startcontainer);
			for (var j=startoffset; j<endoffset; j++) {
//				var node = startcontainer.childNodes[j];
				var node = startcontainer.childNodes[startoffset];
//				if (node.nodeType == 3) node = node.parentNode; // TEXT NODE
				insertNode.appendChild(node);
			}
		} else {
			// surround entire parent node
			if (false) {
				var node = range.commonAncestorContainer;
				node.parentNode.insertBefore(insertNode,node);
				insertNode.appendChild(node);
			}

			// surround dummy text
			if (false) {
				var node = contenteditable_focused_contentwindow().document.createTextNode(".....");
				insertNode.appendChild(node);
				contenteditable_insertNodeAtSelection(contentWindow, insertNode);
			}
		}
	}
}





function contenteditable_useCSS() {
}

function contenteditable_BlockDirLTR(id) {
	webeditor.direction = "ltr";
	contenteditable_focused_contentwindow().document.dir = 'ltr';
}

function contenteditable_BlockDirRTL(id) {
	webeditor.direction = "rtl";
	contenteditable_focused_contentwindow().document.dir = 'rtl';
}





function contenteditable_formatblock_query() {
	var formatblock = ('' + contenteditable_focused_document().queryCommandValue("formatblock")).toLowerCase();
	if (formatblock == 'false') {
		formatblock = contenteditable_selection_range_parentNode().nodeName;
	}
	return formatblock;
}
function contenteditable_selection_container_list() {
	var list;
	if (list = contenteditable_selection_container('ul')) {
	} else if (list = contenteditable_selection_container('ol')) {
	} else if (list = contenteditable_selection_container('dir')) {
	} else if (list = contenteditable_selection_container('menu')) {
	} else if (list = contenteditable_selection_container('dl')) {
	}
	return list;
}
function contenteditable_selection_container_listitem() {
	var listitem;
	if (listitem = contenteditable_selection_container('li')) {
	} else if (listitem = contenteditable_selection_container('dt')) {
	} else if (listitem = contenteditable_selection_container('dd')) {
	}
	return listitem;;
}



function contenteditable_formatblock(command,value) {
	if (value == "<ol>") {
		var list = contenteditable_formatblock_list("ol");
		contenteditable_formatblock_listitems(list,"li");
	} else if (value == "<ul>") {
		var list = contenteditable_formatblock_list("ul");
		contenteditable_formatblock_listitems(list,"li");
	} else if (value == "<dir>") {
		var list = contenteditable_formatblock_list("dir");
		contenteditable_formatblock_listitems(list,"li");
	} else if (value == "<menu>") {
		var list = contenteditable_formatblock_list("menu");
		contenteditable_formatblock_listitems(list,"li");
	} else if (value == "<dt>") {
		var list = contenteditable_selection_container_list();
		if (list.nodeName == "dl") {
			contenteditable_formatblock_listitem("dt");
		} else {
			list = contenteditable_formatblock_list("dl");
			contenteditable_formatblock_listitems(list,"dt");
		}
	} else if (value == "<dd>") {
		var list = contenteditable_selection_container_list();
		if (list.nodeName == "dl") {
			contenteditable_formatblock_listitem("dd");
		} else {
			list = contenteditable_formatblock_list("dl");
			contenteditable_formatblock_listitems(list,"dd");
		}
	} else if (value == "<p>") {
		// applying normal/p to lists and list items does not work
		// approximate it by getting rid of the list completely
		// not ideal - but better than lists that are stuck
		var list = contenteditable_selection_container_list();
		if (list) {
			list = contenteditable_formatblock_list("");
		} else {
			contenteditable_execcommand(command,value);
		}
	} else {
		if (webeditor.fixExeccommandFormatblock_Paste) {
			var text = contenteditable_selection_text();
			if (! text) {
				var range = contenteditable_selection_range();
				var node = range.startContainer;
				while (node.firstChild) node = node.firstChild;
				contenteditable_selection_node(node);
				text = contenteditable_selection_text();
			}
			if (! text) text = '&nbsp;';
			contenteditable_event_paste_do_pre();
			contenteditable_pasteContent(value + text + '</' + value.substring(1));
			contenteditable_event_paste_do_post();
			contenteditable_event_paste_fix();
			if (webeditor.fixExeccommandFormatblock_Paste_DOM_fix) {
				contenteditable_DOM_fix();
			}
			return;
		}
		contenteditable_execcommand(command,value);
	}
}
function contenteditable_formatblock_list(value) {
	var list = contenteditable_selection_container_list();
	if (! list) {
		contenteditable_execcommand("insertunorderedlist");
		list = contenteditable_selection_container('ul');
	}
	if (list && value) {
		var new_list = contenteditable_focused_contentwindow().document.createElement(value);
		for (var element=list.firstChild; element; element=element.nextSibling) {
			var new_element = element.cloneNode(true);
			new_list.appendChild(new_element);
		}
		list.parentNode.replaceChild(new_list,list);
		return new_list;
	} else if (list) {
		// remove list
		var new_list = contenteditable_focused_contentwindow().document.createElement("p");
		for (var element=list.firstChild; element; element=element.nextSibling) {
			for (var subelement=element.firstChild; subelement; subelement=subelement.nextSibling) {
				var new_subelement = subelement.cloneNode(true);
				new_list.appendChild(new_subelement);
			}
			new_list.appendChild(contenteditable_focused_contentwindow().document.createElement("br"));
			new_list.appendChild(contenteditable_focused_contentwindow().document.createTextNode("\r\n"));
		}
		list.parentNode.replaceChild(new_list,list);
		return new_list;
	}
}
function contenteditable_formatblock_listitem(value) {
	var listitem = contenteditable_selection_container_listitem();
	if (listitem) {
		var new_listitem = contenteditable_focused_contentwindow().document.createElement(value);
		for (var element=listitem.firstChild; element; element=element.nextSibling) {
			var new_element = element.cloneNode(true);
			new_listitem.appendChild(new_element);
		}
		listitem.parentNode.replaceChild(new_listitem,listitem);
		return new_listitem;
	}
}
function contenteditable_formatblock_listitems(list,value) {
	if (list) {
		for (var listitem=list.firstChild; listitem; listitem=listitem.nextSibling) {
			if ((listitem.nodeName == "LI") || (listitem.nodeName == "DT") || (listitem.nodeName == "DD")) {
				var new_listitem = contenteditable_focused_contentwindow().document.createElement(value);
				for (var element=listitem.firstChild; element; element=element.nextSibling) {
					var new_element = element.cloneNode(true);
					new_listitem.appendChild(new_element);
				}
				list.replaceChild(new_listitem,listitem);
				listitem = new_listitem;
			}
		}
	}
}



function contenteditable_formatclass(command,value) {
	if (webeditor.fixFormatclass_Paste) {
		var text = contenteditable_selection_text() || '&nbsp;';
		contenteditable_event_paste_do_pre();
		contenteditable_pasteContent('<span class="' + value + '">' + text + '</span>');
		contenteditable_event_paste_do_post();
		contenteditable_event_paste_fix();
		return;
	}
	if (webeditor.fixFormatclass_DOM) {
		var range = contenteditable_selection_range();
		var text = contenteditable_selection_text();

		if ((range.startContainer == range.endContainer) && (range.startOffset != range.endOffset) && (range.startContainer.nodeType == 3)) {
			var pre = range.startContainer.cloneNode(true);
			pre.nodeValue = pre.nodeValue.substring(0, range.startOffset);
			range.startContainer.parentNode.insertBefore(pre, range.startContainer);

			var node = contenteditable_focused_contentwindow().document.createElement("span");
			node.className = value;
			range.startContainer.parentNode.insertBefore(node, range.startContainer);

			var post = range.startContainer.cloneNode(true);
			post.nodeValue = post.nodeValue.substring(range.endOffset);
			range.startContainer.parentNode.insertBefore(post, range.startContainer);

			range.startContainer.nodeValue = range.startContainer.nodeValue.substring(range.startOffset, range.endOffset);
			node.appendChild(range.startContainer);
		} else {
			contenteditable_selection_range_parentNode().className = value;
		}
		return;
	}
	var contentSelection = contenteditable_selection();
	if (typeof(contentSelection) == "object") {
		var range = contenteditable_selection_range(contentSelection);
		if ((range.startContainer == range.endContainer) && (range.startOffset != range.endOffset) && (range.startContainer.nodeType == 3)) { // TEXT NODE
//			if ((range.startOffset == 0) && (range.endOffset == range.startContainer.nodeValue.length) && (range.startContainer.parentNode.nodeName == "SPAN") && (range.startContainer.parentNode.childNodes.length == 1)) {
			if ((range.startOffset == 0) && (range.endOffset == range.startContainer.nodeValue.length) && (range.startContainer.parentNode.nodeName != "BODY") && (range.startContainer.parentNode.childNodes.length == 1)) {
				contenteditable_formatclass_attribute(range.startContainer.parentNode, value);
			} else {
				var node = contenteditable_focused_contentwindow().document.createElement("span");
				contenteditable_formatclass_attribute(node, value);
				node.appendChild(contenteditable_focused_contentwindow().document.createTextNode(range.startContainer.nodeValue.substring(range.startOffset, range.endOffset)));
				contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), node);
			}
		} else if (range.startContainer != range.endContainer) {
			var node = range.startContainer;
			var startcontainer = range.startContainer;
			if (startcontainer.nodeType == 3) { // TEXT NODE
				if (range.startOffset < startcontainer.nodeValue.length) {
					startcontainer = startcontainer.parentNode;
				} else {
					startcontainer = startcontainer.nextSibling;
				}
			}
			var endcontainer = range.endContainer;
			if (endcontainer.nodeType == 3) { // TEXT NODE
				if (range.endOffset > 0) {
					endcontainer = endcontainer.parentNode;
				} else {
					endcontainer = endcontainer.previousSibling;
				}
			}
			for (var node = startcontainer; node != null; node = node.nextSibling) {
				contenteditable_formatclass_attribute(node, value);
				if (node == endcontainer) break;
			}
		} else if (range.startContainer && (range.startContainer.nodeName == "BODY")) {
			var node = contenteditable_focused_contentwindow().document.createElement("span");
			contenteditable_formatclass_attribute(node, value);
			for (var j=range.startOffset; j<range.endOffset; j++) {
				var childnode = range.startContainer.childNodes[range.startOffset];
				node.appendChild(childnode);
			}
			contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), node);
		} else if (range.startOffset != range.endOffset) {
			for (var j=range.startOffset; j<range.endOffset; j++) {
				var node = range.startContainer.childNodes[range.startOffset];
				if (node.nodeType == 3) node = node.parentNode; // TEXT NODE
				contenteditable_formatclass_attribute(node, value);
			}
		} else {
			var node = range.commonAncestorContainer;
			if (node) {
				while ((node != null) && (node.nodeType == 3)) { node = node.parentNode; } // TEXT NODE
				contenteditable_formatclass_attribute(node, value);
			}
		}
	}
}





function contenteditable_execcommand(command, value) {
		var text = contenteditable_selection_text() || '&nbsp;';
		var content = "";
		switch(command) {
		case "inserthorizontalrule":
			if (webeditor.fixExeccommandInserthorizontalrule_DOM) {
				var node = contenteditable_focused_contentwindow().document.createElement("hr");
				contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), node);
				return;
			}
		case "strikethrough":
			if (webeditor.fixExeccommandStrikethrough_DOM) {
				text = contenteditable_selection_text();
				if (text) {
					var node = contenteditable_focused_contentwindow().document.createElement("strike");
					contenteditable_insertNodeAroundSelection(contenteditable_focused_contentwindow(), node);
				}
				return;
			}
		case "insertorderedlist":
			if (webeditor.fixExeccommandInsertorderedlist_DOM) {
				var node = contenteditable_selection_container("ol");
				if (node && (node.nodeName == "OL")) {
					var listnodes = new Array();
					for (var listnode=node.firstChild; listnode; listnode=listnode.nextSibling) {
						if (listnode.nodeName == "LI") {
							listnodes[listnodes.length] = listnode;
						}
					}
					for (var i=0; i<listnodes.length; i++) {
						var brnode = contenteditable_focused_contentwindow().document.createElement("br");
						if (listnodes[i].nextSibling) {
							listnodes[i].parentNode.insertBefore(brnode,listnodes[i].nextSibling);
						} else {
							listnodes[i].parentNode.appendChild(brnode);
						}
						contenteditable_remove_parentnode(listnodes[i]);
					}
					contenteditable_remove_parentnode(node);
					return;
				} else {
					text = contenteditable_selection_text() || '';
					var node = contenteditable_focused_contentwindow().document.createElement("ol");
					var node2 = contenteditable_focused_contentwindow().document.createElement("li");
					node.appendChild(node2);
					if (text.match(/<div[^>]*>/gi) || text.match(/<br[^>]*>/gi)) {
//						text = text.replace(/<br[^>]*>/gi, "");
						text = text.replace(/<br[^>]*>/gi, "</li><li>");
						text = text.replace(/<font[^>]*><\/font>/gi, "");
						text = text.replace(/<font[^>]*>/gi, "");
						text = text.replace(/<\/font>/gi, "");
						text = text.replace(/<div[^>]*>/gi, "</li><li>");
						text = text.replace(/<\/div>/gi, "");
						if (! text.match(/^<li>/gi)) {
							text = "<li>" + text;
						}
						if (! text.match(/<\/li>$/gi)) {
							text = text + "</li>";
						}
						text = text.replace(/<\/li><\/li>/gi, "");
						text = text.replace(/<li><li>/gi, "");
						text = text.replace(/<li><\/li>/gi, "");
						node.innerHTML = text;
					} else {
						node2.innerHTML = text;
					}
					node = contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), node);
					if (node && node.firstChild) {
						var selection = contenteditable_selection();
						selection.setBaseAndExtent(node.firstChild, 0, node.firstChild, 0);
					}
					return;
				}
			}
		case "insertunorderedlist":
			if (webeditor.fixExeccommandInsertunorderedlist_DOM) {
				var node = contenteditable_selection_container("ul");
				if (node && (node.nodeName == "UL")) {
					var listnodes = new Array();
					for (var listnode=node.firstChild; listnode; listnode=listnode.nextSibling) {
						if (listnode.nodeName == "LI") {
							listnodes[listnodes.length] = listnode;
						}
					}
					for (var i=0; i<listnodes.length; i++) {
						var brnode = contenteditable_focused_contentwindow().document.createElement("br");
						if (listnodes[i].nextSibling) {
							listnodes[i].parentNode.insertBefore(brnode,listnodes[i].nextSibling);
						} else {
							listnodes[i].parentNode.appendChild(brnode);
						}
						contenteditable_remove_parentnode(listnodes[i]);
					}
					contenteditable_remove_parentnode(node);
					return;
				} else {
					text = contenteditable_selection_text() || '';
					var node = contenteditable_focused_contentwindow().document.createElement("ul");
					var node2 = contenteditable_focused_contentwindow().document.createElement("li");
					node.appendChild(node2);
					if (text.match(/<div[^>]*>/gi) || text.match(/<br[^>]*>/gi)) {
//						text = text.replace(/<br[^>]*>/gi, "");
						text = text.replace(/<br[^>]*>/gi, "</li><li>");
						text = text.replace(/<font[^>]*><\/font>/gi, "");
						text = text.replace(/<font[^>]*>/gi, "");
						text = text.replace(/<\/font>/gi, "");
						text = text.replace(/<div[^>]*>/gi, "</li><li>");
						text = text.replace(/<\/div>/gi, "");
						if (! text.match(/^<li>/gi)) {
							text = "<li>" + text;
						}
						if (! text.match(/<\/li>$/gi)) {
							text = text + "</li>";
						}
						text = text.replace(/<\/li><\/li>/gi, "");
						text = text.replace(/<li><li>/gi, "");
						text = text.replace(/<li><\/li>/gi, "");
						node.innerHTML = text;
					} else {
						node2.innerHTML = text;
					}
					node = contenteditable_insertNodeAtSelection(contenteditable_focused_contentwindow(), node);
					if (node && node.firstChild) {
						var selection = contenteditable_selection();
						selection.setBaseAndExtent(node.firstChild, 0, node.firstChild, 0);
					}
					return;
				}
			}
		case "indent":
			if (webeditor.fixExeccommandIndent_DOM) {
				var listitem = contenteditable_selection_container('li');
				if (listitem) {
					var menu = contenteditable_selection_container('menu');
					var ol = contenteditable_selection_container('ol');
					var ul = contenteditable_selection_container('ul');
					if (menu) {
						var node = contenteditable_focused_contentwindow().document.createElement("menu");
						listitem.parentNode.insertBefore(node, listitem);
						node.appendChild(listitem);
					} else if (ol) {
						var node = contenteditable_focused_contentwindow().document.createElement("ol");
						listitem.parentNode.insertBefore(node, listitem);
						node.appendChild(listitem);
					} else { // ul
						var node = contenteditable_focused_contentwindow().document.createElement("ul");
						listitem.parentNode.insertBefore(node, listitem);
						node.appendChild(listitem);
					}
				} else {
					text = contenteditable_selection_text();
					if (! text) {
						var range = contenteditable_selection_range();
						contenteditable_selection_node(range.startContainer);
						text = contenteditable_selection_text();
					}
					if (text) {
						var node = contenteditable_focused_contentwindow().document.createElement("blockquote");
						contenteditable_insertNodeAroundSelection(contenteditable_focused_contentwindow(), node);
					}
				}
				return;
			}
		case "outdent":
			if (webeditor.fixExeccommandOutdent_DOM) {
				var blockquote = contenteditable_selection_container('blockquote');
				var menu = contenteditable_selection_container('menu');
				var ol = contenteditable_selection_container('ol');
				var ul = contenteditable_selection_container('ul');
				if (blockquote) {
					contenteditable_remove_parentnode(blockquote);
				} else if (menu) {
					contenteditable_remove_parentnode(menu);
				} else if (ol) {
					contenteditable_remove_parentnode(ol);
				} else if (ul) {
					contenteditable_remove_parentnode(ul);
				}
				return;
			}
		case "unlink":
			if (webeditor.fixExeccommandUnlink_DOM) {
				var a = contenteditable_selection_container('a');
				if (a) {
					contenteditable_remove_parentnode(a);
				} else {
					var selection = contenteditable_selection();
					if (selection.baseNode != selection.extentNode) {
						var linknode = new Array();
						var parentnode = contenteditable_selection_range_parentNode();
						for (var node = selection.baseNode; node && (node != parentnode) && (node != selection.extentNode); node = contenteditable_nextnode(parentnode, node)) {
							if (node.tagName == "A") {
								linknode[linknode.length] = node;
							}
						}
						for (var i=0; i<linknode.length; i++) {
							contenteditable_remove_parentnode(linknode[i]);
						}
					}
				}
				return;
			}
		case "find":
			if (webeditor.fixExeccommandFind_Alert) {
				return false;
			}
		case "paste":
			if (webeditor.fixExeccommandPaste_Alert) {
				return false;
			}
		case "selectall":
			var selection = contenteditable_selection();
			selection.setBaseAndExtent(contenteditable_focused_document().body, 0, contenteditable_focused_document().body, 1);
			return;
		case "delete":
			// Safari selection/range may not include first text formatting tags
			if ((webeditor.contentSelectionBaseNode[contenteditable_focused] = contenteditable_focused_document().body.firstChild) && (webeditor.contentSelectionBaseOffset[contenteditable_focused] == 0) && (webeditor.contentSelectionExtentNode[contenteditable_focused] = contenteditable_focused_document().body.lastChild) && (webeditor.contentSelectionExtentOffset[contenteditable_focused] == 1)) {
				contenteditable_focused_document().body.innerHTML = "";
				var selection = contenteditable_selection();
				selection.setBaseAndExtent(contenteditable_focused_document().body, 0, contenteditable_focused_document().body, 0);
				return;
			}
		default:
			try {
				if (webeditor.useCSS) contenteditable_useCSS();
				contenteditable_focused_document().execCommand(command, false, contenteditable_execcommand_value(command, value));
				// Safari context menu "cut" may not delete selected content
				if ((command == "cut") && (contenteditable_selection_text() != "")) {
					return false;
				}
				if (command == "removeformat") {
					if (webeditor.fixExeccommandRemoveformat_Fix) {
						contenteditable_execcommand_fix(command, value);
					}
				}
			} catch(e) {
				return false;
			}
			return true;
		}

		contenteditable_event_paste_do_pre();
		contenteditable_pasteContent(content);
		contenteditable_event_paste_do_post();
		contenteditable_event_paste_fix();
		if (webeditor.fixExeccommand_Paste_Fix) {
			contenteditable_execcommand_fix(command, value);
		}
		return true;
}

function contenteditable_execcommand_value(command, value) {
	if ((command == "fontsize") && (browserIs("Safari/31") || browserIs("Safari/41"))) {
		switch(value) {
		case "1": return "xx-small";
		case "2": return "x-small";
		case "3": return "small";
		case "4": return "medium";
		case "5": return "large";
		case "6": return "x-large";
		case "7": return "xx-large";
		default: return value;
		}
	} else {
		return value;
	}
}

function contenteditable_find(command) {
	if (contenteditable_execcommand(command)) {
		return true;
	} else {
		try {
			contenteditable_focused_contentwindow().find();
			return true;
		} catch (e) {
//			webeditor.find_window = window.open(webeditor.rootpath+"find.html?editor=webeditor&find=", "find_window", ",width=400,height=150,scrollbars=yes,resizable=yes,status=yes", true);
//			return true;
		}
	}
}

function contenteditable_print(command) {
	if (contenteditable_execcommand(command)) {
		return true;
	} else {
		try {
			contenteditable_focused_contentwindow().print();
			return true;
		} catch (e) {
			return false;
		}
	}
}

function contenteditable_specialcharacter(value) {
	var contentWindow = contenteditable_focused_contentwindow();
	if (value) {
		var a = contentWindow.document.createTextNode(value);
		var selection = contenteditable_selection();
		var range = contenteditable_selection_range(selection);
		contenteditable_insertNodeAtSelection(contentWindow, a);
	}
}





function contenteditable_position(state) {
	var element = contenteditable_positionable();
	if (state) {
		// OK
	} else if (element) {
		if (element.style.position == "absolute") {
			element.style.position = "";
			element.style.top = "";
			element.style.left = "";
			element.style.zIndex = "";
		} else {
			var top = contenteditable_position_offsetTop(element);
			var left = contenteditable_position_offsetLeft(element);
			var position = prompt("The current version of the Safari web browser does not support Drag & Drop of absolute positioned content elements.\r\n\r\nTo position the content item, please enter the top/left coordinate for the content item:", top+","+left);
			var coordinates = position.split(",");
			if (coordinates.length == 2) {
				top = coordinates[0];
				left = coordinates[1];
			}
			element.style.position = "absolute";
			if (top) element.style.top = top + "px";
			if (left) element.style.left = left + "px";
			element.style.zIndex = 1;
		}
		if (element.getAttribute("STYLE") == "") {
			element.removeAttribute("STYLE", 0);
		}
	}
}

function contenteditable_forwards() {
	var element = contenteditable_positionable();
	if (element) {
		if (element.style && element.style.zIndex && (element.style.zIndex < 1000000)) {
			element.style.zIndex = parseInt(element.style.zIndex) + 1;
		} else {
			element.style.zIndex = 1;
		}
	}
}

function contenteditable_backwards() {
	var element = contenteditable_positionable();
	if (element) {
		if (element.style && element.style.zIndex && (element.style.zIndex > -1000000)) {
			element.style.zIndex = parseInt(element.style.zIndex) - 1;
		} else {
			element.style.zIndex = -1;
		}
	}
}

function contenteditable_front() {
	var element = contenteditable_positionable();
	if (element) {
		zIndex = contenteditable_positionable_front_max();
		if (zIndex < 1000000) {
			zIndex++;
		} else {
			zIndex = 1000000;
		}
		element.style.zIndex = zIndex;
	}
}

function contenteditable_back() {
	var element = contenteditable_positionable();
	if (element) {
		zIndex = contenteditable_positionable_back_min();
		if (zIndex > -1000000) {
			zIndex--;
		} else {
			zIndex = -1000000;
		}
		element.style.zIndex = zIndex;
	}
}

function contenteditable_abovetext() {
	var element = contenteditable_positionable();
	if (element && element.style) {
		if (element.style.zIndex < 0) {
			element.style.zIndex = -element.style.zIndex;
		} else if (element.style.zIndex == 0) {
			element.style.zIndex = 1;
		}
	}
}

function contenteditable_belowtext() {
	var element = contenteditable_positionable();
	if (element && element.style) {
		if (element.style.zIndex > 0) {
			element.style.zIndex = -element.style.zIndex;
		} else if (element.style.zIndex == 0) {
			element.style.zIndex = -1;
		}
	}
}





function contenteditable_viewsource_onfocus(textarea) {
	textarea.removeEventListener("focus", contenteditable_onfocus[contenteditable_focused], true);
	textarea.addEventListener("focus", contenteditable_onfocus[contenteditable_focused], true);
	textarea.removeEventListener("blur", contenteditable_onblur[contenteditable_focused], true);
	textarea.addEventListener("blur", contenteditable_onblur[contenteditable_focused], true);
}

function contenteditable_viewsource_textarea2html(textarea, iframe) {
	var content = textarea.value;
	content = contenteditable_split_content(iframe.id, content);
	try {
		if (webeditor_custom_encode) content = webeditor_custom_encode(content);
	} catch(e) {
	}
	try {
		if (webeditor_custom_initialize) content = webeditor_custom_initialize(content);
	} catch(e) {
	}
	content = contenteditable_encodeScriptTags(content);
	content = webeditor_empty_content_fix(content);
	iframe.contentWindow.document.body.innerHTML = content;
contenteditable_setBody(iframe.contentWindow.document.body, iframe.id);
	iframe.contentWindow.document.removeEventListener("focus", contenteditable_onfocus[contenteditable_focused], true);
	iframe.contentWindow.document.addEventListener("focus", contenteditable_onfocus[contenteditable_focused], true);
	iframe.contentWindow.document.removeEventListener("blur", contenteditable_onblur[contenteditable_focused], true);
	iframe.contentWindow.document.addEventListener("blur", contenteditable_onblur[contenteditable_focused], true);
	if (webeditor.fixLinkOnUnload) {
		iframe.contentWindow.removeEventListener("unload", contenteditable_onunload_handler, true);
		iframe.contentWindow.addEventListener("unload", contenteditable_onunload_handler, true);
		iframe.contentWindow.document.body.removeEventListener("unload", contenteditable_onunload_handler, true);
		iframe.contentWindow.document.body.addEventListener("unload", contenteditable_onunload_handler, true);
	}
	if (webeditor.fixLinkOnClick) {
		iframe.contentWindow.document.removeEventListener("click", contenteditable_onclick_handler, true);
		iframe.contentWindow.document.addEventListener("click", contenteditable_onclick_handler, true);
	}
	iframe.contentWindow.document.removeEventListener("keydown", contenteditable_event, true);
	iframe.contentWindow.document.addEventListener("keydown", contenteditable_event, true);
	iframe.contentWindow.document.removeEventListener("keyup", contenteditable_event, true);
	iframe.contentWindow.document.addEventListener("keyup", contenteditable_event, true);
	iframe.contentWindow.document.removeEventListener("keypress", contenteditable_event, true);
	iframe.contentWindow.document.addEventListener("keypress", contenteditable_event, true);
	iframe.contentWindow.document.removeEventListener("mousedown", contenteditable_event, true);
	iframe.contentWindow.document.addEventListener("mousedown", contenteditable_event, true);
	iframe.contentWindow.document.removeEventListener("mouseup", contenteditable_event, true);
	iframe.contentWindow.document.addEventListener("mouseup", contenteditable_event, true);
	iframe.contentWindow.document.removeEventListener("drag", contenteditable_event, true);
	iframe.contentWindow.document.addEventListener("drag", contenteditable_event, true);
	if (webeditor.contextmenus) {
		iframe.contentWindow.document.removeEventListener("contextmenu", contenteditable_contextmenu, true);
		iframe.contentWindow.document.addEventListener("contextmenu", contenteditable_contextmenu, true);
	}

	// Safari links are active - add dummy "return false" actions
	if (webeditor.fixLinkOnClick_False_A_ONCLICK) {
		var links = iframe.contentWindow.document.getElementsByTagName("a");
		for (var i=0; i<links.length; i++) {
			links[i].setAttribute("onClick", "return parent.contenteditable_false();" + (links[i].getAttribute("onClick") || ""));
		}
	}
	if (webeditor.fixLinkOnClick_False_AREA_HREF) {
		var links = iframe.contentWindow.document.getElementsByTagName("area");
		for (var i=0; i<links.length; i++) {
			links[i].setAttribute("href", "javascript:return parent.contenteditable_false();" + (links[i].getAttribute("href") || ""));
		}
	}
}

function contenteditable_viewsource_show() {
	// old viewsource functionality using text encoding
}

function contenteditable_viewsource_hide() {
	// old viewsource functionality using text encoding
}

function contenteditable_iframe_hide(iframe) {
	// iframe.style.display = "none";
	iframe.style.overflow = "hidden";
	iframe.style.top = "0px";
	iframe.style.left = "0px";
	iframe.style.zIndex = -1;
	iframe.style.position = "absolute";
	iframe.style.opacity = "0";
}

function contenteditable_iframe_show(iframe) {
	iframe.style.display = "block";
	iframe.style.position = "static";
	iframe.style.opacity = "1";
}

function contenteditable_dropdown_hide(iframe) {
	iframe.style.top = "-1000px";
	iframe.style.left = "-1000px";
	iframe.style.zIndex = -1;
	iframe.style.opacity = "0";
}

function contenteditable_dropdown_show(iframe) {
	iframe.style.overflow = "hidden";
	iframe.style.opacity = "1";
}

function contenteditable_dropdown_hidden(iframe) {
	if (iframe.style.opacity == "0") {
		return true;
	} else {
		return false;
	}
}





function contenteditable_setAttribute(node, attribute, value) {
	if (webeditor.fixLinkOnClick_False_A_ONCLICK && (node.tagName.toUpperCase() == "A") && (attribute == "onclick")) {
		node.setAttribute("onClick", "return parent.contenteditable_false();" + (value || ""));
	} else if (webeditor.fixLinkOnClick_False_AREA_HREF && (node.tagName.toUpperCase() == "AREA") && (attribute == "href")) {
		node.setAttribute("href", "javascript:return parent.contenteditable_false();" + (value || ""));
	} else {
		node.setAttribute(attribute, value);
	}
}

function contenteditable_removeAttribute(node, attribute) {
	node.removeAttribute(attribute);
}

function contenteditable_getAttribute(node, attribute) {
	if (node) {
		var value = node.getAttribute(attribute) || "";
		if (webeditor.fixLinkOnClick_False_A_ONCLICK && (node.tagName.toUpperCase() == "A") && (attribute == "onclick")) {
			value = value.replace(/return parent\.contenteditable_false\(\);/g, "");
		} else if (webeditor.fixLinkOnClick_False_AREA_HREF && (node.tagName.toUpperCase() == "AREA") && (attribute == "href")) {
			value = value.replace(/javascript:return parent\.contenteditable_false\(\);/g, "");
		}
		return value;
	} else {
		return "";
	}
}





function contenteditable_cellRowSpan(cellnode) {
	return cellnode.rowSpan || 1;
}

function contenteditable_cellColSpan(cellnode) {
	return cellnode.colSpan || 1;
}

function contenteditable_cellIndex(cellnode) {
	var cellindex_offset = 0;
	for (var cellindex=0; cellindex<cellnode.parentNode.childNodes.length; cellindex++) {
		if (cellnode.nodeName != cellnode.parentNode.childNodes[cellindex].nodeName) {
			cellindex_offset++;
		} else if (cellnode == cellnode.parentNode.childNodes[cellindex]) {
			return cellindex-cellindex_offset;
		}
	}
	return cellnode.cellIndex;
}





function contenteditable_insertimage_fix(src, border, alt, width, height, vspace, hspace, align, htmlclass, htmlid, onmouseover, onmouseout, usemap) {
	if (webeditor.fixInsertimage_DOM) {
		contenteditable_DOM_fix();
	}
}



function contenteditable_insertmap_fix(node) {
	if (node && webeditor.fixLinkOnClick_False_AREA_HREF) {
		for (var i=0; i<node.childNodes.length; i++) {
			if (node.childNodes[i].tagName.toUpperCase() == "AREA") {
				contenteditable_setAttribute(node.childNodes[i], "href", contenteditable_getAttribute(node.childNodes[i], "href"));
			}
		}
	}
}



function contenteditable_insertlink_fix(node, href, target, text, htmlclass, htmlid, onclick, title) {
	if (node && webeditor.fixLinkOnClick_False_A_ONCLICK) {
		contenteditable_setAttribute(node, "onclick", "return parent.contenteditable_false();" + (onclick || ""));
	}
	if (webeditor.fixInsertlink_DOM) {
		contenteditable_DOM_fix();
	}
}



function contenteditable_execcommand_fix(command, value) {
	if (webeditor.fixExeccommand_DOM) {
		contenteditable_DOM_fix();
	}
}



function contenteditable_formatclass_fix() {
	if (webeditor.fixFormatclass_Paste_DOM) {
		contenteditable_DOM_fix();
	}
	if (webeditor.fixFormatclass_ViewSource) {
		var iframe = contenteditable_focused_iframe();
		var form = contenteditable_focused_form();
		var textarea = contenteditable_focused_textarea();
		contenteditable_viewsource(true);
		if (webeditor.refreshToolbarTimeout) clearTimeout(webeditor.refreshToolbarTimeout);
		webeditor.refreshToolbarTimeout = setTimeout(webeditor_refreshToolbar, 100);
		textarea.focus();
	}
}



function contenteditable_nobr_fix() {
	if (webeditor.fixNobr_DOM) {
		contenteditable_DOM_fix();
	}
}



function contenteditable_box_fix() {
	if (webeditor.fixBox_DOM) {
		contenteditable_DOM_fix();
	}
}



function contenteditable_mailto_fix() {
	if (webeditor.fixMailto_DOM) {
		contenteditable_DOM_fix();
	}
}



function contenteditable_anchor_fix() {
	if (webeditor.fixAnchor_DOM) {
		contenteditable_DOM_fix();
	}
}



function contenteditable_DOM_fix() {
	// ERROR:
	// content inserted/modified through DOM/innerHTML may be unselectable/uneditable and crash web browser if double-clicked
	// second time some content is inserted/modified through DOM/innerHTML web browser may crash
	// PROBLEM:
	// something in web browser/DOM may not have been updated correctly leaving loose pointers
	// WORKAROUND:
	// try to trick iframe to refresh DOM

	if (webeditor.fixDOM_ResetInnerHTML) {
		// ??? WORKING - MAC OS X 10.3: set innerHTML
		// NOT WORKING - MAC OS X 10.4: set innerHTML - fixes unselectable/uneditable first time - web browser crashes second time
		contenteditable_focused_contentwindow().document.body.innerHTML = contenteditable_focused_contentwindow().document.body.innerHTML;
	}
}



function contenteditable_cleanContent_fix() {
	var selection = contenteditable_selection();
	var range = contenteditable_selection_range(selection);

//	// Safari may loose content if cleaning selection (at: "node.innerHTML = content;") - always clean entire BODY
//	selection.setBaseAndExtent(contenteditable_focused_document().body, 0, contenteditable_focused_document().body, 0);
//	return;

	// Safari range/selection and content changes may be wrong if all content is selected - if selection is all content then undo selection to clean entire BODY instead of range/selection
	if ((range.startContainer == range.endContainer) && (selection.baseNode != selection.extentNode)) {
		if ((selection.baseNode == contenteditable_focused_document().body.firstChild) && (selection.extentNode == contenteditable_focused_document().body.lastChild)) {
			selection.setBaseAndExtent(contenteditable_focused_document().body.firstChild, 0, contenteditable_focused_document().body.firstChild, 0);
		}
	}

	// Safari may crash if cleaning across table rows/cells - expand selection to parent table/row
	if (table = contenteditable_isTable()) {
		var parentnode = contenteditable_selection_range_parentNode();
		while (parentnode && (parentnode.tagName != "TABLE") && (parentnode.tagName != "TR") && (parentnode.tagName != "TD")) {
			parentnode = parentnode.parentNode;
		
		}
		selection.setBaseAndExtent(parentnode, 0, parentnode, parentnode.childNodes.length);
	}
}



function contenteditable_formatContent_fix(content) {
	if (content == "<p>") {
		content = "<p>&nbsp;</p>";
	}
	if (webeditor.fixLinkOnClick_False_AREA_HREF) {
		content = content.replace(/javascript:return parent\.contenteditable_false\(\);/g, "");
		content = content.replace(/ onclick=""/g, "");
	}
	if (webeditor.fixLinkOnClick_False_A_ONCLICK) {
		content = content.replace(/ onclick="return parent\.contenteditable_false\(\);"/g, "");
		content = content.replace(/return parent\.contenteditable_false\(\);/g, "");
		content = content.replace(/ onclick=""/g, "");
	}
	return content;
}



function contenteditable_node_attributes_fix(attributes) {
	if ((webeditor.fixLinkOnClick_False_A_ONCLICK) || (webeditor.fixLinkOnClick_False_AREA_HREF)) {
		attributes = attributes.replace(/ onclick=""/g, "");
	}
	return attributes;
}



var contenteditable_preview_window;
var contenteditable_preview_head;
var contenteditable_preview_body;
var contenteditable_preview_content;
var contenteditable_preview_direction;

function contenteditable_preview_fix(preview_window, contenthead, contentbody, contentcontent) {
	// Safari may not display content correctly if written directly to the preview window
	contenteditable_preview_window = preview_window;
	contenteditable_preview_head = contenthead;
	contenteditable_preview_body = contentbody;
	contenteditable_preview_content = contentcontent;
	contenteditable_preview_direction = webeditor.direction;
	preview_window.document.location.href = webeditor.rootpath + "preview.html";
}



function contenteditable_pasteContent_node() {
	return contenteditable_focused_contentwindow().document.createElement("div");
}



function contenteditable_paste_fix_prepare() {
}



function contenteditable_paste_fix() {
}



function contenteditable_dragdrop_fix(node) {
}



function contenteditable_formatContentNodeHTML_fix(node) {
	return "";
}



function contenteditable_formatContentNodeXHTML_fix(node) {
	return "";
}





//	getRangeHTML and getNodeHTML based on:

//	File:		RangePatch1_3.js
//	Name:		Mozilla Range Implementation Patch
//	Version:	1.3
//	Author:		Jeffrey M. Yates
//	Contact:	PBWiz@PBWizard.com
//	Home:		http://www.pbwizard.com
//	Date:		25 March 2001

function getRangeHTML(range, selection) {
	var range_commonAncestorContainer = contenteditable_selection_commonAncestorContainer(selection);
	var rangeHTML = "";
	var node;
	if ((range_commonAncestorContainer.nodeName == "BODY") && (! range_commonAncestorContainer.firstChild)) {
		// empty
	} else if ((selection == "") && range.startContainer && (range.startContainer == range.endContainer) && (range.startOffset == range.endOffset)) {
		// empty
	} else if ((selection != "") && range.startContainer && (range.startContainer == range.endContainer) && (range.startOffset == range.endOffset)) {
		node = selection.extentNode;
		var selectioncontainer = contenteditable_selection_container();
		while (node) {
			rangeHTML += getNodeHTML(node, false, selection);
			if (node == selection.baseNode) {
				break;
			}
			nextnode = contenteditable_nextnode(false, node, true);
			while (node = contenteditable_nextnode(false, node)) {
				if (node == selection.baseNode) {
					rangeHTML += getNodeHTML(nextnode, false, selection);
					node = false;
				} else if (node == nextnode) {
					break;
				}
			}
		}
		if (! rangeHTML) rangeHTML = "" + selection;
	} else if (node = range_commonAncestorContainer.firstChild) {
		while (node) {
			rangeHTML += "" + getNodeHTML(node, range, selection);
			node = node.nextSibling;
		}
	} else {
		rangeHTML += "" + getNodeHTML((selection.baseNode || webeditor.contentSelectionBaseNode[contenteditable_focused]), range, selection);
	}
	return rangeHTML;
}

function getNodeHTML(node, range, selection) {
	if (range && (! nodeInRange(node, range))) return '';
	if ((! node) || (! node.nodeType)) return '';
	var selection_baseNode;
	var selection_baseOffset;
	var selection_extentNode;
	var selection_extentOffset;
	var START_TO_START = 0;
	var START_TO_END = 1;
	var END_TO_END = 2;
	var END_TO_START = 3;
	var startrange = contenteditable_createrange();
	startrange.selectNode(selection.baseNode);
	var endrange = contenteditable_createrange();
	endrange.selectNode(selection.extentNode);
	if (startrange.compareBoundaryPoints(START_TO_START,endrange) == 1) {
		selection_baseNode = selection.extentNode;
		selection_extentNode = selection.baseNode;
		selection_baseOffset = selection.extentOffset;
		selection_extentOffset = selection.baseOffset;
	} else {
		selection_baseNode = selection.baseNode;
		selection_extentNode = selection.extentNode;
		selection_baseOffset = selection.baseOffset;
		selection_extentOffset = selection.extentOffset;
	}
	switch(node.nodeType) {
	case 1: // ELEMENT_NODE
		var nodeHTML = '';
		var selection_baseOffset;
		var selection_extentOffset;
		if ((selection_baseNode == selection_extentNode) && (selection_baseOffset > selection_extentOffset)) {
			selection_baseOffset = selection_extentOffset;
			selection_extentOffset = selection_baseOffset;
		} else {
			selection_baseOffset = selection_baseOffset;
			selection_extentOffset = selection_extentOffset;
		}
		if ((node != selection_baseNode) || (selection_baseOffset == 0)) {
			nodeHTML += '<' + node.nodeName;
			for (var i = 0; i < node.attributes.length; i++) {
				if (node.attributes.item(i) && node.attributes.item(i).specified) {
//					nodeHTML += ' ' + getNodeHTML(node.attributes.item(i), null, null);
					nodeHTML += ' ' + node.attributes.item(i).name + '="' + node.attributes.item(i).value + '"';
				}
			}
			nodeHTML += '>';
		}
		if (node.hasChildNodes() || (node.tagName == "TEXTAREA")) {
			var childnode = node.firstChild;
			while (childnode) {
				nodeHTML += getNodeHTML(childnode, range, selection);
				childnode = childnode.nextSibling;
			}
			if ((node != selection_baseNode) || (selection_baseOffset == 0)) {
				nodeHTML += '</' + node.nodeName + '>';
			}
		}
		return nodeHTML;

	case 2: // ATTRIBUTE_NODE
		var nodeHTML = '';
		if (node.specified && (node.nodeName == 'class') && ((node.nodeValue == 'Apple-style-span') || (node.nodeValue == 'khtml-block-placeholder') || (node.nodeValue == 'webkit-block-placeholder'))) {
			// ignore
		} else if (node.specified) {
			nodeHTML += node.nodeName + '="' + node.nodeValue + '"';
		}
		return nodeHTML;

	case 3: // TEXT_NODE
		var nodeHTML = node.data;
		if (range) {
			var selection_baseOffset;
			var selection_extentOffset;
			if ((selection_baseNode == selection_extentNode) && (selection_baseOffset > selection_extentOffset)) {
				var temp = selection_baseOffset;
				selection_baseOffset = selection_extentOffset;
				selection_extentOffset = temp;
			}
			if (node == selection_extentNode) {
				nodeHTML = nodeHTML.substring(0, selection_extentOffset);
			}
			if (node == selection_baseNode) {
				nodeHTML = nodeHTML.substring(selection_baseOffset, nodeHTML.length+1);
			}
			// Safari selection containers+offsets may point to empty selection although some text is selected - use selection text if inconsistency
			if ((selection != "") && (node == selection_baseNode) && (node == selection_extentNode) && (selection_baseOffset == selection_extentOffset)) {
				nodeHTML = "" + selection;
			}
		}
		return nodeHTML;

	case 4: // CDATA_SECTION_NODE
		var nodeHTML = node.data;
		if (range) {
			if (node == selection_extentNode) {
				nodeHTML = nodeHTML.substring(0, selection_extentOffset);
			}
			if (node == selection_baseNode) {
				nodeHTML = nodeHTML.substring(selection_baseOffset, nodeHTML.length+1);
			}
		}
		return '<![CDATA[' + nodeHTML + ']]>';
	
	case 5: // ENTITY_REFERENCE_NODE
		return '&' + node.nodeName + ';';
	
	case 6: // ENTITY_NODE
		var nodeHTML = '<!ENTITY ' + node.nodeName;
		if( node.publicId ){
			nodeHTML += ' PUBLIC "' + node.publicId + '"';
			if (node.systemId) {
				nodeHTML += ' "' + node.systemId + '"';
			}
			if (node.notationName) {
				nodeHTML += ' NDATA ' + node.notationName;
			}
		} else if( node.systemId ) {
			nodeHTML += ' SYSTEM "' + node.systemId + '"';
			if( node.notationName ) {
				nodeHTML += ' NDATA ' + node.notationName;
			}
		} else {
			nodeHTML += '"';
			var childnode = node.firstChild;
			while (childnode) {
				nodeHTML += getNodeHTML(childnode, range, selection);
				childnode = childnode.nextSibling;
			}
			nodeHTML += '"';
		}
		return nodeHTML + '>';

	case 7: // PROCESSING_INSTRUCTION_NODE
		var nodeHTML = '<?' + node.target + ' ' + node.data + '?>';
		return nodeHTML;
			
	case 8: // COMMENT_NODE
		var nodeHTML = node.data;
		if (range) {
			if (node == selection_extentNode) {
				nodeHTML = nodeHTML.substring(0, selection_extentOffset);
			}
			if (node == selection_baseNode) {
				nodeHTML = nodeHTML.substring(selection_baseOffset, nodeHTML.length+1);
			}
		}
		nodeHTML = '<!--' + nodeHTML + '-->';
		return nodeHTML;
	
	case 9: // DOCUMENT_NODE
		var nodeHTML = '';
		var foundDocType = false;
		var childnode = node.firstChild;
		while (childnode) {
			if (childnode.nodeType != 10 ) foundDocType = true;
			nodeHTML += getNodeHTML(childnode, range, selection);
			childnode = childnode.nextSibling;
		}
		if (! foundDocType && node.doctype) {
			nodeHTML = getNodeHTML(node.doctype, range, selection) + nodeHTML;
		}
		return nodeHTML;

	case 10: // DOCUMENT_TYPE_NODE
		var nodeHTML = '<!DOCTYPE ' + node.nodeName;
		if (node.publicId) {
			nodeHTML += ' PUBLIC "' + node.publicId + '"';
			if (node.systemId) nodeHTML += ' "' + node.systemId + '"';
		} else if (node.systemId) {
			nodeHTML += ' SYSTEM "' + node.systemId + '"';
		}
		if (node.internalSubset) {
			nodeHTML += ' ' + node.internalSubset;
		}
		nodeHTML += '>\n';
		return nodeHTML;

	case 11: // DOCUMENT_FRAGMENT_NODE
		var nodeHTML = '';
		var childnode = node.firstChild;
		while (childnode) {
			nodeHTML += getNodeHTML(childnode, range, selection);
			childnode = childnode.nextSibling;
		}
		return nodeHTML;

	case 12: // NOTATION_NODE
		var nodeHTML = '<!NOTATION ' + node.nodeName;
		if (node.publicId) {
			nodeHTML += ' PUBLIC "' + node.publicId + '"';
			if (node.systemId) nodeHTML += ' "' + node.systemId + '"';
		} else if (node.systemId) {
			nodeHTML += ' SYSTEM "' + node.systemId + '"';
		}
		nodeHTML += '>';
		return nodeHTML;
	}
}

function nodeInRange(node, range) {
	var START_TO_START = 0;
	var START_TO_END = 1;
	var END_TO_END = 2;
	var END_TO_START = 3;

	try {
		var nodeRange = contenteditable_createrange();
		nodeRange.selectNode(node);
		if ((range.compareBoundaryPoints(END_TO_START,nodeRange) == 1) && (range.compareBoundaryPoints(START_TO_END,nodeRange) == -1)) {
			return true;
		}
	} catch(e) {
	}
	return false;
}

function contenteditable_selection_commonAncestorContainer(selection) {
	var range = contenteditable_selection_range(selection);
	var ancestors = new Array();
	var selection_baseNode;
	var selection_extentNode;
	if (selection) {
		selection_baseNode = selection.baseNode || webeditor.contentSelectionBaseNode[contenteditable_focused];
		selection_extentNode = selection.extentNode || webeditor.contentSelectionExtentNode[contenteditable_focused];
	} else {
		selection_baseNode = webeditor.contentSelectionBaseNode[contenteditable_focused];
		selection_extentNode = webeditor.contentSelectionExtentNode[contenteditable_focused];
	}
	if (selection_baseNode) {
		for (var node=selection_baseNode; node && (node.nodeName != "BODY"); node=node.parentNode) {
			ancestors[ancestors.length] = node.parentNode;
		}
	}
	var commonAncestorContainer = false;
	if (selection_extentNode) {
		for (var node=selection_extentNode; node && (node.nodeName != "BODY"); node=node.parentNode) {
			for (var i=0; i<ancestors.length; i++) {
				if (node.parentNode == ancestors[i]) {
					commonAncestorContainer = node.parentNode;
					break;
				}
			}
			if (commonAncestorContainer) break;
		}
	}
	return commonAncestorContainer;
}

function contenteditable_contextmenu(evt){
	var iframe = contenteditable_focused_iframe();
	webeditor_menu('context', false, getAbsoluteOffsetLeft(iframe)+evt.clientX-iframe.contentDocument.body.scrollLeft, getAbsoluteOffsetTop(iframe)+evt.clientY-iframe.contentDocument.body.scrollTop);
	contenteditable_event_stop(evt);
	return false;
}

webeditor.content2textareaOnBlur = true;
function webeditor_iframe_fix(iframe) {
	// Safari may disable designmode and loose the edited content on "display:none"
	// Workaround: reinitialize designmode and edited content
	// MISSING: onblur not triggered on iframes so edited content is not saved (http://bugs.webkit.org/show_bug.cgi?id=11398)
	// MISSING: event to trigger "webeditor_iframe_fix" when hidden iframe is displayed again

	if (iframe.contentWindow.document.designMode == "off") {
		// a) use textarea.value
		var form = iframe;
		while ((form.tagName != "FORM") && (form.tagName != "HTML")) {
			form = form.parentNode;
		}
		var textarea;
		if (form.tagName != "HTML") {
			textarea = form[iframe.id];
		} else {
			textarea = document.getElementById(iframe.id+'_textarea');
		}
		contenteditable_contents[iframe.id] = textarea.value;

		// b) use webeditor.textarea_content
		contenteditable_contents[iframe.id] = webeditor.textarea_content[iframe.id];

		contenteditable_inited[iframe.id] = false;
		contenteditable_init();
	}
}



function contenteditable_webeditor_clipboard_cut() {
}



function contenteditable_webeditor_clipboard_copy() {
}



function contenteditable_webeditor_clipboard() {
	return false;
}



function contenteditable_webeditor_clipboard_paste() {
	return false;
}
