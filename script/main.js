const getParams = () => {
    const params = new URLSearchParams(window.location.search);
    const dados = {};

    for (const [key, value] of params.entries()) {
        dados[key] = value;
    }
    return dados;
}

const dadosProcessados = document.getElementById('dados-processados');
if (dadosProcessados) {
    const dados = getParams();

    if (Object.keys(dados).length > 0) {
    dadosProcessados.innerHTML = `
        <p><b>Primeiro nome: </b> ${dados.firstname}<p/>
        <p><b>Sobrenome: </b> ${dados.lastname}<p/>
        <p><b>Email:</b> ${dados.email}</p>
        <p><b>Celular: </b> ${dados.number}<p/>
        <p><b>Senha: </b> ${dados.password}<p/>
        <p><b> Confirmação de senha: </b> ${dados.confirmpassword}<p/>
        <p><b> Gênero: </b> ${dados.gender}<p/>
    `
    } else {
        dadosProcessados.innerHTML = "<p>Nenhum dado foi enviado.</p>";
    }
};

const phoneMask = (value) => {
    if(!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value
};

const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
};


document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form-content');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmpassword');
    const errorMessage = document.getElementById('mensagem-erro');

    form.addEventListener('submit', function(event) {
        if (password.value !== confirmPassword.value) {
            event.preventDefault();
            errorMessage.classList.remove('hidden');
        } else {
            errorMessage.classList.add('hidden');
            alert('Formulário enviado com sucesso!');
        }
    });
})

const toggleBtn = document.querySelector('.toggle-btn')
const toggleBtnIcon = document.querySelector('.toggle-btn i')
const dropMenu = document.querySelector('.dropdown-menu')

toggleBtn.onclick = function() {
    dropMenu.classList.toggle('open')
    const isOpen = dropMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen
        ? 'fa-solid fa-xmark'
        : 'fa-solid fa-bars'
}