const authmodal = document.querySelector('.auth-modal');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const loginBtnModal = document.querySelector('.login-btn-modal');
const closeBtnModal = document.querySelector('.close-btn-modal');
const profileBox = document.querySelector('.profile-box');
const avatarCircle = document.querySelector('.avatar-circle');
const alertBox = document.querySelector('.alert-box');

registerLink.addEventListener('click', () => authmodal.classList.add('slide'));
loginLink.addEventListener('click', () => authmodal.classList.remove('slide'));

if (loginBtnModal) loginBtnModal.addEventListener('click', () => authmodal.classList.add('show'));
closeBtnModal.addEventListener('click', () => authmodal.classList.remove('show','slide'));

if (avatarCircle) avatarCircle.addEventListener('click', () => profileBox.classList.toggle('show'));

if (alertBox) {
    setTimeout(() => alertBox.classList.add('show'),50);

    setTimeout(() => {
    alertBox.classList.remove('show');
    setTimeout(() => alertBox.remove(),1000);
    }, 6000);
}