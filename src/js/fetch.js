const searchBtn = document.querySelector(".srch-btn");
const username = document.body.dataset.user;
const userId = document.body.dataset.userid;
const accType = document.body.dataset.acctype;

searchBtn.addEventListener("click", async () => {
  const searchInput = document.getElementById("search-bar").value;
  const filter = document.getElementById("filterLoker").value;
  const loker = await getLoker(searchInput, filter);
  // console.log(searchInput);
  // console.log(filter);
  // console.log(loker);
  updateUI(loker);
});

function loadingAnimation() {
  const loading = searchBtn.querySelector(".loading");
  const srcTxt = searchBtn.querySelector(".srcBtn-txt");
  loading.classList.remove("opacity-0");
  srcTxt.classList.toggle("opacity-1");
  srcTxt.classList.toggle("opacity-0");
  setTimeout(() => {
    srcTxt.classList.toggle("opacity-1");
    srcTxt.classList.toggle("opacity-0");
    loading.classList.add("opacity-0");
  }, 300);
}

function getLoker(src, filter) {
  return fetch(`../src/php/api/?lokersrch=${src}&filter=${filter}`).then((response) => response.json());
}

document.addEventListener("click", async function (e) {
  if (e.target.classList.contains("modal-dtl-btn")) {
    const lokerId = e.target.dataset.id;
    const lokerDetail = await getDetail(lokerId);
    // console.log(lokerDetail);
    // console.log(lokerId);
    showModal();
    updateModal(lokerDetail);
  }
});

function getDetail(id) {
  return fetch(`../src/php/api/?lokerid=${id}`).then((response) => response.json());
}

function showModal() {
  const modal = document.getElementById("staticModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function updateModal(d) {
  const modalBody = document.querySelector(".modal-body");
  const modalTitle = document.querySelector(".modal-title");
  const detail = getModalBody(d);
  modalTitle.innerHTML = d.nama + " | " + d.company;
  modalBody.innerHTML = detail;
  console.log(d);
}

function getModalBody(d) {
  return `
  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
  ${d.desc}
  </p>
  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
  ${d.detail}
  </p>
  `;
}

function updateUI(loker) {
  const container = document.querySelector(".loker-container");

  if (loker.error && loker.error === "Data not found.") {
    // If the server response contains an error message, display it
    container.innerHTML = "<h2 class='capitalize text-xl text-slate-400 text-center'>Pekerjaan Tidak Ditemukan.</h2>";
  } else {
    let lists = "";
    loker.forEach((l) => {
      lists += listLoker(l);
    });
    container.innerHTML = lists;
  }
}

// function get

function listLoker(l) {
  return `
    <section class="mb-2 border p-4 rounded-lg max-w-full bg-white">
      <div class="mx-auto">
        <div class="card md:flex max-w-full">
          <div class="w-20 h-20 mx-auto mb-6 md:mr-6 flex-shrink-0">
            <img class="object-cover rounded-full" src="../src/uploads/profile/${l.logo}">
          </div>
          <div class="flex-grow text-center md:text-left w-full">
            <h3 class="text-xl heading capitalize">${l.nama}</h3>
            <a href="../profile/?id=${l.company_id}" class="font-medium capitalize">${l.company}</a>
            <p class="mt-2 mb-3">${l.desc}</p>
            <div>
              <!-- Modal toggle -->
              <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto gap-1">
                  ${
                    accType != "company"
                      ? `<a href="ajukan.php?id=${l.company_id}" 
                      class="items-center text-center inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                      Ajukan Lamaran
                    </a>`
                      : ""
                  }
                  ${
                    l.company_id === userId
                      ? `<a href="edit.php?id=${l.company_id}" 
                      class="items-center text-center inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-sky-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-sky-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                      Edit Loker
                    </a>
                    <a href="delete.php?id=${l.company_id}" 
                      class="items-center text-center inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                      Hapus Loker
                    </a>`
                      : ""
                  }
                  <button data-modal-target="staticModal" data-id=${l.id} data-modal-toggle="staticModal" type="button"
                    class="items-center modal-dtl-btn inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Detail Pekerjaan
                  </button>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  `;
}
