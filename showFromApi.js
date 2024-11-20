const text = document.getElementsByTagName("p")[0];
const section = document.getElementsByTagName("section")[0];

function fetchData() {
    fetch("http://localhost:8082/v1/users/get")
        .then(r => r.json())
        .then(j => {
            createTable(j);
        })
        .catch(error => console.error("Error:", error));
}


function createTable(data) {
    let table = document.querySelector("table");
    let tbody = document.querySelector("tbody");

    if (!table) {
        table = document.createElement("table");
        table.setAttribute("class", "table");

        tbody = document.createElement("tbody");
        var thead = document.createElement("thead");
        var headRow = document.createElement("tr");

        table.appendChild(thead);
        table.appendChild(tbody);
        thead.appendChild(headRow);
        // HEAD
        for (let index = 0; index < 3; index++) {
            var th = document.createElement("th");
            th.setAttribute("scope", "col");
            headRow.appendChild(th);

            if (index == 0) { th.textContent = "ID"; }
            else if (index == 1) { th.textContent = "Name"; }
            else if (index == 2) { th.textContent = "Surname"; }
        }
    } else {
        table.querySelector('tbody').innerHTML = "";
    }

    // BODY
    data.forEach(user => {
        var tr = document.createElement("tr");
        for (let index = 0; index < user.length; index++) {
            var td = document.createElement("td");
            td.textContent = user[index];
            tr.appendChild(td);
        }
        tbody.appendChild(tr);
    });

    section.appendChild(table);
}

fetchData();
setInterval(fetchData, 5000);