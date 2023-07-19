/**
 * Author: Omar Fandiño <omarfandinoya@gmail.com>
 */

// DOM
const contTable = document.querySelector('.table-container');
const toastEl = document.getElementById('toast-msg');
const confirmationEl = document.getElementById('confirmation-modal');
const modalUpdateUserEl = document.getElementById('modal-update-user');

// Update form fields
const formUpdateUser = document.querySelector('.form-update-user');
const inputUpdateName = document.querySelector('.input-update-name');
const inputUpdateDate = document.querySelector('.input-update-date');
const optionsWorkCenters = document.querySelector('.input-update-work-center').querySelectorAll('option');

// Confirm dialog
const btnDeleteUser = document.querySelector('.btn-delete-confirm');

// Instances
const url = new URL(window.location.href);
const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
const modalConfirmation = bootstrap.Modal.getOrCreateInstance(confirmationEl);
const modalUpdateUser = bootstrap.Modal.getOrCreateInstance(modalUpdateUserEl);

// Helpers
const showToast = (msg, toastStatus) => {
  const bgColor = toastStatus === 'success' ? '#6be88c' : '#e86b6b';

  toastEl.querySelector('.toast-header').style.backgroundColor = bgColor;
  toastEl.querySelector('strong').textContent = toastStatus.replace(toastStatus[0], toastStatus[0].toUpperCase());
  toastEl.querySelector('.toast-body').textContent = msg;
  toast.show();
}

const getJSON = async url => {
  try {
    const res = await fetch(url);
    if (!res.ok) throw new Error('Error en solicitud');
    
    const data = await res.json();

    return data;
  } catch (err) {
    showToast(`Error en solicitud`, 'failed');
  }
}

// Functions
// Show update form with data loaded
const showUpdateForm = async userId => {
  const [data] = await getJSON(`actions/actGetUser.php?id=${userId}`);
  inputUpdateName.value = data.name;
  inputUpdateDate.value = data.entry_date;

  optionsWorkCenters.forEach(wc => {
    if (+wc.value === data.work_center_id) wc.selected = true;
  })

  formUpdateUser.action = `actions/actUpdateUser.php?id=${userId}`;


  modalUpdateUser.show();
}

// Show confirmation dialog
const showDeleteConfirmation = userId => {
  btnDeleteUser.href = `actions/actDeleteUser.php?id=${userId}`;
  modalConfirmation.show();
}

// Event handler
contTable.addEventListener('click', async e => {
  const btnAction = e.target.closest('.btn');

  if (!btnAction) return;

  const action = btnAction.classList.contains('edit') ? 'edit' : 'delete';
  const userId = btnAction.closest('.user-row').dataset.id;

  if (action === 'delete')
    showDeleteConfirmation(userId);

  if (action === 'edit')
    showUpdateForm(userId);
  
});

// Init
const init = () => {
  if(url.searchParams.size > 0) {
    const msg = url.searchParams.get('msg');
    const status = url.searchParams.get('status');
    
    showToast(msg, status);
  }
}
init();