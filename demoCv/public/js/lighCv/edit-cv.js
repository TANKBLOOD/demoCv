function edit(btn) {
    var content = btn.parentElement;
    if (content.classList.contains('box-head')) {
        content = content.nextElementSibling;
    }
    var valueTags = content.getElementsByClassName('value');
    var btnDefultTxt = 'ویرایش اطلاعات';
    var selectInput = document.getElementById('research-type');
    
    for (var valueTag of valueTags) {
        var input = valueTag.nextElementSibling;

        if (btn.innerText === btnDefultTxt) {
            input.value = valueTag.innerHTML;
            if (input.id === "research-type") {
                var opts = selectInput.options;
                for (var opt of opts) {
                    if (opt.innerHTML === valueTag.innerHTML){
                        selectInput.value = opt.value;
                    }
                }
            }
    
        } else {
            console.log(1);
            if (input.classList.contains('radio-options')) {
                var radioBoxs = input.getElementsByClassName('radio-box');
                for (var radioBox of radioBoxs) {
                    var radioLabel = radioBox.getElementsByTagName('label')[0];
                    var radio = radioLabel.nextElementSibling;
                    if (radioLabel.innerHTML === valueTag.innerHTML) {
                        radio.checked = true;
                    }
                    radio.addEventListener('click', function () {
                        btn.parentElement.parentElement.previousElementSibling.innerHTML = btn.previousElementSibling.innerHTML;
                    });
                }
            } else if (input.id === "research-type") {
                selectdOption = selectInput.options[selectInput.selectedIndex];
                valueTag.innerHTML = selectdOption.innerHTML;
            }else {
                valueTag.innerHTML = input.value;
            }
            
        }
        valueTag.classList.toggle('gone');
        input.classList.toggle('gone');
    }
    var fileInput = document.getElementById('img-input');
    if (fileInput) {
        fileInput.classList.toggle('hidden');
    }
    changeBtnTxt(btn, btnDefultTxt);
}

function changeBtnTxt(btn, btnDefultTxt) { 
    if (btn.innerText === btnDefultTxt) {
        btn.innerText = 'اتمام ویرایش';
    } else {
        btn.innerHTML = btnDefultTxt;
    }
}