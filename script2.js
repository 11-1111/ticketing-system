const dropdown = document.getElementById('dropdown');
const selectedItem = document.getElementById('selected-item');

// Add event listener for change event on dropdown
dropdown.addEventListener('change', function() {
  // Update the content of the selected-item span with the selected item
  selectedItem.textContent = this.value;
});
