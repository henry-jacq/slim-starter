import Ajax from './libs/ajax.js';
import Toast from './libs/toast.js';

// Profile Dropdown Logic
const profileMenuButton = document.getElementById('profileMenuButton');
const profileMenu = document.getElementById('profileMenu');
profileMenuButton.addEventListener('click', () => {
	profileMenu.classList.toggle('hidden');
});
