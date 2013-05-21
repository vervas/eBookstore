function getHidden(){
    hidden=document.getElementById("padded");
    hidden.childNodes[0].innerHTML="<img src='ajax-loader.gif' alt='ajax-loader'/>";
	hidden.style.display="block";
	return hidden;
}
function changeform(e){
	var value=e.value;
	var table=document.getElementsByTagName("table")[0];
	if(value=="user")
	{
		var row=table.insertRow(1);
		var cell=row.insertCell(0);
		cell.style.align="right";
		cell.innerHTML="Username";
		var uname=document.createElement('input');
		uname.type="text";
		uname.name="uname";
		var cell1=row.insertCell(1);
		cell1.appendChild(uname);
	}
	else
	{
		table.deleteRow(1);
	}

}

function addToCartA(e,cat){
    var id=e.parentNode.parentNode.id;
    var elements=e.parentNode.parentNode.childNodes;
    var title=elements[0].childNodes[0].innerHTML.replace("#","%23");
    var price=elements[1].childNodes[0].innerHTML;
    var quan=elements[2].childNodes[0].value;
    ajaxCalls(getHidden().childNodes[0],"addtocart.php?id="+id+"&title="+title+"&pr="+price+"&q="+quan+"&c="+cat);
}

function addToCart(id,title,price,quan,cat){
	title=title.replace("#","%23");
    ajaxCalls(getHidden().childNodes[0],"addtocart.php?id="+id+"&title="+title+"&pr="+price+"&q="+quan+"&c="+cat);
}

function updateCart(e){
	var sib=e.parentNode.parentNode.previousSibling;
	var id=sib.id;
	var quan=sib.childNodes[2].childNodes[0].value;	
	if(quan>0)
	{
		ajaxCalls(getHidden().childNodes[0],"updatecart.php?id="+id+"&q="+quan);
		setTimeout("window.location.reload()",1000);
	}
	else if(quan==0)
	{
		if(confirm("Quantity is zero. Delete the product?"))
		{
			ajaxCalls(getHidden().childNodes[0],"deletebook.php?id="+id);
			setTimeout("window.location.reload()",1000);
		}
		else
		{
			e.parentNode.childNodes[0].style.color="red";
		}
	}
	else
	{
		alert("Negative quantity");
		e.parentNode.childNodes[0].style.color="red";
	}
}

function deleteBook(e){
	var id=e.parentNode.parentNode.previousSibling.id;
	ajaxCalls(getHidden().childNodes[0],"deletebook.php?id="+id);
	setTimeout("window.location.reload()",1000);
}

function deleteProduct(e){
	var id=e.parentNode.parentNode.id;
	if(confirm("Delete product?")){
		ajaxCalls(getHidden().childNodes[0],"deleteproduct.php?id="+id);
		setTimeout("window.location.reload()",1000);
	}
}

function deleteCustomer(e){
	var id=e.parentNode.parentNode.id;
	if(confirm("Delete customer?")){
		ajaxCalls(getHidden().childNodes[0],"deletecustomer.php?id="+id);
		setTimeout("window.location.reload()",1000);
	}
}

function emptyCart(){
	ajaxCalls(getHidden().childNodes[0],"emptycart.php");
	setTimeout("window.location.reload()",1000);
}

function checkSession(){
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
	        if(xmlhttp.responseText==2){
	        	window.location="index.php?p=13";
	        }
	        else
	        {
	        	getHidden().childNodes[0].innerHTML="Please log in as a customer.";
        	}
        }
    }
    xmlhttp.open("GET","checksession.php",true);
    xmlhttp.send();
}

function checkUsername(e){
	var username=e.value;
	xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
	        if(xmlhttp.responseText==1){
	        	getHidden().childNodes[0].innerHTML="Username not available.";
	        	e.value="";
	        }
        }
    }
    xmlhttp.open("GET","checkusername.php?un="+username,true);
    xmlhttp.send();
}

function validateForm(){
	var el=document.forms['signup'].elements;

    for (i in el){
    	if(!el[i].value&&i<7)
    	{
    		if(el[i].id!="empty"){
                var err = document.createElement('span');
                err.id = "error";
                err.appendChild(document.createTextNode("Empty"));
                el[i].parentNode.appendChild(err);
                el[i].id="empty";
            }
            return false;
    	}
    }
    
    if(el[5].value!=el[6].value){
    	if(el[6].id!="mismatch"){
    		var err = document.createElement('span');
        	err.id = "error";
        	err.appendChild(document.createTextNode("Passwords don't match"));
        	el[6].parentNode.appendChild(err);
        	el[6].id="mismatch";
        }
        return false;
    }
    
    if(el[6].value.length<8){
    	if(el[6].id!="short"){
    		var err = document.createElement('span');
        	err.id = "error";
        	err.appendChild(document.createTextNode("Password is too short"));
        	el[6].parentNode.appendChild(err);
        	el[6].id="short";
        }
        return false;
    }

    return true;
}

function validateProduct(){
	var el=document.forms['product'].elements;

    for (i in el){
    	if(!el[i].value&&i<el.length-1)
    	{
    		if(el[i].id!="empty"){
                var err = document.createElement('span');
                err.id = "error";
                err.appendChild(document.createTextNode("Empty"));
                el[i].parentNode.appendChild(err);
                el[i].id="empty";
            }
            return false;
    	}
    }
    
    if(isNaN(el[el.length-2].value)){
    	if(el[el.length-2].id!="nan"){
    		var err = document.createElement('span');
        	err.id = "error";
        	err.appendChild(document.createTextNode("Price is not a number"));
        	el[el.length-2].parentNode.appendChild(err);
        	el[el.length-2].id="nan";
        }
        return false;
    }

    return true;
}

function removeError(e){
	if(e.id=="empty"||e.id=="mismatch"||e.id=="short"||e.id=="nan"){
		y=e.parentNode.childNodes[1]
		e.parentNode.removeChild(y);
		e.id="";
	}
}

function showOrderDetails(e){
	var oid=e.parentNode.parentNode.id;
	od=document.getElementById("orderdetails");
	od.innerHTML="<img id='ajaxloader' src='ajax-loader.gif' alt='ajax-loader'/>";
	ajaxCalls(od,"ajaxorderdetails.php?oid="+oid);
	od.style.color="black";
}

function ajaxCalls(tar,url){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
        	if(tar!=null)
	        	tar.innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}

function hide(e){
	e.style.display="none";
	e.childNodes[0].innerHTML="";
}
function stoppg(e){
	e=e.onClick;
	if (!e) 
		var e = window.event;
	e.cancelBubble = true;
	
	if (e.stopPropagation) 
		e.stopPropagation();
}

function shadeCell(a,b)
{
    a.style.backgroundColor = '#f9f9f9';
    b.style.backgroundColor = '#f9f9f9';
}

function unShadeCell(a,b)
{
    a.style.backgroundColor = '';
    b.style.backgroundColor = '';
}

function showEdit(e){
	e.childNodes[2].style.display="inline";
}

function hideEdit(e){
	e.childNodes[2].style.display="none";
}

/*
shitty
window.onBeforeUnload=function(){
	if(document.getElementsByName("on").length>0){
		return "You have unsaved changes. Are you sure you want to leave the page?.";
	}
}
*/

function editDetails(e){
	var field=e.parentNode.childNodes[0];
	if(e.name=="off")
	{
		e.name="on";
		var text=field.innerHTML;
		var textfield=document.createElement('input');
		textfield.type="text";
		textfield.value=text;
		textfield.name=field.id;
		field.innerHTML="";
		field.appendChild(textfield);
	}
	else
	{
		e.name="off";
		field.innerHTML=field.childNodes[0].value;
		var url="changemydetails.php?f="+field.id+"&n="+field.innerHTML;
		ajaxCalls(null,url);
	}
}

function saveChanges(){
	var ons=document.getElementsByName("on");
	while(ons.length>0){
		editDetails(ons[0]);
	}
	ajaxCalls(getHidden().childNodes[0],"savechanges.php");
}

function discardChanges(){
	ajaxCalls(getHidden().childNodes[0],"discardchanges.php");
	setTimeout("window.location.reload()",1000);
}