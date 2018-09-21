//	Delete Confirmation
function deleteConfirmation(){
	return confirm('Are you sure you want to delete this file?');
}

//	Admin Confirmation
function adminConfirmation(){
	return confirm('Are you sure you want to change this user into a Admin?');
}

//	Editor Confirmation
function editorConfirmation(){
	return confirm('Are you sure you want to delete this user into a Editor?');
}

//	Subscriber Confirmation
function subscriberConfirmation(){
	return confirm('Are you sure you want to delete this user into a Subscriber?');
}

//	Back Button Function onClick
function goBack() {
	window.history.back();
}
