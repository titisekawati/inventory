window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
    const tbKategori = document.getElementById('tbKategori');
    if (tbKategori) {
        new simpleDatatables.DataTable(tbKategori);
    }
    const dsGudang = document.getElementById('dsGudang');
    if (dsGudang) {
        new simpleDatatables.DataTable(dsGudang);
    }
    const tbBrg = document.getElementById('tbBrg');
    if (tbBrg) {
        new simpleDatatables.DataTable(tbBrg);
    }
});
