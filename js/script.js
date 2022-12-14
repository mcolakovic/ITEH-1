$('#dodajForm').submit(function(event){
    event.preventDefault();

    const $form = $(this);

    const serijalizovan = $form.serialize();
    req = $.ajax({
        url: "handler/add.php",
        type: "post",
        data: serijalizovan
    });

    req.done(function(){
            location.reload();
    });

    req.fail(function(textStatus, errorThrown){
        console.error("Greska je: "+textStatus, errorThrown);
    });
}
)

$('#btn-obrisi').click(function(){
    const checked = $('input[name=cekiran]:checked');

    req = $.ajax({
        url: "handler/delete.php",
        type: "post",
        data: {'id': checked.val()}
    });
    
    req.done(function(){
        location.reload();
});

    req.fail(function(textStatus, errorThrown){
        console.error("Greska je: "+textStatus, errorThrown);
    });
}
)

$('#izmijeniForm').submit(function(){
    
    event.preventDefault();
    const forma = $(this);
    const serialized = forma.serialize();


    const obj = forma.serializeArray().reduce(function (json, { name, value }) {
        json[name] = value;
        return json;
    }, {}
    );

    req = $.ajax({
        url: "handler/update.php",
        type: "post",
        data: serialized
    });

    req.done(function(response){
        if (response === "Success") {
            $(`#myTable tbody #tr-${obj["id"]}`).find("td").eq(0).html(obj["proizvod"]);
            $(`#myTable tbody #tr-${obj["id"]}`).find("td").eq(1).html(obj["proizvodjac"]);
            $(`#myTable tbody #tr-${obj["id"]}`).find("td").eq(2).html(obj["velicina"]);
            $(`#myTable tbody #tr-${obj["id"]}`).find("td").eq(3).html(obj["materijal"]);
            $(`#myTable tbody #tr-${obj["id"]}`).find("td").eq(4).html(obj["boja"]);
            //location.reload();
            alert("Proizvod je izmijenjen");    
        }
        else{
            alert("Proizvod nije izmijenjen");
        }
    });

    req.fail(function(textStatus, errorThrown){
        console.error("Greska je: "+textStatus, errorThrown);
    });
}
)

function postaviPodatke() {
    var idVal = $('input[name=cekiran]:checked');
    var id = idVal.val();
    
    $("#id").val(id);

    event.preventDefault();


    request = $.ajax({
        url: "handler/get.php",
        type: "post",
        data: {'id': id}
    });

    request.done(function (response) {
        if (!(response === "Failed")) {

            response = response.slice(1, -1)
            var obj = JSON.parse(response)

            $('#izmijeniForm #proizvod').val(obj['proizvod'])

            $('#izmijeniForm #proizvodjac').val(obj['proizvodjac'])

            $('#izmijeniForm #velicina').val(obj['velicina'])

            $('#izmijeniForm #materijal').val(obj['materijal'])

            $('#izmijeniForm #boja').val(obj['boja'])
        } 
    })

    request.fail(function (textStatus, errorThrown) {
        console.error("Greska je: "+textStatus, errorThrown);
    })
}

function sortTable(){

    $('#myTable #tableBody').empty();
    $('#pronadji').val("");

    $.get("handler/sort.php", function (data) {
        let array = data.split("}")
        array.pop()
        array.forEach(element => {
            element = element + "}"
            let obj = JSON.parse(element)

            $("#myTable tbody").append(`
            <tr id="tr-${obj.id}">
                <td>${obj.proizvod}</td>
                <td>${obj.proizvodjac}</td>
                <td>${obj.velicina}</td>
                <td>${obj.materijal}</td>
                <td>${obj.boja}</td>
                <td>
                    <label class="custom-radio-btn">
                        <input type="radio" name="cekiran" value=${obj.id}>
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
        `)
        });
    })
}

$('#btn-pronadji').click(function(){

    let idVal = $('input[name=pronadji]');
    let id = idVal.val();
    let row = $(`#tr-${id} td`);

    event.preventDefault();

    req = $.ajax({
        url: "handler/get.php",
        type: "post",
        data: {'id': id}
    });

    req.done(function(response){
        if (!(response === "Failed")) {
            showData(id,row)
            $('input[name=pronadji]').val("")
            document.getElementById("btn-pronadji").innerHTML = "Prikazi sve";
        }
        else{
            showAll()
            document.getElementById("btn-pronadji").innerHTML = "Pronadji";
        }
    });

    req.fail(function(textStatus, errorThrown){
        console.error("Greska je: "+textStatus, errorThrown);
    });
}
)

function showData(id, row) {
    $('#tableBody').empty()

    $("#myTable tbody").append(`
        <tr id="tr-${id}">
            <td>${row[0].outerText}</td>
            <td>${row[1].outerText}</td>
            <td>${row[2].outerText}</td>
            <td>${row[3].outerText}</td>
            <td>${row[4].outerText}</td>
            <td>
                <label class="custom-radio-btn">
                    <input type="radio" name="cekiran" value=${id}>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
    `);
}

function showAll() {
    $('#tableBody').empty()
    $('#pronadji').val("")

    $.get("handler/getAll.php", function (data) {
        let array = data.split("}")
        array.pop()
        array.forEach(element => {
            element = element + "}"
            let obj = JSON.parse(element)

            $("#myTable tbody").append(`
            <tr id="tr-${obj.id}">
                <td>${obj.proizvod}</td>
                <td>${obj.proizvodjac}</td>
                <td>${obj.velicina}</td>
                <td>${obj.materijal}</td>
                <td>${obj.boja}</td>
                <td>
                    <label class="custom-radio-btn">
                        <input type="radio" name="cekiran" value=${obj.id}>
                        <span class="checkmark"></span>
                    </label>
                </td>
            </tr>
        `)
        });
    })
}