$(document).ready(function(){
      $('.tabs').tabs();
      $('#tabs-swipe').tabs({ 'swipeable': false });
      $('.sidenav').sidenav();
      $('.dropdown-trigger').dropdown();
      $('.fixed-action-btn ').floatingActionButton();
      $('.carousel').carousel();
      $('.modal').modal({'preventScrolling': true});
      $('.tooltipped').tooltip();
});

document.addEventListener('DOMContentLoaded', function() {
    var elem = document.querySelector('.collapsible.expandable');
    var instance = M.Collapsible.init(elem, {
      accordion: false
    });
  });

function passwordMatch(id1,id2){
  var fieldId1=document.getElementById(id1);
  var fieldId2=document.getElementById(id2);
  var errorId='error'+id2;  
  errorId=document.getElementById(errorId);
  if(fieldId2.value==''){
    errorId.innerHTML="<div class='text-danger'>Please Enter Password</div>";
    fieldId2.classList.remove("is-valid");
    fieldId2.classList.add("is-invalid");
    return false;
  } else if(fieldId1.value!=fieldId2.value){
    errorId.innerHTML="<div class='text-danger'>Confirm Password doesn't match with Password Field</div>";
    fieldId2.classList.remove("is-valid");
    fieldId2.classList.add("is-invalid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId2.classList.remove("is-invalid");
    fieldId2.classList.add("is-valid");
    return true;
  }
}
function checkFileInput(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
  var sFileName = fieldId.value;
  if (sFileName.length > 0) {
    var blnValid = false;
    for (var j = 0; j < _validFileExtensions.length; j++) {
      var sCurExtension = _validFileExtensions[j];
      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
        blnValid = true;
        break;
      }
    }
    if (!blnValid) {
     errorId.innerHTML="<div class='text-danger'>Invalid File Type</div>";
     fieldId.classList.remove("is-valid");
     fieldId.classList.add("is-invalid");
     return false; 
   }
 }
 if(fieldId.value==''){
  errorId.innerHTML="<div class='text-danger'>Image is required</div>";
  fieldId.classList.remove("is-valid");
  fieldId.classList.add("is-invalid");
  return false;
}
else if(fieldId.files[0].size > 1048576){
  errorId.innerHTML="<div class='text-danger'>Image Size is greater then required</div>";
  fieldId.classList.remove("is-valid");
  fieldId.classList.add("is-invalid");
  return false;
}
else{
 errorId.innerHTML="";
 fieldId.classList.remove("is-invalid");
 fieldId.classList.add("is-valid");
 return true;
}
}
function checkFieldName(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if(fieldId.value==''){
    errorId.innerHTML="<div class='text-danger'>Entry is required</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  }   else{
    errorId.innerHTML="";
    fieldId.classList.remove("is-invalid");
    fieldId.classList.add("is-valid");
    return true;
  }  
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#cover_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#book_cover").change(function() {
  readURL(this);
});
function checkFieldEmail(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if(fieldId.value==''){
    errorId.innerHTML="<div class='text-danger'>Email is required</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(fieldId.value)){
    errorId.innerHTML="<div class='text-danger'>Invalid Email Address</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId.classList.remove("is-invalid");
    fieldId.classList.add("is-valid");
    return true;
  }
}
function checkFieldPassword(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if (fieldId.value.length<8){
    errorId.innerHTML="<div class='text-danger'>Password must be greater than equal to 8</div>";
    fieldId.classList.add("is-invalid");
    fieldId.classList.remove("is-valid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId.classList.add("is-valid");
    fieldId.classList.remove("is-invalid"); 
    return true;
  }
}