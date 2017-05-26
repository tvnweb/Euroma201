String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g, "");
};
String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
function roundTo(decimalpositions)
{
    var i = this * Math.pow(10,decimalpositions);
    i = Math.round(i);
    return i / Math.pow(10,decimalpositions);
}
Number.prototype.roundTo = roundTo; 

function addinWishList(param_id){
	var idHtml=jQuery(this).data("idHtml");
		var idRecord=jQuery(this).data("prodotto");
		var idriga=0;
		if(jQuery(this).data("idrecord")!=""){
			idriga=jQuery(this).data("idrecord");
		}
		
		//aggiunta
		/* GET VALORI WishList */
		var idwishlist='';
		
		if (param_id == null){
			var chkArray = [];
			jQuery(".add_to_whishlist input[type='checkbox']:checked").each(function() {
				chkArray.push(jQuery(this).val());
			});
			var selected;
			selected = chkArray.join(',') + ",";
			if(selected.length > 1){
				idwishlist=chkArray[0]
			}
		}
		else
			idwishlist=param_id;
		
		//aggiunta
		jQuery.ajax({  
			  type: 'POST',  
			  url:urlAjax,
			  data: {  
				  	action: 'my_wishlist_single',
				  	wishlist:idwishlist,
					interessi:'',//jQuery(this).data("interessi"),
					prezzomin:jQuery('#prezzoprodotto').val(),//jQuery(this).data("prezzomin"),
					prezzomax:jQuery('#prezzoprodotto').val(),//jQuery(this).data("prezzomax"),
					prodotto:jQuery('#idprodotto').val(),//jQuery(this).data("prodotto"),
					id:idriga,
					nome:'',//jQuery(this).data("nome"),
					idwishlists:idwishlist//jQuery(this).data('idwishlists')
				  
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				 
				   window.location=urlSite+"&page_id=3119&idwishlist="+idwishlist+"&ln="+lang;
				  //alert("prodotti inserito");
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});			
}

var isMobile = {
	    Android: function() {
	        return navigator.userAgent.match(/Android/i);
	    },
	    BlackBerry: function() {
	        return navigator.userAgent.match(/BlackBerry/i);
	    },
	    iOS: function() {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	    },
	    Opera: function() {
	        return navigator.userAgent.match(/Opera Mini/i);
	    },
	    Windows: function() {
	        return navigator.userAgent.match(/IEMobile/i);
	    },
	    any: function() {
	        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	    }
};
function isiPad(){
    return (navigator.platform.indexOf("iPad") != -1);
}
jQuery(document).ready(function(){
	jQuery("#introPageIdeeRegalo h2 span").click(function(){
		window.location.href =jQuery(".ideeregalomenu a").attr("href");
	});
	jQuery(".openpopup").click(function(){
		var url=jQuery(this).parent("a").attr("href");
		var stile = "top=10, left=10, width=700, height=400, status=no, menubar=no, toolbar=no scrollbars=no";
		  window.open(url, "Share on Facebook", stile);		
	});
//	Gestione dei menu a tendina
	jQuery("li.menuAltro select, li.menuMobile select, " +
			"ul#footerMobile li select, #tendinaMenuWL select, " +
			"#select_categoria_negozi").change(function(){
		var url = jQuery(this).val();
		if(url != "#" && url != ""){
			window.location.href = url;
		}
	});
	
//	Handler
	//addHandlerList("li.elemento-0");
	var totale=0;
  jQuery(".prezzo_singolo").each(function(){
	  totale=totale+parseFloat(jQuery(this).html()*1);
	  
  });
  jQuery(".euri").html(totale.roundTo(2));
	  
	jQuery("#addElementWL").click(function(){
		jQuery("table.filtri select, table.filtri .start, table.filtri .end").attr("disabled", true);
		jQuery(".slider").slider('disable');
		jQuery(".cerca").hide();
		jQuery(".bottoni").show();
		jQuery(".selectProdotti").remove();
		 
		var contatore=0;
		jQuery(".selectProdotti").remove();
			jQuery("#elementiWL li").each(function(){
				contatore=parseInt(jQuery(this).attr("class").replace("elemento-","")*1);
			});
		contatore++;
		 
		var html = '<li class="elemento-'+contatore+'"><table class="filtri hideprodotto"><tr><th>'+interessi+'</th><th>BUDGET</th></tr><tr><td>';
		html += '<select id="elemento-'+contatore+'-interessi"><option value="-">----</option>';
		jQuery.each(tagisjson, function(i, item) {
			html+="<option value='"+item.termid+"'>"+item.name.capitalize()+"</option>";
		});		
		html +='</select></td>';
		html += '</td><td><div class="slider"></div><input type="text" class="start" value=" &euro; 1" id="elemento-'+contatore+'-start">';
		html += '<input type="text" class="end" value=" &euro; 4999" id="elemento-'+contatore+'-end"><input type="hidden" class="appoggio"></td></tr></table>';
		html += '<div class="cerca">'+cercaregalo+'</div><div class="bottoni" style="display:none;"><div class="bottoneRicerca"><img src="'+urlTemplate+'/images/nullpix.png" style="width:60px;height:67px" title="'+cercaregalo+'"></div>';
		html += '<div class="bottoneEdita"><img src="'+urlTemplate+'/images/nullpix.png" style="width:60px;height:67px" title="'+modificaregalo+'"></div><div class="bottoneCancella"><img src="'+urlTemplate+'/images/nullpix.png" style="width:60px;height:67px" title="'+eliminaregalo+'"></div></div>';
		html += '<div class="spinner" style="display:none"><img src="'+urlTemplate+'/images/ajax-loader.gif" class="loaderimg" style="margin-left: 21px; margin-top: 16px;"/></div>';			
		html+='<div class="clear"></div></li>';
		jQuery("#elementiWL").append(html);
		addHandlerWishList('li.elemento-'+contatore);
	});
	
	
	jQuery(".nomeWL").keyup(function (event) {
        if (event.keyCode == '13') {
        	jQuery("#creaWishList").click();
        }
        return false;
	});	
	jQuery(".nomeUtente").keyup(function (event) {
        if (event.keyCode == '13') {
        	jQuery("#creaWishList").click();
        }
        return false;
	});	
	jQuery(".eta").keyup(function (event) {
        if (event.keyCode == '13') {
        	jQuery("#creaWishList").click();
        }
        return false;
	});		
	
//apertura dialog login & registrazione
	jQuery("#menuLogin a").click(function(){
		jQuery("#registrazione-modal-content-tablet").modal();	
		return false;
	});

	jQuery("#registrazioneZone div input").each(function(){
		jQuery(this).data("defaultValue",jQuery(this).val());
	});
	
	jQuery("#loginZone div input").each(function(){
		jQuery(this).data("defaultValue",jQuery(this).val());
	});	
	jQuery("#login-modal-content-tablet div input,#registrazione-modal-content-tablet div input").each(function(){
		jQuery(this).data("defaultValue",jQuery(this).val());
	});		
	
//svuota l'input del dialog
	jQuery("#registrazioneZone div input").focusin(function(){

		jQuery(this).data("value",jQuery(this).val());
		jQuery(this).val("");
	}).focusout(function(){
		if(jQuery(this).attr("id")!="passwordAdd" && jQuery(this).attr("id")!="confermaPassword")
			if(jQuery(this).val()==""){
				jQuery(this).val(jQuery(this).data("value"));
			}
	});

	jQuery("#loginZone div input").focusin(function(){
		jQuery(this).data("value",jQuery(this).val());
		jQuery(this).val("");
	}).focusout(function(){
		if(jQuery(this).attr("id")!="passwordAdd" && jQuery(this).attr("id")!="confermaPassword")
			if(jQuery(this).val()==""){
				jQuery(this).val(jQuery(this).data("value"));
			}
	});	
	
	jQuery("#login-modal-content-tablet div input").focusin(function(){
		jQuery(this).data("value",jQuery(this).val());
		jQuery(this).val("");
	}).focusout(function(){
		if(jQuery(this).attr("id")!="passwordAdd" && jQuery(this).attr("id")!="confermaPassword")
			if(jQuery(this).val()==""){
				jQuery(this).val(jQuery(this).data("value"));
			}
	});
	jQuery("#registrazioneZone div input").focusin(function(){
		jQuery(this).data("value",jQuery(this).val());
		jQuery(this).val("");
	}).focusout(function(){
		if(jQuery(this).attr("id")!="passwordAdd" && jQuery(this).attr("id")!="confermaPassword")
			if(jQuery(this).val()==""){
				jQuery(this).val(jQuery(this).data("value"));
			}
	});	
	jQuery("#registrazione-modal-content-tablet div input").focusin(function(){
		jQuery(this).data("value",jQuery(this).val());
		jQuery(this).val("");
	}).focusout(function(){
		if(jQuery(this).attr("id")!="passwordAddTablet" && jQuery(this).attr("id")!="confermaPasswordTablet")
			if(jQuery(this).val()==""){
				jQuery(this).val(jQuery(this).data("value"));
			}
	});	
		
//Gestione input password
	jQuery("#fakePassword").focusin(function(){
		jQuery(this).hide();
		jQuery("#passwordAdd").show();
		jQuery("#passwordAdd").focus();				

	});
	
	jQuery("#fakePasswordLogin").focusin(function(){
		jQuery(this).hide();
		jQuery("#password").show();
		jQuery("#password").focus();				

	});	/*
	jQuery("#password").focusout(function(){
		if(jQuery("#password").val()==""){
			jQuery(this).hide();
			jQuery("#fakePasswordLogin").show();
		}
	});	*/
	
	
	jQuery("#fakeEmailLogin").focusin(function(){
		jQuery(this).hide();
		jQuery("#email").show();
		jQuery("#email").focus();			 	

	});	/*
	jQuery("#email").focusout(function(){
		if(jQuery("#email").val()==""){
			//jQuery(this).hide();
			jQuery("#fakeEmailLogin").show();
		}
	});	*/
	
	
	
	jQuery("#passwordAdd").focusout(function(){
		if(jQuery("#passwordAdd").val()==""){
			jQuery(this).hide();
			jQuery("#fakePassword").show();
		}
	});
	jQuery("#fakePasswordTablet").focusin(function(){
		jQuery(this).hide();
		jQuery("#passwordAddTablet").show();
		jQuery("#passwordAddTablet").focus();				

	});	
	
	
	jQuery("#passwordAddTablet").focusout(function(){
		if(jQuery("#passwordAddTablet").val()==""){
			jQuery(this).hide();
			jQuery("#fakePasswordTablet").show();
		}
	});
	
	
	jQuery("#fakePasswordConferma").focusin(function(){
		jQuery(this).hide();
		jQuery("#confermaPassword").show();
		jQuery("#confermaPassword").focus();				

	});
	jQuery("#fakePasswordConfermaTablet").focusin(function(){
		jQuery(this).hide();
		jQuery("#confermaPasswordTablet").show();
		jQuery("#confermaPasswordTablet").focus();				

	});	
	jQuery("#confermaPassword").focusout(function(){
		if(jQuery("#confermaPassword").val()==""){
			jQuery(this).hide();
			jQuery("#fakePasswordConferma").show();
		}
	});
	jQuery("#confermaPasswordTablet").focusout(function(){
		if(jQuery("#confermaPasswordTablet").val()==""){
			jQuery(this).hide();
			jQuery("#fakePasswordConfermaTablet").show();
		}
	});	
	
	
	
	//crea whish da login
	jQuery("#FakenomeLista").focusin(function(){
		jQuery(this).hide();
		jQuery("#nomeLista").show();
		jQuery("#nomeLista").focus();				

	});	
	jQuery("#nomeLista").focusout(function(){
		if(jQuery("#nomeLista").val()==""){
			jQuery(this).hide();
			jQuery("#FakenomeLista").show();
		}
	});	
	
	//crea whish da product
	jQuery("#FakenomeLista2").focusin(function(){
		jQuery(this).hide();
		jQuery("#nomeLista2").show();
		jQuery("#nomeLista2").focus();				

	});	
	jQuery("#nomeLista2").focusout(function(){
		if(jQuery("#nomeLista2").val()==""){
			jQuery(this).hide();
			jQuery("#FakenomeLista2").show();
		}
	});	
	
	
	jQuery("#addUtente").click(function(){
		if(jQuery("#nome").val().trim() =="" ||  jQuery("#nome").val().trim() == jQuery("#nome").data("defaultValue")){
			alert(titleerrore);
			return false;
		}
		
		if(jQuery("#cognome").val().trim() =="" ||  jQuery("#cognome").val().trim() ==jQuery("#cognome").data("defaultValue")){
			alert(cognomeerrore);
			return false;
		}	
		var filter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(jQuery("#mail").val().trim() =="" ||  jQuery("#mail").val().trim() ==jQuery("#mail").data("defaultValue") || !filter.test(jQuery('#mail').val())){
			alert(mailnonvalida);
			return false;
		}	
		if(jQuery("#passwordAdd").val().trim() == "" 
			|| jQuery("#passwordAdd").val() != jQuery("#confermaPassword").val()
		){
			alert(passnonvalida);
			return false;
		}	
		if(!jQuery.isNumeric(jQuery("#eta").val())){
			alert(numericononvalido);
			return false;
		}
		if(!jQuery("#autorizzo").is(':checked')){	
			alert(accettanonvalido);
			return false;
		}
		var newsletter=0;
		if(jQuery("#newsletter").is(':checked')){
			newsletter=1;
		}
		jQuery.ajax({  
			  type: 'POST',  
			  url: urlAjax,  
			  data: {  
				  action: 'my_registration',
				  nome: jQuery("#nome").val(),
				  cognome:jQuery("#cognome").val(),
				  mail:jQuery("#mail").val(),
				  password:jQuery("#passwordAdd").val(),
				  eta:jQuery("#eta").val(),
				  gender:jQuery("#sesso option:selected").val(),
				  newsletter:newsletter
				  
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				  alert(data);
				  jQuery(".modalCloseImg").click();
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});		
	});

	jQuery("#addUtenteTablet").click(function(){
		if(jQuery("#nomeTablet").val().trim() =="" ||  jQuery("#nomeTablet").val().trim() == jQuery("#nomeTablet").data("defaultValue")){
			alert(titleerrore);
			return false;
		}
		
		if(jQuery("#cognomeTablet").val().trim() =="" ||  jQuery("#cognomeTablet").val().trim() ==jQuery("#cognomeTablet").data("defaultValue")){
			alert(cognomeerrore);
			return false;
		}	
		var filter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(jQuery("#mailTablet").val().trim() =="" ||  jQuery("#mailTablet").val().trim() ==jQuery("#mailTablet").data("defaultValue") || !filter.test(jQuery('#mailTablet').val())){
			alert(mailnonvalida);
			return false;
		}	
		if(jQuery("#passwordAddTablet").val().trim() == "" 
			|| jQuery("#passwordAddTablet").val() != jQuery("#confermaPasswordTablet").val()
		){
			alert(passnonvalida);
			return false;
		}	
		if(!jQuery.isNumeric(jQuery("#etaTablet").val())){
			alert(numericononvalido);
			return false;
		}
		if(!jQuery("#autorizzoTablet").is(':checked')){	
			alert(accettanonvalido);
			return false;
		}
		var newsletter=0;
		if(jQuery("#newsletterTablet").is(':checked')){
			newsletter=1;
		}
		jQuery.ajax({  
			  type: 'POST',  
			  url: urlAjax,  
			  data: {  
				  action: 'my_registration',
				  nome: jQuery("#nomeTablet").val(),
				  cognome:jQuery("#cognomeTablet").val(),
				  mail:jQuery("#mailTablet").val(),
				  password:jQuery("#passwordAddTablet").val(),
				  eta:jQuery("#etaTablet").val(),
				  gender:jQuery("#sessoTablet option:selected").val(),
				  newsletter:newsletter
				  
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				  alert(data);
				  jQuery(".modalCloseImg").click();
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});		
	});	
	
	jQuery(".loginUtente").click(function(){
		jQuery.ajax({  
			  type: 'POST',  
			  url: urlAjax,  
			  data: {  
				  action: 'my_login',
				  mail:jQuery("#email").val(),
				  password:jQuery("#password").val(),
				  
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				  if(data==1){
					  document.location.reload(true);
				  }else{
					  alert(wrong_login);
				  }
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});			
	});
	
	
	jQuery("#fakePasswordLoginTablet").focusin(function(){
		jQuery(this).hide();
		jQuery("#passwordTablet").show();
		jQuery("#passwordTablet").focus();				

	});	
	/*jQuery("#passwordTablet").focusout(function(){
		if(jQuery("#passwordTablet").val()==""){
			jQuery(this).hide();
		}
		jQuery("#fakePasswordLoginTablet").show();
	});	*/
	jQuery("#loginUtenteTablet").click(function(){
		jQuery.ajax({  
			  type: 'POST',  
			  url: urlAjax,  
			  data: {  
				  action: 'my_login',
				  mail:jQuery("#emailTablet").val(),
				  password:jQuery("#passwordTablet").val(),
				  
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				  if(data==1){
					  document.location.reload(true);
				  }else{
					  alert(wrong_login);
				  }
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});			
	});	
	
	
	jQuery(".login_tablet").click(function(){
		jQuery("#login-modal-content-tablet").modal({
		containerCss : {
			'min-height': 250,
			'max-height':300
		}
		});
		return false;
	});	
	jQuery(".reg_tablet").click(function(){
		jQuery("#registrazione-modal-content-tablet").modal({
			containerCss : {
				'height':'400px'
			}
			});
		return false;
	});		
	jQuery(".logoutgiallo").click(function(){
		jQuery.ajax({  
			  type: 'POST',  
			  url: urlAjax,  
			  data: {  
				  action: 'my_logout',
				  
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				  window.location=urlSite+'&page_id=3119';
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});	
		return false;
	});
	
	
	
	jQuery("#creaWishList").click(function(){
		if(jQuery("input[name=nomeLista]").val().trim()==""){
			alert(titleerrore);
			return false;
		}
		jQuery.ajax({  
			  type: 'POST',  
			  url: urlAjax,  
			  data: {  
				  action: 'my_wishlist',
				  nome:jQuery("input[name=nomeLista]").val(),
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				  if(data!="e"){
					  //window.location=urlSite+"&page_id=3124&idwishlist="+data+"&ln="+lang;
					  window.location=urlSite+"&page_id=3119&ln="+lang;
					  //&idwishlist="+data+"
				  }
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});	
		return false;		
	});	
	
	//da prodotto
	//da prodotto
	jQuery("#creaWishList2").click(function(){
		if(jQuery("input[name=nomeLista2]").val().trim()==""){
			alert(titleerrore);
			return false;
		}
		jQuery.ajax({  
			  type: 'POST',  
			  url: urlAjax,  
			  data: {  
				  action: 'my_wishlist',
				  nome:jQuery("input[name=nomeLista2]").val(),
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				  if(data!="e"){
					  //alert(data);
					  addinWishList(data);
					  
					  //window.location=urlSite+"&page_id=3124&idwishlist="+data+"&ln="+lang;
					 // window.location=urlSite+"&page_id=3119&ln="+lang;
					  //&idwishlist="+data+"
				  }
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});	
		return false;		
	});	
	
	
	//da responsive
	jQuery("#creaWishListResp").click(function(){
		if(jQuery("#nomeListaResp").val().trim()==""){
			alert(titleerrore);
			return false;
		}
		jQuery.ajax({  
			  type: 'POST',  
			  url: urlAjax,  
			  data: {  
				  action: 'my_wishlist',
				  nome:jQuery("#nomeListaResp").val(),
			  },  
			  success: function(data, textStatus, XMLHttpRequest){  
				  if(data!="e"){
					  //alert(data);
					  addinWishList(data);
					  
					  //window.location=urlSite+"&page_id=3124&idwishlist="+data+"&ln="+lang;
					 // window.location=urlSite+"&page_id=3119&ln="+lang;
					  //&idwishlist="+data+"
				  }
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});	
		return false;		
	});	
	
	
	
	
	jQuery("body").on("click",".nome_prodotto",function(){
		jQuery(this).parent().parent().children("td").children(".immagine_prodotto").click();
	});
	jQuery("body").on("click",".nome_negozio",function(){
		var url="";
		if(urlSite.indexOf("lang")!="-1"){
			url=urlSite+"&p="+jQuery(this).attr("contextmenu");
		}else{
			url=urlSite+"?p="+jQuery(this).attr("contextmenu");
		}
		window.open(url);
	});	
	
	
	
	jQuery("#addinWishList").click(function(){
		addinWishList(null);
		
	});		
	
	
	//jQuery(".bottoneView.wishlist").click(function(){
	jQuery(".view.wishlist").click(function(){
		var id=jQuery(this).attr("id").replace("wishlists_","");
		//window.location=urlSite+"&page_id=3124&idwishlist="+id+"&ln="+lang;
		window.location=urlSite+"&page_id=3119&idwishlist="+id+"&ln="+lang;
	});
	jQuery(".bottoneCancella.wishlist").click(function(){
		var id=jQuery(this).attr("id").replace("wishlists_del_","");
		jQuery.post(urlAjax,{action:"my_delete_wishlists",id:id});
		jQuery(this).parent().parent().remove();
	});		
	
	jQuery("#apriDialogInviaAmico").click(function(){
		jQuery("#inviaAmico-modal-content").modal({
			containerCss : {
				width: 450,
				height: 200
			}
		});
	});
	jQuery("#submitInviaAmico").click(function(){
		var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var mail = jQuery("#mailInviaAmico").val();
		
		if(reg.test(mail)){
			jQuery.ajax({  
				  type: 'POST',  
				  url: urlAjax,  
				  data: {  
					  action: 'sendMail',
					  mail: mail,
					  url: jQuery("#urlInviaAmico").val()
				  },  
				  success: function(data, textStatus, XMLHttpRequest){  
					  alert(data);
				  },  
				  error: function(MLHttpRequest, textStatus, errorThrown){  
					  alert("error");  
				  }  
			});	
		}else{
			alert("L'indirizzo email inserito non è valido");
		}
	});
});

function addHandlerList(id){
	var idElement=id.replace("li.","");
	var min=jQuery("#"+idElement+"-start").val().replace(/\u20ac/g, '').replace(/ /g, "");
	var max=jQuery("#"+idElement+"-end").val().replace(/\u20ac/g, '').replace(/ /g, "");
	jQuery(id+' .slider').slider({
		 range: true,
		 min: 1,
		 max: 4999,
		 values: [ min, max ],
		 step:100,
		 slide: function( event, ui ) {
			 jQuery(this).siblings('.start').val(jQuery(this).siblings('.appoggio').html(ui.values[0]).text());
			 jQuery(this).siblings('.end').val(jQuery(this).siblings('.appoggio').html(ui.values[1]).text());
		 }
	 });
	
	var valoreIniziale = "";
	jQuery(id+' input.start, '+id+' input.end').focusin(function(){
		valoreIniziale = jQuery(this).val();
		jQuery(this).val("");
	});
	jQuery(id+' input.start, '+id+' input.end').focusout(function(){
		var valore = jQuery(this).val();
		jQuery(this).siblings('.appoggio').html("&euro; ");
//		jQuery(this).val(jQuery(this).siblings('.appoggio').html());
		if(jQuery(this).hasClass('start')){
			var max = jQuery(id+' input.end').val().replace(/\u20ac/g, '').replace(/ /g, "");
			if(parseInt(max) > parseInt(valore) && parseInt(valore) < 4999){
				jQuery(id+' .slider').slider( "values", [valore, max]);
				jQuery(this).val(jQuery(this).siblings('.appoggio').html()+" "+jQuery(this).val());
			}else{
			}			
		}else{
			var min = jQuery(id+' input.start').val().replace(/\u20ac/g, '').replace(/ /g, "");
			if(parseInt(min) < parseInt(valore) && parseInt(valore) < 4999){
				jQuery(id+' .slider').slider( "values", [min, valore]);
				jQuery(this).val(jQuery(this).siblings('.appoggio').html()+" "+jQuery(this).val());
			}else{
			}
		}
	});
	jQuery(id+' input.start, '+id+' input.end').keyup(function (event) {
        if (event.keyCode == '13') {
        	jQuery(this).blur();
        }
        return false;
    });
	
//	Cancellazione di un evento
	jQuery(id+' div.bottoni div.bottoneCancella').click(function(){
		jQuery(id+" .spinner").show();
		if(jQuery(id).children(".idrecord").val()!=""){
			jQuery.post(urlAjax,{action:"my_delete_giftlist",id:jQuery(id).children(".idrecord").val(),idgiftlists:idgiftlist},function(){
				jQuery(id+" .spinner").hide();
			});
		}
		var idCarosello=id.replace(".elemento-","#select-");
		jQuery(id).remove();
		jQuery(idCarosello).remove();
		var totale=0;
		  jQuery(".prezzo_singolo").each(function(){
			  totale=totale+parseFloat(jQuery(this).html()*1);
			  
		  });
		  jQuery(".euri").html(totale.roundTo(2));
	});


	
//	Click sul bottone edita una riga disabilitata
	jQuery(id+' div.bottoni div.bottoneEdita').click(function(){
		jQuery(id+" table.infoprodotto").hide();
		jQuery(id+" table.hideprodotto").show();
		jQuery(id+" table.filtri.hideprodotto input, "+id+" table.filtri select").attr("disabled", false);
		jQuery(id+" .slider").slider('enable');
		jQuery(id+" .cerca").show();
		jQuery(id+" .bottoni").hide();
		jQuery(".selectProdotti").remove();
	});
}

function addHandlerWishList(id){
	var idElement=id.replace("li.","");
	
	var min=jQuery("#"+idElement+"-start").val().replace(/\u20ac/g, '').replace(/ /g, "");
	var max=jQuery("#"+idElement+"-end").val().replace(/\u20ac/g, '').replace(/ /g, "");
	jQuery('.appoggio_start').val(min);
	jQuery('.appoggio_end').val(max);
	
	jQuery(id+' .slider').slider({
		 range: true,
		 min: 1,
		 max: 4999,
		 step:10,
		 values: [ min, max ],
		 slide: function( event, ui ) {
			 jQuery(this).siblings('.start').val(jQuery(this).siblings('.appoggio').html(ui.values[0]).text());
			 jQuery(this).siblings('.end').val(jQuery(this).siblings('.appoggio').html(ui.values[1]).text());
			 jQuery('.appoggio_start').val(jQuery(this).siblings('.appoggio').html(ui.values[0]).text());
			 jQuery('.appoggio_end').val(jQuery(this).siblings('.appoggio').html(ui.values[1]).text()); 
		 }
	 });
	 
	
	var valoreIniziale = "";
	jQuery(id+' input.start, '+id+' input.end').focusin(function(){
		valoreIniziale = jQuery(this).val();
		jQuery(this).val("");
	});
	jQuery(id+' input.start, '+id+' input.end').focusout(function(){
		var valore = jQuery(this).val();
		jQuery(this).siblings('.appoggio').html( valore);//
		jQuery(this).val(jQuery(this).siblings('.appoggio').html());
		
		if(jQuery(this).hasClass('start')){
			var max = jQuery(id+' input.end').val().replace(/\u20ac/g, '').replace(/ /g, "");
			
			if (Number(valore)){

				if(parseInt(max) > parseInt(valore) && parseInt(valore) < 4999){
					jQuery(id+' .slider').slider( "values", [valore, max]);
					
				}else{
					var resetta_min = jQuery('.appoggio_start').val();
					jQuery(id+' input.start').val(resetta_min);
					jQuery(id+' .slider').slider( "values", [resetta_min, max]);
				}		
			}else{
					var resetta_min = jQuery('.appoggio_start').val();
					jQuery(id+' input.start').val(resetta_min);
					jQuery(id+' .slider').slider( "values", [resetta_min, max]);
				}	
				
		}else{
			var min = jQuery(id+' input.start').val().replace(/\u20ac/g, '').replace(/ /g, "");
			
			if (Number(valore)){

				
				if(parseInt(min) < parseInt(valore) && parseInt(valore) < 4999){
					jQuery(id+' .slider').slider( "values", [min, valore]);
					
				}else{
					var resetta_max = jQuery('.appoggio_end').val();
					jQuery(id+' input.end').val(resetta_max);
					jQuery(id+' .slider').slider( "values", [min, resetta_max]);
				}
			}else{
					var resetta_max = jQuery('.appoggio_end').val();
					jQuery(id+' input.end').val(resetta_max);
					jQuery(id+' .slider').slider( "values", [min, resetta_max]);
				}	
		}
	});
	
	jQuery(id+' input.start, '+id+' input.end').keyup(function (event) {
        if (event.keyCode == '13') {
        	jQuery(this).blur();
        }
        return false;
    });
	
//	Cancellazione di un prodotto dalla whishlist
	jQuery(id+' div.bottoni div.bottoneCancella').click(function(){
		
		if(jQuery(id).children(".idrecord").val()!=""){
			jQuery.post(urlAjax,{action:"my_delete_wishlist",id:jQuery(id).children(".idrecord").val(),idwishlists:idwishlist},function(){
				jQuery(id+" .spinner").hide();
			});
		}
		
		jQuery(id).remove();
		var totale=0;
		var tot_prodotti=0;

		jQuery(".prezzo_singolo_js").each(function(){
		  tot_prodotti++; 
		  totale=totale+parseFloat(jQuery(this).val());
		 });  
		 
		  if (tot_prodotti==0)
		  	 window.location=urlSite+'&page_id=3119';
		  else{
			  jQuery(".euri").html(totale+ ' &euro;');
			  jQuery(".tot_prodotti").html(tot_prodotti);		
		  }
		 
	});


	/*
		QUI PARTE DI FUNCTION TOLTA PERCHE DUPLICATA
	*/
	
	//  Click sui bottoni cerca regalo
	jQuery(id+' div.cerca, '+id+' div.bottoni div.bottoneRicerca').click(function(){
		var idParent="";
		if(jQuery(this).hasClass("cerca")){
			idParent=jQuery(this).parent().attr("class");
		}else{
			idParent=jQuery(this).parent().parent().attr("class");
		}
		var limit=9;
		if(jQuery.browser.msie && jQuery.browser.version=="8.0"){
			limit=9;
		}		
		
		/* GET VALORI GENERE */
		var chkArray = [];
		jQuery(".genere input[type='checkbox']:checked").each(function() {
			chkArray.push(jQuery(this).val());
		});
		
		var selected;
		selected = chkArray.join(',') + ",";
		if(selected.length > 1){
			vargenere=selected
		}
		else 
			vargenere='-';
			
		/* GET VALORI ETA */
		var chkArray = [];
		jQuery(".eta input[type='checkbox']:checked").each(function() {
			chkArray.push(jQuery(this).val());
		});
		
		var selected;
		selected = chkArray.join(',') + ",";
		if(selected.length > 1){
			vareta=selected
		}
		else 
			vareta='';
		//CATEGORIE PRINCIPALI
		var chkArray = [];
		jQuery(".categorie input[type='checkbox']:checked").each(function() {
			chkArray.push(jQuery(this).val());
		});
		
		var selected;
		selected = chkArray.join(',') + ",";
		if(selected.length > 1){
			varcategorie=selected
		}
		else 
		varcategorie='';
		
		//SOTTOCATEGORIE -  NEW!!
		var chkArray = [];
		jQuery(".sottocategorie input[type='checkbox']:checked").each(function() {
			chkArray.push(jQuery(this).val());
		});
		
		var selected;
		selected = chkArray.join(',') + ",";
		if(selected.length > 1){
			varsottocategorie=selected
		}
		else 
		varsottocategorie='';
		
		jQuery(id+' img.loaderimg').css("visibility","visible");
		jQuery.ajax({  
			  type: 'POST',  
			  url:urlAjax,  
			  data: {  
				  action: 'my_prodotti_search',
				  eta:vareta,
				  genere:vargenere,
				  chi:"-",
				  //genere:jQuery("#"+idParent+"-interessi option:selected").val(),
				  categorie:varcategorie,
				  sottocategorie:varsottocategorie,
				  pricestart:jQuery("#"+idParent+"-start").val().replace(/\u20ac/g, '').replace(/ /g, ""),
				  pricend:jQuery("#"+idParent+"-end").val().replace(/\u20ac/g, '').replace(/ /g, ""),
				  limit:limit,
			  },  
			  dataType: "json",
			  success: function(data, textStatus, XMLHttpRequest){  
						var urlSplit=urlTemplate.split("themes");
						var html='';
						jQuery.each(data, function(i, item) {
							html += '<div class="list_prod"><a href="'+item.link_prod+'"><img src="'+urlSplit[0]+"/uploads/"+item.img+'" class="immagineProdotto" /></a><p class="categoria">'+item.categoria_principale+'</p><a class="titolo" href="'+item.link_prod+'">'+item.nome+'</a><div class="cont_prezzo"><div class="prezzo">'+item.prezzo+' &euro;</div><p class="lotrovida"><a href="'+item.negozio_link+'">'+item.negozio+'</a></p></div></div>';
							

						});
						
						jQuery(id+' img.loaderimg').css("visibility","hidden");
				  jQuery("#cont_whishlist").html(html);
			  },  
			  error: function(MLHttpRequest, textStatus, errorThrown){  
				  alert("error");  
			  }  
		});			

	});


	
//	Click sul bottone edita una riga disabilitata
	jQuery(id+' div.bottoni div.bottoneEdita').click(function(){
		jQuery(id+" table.infoprodotto").hide();
		jQuery(id+" table.hideprodotto").show();
		jQuery(id+" table.filtri.hideprodotto input, "+id+" table.filtri select").attr("disabled", false);
		jQuery(id+" .slider").slider('enable');
		jQuery(id+" .cerca").show();
		jQuery(id+" .bottoni").hide();
		jQuery(".selectProdotti").remove();
	});
}






function addHandlerProdotti(id){
	if(jQuery(window).width() > 1004){
		istanziaCarosello(id);
	}
	jQuery(window).resize(function(){
		if(jQuery(window).width() > 1004){
			istanziaCarosello(id);
		}else{
			jQuery('ul#'+id+' li.selectProdotti ul').trigger("destroy", true);
		}
	});
	
	jQuery(".addLinkExt").click(function(){
		if(jQuery(".formLinkExt").length == 0){
			var html = '<div class="formLinkExt"><table class="filtri hideprodotto"><tr><th>PRODOTTO</th><th>PREZZO</th></tr>';
			html += '<tr><td><input type="text" class="prodotto" value="" /></td><td><input type="text" class="prezzo" value="" /></td></tr>';
			html += '</table><table class="filtri hideprodotto"><tr><th>NEGOZIO</th><th>LINK</th></tr><tr><td><input type="text" class="negozio" value="" />';
			html += '</td><td><input type="text" class="link" value="" /></td></tr></table><div class="inserisciProdotto">';
			html += 'INSERISCI PRODOTTO</div><div class="clear"></div></div><input type="hidden" class="idrecord" value="">';
			jQuery(this).after(html);
//			TODO Handler bottone Inserimento Link Esterno
		}
	});
}

function istanziaCarosello(id){
	jQuery('ul#'+id+' li.selectProdotti ul').carouFredSel({
		items : 4,
		width: "88%",
		height: 310,
		padding: [10, 0],
		scroll : {
			items : 4,
			duration : 2000,                        
			pauseOnHover : true
		},
		prev: {
			button : "div.carouselPager.prev"
		},
		next: {
			button : "div.carouselPager.next"
		}
	});
	jQuery("div.caroufredsel_wrapper").css("float", "left");
	jQuery("div.caroufredsel_wrapper").css("margin", 0);
}