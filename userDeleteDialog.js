const deleteButtons = document.querySelectorAll(".button--delete");

// deleteButtons.forEach(b => b.addEventListener("click", e => {
//     const dialog = document.getElementById("dialog");
//     const action = b.dataset.action;
//     const link = document.getElementById("dialog__confirm-link");
//     link.setAttribute("href", action);
    
//     dialog.showModal();
// }))

deleteButtons.forEach(b => b.addEventListener("click", e => {
    const dialog = document.getElementById("dialog");
    const data = b.dataset.action;
    const confirmButton = document.getElementById("dialog__confirm-btn");
    confirmButton.addEventListener("click", () => {
        deleteUser(data)
    })
    dialog.showModal();
}))

function closeDeleteDialog(){
    const dialog = document.getElementById("dialog");
    dialog.close();
}

function deleteUser(data){
    data = data.split("|");
    id = data[0];
    email = data[1];

    fetch(`delete/${id}`)
        .then(_ => {
            deleteRow(email);
            updateIndexes();
            closeDeleteDialog();
        })
        .catch(error => {
            console.error("Error deleting user:", error);
        });
}

function deleteRow(email) {
    row = null;
    allTdatas = document.querySelectorAll("td");

    for (let index = 0; index < allTdatas.length; index++) {
        const td = allTdatas[index];
        if(td.textContent === email){
            row = td.closest("tr");
            break;
        }
    }
    if(row != null) row.remove();
}

function updateIndexes() {
    allTh = document.querySelectorAll("th[scope='row']")
    console.log(allTh);
    allTh.forEach((th, index) => {
        th.textContent = index + 1;
    })
}