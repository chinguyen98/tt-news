const captchaRandomTextZone = document.querySelector('.captcha');
const captchaInput = document.querySelector('input[name="captcha"]');
const notifyCaptcha = document.querySelector('.notifyCaptcha');

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
    notifyCaptcha.classList.add('d-none');
    return false;
}

window.addEventListener('load', createCaptcha);