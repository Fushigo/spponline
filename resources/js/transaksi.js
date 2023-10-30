function getIdSpp(id) {
    fetch(`/getIdSpp/${id}`)
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            const nominal = document.getElementById('nominal');
            const nominalDisplay = document.getElementById('nominal_display');
            nominal.value = data[0].id_spp
            nominalDisplay.value = data[0].nominal
        })
        .catch((error) => console.log(error));
}

document.getElementById("tahun_bayar").addEventListener("change", function (e) {
    // console.log("MASUK")
    getIdSpp(e.target.value);
});
