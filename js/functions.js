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

	var idHtml=$(this).data("idHtml");
		var idRecord=$(this).data("prodotto");
		var idriga=0;
		if($(this).data("idrecord")!=""){
			idriga=$(this).data("idrecord");
		}

		//aggiunta
		/* GET VALORI WishList */
		var idwishlist='';

		if (param_id == null){
			var chkArray = [];
			$(".add_to_whishlist input[type='checkbox']:checked").each(function() {
				chkArray.push($(this).val());
			});
			var selected;
			selected = chkArray.join(',') + ",";
			if(selected.length > 1){
				idwishlist=chkArray[0]
			}
			else
				return false;
		}
		else
			idwishlist=param_id;

		//aggiunta
		$.ajax({
			  type: 'POST',
			  url:urlAjax,
			  data: {
				  	action: 'my_wishlist_single',
				  	wishlist:idwishlist,
					interessi:'',//$(this).data("interessi"),
					prezzomin:$('#prezzoprodotto').val(),//$(this).data("prezzomin"),
					prezzomax:$('#prezzoprodotto').val(),//$(this).data("prezzomax"),
					prodotto:$('#idprodotto').val(),//$(this).data("prodotto"),
					id:idriga,
					nome:'',//$(this).data("nome"),
					idwishlists:idwishlist//$(this).data('idwishlists')

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
$(document).ready(function(){
	$("#introPageIdeeRegalo h2 span").click(function(){
		window.location.href =$(".ideeregalomenu a").attr("href");
	});
	$(".openpopup").click(function(){
		var url=$(this).parent("a").attr("href");
		var stile = "top=10, left=10, width=700, height=400, status=no, menubar=no, toolbar=no scrollbars=no";
		  window.open(url, "Share on Facebook", stile);
	});
//	Gestione dei menu a tendina
	$("li.menuAltro select, li.menuMobile select, " +
			"ul#footerMobile li select, #tendinaMenuWL select, " +
			"#select_categoria_negozi").change(function(){
		var url = $(this).val();
		if(url != "#" && url != ""){
			window.location.href = url;
		}
	});

//	Handler
	//addHandlerList("li.elemento-0");
	var totale=0;
  $(".prezzo_singolo").each(function(){
	  totale=totale+parseFloat($(this).html()*1);

  });
  $(".euri").html(totale.roundTo(2));

	$("#addElementWL").click(function(){
		$("table.filtri select, table.filtri .start, table.filtri .end").attr("disabled", true);
		$(".slider").slider('disable');
		$(".cerca").hide();
		$(".bottoni").show();
		$(".selectProdotti").remove();

		var contatore=0;
		$(".selectProdotti").remove();
			$("#elementiWL li").each(function(){
				contatore=parseInt($(this).attr("class").replace("elemento-","")*1);
			});
		contatore++;

		var html = '<li class="elemento-'+contatore+'"><table class="filtri hideprodotto"><tr><th>'+interessi+'</th><th>BUDGET</th></tr><tr><td>';
		html += '<select id="elemento-'+contatore+'-interessi"><option value="-">----</option>';
		$.each(tagisjson, function(i, item) {
			html+="<option value='"+item.termid+"'>"+item.name.capitalize()+"</option>";
		});
		html +='</select></td>';
		html += '</td><td><div class="slider"></div><input type="text" class="start" value=" &euro; 1" id="elemento-'+contatore+'-start">';
		html += '<input type="text" class="end" value=" &euro; 4999" id="elemento-'+contatore+'-end"><input type="hidden" class="appoggio"></td></tr></table>';
		html += '<div class="cerca">'+cercaregalo+'</div><div class="bottoni" style="display:none;"><div class="bottoneRicerca"><img src="'+urlTemplate+'/images/nullpix.png" style="width:60px;height:67px" title="'+cercaregalo+'"></div>';
		html += '<div class="bottoneEdita"><img src="'+urlTemplate+'/images/nullpix.png" style="width:60px;height:67px" title="'+modificaregalo+'"></div><div class="bottoneCancella"><img src="'+urlTemplate+'/images/nullpix.png" style="width:60px;height:67px" title="'+eliminaregalo+'"></div></div>';
		html += '<div class="spinner" style="display:none"><img src="'+urlTemplate+'/images/ajax-loader.gif" class="loaderimg" style="margin-left: 21px; margin-top: 16px;"/></div>';
		html+='<div class="clear"></div></li>';
		$("#elementiWL").append(html);
		addHandlerWishList('li.elemento-'+contatore);
	});


	$(".nomeWL").keyup(function (event) {
        if (event.keyCode == '13') {
        	$("#creaWishList").click();
        }
        return false;
	});
	$(".nomeUtente").keyup(function (event) {
        if (event.keyCode == '13') {
        	$("#creaWishList").click();
        }
        return false;
	});
	$(".eta").keyup(function (event) {
        if (event.keyCode == '13') {
        	$("#creaWishList").click();
        }
        return false;
	});

//apertura dialog login & registrazione
	$("#menuLogin a").click(function(){
		$("#registrazione-modal-content-tablet").modal();
		return false;
	});

	$("#registrazioneZone div input").each(function(){
		$(this).data("defaultValue",$(this).val());
	});

	$("#loginZone div input").each(function(){
		$(this).data("defaultValue",$(this).val());
	});
	$("#login-modal-content-tablet div input,#registrazione-modal-content-tablet div input").each(function(){
		$(this).data("defaultValue",$(this).val());
	});

//svuota l'input del dialog
	$("#registrazioneZone div input").focusin(function(){

		$(this).data("value",$(this).val());
		$(this).val("");
	}).focusout(function(){
		if($(this).attr("id")!="passwordAdd" && $(this).attr("id")!="confermaPassword")
			if($(this).val()==""){
				$(this).val($(this).data("value"));
			}
	});

	$("#loginZone div input").focusin(function(){
		$(this).data("value",$(this).val());
		$(this).val("");
	}).focusout(function(){
		if($(this).attr("id")!="passwordAdd" && $(this).attr("id")!="confermaPassword")
			if($(this).val()==""){
				$(this).val($(this).data("value"));
			}
	});

	$("#login-modal-content-tablet div input").focusin(function(){
		$(this).data("value",$(this).val());
		$(this).val("");
	}).focusout(function(){
		if($(this).attr("id")!="passwordAdd" && $(this).attr("id")!="confermaPassword")
			if($(this).val()==""){
				$(this).val($(this).data("value"));
			}
	});
	$("#registrazioneZone div input").focusin(function(){
		$(this).data("value",$(this).val());
		$(this).val("");
	}).focusout(function(){
		if($(this).attr("id")!="passwordAdd" && $(this).attr("id")!="confermaPassword")
			if($(this).val()==""){
				$(this).val($(this).data("value"));
			}
	});
	$("#registrazione-modal-content-tablet div input").focusin(function(){
		$(this).data("value",$(this).val());
		$(this).val("");
	}).focusout(function(){
		if($(this).attr("id")!="passwordAddTablet" && $(this).attr("id")!="confermaPasswordTablet")
			if($(this).val()==""){
				$(this).val($(this).data("value"));
			}
	});

//Gestione input password
	$("#fakePassword").focusin(function(){
		$(this).hide();
		$("#passwordAdd").show();
		$("#passwordAdd").focus();

	});

	$("#fakePasswordLogin").focusin(function(){
		$(this).hide();
		$("#password").show();
		$("#password").focus();

	});	/*
	$("#password").focusout(function(){
		if($("#password").val()==""){
			$(this).hide();
			$("#fakePasswordLogin").show();
		}
	});	*/


	$("#fakeEmailLogin").focusin(function(){
		$(this).hide();
		$("#email").show();
		$("#email").focus();

	});	/*
	$("#email").focusout(function(){
		if($("#email").val()==""){
			//$(this).hide();
			$("#fakeEmailLogin").show();
		}
	});	*/



	$("#passwordAdd").focusout(function(){
		if($("#passwordAdd").val()==""){
			$(this).hide();
			$("#fakePassword").show();
		}
	});
	$("#fakePasswordTablet").focusin(function(){
		$(this).hide();
		$("#passwordAddTablet").show();
		$("#passwordAddTablet").focus();

	});


	$("#passwordAddTablet").focusout(function(){
		if($("#passwordAddTablet").val()==""){
			$(this).hide();
			$("#fakePasswordTablet").show();
		}
	});


	$("#fakePasswordConferma").focusin(function(){
		$(this).hide();
		$("#confermaPassword").show();
		$("#confermaPassword").focus();

	});
	$("#fakePasswordConfermaTablet").focusin(function(){
		$(this).hide();
		$("#confermaPasswordTablet").show();
		$("#confermaPasswordTablet").focus();

	});
	$("#confermaPassword").focusout(function(){
		if($("#confermaPassword").val()==""){
			$(this).hide();
			$("#fakePasswordConferma").show();
		}
	});
	$("#confermaPasswordTablet").focusout(function(){
		if($("#confermaPasswordTablet").val()==""){
			$(this).hide();
			$("#fakePasswordConfermaTablet").show();
		}
	});



	//crea whish da login
	$("#FakenomeLista").focusin(function(){
		$(this).hide();
		$("#nomeLista").show();
		$("#nomeLista").focus();

	});
	$("#nomeLista").focusout(function(){
		if($("#nomeLista").val()==""){
			$(this).hide();
			$("#FakenomeLista").show();
		}
	});

	//crea whish da product
	$("#FakenomeLista2").focusin(function(){
		$(this).hide();
		$("#nomeLista2").show();
		$("#nomeLista2").focus();

	});
	$("#nomeLista2").focusout(function(){
		if($("#nomeLista2").val()==""){
			$(this).hide();
			$("#FakenomeLista2").show();
		}
	});


	$("#addUtente").click(function(){
		if($("#nome").val().trim() =="" ||  $("#nome").val().trim() == $("#nome").data("defaultValue")){
			alert(titleerrore);
			return false;
		}

		if($("#cognome").val().trim() =="" ||  $("#cognome").val().trim() ==$("#cognome").data("defaultValue")){
			alert(cognomeerrore);
			return false;
		}
		var filter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if($("#mail").val().trim() =="" ||  $("#mail").val().trim() ==$("#mail").data("defaultValue") || !filter.test($('#mail').val())){
			alert(mailnonvalida);
			return false;
		}
		if($("#passwordAdd").val().trim() == ""
			|| $("#passwordAdd").val() != $("#confermaPassword").val()
		){
			alert(passnonvalida);
			return false;
		}
		if(!$.isNumeric($("#eta").val())){
			alert(numericononvalido);
			return false;
		}
		if(!$("#autorizzo").is(':checked')){
			alert(accettanonvalido);
			return false;
		}
		var newsletter=0;
		if($("#newsletter").is(':checked')){
			newsletter=1;
		}
		$.ajax({
			  type: 'POST',
			  url: urlAjax,
			  data: {
				  action: 'my_registration',
				  nome: $("#nome").val(),
				  cognome:$("#cognome").val(),
				  mail:$("#mail").val(),
				  password:$("#passwordAdd").val(),
				  eta:$("#eta").val(),
				  gender:$("#sesso option:selected").val(),
				  newsletter:newsletter

			  },
			  success: function(data, textStatus, XMLHttpRequest){
				  alert(data);
				  $(".modalCloseImg").click();
			  },
			  error: function(MLHttpRequest, textStatus, errorThrown){
				  alert("error");
			  }
		});
	});

	$("#addUtenteTablet").click(function(){
		if($("#nomeTablet").val().trim() =="" ||  $("#nomeTablet").val().trim() == $("#nomeTablet").data("defaultValue")){
			alert(titleerrore);
			return false;
		}

		if($("#cognomeTablet").val().trim() =="" ||  $("#cognomeTablet").val().trim() ==$("#cognomeTablet").data("defaultValue")){
			alert(cognomeerrore);
			return false;
		}
		var filter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if($("#mailTablet").val().trim() =="" ||  $("#mailTablet").val().trim() ==$("#mailTablet").data("defaultValue") || !filter.test($('#mailTablet').val())){
			alert(mailnonvalida);
			return false;
		}
		if($("#passwordAddTablet").val().trim() == ""
			|| $("#passwordAddTablet").val() != $("#confermaPasswordTablet").val()
		){
			alert(passnonvalida);
			return false;
		}
		if(!$.isNumeric($("#etaTablet").val())){
			alert(numericononvalido);
			return false;
		}
		if(!$("#autorizzoTablet").is(':checked')){
			alert(accettanonvalido);
			return false;
		}
		var newsletter=0;
		if($("#newsletterTablet").is(':checked')){
			newsletter=1;
		}
		$.ajax({
			  type: 'POST',
			  url: urlAjax,
			  data: {
				  action: 'my_registration',
				  nome: $("#nomeTablet").val(),
				  cognome:$("#cognomeTablet").val(),
				  mail:$("#mailTablet").val(),
				  password:$("#passwordAddTablet").val(),
				  eta:$("#etaTablet").val(),
				  gender:$("#sessoTablet option:selected").val(),
				  newsletter:newsletter

			  },
			  success: function(data, textStatus, XMLHttpRequest){
				  alert(data);
				  $(".modalCloseImg").click();
			  },
			  error: function(MLHttpRequest, textStatus, errorThrown){
				  alert("error");
			  }
		});
	});

	$(".loginUtente").click(function(){
		$.ajax({
			  type: 'POST',
			  url: urlAjax,
			  data: {
				  action: 'my_login',
				  mail:$("#email").val(),
				  password:$("#password").val(),

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


	$("#fakePasswordLoginTablet").focusin(function(){
		$(this).hide();
		$("#passwordTablet").show();
		$("#passwordTablet").focus();

	});
	/*$("#passwordTablet").focusout(function(){
		if($("#passwordTablet").val()==""){
			$(this).hide();
		}
		$("#fakePasswordLoginTablet").show();
	});	*/
	$("#loginUtenteTablet").click(function(){
		$.ajax({
			  type: 'POST',
			  url: urlAjax,
			  data: {
				  action: 'my_login',
				  mail:$("#emailTablet").val(),
				  password:$("#passwordTablet").val(),

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


	$(".login_tablet").click(function(){
		$("#login-modal-content-tablet").modal({
		containerCss : {
			'min-height': 250,
			'max-height':300
		}
		});
		return false;
	});
	$(".reg_tablet").click(function(){
		$("#registrazione-modal-content-tablet").modal({
			containerCss : {
				'height':'400px'
			}
			});
		return false;
	});
	$(".logoutgiallo").click(function(){
		$.ajax({
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



	$("#creaWishList").click(function(){
		if($("input[name=nomeLista]").val().trim()==""){
			alert(titleerrore);
			return false;
		}
		$.ajax({
			  type: 'POST',
			  url: urlAjax,
			  data: {
				  action: 'my_wishlist',
				  nome:$("input[name=nomeLista]").val(),
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
	$("#creaWishList2").click(function(){
		if($("input[name=nomeLista2]").val().trim()==""){
			alert(titleerrore);
			return false;
		}
		$.ajax({
			  type: 'POST',
			  url: urlAjax,
			  data: {
				  action: 'my_wishlist',
				  nome:$("input[name=nomeLista2]").val(),
			  },
			  success: function(data, textStatus, XMLHttpRequest){
				  if(data!="e"){
					  addinWishList(data);
				  }
			  },
			  error: function(MLHttpRequest, textStatus, errorThrown){
				  alert("error");
			  }
		});
		return false;
	});


	//da responsive
	$("#creaWishListResp").click(function(){
		if($("#nomeListaResp").val().trim()==""){
			alert(titleerrore);
			return false;
		}
		$.ajax({
			  type: 'POST',
			  url: urlAjax,
			  data: {
				  action: 'my_wishlist',
				  nome:$("#nomeListaResp").val(),
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




	$("body").on("click",".nome_prodotto",function(){
		$(this).parent().parent().children("td").children(".immagine_prodotto").click();
	});
	$("body").on("click",".nome_negozio",function(){
		var url="";
		if(urlSite.indexOf("lang")!="-1"){
			url=urlSite+"&p="+$(this).attr("contextmenu");
		}else{
			url=urlSite+"?p="+$(this).attr("contextmenu");
		}
		window.open(url);
	});



	$("#addinWishList").click(function(){
		addinWishList(null);

	});


	//$(".bottoneView.wishlist").click(function(){
	$(".view.wishlist").click(function(){
		var id=$(this).attr("id").replace("wishlists_","");
		//window.location=urlSite+"&page_id=3124&idwishlist="+id+"&ln="+lang;
		window.location=urlSite+"&page_id=3119&idwishlist="+id+"&ln="+lang;
	});
	$(".bottoneCancella.wishlist").click(function(){
		var id=$(this).attr("id").replace("wishlists_del_","");
		$.post(urlAjax,{action:"my_delete_wishlists",id:id});
		$(this).parent().parent().remove();
	});

	$("#apriDialogInviaAmico").click(function(){
		$("#inviaAmico-modal-content").modal({
			containerCss : {
				width: 450,
				height: 200
			}
		});
	});
	$("#submitInviaAmico").click(function(){
		var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var mail = $("#mailInviaAmico").val();
		var lang = $("#langInviaAmico").val();
		if(reg.test(mail)){
			$.ajax({
				  type: 'POST',
				  url: urlAjax,
				  data: {
					  action: 'sendMail',
					  mail: mail,
					  lang:lang,
					  url: $("#urlInviaAmico").val()
				  },
				  success: function(data, textStatus, XMLHttpRequest){
					  alert(data);
				  },
				  error: function(MLHttpRequest, textStatus, errorThrown){
					  alert("error");
				  }
			});
		}else{
			switch (lang) {
				case 'it':
					msg = "L'indirizzo email inserito non \xE8 valido";
					break;
				case 'fr':
					msg = "L'adresse email est invalide";
					break;
				default:
					msg="The email address is invalid"
					break

			}

			alert(msg);
		}
	});
});

function addHandlerList(id){
	var idElement=id.replace("li.","");
	//var min=$("#"+idElement+"-start").val().replace(/\u20ac/g, '').replace(/ /g, "");
	//var max=$("#"+idElement+"-end").val().replace(/\u20ac/g, '').replace(/ /g, "");
	$(id+' .slider').slider({
		 range: true,
		 min: 1,
		 max: 4999,
		 values: [ min, max ],
		 step:100,
		 slide: function( event, ui ) {
			 $(this).siblings('.start').val($(this).siblings('.appoggio').html(ui.values[0]).text());
			 $(this).siblings('.end').val($(this).siblings('.appoggio').html(ui.values[1]).text());
		 }
	 });

	var valoreIniziale = "";
	$(id+' input.start, '+id+' input.end').focusin(function(){
		valoreIniziale = $(this).val();
		$(this).val("");
	});
	$(id+' input.start, '+id+' input.end').focusout(function(){
		var valore = $(this).val();
		$(this).siblings('.appoggio').html("&euro; ");
//		$(this).val($(this).siblings('.appoggio').html());
		if($(this).hasClass('start')){
			var max = $(id+' input.end').val().replace(/\u20ac/g, '').replace(/ /g, "");
			if(parseInt(max) > parseInt(valore) && parseInt(valore) < 4999){
				$(id+' .slider').slider( "values", [valore, max]);
				$(this).val($(this).siblings('.appoggio').html()+" "+$(this).val());
			}else{
			}
		}else{
			var min = $(id+' input.start').val().replace(/\u20ac/g, '').replace(/ /g, "");
			if(parseInt(min) < parseInt(valore) && parseInt(valore) < 4999){
				$(id+' .slider').slider( "values", [min, valore]);
				$(this).val($(this).siblings('.appoggio').html()+" "+$(this).val());
			}else{
			}
		}
	});
	$(id+' input.start, '+id+' input.end').keyup(function (event) {
        if (event.keyCode == '13') {
        	$(this).blur();
        }
        return false;
    });

//	Cancellazione di un evento
	$(id+' div.bottoni div.bottoneCancella').click(function(){
		$(id+" .spinner").show();
		if($(id).children(".idrecord").val()!=""){
			$.post(urlAjax,{action:"my_delete_giftlist",id:$(id).children(".idrecord").val(),idgiftlists:idgiftlist},function(){
				$(id+" .spinner").hide();
			});
		}
		var idCarosello=id.replace(".elemento-","#select-");
		$(id).remove();
		$(idCarosello).remove();
		var totale=0;
		  $(".prezzo_singolo").each(function(){
			  totale=totale+parseFloat($(this).html()*1);

		  });
		  $(".euri").html(totale.roundTo(2));
	});



//	Click sul bottone edita una riga disabilitata
	$(id+' div.bottoni div.bottoneEdita').click(function(){
		$(id+" table.infoprodotto").hide();
		$(id+" table.hideprodotto").show();
		$(id+" table.filtri.hideprodotto input, "+id+" table.filtri select").attr("disabled", false);
		$(id+" .slider").slider('enable');
		$(id+" .cerca").show();
		$(id+" .bottoni").hide();
		$(".selectProdotti").remove();
	});
}

function addHandlerWishList(id){
	var idElement=id.replace("li.","");

	var min=$("#"+idElement+"-start").val().replace(/\u20ac/g, '').replace(/ /g, "");
	var max=$("#"+idElement+"-end").val().replace(/\u20ac/g, '').replace(/ /g, "");
	$('.appoggio_start').val(min);
	$('.appoggio_end').val(max);

	$(id+' .slider').slider({
		 range: true,
		 min: 1,
		 max: 4999,
		 step:10,
		 values: [ min, max ],
		 slide: function( event, ui ) {
			 $(this).siblings('.start').val($(this).siblings('.appoggio').html(ui.values[0]).text());
			 $(this).siblings('.end').val($(this).siblings('.appoggio').html(ui.values[1]).text());
			 $('.appoggio_start').val($(this).siblings('.appoggio').html(ui.values[0]).text());
			 $('.appoggio_end').val($(this).siblings('.appoggio').html(ui.values[1]).text());
		 }
	 });


	var valoreIniziale = "";
	$(id+' input.start, '+id+' input.end').focusin(function(){
		valoreIniziale = $(this).val();
		$(this).val("");
	});
	$(id+' input.start, '+id+' input.end').focusout(function(){
		var valore = $(this).val();
		$(this).siblings('.appoggio').html( valore);//
		$(this).val($(this).siblings('.appoggio').html());

		if($(this).hasClass('start')){
			var max = $(id+' input.end').val().replace(/\u20ac/g, '').replace(/ /g, "");

			if (Number(valore)){

				if(parseInt(max) > parseInt(valore) && parseInt(valore) < 4999){
					$(id+' .slider').slider( "values", [valore, max]);

				}else{
					var resetta_min = $('.appoggio_start').val();
					$(id+' input.start').val(resetta_min);
					$(id+' .slider').slider( "values", [resetta_min, max]);
				}
			}else{
					var resetta_min = $('.appoggio_start').val();
					$(id+' input.start').val(resetta_min);
					$(id+' .slider').slider( "values", [resetta_min, max]);
				}

		}else{
			var min = $(id+' input.start').val().replace(/\u20ac/g, '').replace(/ /g, "");

			if (Number(valore)){


				if(parseInt(min) < parseInt(valore) && parseInt(valore) < 4999){
					$(id+' .slider').slider( "values", [min, valore]);

				}else{
					var resetta_max = $('.appoggio_end').val();
					$(id+' input.end').val(resetta_max);
					$(id+' .slider').slider( "values", [min, resetta_max]);
				}
			}else{
					var resetta_max = $('.appoggio_end').val();
					$(id+' input.end').val(resetta_max);
					$(id+' .slider').slider( "values", [min, resetta_max]);
				}
		}
	});

	$(id+' input.start, '+id+' input.end').keyup(function (event) {
        if (event.keyCode == '13') {
        	$(this).blur();
        }
        return false;
    });

//	Cancellazione di un prodotto dalla whishlist
	$(id+' div.bottoni div.bottoneCancella').click(function(){

		if($(id).children(".idrecord").val()!=""){
			$.post(urlAjax,{action:"my_delete_wishlist",id:$(id).children(".idrecord").val(),idwishlists:idwishlist},function(){
				$(id+" .spinner").hide();
			});
		}

		$(id).remove();
		var totale=0;
		var tot_prodotti=0;

		$(".prezzo_singolo_js").each(function(){
		  tot_prodotti++;
		  totale=totale+parseFloat($(this).val());
		 });

		  if (tot_prodotti==0)
		  	 window.location=urlSite+'&page_id=3119';
		  else{
			  $(".euri").html(totale+ ' &euro;');
			  $(".tot_prodotti").html(tot_prodotti);
		  }

	});


	/*
		QUI PARTE DI FUNCTION TOLTA PERCHE DUPLICATA
	*/

	/* CARICA ALTRI PRODOTTI WHISLIST */
	$('div.altriprodotti').click(function(){
		var idParent="filterparams-0";
		var limit=9;

		/* GET VALORI GENERE */
		var chkArray = [];
		$(".genere input[type='checkbox']:checked").each(function() {
			chkArray.push($(this).val());
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
		$(".eta input[type='checkbox']:checked").each(function() {
			chkArray.push($(this).val());
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
		$(".categorie input[type='checkbox']:checked").each(function() {
			chkArray.push($(this).val());
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
		$(".sottocategorie input[type='checkbox']:checked").each(function() {
			chkArray.push($(this).val());
		});

		var selected;
		selected = chkArray.join(',') + ",";
		if(selected.length > 1){
			varsottocategorie=selected
		}
		else
		varsottocategorie='';

		$(id+' img.loaderimg').css("visibility","visible");
		$.ajax({
			  type: 'POST',
			  url:urlAjax,
			  data: {
				  action: 'my_prodotti_search',
				  eta:vareta,
				  genere:vargenere,
				  chi:"-",
				  //genere:$("#"+idParent+"-interessi option:selected").val(),
				  categorie:varcategorie,
				  sottocategorie:varsottocategorie,
				  pricestart:$("#"+idParent+"-start").val().replace(/\u20ac/g, '').replace(/ /g, ""),
				  pricend:$("#"+idParent+"-end").val().replace(/\u20ac/g, '').replace(/ /g, ""),
				  limit:limit,
			  },
			  dataType: "json",
			  success: function(data, textStatus, XMLHttpRequest){
						var urlSplit=urlTemplate.split("themes");
						var html='';
						$.each(data, function(i, item) {
							html += '<div class="list_prod"><a href="'+item.link_prod+'"><img src="'+urlSplit[0]+"/uploads/"+item.img+'" class="immagineProdotto" /></a><p class="categoria">'+item.categoria_principale+'</p><a class="titolo" href="'+item.link_prod+'">'+item.nome+'</a><div class="cont_prezzo"><div class="prezzo">'+item.prezzo+' &euro;</div><p class="lotrovida"><a href="'+item.negozio_link+'">'+item.negozio+'</a></p></div></div>';


						});

						$(id+' img.loaderimg').css("visibility","hidden");
				  		$("#cont_whishlist").append(html);
			  },
			  error: function(MLHttpRequest, textStatus, errorThrown){
				  alert("error");
			  }
		});
	});



	//  Click sui bottoni cerca regalo
	$(id+' div.cerca, '+id+' div.bottoni div.bottoneRicerca').click(function(){
		var idParent="";
		if($(this).hasClass("cerca")){
			idParent=$(this).parent().attr("class");
		}else{
			idParent=$(this).parent().parent().attr("class");
		}
		var limit=9;
		if($.browser.msie && $.browser.version=="8.0"){
			limit=9;
		}

		/* GET VALORI GENERE */
		var chkArray = [];
		$(".genere input[type='checkbox']:checked").each(function() {
			chkArray.push($(this).val());
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
		$(".eta input[type='checkbox']:checked").each(function() {
			chkArray.push($(this).val());
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
		$(".categorie input[type='checkbox']:checked").each(function() {
			chkArray.push($(this).val());
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
		$(".sottocategorie input[type='checkbox']:checked").each(function() {
			chkArray.push($(this).val());
		});

		var selected;
		selected = chkArray.join(',') + ",";
		if(selected.length > 1){
			varsottocategorie=selected
		}
		else
		varsottocategorie='';

		$(id+' img.loaderimg').css("visibility","visible");
		$.ajax({
			  type: 'POST',
			  url:urlAjax,
			  data: {
				  action: 'my_prodotti_search',
				  eta:vareta,
				  genere:vargenere,
				  chi:"-",
				  //genere:$("#"+idParent+"-interessi option:selected").val(),
				  categorie:varcategorie,
				  sottocategorie:varsottocategorie,
				  pricestart:$("#"+idParent+"-start").val().replace(/\u20ac/g, '').replace(/ /g, ""),
				  pricend:$("#"+idParent+"-end").val().replace(/\u20ac/g, '').replace(/ /g, ""),
				  limit:limit,
			  },
			  dataType: "json",
			  success: function(data, textStatus, XMLHttpRequest){
						var urlSplit=urlTemplate.split("themes");
						var html='';
						$.each(data, function(i, item) {
							html += '<div class="list_prod"><a href="'+item.link_prod+'"><img src="'+urlSplit[0]+"/uploads/"+item.img+'" class="immagineProdotto" /></a><p class="categoria">'+item.categoria_principale+'</p><a class="titolo" href="'+item.link_prod+'">'+item.nome+'</a><div class="cont_prezzo"><div class="prezzo">'+item.prezzo+' &euro;</div><p class="lotrovida"><a href="'+item.negozio_link+'">'+item.negozio+'</a></p></div></div>';


						});

						$(id+' img.loaderimg').css("visibility","hidden");
				  		$("#cont_whishlist").html(html);
			  },
			  error: function(MLHttpRequest, textStatus, errorThrown){
				  alert("error");
			  }
		});

	});

	$('#prodotticorrelati').click(function(){
		var inizio=parseInt($('#start_correlati').val());
		var fine=parseInt($('#end_correlati').val());
		var risultati=parseInt($('#risultati').val());
		for (var i=inizio; i<=fine;i++){
			var ele='#prod_'+(i+1);
			if (i<=risultati)
				$(ele).show();
			else
				$('#prodotticorrelati').css('display','none');
		}
		$('#start_correlati').val(inizio+9);
		$('#end_correlati').val(fine+9);

	});





//	Click sul bottone edita una riga disabilitata
	$(id+' div.bottoni div.bottoneEdita').click(function(){
		$(id+" table.infoprodotto").hide();
		$(id+" table.hideprodotto").show();
		$(id+" table.filtri.hideprodotto input, "+id+" table.filtri select").attr("disabled", false);
		$(id+" .slider").slider('enable');
		$(id+" .cerca").show();
		$(id+" .bottoni").hide();
		$(".selectProdotti").remove();
	});
}






function addHandlerProdotti(id){
	if($(window).width() > 1004){
		istanziaCarosello(id);
	}
	$(window).resize(function(){
		if($(window).width() > 1004){
			istanziaCarosello(id);
		}else{
			$('ul#'+id+' li.selectProdotti ul').trigger("destroy", true);
		}
	});

	$(".addLinkExt").click(function(){
		if($(".formLinkExt").length == 0){
			var html = '<div class="formLinkExt"><table class="filtri hideprodotto"><tr><th>PRODOTTO</th><th>PREZZO</th></tr>';
			html += '<tr><td><input type="text" class="prodotto" value="" /></td><td><input type="text" class="prezzo" value="" /></td></tr>';
			html += '</table><table class="filtri hideprodotto"><tr><th>NEGOZIO</th><th>LINK</th></tr><tr><td><input type="text" class="negozio" value="" />';
			html += '</td><td><input type="text" class="link" value="" /></td></tr></table><div class="inserisciProdotto">';
			html += 'INSERISCI PRODOTTO</div><div class="clear"></div></div><input type="hidden" class="idrecord" value="">';
			$(this).after(html);
//			TODO Handler bottone Inserimento Link Esterno
		}
	});
}

function istanziaCarosello(id){
	$('ul#'+id+' li.selectProdotti ul').carouFredSel({
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
	$("div.caroufredsel_wrapper").css("float", "left");
	$("div.caroufredsel_wrapper").css("margin", 0);
}
