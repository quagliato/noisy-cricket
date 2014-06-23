$(document).ready(function(){
    setEvents();
});

function validateNumbers(e) {
    var tecla = (window.event) ? event.keyCode : e.which;   
    
    if (tecla>47 && tecla<58)
    	return true;
    else {
    	if (tecla==8 || tecla==0)
    		return true;
    	else
    		return false;
    }
}

function validateSize(src, size) {
	if (src.value.length <= size) {
		src.className = 'good';
		return true;
	} else {
		src.className = 'error';
		return false;
	}
}

function formatGenericMask(src, mask){
	var i = src.value.length;
	var out = mask.substring(0,1);
	var text = mask.substring(i);
	
	if (text.substring(0,1) != out) {
		src.value += text.substring(0,1);
	}
}

function inputChangeState(src) {
	if (src.disabled) {
		alert('aqui');
		src.disabled = false;
	} else {
		alert('aqui2');
		src.disabled = true;
	}
}

var totalValue = 0;

function modifyValue(src, value) {
	if (src.checked) {
		totalValue += value;
	} else {
		if (totalValue > 0)
			totalValue -= value;
	}
	
	if (src == document.getElementById("inscricao_basica")) {
		if (document.getElementById("inscricao_basica").checked) {
			document.getElementById("alojamento").disabled = false;
			document.getElementById("alimentacao").disabled = false;
			document.getElementById("festas").disabled = false;
		} else {
			document.getElementById("alojamento").disabled = true;
			document.getElementById("alimentacao").disabled = true;
			document.getElementById("festas").disabled = true;
			
			document.getElementById("alojamento").checked = false;
			document.getElementById("alimentacao").checked = false;
			document.getElementById("festas").checked = false;
			
			totalValue = 0;
		}
	}
	
	document.getElementById("valor_final").innerHTML = totalValue.toFixed(2);
}

function validatePassword() {
	if (document.getElementById('senha').value != document.getElementById('confirmacao_senha').value) {
		document.getElementById('senha').className = 'error';
		document.getElementById('confirmacao_senha').className = 'error';		
	} else {
		document.getElementById('senha').className = 'good';
		document.getElementById('confirmacao_senha').className = 'good';
	}
}

function validateRestorePassword() {
	var senha = document.getElementById('senha').value;
	var confirmacao_senha = document.getElementById('confirmacao_senha').value;
	
	if (senha != confirmacao_senha) {
		alert("A confirmação da senha está diferente da senha.\nPor favor, corrija.");
		return false;
	} else if (senha == null || senha == "") {
		alert("Por favor, digita uma senha, né?");
		return false;
	}
	
	return true;
}

function validateRestoreRequest() {
	var email = document.getElementById('email').value;
	
	if (email == null || email == "") {
		alert("Por favor, preencha seu email.");
		return false;
	}
	
	return true;
}

function validateStep1() {
	var senha = document.getElementById('senha').value;
	var confirmacao_senha = document.getElementById('confirmacao_senha').value;
	
	if (senha != confirmacao_senha) {
		alert("A confirmação da senha está diferente da senha.\nPor favor, corrija.");
		return false;
	} else if (senha == null || senha == "") {
		alert("Por favor, digita uma senha, né?");
		return false;
	}
	
	return true;
}

function validateStep3() {

	if (!document.getElementById("inscricao_basica").checked && 
		!document.getElementById("alojamento").checked &&
		!document.getElementById("alimentacao").checked &&
		!document.getElementById("festas").checked) {
			alert("Pelo menos um pacote deve ser selecionado.");
			return false;
	}

	document.getElementById("inscricao_basica").disabled = false;	
	document.getElementById("alojamento").disabled = false;
	document.getElementById("alimentacao").disabled = false;
	document.getElementById("festas").disabled = false;
	
	return true;
}

function valida_nulo(caller) {
	if (caller.value.length == 0) {
		return true; 
	}
	return false;
}
