var nombre, apellidos, email, pass, curp, repass;

function validarUsuarios()
{
	nombre = document.getElementById('registerName').value;
	apellidos= document.getElementById('registerLastName').value;
	email = document.getElementById('registerEmail').value;
	pass= document.getElementById('registerPassword').value;
	curp= document.getElementById('registerCurp').value;
	repass=document.getElementById('registerConfirm').value;
	if(nombre==="" || apellidos==="" || email==="" || pass==="" || curp==="" || repass=="")
	{
		alert("Ingrese la información solicitada");
		return false;
	}
	if(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/.test(nombre) === false)
	{
		alert("Sólo se acpetan letras en el nombre");
		return false;
	}
	if(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/.test(apellidos) === false)
	{
		alert("Sólo se acpetan letras en el apellido");
		return false;
	}
	if(pass != repass)
	{
		alert("La confirmación de contraseña no coincide");
		return false;
	}
	if(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/.test(curp) ===false)
	{
		alert("El curp no es correcto");
		return false;
	}
}

function validarAutos()
{
	var niv,model,plate,color,year,precio;
	niv=document.getElementById('niv').value;
	model=document.getElementById('model').value;
	year=document.getElementById('year').value;
	plate=document.getElementById('plate').value;
	color=document.getElementById('color').value;
	precio=document.getElementById('price').value;
	if(niv==="" || model==="" || year==="" || plate==="" || color==="")
	{
		alert('Llene los campos solicitados');
		return false;
	}
	if(/^([0-9])*$/.test(year)===false)
	{
		alert('Sólo números en año');
		document.getElementById('year').focus;
		return false;
	}
	if(/^([0-9])*$/.test(precio)===false)
	{
		alert('Sólo números en precio');
		document.getElementById('precio').focus;
		return false;
	}
}

function validarLogin()
{
	email=document.getElementById('email').value;
	pass=document.getElementById('password').value;
	if(email==="" || pass==="")
	{
		alert('Llene todos los campos');
		return false;
	}
}