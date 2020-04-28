const captchaRandomTextZone = document.querySelector('.captcha');
const captchaInput = document.querySelector('input[name="captcha"]');
const idTinInput = document.querySelector('input[name="Idtin"]');
const emailInput = document.querySelector('input[name="email"]');
const tenInput = document.querySelector('input[name="Ten"]');
const contentArea = document.querySelector('textarea[name="msg"]');
const notifyCaptcha = document.querySelector('.notifyCaptcha');
const notifyNoidung = document.querySelector('.notifyNoidung');
const notifyTen = document.querySelector('.notifyName');
const notifySuccess = document.querySelector('.notifySuccess');
const notifyEmail = document.querySelector('.notifyEmail');
const btnBinhLuan = document.querySelector('.btnBinhLuan');
let replyBinhluanList = Array.from(document.querySelectorAll('.replyBinhluan'));
const replyContainerClose = document.querySelector('.replyContainer__close');
const replyContainer = document.querySelector('.replyContainer');
const showReplyContainerBtn = document.querySelector('.showReplyContainerBtn');
let traloiBinhluanList = Array.from(document.querySelectorAll('.traloiBinhluan'));
const binhluanChaInput = document.querySelector('input[name="Binhluan_cha"]');
const binhluanForWhat = document.querySelector('.binhluanForWhat');

const checkEmailAndContent = function () {
    let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    notifyEmail.classList.add('d-none');
    notifyNoidung.classList.add('d-none');
    notifyTen.classList.add('d-none');
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
    if (tenInput.value === '') {
        notifyTen.innerHTML = 'Vui lòng nhập tên của bạn!';
        notifyTen.classList.remove('d-none');
        setTimeout(function () {
            notifyTen.classList.add('d-none');
        }, 2000);
        flag = false;
    }
    return flag;
}

const makeRandomText = function (length) {
    var result = '';
    var characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnopqrstuvwxyz23456789';
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
                'Id_tin': idTinInput.value,
                'Ten': tenInput.value,
                'Binhluan_cha':binhluanChaInput.value
            };
            $.post('/api/binhluan', info, function (data, status) {
                notifySuccess.innerHTML = data.message;
                notifySuccess.classList.remove('d-none');
                setTimeout(function () {
                    notifySuccess.classList.add('d-none');
                }, 5000);
                emailInput.value = '';
                contentArea.value = '';
                tenInput.value = '';
                createCaptcha();
            })
        }
    }
}

const replyBinhluan = function (e) {
    const id = e.target.dataset.idbinhluancha;
    $.get(`/api/binhluancon/${id}`, function (data, status) {
        const exportHtml = data.length === 0 ? '<p class="mt-3 text-danger">Không có tin phản hồi!</p>' : data.map(item =>
            `
            <div>
                <hr>
                <div class="d-flex">
                    <strong class="mr-3">${item.Ten}</strong>
                    <div><strong class="text-success">${item.Thoigian}</strong></div>
                </div>
                <p>${item.Noidung}</p>
                <a data-idBinhLuanCha="${item.Id_binhluan}" style="cursor: pointer" class="replyBinhluan text-primary">Xem phản hồi</a>
                <a data-idBinhLuanCha="${item.Id_binhluan}" data-tencha="${item.Ten}" style="cursor: pointer" class="traloiBinhluan ml-3 text-success">Trả lời</a>
                <div data-replyBinhluanCha="${item.Id_binhluan}" class="ml-4">
                    
                </div>
            </div>
            `
        ).join('');
        document.querySelector(`[data-replyBinhluanCha="${id}"]`).innerHTML = exportHtml;
        replyBinhluanList = Array.from(document.querySelectorAll('.replyBinhluan'));
        replyBinhluanList.forEach(item => {
            item.addEventListener('click', replyBinhluan);
        })
        traloiBinhluanList = Array.from(document.querySelectorAll('.traloiBinhluan'));
        traloiBinhluanList.forEach(item => {
            item.addEventListener('click', traloibinhluan);
        });
    })
}

const traloibinhluan = function (e) {
    const id = e.target.dataset.idbinhluancha;
    const name = e.target.dataset.tencha;
    binhluanChaInput.value = id;
    binhluanForWhat.innerHTML = `Phản hồi ${name}`;
    replyContainer.classList.remove('d-none');
}

btnBinhLuan.addEventListener('click', storeBinhLuan);
window.addEventListener('load', createCaptcha);
replyBinhluanList.forEach(item => {
    item.addEventListener('click', replyBinhluan);
});
replyContainerClose.addEventListener('click', () => { replyContainer.classList.add('d-none') });
showReplyContainerBtn.addEventListener('click', () => {
    binhluanChaInput.value = null;
    binhluanForWhat.innerHTML = `Bình luận`;
    replyContainer.classList.remove('d-none')
});
traloiBinhluanList.forEach(item => {
    item.addEventListener('click', traloibinhluan);
});