function validateForm() {
  let x = document.forms["myForm"]["fname"].value;
  
  if ((x == "") && (validateEmail() !== false)) {
    document.getElementById('jmeno').innerText = "* Name is requiered";
    if (!((x !== "") && (validateEmail() == false))){
      document.getElementById('imejl').innerText = "*";
    }
    return false;
  }else if ((x == "") && (validateEmail() == false)){
    alert("Name and Email must be filled out");
    return false;
  }else if ((x !== "") && (validateEmail() == false)){
    document.getElementById('imejl').innerText = "* Email must be correctly filled out";
    if (!((x == "") && (validateEmail() !== false))){
      document.getElementById('jmeno').innerText = "*";
    }
    return false;
  }
}

function validateEmail()
    {
    var x=document.forms["myForm"]["email"].value
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
      {
      return false;
      }
    }