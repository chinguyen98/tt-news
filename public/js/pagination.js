const numberPaginationBtnList = Array.from(document.querySelectorAll('.tinPagination__number'));
const truocPaginationBtn = document.querySelector('.tinPagination__truoc');
const sauPaginationBtn = document.querySelector('.tinPagination__sau');
const idNhomTin = document.querySelector('input[name="idNhomtin"]');
const listTinForNhomtinContainer = document.querySelector('.listTinForNhomtinContainer');
const maxPage = document.querySelector('input[name="maxPage"]').value;

const renderPaginationUI = function (id) {
    if(maxPage==1) return;
    const currentPage = document.querySelector('.page-item.active');
    currentPage.classList.remove('active');

    const targetPage = document.querySelector(`[data-idpage="${id}"]`);
    const parentTargetPage = targetPage.closest('.page-item');
    parentTargetPage.classList.add('active');

    const parentTruocPaginationBtn = truocPaginationBtn.closest('.page-item');
    const parentSauPaginationBtn = sauPaginationBtn.closest('.page-item');
    parentTruocPaginationBtn.classList.remove('disabled');
    parentSauPaginationBtn.classList.remove('disabled');

    if (id === 1) {
        parentTruocPaginationBtn.classList.add('disabled');
    }
    else if (id === +maxPage) {
        parentSauPaginationBtn.classList.add('disabled');
        sauPaginationBtn.classList.remove('text-primary');
    } else {
        parentTruocPaginationBtn.classList.remove('disabled');
        parentSauPaginationBtn.classList.remove('disabled');
        sauPaginationBtn.classList.add('text-primary');
    }
}

const renderTin = function (id) {
    const url = `/api/tinCuaNhomTin/${idNhomTin.value}?page=${id}`;
    listTinForNhomtinContainer.innerHTML = '<img style="margin: 0 auto; width:43vw; height:auto" src="/images/nhomtinloader.gif" alt="">';
    $.get(url, function (data, status) {
        const exportHtml = data.map(item =>
            `
            <div class="col-sm-4 p-rl-1 p-b-2">
                <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(images/${item.Hinhdaidien});">
                    <a href="/tin/${item.Id_tin}" class="dis-block how1-child1 trans-03"></a>

                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                        <a href="/loaitin/{{$loaitin->Id_loaitin}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            ${item.Ten_loaitin}
                        </a>
                        <h1 class="how1-child2 m-t-14">
                            <a href="/tin/${item.Id_tin}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                ${item.Tieude}
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
            `
        ).join('');
        renderPaginationUI(+id);
        listTinForNhomtinContainer.innerHTML = exportHtml;

    })
}

numberPaginationBtnList.forEach(item => {
    item.addEventListener('click', (e) => { renderTin(e.target.dataset.idpage) });
});
truocPaginationBtn.addEventListener('click', () => {
    const id = +document.querySelector('.page-item.active a').dataset.idpage - 1;
    renderTin(id);
});
sauPaginationBtn.addEventListener('click', () => {
    const id = +document.querySelector('.page-item.active a').dataset.idpage + 1;
    renderTin(id);
});