function msSuccess(text) {
  return Toastify({
      text: text,
      duration: 3000,
      style: {
          background: "#3cd188",
      }
  }).showToast();
}
function msWorning(text) {
  return Toastify({
      text: text,
      duration: 3000,
      style: {
          background: "#efae4e",
      }
  }).showToast();
}
function msDanger(text) {
  return Toastify({
      text: text,
      duration: 3000,
      style: {
          background: "#f7666e",
      }
  }).showToast();
}