var toEditFormId;
function edit(btn) {
    toEditFormId= btn.getAttribute('data-form-id');
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
        const btnGroupt= btn.getAttribute('data-btn-group');
        if(btnGroupt == 'pInfo') {
            pInfoEditAjax();
        }else if(btnGroupt == 'wExp') {
            wExpEditAjax();
        }else if(btnGroupt == 'educ') {
            educEditAjax();
        }else if(btnGroupt == 'fLang') {
            fLangEditAjax();
        }else if(btnGroupt == 'expSkill') {
            expSkillEditAjax();
        }else if(btnGroupt == 'cAndC') {
            editCandCAjax();
        }else if(btnGroupt == 'achv') {
            editAchvAjax();
        }

    }
}

function pInfoEditAjax() {
    const formData= $('#'+toEditFormId).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/editPinfo",
        type:"POST",
        data: formData
        ,
        success:function(response){
        if(response) {
            alert(response['pInfoId']);
        }
        },
    });
}

function wExpEditAjax() {
    const formData= $('#'+toEditFormId).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/editWexp",
        type:"POST",
        data: formData
        ,
        success:function(response){
        if(response) {
            alert(response['wExpId']);
        }
        },
    });
}

function educEditAjax() {
    const formData= $('#'+toEditFormId).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/editEduc",
        type:"POST",
        data: formData
        ,
        success:function(response){
        if(response) {
            alert(response['educId']);
        }
        },
    });
}

function fLangEditAjax() {
    const formData= $('#'+toEditFormId).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/editFlang",
        type:"POST",
        data: formData
        ,
        success:function(response){
        if(response) {
            alert(response['fLangId']);
        }
        },
    });
}

function expSkillEditAjax() {
    const formData= $('#'+toEditFormId).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/editExpSkill",
        type:"POST",
        data: formData
        ,
        success:function(response){
        if(response) {
            alert(response['expSkillId']);
        }
        },
    });
}

function editCandCAjax() {
    const formData= $('#'+toEditFormId).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/editCandC",
        type:"POST",
        data: formData
        ,
        success:function(response){
        if(response) {
            alert(response['cAndCId']);
        }
        },
    });
}

function editAchvAjax() {
    const formData= $('#'+toEditFormId).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/editAchv",
        type:"POST",
        data: formData
        ,
        success:function(response){
        if(response) {
            alert(response['achvId']);
        }
        },
    });
}
