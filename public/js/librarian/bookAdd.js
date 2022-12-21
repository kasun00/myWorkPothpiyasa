let btn = document.getElementById('btn');
let vendorBtn = document.getElementById('vendorbtn');
let donorBtn = document.getElementById('donorbtn');
let vendor = document.getElementById('vendor');
let donor = document.getElementById('donor');
let addbtn = document.getElementById('addbookbtn');
let addpopup = document.getElementById('container_popup');
// let defaultTask = document.getElementById('defaultTask');

function getVendor() {
    vendor.style.visibility='visible';
    donor.style.visibility = 'hidden';
    // defaultTask.style.visibility = 'hidden';
    btn.style.left = "0px";
    donorBtn.style.color = "black";
    vendorBtn.style.color = "white";
    
  
  }
  
function getDonor(){
    vendor.style.visibility = "hidden";
    donor.style.visibility = "visible";
    // defaultTask.style.visibility = 'hidden';
    btn.style.left = "125px";
    vendorBtn.style.color = "black";
    donorBtn.style.color = "white";
  
  }

