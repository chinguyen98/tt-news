const captchaRandomTextZone = document.querySelector('.captcha');
const captchaInput = document.querySelector('input[name="captcha"]');
const idTinInput = document.querySelector('input[name="Idtin"]');
const emailInput = document.querySelector('input[name="email"]');
const contentArea = document.querySelector('textarea[name="msg"]');
const notifyCaptcha = document.querySelector('.notifyCaptcha');
const btnBinhLuan = document.querySelector('.btnBinhLuan');

function makeRandomText(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

const createCaptcha = function () {
    const length = Math.floor(Math.random() * (7 - 5)) + 5;;
    captchaRandomTextZone.innerHTML = makeRandomText(length);
}

const checkCaptcha = function () {
    if (captchaRandomTextZone.innerHTML !== captchaInput.value || captchaInput.value === '') {
        notifyCaptcha.innerHTML = 'Vui lòng nhập đúng mã bảo vệ!';
        notifyCaptcha.classList.remove('d-none');
        setTimeout(function () {
            notifyCaptcha.classList.add('d-none');
        }, 2000);
        return false;
    }
    else {
        notifyCaptcha.classList.add('d-none');
        return true;
    }
}

const storeBinhLuan = async function () {
    if (checkCaptcha()) {
        const info = {
            'Email': emailInput.value,
            'Noidung': contentArea.value,
            'Id_tin': idTinInput.value
        };
        $.post('/api/binhluan', info, function (data, status) {
            console.log(data.message)
        })
    }
}

btnBinhLuan.addEventListener('click', storeBinhLuan);
window.addEventListener('load', createCaptcha);