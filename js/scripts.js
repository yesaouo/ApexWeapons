menuBtn.onclick = function () {
    if (menuBtn.classList.contains('click')) {
        menuBtn.classList.remove('click');
        menuUl.classList.remove('straight');
        menuSearch.classList.remove('straight');
    } else {
        menuBtn.classList.add('click');
        menuUl.classList.add('straight');
        menuSearch.classList.add('straight');
    }
}