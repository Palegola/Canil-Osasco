const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = [...document.querySelectorAll(".step p")];
const progressCheck = [...document.querySelectorAll(".step .check")];
const bullet = [...document.querySelectorAll(".step .bullet")];

// inputs
const PrimeiroNome = document.querySelector("#PrimeiroNome");
const Sobrenome = document.querySelector("#Sobrenome");
const CPF = document.querySelector("#CPF");
const Email = document.querySelector("#E-mail");
const TelefoneCelular = document.querySelector("#TelefoneCelular");
const CEP = document.querySelector("#CEP");
const Endereco = document.querySelector("#Endereco");
const Numero = document.querySelector("#Numero");
const Cidade = document.querySelector("#Cidade");
const Estado = document.querySelector("#Estado");
const DataNascimento = document.querySelector("#DataNascimento");
const genero = document.querySelector("#genero");


let max = 4;
let current = 1;

nextBtnFirst.addEventListener("click", (event) => {

  if (PrimeiroNome.value == '' || Sobrenome.value == '' || CPF.value == '') {
    event.preventDefault();
    return;
  } else {
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  }

});

nextBtnSec.addEventListener("click", function (event) {

  if (Email.value === '' || TelefoneCelular.value === '') {
    event.preventDefault();
    return;
  } else {
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  }

});

nextBtnThird.addEventListener("click", function (event) {

  if (CEP.value === '' || Endereco.value === '' || Numero.value === '' || Cidade.value === '' || Estado.value === '') {
    event.preventDefault();
    return;
  } else {
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  }

});

submitBtn.addEventListener("click", function (event) {

  if (genero.value === '' || DataNascimento.value === '') {
    alert('preencha todos os campos!')
    event.preventDefault();
    return;
  } else {
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    setTimeout(function () {
      alert("Respostas enviadas com sucesso!!");
      location.reload();
    }, 800);
  }
});

prevBtnSec.addEventListener("click", function () {
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

prevBtnThird.addEventListener("click", function () {
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

prevBtnFourth.addEventListener("click", function () {
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form-cadastro');

  const nextButtons = form.querySelectorAll('.next');
  const prevButtons = form.querySelectorAll('.prev');

  nextButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {

      if (button.id === 'proximo1') {
        if (PrimeiroNome.value == '' || Sobrenome.value == '' || CPF.value == '') {
          alert('preencha todos os campos!')
          event.preventDefault();
          return;
        }

      } else if (button.id === 'proximo2') {
        if (Email.value === '' || TelefoneCelular.value === '') {
          alert('preencha todos os campos!')
          event.preventDefault();
          return;
        }

      } else if (button.id === 'proximo3') {
        if (CEP.value === '' || Endereco.value === '' || Numero.value === '' || Cidade.value === '' || Estado.value === '') {
          alert('preencha todos os campos!')
          event.preventDefault();
          return;
        }
      }

      showNextPage(this);
    });
  });

  prevButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      showPrevPage(this);
    });
  });
});

function showNextPage(button) {
  const currentPage = button.closest('.page');
  const nextPage = currentPage.nextElementSibling;

  currentPage.style.display = 'none';
  nextPage.style.display = 'block';
}

function showPrevPage(button) {
  const currentPage = button.closest('.page');
  const prevPage = currentPage.previousElementSibling;

  currentPage.style.display = 'none';
  prevPage.style.display = 'block';
}