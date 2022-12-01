function encodeQueryData(data) {
  const ret = [];
  for (let d in data)
    ret.push(encodeURIComponent(d) + "=" + encodeURIComponent(data[d]));
  return ret.join("&");
}

const selectedBoxes = [];

function deleteSelectedMoviesHandler(selectedMovies) {
  const parsedSelectedMovies = selectedMovies.toString();
  const params = encodeQueryData({ id: parsedSelectedMovies });

  fetch(`../api/delete_movie.php?${params}`, {
    method: "DELETE",
  })
    .then((something) => {
      location.reload();
    })
    .catch((err) => {});
}

document
  .getElementById("deleteSelectedMoviesBtn")
  .addEventListener("click", () => {
    deleteSelectedMoviesHandler(selectedBoxes);
  });

const fetchedData = fetch("../api/get_movie.php");
fetchedData
  .then(async (data) => {
    const tableData = await data.json();
    const tbody = document.querySelector("body table tbody");

    for (const row of tableData) {
      tbody.innerHTML = tbody.innerHTML + tableRowGenerator(row);
    }

    const selectBoxes = document.getElementsByClassName("row-select-box");

    for (const selectBox of selectBoxes) {
      selectBox.addEventListener("click", (e) => {
        selectedBoxes.push(e.target.value);
      });
    }

    function tableRowGenerator({
      id,
      title,
      description,
      genre,
      rating,
      writer,
      stars,
      director,
    }) {
      return `
        <tr>
          <td>
            <input class="row-select-box" type="checkbox" value="${id}" />
          </td>
          <td>${id}</td>
          <td>${title}</td>
          <td>${description}</td>
          <td>${genre}</td>
          <td>${rating}</td>
          <td>${writer}</td>
          <td>${stars}</td>
          <td>${director}</td>
        </tr>`;
    }
  })
  .catch((err) => {});
