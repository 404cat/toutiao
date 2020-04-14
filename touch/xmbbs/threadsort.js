/* banzhuan */
function bz_id(id) {
	return !id ? null : document.getElementById(id);
}

function mb_strlen(str) {
	var len = 0;
	for(var i = 0; i < str.length; i++) {
		len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset == 'utf-8' ? 3 : 2) : 1;
	}
	return len;
}

function xmlobj() {
	var obj = new Object();
	obj.createXMLDoc = function(xmlstring) {
		var xmlobj = false;
		if(window.DOMParser && document.implementation && document.implementation.createDocument) {
			try{
				var domparser = new DOMParser();
				xmlobj = domparser.parseFromString(xmlstring, 'text/xml');
			} catch(e) {
			}
		} else if(window.ActiveXObject) {
			var versions = ["MSXML2.DOMDocument.5.0", "MSXML2.DOMDocument.4.0", "MSXML2.DOMDocument.3.0", "MSXML2.DOMDocument", "Microsoft.XmlDom"];
			for(var i=0; i<versions.length; i++) {
				try {
					xmlobj = new ActiveXObject(versions[i]);
					if(xmlobj) {
						xmlobj.async = false;
						xmlobj.loadXML(xmlstring);
					}
				} catch(e) {}
			}
		}
		return xmlobj;
	};

	obj.xml2json = function(xmlobj, node) {
		var nodeattr = node.attributes;
		if(nodeattr != null) {
			if(nodeattr.length && xmlobj == null) {
				xmlobj = new Object();
			}
			for(var i = 0;i < nodeattr.length;i++) {
				xmlobj[nodeattr[i].name] = nodeattr[i].value;
			}
		}
		var nodetext = "text";
		if(node.text == null) {
			nodetext = "textContent";
		}

		var nodechilds = node.childNodes;
		if(nodechilds != null) {
			if(nodechilds.length && xmlobj == null) {
				xmlobj = new Object();
			}
			for(var i = 0;i < nodechilds.length;i++) {
				if(nodechilds[i].tagName != null) {
					if(nodechilds[i].childNodes[0] != null && nodechilds[i].childNodes.length <= 1 && (nodechilds[i].childNodes[0].nodeType == 3 || nodechilds[i].childNodes[0].nodeType == 4)) {
						if(xmlobj[nodechilds[i].tagName] == null) {
							xmlobj[nodechilds[i].tagName] = nodechilds[i][nodetext];
						} else {
							if(typeof(xmlobj[nodechilds[i].tagName]) == "object" && xmlobj[nodechilds[i].tagName].length) {
								xmlobj[nodechilds[i].tagName][xmlobj[nodechilds[i].tagName].length] = nodechilds[i][nodetext];
							} else {
								xmlobj[nodechilds[i].tagName] = [xmlobj[nodechilds[i].tagName]];
								xmlobj[nodechilds[i].tagName][1] = nodechilds[i][nodetext];
							}
						}
					} else {
						if(nodechilds[i].childNodes.length) {
							if(xmlobj[nodechilds[i].tagName] == null) {
								xmlobj[nodechilds[i].tagName] = new Object();
								this.xml2json(xmlobj[nodechilds[i].tagName], nodechilds[i]);
							} else {
								if(xmlobj[nodechilds[i].tagName].length) {
									xmlobj[nodechilds[i].tagName][xmlobj[nodechilds[i].tagName].length] = new Object();
									this.xml2json(xmlobj[nodechilds[i].tagName][xmlobj[nodechilds[i].tagName].length-1], nodechilds[i]);
								} else {
									xmlobj[nodechilds[i].tagName] = [xmlobj[nodechilds[i].tagName]];
									xmlobj[nodechilds[i].tagName][1] = new Object();
									this.xml2json(xmlobj[nodechilds[i].tagName][1], nodechilds[i]);
								}
							}
						} else {
							xmlobj[nodechilds[i].tagName] = nodechilds[i][nodetext];
						}
					}
				}
			}
		}
	};
	return obj;
}

var xml = new xmlobj();
var xmlpar = xml.createXMLDoc(forum_optionlist);
var forum_optionlist_obj = new Object();
xml.xml2json(forum_optionlist_obj, xmlpar);

function changeselectthreadsort(selectchoiceoptionid, optionid, type) {
	if(selectchoiceoptionid == '0') {
		return;
	}
	var soptionid = 's' + optionid;
	var sselectchoiceoptionid = 's' + selectchoiceoptionid;

	forum_optionlist = forum_optionlist_obj['forum_optionlist'];
	var choicesarr = forum_optionlist[soptionid]['schoices'];
	var lastcount = 1;
	var name = issearch = id = nameid = '';
	if(type == 'search') {
		issearch = ', \'search\'';
		name = ' name="searchoption[' + optionid + '][value]"';
		id = 'id="' + forum_optionlist[soptionid]['sidentifier'] + '"';
	} else {
		name = ' name="typeoption[' + forum_optionlist[soptionid]['sidentifier'] + ']"';
		id = 'id="typeoption_' + forum_optionlist[soptionid]['sidentifier'] + '"';
	}
	if((choicesarr[sselectchoiceoptionid]['slevel'] == 1 || type == 'search') && choicesarr[sselectchoiceoptionid]['scount'] == 1) {
		nameid = name + ' ' + id;
	}
	var selectoption = '<select' + nameid + ' class="mtn mbn sort_sel" onchange="changeselectthreadsort(this.value, \'' + optionid + '\'' + issearch + ');checkoption(\'' + forum_optionlist[soptionid]['sidentifier'] + '\', \'' + forum_optionlist[soptionid]['srequired'] + '\', \'' + forum_optionlist[soptionid]['stype'] + '\')" ' + ((forum_optionlist[soptionid]['sunchangeable'] == 1 && type == 'update') ? 'disabled' : '') + '><option value="0">&#35831;&#36873;&#25321;</option>';
	for(var i in choicesarr) {
		nameid = '';
		if((choicesarr[sselectchoiceoptionid]['slevel'] == 1 || type == 'search') && choicesarr[i]['scount'] == choicesarr[sselectchoiceoptionid]['scount']) {
				nameid = name + ' ' + id;
		}
		if(choicesarr[i]['sfoptionid'] != '0') {
			var patrn1 = new RegExp("^" + choicesarr[i]['sfoptionid'] + "\\.", 'i');
			var patrn2 = new RegExp("^" + choicesarr[i]['sfoptionid'] + "$", 'i');
			if(selectchoiceoptionid.match(patrn1) == null && selectchoiceoptionid.match(patrn2) == null) {
				continue;
			}
		}
		if(choicesarr[i]['scount'] != lastcount) {
			if(parseInt(choicesarr[i]['scount']) >= (parseInt(choicesarr[sselectchoiceoptionid]['scount']) + parseInt(choicesarr[sselectchoiceoptionid]['slevel']))) {
				break;
			}
			selectoption += '</select>' + "\r\n" + '<select' + nameid + ' class="mtn mbn sort_sel" onchange="changeselectthreadsort(this.value, \'' + optionid + '\'' + issearch + ');checkoption(\'' + forum_optionlist[soptionid]['sidentifier'] + '\', \'' + forum_optionlist[soptionid]['srequired'] + '\', \'' + forum_optionlist[soptionid]['stype'] + '\')" ' + ((forum_optionlist[soptionid]['sunchangeable'] == 1 && type == 'update') ? 'disabled' : '') + '><option value="0">&#35831;&#36873;&#25321;</option>';
			lastcount = parseInt(choicesarr[i]['scount']);
		}
		var patrn1 = new RegExp("^" + choicesarr[i]['soptionid'] + "\\.", 'i');
		var patrn2 = new RegExp("^" + choicesarr[i]['soptionid'] + "$", 'i');
		var isnext = '';
		if(parseInt(choicesarr[i]['slevel']) != 1) {
			isnext = '&raquo;';
		}
		if(selectchoiceoptionid.match(patrn1) != null || selectchoiceoptionid.match(patrn2) != null) {
			selectoption += "\r\n" + '<option value="' + choicesarr[i]['soptionid'] + '" selected="selected">' + choicesarr[i]['scontent'] + isnext + '</option>';
		} else {
			selectoption += "\r\n" + '<option value="' + choicesarr[i]['soptionid'] + '">' + choicesarr[i]['scontent'] + isnext + '</option>';
		}
	}
	selectoption += '</select>';
	if(type == 'search') {
		selectoption  += "\r\n" + '<input type="hidden" name="searchoption[' + optionid + '][type]" value="select">';
	}
	bz_id('select_' + forum_optionlist[soptionid]['sidentifier']).innerHTML = selectoption;
}

function checkoption(identifier, required, checktype, checkmaxnum, checkminnum, checkmaxlength) {
	if(checktype != 'image' && checktype != 'select' && !bz_id('typeoption_' + identifier) || !bz_id('check' + identifier)) {
		return true;
	}

	var ce = bz_id('check' + identifier);
	ce.innerHTML = '';

	if(checktype == 'select') {
		if(required != '0' && (bz_id('typeoption_' + identifier) == null || bz_id('typeoption_' + identifier).value == '0')) {
			warning(ce, '&#24517;&#22635;');
			return false;
		} else if(required == '0' && (bz_id('typeoption_' + identifier) == null || bz_id('typeoption_' + identifier).value == '0')) {
			ce.innerHTML = '<img src="' + IMGDIR + '/check_error.gif" width="12" height="12" class="vm" /> &#35831;&#36873;&#25321;&#19979;&#19968;&#32423;';
			ce.className = "warning";
			return true;
		}
	}

	if(checktype == 'radio' || checktype == 'checkbox') {
		var nodes = bz_id('typeoption_' + identifier).parentNode.parentNode.parentNode.getElementsByTagName('INPUT');
		var nodechecked = false;
		for(var i=0; i<nodes.length; i++) {
			if(nodes[i].id == 'typeoption_' + identifier) {
				if(nodes[i].checked) {
					nodechecked = true;
				}
			}
		}
		if(!nodechecked && required != '0') {
			warning(ce, '&#24517;&#22635;');
			return false;
		}
	}

	if(checktype == 'image') {
		var checkvalue = bz_id('sortaid_' + identifier).value;
	} else {
		var checkvalue = bz_id('typeoption_' + identifier).value;
	}

	if(required != '0') {
		if(checkvalue == '') {
			warning(ce, '&#24517;&#22635;');
			return false;
		} else {
			ce.innerHTML = '<img src="' + IMGDIR + '/check_right.gif" width="12" height="12" class="vm" />';
		}
	}

	if(checkvalue) {
		if(checktype == 'email' && !(/^[\-\.\w]+@[\.\-\w]+(\.\w+)+$/.test(checkvalue))) {
			warning(ce, 'Email&#38169;&#35823;');
			return false;
		} else if((checktype == 'text' || checktype == 'textarea') && checkmaxlength != '0' && mb_strlen(checkvalue) > checkmaxlength) {
			warning(ce, '&#38271;&#24230;&#36807;&#38271;');
			return false;
		} else if((checktype == 'number' || checktype == 'range')) {
			if(isNaN(checkvalue)) {
				warning(ce, '&#25968;&#23383;&#22635;&#20889;&#38169;&#35823;');
				return false;
			} else if(checkmaxnum != '0' && parseInt(checkvalue) > parseInt(checkmaxnum)) {
				warning(ce, '&#36229;&#20986;&#26368;&#22823;&#20540;');
				return false;
			} else if(checkminnum != '0' && parseInt(checkvalue) < parseInt(checkminnum)) {
				warning(ce, '&#23567;&#20110;&#26368;&#23567;&#20540;');
				return false;
			}
		} else if(checktype == 'url' && !(/(http[s]?|ftp):\/\/[^\/\.]+?\..+\w[\/]?$/i.test(checkvalue))) {
			warning(ce, '&#20197;http/https&#24320;&#22836;');
			return false;
		}
		ce.innerHTML = '<img src="' + IMGDIR + '/check_right.gif" width="12" height="12" class="vm" />';
	}
	return true;
}