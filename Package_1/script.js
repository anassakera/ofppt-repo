document.addEventListener('DOMContentLoaded', function () {
  const dropdown = document.getElementById('dropdown');
  const selectedValue = document.getElementById('selected-value');

  dropdown.addEventListener('change', function () {
    selectedValue.textContent = 'Selected Value: ' + dropdown.value;
  });
});


