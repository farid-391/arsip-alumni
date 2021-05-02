function destroyInnerHTML(attr) {
    attr.innerHTML = ""
}

function destroyPlaceholder(attr) {
    attr.placeholder = ""
}

function catFunction() {
    let selectedValue = document.getElementById("selectCategory").value;
    let labelCategory = document.getElementById("labelCategory");
    categoryPlaceholder = document.getElementById("kategori");
    destroyInnerHTML(labelCategory)
    destroyPlaceholder(categoryPlaceholder);

    if (selectedValue === 'Prestasi') {
        labelCategory.innerHTML = 'Kategori Prestasi'
        categoryPlaceholder.placeholder = 'Masukkan Kategori Prestasi, cth: Ilmiah, Olahraga, Seni'
        document.getElementById("formCategory").action = '/tambah-kategori-prestasi'
    } else {
        labelCategory.innerHTML = 'Kategori Juara'
        categoryPlaceholder.placeholder = 'Masukkan Kategori Juara, cth: Juara Umum..'
        document.getElementById("formCategory").action = '/tambah-kategori-juara'
    }
}