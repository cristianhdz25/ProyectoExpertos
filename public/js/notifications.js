let nofityId = 0;

function closeAlert(alertId) {
    var divElement = $('#' + alertId);

    divElement.addClass('hide-notify');

    // Borrar después de 0.5 segundos (tiempo de la transición)
    setTimeout(function () {
        divElement.remove();
    }, 500);
}

function notifySuccess(title, message) {
    let id = "notify" + nofityId;
    //crear etiqueta
    let notification = $(`
    <div class="notify notify-success" id="${id}">
        <div class="content">
            <div class="notify-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div class="text">
                <h5 class="notify-title">${title}</h5>
                <p class="notify-text">${message}</p>
            </div>
        </div>
        <button onclick="closeAlert('${id}')" class="btn-close-notify" ><i class="fa-solid fa-xmark"></i></button>
    </div>
    `);

    //establecer tiempo de salida
    setTimeout(() => {
        closeAlert(id);
    }, 3000);

    //guardarla en el bloque
    $('#notify-container').append(notification);
    nofityId++;
}

function notifyError(title, message) {
    let id = "notify" + nofityId;
    //crear etiqueta
    let notification = $(`
    <div class="notify notify-error" id="${id}">
        <div class="content">
            <div class="notify-icon">
                <i class="fa-solid fa-circle-exclamation"></i>
            </div>
            <div class="text">
                <h5 class="notify-title">${title}</h5>
                <p class="notify-text">${message}</p>
            </div>
        </div>
        <button onclick="closeAlert('${id}')" class="btn-close-notify" ><i class="fa-solid fa-xmark"></i></button>
    </div>
    `);

    //establecer tiempo de salida
    setTimeout(() => {
        closeAlert(id);
    }, 3000);

    //guardarla en el bloque
    $('#notify-container').append(notification);
    nofityId++;
}

function notifyWarning(title, message) {
    let id = "notify" + nofityId;

    //crear etiqueta
    let notification = $(`
    <div class="notify notify-warning" id="${id}">
        <div class="content">
            <div class="notify-icon">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div class="text">
                <h5 class="notify-title">${title}</h5>
                <p class="notify-text">${message}</p>
            </div>
        </div>
        <button onclick="closeAlert('${id}')" class="btn-close-notify" ><i class="fa-solid fa-xmark"></i></button>
    </div>
    `);

    //guardarla en el bloque
    $('#notify-container').append(notification);
    nofityId++;
}

function notifyInfo(title, message) {
    let id = "notify" + nofityId;

    //crear etiqueta
    let notification = $(`
    <div class="notify notify-info" id="${id}">
        <div class="content">
            <div class="notify-icon">
                <i class="fa-solid fa-circle-info"></i>
            </div>
            <div class="text">
                <h5 class="notify-title">${title}</h5>
                <p class="notify-text">${message}</p>
            </div>
        </div>
        <button onclick="closeAlert('${id}')" class="btn-close-notify" ><i class="fa-solid fa-xmark"></i></button>
    </div>
    `);

    //guardarla en el bloque
    $('#notify-container').append(notification);
    nofityId++;
}

function confirmDelete(message, callback, param) {
    let item = `
        <div class="position-fixed top-0 start-0 bg-dark bg-opacity-25 w-100 h-100" id="deleteConfirmation">
            <div class="w-100 h-100 d-flex justify-content-center align-content-center align-items-center">
                <div class="card text-center col-9 col-md-7 col-lg-5 col-xl-3">
                    <div class="card-body">
                        <h5>${message}</h5>
                        <div class="row justify-content-center mt-4">
                            <button id="btnCancelDelete" class="btn btn-secondary col-4" >Cancelar</button>
                            <button id="btnConfirmDelete" class="btn btn-danger col-4 ms-1">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    $('body').append(item);
    $("#btnCancelDelete").click(function () {
        $("#deleteConfirmation").remove();
    });
    $("#btnConfirmDelete").click(function () {
        $("#deleteConfirmation").remove();
        callback(param);
    });
}