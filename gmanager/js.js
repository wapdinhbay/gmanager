var Gmanager={_editId:null,_getKey:function(a){if(null==a.which&&(null!=a.charCode||null!=a.keyCode))a.which=null!=a.charCode?a.charCode:a.keyCode;return a.which},_insAtCaret:function(a,b){var c;a.focus();if("selection"in document){c=document.selection.createRange();if(c.parentElement()!==a)return;c.text=b;c.select()}else"selectionStart"in a?(c=a.selectionStart,a.value=a.value.substr(0,c)+b+a.value.substr(a.selectionEnd,a.value.length),c+=b.length,a.setSelectionRange(c,c)):a.value+=b;a.focus()},_getCaretPosition:function(a){var b,
c;if("selectionStart"in a)return a.selectionStart;b=document.selection.createRange();c=a.createTextRange();a=c.duplicate();c.moveToBookmark(b.getBookmark());a.setEndPoint("EndToStart",c);return a.text.length},_setCaretPosition:function(a,b){var c;"setSelectionRange"in a?"opera"in window?a.setSelectionRange(b+1,b+1):a.setSelectionRange(b,b):(c=a.createTextRange(),c.collapse(!0),c.moveStart("character",a.value.substring(0,b).replace(/\n/g,"").length+1),c.moveEnd("character",0),c.select())},number:function(a){var b=
this._getKey(a);return a.ctrlKey||a.altKey||32>b?!0:/[\d]/.test(String.fromCharCode(b))},check:function(a,b,c){for(var d=0,e=a[b].length;d<e;d++)a[b][d].checked=c},checkForm:function(a,b){if("undefined"===typeof a[b])return!1;if(a[b]instanceof HTMLInputElement)return!1===a[b].checked&&window.alert(document.getElementById("chF").innerHTML),a[b].checked;for(var c=0,d=a[b].length;c<d;c++)if(!0===a[b][c].checked)return!0;window.alert(document.getElementById("chF").innerHTML);return!1},delNotify:function(){return window.confirm(document.getElementById("delN").innerHTML)},
paste:function(a){var b=document.forms.post.sql;""!==a&&b&&this._insAtCaret(b,decodeURIComponent(a))},filesDel:function(){var a=document.getElementById("fl").lastChild,b=a.previousSibling;null!==b.previousSibling&&(a.parentNode.removeChild(a),b.parentNode.removeChild(b))},filesAdd:function(){var a=document.getElementById("fl"),b=document.createElement("input");b.setAttribute("name","f[]");b.setAttribute("type","file");a.insertBefore(b,null);a.appendChild(document.createElement("br"))},_setEditId:function(){null===
this._editId&&(this._editId=document.getElementById("pedit").lastChild.getAttribute("id").substring(1));this._editId++},editAdd:function(a){this._setEditId();var a=a.parentNode.parentNode,b=a.parentNode,c=a.cloneNode(!0);c.setAttribute("id","i"+this._editId);c.cells[0].innerHTML="+";c.cells[1].firstChild.setAttribute("value","");b.insertBefore(c,a.nextSibling)},editDel:function(a){this._setEditId();a.parentNode.parentNode.parentNode.deleteRow(a.parentNode.parentNode.rowIndex)},formatCode:function(a,
b){var c=this._getCaretPosition(b),d,e="";if(13===this._getKey(a)&&!/opera mini|opera mobi/.test(window.navigator.userAgent.toLowerCase())){d=b.value.substring(0,c).split("\n");d=d[d.length-1].split("");for(var f=0,g=d.length;f<g;f++)if(" "===d[f])e+=" ";else break;"{"===b.value.slice(c-1,c)&&(e+="    ");b.value=b.value.substring(0,c)+"\n"+e+b.value.substring(c,b.value.length);this._setCaretPosition(b,c+e.length+1);return!1}return!0}};