var currentTab = 0;
showTab(currentTab);

function showTab(n) {
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "ثبت";
  } else {
    document.getElementById("nextBtn").innerHTML = "بعدی";
  }
  fixStepIndicator(n)
}

function nextPrev(n) {
  var x = document.getElementsByClassName("tab");
  if (n == 1 && !validateForm()) return false;
  x[currentTab].style.display = "none";
  currentTab = currentTab + n;
  if (currentTab >= x.length) {
    document.getElementById("user-info").submit();
    return false;
  }
  showTab(currentTab);
}

function validateForm() {
  var x, y, i, valid = true;
  // x = document.getElementsByClassName("tab");
  // y = x[currentTab].getElementsByTagName("input");
  // // A loop that checks every input field in the current tab:
  // for (i = 0; i < y.length; i++) {
  //   // If a field is empty...
  //   if (y[i].value == "") {
  //     // add an "invalid" class to the field:
  //     y[i].className += " invalid";
  //     // and set the current valid status to false:
  //     valid = false;
  //   }
  // }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  x[n].className += " active";
}


// IMG Preview
var input = document.getElementById('img-input');
var img = document.getElementById('img-preview');

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      img.setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

input.addEventListener('change', function() {
  readURL(this);
});


// Accordion
makeAccordion();

function makeAccordion() {
  var arrows = document.getElementsByClassName("fa-arrow-up");
  // var heads = document.getElementsByClassName("accordion-head");
  for (var arrow of arrows) {
    arrow.addEventListener("click", function (){
        this.parentNode.nextElementSibling.classList.toggle("active");
        this.classList.toggle("rotate180");
    });
  }
  close();
}

function close() {
  var closeBtns = document.getElementsByClassName("fa-times");
  for (var closeBtn of closeBtns) {
    closeBtn.addEventListener("click" ,function (){
      var parent = this.parentNode.parentNode; // Accordion or Box
      if(parent.parentNode.getElementsByClassName(parent.className).length > 1){
        this.parentNode.parentNode.remove();
      }else{
        alert('Error');
      }
    });
  }
}

// ---------------------------Add New----------------------------

var buttons = document.getElementsByClassName('add-new');

for (var button of buttons) {
    button.addEventListener('click', function(){
        var pattern = this.previousElementSibling;
        var parent = this.parentNode;
        var newNode = pattern.cloneNode(true);
        newNode.setAttribute('id', 'newCom');
        var editBtn = newNode.getElementsByClassName('btn-edit');
        if (editBtn.length > 0) {
          edit(editBtn[0]);
          editBtn[0].setAttribute('data-form-id', 'newCom');
        }
        var newNodeInputs = newNode.getElementsByTagName('Input');
        for (var inp of newNodeInputs){
            if(inp.getAttribute('name') == 'parentId') {
                continue;
            }
          inp.value = null;
        }

        var newNodeTextAreas = newNode.getElementsByTagName('textarea');
        for (var txtarea of newNodeTextAreas){
          txtarea.value = null;
        }

        var newNodeHead = newNode.getElementsByClassName("accordion-head")[0];
        if(newNodeHead){
          newNodeHead.getElementsByTagName("i")[1].addEventListener('click', function () {
            this.parentNode.nextElementSibling.classList.toggle("active");
            this.classList.toggle("rotate180");
          })
        }else {
          newNodeHead = newNode.getElementsByClassName("box-head")[0];
        }
        // close button
        newNodeHead.getElementsByClassName("fa-times")[0].addEventListener("click" ,function (){
          if(parent.getElementsByClassName(newNodeHead.className).length > 1){
            this.parentNode.parentNode.remove();
            //put the ajax funtion to delete here
          }else{
            alert('Error');
          }
        });

        parent.insertBefore(newNode, this);
    });
}
