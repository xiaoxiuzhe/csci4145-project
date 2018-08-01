/**
 * 
 */
var CLOUDINARY_URL = 'https://api.cloudinary.com/v1_1/shawnx';
var CLOUDINARY_UPLOAD_PRESET = 'cxbjl5br';


function addChef(){
    var file = document.getElementById("file-upload").files[0];
    var name = document.getElementById("ChefName").value;
    var description = document.getElementById("Description").value;
    
    if(file == null || name == "" || description == ""){
        alert("Please fill out all information ");
        return false;
    }
    
    var formData = new FormData();
    formData.append('file', file);
    formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET);
    
    var xhr = new XMLHttpRequest();
    
    //add user to the firebase when image is stored in cloudinary
    xhr.onreadystatechange = function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
//    	alert("chef added, please refresh the page")
		var response = JSON.parse(xhr.responseText);
		var url = response.secure_url;
		  var messageListRef = firebase.database().ref("chefs");
		  var newMessageRef = messageListRef.push();
		  newMessageRef.set({
		    'ChefName': name,
			'Description': description,
			'img' : url
		  });
		  location.reload();
        }
    };
    
    //send the POST request to upload the image to cloudinary
    xhr.open('POST', CLOUDINARY_URL + "/upload", true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send(formData);
    
}