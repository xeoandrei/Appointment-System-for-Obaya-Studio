const overlay = document.getElementById('overlay');
const modalButton = document.querySelectorAll('[data-target]');
const closeButton = document.querySelectorAll('[data-close-button]');
if (modalButton != null)
{
	modalButton.forEach(button => 
	{
	button.addEventListener('click', () => 
	{
		const modals = document.querySelector(button.dataset.target)
		openModal(modals)
		console.log("openModal")
		})	
	})
}
if(overlay != null)
{
	overlay.addEventListener('click', () => 
	{
		const modals = document.querySelectorAll('.modal.active')
		modals.forEach(modal => {
			closeModal(modal)
		})
	})
}
if (closeButton != null) 
{
	closeButton.forEach(button => 
	{
		button.addEventListener('click', () => 
		{
			const modal = button.closest('.modal')
			closeModal(modal)
		})
	})
}
function openModal(modal)
{
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}
function closeModal(modal)
{
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}