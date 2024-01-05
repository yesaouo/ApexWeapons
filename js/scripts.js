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
    if (searchBarInput.value)
        window.location.href = window.location.origin + '/ApexWeapons/content/search.php?search=' + searchBarInput.value;
    else
        window.location.href = window.location.origin + '/ApexWeapons/content/weapon.php';
}
menuSearchSearch.onclick = function () {
    if (menuSearchInput.value)
        window.location.href = window.location.origin + '/ApexWeapons/content/search.php?search=' + menuSearchInput.value;
    else
        window.location.href = window.location.origin + '/ApexWeapons/content/weapon.php';
}