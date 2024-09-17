function chamarLog() {
  var ajax = new XMLHttpRequest();

  ajax.open("GET", "http://localhost/projeto_starwars/insert.php", true);

  ajax.send();

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      var data = ajax.responseText;

      console.log(data);
    }
  };
}

function getFilmes() {
  fetch("./filmes.json")
    .then(function (response) {
      return response.json();
    })
    .then(function (filmes) {
      let placeholder = document.querySelector("#data-output");
      let out = "";
      for (let filme of filmes) {
        out += `
                <tr>
                <td class='img'><img src='${filme.imagem}'></td>
                <td>${filme.nome}</td>
                <td>${filme.data}</td>
                </tr>
      `;
      }

      placeholder.innerHTML = out;
    });
}
