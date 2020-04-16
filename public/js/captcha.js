const captchaRandomTextZone = document.querySelector('.captcha');
const captchaInput = document.querySelector('input[name="captcha"]');
const idTinInput = document.querySelector('input[name="Idtin"]');
const emailInput = document.querySelector('input[name="email"]');
const contentArea = document.querySelector('textarea[name="msg"]');
const notifyCaptcha = document.querySelector('.notifyCaptcha');
const notifyNoidung = document.querySelector('.notifyNoidung');
const notifySuccess = document.querySelector('.notifySuccess');
const notifyEmail = document.querySelector('.notifyEmail');
const btnBinhLuan = document.querySelector('.btnBinhLuan');

const checkEmailAndContent = function () {
    let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    notifyEmail.classList.add('d-none');
    notifyNoidung.classList.add('d-none');
    notifyEmail.innerHTML = '';
    let flag = true;
    if (!emailInput.value.match(regex)) {
        notifyEmail.innerHTML = 'Vui lòng nhập đúng định dạng địa chỉ email!';
        notifyEmail.classList.remove('d-none');
        setTimeout(function () {
            notifyEmail.classList.add('d-none');
        }, 2000);
        flag = false;
    }
    if (contentArea.value === '') {
        notifyNoidung.innerHTML = 'Vui lòng nhập bình luận!';
        notifyNoidung.classList.remove('d-none');
        setTimeout(function () {
            notifyNoidung.classList.add('d-none');
        }, 2000);
        flag = false;
    }
    return flag;
}

const makeRandomText = function (length) {
    var result = '';
    var characters = 'ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

const createCaptcha = function () {
    captchaInput.value = '';
    const length = Math.floor(Math.random() * (7 - 5)) + 5;;
    captchaRandomTextZone.innerHTML = makeRandomText(length);
}

const checkCaptcha = function () {
    if (captchaRandomTextZone.innerHTML !== captchaInput.value || captchaInput.value === '') {
        notifyCaptcha.innerHTML = 'Vui lòng nhập đúng mã bảo vệ!';
        captchaInput.value = '';
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
    if (checkEmailAndContent()) {
        if (checkCaptcha()) {
            const info = {
                'Email': emailInput.value,
                'Noidung': contentArea.value,
                'Id_tin': idTinInput.value
            };
            $.post('/api/binhluan', info, function (data, status) {
                notifySuccess.innerHTML = data.message;
                notifySuccess.classList.remove('d-none');
                setTimeout(function () {
                    notifySuccess.classList.add('d-none');
                }, 5000);
                emailInput.value = '';
                contentArea.value = '';
                createCaptcha();
            })
        }
    }
}

btnBinhLuan.addEventListener('click', storeBinhLuan);
window.addEventListener('load', createCaptcha);