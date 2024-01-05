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
searchBarSearch.onclick = function () {
    let searchValue = searchBarInput.value || '';
    window.location.href = `${window.location.origin}/ApexWeapons/content/search.php?search=${searchValue}`;
}
menuSearchSearch.onclick = function () {
    let searchValue = menuSearchInput.value || '';
    window.location.href = `${window.location.origin}/ApexWeapons/content/search.php?search=${searchValue}`;
}