const buttonMenu = document.querySelector(".button-menu")
const Menu = document.querySelector(".menu")

buttonMenu.addEventListener('click', () => {
	Menu.classList.toggle("open")
})


function toggleDetails(patientId) {
	const detailsDiv = document.getElementById('details-' + patientId);
	if (detailsDiv.style.display === 'none' || detailsDiv.style.display === '') {
		detailsDiv.style.display = 'block';
	} else {
		detailsDiv.style.display = 'none';
	}
}