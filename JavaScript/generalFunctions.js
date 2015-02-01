function confirmDelete(url){
	if (confirm('Do you want to delete the element selected?'))
		document.location=(url);
}
	
function confirmModify(url){
	if (confirm('Do you want to modify the element selected?'))
		document.location=(url);
}

function confirmInsert(url){
	if (confirm('Do you want to insert a new element?'))
		document.location=(url);
}

function confirmReset(){
	return window.confirm("Delete data?");
}

function confirmReserve(url){
	if (confirm('Do you want to check it off ?'))
		document.location=(url);
}

function confirmSend(url){
	if (confirm('Do you want to send the messages ?'))
		document.location=(url);
}

function removeText(obj){   
	obj.value = ''; 
} 